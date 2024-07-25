@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card border-0">
                    <div class="card-header bg-transparent">
                        <h3 class="text-primary">
                            Add Highlight
                        </h3>
                    </div>
                    <div class="card-body">
                        <form id="Highlight_addform" class="forms-sample" autocomplete ="off">
                            @csrf
                            @method("POST")
                              <div class='form-group'>
                                <label for="event_id">Event</label>
                                <select name="event_id" id="event_id" class="form-select">
                                   <option value="">Select Event</option>
                                   
                                    @if (isset($events))
                                        @foreach ($events as $val)
                                            <option value="{{ $val->id }}">{{ $val->event_name }}
                                            </option>
                                        @endforeach
                                    @endif
                                 </select>
                                  <div class="text-dangr event_id"></div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="url" name="url" value="{{route('highlight_store')}}">
                                <label for="highlight_name">Highlight Name</label>
                                <input type="text" class="form-control" id="highlight_name" name="highlight_name"
                                    placeholder="Highlight Name">
                                <div class="text-dangr highlight_name"></div>
                            </div>
                            <div class='form-group'>
                                <label for="highlight_name">Status</label>
                                <select name="status" id="status" class="form-select">
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                                 </select>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            {{-- <button class="btn btn-light">Cancel</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#status').select2();
        $('#event_id').select2();
    });
</script>
@endsection
