

    <!-- page-cart -->
    <section class="flat-spacing-11">
        <div class="container">
            <div class="tf-page-cart-wrap layout-2">
                <div class="tf-page-cart-item">
                    <h5 class="fw-5 mb_20">Billing details</h5>
                    <form class="form-checkout">
                        <div class="box grid-2">
                            <fieldset class="fieldset">
                                <label for="first-name">First Name</label>
                                <input wire:model="first_name" type="text" id="first-name" placeholder="Themesflat">
                            </fieldset>
                            <fieldset class="fieldset">
                                <label for="last-name">Last Name</label>
                                <input wire:model="last_name" type="text" id="last-name">
                            </fieldset>
                        </div>
                        <fieldset class="box fieldset">
                            <label for="country">Country/Region</label>
                            <div class="select-custom">
                                <select wire:model="country" class="tf-select w-100" id="country" name="address[country]" data-default="">
                                    <option value="---">---</option>
                                    <option value="Czech" >Ceska republika</option>
                                </select>
                            </div>
                        </fieldset>
                        <fieldset class="box fieldset">
                            <label for="city">Town/City</label>
                            <input wire:model="town" type="text" id="city">
                        </fieldset>
                        <fieldset class="box fieldset">
                            <label for="address">Address</label>
                            <input wire:model="address" type="text" id="address">
                        </fieldset>
                        <fieldset class="box fieldset">
                            <label for="phone">Phone Number</label>
                            <input wire:model="phone" type="number" id="phone">
                        </fieldset>
                        <fieldset class="box fieldset">
                            <label for="email">Email</label>
                            <input wire:model="email" type="email" id="email">
                        </fieldset>
                        <fieldset class="box fieldset">
                            <label for="note">Order notes (optional)</label>
                            <textarea name="note" id="note"></textarea>
                        </fieldset>
                    </form>
                </div>
                <div class="tf-page-cart-footer">
                    <div class="tf-cart-footer-inner">
                        <h5 class="fw-5 mb_20">Your order</h5>
                        <form class="tf-page-cart-checkout widget-wrap-checkout">
                            <ul class="wrap-checkout-product">
                                @foreach($products as $product)
                                    <li class="checkout-product-item">
                                        <figure class="img-product">
                                            <img src="{{$product->image}}" alt="{{$product->name}}">
                                            <span class="quantity">{{$product->quantity}}</span>
                                        </figure>
                                        <div class="content">
                                            <div class="info">
                                                <p class="name">{{$product->name}}</p>
                                            </div>
                                            <span class="price">{{$product->price}}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="coupon-box">
                                <input type="text" placeholder="Discount code">
                                <a href="#" class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn">Apply</a>
                            </div>
                            <div class="d-flex justify-content-between line pb_20">
                                <h6 class="fw-5">Total</h6>
                                <h6 class="total fw-5">{{$total}} Kč</h6>
                            </div>
                            <div class="wd-check-payment">
                                <div class="fieldset-radio mb_20">
                                    <input type="radio" name="payment" id="bank" class="tf-check" checked>
                                    <label for="bank">Direct bank transfer</label>

                                </div>
{{--                                <div class="fieldset-radio mb_20">--}}
{{--                                    <input type="radio" name="payment" id="delivery" class="tf-check">--}}
{{--                                    <label for="delivery">Cash on delivery</label>--}}
{{--                                </div>--}}
                                <p class="text_black-2 mb_20">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="privacy-policy.html" class="text-decoration-underline">privacy policy</a>.</p>
                                <div class="box-checkbox fieldset-radio mb_20">
                                    <input type="checkbox" id="check-agree" class="tf-check">
                                    <label for="check-agree" class="text_black-2">I have read and agree to the website <a href="terms-conditions.html" class="text-decoration-underline">terms and conditions</a>.</label>
                                </div>
                            </div>
                            <button wire:click="checkout()" type="button" class="tf-btn radius-3 btn-fill btn-icon animate-hover-btn justify-content-center">Place order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-cart -->    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
