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

        $transformedData = $data->map(function ($item) {
            return [
                'book_id' => $item['book_id'],
                'title' => $item['title'],
                'author' => $item['author_name'],
                'publishing_company_name' => $item['publishing_company_name'],
                'book_isbn' => $item['book_isbn'],
                'number_of_page' => $item['number_of_page'],
                'cover_type' => $item['cover_type'],
                'price' => $item['price'],
                'inventory_quantity' => $item['inventory_quantity'],
                'category' => $item['category'],
                'subcategory' => $item['subcategory'],
                'options' => function () use ($item) {
                    return view('components.admin-options', ['getUrl' => '/redirect/admin-book-main/' . $item['book_id']])->render();
                }
            ];
        });

        $columns = [
            'book_id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'publishing_company_name' => 'Publishing Company Name',
            'book_isbn' => 'ISBN-13',
            'number_of_page' => "Number of pages",
            'cover_type' => 'Cover type',
            'price' => 'Price',
            'inventory_quantity' => 'Inventory Quantity',
            'category' => 'Category',
            'subcategory' => 'Subcategory',
            'options' => 'Options'
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
};
?>

<x-admin-layout>


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
</x-admin-layout>
