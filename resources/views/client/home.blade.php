@extends('Layout.Layout')

@section('ClientContent')
<div class="container">
    <div class="row">
        <div class="col-lg-6 d-flex flex-column align-items-start justify-content-center">
            <h2>{!! $banner->description !!}</h2>
            <button class="btn bg-primary">Shoop Now</button>
        </div>
        <div class="col-lg-6">
            <img src="{{ Storage::url($banner->image) }}" alt="{{ $banner->title }}" width="100%" />
        </div>
    </div>
</div>
<div class="container">
    <h2 class="text-center m-5">Arrivals Product</h2>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card text-left m-2">
                    <img class="card-img-top" src="{{Storage::url($product->photo->path)}}" alt="">
                    <div class="card-body">
                        <a href="{{ route('products.show' , ['product'=>$product->id]) }}"  class="card-title">{{$product->name}}</a>
                        <div class="d-flex justify-content-between align-items-center py-2">
                            <p class="card-text">${{$product->price}}</p>
                            <a href="{{ route('cart.add' , ['product'=> $product->id]) }}"> <i class="fas fa-shopping-cart"></i></a>
                        </div>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection