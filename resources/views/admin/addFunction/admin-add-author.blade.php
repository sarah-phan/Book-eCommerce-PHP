<x-admin-layout>
    <h2 class="main_page_title">Add - Author</h2>
    <div class="form_container">
        <form method="POST" action="{{url('/redirect/admin-author')}}">
            @csrf

            <div class="input_container">
                <label for="author_name" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="author_name" name="author_name">
            </div>
            @error('author_name')
            <div class="error_display">{{ $message }}</div>
            @enderror

            <div class="submit_form">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</x-admin-layout>