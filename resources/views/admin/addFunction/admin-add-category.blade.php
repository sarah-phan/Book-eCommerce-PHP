<x-admin-layout>
    <h2 class="main_page_title">Add - Category</h2>
    <div class="form_container">
        <form method="POST" action="{{url('/redirect/admin-add-category')}}">
            @csrf

            <div class="input_container">
                <label for="category_name" class="form-label">Catogory Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name">
            </div>
            @error('category_name')
            <div class="error_display">{{ $message }}</div>
            @enderror

            <div class="submit_form">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</x-admin-layout>