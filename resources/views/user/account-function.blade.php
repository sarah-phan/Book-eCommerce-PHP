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
<div class="col-6 header_cart">
    <button class="cart_button btn">
        <span class="cart_icon">
            <img src="{{asset('image/icon/Cart.svg')}}" alt="Cart Icon" />
        </span>
        <span class="cart_label">Cart</span>
    </button>
</div>