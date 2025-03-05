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
        .button {
            border: 3px #4e4e4e4e dashed;
            height: 240px;
            width: 400px;
        }

        .add {
            text-align: center;
            margin-top: 50px;
            font-size: 20px;
            font-weight: bolder;
        }

        .test {

            font-size: 50px;
            font-weight: bolder;
            color: #4a4a4a4a;

        }

        /* .avatar {
                    vertical-align: middle;
                    width: 400px;
                    height: 400px;
                    border-radius: 50%;
                } */
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }

        .avatar-upload .avatar-edit input {
            display: none;
        }

        .avatar-upload .avatar-edit input+label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }

        .avatar-upload .avatar-edit input+label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }

        /* .avatar-upload .avatar-edit input+label:after {
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        } */

        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload .avatar-preview>div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .mdi-pencil::before {
            content: "\F3EB";
            margin: 6px 0 0 9px;
        }

        .mdi-pencil::after {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Update Profile</h1>
                   
                       
                    
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="border-bottom: 0px;padding-bottom: 20px;">
                <li class="nav-item" role="presentation" style="list-style: none !important;">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Update Profile</button>
                </li>
                {{-- <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Change Password</button>
                </li> --}}
                
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form class="add_address">
                        <div class="row">
                            
                            {{-- <div class="col-4"> --}}
                                {{-- <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image" />
                                        <label for="imageUpload"><i class=" mdi mdi-pencil"></i></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url({{ url('/public') }}/{{ Auth::user()->profile_image }})">
                                          
                                    
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <img src="https://cdn.pixabay.com/photo/2017/08/06/21/01/louvre-2596278_960_720.jpg"
                                    class="img img-thumbnail avatar" width="304" height="236"> --}}
            
                            {{-- </div> --}}
            
                            <div class="col-12 mb-4">
                                <div class="ec-vendor-list card card-default">
                                    <div class="card-header">
                                        Update Profile
                                    </div>
                                    <div class="card-body">
                                       
                                            <div class="row">
            
                                                <div class="col-6 form-group">
                                                    <label for=" Name">{{ __('lang.name')}}</label>
                                                    <input type="text" class="form-control" name="username"
                                                        value="{{ Auth::guard('web')->user()->username }}">
                                                    {{-- <input type="text" class="form-control" name="name" value="{{Auth::guard('web')->user()->username }}"> --}}
                                                    {{-- <input type="hidden" name="id" value="{{$profile->id}}"> --}}
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label for="Address">Bank Logo</label>
                                                    <input type="file" class="form-control" name="contact_person"
                                                        value="{{ Auth::guard('web')->user()->contact_person }}">
                                                        <img src="{{ url('/public') }}/{{ Auth::user()->contact_person }}" alt="error" width="50px"
                                                        height="50px">
                                                </div>
                                            
            
                                                <div class="col-6 form-group">
                                                    <label for="pincode">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ Auth::guard('web')->user()->email }}">
                                                </div>
            
                                                <div class="col-6 form-group">
                                                    <label for="pincode">{{ __('lang.phone')}}</label>
                                                    <input type="text" class="form-control" name="phone"
                                                        value="{{ Auth::guard('web')->user()->phone_number }}">
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label for="pincode">website</label>
                                                    <input type="text" class="form-control" name="website"
                                                        value="{{ Auth::guard('web')->user()->website }}">
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label for="pincode">Goolge map links</label>
                                                    <input type="text" class="form-control" name="maps"
                                                        value="{{ Auth::guard('web')->user()->maps }}">
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label for="pincode">Address</label>
                                                    <input type="text" class="form-control" name="location"
                                                        value="{{ Auth::guard('web')->user()->location }}">
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label for="pincode">Overview</label>
                                                    <textarea type="text" class="form-control" id="summernote" name="short_description">{{ Auth::guard('web')->user()->short_description }}</textarea>
                                                </div>
                                            
            
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary btn-sm" style="color: white !important;">{{ __('lang.update')}}</button>
                                                {{-- <a href="{{ route('admin.categoriesPage') }}" class="btn btn-primary btn-sm">Cancel</a> --}}
                                            </div>
                                        
            
                                    </div>
            
                                </div>
                            </div>
                        </div>
            
                    </form>
                </div>
                {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="ec-vendor-list card card-default">
                                <div class="card-header">
                                   <h1 style="font-size: 20px;">Change Password</h1>
                                </div>
            
                                <div class="card-body">
                                    <form id="update">
                                        <div class="row">
            
            
                                            <div class=" form-group">
                                                <label for=" Title">Current Password</label>
                                                <input type="password" class="form-control" name="Current_Password" placeholder="Enter Current Password">
            
                                            </div>
                                            
            
            
            
            
            
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for=" Location">New Password</span></label>
                                                <input type="password" class="form-control" name="n_password" placeholder="Enter New Password">
                                            </div>
                                           
                                        </div>
            
                                        <div class="row">
                                            <div class="form-group">
                                                <div id="subcategory">
                                                    <label for="Subcategory Name">Confirm New Password Again</span></label>
                                                <input type="password" class="form-control" name="c_password" placeholder="Enter Confirm New Password Again">
                                                   
                                                
                                                </div>
                                                
                                            </div>
            
                                            
                                        </div>
            
                                        
            
                                        
            
            
                                        <div>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                           
                                        </div>
                                    </form>
            
                                </div>
            
                            </div>
                        </div>
                    </div>
                </div> --}}
                
              </div>
            
            <!--card -->
           
        </div>

    </div>
    </div>
    </div>



    </div>
    </div>
    </div>

    {{-- Add Address model --}}

   


    {{-- edit address model --}}
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
 <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>

    <script>
        $(function() {

            // Add modal function
            $('.add_address').on('submit', function(e) {
                // alert('helo');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('user.profileUpdate') }}",
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

                            // $('#add_address').FormData.location.reload();

                            setTimeout(function() {
                                // window.location.href = result.location;
                                window.location.reload();
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
            $('#update').on('submit', function(e) {
            // alert('hello');
            e.preventDefault()
            let fd = new FormData(this)
            fd.append('_token', "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('user.resetpasword') }}",
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
                            window.location.reload();
                        }, 2000);

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

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#imagePreview").css(
                        "background-image",
                        "url(" + e.target.result + ")"
                    );
                    $("#imagePreview").hide();
                    $("#imagePreview").fadeIn(650);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>
@endsection
