@extends('Layout.AdminLayout')

@section('AdminStyles')
    
@endsection

@section('AdminContent')
    <div class="container px-4 py-2">
        <div class="row">
            <h2>lists of users</h2>
        </div>
    </div>
    <div class="container bg-white">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div class="py-4">
                    <a href="{{ route('users.create') }}"  class="btn bg-primary text-white ">
                        <i class="fas fa-plus-circle pr-2"></i>
                            Add user
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
                            <th>user</th>
                            <th>email</th>
                            <th>Added Date</th>
                            <th>roles</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        {{$role->name}}--
                                    @endforeach
                                    
                                </td>
                                <td class="d-flex align-items-center justify-content-start">
                                    <i class="fas fa-edit icon "></i>
                                    <i class="fas fa-trash icon"></i>
                                </td>
                            </tr>
                        @endforeach                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection