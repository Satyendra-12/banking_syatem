@extends('user.layout.app')

@section('extra_css')
    
@endsection

@section('content')
<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Add Ad</h1>
                <span>
                <a href="{{ route('user.product') }}"><i class="mdi mdi-chevron-right" style="color:black;"> Ad</i></a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Add Ad</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="ec-vendor-list card card-default" style="border: 1px solid rgb(5, 73, 142);">
                    <div class="card-header">
                        Add Ad
                    </div>
                    <div class="card-body">
                        <form id="addproduct" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for=" Location Name">Ad Name </label>
                                    <input type="text" class="form-control" name="pname" required>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="Location Name">Ad Photo <span><i>(Recommended Size : 400 x 200) Max Size (10MB)</i></span></label>
                                    <input type="file" class="form-control" name="pimage">
                                </div>
                                <div class="col-6 form-group">
                                    <label for=" Location Name">Description </label>
                                    <input type="text" class="form-control" name="desc">
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
                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
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
    $(function(){

        $('#addproduct').on('submit', function(e) {
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('user.saveproduct') }}",
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