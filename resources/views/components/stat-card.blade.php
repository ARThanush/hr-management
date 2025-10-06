@props([
    'title' => '',
    'value' => '0',
    'icon' => 'fa-solid fa-chart-line',
    'color' => 'primary',
    'trend' => null,
    'trendDirection' => 'up'
])

<div class="col-md-6 col-lg-3 mb-4">
    <div class="card dash-widget h-100 fade-in">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="dash-widget-icon">
                    <i class="{{ $icon }}"></i>
                </div>
                @if($trend)
                    <span class="badge badge-{{ $trendDirection === 'up' ? 'success' : 'danger' }}">
                        <i class="bi bi-{{ $trendDirection === 'up' ? 'arrow-up' : 'arrow-down' }}"></i>
                        {{ $trend }}
                    </span>
                @endif
            </div>
            <div class="dash-widget-info">
                <h3 class="mb-2">{{ $value }}</h3>
                <span class="text-muted">{{ $title }}</span>
            </div>
        </div>
    </div>
</div>

