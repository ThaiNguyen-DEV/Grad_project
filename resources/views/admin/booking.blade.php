@include('admin.blocks.header')
<div class="container body">
    <div class="main_container">
        @include('admin.blocks.sidebar')

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Quản lý <small>Booking</small></h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel border-0 shadow-sm" style="border-radius: 12px;">
                            <div class="x_title border-0 pb-0 d-flex justify-content-between align-items-center">
                                <h2 class="font-weight-bold" style="color: var(--primary-color); font-size: 20px;">Danh sách Booking</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content pt-3">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <p class="text-muted font-13 mb-4">
                                                Quản lý các đơn đặt tour. Bạn có thể xem chi tiết, xác nhận thanh toán hoặc hủy đơn tại đây.
                                            </p>
                                            <table id="datatable-booking" class="table table-hover table-borderless"
                                                style="width:100%">
                                                <thead style="background-color: var(--bg-color);">
                                                    <tr>
                                                        <th style="border-radius: 8px 0 0 8px;">Tên Tours</th>
                                                        <th>Tên khách hàng</th>
                                                        <th>Email</th>
                                                        <th>Số điện thoại</th>
                                                        <th>Địa chỉ</th>
                                                        <th>Ngày đặt</th>
                                                        <th>Người lớn</th>
                                                        <th>Trẻ em</th>
                                                        <th>Tổng giá tiền</th>
                                                        <th>Trạng thái Booking</th>
                                                        <th>Thanh toán</th>
                                                        <th>Trạng thái</th>
                                                        <th style="border-radius: 0 8px 8px 0;">Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-booking">
                                                    @include('admin.partials.list-booking')
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>
@include('admin.blocks.footer')
