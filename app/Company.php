<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Company extends Authenticatable
{
    use Notifiable;
    protected $presenter = UserPresenter::class;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_company';

    protected $fillable = ['company_name','company_profile','address','country','document'];


}