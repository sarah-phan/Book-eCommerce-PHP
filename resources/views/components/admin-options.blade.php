<?php
$url = '';
switch ($getUrl) {
    case ('/redirect/admin-user-main'):
        $url = $getUrl;
        break;
    case ('/redirect/admin-book-main'):
        $url = $getUrl;
        break;
    case ('/redirect/admin-order-main'):
        $url = $getUrl;
        break;
    case ('/redirect/admin-category-main'):
        $url = $getUrl;
        break;
    case ('/redirect/admin-subcategory-main'):
        $url = $getUrl;
        break;
    case ('/redirect/admin-publishing-company-main'):
        $url = $getUrl;
        break;
    case ('/redirect/admin-author-main'):
        $url = $getUrl;
        break;
    case ('/redirect/admin-review-and-rating-main'):
        $url = $getUrl;
        break;
}
?>

<div class="admin_option">
    <div class="delete_option" onclick="location.href='{{ $url }}/edit'">
        <img src="{{asset('image/icon/Trash.svg')}}" alt="Trash Icon" />
    </div>
    <div class="show_detail_option" onclick="location.href='{{ $url }}/edit'">
        <img src="{{asset('image/icon/Information.svg')}}" alt="Information Icon" />
    </div>
</div>