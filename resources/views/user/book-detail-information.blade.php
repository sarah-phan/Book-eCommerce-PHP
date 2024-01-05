<?php
$unit_price = 163800;
$unit_price_formatted = number_format($unit_price, 0, '', ',');
?>

<div class="product_detail_wrapper">
    <div class="main_info">
        <div class="author">
            Author:
            <span class="author_name">Raymond Murphy</span>
        </div>
        <h5 class="book_title">English Grammar in Use Book w Ans</h5>
        <div class="rating">
            <span class="rating_number">4.0</span>
            <span class="rating_star">
                <x-show-all-star :rating_number=4 :size_number=13 />
            </span>
            <span class="total_number_of_comment">(2597)</span>
        </div>
        <h4>
            <?php echo $unit_price_formatted; ?>
            <sup>₫</sup>
        </h4>
    </div>
    <div class="detail_info">
        <p class="detail_info_title">Detail information</p>
        <div class="row detail_info_content">
            <div class="col-6 detail_info_label">
                <p>
                    Publishing company
                </p>
            </div>
            <div class="col-6">
                <p>
                    Cambridge University
                </p>
            </div>
            <hr />
            <div class="col-6 detail_info_label">
                <p>
                    ISBN-13
                </p>
            </div>
            <div class="col-6">
                <p>
                    9781108430425
                </p>

            </div>
            <hr />
            <div class="col-6 detail_info_label">
                <p>
                    Cover type
                </p>
            </div>
            <div class="col-6">
                <p>Soft cover</p>
            </div>
        </div>
    </div>
    <div class="product_description">
        <p class="product_description_title">Product Description</p>
        <span class="product_description_content" id="text_content">
            The world's best-selling grammar series for learners of English. English Grammar in Use Fourth edition is an updated version of the world's best-selling grammar title. It has a fresh, appealing new design and clear layout, with revised and updated examples, but retains all the key features of clarity and accessibility that have made the book popular with millions of learners and teachers around the world. This 'with answers' version is ideal for self-study. An online version, book without answers, and book with answers and CD-ROM are available separately.
        </span>
        <span class="product_description_read_more" id="read_more" onclick="toggleText()">
            Read more
        </span>
    </div>
    <div class="service_guarantee">
        <p class="service_guarantee_title">Shop with confidence.</p>
        <div>
            <span class="service_guarantee_icon">
                <img src="{{asset('image/icon/Box.svg')}}" alt="Box Icon" />
            </span>
            <span class="service_guarantee_content_1">
                Allow to open and check
            </span>
            <span class="service_guarantee_content_2">on delivery</span>
        </div>
        <hr />
        <div>
            <span class="service_guarantee_icon">
                <img src="{{asset('image/icon/Loop.svg')}}" alt="Loop Icon" />
            </span>
            <span class="service_guarantee_content_1">
                111% refund
            </span>
            <span class="service_guarantee_content_2">for counterfeits.</span>
        </div>
        <hr />
        <div>
            <span class="service_guarantee_icon">
                <img src="{{asset('image/icon/Return.svg')}}" alt="Return Icon" />
            </span>
            <span class="service_guarantee_content_1">
                Free 30-day home returns
            </span>
            <span class="service_guarantee_content_2">for defects.</span>
        </div>
    </div>
</div>