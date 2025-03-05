@extends('user.layout.app')
@section('extra_css')
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Branch</h1>
                    <span>
                            <a href="{{ route('user.branch') }}"> Branch</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span> Edit Branch
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                       
                        <div class="card-body">
                            <form id="updatebranch" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Name </label>
                                        <input type="hidden" name="id" value="{{ $edit->id }}">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $edit->name }}">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">location </label>
                                        <input type="text" class="form-control" name="location"
                                            value="{{ $edit->location }}">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="Location Name">Phone Number</label>
                                        <input type="text" class="form-control" name="number" value="{{ $edit->number }}">
                                        
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
            $('#updatebranch').on('submit', function(e) {
                // alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('user.updatebranch') }}",
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
