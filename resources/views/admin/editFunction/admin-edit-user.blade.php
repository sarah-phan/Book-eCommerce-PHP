<x-admin-layout>
    <h2 class="main_page_title">User - {{$user_with_id -> user_name}}</h2>

    <div class="form_container">
        <form method="post" action="{{url('/redirect/admin-user-edit', $user_with_id->user_id)}}">
            @csrf

            <div class="input_container">
                <label for="user_name" class="form-label">Full Name</label>
                <input type="text" class="admin_edit_form form-control" id="user_name" name="user_name" value="{{$user_with_id -> user_name}}">
            </div>
            @error('user_name')
            <div class="error_display">{{ $message }}</div>
            @enderror

            <div class="input_container">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="admin_edit_form form-control" id="email" name="email" value="{{$user_with_id -> email}}">
            </div>
            @error('email')
            <div class="error_display">{{ $message }}</div>
            @enderror

            <div class="input_container">
                <label for="user_phone" class="form-label">Phone number</label>
                <input type="text" class="admin_edit_form form-control" id="user_phone" name="user_phone" value="{{$user_with_id -> user_phone}}">
            </div>
            @error('user_phone')
            <div class="error_display">{{ $message }}</div>
            @enderror

            <div class="edit_button">
                <button type="submit">Save changes</button>
            </div>
        </form>
    </div>
</x-admin-layout>