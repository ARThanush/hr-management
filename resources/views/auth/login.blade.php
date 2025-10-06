@extends('layouts.auth')

@push('page-styles')
<style>
/* ============================================
   MODERN LOGIN PAGE - BEAUTIFUL DESIGN
   ============================================ */

/* Animated Background Gradient */
.account-page {
    background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #4facfe);
    background-size: 400% 400%;
    animation: gradientShift 15s ease infinite;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Floating Particles Background */
.account-page::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background-image:
        radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 40% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    animation: float 20s ease-in-out infinite;
    pointer-events: none;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

/* Glass Morphism Card */
.account-box {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    box-shadow:
        0 8px 32px rgba(0, 0, 0, 0.1),
        0 0 0 1px rgba(255, 255, 255, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.6);
    padding: 3rem;
    max-width: 480px;
    width: 100%;
    animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    overflow: hidden;
}

.account-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #4facfe);
    background-size: 200% 100%;
    animation: shimmer 3s linear infinite;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes shimmer {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}

/* Logo Animation */
.account-logo {
    text-align: center;
    margin-bottom: 2rem;
    animation: fadeIn 0.8s ease-out 0.2s both;
}

.account-logo img {
    max-width: 180px;
    height: auto;
    filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.1));
    transition: transform 0.3s ease;
}

.account-logo img:hover {
    transform: scale(1.05);
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Welcome Section */
.account-title {
    font-size: 2rem;
    font-weight: 800;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 0.5rem;
    animation: fadeIn 0.8s ease-out 0.3s both;
}

.account-subtitle {
    color: #6b7280;
    font-size: 1rem;
    margin-bottom: 2.5rem;
    font-weight: 500;
    animation: fadeIn 0.8s ease-out 0.4s both;
}

/* Modern Form Styling */
.form-label {
    font-weight: 600;
    color: #374151;
    font-size: 0.875rem;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    animation: fadeIn 0.8s ease-out 0.5s both;
}

.form-label i {
    color: #667eea;
    margin-right: 0.5rem;
}

.form-control {
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    padding: 0.875rem 1.125rem;
    font-size: 0.9375rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    background: rgba(255, 255, 255, 0.9);
    animation: fadeIn 0.8s ease-out 0.6s both;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1), 0 4px 12px rgba(102, 126, 234, 0.15);
    background: #ffffff;
    transform: translateY(-1px);
}

.form-control::placeholder {
    color: #9ca3af;
}

/* Password Toggle */
#toggle-password {
    cursor: pointer;
    transition: all 0.2s ease;
    color: #9ca3af;
    font-size: 1.125rem;
}

#toggle-password:hover {
    color: #667eea;
    transform: scale(1.1);
}

/* Checkbox Styling */
.form-check {
    padding-left: 0;
    animation: fadeIn 0.8s ease-out 0.7s both;
}

.form-check-input {
    width: 1.25rem;
    height: 1.25rem;
    margin-right: 0.75rem;
    border: 2px solid #d1d5db;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.form-check-input:checked {
    background-color: #667eea;
    border-color: #667eea;
}

.form-check-input:focus {
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.form-check-label {
    font-size: 0.9375rem;
    color: #4b5563;
    font-weight: 500;
    cursor: pointer;
}

/* Forgot Password Link */
.forgot-password-link {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
}

.forgot-password-link:hover {
    color: #5568d3;
    transform: translateX(2px);
}

/* Modern Button */
.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 12px;
    padding: 0.875rem 2rem;
    font-weight: 600;
    font-size: 1rem;
    box-shadow: 0 8px 24px rgba(102, 126, 234, 0.35);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    animation: fadeIn 0.8s ease-out 0.8s both;
}

.btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(102, 126, 234, 0.45);
}

.btn-primary:hover::before {
    left: 100%;
}

.btn-primary:active {
    transform: translateY(0);
}

/* Footer Links */
.account-footer {
    animation: fadeIn 0.8s ease-out 0.9s both;
}

.account-footer p {
    color: #6b7280;
    font-size: 0.9375rem;
}

.account-footer a {
    color: #667eea;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
}

.account-footer a:hover {
    color: #5568d3;
    transform: translateX(3px);
}

/* Responsive Design */
@media (max-width: 576px) {
    .account-box {
        padding: 2rem 1.5rem;
        margin: 1rem;
    }

    .account-title {
        font-size: 1.75rem;
    }

    .account-logo img {
        max-width: 150px;
    }
}

/* Input Block Animation */
.input-block {
    animation: fadeIn 0.8s ease-out calc(0.5s + var(--delay, 0s)) both;
}
</style>
@endpush

@section('form')
    <div class="text-center mb-4">
        <h3 class="account-title">{{ __('Welcome Back') }} 👋</h3>
        <p class="account-subtitle">{{ __('Sign in to access your dashboard') }}</p>
    </div>

    <!-- Account Form -->
    <form action="{{ route('login') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <x-form.input-block>
            <x-form.label><i class="bi bi-envelope me-2"></i>{{ __('Email Address') }}</x-form.label>
            <x-form.input type="email" name="email" tabindex="1" value="{{ old('email') }}"
                placeholder="your.email@example.com" required />
        </x-form.input-block>

        <x-form.input-block>
            <div class="d-flex justify-content-between align-items-center mb-2">
                <x-form.label class="mb-0"><i class="bi bi-lock me-2"></i>{{ __('Password') }}</x-form.label>
                <a class="forgot-password-link" href="{{ route('password.email') }}">
                    <i class="bi bi-question-circle me-1"></i>{{ __('Forgot password?') }}
                </a>
            </div>
            <div class="position-relative">
                <x-form.input type="password" id="password" name="password" tabindex="2"
                    placeholder="Enter your password" required />
                <span class="fa-solid fa-eye-slash position-absolute" id="toggle-password"
                      style="right: 0.875rem; top: 50%; transform: translateY(-50%); cursor: pointer; z-index: 10;"></span>
            </div>
        </x-form.input-block>

        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" id="remember" name="remember">
            <label class="form-check-label" for="remember" style="font-size: 0.9375rem; color: #4b5563;">
                {{ __('Remember me') }}
            </label>
        </div>

        <x-form.input-block class="mb-3">
            <x-form.button class="w-100">
                <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('Sign In') }}
            </x-form.button>
        </x-form.input-block>

        @if (Route::has('register'))
            <div class="account-footer text-center">
                <p class="mb-0" style="color: #6b7280;">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" class="text-decoration-none">
                        {{ __('Create Account') }} <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </p>
            </div>
        @endif
    </form>
    <!-- /Account Form -->

    <script>
        // Password toggle
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('toggle-password');
            const password = document.getElementById('password');

            if (togglePassword && password) {
                togglePassword.addEventListener('click', function() {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);

                    // Toggle icon
                    this.classList.toggle('fa-eye-slash');
                    this.classList.toggle('fa-eye');
                });
            }
        });
    </script>
@endsection
