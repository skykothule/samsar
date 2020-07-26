<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use View;
use Auth;
use Session;
use Validator;
use App\Company;
use App\Foo;
use DB;

class CompanyController extends Controller
{
    protected $foo;
    public function __construct(Foo $foo)
    {
        $this->middleware('auth');
        $this->foo = $foo;
    }

    public function companyList(Request $request){
        $searchname = $request->input('search');
        $company = Company::whereRaw("company_name like '%{$searchname}%'")
            ->orWhereRaw("company_name like '%{$searchname}%'")
            ->orWhere('address', 'LIKE', '%'. $searchname .'%')
            ->orWhere('country', 'LIKE', '%'. $searchname .'%')
            ->orderBy('id', 'DESC')
            ->paginate(20);
        return view('company.company_list',compact('company'));
    }

    public function addCompany(){
        $country = DB::table('country')->get();
        return view('company.company_registration',compact('country'));
    }

    public function storeCompany(Request $request){
        $input = $request->all();
        $rules = array(
            'image' => 'required | mimes:jpeg,jpg,png,gif | max:5120',
            'comapny_name'=> 'required',
            'address' => 'required',
            'country' => 'required',
            'samplepdf' => 'mimes:pdf'
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->with('msg_delete', "Please provide proper inputs");
        }
        $logo = $request->file('image');
        if(!empty($logo)){
            $filename  = time() . '.' . $logo->getClientOriginalExtension();
            $request->file('image')->move('./uploads/logo/', $filename );
            $data['company_profile']=$filename;
        }else{
            $filename="";
        }
        $samplepdf = $request->file('samplepdf');
        if(!empty($samplepdf)){
            $pdffilename  = time() . '.' . $samplepdf->getClientOriginalExtension();
            $request->file('image')->move('./uploads/samplepdf/', $pdffilename );
            $data['hiring_pdf']=$pdffilename;
        }else{
            $pdffilename="";
        }

        $data = array(
            'company_name'=>$request->comapny_name,
            'address'=>$request->address,
            'country'=>$request->country,
            'company_profile'=>$filename,
            'hiring_pdf'=>$pdffilename
        );
        if(Company::create($data)){
            return redirect('company')->with('msg_success', "Company added successfully!");
        }else{
            return redirect('company')->with('msg_delete', "Data Not added! Please try again");
        }
    }

    public function companyEdit($id){
        $country = DB::table('country')->get();
        $company_data = Company::where('id',$id)->first();
        return view('company.company_edit',compact('country','company_data'));
    }

    public function companyUpdate(Request $request){
        $input = $request->all();
        $rules = array(
            'image' => 'mimes:jpeg,jpg,png,gif | max:5120',
            'comapny_name'=> 'required',
            'address' => 'required',
            'country' => 'required',
            'samplepdf' => 'mimes:pdf'
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->with('msg_delete', "Please provide proper inputs");
        }
        $data = array(
            'company_name'=>$request->comapny_name,
            'address'=>$request->address,
            'country'=>$request->country
        );
        $logo = $request->file('image');
        if(!empty($logo)){
            $filename  = time() . '.' . $logo->getClientOriginalExtension();
            $request->file('image')->move('./uploads/logo/', $filename );
            $data['company_profile']=$filename;
        }
        $samplepdf = $request->file('samplepdf');
        if(!empty($samplepdf)){
            $pdffilename  = time() . '.' . $samplepdf->getClientOriginalExtension();
            $request->file('image')->move('./uploads/samplepdf/', $pdffilename );
            $data['hiring_pdf']=$pdffilename;
        }

        if(Company::where('id',$request->comapny_id)->update($data)){
            return redirect('company')->with('msg_success', "Company Updated successfully!");
        }else{
            return redirect('company')->with('msg_delete', "Data Not Updated! Please try again");
        }
    }

    public function hrQuestionslist(){
        $questions = DB::table('mst_company_interview_qus')->select('mst_company_interview_qus.*','tbl_company.company_name')
            ->join('tbl_company','mst_company_interview_qus.compnay_id','=','tbl_company.id')
            ->orderBy('mst_company_interview_qus.id', 'DESC')
            ->get();
        return view('company.questionlist',compact('questions'));
    }

    public function hrQuestions(){
        $company = Company::get();
        return view('company.question',compact('company'));
    }
    public function storeQuestion(Request $request){
        $que = array(
            'compnay_id' => $request->company,
            'question' => $request->que,
            'option1' => $request->opt1,
            'option2' => $request->opt2,
            'option3' => $request->opt3,
            'option4' => $request->opt4,
            'answer' => $request->ans
        );

        if(DB::table('mst_company_interview_qus')->insert($que)){
            return Redirect::back()->with('msg_success', "Question created successfully!");
        }else{
            return Redirect::back()->with('msg_delete', "Data Not Inserted! Please try again");
        }
    }

    public function destroy($id)
    {
        $del = DB::table('mst_company_interview_qus')->where('id',$id)->delete();
        if($del) {
            /*for user activity */
            $description = array('description' => 'Question Delete.');
            $this->foo->users_activity($description);

            return Redirect::back()->with('msg_delete', "Question deleted successfully");
        }
    }

}