@extends('master_admin')
@section('content')
<div id="page-wrapper">
    @if (Session('alert'))
        <div class="alert alert-success">
            {{ Session('alert') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Banner
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item_slide as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->image }}</td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('chinh-sua-banner', $item->id)}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection