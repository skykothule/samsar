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

class ProfileController extends Controller
{
    public function profileView(){
        
        return view('profile.profilePageView');
    }
    
    public function gpoint(){
        return view('profile.gpointPageView');
    }
    
    public function ticket(){
        return view('profile.ticketPageView');
    }
    
    public function redeeption(){
        return view('profile.redeeptionPageView');
    }
    
    public function myAddress(){
        return view('profile.myAddressPageView');
    }
    
    public function addAddress(){
        return view('profile.addAddressPageView');
    }
    
    public function myOrder(){
        return view('profile.myOrderPageView');
    }
    
    public function wishList(){
        return view('profile.wishListPageView');
    }
    
}
