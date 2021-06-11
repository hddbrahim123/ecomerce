@extends('Layout.AdminLayout')

@section('AdminStyles')
    <link rel="stylesheet" href="{{asset('css/admin/dashboard.css')}}" />
@endsection

@section('AdminContent')

    <div class="container px-4 pt-4 pb-2">
        <h2>Dashboard</h2>
    </div>
    <div class="container px-4">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 p-2">
                <div class="card border_left">
                  <div class="card-body d-flex justify-content-between">
                      <div class="">
                          <h4 class="card-title">Categories</h4>
                          <p class="card-text">4</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-network-wired"></i>
                      </div>
                  </div>                  
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 p-2">
                <div class="card border_left">
                  <div class="card-body d-flex justify-content-between">
                      <div class="">
                          <h4 class="card-title">Products</h4>
                          <p class="card-text">100</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                      </div>
                  </div>                  
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 p-2">
                <div class="card border_left">
                  <div class="card-body d-flex justify-content-between">
                      <div class="">
                          <h4 class="card-title">Earning</h4>
                          <p class="card-text">$400</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-money-bill-alt"></i>
                      </div>
                  </div>                  
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 p-2">
                <div class="card border_left">
                  <div class="card-body d-flex justify-content-between">
                      <div class="">
                          <h4 class="card-title">Customers</h4>
                          <p class="card-text">4</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-users"></i>
                      </div>
                  </div>                  
                </div>
            </div>
        </div>
    </div>
    <div class="container px-4 pt-4 pb-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h2>Top Selling</h2>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>products</th>
                                <th>price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">React JS</td>
                                <td>$50</td>
                                <td>200</td>
                            </tr>
                            <tr>
                                <td scope="row">Vue JS</td>
                                <td>$50</td>
                                <td>200</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection