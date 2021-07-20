@extends('master_admin')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa danh mục</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('chinh-sua-banner',['id' => $slide->id]) }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{ $err }}
                        @endforeach
                    </div>
                    @endif
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