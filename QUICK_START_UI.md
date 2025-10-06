# 🚀 Quick Start - New UI Components

## 📦 Installation Complete!

Your Laravel CIHR now has a beautiful, modern UI! Here's how to use it.

---

## 🎯 Quick Examples

### 1. Stat Cards (Dashboard)

```blade
<div class="row">
    <!-- Projects Card -->
    <x-stat-card
        title="Projects"
        value="156"
        icon="fa-solid fa-cubes"
        trend="12%"
        trendDirection="up" />
    
    <!-- Clients Card -->
    <x-stat-card
        title="Clients"
        value="89"
        icon="fa-solid fa-users"
        trend="8%"
        trendDirection="up" />
    
    <!-- Revenue Card -->
    <x-stat-card
        title="Revenue"
        value="$45,890"
        icon="fa-solid fa-dollar-sign"
        trend="5%"
        trendDirection="down" />
    
    <!-- Employees Card -->
    <x-stat-card
        title="Employees"
        value="234"
        icon="fa-solid fa-user-tie" />
</div>
```

### 2. Info Cards (Data Display)

```blade
<!-- Simple Card -->
<x-info-card title="Recent Activity" icon="bi bi-clock-history">
    <ul class="list-unstyled mb-0">
        <li class="mb-2">
            <strong>John Doe</strong> created a new project
            <small class="text-muted d-block">2 hours ago</small>
        </li>
        <li class="mb-2">
            <strong>Jane Smith</strong> completed a task
            <small class="text-muted d-block">5 hours ago</small>
        </li>
    </ul>
</x-info-card>

<!-- Card with Actions -->
<x-info-card title="Employees" icon="bi bi-people">
    <x-slot name="actions">
        <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Add Employee
        </a>
    </x-slot>
    
    <!-- Employee list here -->
    
    <x-slot name="footer">
        <a href="{{ route('employees.index') }}" class="text-primary">
            View All Employees <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </x-slot>
</x-info-card>
```

### 3. Enhanced Forms

```blade
<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    
    <!-- Text Input -->
    <x-form.input-block>
        <x-form.label>
            <i class="bi bi-person me-2"></i>Full Name
        </x-form.label>
        <x-form.input 
            type="text" 
            name="name" 
            placeholder="John Doe"
            value="{{ old('name') }}"
            required />
    </x-form.input-block>
    
    <!-- Email Input -->
    <x-form.input-block>
        <x-form.label>
            <i class="bi bi-envelope me-2"></i>Email Address
        </x-form.label>
        <x-form.input 
            type="email" 
            name="email" 
            placeholder="john@example.com"
            required />
    </x-form.input-block>
    
    <!-- Phone Input -->
    <x-form.input-block>
        <x-form.label>
            <i class="bi bi-telephone me-2"></i>Phone
        </x-form.label>
        <x-form.input 
            type="tel" 
            name="phone"
            placeholder="+1 234 567 8900" />
    </x-form.input-block>
    
    <!-- Select Dropdown -->
    <x-form.input-block>
        <x-form.label>
            <i class="bi bi-building me-2"></i>Department
        </x-form.label>
        <select name="department_id" class="form-select" required>
            <option value="">Select Department</option>
            <option value="1">IT</option>
            <option value="2">HR</option>
            <option value="3">Finance</option>
        </select>
    </x-form.input-block>
    
    <!-- Buttons -->
    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">
            <i class="bi bi-x-circle me-1"></i>Cancel
        </a>
        <x-form.button>
            <i class="bi bi-check-circle me-1"></i>Save Employee
        </x-form.button>
    </div>
</form>
```

### 4. Buttons

```blade
<!-- Primary Button (Gradient) -->
<button class="btn btn-primary">
    <i class="bi bi-plus-circle me-2"></i>Add New
</button>

<!-- Secondary Button -->
<button class="btn btn-secondary">
    <i class="bi bi-pencil me-2"></i>Edit
</button>

<!-- Success Button -->
<button class="btn btn-success">
    <i class="bi bi-check-circle me-2"></i>Approve
</button>

<!-- Danger Button -->
<button class="btn btn-danger">
    <i class="bi bi-trash me-2"></i>Delete
</button>

<!-- Button Sizes -->
<button class="btn btn-primary btn-sm">Small</button>
<button class="btn btn-primary">Default</button>
<button class="btn btn-primary btn-lg">Large</button>
```

### 5. Badges

```blade
<!-- Status Badges -->
<span class="badge badge-success">Active</span>
<span class="badge badge-danger">Inactive</span>
<span class="badge badge-warning">Pending</span>
<span class="badge badge-info">In Progress</span>
<span class="badge badge-primary">New</span>
```

### 6. Alerts

```blade
<!-- Success Alert -->
<div class="alert alert-success">
    <i class="bi bi-check-circle me-2"></i>
    Data saved successfully!
</div>

<!-- Error Alert -->
<div class="alert alert-danger">
    <i class="bi bi-exclamation-triangle me-2"></i>
    An error occurred. Please try again.
</div>

<!-- Warning Alert -->
<div class="alert alert-warning">
    <i class="bi bi-exclamation-circle me-2"></i>
    Please review your information before submitting.
</div>

<!-- Info Alert -->
<div class="alert alert-info">
    <i class="bi bi-info-circle me-2"></i>
    Your session will expire in 5 minutes.
</div>
```

---

## 🎨 Utility Classes

### Shadows
```blade
<div class="card shadow-sm">Subtle shadow</div>
<div class="card shadow">Default shadow</div>
<div class="card shadow-md">Medium shadow</div>
<div class="card shadow-lg">Large shadow</div>
<div class="card shadow-xl">Extra large shadow</div>
```

### Rounded Corners
```blade
<div class="card rounded">Default</div>
<div class="card rounded-lg">Large</div>
<div class="card rounded-xl">Extra large</div>
<div class="badge rounded-full">Fully rounded</div>
```

### Transitions
```blade
<button class="btn transition">Smooth transition</button>
<div class="card transition">Hover me</div>
```

### Animations
```blade
<div class="card fade-in">Fade in animation</div>
<div class="card slide-in-right">Slide in animation</div>
```

---

## 📋 Common Patterns

### Dashboard Grid
```blade
<div class="row">
    <!-- Stats Row -->
    <x-stat-card title="Projects" value="156" icon="fa-solid fa-cubes" />
    <x-stat-card title="Clients" value="89" icon="fa-solid fa-users" />
    <x-stat-card title="Revenue" value="$45,890" icon="fa-solid fa-dollar-sign" />
    <x-stat-card title="Employees" value="234" icon="fa-solid fa-user-tie" />
</div>

<div class="row mt-4">
    <!-- Charts & Data -->
    <div class="col-md-8">
        <x-info-card title="Revenue Chart" icon="bi bi-graph-up">
            <!-- Chart here -->
        </x-info-card>
    </div>
    
    <div class="col-md-4">
        <x-info-card title="Recent Activity" icon="bi bi-clock-history">
            <!-- Activity list here -->
        </x-info-card>
    </div>
</div>
```

### Data Table
```blade
<x-info-card title="Employees" icon="bi bi-people">
    <x-slot name="actions">
        <button class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Add Employee
        </button>
    </x-slot>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="avatar.jpg" class="rounded-full me-2" width="32" height="32">
                            <strong>John Doe</strong>
                        </div>
                    </td>
                    <td>john@example.com</td>
                    <td>IT Department</td>
                    <td><span class="badge badge-success">Active</span></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" 
                                    data-bs-toggle="dropdown">
                                Actions
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-eye me-2"></i>View
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-pencil me-2"></i>Edit
                                </a>
                                <a class="dropdown-item text-danger" href="#">
                                    <i class="bi bi-trash me-2"></i>Delete
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-info-card>
```

### Modal
```blade
<div class="modal fade" id="employeeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-person-plus me-2"></i>Add Employee
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <x-form.input-block>
                        <x-form.label>Full Name</x-form.label>
                        <x-form.input type="text" name="name" />
                    </x-form.input-block>
                    
                    <x-form.input-block>
                        <x-form.label>Email</x-form.label>
                        <x-form.input type="email" name="email" />
                    </x-form.input-block>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i>Cancel
                </button>
                <button type="button" class="btn btn-primary">
                    <i class="bi bi-check-circle me-1"></i>Save
                </button>
            </div>
        </div>
    </div>
</div>
```

---

## 🎯 Icon Libraries

### Bootstrap Icons (Recommended)
```blade
<i class="bi bi-house"></i>
<i class="bi bi-person"></i>
<i class="bi bi-envelope"></i>
<i class="bi bi-calendar"></i>
<i class="bi bi-gear"></i>
```

Browse: https://icons.getbootstrap.com/

### Font Awesome
```blade
<i class="fa-solid fa-home"></i>
<i class="fa-solid fa-user"></i>
<i class="fa-solid fa-envelope"></i>
<i class="fa-solid fa-calendar"></i>
<i class="fa-solid fa-cog"></i>
```

Browse: https://fontawesome.com/icons

---

## 🎨 Color Variables

Use in your custom CSS:
```css
/* Primary Colors */
var(--primary-color)
var(--primary-dark)
var(--primary-light)
var(--primary-gradient)

/* Neutral Colors */
var(--gray-50)
var(--gray-100)
var(--gray-200)
...
var(--gray-900)

/* Status Colors */
var(--success-color)
var(--danger-color)
var(--warning-color)
var(--info-color)

/* Shadows */
var(--shadow)
var(--shadow-md)
var(--shadow-lg)

/* Border Radius */
var(--radius)
var(--radius-lg)
var(--radius-full)
```

---

## ✅ Checklist for New Pages

When creating a new page:

- [ ] Use `<x-breadcrumb>` for page header
- [ ] Wrap content in proper containers
- [ ] Use `<x-info-card>` for data sections
- [ ] Use `<x-form.input-block>` for all form fields
- [ ] Add icons to buttons and inputs
- [ ] Use proper badges for status
- [ ] Add transitions to interactive elements
- [ ] Test on mobile devices
- [ ] Verify accessibility

---

## 🎉 That's It!

You're ready to create beautiful, modern pages with Laravel CIHR's new UI system!

### Need Help?
- 📚 Full Guide: `UI_DESIGN_GUIDE.md`
- 📝 Summary: `UI_ENHANCEMENTS_SUMMARY.md`
- 🐛 JavaScript Fixes: `JAVASCRIPT_FIXES.md`

### Quick Commands:
```bash
# Build assets
npm run build

# Watch for changes (development)
npm run dev

# Clear cache
php artisan cache:clear
php artisan view:clear
```

---

**Happy Coding! 🚀**

