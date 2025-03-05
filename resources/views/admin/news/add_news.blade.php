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
                <h1>Add Articles & Features </h1>
                    <p class="breadcrumb-item mt-3" style="color: black;"><span><a
                                href="{{ route('admin.dashboard') }}" style="color: black;">Dashboard</a></span><span><a
                                href="{{ route('admin.articlespage') }}" style="color: black;"><i class="mdi mdi-chevron-right"> Articles & Features Lists

                                </i>
                            </a></span>
                        <span><i class="mdi mdi-chevron-right">Add Articles & Features </i></span>
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
                            <form id="addnews" enctype="multipart/form-data">
                                <div class="row">                

                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Articles & Features Name </label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Article Name">

                                    </div>
                                    {{-- <div class="col-6 form-group">
                                        <label for=" Location Name">Start Date</label>
                                        <input type="date" class="form-control" name="date" placeholder="Enter Date">

                                    </div>
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">End Date</label>
                                        <input type="date" class="form-control" name="enddate" placeholder="Enter Date">

                                    </div> --}}

                                    

                                    
                                     <div class=" col-6 form-group">
                                        <label for=" Location Name">Articles & Features Image</label>
                                        <input type="file" class="form-control" name="image">

                                    </div>
                                    {{-- <div class="col-6 form-group">
                                        <label for=" Location Name">Location </label>
                                        <input type="text" class="form-control" name="location" placeholder="Enter location">

                                    </div>
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Organized By </label>
                                        <input type="text" class="form-control" name="organized_by" placeholder="Enter Organized By">

                                    </div>
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Telphone</label>
                                        <input type="text" class="form-control" name="tel" placeholder="Enter Telphone">

                                    </div>
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter Email">

                                    </div> --}}
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Website</label>
                                        <input type="text" class="form-control" name="website" placeholder="Enter Website">

                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="Location Name">Short Description</label>
                                        <textarea class="form-control" id="summernote" name="description" placeholder="Enter Description">
                                        </textarea>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="Location Name">Long Description</label>
                                        <textarea class="form-control" id="summernote" name="full_description" placeholder="Enter long Description">
                                        </textarea>
                                    </div>
                                    
                                

                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm" style="color: white !important;">Save</button>
                                    <a href="{{ route('admin.newspage') }}" class="btn btn-primary btn-sm" style="color: white !important;">cancel</a>
                                </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script>
        // get District
        
        $(function() {
            $('#addnews').on('submit', function(e) {
                e.preventDefault()
                //  alert('hello');

                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.savenews') }}",
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
            });

            
            // var $disabledResults = $("#brand_id");
            // $disabledResults.select2();

        });
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
     <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 50
            });
        });
    </script> --}}
@endsection