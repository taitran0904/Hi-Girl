<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a><i class="fa fa-home"></i> 06 Trần Văn Ơn, Phú Hoà, Thủ Dầu Một, Bình Dương</a></li>
                    <li><a><i class="fa fa-phone"></i> 0941038710</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                        @if(Auth::user()->status == 1)
                        <li><a href="{{ route('admin') }}">Quản lý</a></li>
                        @endif
                        <li><a href=""><i class="fa fa-user"></i>{{ Auth::user()->full_name }}</a></li>
                        <li><a href="{{ route('dangxuat') }}"><i class="fa fa-sign-out-alt"></i>Đăng xuất</a></li>
                    @else
                        <li><a href="{{ route('dangky') }}">Đăng kí</a></li>
                        <li><a href="{{ route('dangnhap') }}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{ route('trang-chu') }}" id="logo"><img src="source/assets/dest/images/logo_real.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{ route('timkiem') }}">
                        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif) <i class="fa fa-chevron-down"></i></div>
                        <div class="beta-dropdown cart-body">
                            @if(Session::has('cart'))
                            @foreach($product_cart as $pro_cart)
                            <div class="cart-item">
                                <a class="cart-item-delete" href="{{route('xoagiohang', $pro_cart['item']['id'])}}">
                                    <i class="fa fa-times"></i>
                                </a>
                                <div class="media">
                                    <a class="pull-left" href="#"><img src="source/image/product/{{$pro_cart['item']['image']}}" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$pro_cart['item']['name']}}</span>
                                        <span class="cart-item-amount">{{$pro_cart['qty']}}*<span>@if($pro_cart['item']['promotion_price']!=0) {{number_format($pro_cart['item']['promotion_price']) }} @else {{number_format($pro_cart['item']['unit_price'])}} @endif đ</span></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">@if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif đ</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div> <!-- .cart -->
                    
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #dd996b;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
                    <li><a href="loai-san-pham/1">Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($product_type as $pro_type)
                            @if($pro_type->status == 'Hiện')
                            <li><a href="{{route('loai-san-pham', $pro_type->id)}}">{{$pro_type->name}}</a></li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('gioi-thieu')}}">Giới thiệu</a></li>
                    <li><a href="{{route('lien-he')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->

