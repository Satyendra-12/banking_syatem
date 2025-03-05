<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="UP Hello - Admin Dashboard HTML Template.">

    <title>{{ __('lang.up_hello_-_admin_dashboard_html_template.')}}</title>

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
    <link href="{{ asset('assets/img/favicon.png') }}" rel="shortcut icon" />

    <style>
        .bg-red {
            background-color:#f14435;
        }

        .text-red {
            color: #f14435;
        }
        .text-red:hover {
            color: #c53225;
        }
        .btn-red-cust {
            background-color: #f14435;
            color: #ffffff;
        }
        .btn-red-cust:hover {
            background-color: #c53225;
            color: #ffffff;
        }
    </style>
</head>

<body class="sign-inup" id="body">
    <div class="container d-flex align-items-center justify-content-center form-height-login pt-24px pb-24px">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10">
                <div class="card">
                    <div class="card-header bg-red">
                        <div class="ec-brand">
                            <a href="#" title="OLX" style="height: 100px; ">
                                {{-- <h1 class="text-white ">UP Hello</h1> --}}
                                <img class="ec-brand-icon" src="{{ asset('assets/img/logo/hello.jpg') }}" alt="logo" style="border-radius: 50%;"  />
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <h4 class="text-dark mb-5" style="font-weight:600; font-size:30px;">{{ __('lang.forget_password')}}</h4>

                        <form id="login_forgetpassword">

                            <div class="row">
                                <div class="form-group col-12 mb-4">
                                    <label for="email">{{ __('lang.email')}}</label>
                                    <input type="email" class="form-control" name="email" placeholder="{{ __('lang.enter_email')}}">
                                </div>

                                <div class="form-group col-md-12 ">
                                    {{-- <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder=" Enter Password"> --}}
                                </div>

                                <div class="col-md-12">
                                   
                                    <button type="submit" class="btn btn-red-cust btn-block mb-4">{{ __('lang.submit')}}</button>
                                  

                                    
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

             $('#login_forgetpassword').on('submit', function(e) {
                // alert('hello');
                
                e.preventDefault();
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('user.forgetpasswords') }}",
                    type: "POST",
                    data: fd,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('#login-button').prop('disabled', true);
                        $('.loader').show();
                    },
                    success: function(result){
                        console.log(result.location)
                        if (result.status) {
                            iziToast.success({
                              title: '',
                              message: result.msg,
                              position: 'topRight'
                            });
                            setTimeout(function() {
                                window.location.href = result.location;
                            }, 500);
                            // +result.user_id
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




</body>

</html>
