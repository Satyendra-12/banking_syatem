<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="UP Hello - Admin Dashboard HTML Template.">

    <title>Bank - Register Page</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="{{ asset('fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ asset('fonts.gstatic.com') }}" crossorigin>
    <link
        href="fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <link href="cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- Ekka CSS -->
    <link id="ekka-css" rel="stylesheet" href="{{ asset('assets/css/ekka.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/bundles/izitoast/css/iziToast.min.css') }}">
    <!-- FAVICON -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="shortcut icon" />
    <style>
        .btn.btn-primary {
    color: white;
    background-color: rgb(5, 73, 142) !important;
    border-color: rgb(5, 73, 142) !important;
}
.btn.btn-primary:hover, .btn.btn-outline-primary:hover {
    color: white;
    background-color: rgb(5, 73, 142) !important;
    border-color: rgb(5, 73, 142) !important;
}
        </style>
</head>

<body class="sign-inup" id="body">
    <div class="container d-flex align-items-center justify-content-center form-height-login pt-24px pb-24px">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="ec-brand">
                            <a href="index.html" title="OLX" style="height: 100px; ">
                                {{-- <h1 class="text-white ">UP Hello</h1> --}}
                                <img class="ec-brand-icon" src="{{ asset('assets/img/logo/hello.jpg') }}" alt="logo" style="border-radius: 50%;"  />
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <h4 class="text-dark mb-5" style="font-weight:600; font-size:30px;">Register</h4>

                        <form id="registered_submit">

                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <label for="UserName">User Name</label>
                                    <input type="text" class="form-control" name="user_name" placeholder="Enter Name">
                                </div>

                                <div class="form-group col-md-12 ">
                                    <label for="Email">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter Email">
                                </div>


                                <div class="form-group col-md-12 ">
                                    <label for="password">{{ __('lang.password')}}</label>
                                    <input class="form-control" type="password" id="myInput" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    {{-- <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i> --}}
                                    <br><input type="checkbox" onclick="myFunction()" style="margin-right: 7px;">Show Password
                                </div>



                                <div class="col-md-12">
                                    <div class="d-flex my-2 justify-content-between">
                                        <div class="d-inline-block mr-3">
                                            {{-- <div class="control control-checkbox">Remember me
                                                <input type="checkbox" />
                                                <div class="control-indicator"></div>
                                            </div> --}}
                                        </div>

                                        {{-- <p><a class="text-blue" href="#"> Password</a></p> --}}
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block mb-4">{{ __('lang.register')}}</button>
                                    <div class="d-flex my-2 justify-content-between">
                                        <div class="d-inline-block mr-3">
                                            
                                        </div>

                                    <p>Already have an account?<a class="text-red" href="{{route('user.userloginpage')}}"> Signin </a></p>
                                    {{-- <p class="sign-upp">Don't have an account yet ?
                                        <a class="text-blue" href="#">Sign Up</a>
                                    </p> --}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    
    <script src="{{ asset('assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-zoom/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slick/slick.min.js') }}"></script>

    <!-- Ekka Custom -->
    <script src="{{ asset('assets/js/ekka.js') }}"></script>
    <script src="{{ asset('assets/bundles/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/toastr.js') }}"></script>
    <script>
        $(function() {
            $('#registered_submit').on('submit', function(e) {
                // alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('user.register') }}",
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
        function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    </script>




</body>

</html>
