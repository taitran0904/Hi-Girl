@extends('master')
@section('content')
@if(Session()->has('success')) 
<script>
    swal("Success", "{{ Session()->get('success') }}" , "success" ); 
</script>
@endif
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer" >
            <div class="banner" >
                <ul>
                    @foreach($slide as $sl)
                    <!-- THE SLIDE -->
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                            <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/images/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                            </div>
                        </div>
                    </li>
                        @endforeach
                </ul>
            </div>
        </div>

        <div class="tp-bannertimer"></div>
    </div>
</div>
<!--slider-->


</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($new_product)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($new_product as $newproduct)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($newproduct->promotion_price != 0)
                                    <div class="ribbon-wrapper"><div style="background: #F4989D;" class="ribbon sale">Sale</div>
                                    </div>
                                    @endif

                                    <div class="single-item-header">
                                        <a href="{{route('chi-tiet-san-pham', $newproduct->id)}}"><img style="width: 100%" src="source/image/product/{{$newproduct->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div style="margin-bottom: 20px" class="single-item-body">
                                        <p style="font-weight: bold" class="single-item-title">{{$newproduct->name}}</p>
                                        <p class="single-item-price" style="font-size: 18px; font-weight: bold">
                                            @if($newproduct->promotion_price == 0)
                                                <span class="flash-sale">{{number_format($newproduct->unit_price)}} đ</span>
                                            @else
                                                <span class="flash-sale">{{number_format($newproduct->promotion_price)}} đ</span>
                                                <span class="flash-del">{{number_format($newproduct->unit_price)}} đ</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a style="margin-right: 10px; border-radius: 10px;border: 1px solid #D67C94; background: white;" class="add-to-cart pull-left" href="{{route('themgiohang',$newproduct->id)}}"><i style="color: #D67C94" class="fa fa-plus"></i></a>
                                        <a style="background: white;color: #D67C94;font-weight: bold;border-radius: 10px;border: 1px solid #D67C94;outline: none;" class="btn btn-primary" href="{{route('chi-tiet-san-pham', $newproduct->id)}}">Chi tiết sản phẩm</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div>{{$new_product->links('pagination::bootstrap-4')}}</div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khuyến mãi</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($sale_product)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($sale_product as $sale_pro)
                            <div style="padding-bottom: 50px" class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('chi-tiet-san-pham', $sale_pro->id)}}"><img style="width: 100%" src="source/image/product/{{$sale_pro->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div style="margin-bottom: 20px" class="single-item-body">
                                        <p style="font-weight: bold" class="single-item-title">{{$sale_pro->name}}</p>
                                        <p class="single-item-price" style="font-size: 18px; font-weight: bold">
                                            @if($sale_pro->promotion_price == 0)
                                                <span  class="flash-sale">{{number_format($sale_pro->unit_price)}} đ</span>
                                            @else
                                                <span class="flash-sale">{{number_format($sale_pro->promotion_price)}} đ</span>
                                                <span class="flash-del">{{number_format($sale_pro->unit_price)}} đ</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a style="margin-right: 10px; border-radius: 10px;border: 1px solid #D67C94; background: white;" class="add-to-cart pull-left" href="{{route('themgiohang',$sale_pro->id)}}"><i style="color: #D67C94" class="fa fa-plus"></i></a>
                                        <a style="background: white;color: #D67C94;font-weight: bold;border-radius: 10px;border: 1px solid #D67C94;outline: none;" class="btn btn-primary" href="{{route('chi-tiet-san-pham', $sale_pro->id)}}">Chi tiết sản phẩm</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{-- <div class="space40">&nbsp;</div> --}}

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
@endsection
