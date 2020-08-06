@extends('Nicecraft.layouts.master')
@section('title','Home')
@section('content')

<!-- Mobile Menu -->
<div id="jtv-mobile-menu">
  <ul>
    <li>
      <div class="mm-search">
        <form id="mob-search" name="search">
          <div class="input-group">
            <div class="input-group-btn">
              <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
              <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    @foreach($category as $cat)
    <li><a href="{{$cat->id}}">{{$cat->name}}</a>
      <ul>
        @foreach($cat->category as $subcat)
        <li><a href="{{$subcat->url}}">{{$subcat->name}}</a></li>
        @endforeach
      </ul>
    </li>
    @endforeach
  </ul>
  <div class="top-links">
    <ul class="links">
      <li><a title="My Account" href="my-account.html">My Account</a></li>
      <li><a title="Wishlist" href="wishlist.html">Wishlist</a></li>
      <li><a title="Checkout" href="checkout.html">Checkout</a></li>
      <li><a title="Blog" href="blog.html"><span>Blog</span></a></li>
      <li class="last"><a title="Login" href="login.html"><span>Login</span></a></li>
    </ul>
    <div class="language-box">
      <select class="selectpicker" data-width="fit">
        <option>English</option>
        <option>Francais</option>
        <option>German</option>
        <option>Español</option>
      </select>
    </div>
    <div class="currency-box">
      <form class="form-inline">
        <div class="input-group">
          <div class="currency-addon">
            <select class="currency-selector">
              <option data-symbol="$">USD</option>
              <option data-symbol="€">EUR</option>
              <option data-symbol="£">GBP</option>
              <option data-symbol="¥">JPY</option>
              <option data-symbol="$">CAD</option>
              <option data-symbol="$">AUD</option>
            </select>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="page"> 
  <!-- Header -->
  <header>
    <div class="header-container">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-sm-3 col-xs-12">
            <div class="logo"><a title="ecommerce Template" href="index.html"><img alt="ecommerce Template" src="{{asset('front_assets/images/loggg-4.jpeg')}}" style="height: 82px;"></a></div>
            <div class="nav-icon">
              <div class="mega-container visible-lg visible-md visible-sm">
                <div class="navleft-container">
                  <div class="mega-menu-title">
                    <h3><i class="fa fa-navicon"></i>Categories</h3>
                  </div>
                  <div class="mega-menu-category">
                    <ul class="nav">
                    @foreach($category as $cat)
                      <li><a href="{{$cat->id}}">{{$cat->name}}</a>
                        <div class="wrap-popup column1" >
                          <div class="popup" id="{{$cat->id}}">
                            <ul class="nav">
                              @foreach($cat->category as $subcat)
                              <li><a href="{{$subcat->url}}">{{$subcat->name}}</a></li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                      </li>
                    @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-sm-9 col-xs-12 jtv-rhs-header">
            <div class="jtv-mob-toggle-wrap">
              <div class="mm-toggle"><i class="fa fa-reorder"></i><span class="mm-label">Menu</span></div>
            </div>
            <div class="jtv-header-box">
              <div class="search_cart_block">
                <div class="search-box hidden-xs">
                  <form id="search_mini_form" action="#" method="get">
                    <input id="search" type="text" name="q" value="" class="searchbox" placeholder="Search entire store here..." maxlength="128">
                    <button type="submit" title="Search" class="search-btn-bg" id="submit-button"><span class="hidden-sm">Search</span><i class="fa fa-search hidden-xs hidden-lg hidden-md"></i></button>
                  </form>
                </div>
                <div class="right_menu">
                  <div class="menu_top">
                    <div class="top-cart-contain pull-right">
                      <div class="mini-cart">
                        <div class="basket"><a class="basket-icon" href="#"><i class="fa fa-shopping-basket"></i> Shopping Cart <span>3</span></a>
                          <div class="top-cart-content">
                            <div class="block-subtitle">
                              <div class="top-subtotal">3 items, <span class="price">$399.49</span></div>
                            </div>
                            <ul class="mini-products-list" id="cart-sidebar">
                              <li class="item">
                                <div class="item-inner"><a class="product-image" title="product tilte is here" href="product-detail.html"><img alt="product tilte is here" src="{{asset('front_assets/images/products/product-fashion-1.jpg')}}"></a>
                                  <div class="product-details">
                                    <div class="access"><a class="btn-remove1" title="Remove This Item" href="#">Remove</a> <a class="btn-edit" title="Edit item" href="#"><i class="fa fa-pencil"></i><span class="hidden">Edit item</span></a> </div>
                                    <p class="product-name"><a href="product-detail.html">Product tilte is here</a></p>
                                    <strong>1</strong> x <span class="price">$119.99</span></div>
                                </div>
                              </li>
                              <li class="item">
                                <div class="item-inner"><a class="product-image" title="Product tilte is here" href="product-detail.html"><img alt="Product tilte is here" src="{{asset('front_assets/images/products/product-fashion-1.jpg')}}"></a>
                                  <div class="product-details">
                                    <div class="access"><a class="btn-remove1" title="Remove This Item" href="#">Remove</a> <a class="btn-edit" title="Edit item" href="#"><i class="fa fa-pencil"></i><span class="hidden">Edit item</span></a> </div>
                                    <p class="product-name"><a href="product-detail.html">Product tilte is here</a></p>
                                    <strong>1</strong> x <span class="price">$79.66</span></div>
                                </div>
                              </li>
                              <li class="item">
                                <div class="item-inner"><a class="product-image" title="Product tilte is here" href="product-detail.html"><img alt="Product tilte is here" src="{{asset('front_assets/images/products/product-fashion-1.jpg')}}"></a>
                                  <div class="product-details">
                                    <div class="access"><a class="btn-remove1" title="Remove This Item" href="#">Remove</a> <a class="btn-edit" title="Edit item" href="#"><i class="fa fa-pencil"></i><span class="hidden">Edit item</span></a> </div>
                                    <p class="product-name"><a href="product-detail.html">Product tilte is here</a></p>
                                    <strong>1</strong> x <span class="price">$99.89</span></div>
                                </div>
                              </li>
                            </ul>
                            <div class="actions"> <a href="shopping-cart.html" class="view-cart"><span>View Cart</span></a>
                              <button onclick="window.location.href='checkout.html'" class="btn-checkout" title="Checkout" type="button"><span>Checkout</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="language-box hidden-xs">
                    <select class="selectpicker" data-width="fit">
                      <option>English</option>
                      <option>Francais</option>
                      <option>German</option>
                      <option>Español</option>
                    </select>
                  </div>
                  <div class="currency-box hidden-xs">
                    <form class="form-inline">
                      <div class="input-group">
                        <div class="currency-addon">
                          <select class="currency-selector">
                            <option data-symbol="$">USD</option>
                            <option data-symbol="€">EUR</option>
                            <option data-symbol="£">GBP</option>
                            <option data-symbol="¥">JPY</option>
                            <option data-symbol="$">CAD</option>
                            <option data-symbol="$">AUD</option>
                          </select>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="top_section hidden-xs">
                <div class="toplinks">
                  <div class="site-dir hidden-xs"> <a class="hidden-sm" href="#"><i class="fa fa-phone"></i> (+91) 799-984-7153 (9AM - 6PM)</a> <a href="mailto:support@example.com"><i class="fa fa-envelope"></i> nicecraft.in@gmail.com</a> </div>
                  <ul class="links">
                    <li><a title="My Account" href="my-account.html">My Account</a></li>
                    <li><a title="My Wishlist" href="wishlist.html">Wishlist</a></li>
                    <li><a title="Checkout" href="checkout.html">Checkout</a></li>
                    <li><a title="Track Order" href="track-order.html">Track Order</a></li>
                    <li><a title="Log In" href="login.html">Log In</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- end header --> 
  <!-- Revslider -->

<div class="container jtv-home-revslider">
    <div class="row">
      <div class="col-lg-9 col-sm-9 col-xs-12 jtv-main-home-slider">
        <div id='rev_slider_1_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
          <div id='rev_slider_1' class='rev_slider fullwidthabanner'>
            <ul>
              @foreach($banners as $banner)
              <li data-transition='slotzoom-horizontal' data-slotamount='7' data-masterspeed='1000' data-thumb='images/slider/slide-img1.jpg'>
                @php if (!empty($banner->image))
                {
                @endphp
                <img src="{{url('/uploads/banner/'.$banner->image)}}" alt="slider image1" data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat'  />
                @php 
                } else {
                @endphp 
                <p>No image found</p>
                @php
                }
                @endphp
                <div class="info">
                  <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='0'  data-y='165'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2;white-space:nowrap;'><span>{{$banner->name}}</span></div>
                  <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='0'  data-y='220'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;white-space:nowrap;'>{{$banner->head}}</div>
                  <div class='tp-caption Title sft  tp-resizeme ' data-x='0'  data-y='300'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'>{{$banner->content}}</div>
                  <div class='tp-caption sfb  tp-resizeme ' data-x='0'  data-y='350'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'><a href="{{$banner->link}}" class="buy-btn">Shop Now</a></div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="banner-block"> <a href="#"> <img src="{{asset('front_assets/images/about-us.png')}}" style="width: 100%" alt=""> </a>
          <div class="text-des-container pad-zero">
            <div class="text-des">
              <p></p>
              <h2>About Us</h2>
            </div>
          </div>
        </div>
        <div class="banner-block"> <a href="#"> <img src="{{asset('front_assets/images/loggg-4.jpeg')}}" alt=""> </a>
          <div class="text-des-container">
            <div class="text-des">
              <p></p>
              <h2>Contact Us</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Support Policy Box -->
  <div class="container">
    <div class="support-policy-box">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="support-policy"> <i class="fa fa-truck"></i>
            <div class="content">Free Shipping on order over $49</div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="support-policy"> <i class="fa fa-phone"></i>
            <div class="content">Need Help +1 123 456 7890</div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="support-policy"> <i class="fa fa-refresh"></i>
            <div class="content">30 days return Service</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Container -->
  <section class="main-container">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <div class="col-main">
            <div class="jtv-featured-products">
              <div class="slider-items-products">
                <div class="jtv-new-title">
                  <h2>Latest Products</h2>
                </div>
                <div id="featured-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col4 products-grid">
                    @foreach($products as $product)
                    <div class="item">
                      <div class="item-inner">
                        <div class="item-img">
                          <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html">
                            @php if (!empty($product->image))
                            {
                            @endphp 
                            <img alt="Product tilte is here" style="width: 90%;height: 220px" src="{{url('/uploads/product/'.$product->image)}}">
                            @php 
                            } else {
                            @endphp 
                            <p>No image found</p>
                            @php
                            }
                            @endphp </a></div>
                        </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">{{$product->name}}</a> </div>
                            <div class="item-content">
                              <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                              <div class="item-price">
                                <div class="price-box"> <span class="regular-price"> <span class="price">{{$product->price}}</span></span>
                                  <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> {{$product->old_price}} </span> </p>
                                </div>
                              </div>
                              <div class="actions">
                                <div class="add_cart">
                                  <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Trending Products Slider -->
          <div class="jtv-trending-products">
            <div class="slider-items-products">
              <div class="jtv-new-title">
                <h2>Featured Products</h2>
              </div>
              <div id="trending-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid">
                  @foreach($featuredProducts as $featuredProduct)
                    <div class="item">
                      <div class="item-inner">
                        <div class="item-img">
                          <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html">
                            @php if (!empty($featuredProduct->image))
                            {
                            @endphp 
                            <img alt="Product tilte is here" style="width: 90%;height: 220px" src="{{url('/uploads/product/'.$featuredProduct->image)}}">
                            @php 
                            } else {
                            @endphp 
                            <p>No image found</p>
                            @php
                            }
                            @endphp </a></div>
                        </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">{{$featuredProduct->name}}</a> </div>
                            <div class="item-content">
                              <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                              <div class="item-price">
                                <div class="price-box"> <span class="regular-price"> <span class="price">{{$featuredProduct->price}}</span></span>
                                  <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> {{$featuredProduct->old_price}} </span> </p>
                                </div>
                              </div>
                              <div class="actions">
                                <div class="add_cart">
                                  <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- End Trending Products Slider --> 
          
          <!-- Latest Blog -->
          <div class="jtv-latest-blog">
            <div class="jtv-new-title">
              <h2>Latest News</h2>
            </div>
            <div class="row">
              <div class="blog-outer-container">
                <div class="blog-inner">
                  <div class="col-xs-12 col-sm-4 blog-preview_item">
                    <div class="entry-thumb jtv-blog-img-hover"> <a href="blog_single_post.html"> <img alt="Blog" src="{{asset('front_assets/images/n1.jpg')}}"> </a> </div>
                    <h4 class="blog-preview_title"><a href="blog_single_post.html">Bhandhanwar Category</a></h4>
                    <div class="blog-preview_info">
                      <div class="blog-preview_desc">GRAB OFFER NOW IN NEW ARRIVAL STARTING WITH Lowest Price.<a class="read_btn" href="blog_single_post.html">Read More</a></div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 blog-preview_item">
                    <div class="entry-thumb jtv-blog-img-hover"> <a href="blog_single_post.html"> <img alt="Blog" src="{{asset('front_assets/images/n2.jpg')}}"> </a> </div>
                    <h4 class="blog-preview_title"><a href="blog_single_post.html">Home and Decore</a></h4>
                    <div class="blog-preview_info">
                      <div class="blog-preview_desc">Get Extra Discount on Bulk Order / On Designer Packing. <a class="read_btn" href="blog_single_post.html">Read More</a></div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 blog-preview_item">
                    <div class="entry-thumb jtv-blog-img-hover"> <a href="blog_single_post.html"> <img alt="Blog" src="{{asset('front_assets/images/n3.jpg')}}"> </a> </div>
                    <h4 class="blog-preview_title"><a href="blog_single_post.html">Wedding Special</a></h4>
                    <div class="blog-preview_info">
                      <div class="blog-preview_desc">Make your Wedding memorable with wedding speacial Category....<a class="read_btn" href="blog_single_post.html">Read More</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Latest Blog --> 
        </div>
      </div>
    </div>
  </section>
  
  <!-- Collection Banner -->
  <div class="jtv-collection-area">
    <div class="container">
      <div class="column-right pull-left col-sm-4 no-padding"> <a href="#"> <img src="{{asset('front_assets/images/women-top.jpg')}}" alt="Top Collections"> </a>
        <div class="col-right-text">
          <h5 class="text-uppercase">Top Collections <span> 35% </span> get it now</h5>
        </div>
      </div>
      <div class="column-left pull-right col-sm-8 no-padding">
        <div class="column-left-top">
          <div class="col-left-top-left pull-left col-sm-8 no-padding"> <a href="#"> <img src="{{asset('front_assets/images/men-suits.jpg')}}" alt="Men's Suits"> </a>
            <div class="col-left-top-left-text">
              <h5 class="text-uppercase">Dressing for your Wedding</h5>
              <h3 class="text-uppercase">Men's Suits</h3>
              <h5 class="text-uppercase">Look Good, Feel Good</h5>
            </div>
          </div>
          <div class="col-left-top-right pull-right col-sm-4 no-padding"> <a href="#"> <img src="{{asset('front_assets/images/footwear.jpg')}}" alt="footwear"> </a>
            <div class="col-left-top-right-text text-center">
              <h5 class="text-uppercase">Footwear Fashion Sale</h5>
              <h3>50%</h3>
              <h5 class="text-uppercase">Buy 1, Get 1</h5>
            </div>
          </div>
        </div>
        <div class="column-left-bottom col-sm-12 no-padding">
          <div class="col-left-bottom-left pull-left col-sm-4 no-padding"> <a href="#"> <img src="{{asset('front_assets/images/handbag.jpg')}}" alt="Handbag"> </a>
            <div class="col-left-bottom-left-text">
              <h5 class="text-uppercase">What's New?</h5>
              <h3 class="text-uppercase">Bag's</h3>
              <h5 class="text-uppercase">Everyday<br>
                Low Prices</h5>
            </div>
          </div>
          <div class="col-left-bottom-right pull-right col-sm-8 no-padding"> <a href="#"> <img src="{{asset('front_assets/images/watch-banner.jpg')}}" alt="Watch"> </a>
            <div class="col-left-bottom-right-text">
              <h5 class="text-uppercase">Never Miss a Second</h5>
              <h3 class="text-uppercase">Watch</h3>
              <h5 class="text-uppercase">Time to buy a watch!</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- collection area end -->
  
  
  <!-- Brand Logo -->
  <div class="container jtv-brand-logo-block">
    <div class="jtv-brand-logo">
      <div class="slider-items-products">
        <div id="jtv-brand-logo-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col6">
            <div class="item"><a href="#"><img src="{{asset('front_assets/images/brand1.png')}}" alt="Brand Logo"></a> </div>
            <div class="item"><a href="#"><img src="{{asset('front_assets/images/brand2.png')}}" alt="Brand Logo"></a> </div>
            <div class="item"><a href="#"><img src="{{asset('front_assets/images/brand3.png')}}" alt="Brand Logo"></a> </div>
            <div class="item"><a href="#"><img src="{{asset('front_assets/images/brand4.png')}}" alt="Brand Logo"></a> </div>
            <div class="item"><a href="#"><img src="{{asset('front_assets/images/brand5.png')}}" alt="Brand Logo"></a> </div>
            <div class="item"><a href="#"><img src="{{asset('front_assets/images/brand6.png')}}" alt="Brand Logo"></a> </div>
            <div class="item"><a href="#"><img src="{{asset('front_assets/images/brand7.png')}}" alt="Brand Logo"></a> </div>
            <div class="item"><a href="#"><img src="{{asset('front_assets/images/brand8.png')}}" alt="Brand Logo"></a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
</div>

@endsection