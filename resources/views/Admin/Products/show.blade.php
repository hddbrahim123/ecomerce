@extends('Layout.AdminLayout')

@section('AdminStyles')
    
@endsection

@section('AdminContent')
    <div class="container px-4 py-2">
        <div class="row">
            <h2>Product Details</h2>
        </div>
    </div>
    <div class="container bg-white">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div class="py-4">
                    <a href="{{ route('products.index') }}"  class="btn bg-primary text-white ">
                        <i class="fas fa-plus-circle pr-2"></i>
                            back to lis
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <img src="{{ Storage::url($product->photo->path)}}" alt="{{ $product->name }}" class="img-fluid img-thumbnail" width="100%" height="30px" />
                </div>
                @foreach ($product->images as $image)
                    <img src="{{ Storage::url($image->path)}}" alt="{{ $product->name }}" class="img-fluid img-thumbnail" width="60px" height="60px"/> 
               @endforeach
            </div>
            <div class="col-lg-6 py-4">
                <h2>{{ $product->name }}</h2>
                <p class="py-2">Added date : <span  class="text-muted">{{ $product->created_at->diffForHumans() }}</span></p>  
                <h6>Retail Price :</h6>
                <h2 class="text-muted">${{ $product->price }}</h2>
                <h6 class="py-4">Quantity : <span class="text-muted">{{ $product->quantity }}</span><br/></h6>
                
                <button class="btn bg-primary text-white">Buy Now</button>
                <button class="btn bg-primary text-white"><i class="fas fa-cart-plus"></i> Add To Cart</button>
                <h6 class="pt-3">Description :</h6>
                <p class="text-muted">{!! $product->description !!}</p>
            </div>
        </div>
    </div>
@endsection