@extends('layouts.landing')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 hero-content" data-aos="fade-right">
                <h1>Complete HR Management System</h1>
                <p>Streamline your workforce management with CI HR - A powerful, cloud-based solution with real-time features, project management, and comprehensive employee tracking. Transform the way you manage your team.</p>
                <div class="d-flex gap-3 flex-wrap">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-gradient btn-lg">
                            <i class="fas fa-tachometer-alt me-2"></i>Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-gradient btn-lg">
                            <i class="fas fa-sign-in-alt me-2"></i>Get Started
                        </a>
                    @endauth
                    <a href="#features" class="btn btn-outline-gradient btn-lg">
                        <i class="fas fa-info-circle me-2"></i>Learn More
                    </a>
                </div>
                <div class="mt-4">
                    <small class="text-white-50">
                        <i class="fas fa-check-circle me-2"></i>Cloud-Based Solution
                        <i class="fas fa-check-circle ms-3 me-2"></i>Secure & Scalable
                        <i class="fas fa-check-circle ms-3 me-2"></i>24/7 Support
                    </small>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0 hero-image" data-aos="fade-left">
                <img src="{{ asset('screenshots/employee-dashboard.png') }}" alt="Dashboard Preview" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="0">
                <div class="stat-item">
                    <span class="stat-number">13+</span>
                    <span class="stat-label">Core Modules</span>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Features</span>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Cloud-Based</span>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="features-section">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Powerful Features</h2>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Everything you need to manage your workforce efficiently</p>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Employee Management</h3>
                    <p>Comprehensive employee profiles with personal info, emergency contacts, education, work experience, and family information.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Attendance Tracking</h3>
                    <p>Real-time attendance monitoring with clock in/out features, monthly reports, and detailed attendance analytics.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <h3>Project Management</h3>
                    <p>Complete project management with taskboards, team assignments, project leads, and drag-and-drop task organization.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h3>Payroll System</h3>
                    <p>Generate payslips, manage allowances and deductions, and handle employee salary settings with ease.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Real-time Chat</h3>
                    <p>Built-in one-to-one chat application for users with real-time messaging powered by Laravel Reverb.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <h3>Ticket System</h3>
                    <p>Manage support tickets with assignments, conversations, and email notifications for better customer service.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Accounting</h3>
                    <p>Budget management with categories, expenses, revenues, and project-based budget tracking.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <h3>Sales & Invoicing</h3>
                    <p>Create estimates and invoices, manage taxes, download PDFs, and track sales with professional templates.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Roles & Permissions</h3>
                    <p>Fine-grained access control with customizable roles and permissions for different user types.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Screenshots Section -->
<section id="screenshots" class="screenshots-section">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">See It In Action</h2>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Beautiful, modern interface with dark mode support</p>

        <div class="row g-4">
            <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="0">
                <div class="screenshot-card">
                    <img src="{{ asset('screenshots/login.png') }}" alt="Login Screen" class="img-fluid">
                </div>
                <p class="text-center mt-3 fw-semibold">Modern Login Screen</p>
            </div>
            <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="screenshot-card">
                    <img src="{{ asset('screenshots/projects-grid.png') }}" alt="Projects View" class="img-fluid">
                </div>
                <p class="text-center mt-3 fw-semibold">Projects View</p>
            </div>
            <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="0">
                <div class="screenshot-card">
                    <img src="{{ asset('screenshots/taskboard.png') }}" alt="Taskboard" class="img-fluid">
                </div>
                <p class="text-center mt-3 fw-semibold">Interactive Taskboard</p>
            </div>
            <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="screenshot-card">
                    <img src="{{ asset('screenshots/chat-app.png') }}" alt="Chat App" class="img-fluid">
                </div>
                <p class="text-center mt-3 fw-semibold">Real-time Chat</p>
            </div>
            <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="0">
                <div class="screenshot-card">
                    <img src="{{ asset('screenshots/attendance-table.png') }}" alt="Attendance" class="img-fluid">
                </div>
                <p class="text-center mt-3 fw-semibold">Attendance Management</p>
            </div>
            <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="screenshot-card">
                    <img src="{{ asset('screenshots/payslip.png') }}" alt="Payslip" class="img-fluid">
                </div>
                <p class="text-center mt-3 fw-semibold">Professional Payslips</p>
            </div>
        </div>
    </div>
</section>

<!-- Modules Section -->
<section id="modules" class="features-section">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Complete Modules</h2>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Modular architecture for easy customization</p>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3>Employees</h3>
                    <p>Complete employee lifecycle management with detailed profiles.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="50">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <h3>Clients</h3>
                    <p>Client management with card and tabular views.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3>Departments</h3>
                    <p>Organize your company structure efficiently.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="150">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3>Designations</h3>
                    <p>Manage job titles and positions.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3>Holidays</h3>
                    <p>Holiday calendar with management features.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="50">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h3>Assets</h3>
                    <p>Track company assets and assignments.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <h3>Backups</h3>
                    <p>Automated backup management system.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="150">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <h3>Settings</h3>
                    <p>Comprehensive system configuration.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-whiteboard"></i>
                    </div>
                    <h3>Whiteboard</h3>
                    <p>Collaborative drawing with Excalidraw & TLDraw.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="50">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3>Localization</h3>
                    <p>Multi-language support (EN, ES, FR, DE).</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-moon"></i>
                    </div>
                    <h3>Dark Mode</h3>
                    <p>Beautiful dark theme with smooth transitions.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="150">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bug"></i>
                    </div>
                    <h3>Debug Tools</h3>
                    <p>Built-in debugging and log viewer.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section" id="contact">
    <div class="container" data-aos="fade-up">
        <h2>Ready to Transform Your HR Management?</h2>
        <p>Get started with CI HR today and experience the power of modern HR management</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-gradient btn-lg">
                    <i class="fas fa-tachometer-alt me-2"></i>Go to Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-gradient btn-lg">
                    <i class="fas fa-sign-in-alt me-2"></i>Get Started Now
                </a>
            @endauth
            <a href="https://cubesinnovation.com" class="btn btn-outline-light btn-lg">
                <i class="fas fa-envelope me-2"></i>Contact Us
            </a>
        </div>
        <div class="mt-4">
            <small class="opacity-75">
                <i class="fas fa-shield-alt me-2"></i>Secure & Reliable
                <i class="fas fa-headset ms-3 me-2"></i>24/7 Support
                <i class="fas fa-lock ms-3 me-2"></i>Data Protection
            </small>
        </div>
    </div>
</section>
@endsection

