@extends('admin.layout.app')
@section('extra_css')
<style>
.nav-tabs .nav-item .nav-link.active {
    background: black !important;
    color: white !important;
}
</style>
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1> Change Profile</h1>
                    {{-- <p class="breadcrumb-item mt-3"><span><a
                            href="{{ route('admin.dashboard') }}">Dashboard</a></span><span><a
                            href="{{ route('admin.categoriesPage') }}"><i class="mdi mdi-chevron-right"> Items

                            </i>
                        </a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span> Add Item

                </p> --}}
                </div>

            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="border-bottom: 0px;padding-bottom: 20px;">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Update Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Change Password</button>
                </li>
                
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="ec-vendor-list card card-default">
                                <div class="card-header">
                                    <h1 style="font-size: 20px;">Change Profile </h1>
                                </div>
        
                                <div class="card-body">
                                    <form id="updateprofile">
                                        <div class="row">
        
                                            <div class=" col-6 form-group">
                                                <label for=" Location Name">Logo</label>
                                                <input type="file" class="form-control" name="image">
                                                {{-- <img src="{{ asset(Auth::guard('admin')->user()->image) }}" alt="error" width="150px"
                                                height="100px" class="mt-4"> --}}
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="Name">Name</label>
                                                <input type="hidden" name="id" value="{{ Auth::guard('admin')->user()->id }}">
                                                <input type="text" class="form-control" name="name" placeholder="Enter Name"
                                                    value="{{ Auth::guard('admin')->user()->name }}">
        
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="Email">Email</span></label>
                                                <input type="text" class="form-control" name="email" placeholder="Enter Email"
                                                    value="{{ Auth::guard('admin')->user()->email }}">
                                            </div>
                                            <div class="col-6 form-group">
                                                <div id="subcategory">
                                                    <label for="Subcategory Name">Whatsapp Phone Number</span></label>
                                                    <input type="text" class="form-control" name="phone" value="{{ Auth::guard('admin')->user()->phone }}"
                                                        placeholder="Enter Your Whatsapp Number">
        
        
                                                </div>
        
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="Email">Contact Number</span></label>
                                                <input type="text" class="form-control" name="phone1" placeholder="Enter Phone Number"
                                                    value="{{ Auth::guard('admin')->user()->phone1 }}">
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="Email">Contact Number(Alternative)</span></label>
                                                <input type="text" class="form-control" name="phone2" placeholder="Enter Phone Number"
                                                    value="{{ Auth::guard('admin')->user()->phone2 }}">
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="Email">Office Address</span></label>
                                                <input type="text" class="form-control" name="address" placeholder="Enter Address"
                                                    value="{{ Auth::guard('admin')->user()->address }}">
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
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                </div>
                
              </div>
            

        </div>
    </div>
@endsection

@section('extra_js')
    <script>
        $(function() {

            $('#updateprofile').on('submit', function(e) {
                // alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.changeProfile') }}",
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
            $('#update').on('submit', function(e) {
            // alert('hello');
            e.preventDefault()
            let fd = new FormData(this)
            fd.append('_token', "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('admin.resetpasword') }}",
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
    </script>
@endsection
