<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NNN.vn</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>

<body>
    <div class="register_container">
        <div class="back_to_homepage">
            <a href="/">
                <img src="{{asset('image/icon/Left Arrow.svg')}}" alt="Left Arrow Icon" />
                <span>Back</span>
            </a>
        </div>
        <div class="register_content">
            <div class="register_logo">
                <img src="{{asset('image/Logo.svg')}}" alt="Logo" />
            </div>
            <div class="register_form_content">
                <form method="POST" action="{{route('register')}}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="user_name" required name="user_name">
                        <label for="user_name">Full name</label>
                        @error('user_name')
                        <div class="register_error_display">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" :value="old('email')" required name="email">
                        <label for="email">Email address</label>
                        @error('email')
                        <div class="register_error_display">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3" style="display: flex;">
                        <input type="password" class="form-control password_field_input" id="password" required name="password">
                        <label for="password">Password</label>
                        <img class="password_field_icon" src="{{asset('image/icon/Show Password.svg')}}" onclick="togglePasswordVisibility()"/>
                        @error('password')
                        <div class="register_error_display">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3" style="display: flex;">
                        <input type="password" class="form-control password_confirmation_field_input" id="password_confirmation" required name="password_confirmation">
                        <label for="password_confirmation">Confirm password</label>
                        <img class="password_confirmation_field_icon" src="{{asset('image/icon/Show Password.svg')}}" onclick="togglePasswordVisibilityForConfirmation()"/>
                        @error('password_confirmation')
                        <div class="register_error_display">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="phone" class="form-control" id="phone_number" required name="user_phone">
                        <label for="phone_number">Phone number</label>
                        @error('user_phone')
                        <div class="register_error_display">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="{{asset('js/show-hide-password.js')}}"></script>
</body>

</html>