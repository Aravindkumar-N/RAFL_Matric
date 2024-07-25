@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h3 class="text-primary">
                            Edit Profile
                        </h3>
                    </div>
                    <div class="card-body">
                        <form id="profile_editform" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Name</label>
                                <input type="hidden" id="profile_id" name="profile_id" value="{{ $user->id }}">
                                <input type="hidden" name="url" id="url"
                                    value="{{ route('profile.update', '' . $user->id) }}">
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ !empty($user->name) ? $user->name : '' }}">
                                <div class="text-danger name"></div>
                            </div>
                            <div class="input-group mb-2">
                                <img src="{{ asset($user->profile) }}" alt="Profile" width="200" height="200">
                            </div>
                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" id="profile" name="profile" class="file-upload-default"
                                    value="">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                                <div class="text-danger profile"></div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            {{-- <button class="btn btn-light">Cancel</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $('#profile_editform').submit(function(e) {
            e.preventDefault();
            var form = $("#profile_editform")[0];
            var formData = new FormData(form);
            var url = $("#url").val();
            var rediract = $('meta[name="base_url"]').attr('content') + '/dashboard';
            $.ajax({
                url: url,
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == true) {
                        toastr.success("Profile Updated Successfully!", "success");
                        setTimeout(function() {
                            window.location.href = rediract;
                        }, 2000);
                    } else {

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
