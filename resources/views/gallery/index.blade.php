@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header bg-transparent">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="text-primary">Gallery</h3>
                               
                                <a href="{{route('gallery.create')}}" class="btn btn-primary">Add</a>
                            </div>
                    </div>
                    <div class="card-body">
                        {{-- <h4 class="card-title">Category</h4>
                                <p class="card-description">
                                    Add class <code>.table</code>
                                </p> --}}
                        <div class="table-responsive">
                            <table class="table" id="gallery_Lists">
                                <thead>
                                    <tr>
                                        <th class="fw-bold fs-6">S.NO</th>
                                        <th class="fw-bold fs-6">Gallery</th>
                                        <th class="fw-bold fs-6">Category</th>
                                        <th class="fw-bold fs-6">Description</th>
                                        <th class="fw-bold fs-6">Status</th>
                                        <th class="fw-bold fs-6">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($galleries as $gallery)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td><img src="{{asset($gallery->gallery)}}" width="400" height="400"></td>
                                            <td>{{ $gallery->categories->category_name }}</td>
                                            <td>{{$gallery->description}}</td>
                                            <td><label class="badge badge-success">{{ $gallery->status }}</label>
                                            </td>
                                            <td>
                                                @php $id = $gallery->id;@endphp
                                                <div><a href="{{url('/')}}/gallery/{{$gallery->id}}/edit"><i class="bi bi-pencil-square text-primary btn"></i></a><i class="bi bi-trash text-danger btn" onclick="deleteOrder('{{$gallery->id}}')"></i></div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end .. --}}
        </div>
    </div>
    <!-- partial -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#gallery_Lists').DataTable();
        });

        function deleteOrder(id) {

swal({
        title: "Are you sure?",
        text: "Confirm to delete this Gallery?",
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
            var redirect = $('meta[name="base_url"]').attr('content')+'/gallery';
            var token = $('meta[name="csrf-token"]').attr("content");
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("id", id);
            $.ajax({
                url: "{{ route('gallery.destroy', '') }}" + "/" + id,
                data: formData,
                type: 'DELETE',
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(res) {
                    if (res) {
                        swal("Deleted!", "Gallery has been deleted.", "success");
                        window.location.href=redirect;

                    } else {
                        swal("Gallery Delete Failed", "Please try again. :)", "error");
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
