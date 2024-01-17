<x-admin-layout>
    <h2 class="main_page_title">Author - {{$author_with_id -> author_name}}</h2>

    <div class="form_container">
        <form method="post" action="{{url('/admin-author-edit', $author_with_id->author_id)}}">
            @csrf

            <div class="input_container">
                <label for="author_name" class="form-label">Author Name</label>
                <input type="text" class="admin_edit_form form-control" id="author_name" name="author_name" value="{{$author_with_id -> author_name}}">
            </div>
            @error('company_name')
            <div class="error_display">{{ $message }}</div>
            @enderror

            <div class="edit_button">
                <button type="submit">Save changes</button>
            </div>
        </form>
    </div>
</x-admin-layout>