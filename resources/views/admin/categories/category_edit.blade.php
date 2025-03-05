@extends('admin.layout.app')
@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Categories</h1>
                    <p class="breadcrumb-item" style="color:black;"><span><a href="{{ route('admin.dashboard') }}" style="color:black;">Dashboard</a></span><span><a
                                href="{{ route('admin.categoriesPage') }}"><i class="mdi mdi-chevron-right" style="color:black;"> Categories

                                </i>
                            </a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Add Category
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header">
                            Category Information
                        </div>

                        <div class="card-body">
                            <form id="updatecategoriy" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ $edit->id }}">

                


                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Category Name <p></p></label>
                                        <input type="text" class="form-control" name="category_name"
                                            value="{{ $edit->category_name }}">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="Location Name">Category Image <span><i>(Recommended Size : 80 x 80) Max
                                                    Size (10MB)</i></span></label>
                                        <input type="file" class="form-control" name="category_cover">
                                        <img src="{{ asset($edit->category_cover) }}" alt="error" width="50px"
                                            height="50px" class="mt-4">
                                    </div>
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Position <p></p></label>
                                        <input type="text" class="form-control" name="position"
                                            value="{{ $edit->position }}">
                                    </div>

                                  
                                   

                                   
                                    
                                </div>


                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">Update </button>
                                    <a href="{{ route('admin.categoriesPage') }}" class="btn btn-primary btn-sm">cancel</a>
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
            $('#updatecategoriy').on('submit', function(e) {
                //   alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.updatecategory') }}",
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
