<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
   protected $primaryKey = 'category_row_id';

   public function total_products(){
      return $this->hasOne('App\Models\Product', 'category_id', 'category_row_id');
   }
}
