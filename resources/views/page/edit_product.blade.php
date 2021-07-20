@extends('master_admin')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh sửa thông tin sản phẩm
                    <small></small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('chinh-sua-san-pham', ['id' => $product->id]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{ $err }}
                        @endforeach
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input value="{{ $product->name }}" class="form-control" name="name" placeholder="Vui lòng nhập tên sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Danh mục sản phẩm</label>
                        {{-- <input class="form-control" name="" placeholder="Vui lòng nhập tóm tắt bài viết" /> --}}
                        <select name="type_product" class="form-control" style="width: 50%">
                            <option value="">--Vui lòng chọn danh mục--</option>
                            @foreach ($product_type as $pro_type)
                                <option value="{{ $pro_type->id }}">{{ $pro_type->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="description" placeholder="Hãy mô tả gì đó...">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input value="{{ $product->amount }}" class="form-control" style="width: 30%" name="amount" placeholder="Số lượng" />
                        <label>Số lượng còn lại</label>
                        <input value="{{ $product->rest }}" class="form-control" style="width: 30%" name="rest" placeholder="Số lượng còn lại" />
                        <label>Giá vốn</label>
                        <input value="{{ $product->cost }}" class="form-control" style="width: 30%" name="cost" placeholder="Giá vốn" />
                        <label>Giá bán</label>
                        <input value="{{ $product->unit_price }}" class="form-control" style="width: 30%" name="unit_price" placeholder="Giá bán" />
                        <label>Giá khuyến mãi</label>
                        <input value="{{ $product->promotion_price }}" class="form-control" style="width: 30%" name="promotion_price" placeholder="Giá khuyến mãi" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input name="image" type="file" style="width: 40%" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection