<div class="product_detail_wrapper">
    <div class="main_info">
        <div class="author">
            <span>Author:</span>
            @foreach($bookData->author as $data)
            <span class="author_name">{{$data->author_name}}</span>{{ $loop->last ? '' : ', ' }}
            @endforeach
        </div>
        <h5 class="book_title">{{$bookData->title}}</h5>
        <div class="rating">
            <span class="rating_number">4.0</span>
            <span class="rating_star">
                <x-show-all-star :rating_number=4 :size_number=13 />
            </span>
            <span class="total_number_of_comment">(2597)</span>
        </div>
        <div id="priceContainer" data-price="{{$bookData->price}}">
            <h4>
                <?php
                $unit_price_formatted = number_format($bookData->price, 0, '', ',');
                ?>
                {{$unit_price_formatted}}
            </h4>
        </div>
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
                    {{$bookData->publishing_company->company_name}}
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
                    {{$bookData->ISBN}}
                </p>

            </div>
            <hr />
            <div class="col-6 detail_info_label">
                <p>
                    Cover type
                </p>
            </div>
            <div class="col-6">
                <p>{{$bookData->cover_type}}</p>
            </div>
        </div>
    </div>
    <div class="product_description">
        <p class="product_description_title">Product Description</p>
        <span class="product_description_content" id="text_content">
            {{$bookData->description}}
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