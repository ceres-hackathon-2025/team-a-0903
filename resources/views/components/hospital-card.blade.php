@props(['hospital'])

<div class="card shadow-sm h-100 rounded-4">
    <img src="{{ $hospital->image_url ?? 'https://via.placeholder.com/300x200.png?text=No+Image' }}" class="card-img-top hospital-card-img rounded-top" alt="{{ $hospital->name }} の画像">
    <div class="card-body d-flex flex-column">
        <h5 class="card-title fw-bold">{{ $hospital->name }}</h5>
        
        <ul class="list-unstyled text-muted mt-3 mb-4 flex-grow-1">
            <li class="mb-2">
                <a href="{{ $hospital->googleMap_url }}">
                <i class="fas fa-map-marker-alt fa-fw me-2"></i>
                {{ $hospital->address }}
                </a>
            </li>
            <li class="mb-2">
                <i class="fas fa-phone fa-fw me-2"></i>
                {{ $hospital->tel }}
            </li>
            @foreach ($hospital->businessHours as $hours)
            <li class="mb-2">
                <i class="fas fa-clock fa-fw me-2"></i>
            </li>
            @endforeach
        </ul>

        <div>
            @foreach($hospital->species as $animal)
                <span class="badge bg-orange me-1">{{ $animal->name }}</span>
            @endforeach
        </div>

    </div>
    <div class="card-footer bg-white border-top-0 rounded-bottom-4">
        {{-- 詳細ページへのルートが 'hospitals.show' の場合 --}}
        <a href="{{ route('detail', $hospital->id) }}" class="btn btn-orange w-100">
            <i class="fas fa-info-circle me-1"></i> 詳細を見る
        </a>
    </div>
</div>