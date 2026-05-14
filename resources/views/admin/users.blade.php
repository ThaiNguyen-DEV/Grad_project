@include('admin.blocks.header')
<div class="container body">
    <div class="main_container">
        @include('admin.blocks.sidebar')

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Quản lý người dùng</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="x_panel border-0 shadow-sm" style="border-radius: 12px;">
                    <div class="x_title border-0 pb-0 d-flex justify-content-between align-items-center">
                        <h2 class="font-weight-bold" style="color: var(--primary-color); font-size: 20px;">Danh sách Người dùng</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content row pt-3">
                        @foreach ($users as $user)
                            <div class="col-md-4 col-sm-4 profile_details mb-4">
                                <div class="well profile_view border-0 shadow-sm" style="border-radius: 12px; background: #fff; overflow: hidden; transition: transform 0.3s ease;">
                                    <div class="col-sm-12 pt-3 pb-2">
                                        <h4 class="brief mb-3"><span class="badge {{ $user->isActive == 'Đã kích hoạt' ? 'badge-success' : 'badge-warning' }}">{{ $user->isActive }}</span></h4>
                                        <div class="left col-md-7 col-sm-7">
                                            <h2 class="font-weight-bold" style="font-size: 18px; color: var(--primary-color);">{{ $user->fullName }}</h2>
                                            <p class="text-muted mb-2" style="font-size: 13px;"><strong>@</strong>{{ $user->username }} </p>
                                            <ul class="list-unstyled text-muted mt-3" style="font-size: 13px;">
                                                <li class="mb-2"><i class="fa fa-map-marker me-2" style="color: var(--info-color); width: 15px;"></i> {{ $user->address }}</li>
                                                <li><i class="fa fa-phone me-2" style="color: var(--success-color); width: 15px;"></i> {{ $user->phoneNumber }}</li>
                                            </ul>
                                        </div>
                                        <div class="right col-md-5 col-sm-5 text-center mt-2">
                                            <img src="{{ asset('admin/assets/images/user-profile/' . $user->avatar) }}"
                                                alt="" class="img-circle img-fluid shadow-sm" style="border: 3px solid #f4f6f9; width: 80px; height: 80px; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="profile-bottom text-center p-3" style="background: rgba(0,0,0,0.02); border-top: 1px solid var(--border-color);">
                                        <div class="col-sm-12 emphasis d-flex justify-content-center gap-2">
                                            @if ($user->isActive == 'Chưa kích hoạt')
                                                <button type="button" class="btn btn-sm btn-success rounded-pill px-3 shadow-sm"
                                                    data-attr='{"userId": "{{ $user->userId }}", "action": "{{ route('admin.active-user') }}"}'
                                                    id="btn-active">
                                                    <i class="fa fa-check me-1"> </i> Kích hoạt
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-sm btn-warning rounded-pill px-3 shadow-sm text-white"
                                                data-attr='{"userId": "{{ $user->userId }}", "action": "{{ route('admin.status-user') }}", "status": "b"}'
                                                id="btn-ban"
                                                style="{{ $user->status === 'b' ? 'display: none;' : '' }}">
                                                <i class="fa fa-ban me-1"> </i> Chặn
                                            </button>

                                            <button type="button" class="btn btn-sm btn-info rounded-pill px-3 shadow-sm text-white"
                                                data-attr='{"userId": "{{ $user->userId }}", "action": "{{ route('admin.status-user') }}", "status": ""}'
                                                id="btn-unban"
                                                style="{{ $user->status !== 'b' ? 'display: none;' : '' }}">
                                                <i class="fa fa-unlock me-1"> </i> Bỏ chặn
                                            </button>

                                            <button type="button" class="btn btn-sm btn-danger rounded-pill px-3 shadow-sm"
                                                data-attr='{"userId": "{{ $user->userId }}", "action": "{{ route('admin.status-user') }}", "status": "d"}'
                                                id="btn-delete"
                                                style="{{ $user->status === 'd' ? 'display: none;' : '' }}">
                                                <i class="fa fa-trash me-1"> </i> Xóa
                                            </button>
                                            
                                            <button type="button" class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm"
                                                data-attr='{"userId": "{{ $user->userId }}", "action": "{{ route('admin.status-user') }}", "status": ""}'
                                                id="btn-restore"
                                                style="{{ $user->status !== 'd' ? 'display: none;' : '' }}">
                                                <i class="fa fa-refresh me-1"> </i> Khôi phục
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>
@include('admin.blocks.footer')
