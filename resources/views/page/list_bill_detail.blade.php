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
                <h1 class="page-header">Chi tiết hoá đơn
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <p style="opacity: 0;">{{ $i = 1 }}</p>
                    @foreach ($bill_detail as $b_detail)
                        <tr>
                                <td>{{ $i++ }}</td>
                                @foreach ($product as $pro)
                                    @if ($b_detail->id_product == $pro->id)
                                        <td>{{ $pro->name }}</td>
                                    @endif
                                @endforeach
                                <td>{{ $b_detail->quantity }}</td>
                                <td>{{ number_format($b_detail->unit_price) }}đ</td>
                                <td>{{ number_format($b_detail->quantity * $b_detail->unit_price) }}đ</td> 
                        </tr> 
                    @endforeach
                </tbody>
            </table>
            <p style="font-size: 20px; font-weight: bold; color: red">Tổng: {{ number_format($bill->total) }} đ</p>
        </div>
        {{-- <div class="row" style="text-align: center">{{$b->links('pagination::bootstrap-4')}}</div> --}}
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection