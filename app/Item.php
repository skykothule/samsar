<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class item extends Authenticatable
{
    use Notifiable;
    protected $presenter = UserPresenter::class;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'item';
    protected $fillable = ['item_id', 'order_id', 'user_id', 'order_date', 'order_value', 'service', 'ship_to_name', 'ship_to_company', 'ship_to_add1', 'ship_to_add2', 'ship_to_add3', 'ship_to_state', 'ship_to_city', 'ship_to_pincode', 'ship_to_country', 'ship_to_phone', 'ship_to_email', 'total_weight', 'dimensions_length', 'dimensions_width', 'dimensions_height', 'customer_notes', 'internal_notes', 'gift_wrap', 'gift_messages'];
}
