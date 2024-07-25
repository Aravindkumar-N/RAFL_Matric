@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card border-0">
                    <div class="card-header bg-transparent">
                        <h3 class="text-primary">
                            Edit Highlight
                        </h3>
                    </div>
                    <div class="card-body">
                        <form id="Highlight_editform" class="forms-sample" autocomplete ="off">
                            @csrf
                            @method('PUT')
                              <div class='form-group'>
                                <label for="event_id">Event</label>
                                <select name="event_id" id="event_id" class="form-select">
                                   <option value="">Select Event</option>
                                    @if (isset($events))
                                        @foreach ($events as $val)
                                            <option value="{{ $val->id }}" {{!empty($val->id == $highlight->event_id) ? 'selected' : ''}}>{{ $val->event_name }}
                                            </option>
                                        @endforeach
                                    @endif
                                 </select>
                                  <div class="text-dangr event_id"></div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="highlight_edit_id" value="{{$highlight->id}}">
                                <label for="highlight_name">Event Name</label>
                                <input type="text" class="form-control" id="highlight_name" name="highlight_name"
                                    placeholder="Highlight Name" value="{{!empty($highlight->highlight_name)? $highlight->highlight_name : ''}}">
                                <div class="text-dangr highlight_name"></div>
                            </div>
                            <div class='form-group'>
                                <select name="status" id="status" class="form-select">
                                   <option value="1" {{!empty($highlight->status ==1) ? 'selected' : ''}}>Active</option>
                                   <option value="0" {{!empty($highlight->status ==0) ? 'selected' : ''}}>Inactive</option>
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
