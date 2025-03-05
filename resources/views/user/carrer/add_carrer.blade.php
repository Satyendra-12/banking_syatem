@extends('user.layout.app')

@section('extra_css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"> --}}
<style>
   
     .note-btn-group .note-btn {
        border-color: rgba(0,0,0,.2);
        padding: 0.28rem 0.65rem;
        font-size: 13px;
        background: transparent;
    } 
    .btn {
        color: black !important;
    }
    li {
    list-style: inside !important;
}
.note-insert{
    display: none !important;
}
</style>
    
@endsection

@section('content')
<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Add Career</h1>
                <span>
                <a href="{{ route('user.carrer') }}"> Careers</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Add Careers</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="ec-vendor-list card card-default" style="border: 1px solid rgb(5, 73, 142);">
                    <div class="card-header">
                        Add Careers
                    </div>
                    <div class="card-body">
                        <form id="addcareer" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for=" Location Name">Name </label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="Location Name">Description</label>
                                    <textarea type="text" class="form-control" id="summernote" name="roll"></textarea>
                                </div>
                                {{-- <div class="col-6 form-group">
                                    <label for=" Location Name">Phone Number </label>
                                    <input type="text" class="form-control" name="phone">
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
                                <button type="submit" class="btn btn-primary btn-sm" style="color: white !important;">Save</button>
                                {{-- <a href="{{ route('user.categoriesPage') }}" class="btn btn-primary btn-sm">Cancel</a> --}}
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script>
    $('textarea#summernote').summernote({
    placeholder: '',
    tabsize: 2,
    height: 100,
toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'italic', 'underline', 'clear']],
    // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
    //['fontname', ['fontname']],
   // ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['table', ['table']],
    // ['insert', ['link', 'picture', 'hr']],
    //['view', ['fullscreen', 'codeview']],
    //['view', ['link', 'picture', 'hr']],
    ['help', ['help']]
  ],
  });
    </script>


@endsection

@section('extra_js')

<script>
    $(function(){

        $('#addcareer').on('submit', function(e) {
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('user.savecarrer') }}",
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