<x-admin-layout>
    <h2 class="main_page_title">Add - User</h2>
    <div class="form_container">
        <form method="POST" action="{{url('/admin-add-user')}}">
            @csrf
            <div class="input_container">
                <label for="user_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="user_name" name="user_name">
            </div>
            @error('user_name')
            <div class="error_display">{{ $message }}</div>
            @enderror
            <div class="input_container">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            @error('email')
            <div class="error_display">{{ $message }}</div>
            @enderror
            <div class="input_container">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            @error('password')
            <div class="error_display">{{ $message }}</div>
            @enderror
            <div class="input_container">
                <label for="user_phone" class="form-label">Phone number</label>
                <input type="text" class="form-control" id="user_phone" name="user_phone">
            </div>
            @error('user_phone')
            <div class="error_display">{{ $message }}</div>
            @enderror
            <div class="submit_form">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</x-admin-layout>