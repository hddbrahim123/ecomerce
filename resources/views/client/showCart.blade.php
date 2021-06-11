@extends('Layout.Layout')

@section('ClientContent')
<div class="container mt-4">
    <h2 class="text-center">Shooping Cart</h2>
</div>
<div class="container p-4">
    <div class="row">
        @if($cart)
        <div class="col-lg-8">
            <table class="table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->items as $product)
                        <tr>
                            <td>
                                <div class="d-flex">
                                <img src="{{ Storage::url($product['photo'] ?? null) }}" alt="{{ $product['name'] }}" width="70px" height="60px" />
                                    <div class="pl-2">
                                        {{ $product ['name'] }}<br />
                                        ******
                                    </div>  
                                </div> 
                            </td>
                            <td>${{ $product['price'] }}</td>
                            <td class="">
                                <form action="{{ route('cart.update',[ 'product' => $product['id'] ]) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="d-flex">
                                    <input type="number" name="qty" value="{{ $product['qty'] }}">
                                    <button class="btn bg-primary ml-2" type="submit">Change</button>
                                </div>
                                </form> 
                            </td>
                            <td>
                                <form action="{{ route('cart.remove' , ['product' => $product['id'] ]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn" ><i class="fas fa-trash icon"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary">
                    Your Cart
                </div>
                <div class="card-body">
                    <h4 class="card-title">total amount : $ {{$cart->totalPrice}}</h4>
                    <p class="card-text">total Quantity : {{ $cart->totalQty }}</p>
                    <a href="{{ route('checkout') }}" class="btn bg-primary">procedure to checkout</a>
                </div>
            </div>
        </div>
        @else
            Cart is Empty                    
        @endif
    </div>
</div>

@endsection