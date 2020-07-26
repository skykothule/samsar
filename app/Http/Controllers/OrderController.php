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
use App\Order;
use App\Company;
use App\Trackings;
use App\OrderStatus;
use View;
use Route;
class OrderController extends Controller
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
        if (Auth::user()->hasRole('Customer')) {

            $orderdata = order::select('OrderDetails.*','users.first_name','users.last_name','tbl_company.company_name','OrderStatus.orderstatus','OrderStatus.bookingstatus')
                ->join('users','OrderDetails.user_id','=','users.id')
                ->leftjoin('tbl_company','OrderDetails.orgid','=','tbl_company.id')
                ->leftjoin('OrderStatus','OrderDetails.orderid','=','OrderStatus.orderid')
                ->where('users.orgid',Auth::user()->orgid)
//            ->orWhereRaw("username like '%{$searchname}%'")
//            ->orWhere('email', 'LIKE', '%'. $searchname .'%')
                ->orderBy('OrderDetails.orderid', 'DESC')
                ->paginate(20);

        }else{
            $orderdata = order::select('OrderDetails.*','OrderDetails.orgid as comp','users.first_name','users.last_name','tbl_company.company_name','OrderStatus.orderstatus','OrderStatus.bookingstatus')
                ->join('users','OrderDetails.user_id','=','users.id')
                ->leftjoin('tbl_company','OrderDetails.orgid','=','tbl_company.id')
                ->leftjoin('OrderStatus','OrderDetails.orderid','=','OrderStatus.orderid')
                ->orderBy('OrderDetails.orderid', 'DESC')
//            ->whereRaw("username like '%{$searchname}%'")
//            ->orWhereRaw("username like '%{$searchname}%'")
//            ->orWhere('email', 'LIKE', '%'. $searchname .'%')
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

            order::create($input);
            /*for user activity */
            $description = array('description'=>'Order Placed');
            $this->foo->users_activity($description);
            return Redirect('createorder')->with('msg_success', 'Order Placed Successfuly');
        }
    }

    public function show($id)
    {
        $orderdata = order::where('id',$id)->get();
        return view('order.order_view',compact('orderdata'));
    }


    public function importorder(Request $request){
        return view('order.import');
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
        if(empty($path)){
            return Redirect::back()->with('msg_delete', 'Please choose xls file!');
        }
        $extention = $path->getClientOriginalExtension();
        if($extention == 'xls' OR $extention == 'csv'){
            $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert['order_id'] = $value->order_id;
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
                    $validator = Validator::make(['order_id' => $value->order_id],
                        ['order_id' => 'required|unique:orders'] );
                    if ($validator->fails()){
                        return Redirect::back()->with('msg_delete', 'Order ID must be unique');
                    }else{
                        if(!empty($insert)){
                            $savedata = order::create($insert);
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
            return Redirect::back()->with('msg_delete', 'Please choose xls file!');

        }
    }

    public function xlsexport(){
        $users = User::select('first_name','last_name','email', 'username','address','country','phone','gender','date_of_birth','role','status')->orderBy('id', 'DESC')->get();
        Excel::create('users', function($excel) use($users) {
            $excel->sheet('Sheet 1', function($sheet) use($users) {
                $sheet->fromArray($users);
            });
        })->export('xls');
    }

    public function sailUpdate(Request $request){

        $validator = Validator::make($request->all(), [
            'orderid' =>'required',
            'sail_date' => 'required',
            'tracking_id' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->with('msg_delete', 'Something went wrong');
        }else{
            $data = Trackings::where('item_id',$request->orderid)->get();

            if(count($data)>0) {
                $input = array(
                    'user_id' => Auth::user()->id,
                    'ship_date' => $request->sail_date,
                    'tracking_id' => $request->tracking_id
                );
                Trackings::where('item_id',$request->orderid)->update($input);
                $status = array(
                    'bookingstatus' => 'transfer'
                    );
                OrderStatus::where('orderid',$request->orderid)->update($status); 
                return Redirect::back()->with('msg_success', 'sail date and tracking id updated successfully');

            }else {
                $input = array(
                    'item_id' => $request->orderid,
                    'order_id' => $request->orderid,
                    'user_id' => Auth::user()->id,
                    'ship_date' => $request->sail_date,
                    'tracking_id' => $request->tracking_id
                );
                Trackings::create($input);
                $status = array(
                    'bookingstatus' => 'transfer'
                    );
                OrderStatus::where('orderid',$request->orderid)->update($status);    
                return Redirect::back()->with('msg_success', 'sail date and tracking id added successfully');
            }
        }
    }

    public function bedispatch($id)
    {
        $status = array(
            'bookingstatus' => 'AtSortFacility-USA'
        );
        OrderStatus::where('orderid',$id)->update($status);
        return Redirect::back()->with('msg_success', 'Being Dispatch status updated successfully');
    }
    public function dispatch($id){
        $status = array(
            'bookingstatus' => 'ProcessedAtSort-USA'
        );
        OrderStatus::where('orderid',$id)->update($status);
        return Redirect::back()->with('msg_success', 'Dispatch status updated successfully');
    }
}
