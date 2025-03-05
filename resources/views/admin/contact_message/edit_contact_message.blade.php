@extends('admin.layout.app')

@section('extra_css')
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Edit Contact</h1>
                    <p class="breadcrumb-item mt-3"><span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span><span>
                            <a href="{{ route('admin.contactmessagepage') }}"><i class="mdi mdi-chevron-right">Contact
                                    Message</i></a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Add Banner
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        {{-- <div class="card-header">
                            Add Banner
                        </div> --}}
                        <div class="card-body">
                            <form id="updatecontact">
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <input type="hidden" name="id" value="{{  $contactmessage->id }}">
                                        <label for=" Contact Name ">Contact Name </label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $contactmessage->name }}">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="Email">Email </label>
                                        <input type="email" class="form-control" name="email" value="{{$contactmessage->email}}">
                                        {{-- <img src="{{ url($banneredit->image) }}" alt="error" width="150px" --}}
                                        height="150px" class="mt-4">
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-6 form-group">
                                        <label for="Message">Message</label>
                                        <input type="text" class="form-control" name="message" value="{{$contactmessage->message}}">
                                    </div>

                                    <div class="col-6 form-group">
                                        <label for="Subject">Subject</label>
                                        <input type="text" class="form-control" name="subject" value="{{$contactmessage->subject}}">
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    {{-- <a href="{{ route('admin.categoriesPage') }}" class="btn btn-primary btn-sm">Cancel</a> --}}
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
    <script>
        $(function() {
            $('#updatecontact').on('submit', function(e) {
                // alert('hello');
                // alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.updatecontactmessage') }}",
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
@endsection
