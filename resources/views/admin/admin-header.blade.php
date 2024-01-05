<div class="admin_header_container">
    <div class="dropdown account_information_option">
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
                <li><a class="dropdown-item" href="">Account Information</a></li>
                <li>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
            </ul>
        </div>
    </div>
</div>