@extends('Layout.AdminLayout')

@section('AdminStyles')
    
@endsection

@section('AdminContent')
    <div class="container px-4 py-2">
        <div class="row">
            <h2>Categories</h2>
        </div>
    </div>
    <div class="container bg-white">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div class="py-4">
                    <a href="{{ route('categories.create') }}"  class="btn bg-primary text-white ">
                        <i class="fas fa-plus-circle pr-2"></i>
                            Add category
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
                            <th>Title</th>
                            <th>slug</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td scope="row">{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td class="d-flex align-items-center justify-content-start">
                                    <a href="{{ route('categories.show',['category' => $category->id]) }}">
                                        <i class="fas fa-eye icon pr-3"></i>
                                    </a>
                                    <a href="{{ route('categories.edit' , ['category' => $category->id]) }}">
                                        <i class="fas fa-edit icon "></i>
                                    </a>
                                    <form action="{{ route('categories.destroy' , ['category' => $category->id])}}" method="POST">
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