<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Campaigns extends Model
{
    public static function getActiveCampagin(){
    	$result = DB::table('tbl_campagins')
    				->select('tbl_campagins.*','mst_product.*')
    				->join('mst_product','mst_product.id','=','tbl_campagins.product_id')
    				->where('tbl_campagins.is_delete',0)
    				->get();
    	return $result;			
    }
}
