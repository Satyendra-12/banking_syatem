@extends('user.layout.app')

@section('extra_css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Add Workinghour</h1>
                <span>
                <a href="{{ route('user.workinghour') }}">Working Hour Details</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Add Working Hour</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="ec-vendor-list card card-default" style="border: 1px solid rgb(5, 73, 142);">
                    <div class="card-header">
                        Add Working Hour
                    </div>
                    <div class="card-body">
                        <form id="addwork">
                            
                            @php
                          $days = ['Sunday','Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                          @endphp
                            @foreach ($days as $day) 
                                <div class="form-group">
                                    <label for="{{$day}}_open_time">{{ $day }} Open Time:</label>
                                    <input type="time" name="{{ $day }}_open_time">
                                </div>
                                <div class="form-group">
                                    <label for="{{$day}}_close_time">{{ $day }} Close Time:</label>
                                    <input type="time" name="{{$day}}_close_time">
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary">Save Opening Hours</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
    
@endsection

@section('extra_js')

<script>
    $(function(){

        $('#addwork').on('submit', function(e) {
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('opening_hours.store') }}",
                    type: "POST",
                    data: fd,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('#login-button').prop('disabled', true);
                        $('.loader').show();
                    },
                    success: function(result) {
                        if (result.status) {
                            iziToast.success({
                                title: '',
                                message: result.msg,
                                position: 'topRight'
                            });

                            setTimeout(function() {
                                window.location.href = result.location;
                            }, 500);
                        } else {
                            iziToast.error({
                                title: '',
                                message: result.msg,
                                position: 'topRight'
                            });
                        }
                    },
                    complete: function() {
                        $('.loader').hide();
                    },
                    error: function(jqXHR, exception) {
                        $('.loader').hide();
                        console.log(jqXHR.responseText);
                    }
                });
            })


    });
    

</script>
{{--  
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    // Initialize flatpickr
    flatpickr("#timepicker", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "h:i K", // 12-hour format with AM/PM
    });
</script>   --}}
@endsection