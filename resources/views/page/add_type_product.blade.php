@extends('master_admin')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm danh mục
                    <small></small>
                </h1>
            </div> 
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('them-danh-muc') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{ $err }}
                        @endforeach
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input class="form-control" value="" placeholder="Vui lòng nhập tên danh mục" name="nametype" required/>
                        <label style="margin-top: 20px; margin-right: 20px">Trạng thái</label>
                        <input class="input-radio" type="radio" value="Hiện" name="status_radio" checked="checked"/>
                        <span style="margin-right: 10%">Hiện</span>
                        <input class="input-radio" type="radio" value="Ẩn" name="status_radio"/>
                        <span style="margin-right: 10%">Ẩn</span>
                    </div>
                    <button type="submit" class="btn btn-success">Thêm</button>
                    
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection