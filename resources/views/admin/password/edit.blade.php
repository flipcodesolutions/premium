@extends('admin.layouts.app')

@section('title', 'Change Password - Admin Panel')
@section('page_title', 'Change Password')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7 col-md-9">

        <div class="card-custom">
            <div class="card-custom-header">
                <div>
                    <h5 class="mb-1"><i class="bi bi-shield-lock me-2 text-primary"></i>Change Password</h5>
                    <small class="text-muted">Ensure your account is using a long, random password to stay secure.</small>
                </div>
            </div>

            <div class="p-4">
                <!-- User Info Badge -->
                <div class="d-flex align-items-center gap-3 p-3 mb-4 rounded" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                    <div class="admin-avatar" style="width: 44px; height: 44px; font-size: 1.1rem;">
                        {{ strtoupper(substr($user->name ?: ($user->email ?? 'A'), 0, 1)) }}
                    </div>
                    <div>
                        <div class="fw-semibold text-dark">{{ $user->name ?: 'Administrator' }}</div>
                        <small class="text-muted">{{ $user->email }} &bull; <span class="badge bg-primary-subtle text-primary">Admin</span></small>
                    </div>
                </div>

                <form action="{{ route('admin.password.update') }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')

                    <!-- Current Password -->
                    <div class="mb-3">
                        <label for="current_password" class="form-label fw-semibold">
                            Current Password <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <input type="password"
                                   class="form-control @error('current_password') is-invalid @enderror"
                                   id="current_password"
                                   name="current_password"
                                   placeholder="Enter your current password"
                                   required>
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('current_password', this)">
                                <i class="bi bi-eye"></i>
                            </button>
                            @error('current_password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- New Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">
                            New Password <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <input type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   id="password"
                                   name="password"
                                   placeholder="Minimum 8 characters"
                                   required>
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password', this)">
                                <i class="bi bi-eye"></i>
                            </button>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text text-muted small mt-1">
                            <i class="bi bi-info-circle me-1"></i> Must be at least 8 characters long and different from current password.
                        </div>
                    </div>

                    <!-- Confirm New Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold">
                            Confirm New Password <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <input type="password"
                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                   id="password_confirmation"
                                   name="password_confirmation"
                                   placeholder="Re-enter your new password"
                                   required>
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password_confirmation', this)">
                                <i class="bi bi-eye"></i>
                            </button>
                            @error('password_confirmation')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between pt-3 border-top">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-4 fw-semibold">
                            <i class="bi bi-check2-circle me-1"></i> Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script>
function togglePasswordVisibility(fieldId, button) {
    const input = document.getElementById(fieldId);
    const icon = button.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}
</script>
@endsection
