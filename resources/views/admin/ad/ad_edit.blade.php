@extends('admin.layout.app')
@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Ads</h1>
                    <p class="breadcrumb-item" style="color:black;"><span><a href="{{ route('admin.dashboard') }}" style="color:black;">Dashboard</a></span><span><a
                                href="{{ route('admin.adpage') }}"><i class="mdi mdi-chevron-right" style="color:black;"> Ad List

                                </i>
                            </a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Update Ad
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header">
                            Ads Information
                        </div>

                        <div class="card-body">
                            <form id="updatead" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ $edit->id }}">

                
                                     <div class=" col-6 form-group">
                                        <label for=" Location Name">Ad Image <span><i>(Recommended Size : 1350 x 350) Max
                                            Size (10MB)</i></span></label>
                                        <input type="file" class="form-control" name="adimage">
                                        <img src="{{ asset($edit->adimage) }}" alt="error" width="150px"
                                        height="150px" class="mt-4">
                                    </div>
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Image Url</label>
                                        <input type="text" class="form-control" name="reurl" value="{{ $edit->reurl }}">

                                       
                                    </div>
                                </div>


                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">Update </button>
                                    <a href="{{ route('admin.adpage') }}" class="btn btn-primary btn-sm">cancel</a>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@section('extra_js')
    <script>
                    
            $('#updatead').on('submit', function(e) {
                //   alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.updatead') }}",
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
            

            

    </script>
@endsection
@endsection
