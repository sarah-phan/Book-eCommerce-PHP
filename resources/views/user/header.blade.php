<div class="main_header">
    <div class="row">
        <div class="col-2">
            <a href="{{url('/')}}">
                <img src="{{asset('image/Logo.svg')}}" alt="Logo" />
            </a>
        </div>
        <div class="col-7" style="padding-left: 8%;">
            <div class="input-group header_search_box">
                <div class="dropdown">
                    <div class="dropdown-toggle category_button" type="button" data-bs-hover="dropdown" aria-expanded="false">Category</div>
                    <div class="dropdown-menu category_menu_box">
                        <ul class="category_menu border">
                            <li><a class="dropdown-item" href="#">Action before</a></li>
                            <li><a class="dropdown-item" href="#">Another action before</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <input type="text" class="form-control dropdown-input header_search_input" placeholder="What are you finding?">
                <button class="btn dropdown-search-button" type="button" id="button-addon2">
                    <img src="{{asset('image/icon/Search.svg')}}" alt="Account Icon" />
                </button>
            </div>
        </div>
        <div class="col-3 header_option">
            <div class="row">
                @include('user/account-function')
            </div>
        </div>
    </div>
</div>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="user_breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
    </ol>
</nav>