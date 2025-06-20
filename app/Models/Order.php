<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillabel = ['user_id','total_price','order_code','status'];



    public function user(){
        return $this->belongsTo(User::class);
        
        
        }
        public function products(){
            return $this->belongsToMany(Product::class)->withPivot('qty','price')->withTimestamp();
            
            
            }


}
