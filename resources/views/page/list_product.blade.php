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
                <h1 class="page-header">Danh sách sản phẩm
                    <small></small>
                </h1>
                
            </div>
            <div style="padding-bottom: 10px; float: right">
                <a href="{{route('them-san-pham')}}" class="btn btn-info">Thêm sản phẩm<command></a>
            </div>
            
            <!-- /.col-lg-12 -->
            {{-- <a href="{{route('them-danh-muc')}}" class="btn btn-info">Thêm danh mục<command></a> --}}
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        {{-- <th>ID</th> --}}
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Mô tả</th>
                        <th>Số lượng</th>
                        <th>Số lượng còn lại</th>
                        <th>Giá vốn</th>
                        <th>Giá bán</th>
                        <th>Giá khuyên mãi</th>
                        <th>Hình ảnh</th>
                        <th>Xoá</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $pro)
                    <tr class="odd gradeX" align="left">
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                        <td>{{ $pro->name }}</td>
                        @foreach ($type_product as $type_pro)
                            @if ($pro->id_type == $type_pro->id)
                                <td>{{ $type_pro->name }}</td>
                            @endif
                        @endforeach
                        {{-- <td>{{ $pro->id_type }}</td> --}}
                        <td style="max-width: 100px;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        white-space: nowrap;">{{ $pro->description }}</td>
                        <td>{{ $pro->amount }}</td>
                        <td>{{ $pro->rest }}</td>
                        <td>{{ $pro->cost }}</td>
                        <td>{{ $pro->unit_price }}</td>
                        <td>{{ $pro->promotion_price }}</td>
                        <td>{{ $pro->image }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('xoa-san-pham', $pro->id)}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('chinh-sua-san-pham', $pro->id)}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row" style="text-align: center">{{$product->links('pagination::bootstrap-4')}}</div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection