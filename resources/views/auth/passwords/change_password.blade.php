@extends('layouts.auth')
@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('assets/images/logo_rafl.PNG') }}" alt="logo"
                                    class="img-fluid mx-auto d-block">
                            </div>
                            <h4 class="text-center">Set the New Password.</h4>
                            <div class="cred_err cred_success"></div>
                            <form class="pt-3" id="changepassword_form">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-lg" name="email"
                                        value="{{ old('email') }}" placeholder="Email">
                                    <div class="text-danger email"></div>

                                </div>
                                <div class="form-group">
                                    <input id="old_password" type="password" class="form-control" name="old_password"
                                        placeholder="Old Password">
                                    <div class="pass_err text-danger old_password"></div>
                                    {{-- <i class="bi bi-eye-slash-fill show_password"></i> --}}
                                </div>
                                <div class="form-group">
                                    <input id="new_password" type="password" class="form-control" name="new_password"
                                        placeholder="New Password">
                                    <div class="text-danger new_password"></div>
                                    {{-- <i class="bi bi-eye-slash-fill show_password"></i> --}}
                                </div>
                                <div class="form-group">
                                    <input id="confirm_password" type="password" class="form-control"
                                        name="confirm_password" placeholder="Confirm Password">
                                    <div class="text-danger confirm_password"></div>
                                    {{-- <i class="bi bi-eye-slash-fill show_password"></i> --}}
                                </div>
                                <div class="mt-3">
                                    <input type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        value="Set Password">
                                </div>
                                <div class="my-3 d-flex align-items-center justify-content-between">
                                    <label for="form-label">Go to <a href="{{url('/dashboard')}}" class="text-primary">Home</a></label>
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
        // $(document).on('click', '.show_password', function() {
        //     var type = $('#password').attr('type');
        //     if (type == 'password') {
        //         $('#password').attr('type', 'text');
        //         $('.show_password').addClass('bi-eye-fill');
        //         $('.show_password').removeClass('bi-eye-slash-fill');
        //     } else {
        //         $('#password').attr('type', 'password');
        //         $('.show_password').addClass('bi-eye-slash-fill');
        //         $('.show_password').removeClass('bi-eye-fill');
        //     }
        // });

        $('#changepassword_form').submit(function(e) {
            e.preventDefault();
            var form = $("#changepassword_form")[0];
            var formData = new FormData(form);
            var url = $('meta[name="base_url"]').attr('content') + '/set-password';
            var redirect = $('meta[name="base_url"]').attr('content') + '/dashboard';
            $.ajax({
                url: url,
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == true) {
                        $('.cred_success').html(
                                '<div class="alert alert-success alert-dismissible fade show"><strong>' +
                                data.success + '</strong></div>');
                                $("#changepassword_form")[0].reset();
                                toastr.success("Your password has been changed!", "success");
                        setTimeout(function() {
                            $('.cred_success').html('');
                            window.location.href=redirect;
                        }, 2000);

                    } else {
                        $('.cred_err').html(
                            '<div class="alert alert-danger alert-dismissible fade show"><strong>' +
                            data.error + '</strong></div>');
                            toastr.error('Credentials Does Not match','Error');
                        setTimeout(function(){
                            $('.cred_err').html('');
                        },4000);
                    }
                },
                error: function(xhr) {
                    $('.err').html('');
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('.' + key).append('<div class="err text-danger">' + value + '</div>');
                    });
                }
            });
        });
    </script>
@endsection
