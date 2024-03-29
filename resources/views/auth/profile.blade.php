@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('My profile') }}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Left side fields -->
                                    <div class="input-group mb-3">
                                        <input type="text" name="first_name"
                                            class="form-control @error('first_name') is-invalid @enderror"
                                            placeholder="{{ __('First Name') }}"
                                            value="{{ old('first_name', auth()->user()->first_name) }}" required>
                                        @error('first_name')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" name="middle_name"
                                            class="form-control @error('middle_name') is-invalid @enderror"
                                            placeholder="{{ __('Middle Name') }}"
                                            value="{{ old('middle_name', auth()->user()->middle_name) }}" required>
                                        @error('middle_name')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" name="last_name"
                                            class="form-control @error('last_name') is-invalid @enderror"
                                            placeholder="{{ __('Last Name') }}"
                                            value="{{ old('last_name', auth()->user()->last_name) }}" required>
                                        @error('last_name')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="{{ __('Email') }}"
                                            value="{{ old('email', auth()->user()->email) }}" required>
                                        @error('email')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="id_number" name="id_number"
                                            class="form-control @error('id_number') is-invalid @enderror"
                                            placeholder="{{ __('id_number') }}"
                                            value="{{ old('id_number', auth()->user()->id_number) }}" required>
                                        @error('id_number')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Right side fields -->
                                    <div class="input-group mb-3">
                                        <input type="text" name="contact_number"
                                            class="form-control @error('contact_number') is-invalid @enderror"
                                            placeholder="{{ __('Contact Number') }}"
                                            value="{{ old('contact_number', auth()->user()->contact_number) }}"
                                            required>
                                        @error('contact_number')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <select name="college"
                                            class="form-control @error('college') is-invalid @enderror" required>
                                            <option value="">Select College</option>
                                            <option value="College of Agriculture"
                                                {{ old('college', auth()->user()->college) === 'College of Agriculture' ? 'selected' : '' }}>
                                                College of Agriculture</option>
                                            <option value="College of Arts and Sciences"
                                                {{ old('college', auth()->user()->college) === 'College of Arts and Sciences' ? 'selected' : '' }}>
                                                College of Arts and Sciences</option>
                                            <option value="College of Business Management"
                                                {{ old('college', auth()->user()->college) === 'College of Business Management' ? 'selected' : '' }}>
                                                College of Business Management</option>
                                            <option value="College of Education"
                                                {{ old('college', auth()->user()->college) === 'College of Education' ? 'selected' : '' }}>
                                                College of Education</option>
                                            <option value="College of Engineering"
                                                {{ old('college', auth()->user()->college) === 'College of Engineering' ? 'selected' : '' }}>
                                                College of Engineering</option>
                                            <option value="College of Forestry and Environmental Science"
                                                {{ old('college', auth()->user()->college) === 'College of Forestry and Environmental Science' ? 'selected' : '' }}>
                                                College of Forestry and Environmental Science</option>
                                            <option value="College of Human Ecology"
                                                {{ old('college', auth()->user()->college) === 'College of Human Ecology' ? 'selected' : '' }}>
                                                College of Human Ecology</option>
                                            <option value="College of Information Science and Computing"
                                                {{ old('college', auth()->user()->college) === 'College of Information Science and Computing' ? 'selected' : '' }}>
                                                College of Information Science and Computing</option>
                                            <option value="College of Nursing"
                                                {{ old('college', auth()->user()->college) === 'College of Nursing' ? 'selected' : '' }}>
                                                College of Nursing</option>
                                            <option value="College of Veterinary Medicine"
                                                {{ old('college', auth()->user()->college) === 'College of Veterinary Medicine' ? 'selected' : '' }}>
                                                College of Veterinary Medicine</option>
                                        </select>
                                        @error('college')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <select name="gender" class="form-control @error('gender') is-invalid @enderror"
                                            required>
                                            <option value="">Select Gender</option>
                                            <option value="Male"
                                                {{ old('gender', auth()->user()->gender) === 'Male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="Female"
                                                {{ old('gender', auth()->user()->gender) === 'Female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                        @error('gender')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="{{ __('New password') }}">
                                        @error('password')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" name="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            placeholder="{{ __('New password confirmation') }}"
                                            autocomplete="new-password">
                                    </div>

                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('scripts')
@if ($message = Session::get('success'))
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
toastr.options = {
    "closeButton": true,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

toastr.success('{{ $message }}')
</script>
@endif
@endsection