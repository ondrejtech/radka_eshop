<div>
    <div class="tf-shop-content">
        <div class="grid-layout wrapper-shop" data-grid="grid-3">
            @foreach($products as $product)
                <!-- card product 1 -->
                <div class="card-product">
                    <div class="card-product-wrapper">
                        <a href="{{ route('product-details', $product->id) }}" class="product-img">
                            <img class=" img-product" data-src="{{ $product->images->first()->URL }}" src="{{ $product->images->first()->URL }}" alt="image-product">
                            <img class="img-hover" data-src="{{ $product->images->first()->URL }}" src="{{ $product->images->first()->URL }}" alt="image-product">
                        </a>
                        <div class="list-product-btn absolute-2">
                            <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                <span class="icon icon-bag"></span>
                                <span class="tooltip">Quick Add</span>
                            </a>
                            <a href="javascript:void(0);" wire:click="wishlistsDel({{$product->id}})" class="box-icon bg_white wishlist btn-icon-action">
                                {{--                                <span class="icon icon-heart"></span>--}}
                                <span class="icon icon-delete"></span>
                                <span class="tooltip">Add to Wishlist</span>
                            </a>
                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                <span class="icon icon-compare"></span>
                                <span class="tooltip">Add to Compare</span>
                                <span class="icon icon-check"></span>
                            </a>
                            <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                <span class="icon icon-view"></span>
                                <span class="tooltip">Quick View</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-product-info">
                        <div style="height: 30px" class="title-custom ">
                            <a href="{{route('product-details', $product->id)}}" class="title link">{{$product->name}}</a>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <span class="price">Cena:</span>
                            </div>
                            <div class="col-sm-9 text-end">
                                <span class="price">{{number_format($product->standard_price,0,',',' ').' '.$product->currency}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- pagination -->
            {{--                    <ul class="tf-pagination-wrap tf-pagination-list">--}}
            {{--                        <li class="active">--}}
            {{--                            <a href="#" class="pagination-link">1</a>--}}
            {{--                        </li>--}}
            {{--                        <li>--}}
            {{--                            <a href="#" class="pagination-link animate-hover-btn">2</a>--}}
            {{--                        </li>--}}
            {{--                        <li>--}}
            {{--                            <a href="#" class="pagination-link animate-hover-btn">3</a>--}}
            {{--                        </li>--}}
            {{--                        <li>--}}
            {{--                            <a href="#" class="pagination-link animate-hover-btn">4</a>--}}
            {{--                        </li>--}}
            {{--                        <li>--}}
            {{--                            <a href="#" class="pagination-link animate-hover-btn">--}}
            {{--                                <span class="icon icon-arrow-right"></span>--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            {{--                    </ul>--}}
        </div>
    </div>
</div>
