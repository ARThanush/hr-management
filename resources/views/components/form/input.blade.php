@php
    $error = $errors->has($name) ? 'is-invalid' : '';
@endphp
<div class="position-relative">
    <input {!! $attributes->merge(['class' => "form-control ". $error]) !!}>
    @error($name)
    <div class="invalid-feedback" style="display: block;">
        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
    </div>
    @enderror
</div>
