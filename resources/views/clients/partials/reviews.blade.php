{{-- Tổng quan đánh giá --}}
<div class="d-flex align-items-center gap-4 bg-light rounded-3 p-4 mb-4">
    <div class="text-center" style="min-width: 80px;">
        <div class="fw-bold text-primary" style="font-size: 2.5rem; line-height: 1;">
            {{ number_format($avgStar, 1) }}
        </div>
        <div class="text-warning my-1">
            @for ($i = 0; $i < 5; $i++)
                <i class="{{ $avgStar && $i < $avgStar ? 'fas' : 'far' }} fa-star"></i>
                @endfor
        </div>
        <small class="text-muted">{{ $countReview }} đánh giá</small>
    </div>
    <div class="vr"></div>
    <div class="flex-grow-1">
        @php
        $levels = [5 => 'Xuất sắc', 4 => 'Tốt', 3 => 'Trung bình', 2 => 'Kém', 1 => 'Rất kém'];
        @endphp
        @foreach ($levels as $star => $label)
        @php
        $count = $getReviews->where('rating', $star)->count();
        $percent = $countReview > 0 ? ($count / $countReview) * 100 : 0;
        @endphp
        <div class="d-flex align-items-center gap-2 mb-1" style="font-size: 13px;">
            <span class="text-muted" style="width: 60px;">{{ $label }}</span>
            <div class="progress flex-grow-1" style="height: 6px;">
                <div class="progress-bar bg-warning" style="width: {{ $percent }}%;"></div>
            </div>
            <span class="text-muted" style="width: 20px;">{{ $count }}</span>
        </div>
        @endforeach
    </div>
</div>

{{-- Danh sách bình luận --}}
@forelse ($getReviews as $review)
<div class="d-flex gap-3 mb-4 pb-4 border-bottom" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
    <img src="{{ asset('admin/assets/images/user-profile/' . $review->avatar) }}"
        alt="{{ $review->fullName }}"
        class="rounded-circle object-fit-cover flex-shrink-0"
        style="width: 48px; height: 48px;">
    <div class="flex-grow-1">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h6 class="fw-bold mb-0">{{ $review->fullName }}</h6>
                <div class="text-warning" style="font-size: 13px;">
                    @for ($i = 0; $i < 5; $i++)
                        <i class="{{ $review->rating && $i < $review->rating ? 'fas' : 'far' }} fa-star"></i>
                        @endfor
                </div>
            </div>
            <small class="text-muted">{{ \Carbon\Carbon::parse($review->createdAt)->format('d/m/Y') }}</small>
        </div>
        <p class="mb-0 mt-2 text-muted" style="line-height: 1.7;">{{ $review->comment }}</p>
    </div>
</div>
@empty
<div class="text-center text-muted py-4">
    <i class="fal fa-comment-slash fs-2 mb-2 d-block"></i>
    Chưa có đánh giá nào. Hãy là người đầu tiên!
</div>
@endforelse