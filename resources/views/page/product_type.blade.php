@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{$type2->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index">Home</a> / <a href="loai-san-pham/1">Sản phẩm</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($type1 as $type_)
                        <li><a href="{{route('loai-san-pham',$type_->id)}}">{{$type_->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($pro_type)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($pro_type as $pro)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if(@$pro->promotion_price != 0)
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div>
                                        </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('chi-tiet-san-pham',$pro->id)}}"><img src="source/image/product/{{$pro->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$pro->name}}</p>
                                        <p class="single-item-price" style="font-size: 18px">
                                            @if($pro->promotion_price == 0)
                                                <span class="flash-sale">{{number_format($pro->unit_price)}} đồng</span>
                                            @else
                                                <span class="flash-sale">{{number_format($pro->promotion_price)}} đồng</span>
                                                <span class="flash-del">{{number_format($pro->unit_price)}} đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khác</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($product_other)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($product_other as $pro_other)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        @if($pro_other->promotion_price != 0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div>
                                            </div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="product.html"><img src="source/image/product/{{$pro_other->image}}" alt="" height="250px"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$pro->name}}</p>
                                            <p class="single-item-price" style="font-size: 18px">
                                                @if($pro->promotion_price == 0)
                                                    <span class="flash-sale">{{number_format($pro_other->unit_price)}} đồng</span>
                                                @else
                                                    <span class="flash-sale">{{number_format($pro_other->promotion_price)}} đồng</span>
                                                    <span class="flash-del">{{number_format($pro_other->unit_price)}} đồng</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row" style="text-align: center">{{$product_other->links('pagination::bootstrap-4')}}</div>
                        <div class="space40">&nbsp;</div>

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->

        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
