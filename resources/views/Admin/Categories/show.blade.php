@extends('Layout.AdminLayout')

@section('AdminStyles')
    
@endsection

@section('AdminContent')
    <div class="container px-4 py-2">
        <div class="row">
            <h2>show Category</h2>
        </div>
    </div>
    <div class="container bg-white">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div class="py-4">
                    <a href="{{ route('categories.index') }}"  class="btn bg-primary text-white ">
                        <i class="fas fa-plus-circle pr-2"></i>
                            back to lis
                    </a>
                </div>
            </div>
            <div class="col-lg-12 p-4 ">
                <h2>Category : <span>{{ $category->name }}</span></h2>
                <h2>Slug : <span>{{ $category->slug }}</span></h2>
            </div>
        </div>
    </div>
@endsection