@extends('layouts.admin')
@section('content')
<h2 class="main_page_title">Add - Publishing Company</h2>
<div class="form_container">
    <form method="POST" action="{{url('/redirect/admin-publishing-company')}}">
        @csrf
        
        <div class="input_container">
            <label for="company_name" class="form-label" style="width: 280px">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name">
        </div>
        @error('company_name')
        <div class="error_display">{{ $message }}</div>
        @enderror
        
        <div class="input_container">
            <label for="company_address" class="form-label" style="width: 280px">Company Address</label>
            <input type="text" class="form-control" id="company_address" name="company_address">
        </div>
        @error('company_address')
        <div class="error_display">{{ $message }}</div>
        @enderror
       
        <div class="input_container">
            <label for="company_phone" class="form-label" style="width: 280px">Company phone number</label>
            <input type="text" class="form-control" id="company_phone" name="company_phone">
        </div>
        @error('user_phone')
        <div class="error_display">{{ $message }}</div>
        @enderror
        
        <div class="submit_form">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection