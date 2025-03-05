@extends('admin.layout.app')
@section('extra_css')
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Contact Us</h1>
                    <p class="breadcrumb-item mt-3" style="color:black;">
                        <span><a href="{{ route('admin.dashboard') }}" style="color:black;">Dashboard</a></span>
                        <a href="{{ route('contact-us.index') }}"><i class="mdi mdi-chevron-right" style="color:black;">Contact Us</i></a>
                        <span><i class="mdi mdi-chevron-right">Add</i></span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">

                        <div class="card-body">
                            <form id="addcontact">
                                @csrf
                                <div class="row">

                                    <div class=" col-6 form-group">
                                        <label for=" Location Name"> Number</label><br>
                                        <input type="text" name="mobile" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number" placeholder="Mobile number" required>
                                    </div>

                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                                        
                                    </div>
                                
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-sm">Add</button>
                                        <a href="{{ route('contact-us.index') }}" class="btn btn-primary btn-sm">cancel</a>
                                    </div>

                                </div>   
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('extra_js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function() {
            $('#addcontact').on('submit', function(e) {
                e.preventDefault()

                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('contact-us.index') }}",
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
@endsection


                