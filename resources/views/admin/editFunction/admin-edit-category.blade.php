@extends('layouts.admin')
@section('content')
<h2 class="main_page_title">Category - {{$category_with_id->category_name}}</h2>
<div class="form_container">
    <form method="POST" action="{{url('/redirect/admin-category-edit', $category_with_id->category_id)}}">
        @csrf
        
        <div class="input_container">
            <label for="category_name" class="form-label">Catogory Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" value="{{$category_with_id->category_name}}">
        </div>
        @error('category_name')
        <div class="error_display">{{ $message }}</div>
        @enderror
        
        <div class="submit_form">
            <button type="submit">Save</button>
        </div>
    </form>
</div>
@endsection