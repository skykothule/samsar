<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class trackings extends Authenticatable
{
    use Notifiable;
    protected $presenter = UserPresenter::class;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'trackings';
    protected $fillable = ['item_id', 'order_id', 'user_id', 'print_date', 'amount', 'adj_amount', 'quoted_amt', 'recipient', 'status', 'tracking_id', 'date_delivered', 'carrier', 'class_service', 'insured_value', 'insurance_id', 'cost_code', 'weight', 'ship_date', 'refund_type', 'user', 'refund_request_date', 'refund_status', 'refund_requested', 'reference1', 'reference2'];
}
