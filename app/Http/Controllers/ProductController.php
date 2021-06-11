<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $products = Product::whereUserId($id)->get();

        if(session('success_message')){
            toast(session('success_message'),'success');
        }

        return view('Admin.Products.index' , [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        $categories = Category::whereId($id)->get();
        return view('Admin.Products.create' , [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'] , '-');
        $data['user_id'] = Auth::id();
        
        $product = Product::create($data);

        if($request->hasFile('photo'))
        {
                $pathPhoto = $request->file('photo')->store('products');

                $photo = new Photo(['path'=>$pathPhoto]);
                $product->photo()->save($photo);
        }

        if($request->hasFile('images'))
        {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products');
                $img = new Image(['path'=>$path]);
                $product->images()->save($img);
            }
        }

        return redirect()->route('products.index')->withSuccessMessage('Product created SuccessFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('Admin.Products.show' , [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('Admin.Products.create' , [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'] , '-');

        if($request->hasFile('photo')){
            $path = $request->file('photo')->store('products');
            if($product->photo){
                Storage::delete($product->photo->path);
                $product->photo->path = $path;
                $product->photo->save();
            }else{
                $product->photo->save(Photo::create(['path'=>$path]));
            }
        }
        $product->update($data);

        return redirect()->route('products.index')->withSuccessMessage('Product Updated SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->photo->path);

        foreach( $product->images as $image)
        {
            Storage::delete($image->path);
        }
        $product->delete();
        return redirect()->route('products.index')->withSuccessMessage('Product Deleted SuccessFully');
    }
}
