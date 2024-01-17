<x-admin-layout>
    <h2 class="main_page_title">Company - {{$company_with_id -> company_name}}</h2>

    <div class="form_container">
        <form method="post" action="{{url('/redirect/admin-publishing-company-edit', $company_with_id->company_id)}}">
            @csrf

            <div class="input_container">
                <label for="company_name" class="form-label" style="width: 280px">Company Name</label>
                <input type="text" class="admin_edit_form form-control" id="company_name" name="company_name" value="{{$company_with_id -> company_name}}">
            </div>
            @error('company_name')
            <div class="error_display">{{ $message }}</div>
            @enderror

            <div class="input_container">
                <label for="company_address" class="form-label" style="width: 280px">Company Address</label>
                <input type="text" class="admin_edit_form form-control" id="company_address" name="company_address" value="{{$company_with_id -> company_address}}">
            </div>
            @error('company_address')
            <div class="error_display">{{ $message }}</div>
            @enderror

            <div class="input_container">
                <label for="company_phone" class="form-label" style="width: 280px">Company Phone</label>
                <input type="text" class="admin_edit_form form-control" id="company_phone" name="company_phone" value="{{$company_with_id -> company_phone}}">
            </div>
            @error('company_phone')
            <div class="error_display">{{ $message }}</div>
            @enderror

            <div class="edit_button">
                <button type="submit">Save changes</button>
            </div>
        </form>
    </div>
</x-admin-layout>