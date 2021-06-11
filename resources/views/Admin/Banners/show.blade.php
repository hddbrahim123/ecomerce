@extends('Layout.AdminLayout')

@section('AdminStyles')
    
@endsection

@section('AdminContent')
    <div class="container px-4 py-2">
        <div class="row">
            <h2>Banner Details</h2>
        </div>
    </div>
    <div class="container bg-white">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div class="py-4">
                    <a href="{{ route('banners.index') }}"  class="btn bg-primary text-white ">
                        <i class="fas fa-plus-circle pr-2"></i>
                            back to lis
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <img src="{{ Storage::url($banner->image)}}" alt="{{ $banner->title }}" class="img-fluid img-thumbnail" width="100%" height="30px" />
                </div>
            </div>
            <div class="col-lg-6 py-4">
                <h2>{{ $banner->title }}</h2>
                <p class="py-2">Added date : <span  class="text-muted">{{ $banner->created_at->diffForHumans() }}</span></p>  
                <h6 class="pt-3">Description :</h6>
                <p class="text-muted">{!! $banner->description !!}</p>
                <button class="btn bg-primary text-white">Buy Now</button>
            </div>
        </div>
    </div>
@endsection