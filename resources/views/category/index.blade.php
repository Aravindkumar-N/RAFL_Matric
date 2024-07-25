@extends('layouts.app')
@section('content')
    {{-- add category model --}}
    <div class="modal" tabindex="-1" id="add_category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                </div>
                <div class="modal-body">
                    <form id="category_subform">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name"
                                placeholder="Category Name">
                            <div class="text-danger category_name"></div>
                            <input type="hidden" id="url" name="url" value="{{ route('category.store') }}">
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" class="btn btn-primary btn-sm" value="Add Category">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- edit category model --}}
    <div class="modal" tabindex="-1" id="edit_category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">edit Category</h5>
                </div>
                <div class="modal-body">
                    <form id="category_editform">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="edit_category_name" name="edit_category_name"
                                placeholder="Category Name">
                            <div class="text-danger edit_category_name"></div>
                            <input type="hidden" id="category-id" name="category-id" value="">
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" class="btn btn-primary btn-sm" value="Update Category">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="text-primary">Category</h3>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_category">Add
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <h4 class="card-title">Category</h4>
                                <p class="card-description">
                                    Add class <code>.table</code>
                                </p> --}}
                        <div class="table-responsive">
                            <table class="table" id="category_Lists">
                                <thead>
                                    <tr>
                                        <th class="fw-bold fs-6">S.NO</th>
                                        <th class="fw-bold fs-6">Category</th>
                                        <th class="fw-bold fs-6">Status</th>
                                        <th class="fw-bold fs-6">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td><label class="badge badge-success">{{ $category->status }}</label>
                                            </td>
                                            <td>
                                                <div><i class="bi bi-pencil-square text-primary btn category_id"
                                                        data-category_id="{{ $category->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#edit_category"></i><i
                                                        class="bi bi-trash text-danger btn"
                                                        onclick="deleteOrder('{{ $category->id }}')"></i></div>
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
            $('#category_Lists').DataTable();
        });

        function deleteOrder(id) {
            swal({
                    title: "Are you sure?",
                    text: "Confirm to delete this Category?",
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
                        var redirect = $('meta[name="base_url"]').attr('content')+'/category';
                        var token = $('meta[name="csrf-token"]').attr("content");
                        var formData = new FormData();
                        formData.append("_token", "{{ csrf_token() }}");
                        formData.append("id", id);
                        $.ajax({
                            url: "{{ route('category.destroy', '') }}" + "/" + id,
                            data: formData,
                            type: 'DELETE',
                            contentType: false,
                            processData: false,
                            dataType: "json",
                            success: function(res) {
                                if (res) {
                                    swal("Deleted!", "Category has been deleted.", "success");
                                    window.location.href = redirect;

                                } else {
                                    swal("Invoice Delete Failed", "Please try again. :)", "error");
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
