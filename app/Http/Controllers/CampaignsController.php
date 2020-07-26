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
use App\Campaigns;
use Mail;
use View;
use Route;
use Auth;

class CampaignsController extends Controller
{
    public function campaigns(){
        $campagin_list = Campaigns::getActiveCampagin();
        return view('campagin.campagin',compact('campagin_list'));
    }
}
