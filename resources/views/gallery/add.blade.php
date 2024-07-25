@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card border-0">
                    <div class="card-header bg-transparent">
                        <h3 class="text-primary">
                            Add Gallery
                        </h3>
                    </div>
                    <div class="card-body">
                        <form id="gallery_addform" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="url" id="url" value="{{ route('gallery.store') }}">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="">Choose Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger category"></div>
                            </div>

                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" id="gallery" name="gallery" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                                <div class="text-danger gallery"></div>
                            </div>
                            <div class="form-group">
                                <label for="description" row="3">Description</label>
                               <textarea class="form-control" placeholder="Description" name="description" id="description" rows="3"></textarea>
                                <div class="text-danger description"></div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                             <!-- <button class="btn btn-light">Cancel</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#category').select2();
        });
    </script>
@endsection
