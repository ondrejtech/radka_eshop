<div>
    @livewire ('frontend.mobile.mobile-menu')
    @livewire('frontend.modal.login-modal')
    @livewire('frontend.modal.shopping-cart')
    @livewire('frontend.modal.canvas-search')
    @livewire('frontend.toolbar.bottom-toolbar')
    @livewire('frontend.toolbar.toolbar-shopmb')
    @livewire('frontend.modal.filter-product')
{{--    <div class="preload preload-container">--}}
{{--        <div class="preload-logo">--}}
{{--            <div class="spinner"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- /preload -->
    <div id="wrapper">
        <!-- top-bar -->
        <div class="tf-top-bar bg_white line">
            <div class="px_15 lg-px_40">
                <div class="tf-top-bar_wrap grid-3 gap-30 align-items-center">
                    <ul class="tf-top-bar_item tf-social-icon d-flex gap-10">
                        <li><a href="#" class="box-icon w_28 round social-facebook bg_line"><i class="icon fs-12 icon-fb"></i></a></li>
                        <li><a href="#" class="box-icon w_28 round social-twiter bg_line"><i class="icon fs-10 icon-Icon-x"></i></a></li>
                        <li><a href="#" class="box-icon w_28 round social-instagram bg_line"><i class="icon fs-12 icon-instagram"></i></a></li>
                        <li><a href="#" class="box-icon w_28 round social-tiktok bg_line"><i class="icon fs-12 icon-tiktok"></i></a></li>
                        <li><a href="#" class="box-icon w_28 round social-pinterest bg_line"><i class="icon fs-12 icon-pinterest-1"></i></a></li>
                    </ul>
                    <div class="text-center overflow-hidden">
                        <div dir="ltr" class="swiper tf-sw-top_bar" data-preview="1" data-space="0" data-loop="true" data-speed="1000" data-delay="2000">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <p class="top-bar-text fw-5">Spring Fashion Sale <a href="shop-default.html" title="all collection" class="tf-btn btn-line">Shop now<i class="icon icon-arrow1-top-left"></i></a></p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="top-bar-text fw-5">Summer sale discount off 70%</p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="top-bar-text fw-5">Time to refresh your wardrobe.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="top-bar-language tf-cur justify-content-end">


                        <div class="tf-currencies">
                            <select class="image-select center style-default type-currencies">
                                <option data-thumbnail="{{asset('assets/images/country/fr.svg')}}">EUR <span>€ | France</span></option>
                                <option data-thumbnail="{{asset('assets/images/country/de.svg')}}">EUR <span>€ | Germany</span></option>
                                <option selected data-thumbnail="{{asset('assets/images/country/us.svg')}}">USD <span>$ | United States</span></option>
                                <option data-thumbnail="{{asset('assets/images/country/vn.svg')}}">VND <span>₫ | Vietnam</span></option>
                            </select>
                        </div>
                        <div class="tf-languages">
                            <select class="image-select center style-default type-languages">
                                <option>English</option>
                                <option>العربية</option>
                                <option>简体中文</option>
                                <option>اردو</option>
                            </select>
                        </div>

                    </div>
                </div>


            </div>
        </div>
        <!-- /top-bar -->
        <!-- header -->
        <header id="header" class="header-default">
            <div class="px_15 lg-px_40">
                <div class="row wrapper-header align-items-center">
                    <div class="col-md-4 col-3 tf-lg-hidden">
                        <a href="#mobileMenu" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none">
                                <path d="M2.00056 2.28571H16.8577C17.1608 2.28571 17.4515 2.16531 17.6658 1.95098C17.8802 1.73665 18.0006 1.44596 18.0006 1.14286C18.0006 0.839753 17.8802 0.549063 17.6658 0.334735C17.4515 0.120408 17.1608 0 16.8577 0H2.00056C1.69745 0 1.40676 0.120408 1.19244 0.334735C0.978109 0.549063 0.857702 0.839753 0.857702 1.14286C0.857702 1.44596 0.978109 1.73665 1.19244 1.95098C1.40676 2.16531 1.69745 2.28571 2.00056 2.28571ZM0.857702 8C0.857702 7.6969 0.978109 7.40621 1.19244 7.19188C1.40676 6.97755 1.69745 6.85714 2.00056 6.85714H22.572C22.8751 6.85714 23.1658 6.97755 23.3801 7.19188C23.5944 7.40621 23.7148 7.6969 23.7148 8C23.7148 8.30311 23.5944 8.59379 23.3801 8.80812C23.1658 9.02245 22.8751 9.14286 22.572 9.14286H2.00056C1.69745 9.14286 1.40676 9.02245 1.19244 8.80812C0.978109 8.59379 0.857702 8.30311 0.857702 8ZM0.857702 14.8571C0.857702 14.554 0.978109 14.2633 1.19244 14.049C1.40676 13.8347 1.69745 13.7143 2.00056 13.7143H12.2863C12.5894 13.7143 12.8801 13.8347 13.0944 14.049C13.3087 14.2633 13.4291 14.554 13.4291 14.8571C13.4291 15.1602 13.3087 15.4509 13.0944 15.6653C12.8801 15.8796 12.5894 16 12.2863 16H2.00056C1.69745 16 1.40676 15.8796 1.19244 15.6653C0.978109 15.4509 0.857702 15.1602 0.857702 14.8571Z" fill="currentColor"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-4 col-6">
                        <a href="{{route('home')}}" class="logo-header">
                            <img src="{{asset('assets/images/logo/logo.svg')}}" alt="logo" class="logo">
                        </a>
                    </div>
                    <div class="col-xl-6 tf-md-hidden">
                        <nav class="box-navigation text-center">
                            <ul class="box-nav-ul d-flex align-items-center justify-content-center gap-30">
                                @foreach($category as $item)
                                    <li class="menu-item">
                                        <a href="{{route('category',$item->category_code)}}" class="item-link">{{preg_replace('/>.*$/', '', $item->name)}}
{{--                                            <i class="icon icon-arrow-down"></i>--}}
                                        </a>
{{--                                        <div class="sub-menu mega-menu">--}}
{{--                                            <div class="container">--}}
{{--                                                <div class="row-demo">--}}
{{--                                                    <div class="demo-item">--}}
{{--                                                        <a href="{{route('home')}}">--}}
{{--                                                            <div class="demo-image position-relative">--}}
{{--                                                                <img class="lazyload" data-src="{{asset('assets/images/demo/home-01.jpg')}}" src="{{asset('assets/images/demo/home-01.jpg')}}" alt="home-01">--}}
{{--                                                                <div class="demo-label">--}}
{{--                                                                    <span class="demo-new">New</span>--}}
{{--                                                                    <span>Trend</span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <span class="demo-name">Home Fashion 01</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="demo-item">--}}
{{--                                                        <a href="home-multi-brand.html">--}}
{{--                                                            <div class="demo-image position-relative">--}}
{{--                                                                <img class="lazyload" data-src="{{asset('assets/images/demo/home-multi-brand.jpg')}}" src="{{asset('assets/images/demo/home-multi-brand.jpg')}}" alt="home-multi-brand">--}}
{{--                                                                <div class="demo-label">--}}
{{--                                                                    <span class="demo-new">New</span>--}}
{{--                                                                    <span class="demo-hot">Hot</span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <span class="demo-name">Home Multi Brand</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="demo-item">--}}
{{--                                                        <a href="home-02.html">--}}
{{--                                                            <div class="demo-image position-relative">--}}
{{--                                                                <img class="lazyload" data-src="{{asset('assets/images/demo/home-02.jpg')}}" src="{{asset('assets/images/demo/home-02.jpg')}}" alt="home-02">--}}
{{--                                                                <div class="demo-label">--}}
{{--                                                                    <span class="demo-hot">Hot</span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <span class="demo-name">Home Fashion 02</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="demo-item">--}}
{{--                                                        <a href="home-03.html">--}}
{{--                                                            <div class="demo-image">--}}
{{--                                                                <img class="lazyload" data-src="{{asset('assets/images/demo/home-03.jpg')}}" src="{{asset('assets/images/demo/home-03.jpg')}}" alt="home-03">--}}
{{--                                                            </div>--}}
{{--                                                            <span class="demo-name">Home Fashion 03</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="demo-item">--}}
{{--                                                        <a href="home-04.html">--}}
{{--                                                            <div class="demo-image">--}}
{{--                                                                <img class="lazyload" data-src="{{asset('assets/images/demo/home-04.jpg')}}" src="{{asset('assets/images/demo/home-04.jpg')}}" alt="home-04">--}}
{{--                                                            </div>--}}
{{--                                                            <span class="demo-name">Home Fashion 04</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="demo-item">--}}
{{--                                                        <a href="home-05.html">--}}
{{--                                                            <div class="demo-image">--}}
{{--                                                                <img class="lazyload" data-src="{{asset('assets/images/demo/home-05.jpg')}}" src="{{asset('assets/images/demo/home-05.jpg')}}" alt="home-05">--}}
{{--                                                            </div>--}}
{{--                                                            <span class="demo-name">Home Fashion 05</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="demo-item">--}}
{{--                                                        <a href="home-06.html">--}}
{{--                                                            <div class="demo-image position-relative">--}}
{{--                                                                <img class="lazyload" data-src="{{asset('assets/images/demo/home-06.jpg')}}" src="{{asset('assets/images/demo/home-06.jpg')}}" alt="home-06">--}}
{{--                                                                <div class="demo-label">--}}
{{--                                                                    <span class="demo-new">New</span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <span class="demo-name">Home Fashion 06</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="demo-item">--}}
{{--                                                        <a href="home-07.html">--}}
{{--                                                            <div class="demo-image">--}}
{{--                                                                <img class="lazyload" data-src="{{asset('assets/images/demo/home-07.jpg')}}" src="{{asset('assets/images/demo/home-07.jpg')}}" alt="home-07">--}}
{{--                                                            </div>--}}
{{--                                                            <span class="demo-name">Home Fashion 07</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="demo-item">--}}
{{--                                                        <a href="home-08.html">--}}
{{--                                                            <div class="demo-image">--}}
{{--                                                                <img class="lazyload" data-src="{{asset('assets/images/demo/home-08.jpg')}}" src="{{asset('assets/images/demo/home-08.jpg')}}" alt="home-08">--}}
{{--                                                            </div>--}}
{{--                                                            <span class="demo-name">Home Fashion 08</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="demo-item">--}}
{{--                                                        <a href="home-skincare.html">--}}
{{--                                                            <div class="demo-image">--}}
{{--                                                                <img class="lazyload" data-src="{{asset('assets/images/demo/home-skincare.jpg')}}" src="{{asset('assets/images/demo/home-skincare.jpg')}}" alt="home-skincare">--}}
{{--                                                            </div>--}}
{{--                                                            <span class="demo-name">Home Skincare</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="demo-item">--}}
{{--                                                        <a href="home-headphone.html">--}}
{{--                                                            <div class="demo-image">--}}
{{--                                                                <img class="lazyload" data-src="{{asset('assets/images/demo/home-headphone.jpg')}}" src="{{asset('assets/images/demo/home-headphone.jpg')}}" alt="home-headphone">--}}
{{--                                                            </div>--}}
{{--                                                            <span class="demo-name">Home Headphone</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="demo-item">--}}
{{--                                                        <a href="home-giftcard.html">--}}
{{--                                                            <div class="demo-image">--}}
{{--                                                                <img class="lazyload" data-src="{{asset('assets/images/demo/home-giftcard.jpg')}}" src="{{asset('assets/images/demo/home-giftcard.jpg')}}" alt="home-gift-card">--}}
{{--                                                            </div>--}}
{{--                                                            <span class="demo-name">Home Gift Card</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="text-center view-all-demo">--}}
{{--                                                    <a href="#modalDemo" data-bs-toggle="modal" class="tf-btn btn-xl btn-fill radius-3 animate-hover-btn fw-6"><span>View all demos (34+)</span><i class="icon icon-arrow-right"></i></a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="col-xl-3 col-md-4 col-3">
                        <ul class="nav-icon d-flex justify-content-end align-items-center gap-20">
                            <li class="nav-search"><a href="#canvasSearch" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="nav-icon-item"><i class="icon icon-search"></i></a></li>
                            <li class="nav-account"><a href="{{url('user')}}" class="nav-icon-item"><i class="icon icon-account"></i></a></li>
                            <li class="nav-wishlist"><a href="{{route('wish-list')}}" class="nav-icon-item"><i class="icon icon-heart"></i><span class="count-box">0</span></a></li>
                            <li class="nav-cart"><a href="{{route('shopping-cart')}}" data-bs-toggle="modal" class="nav-icon-item"><i class="icon icon-bag"></i><span class="count-box">0</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- /header -->
    </div>
</div>
