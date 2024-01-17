<div class="col-6 header_account">
    @if(Route::has('login'))
    @auth
    <div class="dropdown">
        <div class="dropdown-toggle account_button" type="button" data-bs-hover="dropdown" aria-expanded="false">
            <span class="account_icon">
                <img src="{{asset('image/icon/Account.svg')}}" alt="Account Icon" />
            </span>
            <span class="account_label">
                Hi, {{Auth::user()->user_name}}
            </span>
        </div>
        <div class="dropdown-menu account_menu_box">
            <ul class="account_menu border">
                <li><a class="dropdown-item" href="/show-account-detail">Account Information</a></li>
                <li><a class="dropdown-item" href="#">My order</a></li>
                <li>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
            </ul>
        </div>
    </div>
    @else
    @include('auth/login')
    @endauth
    @endif
</div>

<?php
$totalProduct = 0;
if (Illuminate\Support\Facades\Auth::user()) {
    $userId = Illuminate\Support\Facades\Auth::user()->user_id;
    $cartExisted = App\Models\Cart::where('user_id', $userId)->first();
    $totalProduct = $cartExisted->book->count();
}
?>
<div class="col-6 header_cart">
    <button class="cart_button btn" onclick="window.location.href='/cart'">
        <span class="cart_icon position-relative">
            <img src="{{asset('image/icon/Cart.svg')}}" alt="Cart Icon" />
        </span>
        @if ($totalProduct !== 0)
        <span class="position-absolute translate-middle badge rounded-pill bg-danger">
            {{$totalProduct}}
            <span class="visually-hidden">unread messages</span>
        </span>
        @endif
        <span class="cart_label">Cart</span>
    </button>
</div>