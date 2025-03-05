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
</style>
    
@endsection

@section('content')

    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Who's Who Profile</h1>
                    <p class="breadcrumb-item" style="color:black;"><span><a
                                href="{{ route('user.who') }}">Who's Who Profile

                                
                            </a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Edit Profile
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header">
                            Profile Information
                        </div>

                        <div class="card-body">
                            <form id="updatewho" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ $edit->id }}">

                


                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $edit->name }}">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="Location Name">Image <span><i>(Recommended Size : 250 x 150) Max
                                                    Size (10MB)</i></span></label>
                                        <input type="file" class="form-control" name="image">
                                        <img src="{{ asset($edit->image) }}" alt="error" width="150px"
                                            height="150px" class="mt-4">
                                    </div>
                                    
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Bank/Company Name</label>
                                        <input type="text" class="form-control" name="roll"
                                            value="{{ $edit->roll }}">
                                    </div>
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Designation</label>
                                        <input type="text" class="form-control" name="position"
                                            value="{{ $edit->position }}">
                                    </div>
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name"> Address</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $edit->address }}">
                                    </div>
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Position <small>(on index page)</small></label>
                                        <input type="text" class="form-control" name="pos"
                                            value="{{ $edit->pos }}">
                                    </div>
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name"> Description</label>
                                        <textarea type="text" class="form-control" id="summernote" name="description"
                                            >{{ $edit->description }}</textarea>
                                    </div>
                                  
                                   

                                   
                                    
                                </div>


                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm" style="color:white !important;">Update </button>
                                    <a href="{{ route('user.who') }}" class="btn btn-primary btn-sm" style="color: white !important;">cancel</a>
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
        ['insert', ['link', 'picture', 'hr']],
        //['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
      ],
      });
        </script>

   
@endsection
@section('extra_js')
    <script>
        $(function() {
            $('#updatewho').on('submit', function(e) {
                //   alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('user.updatewho') }}",
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
