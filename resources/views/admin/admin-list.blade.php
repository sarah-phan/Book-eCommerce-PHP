<?php
$title = '';
$data = [];
$columns = [];
$segment = request()->segment(2);
switch ($segment) {
    case "admin-user-main":
        $title = "User";
        $data = [
            ['number' => 1, 'id' => '02', 'name' => 'Otto', 'phone_number' => '0932621284', 'options' => function () {
                return view('components.admin-options')->with([
                    'getUrl' => '/redirect/admin-user-main'
                ])->render();
            }],
            ['number' => 1, 'id' => '02', 'name' => 'Otto', 'phone_number' => '0932621284', 'options' => function () {
                return view('components.admin-options')->with([
                    'getUrl' => '/redirect/admin-user-main'
                ])->render();
            }],
        ];

        $columns = [
            'number' => 'Number',
            'id' => 'ID',
            'name' => 'Name',
            'phone_number' => 'Phone Number',
            'options' => 'Options'
        ];

        break;

    case "admin-book-main":
        $title = "Book";
        $data = [
            ['number' => 1, 'id' => '01', 'name' => 'Otto', 'inventory_quantity' => '12', 'options' => function () {
                return view('components.admin-options')->with([
                    'getUrl' => '/redirect/admin-book-main'
                ])->render();
            }],
            ['number' => 1, 'id' => '02', 'name' => 'Otto', 'inventory_quantity' => '12', 'options' => function () {
                return view('components.admin-options')->with([
                    'getUrl' => '/redirect/admin-book-main'
                ])->render();
            }],
        ];

        $columns = [
            'number' => 'Number',
            'id' => 'ID',
            'name' => 'T',
            'inventory_quantity' => 'Inventory Quantity',
            'options' => 'Options'
        ];
        break;

    case "admin-order-main":
        $title = "Order";
        $data = [
            [
                'number' => 1,
                'order_id' => '01',
                'book_id' => '01',
                'user_id' => '01',
                'order_status' => 'Pending',
                'order_date' => '05/01/2024',
                'total_price' => '230.000',
                'options' => function () {
                    return view('components.admin-options')->with([
                        'getUrl' => '/redirect/admin-order-main'
                    ])->render();
                }
            ],
            [
                'number' => 1,
                'order_id' => '01',
                'book_id' => '01',
                'user_id' => '01',
                'order_status' => 'Pending',
                'order_date' => '05/01/2024',
                'total_price' => '230.000',
                'options' => function () {
                    return view('components.admin-options')->with([
                        'getUrl' => '/redirect/admin-order-main'
                    ])->render();
                }
            ],
        ];

        $columns = [
            'number' => 'Number',
            'order_id' => 'Order ID',
            'book_id' => 'Book ID',
            'user_id' => 'User ID',
            'order_status' => 'Status',
            'order_date' => 'Date',
            'total_price' => 'Total Price',
            'options' => 'Options'
        ];
        break;
    case "admin-category-main":
        $title = "Category";
        $data = [
            [
                'number' => 1,
                'category_id' => '01',
                'category_name' => "Children book",
                'options' => function () {
                    return view('components.admin-options')->with([
                        'getUrl' => '/redirect/admin-category-main'
                    ])->render();
                }
            ],
        ];

        $columns = [
            'number' => 'Number',
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
            'options' => 'Options'
        ];
        break;
    case "admin-subcategory-main":
        $title = "Sub-Category";
        $data = [
            [
                'number' => 1,
                'category_id' => '01',
                'subcategory_id' => "01",
                'subcategory_name' => "Coloring",
                'options' => function () {
                    return view('components.admin-options')->with([
                        'getUrl' => '/redirect/admin-subcategory-main'
                    ])->render();
                }
            ],
        ];

        $columns = [
            'number' => 'Number',
            'category_id' => 'Category ID',
            'subcategory_id' => 'Sub-category ID',
            'subcategory_name' => 'Sub-category Name',
            'options' => 'Options'
        ];
        break;
    case "admin-publishing-company-main":
        $title = "Publishing company";
        $data = [
            [
                'number' => 1,
                'company_id' => '01',
                'company_name' => "Coloring",
                'options' => function () {
                    return view('components.admin-options')->with([
                        'getUrl' => '/redirect/admin-publishing-company-main'
                    ])->render();
                }
            ],
        ];

        $columns = [
            'number' => 'Number',
            'company_id' => 'Publishing company ID',
            'company_name' => "Publishing company Name",
            'options' => 'Options'
        ];
        break;
    case "admin-author-main":
        $title = "Publishing company";
        $data = [
            [
                'number' => 1,
                'author_id' => '01',
                'author_name' => "Coloring",
                'options' => function () {
                    return view('components.admin-options')->with([
                        'getUrl' => '/redirect/admin-author-main'
                    ])->render();
                }
            ],
        ];

        $columns = [
            'number' => 'Number',
            'author_id' => 'Author ID',
            'author_name' => "Author Name",
            'options' => 'Options'
        ];
        break;
    case "admin-review-and-rating-main":
        $title = "Review and rating";
        $data = [
            [
                'number' => 1,
                'review_and_rating_id' => '01',
                'rating' => 5,
                'review_content' => "Coloring",
                'user_id' => 1,
                'book_id' => 1,
            ],
        ];

        $columns = [
            'number' => 'Number',
            'review_and_rating_id' => 'ID',
            'rating' => 'Rating',
            'review_content' => "Review Content",
            'user_id' => 'User ID',
            'book_id' => 'Book ID',
        ];
        break;
};

?>


@extends('layouts.admin')
@section('content')
<h2 class="main_page_title">{{$title}}</h2>
<x-admin-search />
<x-admin-table :rows="$data" :columns="$columns" />
@endsection