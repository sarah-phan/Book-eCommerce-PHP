<div class="login_modal_trigger" data-bs-toggle="modal" data-bs-target="#loginModal">
    <span class="account_icon">
        <img src="{{asset('image/icon/Account.svg')}}" alt="Account Icon" />
    </span>
    <span class="account_label">Account</span>
</div>
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-size" role="document">
        <div class="modal-content container">
            <div class="row">
                <div class="col-7 content_login_modal">
                    <h3>Hello,</h3>
                    <p class="request_for_login">Login or register</p>
                    <form method="POST" action="{{route('login')}}">
                        @csrf

                        @if ($errors->has('email'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const myModal = new bootstrap.Modal(document.getElementById('loginModal'), {});
                                myModal.show();
                            });
                        </script>
                        <p style="color:red">{{ $errors->first('email') }}</p>
                        @endif

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" required>
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating" style="display: flex;">
                            <input type="password" class="form-control password_field_input" id="password" placeholder="Password" name="password" required>
                            <label for="password">Password</label>
                            <img class="password_field_icon" src="{{asset('image/icon/Show Password.svg')}}" onclick="togglePasswordVisibility()"/>
                        </div>
                        <button type="submit" class="login_modal_submit_button">
                            Login
                        </button>
                        <div class="register_redirect">
                            <a>Forgot password?</a>
                            <p class="register_redirect_asking">Don't have account?
                                <a href="{{route('register')}}">Register</a>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="col-5 logo_login_modal">
                    <img src="{{asset('image/Logo.svg')}}" alt="Logo" />
                </div>
            </div>
            <div class="login_modal_close_button_container">
                <button type="button" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{asset('image/icon/Close.svg')}}" />
                </button>
            </div>
        </div>

    </div>
</div>