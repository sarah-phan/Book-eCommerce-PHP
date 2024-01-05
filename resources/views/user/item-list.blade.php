<?php
$unit_price = 163800;
$unit_price_formatted = number_format($unit_price, 0, '', ',');
?>

<div class="item_list">
    <div class="row">
        <div class="col-3">
            <a class="card" style="width: 15rem;" href="">
                <img src="https://salt.tikicdn.com/cache/280x280/ts/product/3e/b8/7b/d4ac28e5e26e50815b96547fd4f868b6.jpg.webp" class="card-img-top" alt="englishGrammarInUse">
                <div class="card-body">
                    <p class="card-text book_name">English Grammar in Use Book w Ans</p>
                    <span class="card-text rating">
                        <x-show-all-star :rating_number=4 :size_number=13 />
                    </span>
                    <span class="quantity_remaining">
                        Only 5 left
                    </span>
                    <p class="card-title book_price" id="book_price_id">
                        <?php echo $unit_price_formatted; ?>
                        <sup>₫</sup>
                    </p>
                </div>
            </a>
        </div>
    </div>
</div>