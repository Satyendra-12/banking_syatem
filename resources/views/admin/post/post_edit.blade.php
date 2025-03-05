@extends('admin.layout.app')
@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Post List</h1>
                    <p class="breadcrumb-item" style="color:black;"><span><a href="{{ route('admin.dashboard') }}" style="color:black;">Dashboard</a></span><span><a
                                href="{{ route('admin.postpage') }}"><i class="mdi mdi-chevron-right" style="color:black;"> Post List

                                </i>
                            </a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Update Post
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header">
                            Post Information
                        </div>

                        <div class="card-body">
                            <form id="updatepost" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ $edit->id }}">

                


                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Post Details</label>
                                        <input type="text" class="form-control" name="post_details"
                                            value="{{ $edit->post_details }}">
                                    </div>
                                    
                                   
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Post Thumbnail Photo</label>
                                        <input type="file" class="form-control" name="thumb">
                                        <img src="{{ asset($edit->thumb) }}" alt="error" width="150px"
                                            height="60px" class="mt-4">
                                    </div>
                                    
                                  
                                   

                                   
                                    {{-- <div class=" col-6 form-group">
                                        <label for=" Location Name">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1" {{ $edit->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $edit->status == 0 ? 'selected' : '' }}>In-Active</option>
                                        </select>
                                    </div> --}}
                                </div>


                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">Update </button>
                                    <a href="{{ route('admin.postpage') }}" class="btn btn-primary btn-sm">cancel</a>
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
        $(function() {
            $('#updatepost').on('submit', function(e) {
                //   alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.updatepost') }}",
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
@endsection
