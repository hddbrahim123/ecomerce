<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        if(session('success_message')){
            toast(session('success_message'),'success');
        }

        $banner = Banner::first();
        $products = Product::all();
        return view('client.home' ,[
            'banner'=>$banner,
            'products'=>$products
        ]);
    }
}
