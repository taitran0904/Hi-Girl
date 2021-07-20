@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Liên hệ</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('trang-chu') }}">Home</a> / <span>Liên hệ</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div>
    <div class="row" id="bank" style="text-align: center">
        <div class="col"><img class="nganhang" src="https://file.hstatic.net/1000025647/file/logo_sacombank-compressed_3be2b2a8c6f7455eb825fc23563d1f1e_grande.jpg" width="219" height="79">
            <h6 class="infor-bank">Chủ tài khoản : Trần Lê Tấn Tài<br>Số tài khoản : 38484858393<br>Chi nhánh : Sacombank Bình Dương&nbsp;<br>----------------------------------</h6>
        </div>
    </div>
    <div class="row" style="text-align: center">
        <div class="col"><img class="nganhang" src="//file.hstatic.net/1000025647/file/logo_cua_vietinbank_grande.png" width="120" height="60">
            <h6 class="infor-bank">Chủ tài khoản : Trần Lê Tấn Tài<br>Số tài khoản : 38484858393<br>Chi nhánh : VietinBank Bình Dương&nbsp;<br>----------------------------------</h6>
        </div>
    </div>
    <div class="row" style="text-align: center">
        <div class="col"><img class="nganhang" src="//file.hstatic.net/1000025647/file/screenshot_94943a596b6348f0b2fabbb02282e332_grande.png" width="101" height="56">
            <h6 class="infor-bank">Chủ tài khoản : Trần Lê Tấn Tài<br>Số tài khoản : 38484858393<br>Chi nhánh : ACB Bình Dương&nbsp;<br>----------------------------------</h6>
        </div>
    </div>
</div>
@endsection
