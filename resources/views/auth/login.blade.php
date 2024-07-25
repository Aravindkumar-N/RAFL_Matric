@extends('layouts.auth')
@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0 py-0 position-fixed">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('public/assets/images/logo_rafl.PNG') }}" alt="logo"
                                    class="img-fluid mx-auto d-block">
                            </div>
                            <h4>Sign in to continue.</h4>
                            <div id="auth_err"></div>
                            <form class="pt-3 needs-validation" id="login_form" action="{{ route('login') }}" method="POST"
                                novalidate>
                                @csrf
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror form-control-lg"
                                        name="email" value="{{ old('email') }}" autocomplete="email" autofocus
                                        placeholder="Email" required>
                                    <div class="email_err text-danger email"></div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <div class="form-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="current-password" placeholder="Password" required>
                                    <div class="pass_err text-danger email"></div>
                                    <i class="bi bi-eye-slash-fill show_password"></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <input type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        value="SIGN IN">
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="btn btn-link">Forgot password?</a>

                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('click', '.show_password', function() {
            var type = $('#password').attr('type');
            if (type == 'password') {
                $('#password').attr('type', 'text');
                $('.show_password').addClass('bi-eye-fill');
                $('.show_password').removeClass('bi-eye-slash-fill');
            } else {
                $('#password').attr('type', 'password');
                $('.show_password').addClass('bi-eye-slash-fill');
                $('.show_password').removeClass('bi-eye-fill');
            }
        });

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection
