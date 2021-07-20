@extends('master_admin')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách khách hàng
                    <small></small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Mật khẩu</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Quyền Admin</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
                {{ $i = 1 }}
                <tbody>@foreach ($user as $u)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $i++ }}</td>
                        <td>{{ $u->full_name }}</td>
                        <td>{{ $u->email }}</td>
                        <td style="max-width: 100px;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    white-space: nowrap;">
                        {{ $u->password }}</td>
                        <td>{{ $u->phone }}</td>
                        <td>{{ $u->address }}</td>
                        @if ( $u->status == 1 )
                            <td>Yes</td>
                        @else
                            <td>No</td>
                        @endif
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a onclick="return confirm('Bạn có muốn xoá tài khoản {{$u->name}} không?')" href="{{route('xoa-khach-hang', $u->id)}}"> Delete</a></td>
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