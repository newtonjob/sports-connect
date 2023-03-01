@if(! Auth::user()->hasVerifiedEmail())
    <div class="mt-3">
        <div class="alert alert-warning mb-0" role="alert">
            <form action="{{ route('api.verification.resend') }}" class="x-submit">
                <i class="dripicons-warning me-2"></i>
                Your profile isn't verified yet. Please click the link we sent to your email to verify.
                Can't find the link? <button class="btn btn-link btn-sm" type="submit">Resend verification link</button>
            </form>
        </div>
    </div>
@endif
