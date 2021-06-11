@extends('Layout.AdminLayout')

@section('AdminStyles')
    
@endsection

@section('AdminContent')
    <div class="container px-4 py-2">
        <div class="row">
            <h2>Products</h2>
        </div>
    </div>
    <div class="container bg-white">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div class="py-4">
                    <a href="{{ route('products.create') }}"  class="btn bg-primary text-white ">
                        <i class="fas fa-plus-circle pr-2"></i>
                            Add Product
                    </a>
                </div>
                <div class="py-4">
                    <form class="form-inline">
                        <div class="form-group">
                          <label for="search">Search</label>
                          <input type="text" id="search" class="form-control mx-sm-3" >
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12 p-4 ">
                <table class="table">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Added Date</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                    <img src="{{ Storage::url($product->photo->path ?? null) }}" alt="{{ $product->name }}" width="70px" height="60px" />
                                        <div class="pl-2">
                                            {{ $product->name }}<br />
                                            ******
                                        </div>  
                                    </div> 
                                </td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->created_at->diffForHumans() }}</td>
                                <td>${{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    @if($product->status)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">InActive</span>
                                    @endif
                                </td>

                                <td class="d-flex align-items-center justify-content-start">
                                    <a href="{{ route('products.show',['product' => $product->id]) }}">
                                        <i class="fas fa-eye icon pr-3"></i>
                                    </a>
                                    <a href="{{ route('products.edit' , ['product' => $product->id]) }}">
                                        <i class="fas fa-edit icon "></i>
                                    </a>
                                    <form action="{{ route('products.destroy' , ['product' => $product->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn">
                                            <i class="fas fa-trash icon"></i>
                                        </button>    
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection