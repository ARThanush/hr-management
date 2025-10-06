@props([
    'title' => '',
    'icon' => null,
    'headerClass' => '',
    'bodyClass' => ''
])

<div {{ $attributes->merge(['class' => 'card fade-in']) }}>
    @if($title || $icon)
        <div class="card-header {{ $headerClass }}">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-0 d-flex align-items-center">
                    @if($icon)
                        <i class="{{ $icon }} me-2"></i>
                    @endif
                    {{ $title }}
                </h5>
                @isset($actions)
                    <div class="card-actions">
                        {{ $actions }}
                    </div>
                @endisset
            </div>
        </div>
    @endif
    <div class="card-body {{ $bodyClass }}">
        {{ $slot }}
    </div>
    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset
</div>

