@extends('layouts.admin')
@section('content')
<h2 class="main_page_title">Add - Subcategory</h2>
<div class="form_container">
    <form method="POST" action="{{url('/redirect/admin-subcategory-edit', $subcategory_with_id->subcategory_id)}}">
        @csrf

        <p>Choose appropriate category</p>
        @foreach($category_data as $data)
        <div class="form-check">
            <input 
                class="form-check-input" 
                type="radio" 
                name="category_id" 
                id="{{$data->category_name}}" 
                value="{{$data->category_id}}" 
                {{ $subcategory_with_id->category_id == $data->category_id ? 'checked' : '' }}
            >
            <label class="form-check-label" for="{{$data->category_name}}">
                <label class="form-check-label" for="{{$data->category_name}}">
                    {{$data->category_name}}
                </label>
        </div>
        @endforeach

        <div class="input_container">
            <label for="subcategory_name" class="form-label" style="width: 210px;">Subcategory Name</label>
            <input 
                type="text" 
                class="form-control" 
                id="subcategory_name" 
                name="subcategory_name" 
                value="{{$subcategory_with_id->subcategory_name}}"
            >
        </div>
        @error('subcategory_name')
        <div class="error_display">{{ $message }}</div>
        @enderror

        <div class="submit_form">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection