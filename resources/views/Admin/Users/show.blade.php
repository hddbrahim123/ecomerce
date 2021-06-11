@extends('Layout.AdminLayout')

@section('AdminStyles')
    
@endsection

@section('AdminContent')
    <div class="container px-4 py-2">
        <div class="row">
            <h2>Profile Details</h2>
        </div>
    </div>
    <div class="container bg-white">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div class="py-4">
                    <a href="{{ route('users.index') }}"  class="btn bg-primary text-white ">
                        <i class="fas fa-plus-circle pr-2"></i>
                            back to lis
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                image
            </div>
            <div class="col-lg-6 py-4">
                <h2>{{ $user->name }}</h2>
                <p class="py-2">Added date : <span  class="text-muted">{{ $user->created_at->diffForHumans() }}</span></p>  
                <h6>Email :</h6>
                <h2 class="text-muted">{{ $user->email }}</h2>
                <h6>Roles :</h6>
                <h2 class="text-muted">
                    @foreach ($user->roles as $role)
                        {{ $role->name }}
                    @endforeach
                </h2>
            </div>
        </div>
    </div>
@endsection