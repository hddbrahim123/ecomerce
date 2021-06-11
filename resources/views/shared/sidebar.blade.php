<div class="sidebar">
    <div class="sidebar__brand d-flex justify-content-center align-items-center">
        <a href="/">EcomerceAppStore</a>
    </div>
    <div class="sidebar__menu">
        <div class="divider"></div>
        <div class="sidebar__link my-2">
            <i class="fas fa-tachometer-alt"></i>
            <a href="{{route('dashboard')}}">Dashboard</a>
        </div>
        <div class="divider"></div>
        <h2>Banner</h2>
        <div class="sidebar__link">
            <i class="fa fa-home"></i>
            <a href="#">logo</a>
        </div>
        <div class="sidebar__link">
            <i class="far fa-images"></i>
            <a href="{{ route('banners.index') }}">Banner</a>
        </div>
        <div class="divider"></div>
        <h2>Shop</h2>
        <div class="sidebar__link">
            <i class="fas fa-network-wired"></i>
            <a href="{{ route('categories.index') }}">Categories</a>
        </div>
        <div class="sidebar__link">
            <i class="fas fa-shopping-cart"></i>
            <a href="{{ route('products.index') }}">Products</a>
        </div>
        <div class="sidebar__link">
            <i class="fas fa-truck"></i>
            <a href="#">Orders</a>
        </div>
        <div class="sidebar__link">
            <i class="fas fa-comments"></i>
            <a href="{{ route('reviews.index') }}">Reviews</a>
        </div>
        <div class="divider"></div>
        <h2>managers</h2>
        <div class="sidebar__link">
            <i class="fa fa-home"></i>
            <a href={{route('users.index')}}>users</a>
        </div>
        <div class="divider"></div>
    </div>
</div>