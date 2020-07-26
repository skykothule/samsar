<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class OrderStatus extends Authenticatable
{
    use Notifiable;
    protected $presenter = UserPresenter::class;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'OrderStatus';
    protected $fillable = ['orderid', 'orderstatus', 'statusdate','bookingstatus'];

}
