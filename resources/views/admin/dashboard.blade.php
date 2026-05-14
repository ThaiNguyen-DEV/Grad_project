@include('admin.blocks.header')

<div class="container body">
    <div class="main_container">
        @include('admin.blocks.sidebar')


        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->
            <div class="row" style="display: inline-block;width: 100%">
                <div class="tile_count">
                    <div class="col-md-3 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Tổng số tours đang hoạt động</span>
                        <div class="count green"><i class="fa fa-sort-asc"></i> {{ $summary['tourWorking'] }}</div>
                    </div>
                    <div class="col-md-3 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-clock-o"></i> Tổng số lượt booking</span>
                        <div class="count green"><i class="fa fa-sort-asc"></i> {{ $summary['countBooking'] }}</div>
                    </div>
                    <div class="col-md-3 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Số người dùng đăng ký</span>
                        <div class="count green"><i class="fa fa-sort-asc"></i> 2,500</div>
                    </div>
                    <div class="col-md-3 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Tổng doanh thu</span>
                        <div class="count red">{{ number_format($summary['totalAmount'], 0, ',', '.') }} vnđ</div>
                        <span class="sparkline_two" style="height: 160px;"><canvas width="196" height="40"
                                style="display: inline-block; width: 196px; height: 40px; vertical-align: top;"></canvas></span>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6 col-sm-12 ">
                    <div class="x_panel tile fixed_height_320 overflow_hidden">
                        <div class="x_title">
                            <h2><i class="fa fa-map-marker" style="margin-right: 8px;"></i> Điểm đến phổ biến</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content pt-3">
                            <table class="" style="width:100%">
                                <tr>
                                    <th style="width:37%;">
                                        <p class="text-muted">Biểu đồ tỷ lệ</p>
                                    </th>
                                    <th>
                                        <div class="col-lg-7 col-md-7 col-sm-7 ">
                                            <p class="text-muted">Khu vực</p>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 " style="text-align: center">
                                            <p class="text-muted">Tỷ trọng</p>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <canvas class="canvasDoughnut" height="140" width="140"
                                            style="margin: 15px 10px 10px 0"
                                            data-chart-values="{{ json_encode($dataDomain['values']) }}"></canvas>
                                    </td>
                                    <td>
                                        <table class="tile_info w-100 mt-2">
                                            <tr>
                                                <td>
                                                    <p class="mb-2"><i class="fa fa-square red" style="margin-right: 8px;"></i>Miền Bắc </p>
                                                </td>
                                                <td class="font-weight-bold text-right">{{ $dataDomain['values'][0] }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="mb-2"><i class="fa fa-square green" style="margin-right: 8px;"></i>Miền Trung </p>
                                                </td>
                                                <td class="font-weight-bold text-right">{{ $dataDomain['values'][1] }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="mb-2"><i class="fa fa-square purple" style="margin-right: 8px;"></i>Miền Nam </p>
                                                </td>
                                                <td class="font-weight-bold text-right">{{ $dataDomain['values'][2] }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-pie-chart" style="margin-right: 8px;"></i> Tỷ lệ thanh toán</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div id="echart_donut" data-payment-method='{{ json_encode($paymentStatus) }}'
                                style="height: 350px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative; background-color: transparent;"
                                _echarts_instance_="ec_1733563825119">
                                <div
                                    style="position: relative; overflow: hidden; width: 380px; height: 350px; cursor: default;">
                                    <canvas width="380" height="350" data-zr-dom-id="zr_0"
                                        style="position: absolute; left: 0px; top: 0px; width: 380px; height: 350px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-star" style="margin-right: 8px; color: var(--warning-color);"></i> Tours nổi bật <small>được đặt nhiều nhất</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content pt-2">
                            <table class="table table-hover table-borderless">
                                <thead style="background: rgba(0,0,0,0.02);">
                                    <tr>
                                        <th style="border-radius: 6px 0 0 6px;">Mã Tour</th>
                                        <th>Tên Tour</th>
                                        <th class="text-center">Số chỗ đã đặt</th>
                                        <th class="text-center" style="border-radius: 0 6px 6px 0;">Còn trống</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($toursBooked as $item)
                                        <tr>
                                            <th scope="row" class="text-primary">#{{ $item->tourId }}</th>
                                            <td class="font-weight-bold">{{ $item->title }}</td>
                                            <td class="text-center"><span class="badge badge-success">{{ $item->booked_quantity }}</span></td>
                                            <td class="text-center"><span class="badge badge-warning">{{ $item->quantity }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-clock-o" style="margin-right: 8px; color: var(--info-color);"></i> Đơn đặt mới nhất</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content pt-2">
                            <table class="table table-hover table-borderless">
                                <thead style="background: rgba(0,0,0,0.02);">
                                    <tr>
                                        <th style="border-radius: 6px 0 0 6px;">Mã Đơn</th>
                                        <th>Khách hàng</th>
                                        <th>Tổng tiền</th>
                                        <th class="text-center" style="border-radius: 0 6px 6px 0;">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($newBooking as $item)
                                        <tr>
                                            <th scope="row">
                                                <a href="{{ route('admin.booking-detail',['id' => $item->bookingId]) }}" class="text-primary">#{{ $item->bookingId }}</a>
                                            </th>
                                            <td>
                                                <div class="font-weight-bold">{{ $item->fullName }}</div>
                                                <div class="text-muted" style="font-size: 11px;">{{ Str::limit($item->tour_name, 25) }}</div>
                                            </td>
                                            <td class="font-weight-bold text-danger">{{ number_format($item->totalPrice, 0, ',', '.') }} đ</td>
                                            <td class="text-center">
                                                <span class="badge badge-warning">Chưa xác nhận</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">

                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Doanh thu theo tháng</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <canvas id="lineChart" data-revenue-per-month = {{ json_encode($revenue)}}></canvas>
                        </div>

                    </div>

                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
        <!-- /page content -->
    </div>
</div>

@include('admin.blocks.footer')
