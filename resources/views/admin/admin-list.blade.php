<?php
$title = '';
$transformedData = [];
$columns = [];
$segment = request()->segment(2);
switch ($segment) {
    case "admin-user-main":
        $title = "User";
        // dd($data);
        $transformedData = $data->map(function ($item) {
            // dd($item->user_phone);
            return [
                'id' => (string) $item->user_id,
                'user_name' => $item->user_name,
                'email' => $item->email,
                'user_phone' => $item->user_phone,
                'options' => function () use ($item) {
                    return view('components.admin-options', ['getUrl' => '/redirect/admin-user-main/' . $item->user_id])->render();
                }
            ];
        });

        $columns = [
            'id' => 'ID',
            'user_name' => 'Full Name',
            'email' => 'Email',
            'user_phone' => 'Phone Number',
            'options' => 'Options'
        ];

        break;
    case "admin-shipping-information-main":
        $title = "Shipping information";

        $transformedData = $data->map(function ($item) {
            return [
                'shipping_information_id' => (string) $item['shipping_information_id'],
                'user_name' => $item['user_name'],
                'receiver_name' => $item['receiver_name'],
                'receiver_phone' => $item['receiver_phone'],
                'address' => $item['address'],
            ];
        });
        
        $columns = [
            'shipping_information_id' => 'ID',
            'user_name' => 'User Name',
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

        $transformedData = $data->map(function ($item) {
            return [
                'author_id' => (string) $item->author_id,
                'author_name' => $item->author_name,
                'options' => function () use ($item) {
                    return view('components.admin-options', ['getUrl' => '/redirect/admin-author-main/' . $item->author_id])->render();
                }
            ];
        });

        $columns = [
            'author_id' => "ID",
            'author_name' => "Author Name",
            'options' => 'Options'
        ];
        break;

    case "admin-category-main":
        $title = "Category";

        $transformedData = $data->map(function ($item) {
            return [
                'category_id' => (string) $item->category_id,
                'category_name' => $item->category_name,
                'options' => function () use ($item) {
                    return view('components.admin-options', ['getUrl' => '/redirect/admin-category-main/' . $item->category_id])->render();
                }
            ];
        });

        $columns = [
            'category_id' => "ID",
            'category_name' => "Category Name",
            'options' => 'Options'
        ];

        break;
    case "admin-subcategory-main":
        $title = "Subcategory";

        $transformedData = $data->map(function ($item) {
            return [
                'category_id' => (string) $item['category_id'],
                'category_name' => $item['category_name'],
                'subcategory_id' => $item['subcategory_id'],
                'subcategory_name' => $item['subcategory_name'],
                'options' => function () use ($item) {
                    return view('components.admin-options', ['getUrl' => '/redirect/admin-subcategory-main/' . $item['subcategory_id']])->render();
                }
            ];
        });

        $columns = [
            'category_id' => "Category ID",
            'category_name' => "Category Name",
            'subcategory_id' => "Subcategory ID",
            'subcategory_name' => 'Subcategory Name',
            'options' => 'Options'
        ];

        break;

    case "admin-publishing-company-main":
        $title = "Publishing Company";

        $transformedData = $data->map(function ($item) {
            return [
                'company_id' => (string) $item->company_id,
                'company_name' => $item->company_name,
                'company_address' => $item->company_address,
                'company_phone' => $item->company_phone,
                'options' => function () use ($item) {
                    return view('components.admin-options', ['getUrl' => '/redirect/admin-publishing-company-main/' . $item->company_id])->render();
                }
            ];
        });

        $columns = [
            'company_id' => "ID",
            'company_name' => "Company Name",
            'company_address' => 'Company Address',
            'company_phone' => "Company Phone",
            'options' => 'Options'
        ];
        break;
    case "admin-order-main":
        $title = "Book";

        $columns = [
            'order_id' => 'ID',
            'user_id' => "User ID",
            'shipping_id' => 'Shipping ID',
            'order_status' => 'Order Status',
            'order_date' => 'Order Date',
            'transaction_id' => 'Transaction ID',
            'payment_type' => 'Payment Type',
            'payment_status' => 'Payment Status'
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

<div class="main_page_container">
    <h2 class="main_page_title">{{$title}}</h2>

    @if(session()->has('message'))
    <p class="success_message">{{session()->get('message')}}</p>
    @endif

    <x-admin-search />

    <a href="/redirect/{{$segment}}/add" class="add_data_button">
        Add {{$title}}
    </a>

    <x-admin-table :rows="$transformedData" :columns="$columns" />
</div>
@endsection