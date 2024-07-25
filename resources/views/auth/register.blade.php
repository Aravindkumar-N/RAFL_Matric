@extends('layouts.auth')
@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('assets/images/logo_rafl.PNG') }}" alt="logo" class="img-responsive mx-auto d-block">
                            </div>
                            <h4 class="text-center">Register</h4>
                            <form method="POST" action="{{ route('register') }}" class="pt-3 needs-validation" novalidate>
                                @csrf
                                <div class="form-group">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" required name="name"
                                            value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="Username">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" required name="email"
                                            value="{{ old('email') }}"  autocomplete="email" placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required value="{{ old('password') }}" autocomplete="new-password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" value="{{old('password_confirmation')}}" required autocomplete="new-password"  placeholder="Confirm Password">
                                </div>
                                <div class="mb-4">
                                  <!--  <div class="form-check">-->
                                  <!--    <label class="form-check-label text-muted">-->
                                  <!--      <input type="checkbox" class="form-check-input" required>-->
                                  <!--      I agree to all Terms & Conditions-->
                                  <!--    </label>-->
                                  <!--  </div>-->
                                  <!--</div>-->
                                <div class="mt-3">
                                        <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Sign Up">
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="{{url('login')}}" class="text-primary">Login</a>
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
    <!-- container-scroller -->
@endsection

@section('scripts')
<script>
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
