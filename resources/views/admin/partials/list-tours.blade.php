@foreach ($tours as $tour)
    <tr>
        <td class="font-weight-bold align-middle">{{ $tour->title }}</td>
        <td class="align-middle">{{ $tour->time }}</td>
        <td class="align-middle"><div style="max-height: 60px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{!! $tour->description !!}</div></td>
        <td class="align-middle text-center"><span class="badge badge-info">{{ $tour->quantity }}</span></td>
        <td class="align-middle text-danger font-weight-bold">{{ number_format($tour->priceAdult, 0, ',', '.') }}</td>
        <td class="align-middle text-danger font-weight-bold">{{ number_format($tour->priceChild, 0, ',', '.') }}</td>
        <td class="align-middle">{{ $tour->destination }}</td>
        <td class="align-middle text-center">
            @if($tour->availability > 0)
                <span class="badge badge-success">Có sẵn</span>
            @else
                <span class="badge badge-danger">Hết chỗ</span>
            @endif
        </td>
        <td class="align-middle">{{ date('d-m-Y', strtotime($tour->startDate)) }}</td>
        <td class="align-middle">{{ date('d-m-Y', strtotime($tour->endDate)) }}</td>
        <td class="align-middle text-center">
            @php
                $today = \Carbon\Carbon::today();
                $start = \Carbon\Carbon::parse($tour->startDate);
                $end   = \Carbon\Carbon::parse($tour->endDate);
            @endphp
            @if ($today->lt($start))
                <span class="badge badge-warning" style="font-size: 12px; padding: 5px 10px;">
                    <i class="fa fa-clock-o mr-1"></i> Sắp diễn ra
                </span>
            @elseif ($today->lte($end))
                <span class="badge badge-success" style="font-size: 12px; padding: 5px 10px;">
                    <i class="fa fa-play-circle mr-1"></i> Đang diễn ra
                </span>
            @else
                <span class="badge badge-danger" style="font-size: 12px; padding: 5px 10px;">
                    <i class="fa fa-times-circle mr-1"></i> Đã kết thúc
                </span>
            @endif
        </td>
        <td class="align-middle text-center">
            <div class="d-flex justify-content-center gap-2">
                <button type="button" class="btn btn-sm btn-info btn-action-listTours edit-tour" data-toggle="modal" data-target="#edit-tour-modal"
                    data-tourId="{{ $tour->tourId }}" data-urledit="{{ route('admin.tour-edit') }}" title="Sửa tour">
                    <i class="fa fa-edit"></i>
                </button>
                <a href="{{ route('admin.delete-tour') }}" data-tourId="{{ $tour->tourId }}" class="btn btn-sm btn-danger delete-tour" title="Xóa tour">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
        </td>
    </tr>
@endforeach
