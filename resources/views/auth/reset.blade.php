@extends('layouts.verification')

@section('content')
    <div class="text-center w-75 m-auto">
        <h4 class="text-dark-50 text-center mb-3 fw-bold">Welcome back! Let's create your new password.</h4>
    </div>

    <form action="{{ route('api.password.reset') }}" class="x-submit" data-then="resetPasswordCallback">
        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input class="form-control" type="email" name="email" readonly id="email" value="{{ request('email') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Create a new password</label>
            <input class="form-control" type="password" name="password" required id="password">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm your new password</label>
            <input class="form-control" type="password" name="password_confirmation" required id="password_confirmation">
        </div>

        <input type="hidden" name="token" value="{{ request('token') }}">

        <div class="my-3 text-center">
            <button type="submit" id="btn-reset" class="btn btn-primary">
                Reset Password <i class="uil-arrow-circle-right"></i>
            </button>
        </div>
    </form>
@endsection

@push('script')
    <script>
        function resetPasswordCallback(response) {
            swal({
                title: response.title,
                text: response.message,
                icon: "success",
                closeOnClickOutside: false,
                closeOnEsc: false
            }).then((confirm) => {
                if (confirm) location.href = '{{ route('dashboard') }}';
            });
        }
    </script>
@endpush
