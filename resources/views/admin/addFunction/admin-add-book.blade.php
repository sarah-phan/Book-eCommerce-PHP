@extends('layouts.admin')
@section('content')
<h2 class="main_page_title">Add - Book</h2>
<div class="form_container">
    <form method="POST" action="{{url('/redirect/admin-add-book')}}">
        @csrf

        <div class="input_container">
            <label for="title" class="form-label" style='width:230px'>Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        @error('title')
        <div class="error_display">{{ $message }}</div>
        @enderror

        <div class="input_container">
            <p class="category_label">Author</p>
            <div class="category_checkbox_container">
                @foreach($authorData as $data)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$data->author_id}}" id="{{$data->author_name}}" name="author_id[]">
                    <label class="form-check-label" for="{{$data->author_name}}">
                        {{$data->author_name}}
                    </label>
                </div>
                @endforeach
            </div>
        </div>

        <div class="input_container">
            <label class="form-label" style='width:230px'>Publishing Company</label>
            <select class="form-select" aria-label="Default select example" name="company_id">
                <option value="">Select a publishing company</option>
                @foreach($publishingCompanyData as $data)
                <option value="{{$data->company_id}}">{{$data->company_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="input_container">
            <label for="ISBN" class="form-label" style='width:230px'>ISBN-13</label>
            <input type="number" class="form-control" id="ISBN" name="ISBN">
        </div>
        @error('ISBN')
        <div class="error_display">{{ $message }}</div>
        @enderror

        <div class="input_container">
            <label for="page_number" class="form-label" style='width:230px'>Number of page</label>
            <input type="number" class="form-control" id="page_number" name="page_number">
        </div>
        @error('page_number')
        <div class="error_display">{{ $message }}</div>
        @enderror

        <div class="input_container">
            <p class="cover_type_label">Choose a cover type</p>
            <div class="radio_container">
                <div class="form-check" style="margin-bottom: 10px;">
                    <input class="form-check-input" type="radio" name="cover_type" id="soft_cover" value="Soft Cover" checked>
                    <label class="form-check-label" for="soft_cover" style="margin-top: 0px;">
                        Soft cover
                    </label>
                </div>
                <div class="form-check" style="margin-bottom: 10px;">
                    <input class="form-check-input" type="radio" name="cover_type" id="hard_cover" value="Hard Cover">
                    <label class="form-check-label" for="hard_cover" style="margin-top: 0px;">
                        Hard cover
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cover_type" id="boxset" value="Boxset">
                    <label class="form-check-label" for="boxset" style="margin-top: 0px;">
                        Boxset
                    </label>
                </div>
            </div>
        </div>

        <div class="input_container">
            <label for="price" class="form-label" style='width:230px'>Price</label>
            <input class="form-control" id="price" name="price" type="number" min='0'>
        </div>
        @error('price')
        <div class="error_display">{{ $message }}</div>
        @enderror

        <div class="input_container">
            <label for="description" class="form-label" style='width:230px'>Description</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>
        @error('description')
        <div class="error_display">{{ $message }}</div>
        @enderror

        <div class="input_container">
            <label for="inventory_quantity" class="form-label" style='width:230px'>Inventory Quantity</label>
            <input type="number" class="form-control" id="inventory_quantity" name="inventory_quantity" min='0'>
        </div>
        @error('inventory_quantity')
        <div class="error_display">{{ $message }}</div>
        @enderror

        <div class="input_container">
            <p class="category_label">Category</p>
            <div class="category_checkbox_container">
                @foreach($categoryData as $data)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$data->category_id}}" id="{{$data->category_name}}" name="category_id[]">
                    <label class="form-check-label" for="{{$data->category_name}}">
                        {{$data->category_name}}
                    </label>
                </div>
                @endforeach
            </div>
        </div>

        <div class="input_container">
            <p class="category_label">Subcategory</p>
            <div class="category_checkbox_container">
                @foreach($subcategoryCategoryData as $data)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$data['subcategory_id']}}" id="{{$data['subcategory_name']}}" name="subcategory_id[]">
                    <label class="form-check-label" for="{{$data['subcategory_name']}}">
                        {{$data['subcategory_name']}} - {{$data['category_name']}}
                    </label>
                </div>
                @endforeach
            </div>
        </div>

        <div class="input_container">
            <input type="file" name="profile_picture">
        </div>

        <div class="submit_form" style="margin-bottom:40px">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection