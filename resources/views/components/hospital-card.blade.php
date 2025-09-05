@props(['hospital'])

<div class="card shadow-sm h-100 rounded-4">
    <img src="{{ $hospital->images ?? 'https://via.placeholder.com/300x200.png?text=No+Image' }}" class="card-img-top hospital-card-img rounded-top" alt="{{ $hospital->name }} の画像">
    <div class="card-body d-flex flex-column">
        <h5 class="card-title fw-bold">{{ $hospital->name }}</h5>
        
        <ul class="list-unstyled text-muted mt-3 mb-4 flex-grow-1">
            <li class="mb-2">
                <i class="fas fa-map-marker-alt fa-fw me-2"></i>
                {{ $hospital->address }}
            </li>
            <li class="mb-2">
                <i class="fas fa-phone fa-fw me-2"></i>
                {{ $hospital->phone }}
            </li>
            <li class="mb-2">
                <i class="fas fa-clock fa-fw me-2"></i>
                {{ $hospital->consultation_hours }}
            </li>
        </ul>

        <!--  

        -->

    </div>
    <div class="card-footer bg-white border-top-0 rounded-bottom-4">
        {{-- 詳細ページへのルートが 'hospitals.show' の場合 --}}
        <a href="{{ route('detail', $hospital->id) }}" class="btn btn-orange w-100">
            <i class="fas fa-info-circle me-1"></i> 詳細を見る
        </a>
    </div>
</div>