@extends('admin.layout.app')
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
                    <h1>Update Articles & Features </h1>
                    <p class="breadcrumb-item" style="color:black;"><span><a href="{{ route('admin.dashboard') }}" style="color:black;">Dashboard</a></span><span><a
                                href="{{ route('admin.newspage') }}"><i class="mdi mdi-chevron-right" style="color:black;">All Articles & Features Lists

                                </i>
                            </a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Update Articles & Features 
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header">
                            Articles & Features Information
                        </div>

                        <div class="card-body">
                            <form id="updatenews" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ $edit->id }}">

                


                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Articles & Features Name </label>
                                        <input type="text" class="form-control" name="name" value="{{ $edit->name }}">

                                    </div>
                                    {{-- <div class="col-6 form-group">
                                        <label for=" Location Name">Start Date</label>
                                        <input type="date" class="form-control" name="date" value="{{ $edit->date }}">

                                    </div>
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">End Date</label>
                                        <input type="date" class="form-control" name="enddate" value="{{ $edit->enddate }}">

                                    </div> --}}

                                    
                                     <div class=" col-6 form-group">
                                        <label for=" Location Name">Articles & Features Photo</label>
                                        <input type="file" class="form-control" name="image">

                                    </div>
                                    {{-- <div class=" col-6 form-group">
                                        <label for=" Location Name">location</label>
                                        <input type="text" class="form-control" name="location" value="{{ $edit->location }}">

                                       
                                    </div>
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Organized By</label>
                                        <input type="text" class="form-control" name="organized_by value="{{ $edit->organized_by }}">

                                       
                                    </div>
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Phone Number</label>
                                        <input type="text" class="form-control" name="telphone" value="{{ $edit->telphone }}">

                                       
                                    </div>
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ $edit->email }}">

                                       
                                    </div> --}}
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Website</label>
                                        <input type="text" class="form-control" name="website" value="{{ $edit->website }}">

                                       
                                    </div>
                                    
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Short Description</label>
                                        <textarea class="form-control" id="summernote" name="description">{{ $edit->description }}
                                            </textarea>
                                       
                                    </div>
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Long Description</label>
                                        <textarea class="form-control"  id="summernote" name="full_description">{{ $edit->full_description }}
                                            </textarea>
                                       
                                    </div>
                                    
                                </div>


                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm" style="color: white !important;">Update </button>
                                    <a href="{{ route('admin.newspage') }}" class="btn btn-primary btn-sm" style="color: white !important;">cancel</a>
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
                    
            $('#updatenews').on('submit', function(e) {
                //   alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.updatenews') }}",
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
   
     {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 50
            });
        });
    </script> --}}

@endsection
