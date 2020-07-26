<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\User;
use Mail;
use View;
use Route;
use Auth;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function authenticate(Request $request)
    {

        $credentials = $request->only('email', 'password');
        $exist_user = User::where('email',$request->email)->first();
        if($exist_user->email_verified == '1'){
            return redirect('login')->with('error', "Email not verified");
        }else{
            if (Auth::attempt($credentials)) {
                // Authentication passed...
                return redirect('/');
            }
        }
    }

    public function storeCustomer(Request $request){
    	ini_set("SMTP", "aspmx.l.google.com");
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'phone' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        }else{
            $data = array(
                'first_name'=> $request->first_name,
                'last_name'=> $request->last_name, 
                'email'=> $request->email, 
                'password' =>Hash::make($request->password),
                'phone'=> $request->phone,
                'status'=> "0"
            );
            $exist_user = User::where('email',$request->email)->get();

            if(count($exist_user) > 0){
            	return redirect('login')->with('error', "Email already in used");
            }else{
            	if(User::create($data)){
	            	$template = '<div style="width: 100%">
	                  <div style="background-color: #343a40;text-align: center">
	                        <img  src="http://ptcaredev.in/glee_dev_env/public/images/Group1@2x.png" style="max-width: 200px;padding: 10px;" alt="">
	                  </div> 
	                  <div style="text-align: center">
	                        <p><span style="font-size:22px;color:black">Hello <b>!!name!!</b></span></p>
	                        <p><span style="font-size:16px;color:black">Thanks for signing up.</span></p>
	                        <p><span style="font-size:16px;color:black">Please confirm your email address to get full access GLEE.</span></p>
	                        <a href="http://ptcaredev.in/glee_dev_env/verifyEmail?id=!!email!!"><p bgcolor="#008CC9" align="center" style="margin-left: 43%;padding:6px 16px;word-wrap:break-word;color:#ffffff;white-space:normal!important;font-weight:500;font-size:16px;border-color:#15c;background-color:#15c;border-radius:5px;border-style:solid;text-align:center;width:120px;text-decoration:none"> Confirm Email </p></a>
	                  </div> 
	                  <div style="background-color: #343a40;text-align: center">
	                            <br><br>
	                  </div>
	              </div> ';
	                $new_template = str_replace("!!name!!",$request->first_name.' '.$request->last_name,$template);
	                $new_template = str_replace("!!email!!",base64_encode($request->email),$new_template);

	                $to_name = $request->first_name.' '.$request->last_name;
	                $to_email = $request->email;
	                $data = array("body" => $new_template);
	                Mail::send(['html'=>'mail'], $data, function($message) use ($to_name, $to_email) {
	                    $message->to($to_email, $to_name)
	                        ->subject('GLEE Registration');
	                    $message->from(env("MAIL_FROM_ADDRESS"),'GLEE');
	                });
	                return redirect('login')->with('success', "Registration Successfully");
	            }else{
	                return redirect('login')->with('error', "Registration Failed");
	            }
            }
        }
    }

    public function verifyEmail(){
    	$data = array('email_verified' => '0', 'email_verified_at' => date('Y-m-d H:i:s'));
    	if(User::where('email',base64_decode($_GET['id']))->update($data)){
            return redirect('login')->with('success', "Email verified Successfully");
        }else{
            return redirect('login')->with('error', "Email verification Failed");
        }
    }

    public function verifyPasswordEmail(Request $request){
        ini_set("SMTP", "aspmx.l.google.com");
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('password/reset')->withErrors($validator)->withInput();
        }else{
            
            $exist_user = User::where('email',$request->email)->get();

            if(count($exist_user) > 0){
                return redirect('password/reset')->with('error', "Email already in used");
            }else{
                $template = '<div style="width: 100%">
                      <div style="background-color: #343a40;text-align: center">
                            <img  src="http://ptcaredev.in/glee_dev_env/public/images/Group 1.png" style="max-width: 200px;padding: 10px;" alt="">
                      </div> 
                      <div style="text-align: center">
                            <p><span style="font-size:22px;color:black">Hello <b>!!name!!</b></span></p>
                            <p><span style="font-size:16px;color:black">Thanks for signing up.</span></p>
                            <p><span style="font-size:16px;color:black">Please confirm your email address to get full access GLEE.</span></p>
                            <a href="http://ptcaredev.in/glee_dev_env/verifyEmail?id=!!email!!"><p bgcolor="#008CC9" align="center" style="margin-left: 43%;padding:6px 16px;word-wrap:break-word;color:#ffffff;white-space:normal!important;font-weight:500;font-size:16px;border-color:#15c;background-color:#15c;border-radius:5px;border-style:solid;text-align:center;width:120px;text-decoration:none"> Confirm Email </p></a>
                      </div> 
                      <div style="background-color: #343a40;text-align: center">
                                <br><br>
                      </div>
                  </div> ';
                $new_template = str_replace("!!name!!",$exist_user->first_name.' '.$exist_user->last_name,$template);
                $new_template = str_replace("!!email!!",base64_encode($request->email),$new_template);

                $to_name = $exist_user->first_name.' '.$exist_user->last_name;
                $to_email = $request->email;
                $data = array("body" => $new_template);
                Mail::send(['html'=>'mail'], $data, function($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)
                        ->subject('GLEE Password Reset');
                    $message->from(env("MAIL_FROM_ADDRESS"),'GLEE');
                });
                return redirect('password/reset')->with('success', "Registration Successfully");
            }
        }
    }

}
