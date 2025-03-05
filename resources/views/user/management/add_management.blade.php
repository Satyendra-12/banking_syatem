@extends('user.layout.app')

@section('extra_css')
    
@endsection

@section('content')
<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Add Management</h1>
                <span>
                <a href="{{ route('user.management') }}"> Management</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Add Management</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="ec-vendor-list card card-default" style="border: 1px solid rgb(5, 73, 142);">
                    <div class="card-header">
                        Add Management
                    </div>
                    <div class="card-body">
                        <form id="addmana" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for=" Location Name">Name </label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="Location Name">Designation</label>
                                    <input type="text" class="form-control" name="roll">
                                </div>
                                <div class="col-6 form-group">
                                    <label for=" Location Name">Phone Number </label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                                <div class="col-6 form-group">
                                    <label for=" Location Name">Email </label>
                                    <input type="email" class="form-control" name="email">
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

        $('#addmana').on('submit', function(e) {
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('user.savemanagement') }}",
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