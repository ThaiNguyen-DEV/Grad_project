@include('admin.blocks.header')
<div class="container body">
    <div class="main_container">
        @include('admin.blocks.sidebar')

        <div class="right_col" role="main">
            <style>
                .right_col {
                    background: #f4f6fb;
                    padding: 24px;
                }

                .page-header-bar {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    margin-bottom: 20px;
                    flex-wrap: wrap;
                    gap: 12px;
                }

                .page-header-bar h3 {
                    font-size: 20px;
                    font-weight: 700;
                    color: #1a1f36;
                    margin: 0;
                }

                .search-bar {
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    background: #fff;
                    border: 1px solid #e2e8f0;
                    border-radius: 10px;
                    padding: 8px 14px;
                    min-width: 260px;
                }

                .search-bar i {
                    color: #b0bcc8;
                    font-size: 14px;
                }

                .search-bar input {
                    border: none;
                    outline: none;
                    font-size: 13px;
                    color: #1a1f36;
                    background: transparent;
                    width: 100%;
                }

                .user-table-wrap {
                    background: #fff;
                    border-radius: 14px;
                    border: 1px solid #eef0f5;
                    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
                    overflow: hidden;
                }

                .user-table-wrap .table-head {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    padding: 16px 20px;
                    border-bottom: 1px solid #f0f2f8;
                }

                .user-table-wrap .table-head h5 {
                    font-size: 15px;
                    font-weight: 600;
                    color: #1a1f36;
                    margin: 0;
                }

                .user-table-wrap .table-head .count {
                    font-size: 12px;
                    color: #8a94a6;
                    background: #f4f6fb;
                    padding: 4px 10px;
                    border-radius: 20px;
                }

                .utbl {
                    width: 100%;
                    border-collapse: collapse;
                    font-size: 13px;
                }

                .utbl thead tr th {
                    padding: 10px 16px;
                    background: #f8f9fc;
                    color: #8a94a6;
                    font-weight: 600;
                    font-size: 11px;
                    text-transform: uppercase;
                    letter-spacing: 0.5px;
                    border-bottom: 1px solid #eef0f5;
                    white-space: nowrap;
                }

                .utbl tbody tr {
                    border-bottom: 1px solid #f4f6fb;
                    transition: background 0.15s;
                }

                .utbl tbody tr:last-child {
                    border-bottom: none;
                }

                .utbl tbody tr:hover {
                    background: #f8f9fc;
                }

                .utbl tbody td {
                    padding: 14px 16px;
                    vertical-align: middle;
                    color: #1a1f36;
                }

                .user-info {
                    display: flex;
                    align-items: center;
                    gap: 12px;
                }

                .user-info .avatar {
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    object-fit: cover;
                    flex-shrink: 0;
                    border: 2px solid #eef0f5;
                }

                .user-info .name {
                    font-weight: 600;
                    font-size: 13px;
                    color: #1a1f36;
                }

                .user-info .username {
                    font-size: 11px;
                    color: #8a94a6;
                    margin-top: 1px;
                }

                .meta-info {
                    font-size: 12px;
                    color: #6b7280;
                }

                .meta-info i {
                    width: 14px;
                    color: #b0bcc8;
                    margin-right: 4px;
                }

                .status-badge {
                    display: inline-flex;
                    align-items: center;
                    gap: 5px;
                    padding: 4px 10px;
                    border-radius: 20px;
                    font-size: 11px;
                    font-weight: 600;
                }

                .status-badge.active {
                    background: #e6f4ea;
                    color: #1e8c45;
                }

                .status-badge.inactive {
                    background: #fff8e1;
                    color: #b8860b;
                }

                .status-badge.banned {
                    background: #fce8e6;
                    color: #c62828;
                }

                .status-badge.deleted {
                    background: #f3f4f6;
                    color: #6b7280;
                }

                .status-badge::before {
                    content: '';
                    width: 6px;
                    height: 6px;
                    border-radius: 50%;
                    background: currentColor;
                }

                .action-group {
                    display: flex;
                    gap: 6px;
                    flex-wrap: nowrap;
                }

                .btn-act {
                    display: inline-flex;
                    align-items: center;
                    gap: 5px;
                    padding: 5px 12px;
                    border-radius: 8px;
                    font-size: 12px;
                    font-weight: 600;
                    border: none;
                    cursor: pointer;
                    transition: all 0.2s;
                    white-space: nowrap;
                }

                .btn-act.success {
                    background: #e6f4ea;
                    color: #1e8c45;
                }

                .btn-act.success:hover {
                    background: #1e8c45;
                    color: #fff;
                }

                .btn-act.warn {
                    background: #fff8e1;
                    color: #b8860b;
                }

                .btn-act.warn:hover {
                    background: #f59e0b;
                    color: #fff;
                }

                .btn-act.info {
                    background: #e8f0fe;
                    color: #1a73e8;
                }

                .btn-act.info:hover {
                    background: #1a73e8;
                    color: #fff;
                }

                .btn-act.danger {
                    background: #fce8e6;
                    color: #c62828;
                }

                .btn-act.danger:hover {
                    background: #e53935;
                    color: #fff;
                }
            </style>

            <div class="page-header-bar">
                <h3><i class="fa fa-users" style="color:#1a73e8; margin-right:10px;"></i>Quản lý người dùng</h3>
                <div class="search-bar">
                    <i class="fa fa-search"></i>
                    <input type="text" placeholder="Tìm kiếm người dùng...">
                </div>
            </div>

            <div class="user-table-wrap">
                <div class="table-head">
                    <h5>Danh sách người dùng</h5>
                    <span class="count">{{ count($users) }} người dùng</span>
                </div>
                <table class="utbl">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Người dùng</th>
                            <th>Liên hệ</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $i => $user)
                        <tr>
                            <td style="color:#b0bcc8; font-weight:600;">{{ $i + 1 }}</td>

                            <td>
                                <div class="user-info">
                                    <img src="{{ asset('admin/assets/images/user-profile/' . $user->avatar) }}"
                                        alt="" class="avatar">
                                    <div>
                                        <div class="name">{{ $user->fullName ?: 'Unnamed' }}</div>
                                        <div class="username">@{{ $user->username }}</div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="meta-info">
                                    <div><i class="fa fa-phone"></i>{{ $user->phoneNumber ?: '—' }}</div>
                                </div>
                            </td>

                            <td>
                                <div class="meta-info">
                                    <i class="fa fa-map-marker"></i>
                                    {{ $user->address ?: '—' }}
                                </div>
                            </td>

                            <td>
                                @if ($user->status === 'b')
                                <span class="status-badge banned">Đã chặn</span>
                                @elseif ($user->status === 'd')
                                <span class="status-badge deleted">Đã xóa</span>
                                @elseif ($user->isActive === 'Đã kích hoạt')
                                <span class="status-badge active">Đã kích hoạt</span>
                                @else
                                <span class="status-badge inactive">Chưa kích hoạt</span>
                                @endif
                            </td>

                            <td>
                                <div class="action-group">
                                    @if ($user->isActive == 'Chưa kích hoạt')
                                    <button type="button" class="btn-act success" id="btn-active"
                                        data-attr='{"userId": "{{ $user->userId }}", "action": "{{ route('admin.active-user') }}"}'>
                                        <i class="fa fa-check"></i> Kích hoạt
                                    </button>
                                    @endif

                                    @if ($user->status !== 'b')
                                    <button type="button" class="btn-act warn" id="btn-ban"
                                        data-attr='{"userId": "{{ $user->userId }}", "action": "{{ route('admin.status-user') }}", "status": "b"}'>
                                        <i class="fa fa-ban"></i> Chặn
                                    </button>
                                    @else
                                    <button type="button" class="btn-act info" id="btn-unban"
                                        data-attr='{"userId": "{{ $user->userId }}", "action": "{{ route('admin.status-user') }}", "status": ""}'>
                                        <i class="fa fa-unlock"></i> Bỏ chặn
                                    </button>
                                    @endif

                                    @if ($user->status !== 'd')
                                    <button type="button" class="btn-act danger" id="btn-delete"
                                        data-attr='{"userId": "{{ $user->userId }}", "action": "{{ route('admin.status-user') }}", "status": "d"}'>
                                        <i class="fa fa-trash"></i> Xóa
                                    </button>
                                    @else
                                    <button type="button" class="btn-act info" id="btn-restore"
                                        data-attr='{"userId": "{{ $user->userId }}", "action": "{{ route('admin.status-user') }}", "status": ""}'>
                                        <i class="fa fa-refresh"></i> Khôi phục
                                    </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        {{-- /page content --}}
    </div>
</div>
@include('admin.blocks.footer')