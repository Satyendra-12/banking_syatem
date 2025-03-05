@extends('admin.layout.app')
@section('extra_css')
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Bottom Slider</h1>
                    <p class="breadcrumb-item mt-3" style="color:black;"><span><a href="{{ route('admin.dashboard') }}" style="color:black;">Dashboard</a></span><span>
                            <a href="{{ route('admin.bottomslider') }}"><i class="mdi mdi-chevron-right" style="color:black;"> Bottom Slider</i></a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span> Edit Bottom Slider
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header" style="color: black">
                            <h3>Update Bottom Slider</h3>
                        </div>
                        <div class="card-body">
                            <form id="updatebottomslider" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <input type="hidden" name="id" value="{{$editbottomslider->id}}">
                                        <label for="Location Name">Slider Photo <span><i>(Recommended Size : 1350 x 300) Max
                                                    Size (10MB)</i></span></label>
                                        <input type="file" class="form-control" name="image">
                                        <img src="{{ asset($editbottomslider->image) }}" alt="error" width="150px"
                                            height="150px" class="mt-4">
                                    </div>
                                    {{-- <div class="col-6 form-group">
                                        <label for="Location Name">Name</label>
                                        <input type="text" class="form-control" name="name">
                                        
                                    </div> --}}
                                </div>
                                {{-- <div class="row">
                                <div class="col-6"></div>
                                <div class="col-6 form-group">
                                    <label for="Location Name">Brand Icon <samp><i>(Recommended Size : 200 x 200) Max Size (4MB)</i></samp></label>
                                    <input type="file" class="form-control" name="icon">
                                </div>
                            </div> --}}
                                <div>
                                    <button type="submit" class="btn btn-primary">Update</button>
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
            $('#updatebottomslider').on('submit', function(e) {
                // alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.updatebottomslider') }}",
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
