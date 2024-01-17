<x-admin-layout>
    <h2 class="main_page_title">Add - Subcategory</h2>
    <div class="form_container">
        <form method="POST" action="{{url('/admin-add-subcategory')}}">
            @csrf

            <p>Choose appropriate category</p>
            @foreach($data as $data)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="category_id" id="{{$data->category_name}}" value="{{$data->category_id}}">
                <label class="form-check-label" for="{{$data->category_name}}">
                    {{$data->category_name}}
                </label>
            </div>
            @endforeach

            <div class="input_container">
                <label for="subcategory_name" class="form-label" style="width: 210px;">Subcategory Name</label>
                <input type="text" class="form-control" id="subcategory_name" name="subcategory_name">
            </div>
            @error('subcategory_name')
            <div class="error_display">{{ $message }}</div>
            @enderror

            <div class="submit_form">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</x-admin-layout>