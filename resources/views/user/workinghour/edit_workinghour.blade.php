@extends('user.layout.app')
@section('extra_css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Working Hour</h1>
                    <span>
                            <a href="{{ route('user.workinghour') }}"> Working Hour</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span> Edit Working Hour
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                       
                        <div class="card-body">
                            <form id="updatework">
                             
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ $edit->id }}">
                                    <div class="col-6 form-group">
                                        <div>
                                            <label for="timepicker">Select a Day</label>
                                            <select id="day" name="day" class="form-control">
                                                <option value="Monday" {{ $edit->day == 'Monday' ? 'selected' : '' }}>Monday</option>
                                                <option value="Tuesday" {{ $edit->day == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                                <option value="Wednesday" {{ $edit->day == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                                <option value="Thursday" {{ $edit->day == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                                <option value="Friday" {{ $edit->day == 'Friday' ? 'selected' : '' }}>Friday</option>
                                                <option value="Saturday" {{ $edit->day == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                                <option value="Sunday" {{ $edit->day == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                                            </select>
                                        </div>
                              
                                    </div>
                                    <div class="col-3 form-group">
                                      
                                            <label for="opentime">Open Time:</label><br>
                                            <input type="time" name="opentime" value="{{ $edit->opentime }}">
                                       
                                  
                                    </div>
                                    <div class="col-3 form-group">
                                       
                                            <label for="closetime">Close Time:</label><br>
                                            <input type="time" name="closetime" value="{{ $edit->closetime }}">  
                              
                                    
                                    </div> 
                                </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                
                                </div>
                            </form>
                        
                        </div>

                    </div>
                </div>
            </div>
    </div>
        </div>
    </div>
@endsection
@section('extra_js')
    <script>
        $(function() {
            $('#updatework').on('submit', function(e) {
                // alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('user.updateworkinghour') }}",
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

        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Initialize flatpickr
        flatpickr("#timepicker", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "h:i K", // 12-hour format with AM/PM
        });
    </script>  
@endsection
