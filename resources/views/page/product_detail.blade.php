@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sản phẩm {{$product->name}}</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="source/image/product/{{$product->image}}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p style="font-weight: bold" class="single-item-title"><h3>{{$product->name}}</h3></p>
                                <p style="font-weight: bold" class="single-item-price">
                                    @if($product->promotion_price == 0)
                                        <span class="flash-sale">{{number_format($product->unit_price)}} đ</span>
                                    @else
                                        <span
                                            class="flash-sale">{{number_format($product->promotion_price)}} đ</span>
                                        <span class="flash-del">{{number_format($product->unit_price)}} đ</span>
                                    @endif
                                </p>
                            </div>

                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            <div class="single-item-desc">
                                <p></p>
                            </div>
                            <div class="space20">&nbsp;</div>

                            
                            <div class="single-item-options">
                                <a class="btn btn-primary" style="background: white;color: #D67C94;font-weight: bold;border-radius: 10px;border: 1px solid #D67C94;outline: none;" href="{{route('themgiohang',$product->id)}}">Thêm vào giỏ</a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="space40">&nbsp;</div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a style="font-size: 16px" href="#tab-description">Mô tả</a></li>
                        </ul>
                        <div class="panel" id="tab-description">
                            <p style="line-height: 2">{{$product->description}}</p>
                        </div>
                    </div>
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4 style="margin-bottom: 20px">Sản phẩm tương tự</h4>
                        <div class="row">
                            @foreach($similar_product as $similar_pro)
                            <div style="padding-bottom: 50px" class="col-sm-4">
                                <div class="single-item">
                                    @if($similar_pro->promotion_price != 0)
                                        <div class="ribbon-wrapper"><div style="background: #F4989D;" class="ribbon sale">Sale</div>
                                        </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="product.html"><img style="width: 100%" src="source/image/product/{{$similar_pro->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div style="margin-bottom: 20px" class="single-item-body">
                                        <p style="font-weight: bold" class="single-item-title">{{$similar_pro->name}}</p>
                                        <p class="single-item-price" style="font-size: 18px;font-weight: bold">
                                            @if($similar_pro->promotion_price == 0)
                                                <span class="flash-sale">{{number_format($similar_pro->unit_price)}} đ</span>
                                            @else
                                                <span class="flash-sale">{{number_format($similar_pro->promotion_price)}} đ</span>
                                                <span class="flash-del">{{number_format($similar_pro->unit_price)}} đ</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a style="margin-right: 10px; border-radius: 10px;border: 1px solid #D67C94; background: white;" class="add-to-cart pull-left" href="{{route('themgiohang',$similar_pro->id)}}"><i style="color: #D67C94" class="fa fa-plus"></i></a>
                                        <a style="background: white;color: #D67C94;font-weight: bold;border-radius: 10px;border: 1px solid #D67C94;outline: none;" class="btn btn-primary" href="{{route('chi-tiet-san-pham', $similar_pro->id)}}">Chi tiết sản phẩm</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{$similar_product->links('pagination::bootstrap-4')}}</div>
                    </div> <!-- .beta-products-list -->
                </div>
                <div class="col-sm-3 aside">
                    <div class="widget">
                        <h3 class="widget-title">Sản phẩm giảm giá</h3>
                        <div class="widget-body">
                            @foreach ($sale_product as $sale_pro) 
                            <div class="beta-sales beta-lists">
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img
                                            src="source/image/product/{{$sale_pro->image}}" alt=""></a>
                                    <div class="media-body">
                                        <p style="font-weight: bold">{{ $sale_pro->name }}</p>
                                        <span style="font-weight: bold; font-size: 16px" class="beta-sales-price">{{ number_format($sale_pro->promotion_price) }} đ</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> <!-- best sellers widget -->
                    <div class="widget">
                        <h3 class="widget-title">Sản phẩm mới</h3>
                        <div class="widget-body">
                            @foreach ($new_product as $new_pro) 
                            <div class="beta-sales beta-lists">
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img
                                            src="source/image/product/{{$new_pro->image}}" alt=""></a>
                                    <div class="media-body">
                                        <p style="font-weight: bold">{{ $new_pro->name }}</p>
                                        <span style="font-weight: bold; font-size: 16px" class="beta-sales-price">
                                            @if ($new_pro->promotion_price == 0)
                                            {{ number_format($new_pro->unit_price) }}
                                            @else
                                            {{ number_format($new_pro->promotion_price) }}
                                            @endif
                                             đ</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> <!-- best sellers widget -->
                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
