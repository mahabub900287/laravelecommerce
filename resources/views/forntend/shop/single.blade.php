@extends('layouts.forntendapp')
@section('title', $product->title."|Single Product")
@section('content')
<!-- main body - start
        ================================================== -->
        <main>

            <!-- sidebar cart - start
            ================================================== -->
            <div class="sidebar-menu-wrapper">
                <div class="cart_sidebar">
                    <button type="button" class="close_btn"><i class="fal fa-times"></i></button>
                    <ul class="cart_items_list ul_li_block mb_30 clearfix">
                        <li>
                            <div class="item_image">
                                <img src="assets/images/cart/cart_img_1.jpg" alt="image_not_found">
                            </div>
                            <div class="item_content">
                                <h4 class="item_title">Yellow Blouse</h4>
                                <span class="item_price">$30.00</span>
                            </div>
                            <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                        </li>
                        <li>
                            <div class="item_image">
                                <img src="assets/images/cart/cart_img_2.jpg" alt="image_not_found">
                            </div>
                            <div class="item_content">
                                <h4 class="item_title">Yellow Blouse</h4>
                                <span class="item_price">$30.00</span>
                            </div>
                            <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                        </li>
                        <li>
                            <div class="item_image">
                                <img src="assets/images/cart/cart_img_3.jpg" alt="image_not_found">
                            </div>
                            <div class="item_content">
                                <h4 class="item_title">Yellow Blouse</h4>
                                <span class="item_price">$30.00</span>
                            </div>
                            <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                        </li>
                    </ul>

                    <ul class="total_price ul_li_block mb_30 clearfix">
                        <li>
                            <span>Subtotal:</span>
                            <span>$90</span>
                        </li>
                        <li>
                            <span>Vat 5%:</span>
                            <span>$4.5</span>
                        </li>
                        <li>
                            <span>Discount 20%:</span>
                            <span>- $18.9</span>
                        </li>
                        <li>
                            <span>Total:</span>
                            <span>$75.6</span>
                        </li>
                    </ul>
                    <ul class="btns_group ul_li_block clearfix">
                        <li><a class="btn btn_primary" href="cart.html">View Cart</a></li>
                        <li><a class="btn btn_secondary" href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
                <div class="cart_overlay"></div>
            </div>
            <!-- sidebar cart - end
            ================================================== -->

            <!-- product quick view modal - start
            ================================================== -->
            <div class="modal fade" id="quickview_popup" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel2">Product Quick View</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="product_details">
                                <div class="container">
                                    <div class="row">
                                        <div class="col col-lg-6">
                                            <div class="product_details_image p-0">
                                                <img src="assets/images/shop/product_img_12.png" alt>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="product_details_content">
                                                <h2 class="item_title">Macbook Pro</h2>
                                                <p>
                                                    It is a long established fact that a reader will be distracted eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate
                                                </p>
                                                <div class="item_review">
                                                    <ul class="rating_star ul_li">
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                    <span class="review_value">3 Rating(s)</span>
                                                </div>
                                                <div class="item_price">
                                                    <span>$620.00</span>
                                                    <del>$720.00</del>
                                                </div>
                                                <hr>
                                                <div class="item_attribute">
                                                    <h3 class="title_text">Options <span class="underline"></span></h3>
                                                    <form action="#">
                                                        <div class="row">
                                                            <div class="col col-md-6">
                                                                <div class="select_option clearfix">
                                                                    <h4 class="input_title">Size *</h4>
                                                                    <select>
                                                                        <option data-display="- Please select -">Choose A Option</option>
                                                                        <option value="1">Some option</option>
                                                                        <option value="2">Another option</option>
                                                                        <option value="3" disabled>A disabled option</option>
                                                                        <option value="4">Potato</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col col-md-6">
                                                                <div class="select_option clearfix">
                                                                    <h4 class="input_title">Color *</h4>
                                                                    <select>
                                                                        <option data-display="- Please select -">Choose A Option</option>
                                                                        <option value="1">Some option</option>
                                                                        <option value="2">Another option</option>
                                                                        <option value="3" disabled>A disabled option</option>
                                                                        <option value="4">Potato</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="quantity_wrap">
                                                    <form action="#">
                                                        <div class="quantity_input">
                                                            <button type="button" class="input_number_decrement">
                                                                <i class="fal fa-minus"></i>
                                                            </button>
                                                            <input class="input_number" type="text" value="1">
                                                            <button type="button" class="input_number_increment">
                                                                <i class="fal fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                    <div class="total_price">
                                                        Total: $620,99
                                                    </div>
                                                </div>

                                                <ul class="default_btns_group ul_li">
                                                    <li><a class="addtocart_btn" href="#!">Add To Cart</a></li>
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                    <li><a href="#!"><i class="fas fa-heart"></i></a></li>
                                                </ul>

                                                <ul class="default_share_links ul_li">
                                                    <li>
                                                        <a class="facebook" href="#!">
                                                            <span><i class="fab fa-facebook-square"></i> Like</span>
                                                            <small>10K</small>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="twitter" href="#!">
                                                            <span><i class="fab fa-twitter-square"></i> Tweet</span>
                                                            <small>15K</small>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="google" href="#!">
                                                            <span><i class="fab fa-google-plus-square"></i> Google+</span>
                                                            <small>20K</small>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="share" href="#!">
                                                            <span><i class="fas fa-plus-square"></i> Share</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product quick view modal - end
            ================================================== -->

            <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>{{ $product->title }}</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- product_details - start
            ================================================== -->
            <section class="product_details section_space pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="product_details_image">
                                <div class="details_image_carousel">
                                    @foreach ($product->product_galleries as $gellary )
                                    <div class="slider_item">
                                        <img src="{{ asset('storage/productgallery/'.$gellary->photo) }}" alt="{{ $product->title }}">
                                    </div>
                                    @endforeach
                                </div>

                                <div class="details_image_carousel_nav">
                                    @foreach ($product->product_galleries as $gellary )
                                    <div class="slider_item">
                                        <img src="{{ asset('storage/productgallery/'.$gellary->photo) }}" alt="{{ $product->title }}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="product_details_content">
                                <h2 class="item_title">{{$product->title}}</h2>
                                <p>{{$product->short_discription}}</p>
                                {{-- <div class="item_review">
                                    <ul class="rating_star ul_li">
                                        <li><i class="fas fa-star"></i>></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star-half-alt"></i></li>
                                    </ul>
                                    <span class="review_value">3 Rating(s)</span>
                                </div> --}}

                                <div class="item_price">
                                    <span>${{$product->sale_price}}</span>
                                    <del>${{$product->price}}</del>
                                </div>
                                <hr>

                                <div class="item_attribute">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <div class="select_option clearfix">
                                                    <h4 class="input_title">Size *</h4>
                                                    <select>
                                                        <option data-display="- Please select -">Choose A Option</option>
                                                        @foreach ($product->sizes  as $size)
                                                        <option value="{{ $size->id }}">{{$size->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col col-md-6">
                                                <div class="select_option clearfix">
                                                    <h4 class="input_title">Color *</h4>
                                                    <select>
                                                        <option data-display="- Please select -">Choose A Option</option>
                                                        @foreach ($product->colors  as $color)
                                                        <option value="{{ $color->id }}">{{$color->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="quantity_wrap">
                                        <div class="quantity_input">
                                            <button type="button" class="input_number_decrement">
                                                <i class="fal fa-minus"></i>
                                            </button>
                                            <input class="input_number" type="text" value="1">
                                            <button type="button" class="input_number_increment">
                                                <i class="fal fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="total_price">Total: $620,99</div>
                                    </div>

                                    <ul class="default_btns_group ul_li">
                                        <li><a class="btn btn_primary addtocart_btn" href="#!">Add To Cart</a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="details_information_tab">
                        <ul class="tabs_nav nav ul_li" role=tablist>
                            <li>
                                <button class="active" data-bs-toggle="tab" data-bs-target="#description_tab" type="button" role="tab" aria-controls="description_tab" aria-selected="true">
                                Description
                                </button>
                            </li>
                            <li>
                                <button data-bs-toggle="tab" data-bs-target="#additional_information_tab" type="button" role="tab" aria-controls="additional_information_tab" aria-selected="false">
                                Additional information
                                </button>
                            </li>
                            <li>
                                <button data-bs-toggle="tab" data-bs-target="#reviews_tab" type="button" role="tab" aria-controls="reviews_tab" aria-selected="false">
                                Reviews(2)
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description_tab" role="tabpanel">
                               {!! $product->discription !!}
                            </div>

                            <div class="tab-pane fade" id="additional_information_tab" role="tabpanel">
                                {!! $product->additional_info !!}
                            </div>

                            <div class="tab-pane fade" id="reviews_tab" role="tabpanel">
                                <div class="average_area">
                                    <div class="row align-items-center">
                                        <div class="col-md-12 order-last">
                                            <div class="average_rating_text">
                                                <ul class="rating_star ul_li_center">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                                <p class="mb-0">
                                                Average Star Rating: <span>4 out of 5</span> (2 vote)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="customer_reviews">
                                    <h4 class="reviews_tab_title">2 reviews for this product</h4>
                                    <div class="customer_review_item clearfix">
                                        <div class="customer_image">
                                            <img src="assets/images/team/team_1.jpg" alt="image_not_found">
                                        </div>
                                        <div class="customer_content">
                                            <div class="customer_info">
                                                <ul class="rating_star ul_li">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                                <h4 class="customer_name">Aonathor troet</h4>
                                                <span class="comment_date">JUNE 2, 2021</span>
                                            </div>
                                            <p class="mb-0">Nice Product, I got one in black. Goes with anything!</p>
                                        </div>
                                    </div>

                                    <div class="customer_review_item clearfix">
                                        <div class="customer_image">
                                            <img src="assets/images/team/team_2.jpg" alt="image_not_found">
                                        </div>
                                        <div class="customer_content">
                                            <div class="customer_info">
                                                <ul class="rating_star ul_li">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                                <h4 class="customer_name">Danial obrain</h4>
                                                <span class="comment_date">JUNE 2, 2021</span>
                                            </div>
                                            <p class="mb-0">
                                            Great product quality, Great Design and Great Service.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="customer_review_form">
                                    <h4 class="reviews_tab_title">Add a review</h4>
                                    <form action="#">
                                        <div class="form_item">
                                            <input type="text" name="name" placeholder="Your name*">
                                        </div>
                                        <div class="form_item">
                                            <input type="email" name="email" placeholder="Your Email*">
                                        </div>
                                        <div class="your_ratings">
                                            <h5>Your Ratings:</h5>
                                            <button type="button"><i class="fal fa-star"></i></button>
                                            <button type="button"><i class="fal fa-star"></i></button>
                                            <button type="button"><i class="fal fa-star"></i></button>
                                            <button type="button"><i class="fal fa-star"></i></button>
                                            <button type="button"><i class="fal fa-star"></i></button>
                                        </div>
                                        <div class="form_item">
                                            <textarea name="comment" placeholder="Your Review*"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn_primary">Submit Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- product_details - end
            ================================================== -->

            <!-- related_products_section - start
            ================================================== -->
            <section class="related_products_section section_space">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="best-selling-products related-product-area">
                                <div class="sec-title-link">
                                    <h3>Related products</h3>
                                    <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a></div>
                                </div>
                                <div class="product-area clearfix">
                                    <div class="grid">
                                        <div class="product-pic">
                                            <img src="assets/images/shop/product_img_12.png" alt>
                                            <div class="actions">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"></a>
                                                    </li>
                                                    <li>
                                                        <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup" role="button" tabindex="0">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <h4><a href="#">Macbook Pro</a></h4>
                                            <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <span class="price">
                                                <ins>
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                                        </bdi>
                                                    </span>
                                                </ins>
                                            </span>
                                            <div class="add-cart-area">
                                                <button class="add-to-cart">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- related_products_section - end
            ================================================== -->

            <!-- newsletter_section - start
            ================================================== -->

            <!-- newsletter_section - end
            ================================================== -->

        </main>
        <!-- main body - end
        ================================================== -->
@endsection
