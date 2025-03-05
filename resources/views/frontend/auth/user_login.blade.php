<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="UP Hello - Admin Dashboard HTML Template.">

    <title>Bahrain Bank - Admin Dashboard</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="{{ asset('fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ asset('fonts.gstatic.com') }}" crossorigin>
    <link
        href="{{ asset('fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap') }}"
        rel="stylesheet">

    <link href="{{ asset('cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css') }}" rel="stylesheet" />

    <!-- Ekka CSS -->
    <link id="ekka-css" rel="stylesheet" href="{{ asset('assets/css/ekka.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/bundles/izitoast/css/iziToast.min.css') }}">
    <!-- FAVICON -->
    <link href="{{ asset('assets/img/logo/1.png') }}" rel="shortcut icon" />

    <style>
        .bg-red {
            background-color: rgb(5, 73, 142);
        }

        .text-red {
            color:#000;
        }
        .text-red:hover {
            color:#000;
        }
        .btn-red-cust {
            background-color: rgb(5, 73, 142);
            color:#fff;
        }
        .btn-red-cust:hover {
            background-color: rgb(5, 73, 142);
            color: #fff;
        }
    </style>
</head>

<body class="sign-inup" id="body">
    <div class="container d-flex align-items-center justify-content-center form-height-login pt-24px pb-24px">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="card">
                    <div class="card-header bg-red">
                        <div class="ec-brand">
                            <a href="index.html" title="Bahrain Bank" style="height: 100px; ">
                                {{-- <h1 class="text-white ">UP Hello</h1> --}}
                                <img class="" src="{{ asset('assets/img/logo/1.png') }}" alt="logo" style="height:50px; width:100px;"  />
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <h4 class="text-red mb-5" style="font-weight:600; font-size:30px;">Sign In</h4>

                        <form id="login_submit">

                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                                </div>

                                <div class="form-group col-md-12 ">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="myInput"
                                        placeholder=" Enter Password">
                                       
                                </div>

                                <div class="col-md-12">
                                    <div class="d-flex my-2 justify-content-between">
                                        <div class="d-inline-block mr-3">
                                            <input type="checkbox" onclick="myFunction()" style="margin-right: 7px;">Show Password
                                            </div>
                                            <p><a class="text-blue" href="#">Forgot Password?</a></p>
                                        </div>

                                      
                                    </div>
                                    <button type="submit" class="btn btn-red-cust btn-block mb-4">{{ __('lang.login')}}</button>
                                    {{-- <a href="#" type="submit" class="btn btn-primary btn-block mb-4" >Login</a> --}}

                                    
                                    {{-- <p><a href="{{route('user.registerpage')}}">Register</a></p> --}}
                                    {{-- <p class="sign-upp">Don't have an account yet ?
                                        <a class="text-red" href="#">Sign Up</a>
                                    </p> --}}

                                    <div class="d-flex my-2 justify-content-between">
                                        <div class="d-inline-block mr-3">
                                            
                                        </div>

                                        <p>Don't have an account?<a class="text-red" href="{{route('user.registerpage')}}">SignUp </a></p>
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
    {{-- <script src="{{ asset('assets/js/page/toastr.js') }}"></script> --}}
    <script>
        $(function() {

            $('#login_submit').on('submit', function(e) {
                // alert('hello');
                
                e.preventDefault();
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('user.userlogin') }}",
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
