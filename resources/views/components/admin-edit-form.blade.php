<form method="post" action="" class="admin_edit_form"> <!-- Replace '/submit-form' with your form submission URL -->
    @csrf <!-- CSRF token for form security -->

    @foreach ($data as $key => $value)
    <div class="form-group admin_edit_input">
        <label for="{{ $key }}">{{ $labels[$key] ?? $key }}</label>
        <input 
            type="text" 
            class="form-control" 
            id="{{ $key }}" 
            name="{{ $key }}" 
            value="{{ $value }}"
            disabled
        >
    </div>
    @endforeach

    <div class="admin_edit_button">
        <button type="button" class="btn admin_edit_edit_button" id="editButton">Edit</button>
        <button type="submit" class="btn admin_edit_submit_button">Submit</button>
    </div>
</form>