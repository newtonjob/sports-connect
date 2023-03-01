<x-auth>
    <div x-data="{ forgot: false, email: null }">
        <form action="{{ route('api.login') }}" method="POST" class="x-submit" data-then="reload" x-show="!forgot" x-transition:enter>
            <!-- title-->
            <h4 class="mt-0">Sign In</h4>
            <p class="text-muted mb-4">Enter your email address and password to access your account.</p>

            <div class="mb-3">
                <label for="email" class="form-label">Email or Phone</label>
                <input class="form-control" id="email" name="email" x-model="email" required>
            </div>
            <div class="mb-3">
                <a href="#" class="text-muted float-end" @click="forgot = true"><small>Forgot your password?</small></a>
                <label for="password" class="form-label">Password</label>
                <input class="form-control" type="password" name="password" required id="password">
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Keep me logged in</label>
                </div>
            </div>
            <div class="d-grid mb-0 text-center">
                <button class="btn btn-success rounded-3" type="submit">
                    <i class="mdi mdi-login"></i> Log In
                </button>
            </div>
        </form>

        <form action="{{ route('api.password.forgot') }}" style="display: none" class="x-submit" data-then="alert" x-show="forgot" x-transition:enter>
            <!-- title-->
            <h4 class="mb-4">Forgot your password?</h4>
            <p class="text-muted">No problem. Enter you email, and we'll send you a special link to reset your password.</p>

            <div class="mb-3">
                <a href="javascript:" class="text-muted float-end" @click="forgot = false"><small> <i class="mdi mdi-history"></i>Return to login</small></a>

                <label for="email-to-reset" class="form-label">Email address</label>
                <input class="form-control" type="email" id="email-to-reset" name="email" x-model="email" placeholder="Enter your email">
            </div>

            <div class="d-grid mb-0 text-center">
                <button class="btn btn-primary rounded-3" type="submit">
                    <i class="mdi mdi-email-receive"></i> Get Reset Link
                </button>
            </div>
        </form>
    </div>

    <!-- Footer-->
    <footer class="mt-4 footer-alt">
        <p class="text-muted">Don't have an account?
            <a href="{{ route('register') }}" class="text-muted ms-1"><b>Sign up for free</b></a>
        </p>
    </footer>
</x-auth>
