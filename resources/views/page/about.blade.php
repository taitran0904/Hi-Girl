@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">BLOG Làm đẹp</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('gioi-thieu') }}">Home</a> / <span>BLOG Làm đẹp</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div class="our-history">
            {{-- <h2 class="text-center wow fadeInDown">Our History</h2> --}}
            <div class="space35">&nbsp;</div>
            <div class="history-slider">
                <div >
                    <div>
                        <div class="row">
                            <div class="col-sm-5">
                                <img src="source/image/blog/blog1.jpg" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Giám đốc Phát triển kinh doanh và Hệ thống Mai Lan Lê: “Thành công là tạo ra giá trị tốt hơn cho cộng đồng”</h5>
                                <p>Người viết: M.O.I Cosmetics 20.01.2021</p>
                                <div class="space20">&nbsp;</div>
                                <p>Contour, bronzer và highlight là những kỹ thuật trang điểm khác nhau nhưng không phải ai cũng biết rõ. Bạn có biết được sự khác biệt...</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-5">
                                <img src="source/image/blog/blog2.jpg" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">5 màu son "QUYỀN LỰC" cho một năm mới RỰC RỠ</h5>
                                <p>Người viết: M.O.I Cosmetics 20.01.2021</p>
                                <div class="space20">&nbsp;</div>
                                <p>Năm 2021 đã cận kề, để chào đón một mùa lễ hội sắp bắt đầu, bên cạnh những bộ cánh duyên dáng, bạn đừng quên...</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-5">
                                <img src="source/image/blog/blog3.jpg" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Rạng rỡ đón Giáng sinh với quà tặng cực chất từ M.O.I Cosmetics</h5>
                                <p>Người viết: M.O.I Cosmetics 20.01.2021</p>
                                <div class="space20">&nbsp;</div>
                                <p>Không khí của mùa lễ hội cuối năm đã lan tỏa từ nhà đến công sở. Bạn đừng chần chừ nữa mà hãy “xắn tay...</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-5">
                                <img src="source/image/blog/blog4.jpg" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">3 set son mini từ M.O.I Cosmetics hứa hẹn sẽ khiến các cô nàng "đổ đứ đừ"</h5>
                                <p>Người viết: M.O.I Cosmetics 20.01.2021</p>
                                <div class="space20">&nbsp;</div>
                                <p>Bạn đã biết tin gì chưa? Trong ngày 17/12 vừa qua, M.O.I Cometics đã cho ra mắt BST son thỏi mini siêu hot Golden Gift phiên...</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-5">
                                <img src="source/image/blog/blog5.jpg" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Golden Gift - BST son thỏi mini “khuấy động” mùa lễ hội</h5>
                                <p>Người viết: M.O.I Cosmetics 20.01.2021</p>
                                <div class="space20">&nbsp;</div>
                                <p>Mùa lễ hội năm nay, hãy cùng chờ đón bất ngờ đặc biệt mang tên Golden Gift - BST son thỏi mini sang chảnh hứa...</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-5">
                                <img src="source/image/blog/blog6.jpg" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Diện màu son S.Girls nào để đẹp lung linh trong đêm tiệc Noel?</h5>
                                <p>Người viết: M.O.I Cosmetics 20.01.2021</p>
                                <div class="space20">&nbsp;</div>
                                <p>Giáng sinh đã cận kề mà bạn vẫn còn đang đau đầu không biết chọn màu son nào để tỏa sáng trong những bữa tiệc...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space50">&nbsp;</div>
        <hr />
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
