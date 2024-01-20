<x-app-layout>
    <div class="cart_detail_wrapper">
        <div class="row cart_detail_row_wrapper">
            <div class="col-7">
                <div class="cart_wrapper">
                    <h4 class="cart_title">Shopping cart</h4>
                    <p class="cart_subtitle">There are {{$totalProduct}} items in your cart</p>
                    <div class="cart_header_wrapper">
                        <div class="row">
                            <div class="col-5">
                                <p>Book name</p>
                            </div>
                            <div class="col-2">
                                <p>Unit price</p>
                            </div>
                            <div class="col-2">
                                <p>Quantity</p>
                            </div>
                            <div class="col-2">
                                <p>Subtotal</p>
                            </div>
                            <div class="col-1">
                                <img src="{{asset('image/icon/Trash.svg')}}" alt="Trash Icon" />
                            </div>
                        </div>
                    </div>
                    <div class="cart_body_wrapper">
                        @if($bookData === [])
                        <p class="cart_subtitle" style="text-align: center; margin-bottom: 0;">There's nothing in the cart</p>
                        @else
                        @forEach($bookData as $data)
                        <?php
                        $imageUrl = \Illuminate\Support\Facades\Storage::url($data[0]);
                        ?>
                        <div class="row">
                            <div class="col-5">
                                <a class="cart_book_detail" href="">
                                    <img src="{{$imageUrl}}" class="card-img-top">
                                    <p>{{$data[1]}}</p>
                                </a>
                            </div>
                            <div class="col-2 cart_detail_unit_price">
                                <p>
                                    {{number_format($data[2], 0, '', ',')}}
                                </p>
                            </div>
                            <div class="col-2">
                                <form method="POST" action="/cart/update-cart/{{$data[4]}}/{{$data[5]}}">
                                    @csrf
                                    <div class="cart_group_input">
                                        <button type="submit" name="action" value="decrease" class="quantity_button">
                                            <img src="{{asset('image/icon/Decrease.svg')}}" alt="Decrease Icon" />
                                        </button>
                                        <input type="number" class="product_quantity" value="{{$data[3]}}" name="product_quantity_input">
                                        <button type="submit" name="action" value="increase" class="quantity_button">
                                            <img src="{{asset('image/icon/Increase.svg')}}" alt="Increase Icon" />
                                        </button>
                                    </div>
                                    <input type="hidden" name="total" id="total" value="" />
                                </form>
                            </div>
                            <div class="col-2">
                                <p class="temporary_product_price"></p>
                            </div>
                            <div class="col-1">
                                <a href="/cart/delete-cart-item/{{$data[4]}}/{{$data[5]}}">
                                    <img src="{{asset('image/icon/Trash.svg')}}" alt="Trash Icon" />
                                </a>
                            </div>
                        </div>
                        <hr />
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="total_amount_wrapper">
                    <div class="price_info d-flex">
                        <span class="total_amount_title">Total</span>
                        <h4 class="total_product_price"></h4>
                    </div>
                </div>
            </div>
        </div>
        @if(!($bookData === []))
        <div class="cart_redirect_next_container">
            <button class="cart_redirect_next" id="cartRedirectNext">
                Next
                <img src="{{asset('/image/icon/Right Arrow.svg')}}" />
            </button>
        </div>
        @endif
    </div>
    <script>
        var cartWrapper = document.querySelector('.cart_detail_row_wrapper')
        window.onload = updatePriceForCartDetail(cartWrapper);

        document.querySelectorAll('.quantity_button').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                var inputField = this.parentNode.querySelector('.product_quantity');
                var currentValue = parseInt(inputField.value);
                console.log(this);
                if (this.name === 'action' && this.value === 'increase') {
                    console.log('here');
                    inputField.value = currentValue + 1;
                } else if (this.name === 'action' && this.value === 'decrease' && currentValue > 1) {
                    inputField.value = currentValue - 1;
                }
                updatePriceForCartDetail(cartWrapper)
                this.form.submit();
            });
        });

        function updatePriceForCartDetail(row) {
            var quantityInputs = row.querySelectorAll('.product_quantity');
            var total = 0;

            quantityInputs.forEach(function(quantityInput, index) {
                var unitPriceElement = row.querySelectorAll('.cart_detail_unit_price')[index];
                var pricePerUnit = parseFloat(unitPriceElement.textContent.replace(/,/g, '')); // Remove commas and convert to number]

                var subtotal = quantityInput.value * pricePerUnit;
                var subtotalElement = row.querySelectorAll('.temporary_product_price')[index];
                subtotalElement.innerHTML = subtotal.toLocaleString();

                total += subtotal;
                var totalElement = row.querySelector('.total_product_price');
                if (totalElement != null) {
                    totalElement.innerHTML = total.toLocaleString();
                    document.getElementById('total').value = total;
                }
            });
            return total;

        }

        document.getElementById('cartRedirectNext').addEventListener('click', function() {
            var total = updatePriceForCartDetail(cartWrapper); // Function to calculate the total
            console.log(total);
            var url = '/cart/shipping-information?total=' + total;
            window.location.href = url;
        });
    </script>
</x-app-layout>