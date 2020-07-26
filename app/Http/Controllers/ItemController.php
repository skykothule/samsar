<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\User;
use Mail;
use DB;
use Session;
use Excel;
use PDF;
use Auth;
use App\Role;
use App\Message;
use App\Foo;
use App\Item;
use App\Order;
use App\OrderStatus;
use App\Trackings;
use App\Company;
use View;
use Route;


class ItemController extends Controller
{
    protected $foo;
    public function __construct(Foo $foo)
    {
        $this->middleware('auth');
        $this->foo = $foo;
//        if((Route::currentRouteAction() != 'App\Http\Controllers\UserController@profile') && (Route::currentRouteAction() != 'App\Http\Controllers\UserController@profileEdit') && (Route::currentRouteAction() != 'App\Http\Controllers\UserController@upload')
//            && (Route::currentRouteAction() != 'App\Http\Controllers\UserController@authentication') && (Route::currentRouteAction() != 'App\Http\Controllers\UserController@update')){
//            $this->middleware('permission:users.manage');
//        }
    }

    public function index(Request $request){
//        $searchname = $request->input('search');
        if (Auth::user()->hasRole('Admin')) {

            $orderdata = Item::select('item.*','trackings.tracking_id')
                ->leftjoin('trackings','item.item_id','=','trackings.item_id')
                ->orderBy('item.id', 'DESC')
//            ->whereRaw("username like '%{$searchname}%'")
//            ->orWhereRaw("username like '%{$searchname}%'")
//            ->orWhere('email', 'LIKE', '%'. $searchname .'%')
                ->paginate(20);
        }else{
            $orderdata = Item::select('item.*','trackings.tracking_id')
                ->leftjoin('trackings','item.item_id','=','trackings.item_id')
                ->where('item.user_id',Auth::user()->id)
                ->orderBy('item.id', 'DESC')
//            ->orWhereRaw("username like '%{$searchname}%'")
//            ->orWhere('email', 'LIKE', '%'. $searchname .'%')
                ->orderBy('id', 'DESC')
                ->paginate(20);
        }
        return view('order.order_list',compact('orderdata'));
    }

    public function create(){
        $company = Company::get();
        return view('order.new_order',compact('company'));
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'order_id' =>'required|unique:orders',
            'order_date' => 'required|max:255',
            'order_value' => 'required|max:255',
            'service' => 'required|max:255',
            'ship_to_name' => 'required|max:255',
            'ship_to_company' => 'required|max:255',
            'ship_to_add1' => 'required|max:255',
            'ship_to_state' => 'required|max:255',
            'ship_to_city' => 'required|max:255',
            'ship_to_pincode' => 'required|max:255',
            'ship_to_country' => 'required|max:255'
//            'ship_to_phone' => 'required|min:10|numeric',
//            'ship_to_email' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return redirect('createorder')->withErrors($validator)->withInput();
        }else{

            Item::create($input);
            /*for user activity */
            $description = array('description'=>'Order Placed');
            $this->foo->users_activity($description);
            return Redirect('createorder')->with('msg_success', 'Order Placed Successfuly');
        }
    }

    public function show($id,$orgid)
    {
        $orderdata = Item::select('item.*','tbl_company.company_name','trackings.ship_date','trackings.tracking_id')
            ->leftjoin('users','item.user_id','=','users.id')
            ->leftjoin('tbl_company','users.orgid','=','tbl_company.id')
            ->leftjoin('trackings','item.item_id','=','trackings.item_id')
            ->where('item.order_id',$id)->paginate(200);

        $itemdata = Order::select('OrderDetails.orgid','trackings.*','OrderStatus.orderstatus','OrderStatus.bookingstatus','tbl_company.company_name')
                    ->leftjoin('trackings','OrderDetails.orderid','=','trackings.item_id')
                    ->leftjoin('tbl_company','OrderDetails.orgid','=','tbl_company.id')
                    ->leftjoin('OrderStatus','OrderDetails.orderid','=','OrderStatus.orderid')
                    ->where('OrderDetails.orderid',$id)
                    ->paginate(200);
    
        $orderlist = Order::select('OrderDetails.*')
                            ->join('OrderStatus','OrderDetails.orderid','=','OrderStatus.orderid')
                            ->where('OrderStatus.bookingstatus','initial')
                            ->where('OrderDetails.orgid',$orgid)
                            ->where(function($query) {
                                $query->where('OrderStatus.orderstatus', 'initial')
                                        ->orWhere('OrderStatus.orderstatus', 'confirm');
                                })
                            ->get();            
        return view('order.order_view',compact('orderdata','itemdata','orderlist'));
    }


    public function importorder(){
        if (Auth::user()->hasRole('I-Customer')) {
            $company = Company::get();
            return view('order.import', compact('company'));
        }else{
            return view('order.import');
        }
    }

    /**
     * Store a newly created resource in importcsv.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function importcsv(Request $request)
    {
        
        $path = $request->file('file');
        $org = $request->orgid;
        
        if(empty($path)){
            return Redirect::back()->with('msg_delete', 'Please choose xls file!');
        }
        $extention = $path->getClientOriginalExtension();
        if($extention == 'xls' OR $extention == 'csv'){

            $flag = 0;
            $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    if($flag == 0){
                        ++$flag;
                        if(!empty($org)){
                            $input['orgid'] = $org;
                        }else{
                            
                            $input['orgid'] = Auth::user()->orgid;
                        }
                        $input['user_id'] =Auth::user()->id;
                        $input['sailDate'] =date('Y-m-d');
                        $lastinsertedid = Order::create($input)->id;

                        $ostatus['orderid'] = $lastinsertedid;
                        $ostatus['orderstatus'] = 'initial';
                        $ostatus['statusdate'] = date('Y-m-d');
                        $ostatus['bookingstatus'] ='initial';
                        OrderStatus::create($ostatus);
                    }

                    $insert['order_id'] = $lastinsertedid;
                    $insert['item_id'] = $value->order_id_required;
                    $insert['user_id'] = Auth::user()->id;
                    $insert['order_date'] = $value->order_date;
                    $insert['order_value'] = $value->order_value;
                    $insert['service'] = $value->requested_service;
                    $insert['ship_to_name'] = $value->ship_to_name;
                    $insert['ship_to_company'] = $value->ship_to_company;
                    $insert['ship_to_add1'] = $value->ship_to_address_1;
                    $insert['ship_to_add2'] = $value->ship_to_address_2;
                    $insert['ship_to_add3'] = $value->ship_to_address_3;
                    $insert['ship_to_state'] = $value->ship_to_stateprovince;
                    $insert['ship_to_city'] = $value->ship_to_city;
                    $insert['ship_to_pincode'] = $value->ship_to_postal_code;
                    $insert['ship_to_country'] = $value->ship_to_country;
                    $insert['ship_to_phone'] = $value->ship_to_phone;
                    $insert['ship_to_email'] = $value->ship_to_email;
                    $insert['total_weight'] = $value->total_weight_in_oz;
                    $insert['dimensions_length'] = $value->dimensions_length;
                    $insert['dimensions_width'] = $value->dimensions_width;
                    $insert['dimensions_height'] = $value->dimensions_height;
                    $insert['customer_notes'] = $value->notes_from_customer;
                    $insert['internal_notes'] = $value->notes_internal;
                    $insert['gift_wrap'] = $value->gift_wrap;
                    $insert['gift_messages'] = $value->gift_message;
                    $validator = Validator::make(['item_id' => $value->order_id_required],
                        ['item_id' => 'required'] );
                    if ($validator->fails()){
                        return Redirect::back()->with('msg_delete', 'Something went Wrong');
                    }else{
                        if(!empty($insert)){
                            $savedata = Item::create($insert);
                            /*Insert role */
//                            $insertedId = $savedata->id;
//                            $rolearray = array('user_id'=>$insertedId,'role_id'=>2);
//                            DB::table('role_user')->insert($rolearray);
//                            /*for user activity */
//                            $description = array('description'=>'User Added with xls/csv');
//                            $this->foo->users_activity($description);
                        }
                    }
                }
                if(!empty($insert)){
                    return Redirect('orderlist')->with('msg_success', 'Successfully xls/csv data insert!');

                }

            }
        }else{
            return Redirect::back()->with('msg_delete', 'Please choose CSV file!');
        }
    }

    public function xlsexport($id){
        $items = Item::select('item_id as Order ID (required)','order_date as Order Date','order_value as Order Value', 'service as Requested Service','ship_to_name as Ship To - Name','ship_to_company as Ship To - Company','ship_to_add1 as Ship To - Address 1','ship_to_add2 as Ship To - Address 2','ship_to_add3 as Ship To - Address 3','ship_to_state as Ship To - State/Province','ship_to_city as Ship To - City','ship_to_pincode as Ship To - Postal Code','ship_to_country as Ship To - Country','ship_to_phone as Ship To - Phone','ship_to_email as Ship To - Email','total_weight as Total Weight in Oz','dimensions_length as Dimensions - Length','dimensions_width as Dimensions - Width','dimensions_height as Dimensions - Height','customer_notes as Notes - From Customer','internal_notes as Notes - Internal','gift_wrap as Gift Wrap?','gift_messages as Gift Message')->where('order_id',$id)->orderBy('id', 'DESC')->get();
        Excel::create('orders', function($excel) use($items) {
            $excel->sheet('Sheet 1', function($sheet) use($items) {
                $sheet->fromArray($items);
            });
        })->export('csv');
    }

    public function importtracking($id){
        return view('order.importtracking',compact('id'));
    }
    public function importcsvtracking(Request $request)
    {
        $path = $request->file('file');
        $order_id = $request->input('order_id');
        if(empty($path)){
            return Redirect::back()->with('msg_delete', 'Please choose CSV file!');
        }
        $extention = $path->getClientOriginalExtension();
        if($extention == 'xls' OR $extention == 'csv'){
            $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {

                    $insert['order_id'] = $order_id;
                    $insert['item_id'] = $value->printed_message;
                    $insert['user_id'] = Auth::user()->id;
                    $insert['print_date'] = $value->print_date;
                    $insert['amount'] = $value->amount_paid;
//                    $insert['adj_amount'] = $value->adj_amount;
                    $insert['quoted_amt'] = $value->quoted_amount;
                    $insert['recipient'] = $value->recipient;
                    $insert['status'] = $value->status;
                    $insert['tracking_id'] = $value->tracking;
                    $insert['date_delivered'] = $value->date_delivered;
                    $insert['carrier'] = $value->carrier;
                    $insert['class_service'] = $value->class_service;
                    $insert['insured_value'] = $value->insured_value;
                    $insert['insurance_id'] = $value->insurance_id;
                    $insert['cost_code'] = $value->cost_code;
                    $insert['weight'] = $value->weight;
                    $insert['ship_date'] = $value->ship_date;
                    $insert['refund_type'] = $value->refund_type;
                    $insert['user'] = $value->user;
                    $insert['refund_request_date'] = $value->refund_request_date;
                    $insert['refund_status'] = $value->refund_status;
                    $insert['refund_requested'] = $value->refund_requested;
                    $insert['reference1'] = $value->reference1;
                    $insert['reference2'] = $value->reference2;

                    $validator = Validator::make(['item_id' => $value->printed_message],
                        ['item_id' => 'required|unique:trackings'] );
                    if ($validator->fails()){
                        return Redirect::back()->with('msg_delete', 'Something went Wrong');
                    }else{
                        if(!empty($insert)){
                            Trackings::create($insert);
                            /*Insert role */
//                            $insertedId = $savedata->id;
//                            $rolearray = array('user_id'=>$insertedId,'role_id'=>2);
//                            DB::table('role_user')->insert($rolearray);
//                            /*for user activity */
//                            $description = array('description'=>'User Added with xls/csv');
//                            $this->foo->users_activity($description);
                        }
                    }
                }
                
                 $totalTrackig = Trackings::select('trackings.*','item.*')
                                    ->join('item','trackings.item_id','=','item.item_id')
                                    ->where('trackings.order_id',$order_id)
                                    ->where('item.order_id',$order_id)
                                    ->get();
                                    
                $totalItem = Item::where('order_id',$order_id)->get();
                
                        if(count($totalTrackig) == count($totalItem)){
                                $stat = array(
                                    'status' => 'booked'
                                );
                            Item::where('order_id',$order_id)->update($stat);
                            $o_stat = array(
                                    'orderstatus' => 'booked'
                                );
                            OrderStatus::where('orderid',$order_id)->update($o_stat);
                        }
                
                if(!empty($insert)){
                    return Redirect('orderlist')->with('msg_success', 'Successfully xls/csv data insert!');
                }
            }
        }else{
            return Redirect::back()->with('msg_delete', 'Please choose xls file!');

        }
    }
    public function xlsexporttracking($id)
    {
        $items = Trackings::select('item_id as SHIP TO ORDER ID', 'ship_date as Ship Date', 'tracking_id as Tracking Id', 'amount as Cost')->where('order_id', $id)->orderBy('id', 'DESC')->get();
        Excel::create('tracking', function ($excel) use ($items) {
            $excel->sheet('Sheet 1', function ($sheet) use ($items) {
                $sheet->fromArray($items);
            });
        })->export('csv');
    }
    public function changeitemstatus(Request $request) {

        if($request->btype){
        switch($request->btype) {

            case 'confirm':
                $item_id = $request->check_item;
                $count = count($item_id);
                if($count >0) {
                    for ($i = 0; $i < $count; $i++) {

                        $send_array = array(
                            'user_id' => Auth::user()->id,
                            'status' => 'confirm',
                        );
                        Item::where('item_id', $item_id[$i])->update($send_array);
                    }
                
                    $totalItem = Item::where('order_id', $request->orderID)->get();
                    $totalConfirm = Item::where('order_id', $request->orderID)->where('status','confirm')->get();
                    if(count($totalItem) == count($totalConfirm)){
                        $o_stat = array(
                                    'orderstatus' => 'confirm'
                                );
                        OrderStatus::where('orderid',$request->orderID)->update($o_stat);
                        
                    }
                    return Redirect::back()->with('msg_success', 'Item Status updated successfuly');
                }else{
                    return Redirect::back()->with('msg_delete', 'Please select atleast one item');
                }
                break;

            case 'cancel':
                $item_id = $request->check_item;
                $count = count($item_id);
                if($count >0) {
                    for ($i = 0; $i < $count; $i++) {
                        $send_array = array(
                            'user_id' => Auth::user()->id,
                            'status' => 'cancel',
                        );
                        Item::where('item_id', $item_id[$i])->update($send_array);
                    }
                    return Redirect::back()->with('msg_success', 'Item Status updated successfuly');
                }else{
                    return Redirect::back()->with('msg_delete', 'Please select atleast one item');
                }
                break;

            case 'split':
                
                $item_id = $request->check_item;
                $count = count($item_id);
                if($count >0) {
                    if($request->split == 'new'){
                     
                    $input['user_id'] =Auth::user()->id;
                    $input['sailDate'] =date('Y-m-d');
                    $input['orgid'] =$request->orgid11;
                    $lastinsertedid = Order::create($input)->id;
                    
                    $status['orderid'] =$lastinsertedid;
                    $status['statusdate'] =date('Y-m-d');
                    $status['orderstatus'] = 'initial';
                    $status['bookingstatus'] ='initial';
                    
                    OrderStatus::insert($status);
                    for ($i = 0; $i < $count; $i++) {
                        $send_array = array(
                            'user_id' => Auth::user()->id,
                            'order_id'=> $lastinsertedid,
                            'status' => 'initial',
                        );
                        Item::where('item_id', $item_id[$i])->update($send_array);
                    }
                }else{
                
                    for ($i = 0; $i < $count; $i++) {
                        $send_array = array(
                            'user_id' => Auth::user()->id,
                            'order_id'=> $request->orgid,
                            'status' => 'initial',
                        );
                        Item::where('item_id', $item_id[$i])->update($send_array);
                    }
                }    
                    return Redirect('orderlist')->with('msg_success', 'Item split successfuly');
                }else{
                    return Redirect::back()->with('msg_delete', 'Please select atleast one item');
                }
                break;
            
            case 'dispatch':
                $item_id = $request->check_item;
                $count = count($item_id);
                if($count >0) {
                    for ($i = 0; $i < $count; $i++) {

                        $send_array = array(
                            'user_id' => Auth::user()->id,
                            'status' => 'dispatched',
                        );
                        Item::where('item_id', $item_id[$i])->update($send_array);
                    }
                
                    $totalItem = Item::where('order_id', $request->orderID)->get();
                    $totalConfirm = Item::where('order_id', $request->orderID)->where('status','dispatched')->get();
                    if(count($totalItem) == count($totalConfirm)){
                        $o_stat = array(
                                    'orderstatus' => 'dispatched'
                                );
                        OrderStatus::where('orderid',$request->orderID)->update($o_stat);
                        
                    }
                    return Redirect::back()->with('msg_success', 'Item Status updated successfuly');
                }else{
                    return Redirect::back()->with('msg_delete', 'Please select atleast one item');
                }
                break;
                      
        }

        }else{
            return Redirect::back()->with('msg_delete', 'Please select atleast one item');
        }
        }
}
