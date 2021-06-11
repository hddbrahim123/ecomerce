<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug' , 'description' , 'price' , 'quantity' , 'status' ,'category_id', 'meta_title' , 'meta_description' , 'meta_keywords' , 'user_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function photo()
    {
        return $this->hasOne(Photo::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
