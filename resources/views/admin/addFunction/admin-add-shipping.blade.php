<x-admin-layout>
    <h2 class="main_page_title">Add - Shipping Information</h2>
    <div class="form_container">
        <form method="POST" action="{{url('/redirect/admin-add-shipping-information')}}">
            @csrf

            <div class="input_container">
                <label class="form-label">Choose user</label>
                <select class="form-select" aria-label="Default select example" name="user_id">
                    <option value="">Select a user</option>
                    @foreach($userData as $data)
                    <option value="{{$data->user_id}}">{{$data->user_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input_container">
                <label for="receiver_name" class="form-label">Receiver Name</label>
                <input type="text" class="form-control" id="receiver_name" name="receiver_name">
            </div>
            @error('receiver_name')
            <div class="error_display">{{ $message }}</div>
            @enderror

            <div class="input_container">
                <label for="receiver_phone" class="form-label">Receiver Phone</label>
                <input type="text" class="form-control" id="receiver_phone" name="receiver_phone">
            </div>
            @error('receiver_phone')
            <div class="error_display">{{ $message }}</div>
            @enderror

            <div class="input_container">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            @error('address')
            <div class="error_display">{{ $message }}</div>
            @enderror

            <div class="submit_form">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</x-admin-layout>