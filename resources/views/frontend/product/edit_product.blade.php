@extends('user.layout.app')
@section('extra_css')
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Product</h1>
                    <span>
                            <a href="{{ route('user.product') }}"><i class="mdi mdi-chevron-right" style="color:black;"> Product</i></a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span> Edit Product
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                       
                        <div class="card-body">
                            <form id="updateproduct" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Product Name </label>
                                        <input type="hidden" name="id" value="{{ $editproduct->id }}">
                                        <input type="text" class="form-control" name="pname"
                                            value="{{ $editproduct->pname }}">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Description </label>
                                        <input type="text" class="form-control" name="desc"
                                            value="{{ $editproduct->desc }}">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="Location Name">Product Photo <span><i>(Recommended Size : 400 x 200) Max
                                                    Size (10MB)</i></span></label>
                                        <input type="file" class="form-control" name="pimage">
                                        <img src="{{ asset($editproduct->pimage) }}" alt="error" width="50px"
                                            height="50px" class="mt-4">
                                    </div>
                                    
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
                                    {{-- <a href="{{ route('user.categoriesPage') }}" class="btn btn-primary btn-sm">Cancel</a> --}}
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
            $('#updateproduct').on('submit', function(e) {
                // alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('user.updateproduct') }}",
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
