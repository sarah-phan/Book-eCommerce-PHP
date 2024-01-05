@extends('layouts.admin')
@section('content')
<h2 class="main_page_title">User</h2>
<x-admin-search />
<?php
$data = [
    ['number' => 1, 'id' => '01', 'name' => 'Otto', 'avatar' => ''],
    ['number' => 1, 'id' => '02', 'name' => 'Otto', 'avatar' => ''],
];

$columns = [
    'number' => 'Number',
    'id' => 'ID',
    'name' => 'Name',
    'avatar' => 'Avatar',
    // 'options' => 'Options'
];
?>
<x-admin-table :rows="$data" :columns="$columns"/>

@endsection