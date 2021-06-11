<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['shipping_fullName','shipping_email','shipping_address','shipping_city','shipping_state','shipping_zipcode','order_number','total_price','total_item','payement_method'];
}
