@extends('master_admin')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh sửa thông tin hoá đơn
                    <small></small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('chinh-sua-hoa-don', ['id' => $bill->id]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{ $err }}
                        @endforeach
                    </div>
                    @endif
                    @foreach ($customer as $c)
                            @if ($bill->id_customer == $c->id)
                                @if ($c->id_user != NULL)
                                    @foreach ($user as $u)
                                        @if ($c->id_user == $u->id)
                                            <div class="form-group">
                                                <label>Tên đăng nhập</label>
                                                <input value="{{ $u->full_name }}" class="form-control" name="username" disabled/>
                                                @break
                                            </div>
                                        @endif   
                                    @endforeach
                                @else
                                    <label>Tên đăng nhập</label>
                                    <input value="" class="form-control" name="username" disabled/>
                                @endif
                                <div class="form-group">
                                    <label>Tên người nhận</label>
                                    <input value="{{ $c->name }}" class="form-control" name="name" disabled/>
                                </div>
                            @endif
                    @endforeach
                    <div class="form-group">
                        <label>Ngày mua hàng</label>
                        <input value="{{ $bill->date_order }}" class="form-control" style="width: 30%" name="date_order" disabled/>
                        <label>Tổng tiền</label>
                        <input value="{{ $bill->total }}" class="form-control" style="width: 30%" name="total" disabled />
                        <label>Hình thức thanh toán</label>
                        <input value="{{ $bill->payment }}" class="form-control" style="width: 30%" name="payment" disabled/>
                        <label>Ghi chú</label>
                        <textarea class="form-control" rows="3" name="note" disabled>{{ $bill->note }}</textarea>
                        <label>Trạng thái đơn hàng</label>
                        @if ($bill->status == 1)
                            <input class="input-radio" type="radio" value="1" name="status_radio" checked="checked"/>
                            <span style="margin-right: 10%">Đã duyệt</span>
                            <input class="input-radio" type="radio" value="0" name="status_radio"/>
                            <span style="margin-right: 10%">Chưa duyệt</span>
                        @else
                            <input class="input-radio" type="radio" value="1" name="status_radio"/>
                            <span style="margin-right: 10%">Đã duyệt</span>
                            <input class="input-radio" type="radio" value="0" name="status_radio" checked="checked"/>
                            <span style="margin-right: 10%">Chưa duyệt</span>
                        @endif  
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