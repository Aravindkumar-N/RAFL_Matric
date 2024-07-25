@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header bg-transparent d-flex align-items-center justify-content-between">
                        <h3 class="text-primary">Highlights</h3>
                        <a href="{{ route('highlight_create') }}" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="highlights">
                                <thead>
                                    <tr>
                                        <th class="fw-bold fs-6">S.NO</th>
                                        <th class="fw-bold fs-6">Event Name</th>
                                        <th class="fw-bold fs-6">Highlight</th>
                                        <th class="fw-bold fs-6"> Status</th>
                                        <th class="fw-bold fs-6">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @if(isset($highlights))
                                        @php $i=1; @endphp
                                        @foreach ($highlights as $val)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $val->event_name }}</td>
                                                <td>{{ $val->highlight_name }}</td>
                                            @if($val->status == 1)
                                                <td><label class="badge badge-success">Active</td>
                                            @else
                                            <td><label class="badge badge-danger">Inactive</td>
                                            @endif
                                                <td>
                                                    <div><a href="{{ url('/') }}/highlight/{{ $val->id }}/edit"><i
                                                                class="bi bi-pencil-square text-primary btn"></i></a><i
                                                            class="bi bi-trash text-danger btn"
                                                            onclick="deleteOrder('{{ $val->id }}')"></i></div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#highlights').DataTable();
        });


        function deleteOrder(id) {

            swal({
                    title: "Are you sure?",
                    text: "Confirm to delete this Highlight?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        var redirect = $('meta[name="base_url"]').attr('content') + '/highlights';
                        var token = $('meta[name="csrf-token"]').attr("content");
                        var formData = new FormData();
                        formData.append("_token", "{{ csrf_token() }}");
                        formData.append("id", id);
                        $.ajax({
                            url: "{{ route('highlight_destroy', '') }}" + "/" + id,
                            data: formData,
                            type: 'DELETE',
                            contentType: false,
                            processData: false,
                            dataType: "json",
                            success: function(res) {
                                if (res.status == true) {
                                    swal("Deleted!", "Highlight has been deleted.", "success");
                                    window.location.href = redirect;

                                } else {
                                    swal("Highlight Delete Failed", "Please try again. :)", "error");
                                }
                            }
                        });

                    } else {
                        swal("Cancelled", "Cancelled", "error");
                    }
                });
        }
    </script>
@endsection
