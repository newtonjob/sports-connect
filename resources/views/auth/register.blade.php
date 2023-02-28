<x-auth>
    <!-- form -->
    <form action="{{ route('api.register') }}" class="x-submit" data-then="alert">
        <!-- title-->
        <p class="text-muted mb-2">Create your account, it takes less than a minute.</p>

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input class="form-control" type="text" id="name" name="name" required>
        </div>

        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="email" class="form-label">Email address</label>
                <input class="form-control" type="email" id="email" name="email" required>
            </div>

            <div class="col-sm-6 mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input class="form-control" type="tel" id="phone" name="phone">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="password" class="form-label">Password</label>
                <input class="form-control" type="password" required id="password" name="password">
            </div>
            <div class="col-sm-6 mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input class="form-control" type="password" required id="password_confirmation" name="password_confirmation">
            </div>
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkbox-signup" required>
                <label class="form-check-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-muted">Terms and Conditions</a></label>
            </div>
        </div>
        <div class="mb-0 d-grid text-center">
            <button class="btn btn-primary" type="submit"><i class="mdi mdi-account-circle"></i> Sign Up </button>
        </div>
    </form>

    <!-- Footer-->
    <footer class="footer footer-alt">
        <p class="text-muted">Already have account? <a href="{{ route('login') }}" class="text-muted ms-1"><b>Log In</b></a></p>
    </footer>
</x-auth>
