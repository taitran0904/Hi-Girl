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
                <h1 class="page-header">Danh sách danh mục
                </h1>
            </div>
            <div style="padding-bottom: 10px; float: right">
                <a href="{{route('them-danh-muc')}}" class="btn btn-info">Thêm danh mục<command></a>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Trạng thái</th>
                        <th>Xoá</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product_type as $pro_type)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $pro_type->id }}</td>
                        <td>{{ $pro_type->name }}</td>
                        <td>{{ $pro_type->status }}</td>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a onclick="return confirm('Bạn có muốn xoá danh mục {{$pro_type->name}} không?')" href="{{route('xoa-danh-muc', $pro_type->id)}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('chinh-sua-danh-muc', $pro_type->id)}}">Edit</a></td>
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