@extends('admin.layout.app')

@section('extra_css')
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                <h1>Add Ads</h1>
                    <p class="breadcrumb-item mt-3" style="color: black;"><span><a
                                href="{{ route('admin.dashboard') }}" style="color: black;">Dashboard</a></span><span><a
                                href="{{ route('admin.adpage') }}" style="color: black;"><i class="mdi mdi-chevron-right"> Ads

                                </i>
                            </a></span>
                        <span><i class="mdi mdi-chevron-right">Add Ads</i></span>
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header">
                            Ad Information
                        </div>

                        <div class="card-body">
                            <form id="addad" enctype="multipart/form-data">
                                <div class="row">                

                                     <div class=" col-6 form-group">
                                        <label for=" Location Name">AD Cover Photo</label>
                                        <input type="file" class="form-control" name="adimage">

                                    </div>
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Image URL</label>
                                        <input type="text" class="form-control" name="reurl" placeholder="Enter Image URL">

                                    </div>

                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                    <a href="{{ route('admin.adpage') }}" class="btn btn-primary btn-sm">cancel</a>
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script>
        // get District
        
        $(function() {
            $('#addad').on('submit', function(e) {
                e.preventDefault()
                //  alert('hello');

                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.savead') }}",
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
            });

            
            // var $disabledResults = $("#brand_id");
            // $disabledResults.select2();

        });
    </script>
@endsection