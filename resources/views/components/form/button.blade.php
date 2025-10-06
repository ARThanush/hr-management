<button {{ $attributes->merge(['class' => 'btn btn-primary account-btn', 'type' => 'submit']) }}>
    <span style="position: relative; z-index: 1;">{{ $slot }}</span>
</button>
