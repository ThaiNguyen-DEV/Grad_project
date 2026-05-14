@foreach ($list_booking as $booking)
    <tr>
        <td class="font-weight-bold align-middle text-primary">{{ Str::limit($booking->title, 30) }}</td>
        <td class="align-middle">{{ $booking->fullName }}</td>
        <td class="align-middle text-muted">{{ $booking->email }}</td>
        <td class="align-middle">{{ $booking->phoneNumber }}</td>
        <td class="align-middle text-muted"><span title="{{ $booking->address }}">{{ Str::limit($booking->address, 15) }}</span></td>
        <td class="align-middle">{{ date('d/m/Y', strtotime($booking->bookingDate)) }}</td>
        <td class="align-middle text-center">{{ $booking->numAdults }}</td>
        <td class="align-middle text-center">{{ $booking->numChildren }}</td>
        <td class="align-middle text-danger font-weight-bold">{{ number_format($booking->totalPrice, 0, ',', '.') }} đ</td>
        <td class="align-middle text-center">
            @if ($booking->bookingStatus == 'c')
                <span class="badge badge-danger">Đã hủy</span>
            @elseif ($booking->bookingStatus == 'b')
                <span class="badge badge-warning text-white">Chưa xác nhận</span>
            @elseif ($booking->bookingStatus == 'y')
                <span class="badge badge-primary">Đã xác nhận</span>
            @elseif ($booking->bookingStatus == 'f')
                <span class="badge badge-success">Đã hoàn thành</span>
            @endif
        </td>
        <td class="align-middle text-center">
            @if ($booking->paymentMethod == 'momo-payment')
                <img src="{{ asset('admin/assets/images/icon/icon_momo.png') }}" class="icon_payment" alt="Momo" style="width: 24px;">
            @elseif ($booking->paymentMethod == 'paypal-payment')
                <img src="{{ asset('admin/assets/images/icon/icon_paypal.png') }}" class="icon_payment" alt="PayPal" style="width: 24px;">
            @else
                <i class="fa fa-money text-success" style="font-size: 20px;" title="Tiền mặt"></i>
            @endif
        </td>

        <td class="align-middle text-center">
            @if ($booking->paymentStatus == 'n')
                <span class="badge badge-danger">Chưa TT</span>
            @else
                <span class="badge badge-success">Đã TT</span>
            @endif
        </td>

        <td class="align-middle text-center">
            <div class="dropdown">
                <button type="button" class="btn btn-sm btn-light dropdown-toggle border shadow-sm"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 6px;">
                    <i class="fa fa-cog text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right shadow border-0" style="border-radius: 8px;">
                    @if ($booking->bookingStatus == 'b')
                    <a class="dropdown-item py-2 confirm-booking text-success fw-bold" href="javascript:void(0)" data-bookingId="{{ $booking->bookingId }}"
                        data-urlConfirm="{{ route('admin.confirm-booking') }}"><i class="fa fa-check-circle me-2"></i> Xác nhận</a>
                    @endif
                    <a class="dropdown-item py-2 finish-booking {{ $booking->hide }} text-primary fw-bold" href="javascript:void(0)" data-bookingId="{{ $booking->bookingId }}"
                        data-urlfinish="{{ route('admin.finish-booking') }}"><i class="fa fa-flag-checkered me-2"></i> Hoàn thành</a>
                    <div class="dropdown-divider m-0"></div>
                    <a class="dropdown-item py-2 text-dark" href="{{ route('admin.booking-detail',['id' => $booking->bookingId]) }}"><i class="fa fa-eye me-2 text-muted"></i> Xem chi tiết</a>
                </div>
            </div>
        </td>
    </tr>
@endforeach
