<?php
$title = '';
$data = [];
$label = [];
$segment = request()->segment(2);
switch ($segment) {
    case "admin-user-main":
        $title = "User";

        $data = [
            'user_id' => '01',
            'role' => 'user',
            'name' => 'Sarah Phan',
            'email' => 'sarahphan2314@gmail.com',
            'phone_number' => '0832621284',
            'address1' => '',
            'address2' => '',
        ];

        $label = [
            'user_id' => 'User ID',
            'role' => 'Role',
            'name' => 'Name',
            'email' => 'Email',
            "phone_number" => 'Phone number',
            "address1" => "Address 1",
            "address2" => "Address 2"
        ];

        break;
    case "admin-book-main":
        $title = "Book";

        $labels = [
            "book_id" => "Book ID",
            "book_name" => "Title",
            "book_ISBN" => "ISBN",
            "author" => "Author",
            "number_of_page" => "Number Of Page",
            "cover_type" => "Cover Type",
            "inventory_quantity" => "Inventory Quantity",
            "price" => "Price",
            "category_id" => "Category ID",
            "subcategory_id" => "Subcategory ID",
            "book_image" => "Book Image"
        ];
        break;
    case "admin-order-main":
        $title = "Order";
        break;
}
?>

@extends('layouts.admin')
@section('content')
<h2 class="main_page_title">Edit - {{$title}}</h2>
<x-admin-edit-form :labels="$label" :data="$data" />
@endsection