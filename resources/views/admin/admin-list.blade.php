<?php
$title = '';
$data = [];
$columns = [];
$segment = request()->segment(2);
switch ($segment) {
    case "admin-user-main":
        $title = "User";
        $data = [
            ['number' => 1, 'id' => '02', 'name' => 'Otto', 'email' => 'email', 'phone_number' => '0932621284', 'options' => function () {
                return view('components.admin-options')->with([
                    'getUrl' => '/redirect/admin-user-main/edit'
                ])->render();
            }],
        ];

        $columns = [
            'id' => 'ID',
            'user_name' => 'Full Name',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'options' => 'Options'
        ];

        break;
    case "admin-shipping-information-main":
        $title = "Shipping information";

        $columns = [
            'shipping_information_id' => 'ID',
            'user_id' => 'User ID',
            'receiver_name' => 'Receiver name',
            'receiver_phone' => 'Receiver phone',
            'address' => "Address",
        ];
        break;
    case "admin-book-main":
        $title = "Book";

        $columns = [
            'book_id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'publishing_company_id' => 'Publishing Company ID',
            'book_isbn' => 'ISBN',
            'number_of_page' => "Number of pages",
            'cover_type' => 'Cover type',
            'price' => 'Price',
            'description' => 'Description',
            'inventory_quantity' => 'Inventory Quantity',
            'category' => 'Category',
            'subcategory' => 'Subcategory',
        ];
        break;
    case "admin-author-main":
        $title = "Author";

        $columns = [
            'author_id' => "ID",
            'author_name' => "Author Name",
        ];
        break;
    case "admin-publishing-company-main":
        $title = "Book";

        $columns = [
            'publishing_company_id' => "ID",
            'publishing_company_name' => "Company Name",
            'publishing_company_address' => 'Company Address',
            'publishing_company_phone' => "Company Phone",
        ];
        break;
    case "admin-category-main":
        $title = "Book";

        $columns = [
            'category_id' => "Category ID",
            'category_name' => "Category Name",
            'subcategory_id' => 'Subcategory ID',
            'subcategory_name' => "Subcategory Name",
        ];
        break;
    case "admin-order-main":
        $title = "Book";

        $columns = [
            'book_id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'publishing_company_id' => 'Publishing Company ID',
            'book_isbn' => 'ISBN',
            'number_of_page' => "Number of pages",
            'cover_type' => 'Cover type',
            'price' => 'Price',
            'description' => 'Description',
            'inventory_quantity' => 'Inventory Quantity',
            'category' => 'Category',
            'subcategory' => 'Subcategory',
        ];
        break;
    case "admin-review-and-rating-main":
        $title = "Review and Rating";

        $columns = [
            'review_and_rating_id' => 'ID',
            'user_id' => 'User ID',
            'book_id' => 'Book ID',
            'rating' => 'Rating',
            'review_content' => "Review Content",
        ];
        break;
};

?>


@extends('layouts.admin')
@section('content')
<h2 class="main_page_title">{{$title}}</h2>
<x-admin-search />
<a href="/redirect/{{$segment}}/add" class="add_data_button" style="
        background-color:#2E3192; 
        color:white; 
        text-decoration:none; 
        margin-left: 20px;
        margin-top: 25px;
        display: block;
        width: fit-content;
        padding: 12px;
        border-radius: 10px;">
    Add {{$title}}
</a>
<x-admin-table :rows="$data" :columns="$columns" />
@endsection