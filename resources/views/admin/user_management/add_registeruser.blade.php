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
 .note-editor{
    z-index: 0;
}

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
    <style>
        i {
            /* color:white !important;
             */
            /* background: white !important; */
        }
    </style>
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Member Informations</h1>
                    <p class="breadcrumb-item mt-3" style="color:black;"><span><a href="{{ route('admin.dashboard') }}"
                                style="color:black;">Dashboard</a></span><span><a
                                href="{{ route('admin.registeruser') }}"><i class="mdi mdi-chevron-right"
                                    style="color:black !important;"> Member

                                </i>
                            </a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span> Add Member
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header">
                            Member Information
                        </div>

                        <div class="card-body">
                            <form id="addregisteruser">
                                <div class="row">
                                    <div class="row">


                                        {{-- <div class=" col-6 form-group">
                                            <label for="orga">Organizations</label>
    
                                            <select id="orga" name="organization" class="form-control" required>
                                              <option value="">Select the Organization Name</option>
                                              <option value="Banking Company">Banking Company</option>
                                              <option value="Audit Firm">Audit Firm</option>
                                              <option value="Insurance Company">Insurance Company</option>
                                              <option value="Financial Services">Financial Services</option>
                                              <option value="Financial Services">Support Services</option>
                                              <option value="Other Services">Other Services</option>
                                            </select>
    
                                        </div> --}}

                                        <div class="col-6 form-group">
                                            <label for="Email">Bank Name</label>
                                            <input type="text" class="form-control" name="company_name"
                                                placeholder="Enter Company Name">


                                        </div>





                                        <div class=" col-6 form-group">
                                            <label for=" Address ">Bank Logo</label>
                                            <input type="file" class="form-control" name="contact_person"
                                                placeholder="Enter Contact Person">

                                        </div>
                                        <div class=" col-6 form-group">
                                            <label for="Phone">Contact No.</label>
                                            <input type="text" class="form-control" name="phone"
                                                placeholder="Enter Phone Number">

                                        </div>


                                        <div class="col-6">
                                            <label for=" Password ">Contact Email</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter Email">


                                        </div>
                                        <div class=" col-6 form-group">
                                            <label for="first-dropdown">Category Name</label>
                                            <select name="category_id" class="form-control" id="first-dropdown">
                                                <option value="">Select Category</option>
                                                <option value="1">Financial Institutions</option>
                                                <option value="3">Support Services</option>
                                                {{-- <option value="3">Support Services</option> --}}

                                            </select>

                                        </div>

                                        <div class=" col-6 form-group" class="hidden" id="second-dropdown">
                                            <label for="second-dropdown">Services Name</label>
                                            <select name="service_id" class="form-control" id="service-dropdown">
                                                <option value="">Select Service</option>
                                                <option value="1">Banking & Financial Institutions</option>
                                                <option value="2">Ancillary and Support Services</option>
                                                {{-- <option value="3">Support Services</option> --}}

                                            </select>

                                        </div>
                                        <script>document.getElementById('first-dropdown').addEventListener('change', function () {
    var secondDropdown = document.getElementById('second-dropdown');
    var serviceDiv = document.getElementById('second-dropdown');
    
    if (this.value == 3) { // Change to the value of "Support Services"
        serviceDiv.style.visibility = 'hidden'; // Hide the Services Name div
    } else {
        serviceDiv.style.visibility = 'visible'; // Show the Services Name div
    }
});
</script>

                                        <div class="col-6 form-group">
                                            <div id="subcategory">
                                                <label for="Subcategory Name">Subcategory Name</span></label>

                                                <select name="subcategor_id" class="form-control" id="subcategor_id">
                                                    <option value="">Select Subcategory</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <div
                                                style="
                                        color: black;
                                        padding-bottom: 15px;
                                    ">
                                                Featured Member</div>
                                            <label for="option1">Yes</label>
                                            <input type="radio" id="option1" name="member" value="1">

                                            <label for="option2">No</label>
                                            <input type="radio" id="option2" name="member" value="0">


                                        </div>


                                        <div class="col-6"  style="
                                        position: relative;
                                    ">
                                            <label for="password ">Password</label>
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="Enter password" class="input-field">
                                            <i class="eye-icon fa fa-eye" onclick="togglePassword()"></i>


                                        </div>


                                        <div class=" col-6 form-group"
                                          >
                                            <label for=" Address ">Short Description</label>
                                            <textarea type="text" class="form-control" name="address" placeholder="Enter Short Description"></textarea>

                                        </div>
                                        <style>
                                            .eye-icon {
                                                position: absolute;
                                                right: 30px;
                                                transform: translateY(-50%);
                                                cursor: pointer;
                                                color: black !important;
                                                top: 50px;
                                            }

                                            /* Style the input field */
                                            .input-field {
                                                padding-right: 30px;
                                                /* Adjust this value according to the eye icon width */
                                            }
                                        </style>
                                      
                                        {{-- <div class=" col-6 form-group">
                                    <label for=" Location Name"> Short Description
                                    </label>
                                    <input type="text" class="form-control" name="short_description">
                                    <textarea name="short_description" id="" class="form-control" cols="10" rows="5"></textarea>

                                </div> --}}
                                    </div>


                                    <div>
                                        <button type="submit" class="btn btn-primary btn-sm mt-4" style="color:white !important;">Create</button>
                                        {{-- <a href="{{ route('admin.packagepage') }}" class="btn btn-primary btn-sm">cancel</a> --}}
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
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>

    <script>
        $(function() {


            $('#addregisteruser').on('submit', function(e) {
                e.preventDefault()
                //  alert('hello');

                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.storeregisteruser') }}",
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


            $('#first-dropdown').on('change', function(e) {
                // alert('hello');
                var selectBox = document.getElementById("first-dropdown");
                var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                var secondDropdown = document.getElementById("second-dropdown");

                if (selectedValue === "1") {
                    secondDropdown.classList.remove("hidden");
                } else {
                    secondDropdown.classList.add("hidden");
                }


                var cat_id = $('#first-dropdown').val();
                let fd = new FormData();
                fd.append('catid', cat_id);
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.categoryonchange') }}",
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
                        console.log(result.data);

                        var html = '';
                        if (result.data.length > 0) {
                            html +=
                                '<label for="Subcategory Name">Subcategory Name</span></label>';
                            html +=
                                '<select name="subcategor_id" class="form-control" id="subcategor_id">';
                            html += '<option value="">Select Subcategory</option>';
                            $.each(result.data, function(key, value) {
                                html += '<option value="' + value.id + '">' + value
                                    .sub_category_name + '</option>';
                            });
                            html += '</select>';

                        } else {
                            html +=
                                '<label for="Subcategory Name">Subcategory Name</span></label>';
                            html +=
                                '<select name="subcategor_id" class="form-control" id="subcategor_id">';
                            html += '<option value="">No data found.</option>';
                            html += '</select>';
                        }

                        $('#subcategory').html(html);
                    },
                    error: function(jqXHR, exception) {
                        $('.loader').hide();
                        console.log(jqXHR.responseText);
                    }
                });
            });

            $('#service-dropdown').on('change', function(e) {
                // alert('hello');
                var ser_id = $('#service-dropdown')
                    .val(); // 'this' refers to the dropdown that triggered the event


                let fd = new FormData();
                fd.append('serid', ser_id);
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.serviceonchange') }}",
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
                        console.log(result.data);

                        var html = '';
                        if (result.data.length > 0) {
                            html +=
                                '<label for="Subcategory Name">Subcategory Name</span></label>';
                            html +=
                                '<select name="subcategor_id" class="form-control" id="subcategor_id">';
                            html += '<option value="">Select Subcategory</option>';
                            $.each(result.data, function(key, value) {
                                html += '<option value="' + value.id +
                                    '">' + value
                                    .sub_category_name + '</option>';
                            });
                            html += '</select>';

                        } else {
                            html +=
                                '<label for="Subcategory Name">Subcategory Name</span></label>';
                            html +=
                                '<select name="subcategor_id" class="form-control" id="subcategor_id">';
                            html += '<option value="">No data found.</option>';
                            html += '</select>';
                        }

                        $('#subcategory').html(html);
                    },
                    error: function(jqXHR, exception) {
                        $('.loader').hide();
                        console.log(jqXHR.responseText);
                    }
                });

            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 150
            });
        });
    </script>
@endsection
