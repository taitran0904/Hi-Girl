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
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($pro_type)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($pro_type as $pro)
                            <div style="padding-bottom: 50px" class="col-sm-4">
                                <div class="single-item">
                                    @if(@$pro->promotion_price != 0)
                                        <div class="ribbon-wrapper"><div style="background: #F4989D;" class="ribbon sale">Sale</div>
                                        </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('chi-tiet-san-pham',$pro->id)}}"><img style="width: 100%" src="source/image/product/{{$pro->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div style="margin-bottom: 20px" class="single-item-body">
                                        <p style="font-weight: bold" class="single-item-title">{{$pro->name}}</p>
                                        <p class="single-item-price" style="font-size: 18px; font-weight: bold"">
                                            @if($pro->promotion_price == 0)
                                                <span class="flash-sale">{{number_format($pro->unit_price)}} đ</span>
                                            @else
                                                <span class="flash-sale">{{number_format($pro->promotion_price)}} đ</span>
                                                <span class="flash-del">{{number_format($pro->unit_price)}} đ</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a style="margin-right: 10px; border-radius: 10px;border: 1px solid #D67C94; background: white;" class="add-to-cart pull-left" href="{{route('themgiohang',$pro->id)}}"><i style="color: #D67C94" class="fa fa-plus"></i></a>
                                        <a style="background: white;color: #D67C94;font-weight: bold;border-radius: 10px;border: 1px solid #D67C94;outline: none;" class="btn btn-primary" href="{{route('chi-tiet-san-pham', $pro->id)}}">Chi tiết sản phẩm</a>
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
                                <div style="padding-bottom: 50px" class="col-sm-4">
                                    <div class="single-item">
                                        @if($pro_other->promotion_price != 0)
                                            <div class="ribbon-wrapper">
                                                <div style="background: #F4989D;" class="ribbon sale">Sale</div>
                                            </div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('chi-tiet-san-pham',$pro_other->id)}}"><img style="width: 100%" src="source/image/product/{{$pro_other->image}}" alt="" height="250px"></a>
                                        </div>
                                        <div style="margin-bottom: 20px" class="single-item-body">
                                            <p style="font-weight: bold" class="single-item-title">{{$pro_other->name}}</p>
                                            <p class="single-item-price" style="font-size: 18px; font-weight: bold">
                                                @if($pro_other->promotion_price == 0)
                                                    <span class="flash-sale">{{number_format($pro_other->unit_price)}} đ</span>
                                                @else
                                                    <span class="flash-sale">{{number_format($pro_other->promotion_price)}} đ</span>
                                                    <span class="flash-del">{{number_format($pro_other->unit_price)}} đ</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a style="margin-right: 10px; border-radius: 10px;border: 1px solid #D67C94; background: white;" class="add-to-cart pull-left" href="{{route('themgiohang',$pro_other->id)}}"><i style="color: #D67C94" class="fa fa-plus"></i></a>
                                            <a style="background: white;color: #D67C94;font-weight: bold;border-radius: 10px;border: 1px solid #D67C94;outline: none;" class="btn btn-primary" href="{{route('chi-tiet-san-pham', $pro_other->id)}}">Chi tiết sản phẩm</a>
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
