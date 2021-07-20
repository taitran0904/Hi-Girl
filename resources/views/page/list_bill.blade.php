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
                <h1 class="page-header">Danh sách hoá đơn
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Tên đăng nhập</th>
                        <th>Tên người nhận</th>
                        <th>Ngày mua hàng</th>
                        <th>Tổng tiền</th>
                        <th>Hình thức thanh toán</th>
                        <th>Ghi chú</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Chỉnh sửa</th>
                        <th>Xoá</th>
                        <th>Chi tiết hoá đơn</th>
                    </tr>
                </thead>
                <tbody>
                    <p style="opacity: 0;">{{ $i = 1 }}</p>
                    @foreach ($bill as $b)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $i++ }}</td>
                        @foreach ($customer as $c)
                            @if ($b->id_customer == $c->id)
                                @if ($c->id_user != NULL)
                                    @foreach ($user as $u)
                                        @if ($c->id_user == $u->id)
                                            <td>{{ $u->full_name }}</td>
                                        @endif   
                                    @endforeach
                                @else
                                    <td> </td>
                                @endif
                                <td>{{ $c->name }}</td>
                            @endif
                    @endforeach
                        <td>{{ $b->date_order }}</td>
                        <td>{{ $b->total }}</td>
                        <td>{{ $b->payment }}</td>
                        <td>{{ $b->note }}</td>
                        @if ($b->status == 0)
                            <td>Chưa duyệt</td>
                        @else
                            <td>Đã duyệt</td>
                        @endif
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('chinh-sua-hoa-don', $b->id)}}">Edit</a></td>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a onclick="return confirm('Bạn có muốn xoá hoá đơn này không?')" href="{{route('xoa-hoa-don', $b->id)}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-eye fa-fw"></i><a href="{{route('chi-tiet-hoa-don', $b->id)}}"> Xem</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="row" style="text-align: center">{{$b->links('pagination::bootstrap-4')}}</div> --}}
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection