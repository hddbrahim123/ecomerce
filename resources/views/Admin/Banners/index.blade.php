@extends('Layout.AdminLayout')

@section('AdminStyles')
    
@endsection

@section('AdminContent')
    <div class="container px-4 py-2">
        <div class="row">
            <h2>Banners</h2>
        </div>
    </div>
    <div class="container bg-white">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div class="py-4">
                    <a href="{{ route('banners.create') }}"  class="btn bg-primary text-white ">
                        <i class="fas fa-plus-circle pr-2"></i>
                            Add Banner
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
                            <th>Banner</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Aded Add</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                    <img src="{{ Storage::url($banner->image ?? null) }}" alt="{{ $banner->title }}" width="70px" height="60px" />
                                    </div> 
                                </td>
                                <td>
                                    {{ $banner->title }}<br />
                                </td>
                                <td>{!! $banner->description !!}</td>
                                <td>{{ $banner->created_at->diffForHumans() }}</td>
                                <td>
                                    @if($banner->status)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">InActive</span>
                                    @endif
                                </td>

                                <td class="d-flex align-items-center justify-content-start">
                                    <a href="{{ route('banners.show',['banner' => $banner->id]) }}">
                                        <i class="fas fa-eye icon pr-3"></i>
                                    </a>
                                    <a href="{{ route('banners.edit' , ['banner' => $banner->id]) }}">
                                        <i class="fas fa-edit icon "></i>
                                    </a>
                                    <form action="{{ route('banners.destroy' , ['banner' => $banner->id])}}" method="POST">
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