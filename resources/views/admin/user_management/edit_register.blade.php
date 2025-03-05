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
 .hidden {
            display: none;
        }

    </style>
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Bank </h1>
                    <p class="breadcrumb-item mt-3" style="color:black;"><span><a href="{{ route('admin.dashboard') }}"
                                style="color:black;">Dashboard</a></span><span><a
                                href="{{ route('admin.registeruser') }}"><i class="mdi mdi-chevron-right"
                                    style="color:black;"> Bank

                                </i>
                            </a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span> Edit Bank Details
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header">
                            Bank Information
                        </div>

                        <div class="card-body">
                            <form id="update_register">
                                <div class="row">

                                    {{-- <div class=" col-6 form-group"> --}}
                                    {{-- <label for="orga">Organizations</label> --}}
                                    <input type="hidden" name="id" value="{{ $registeredit->id }}">

                                    {{-- <select id="orga" name="organization" class="form-control" required>
                                          <option value="">Select the Organization Name</option>
                                          
                                          <option {{($registeredit->organization) == "Banking Company" ? 'selected' : '' }} value="Banking Company">Banking Company</option>
                                          <option {{($registeredit->organization) == "Audit Firm" ? 'selected' : ''}} value="Audit Firm">Audit Firm</option>
                                          <option {{($registeredit->organization) == "Insurance Company" ? 'selected' : ''}} value="Insurance Company">Insurance Company</option>
                                          <option {{($registeredit->organization) == "Financial Services" ? 'selected' : ''}} value="Financial Services">Financial Services</option>
                                          <option {{($registeredit->organization) == "Support Services" ? 'selected' : ''}} value="Support Services">Support Services</option>
                                          <option {{($registeredit->organization) == "Other Services" ? 'selected' : ''}} value="Other Services">Other Services</option>
                                        </select>
                                    </div> --}}
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Bank Name</label>

                                        <input type="text" class="form-control" name="username"
                                            placeholder="Enter Company Name" value="{{ $registeredit->username }}">

                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="Location Name">Bank Logo <span><i>(Recommended Size : 100 x 90) Max
                                                    Size (10MB)</i></span></label>
                                        <input type="file" class="form-control" name="contact_person">
                                        <img src="{{ asset($registeredit->contact_person) }}" alt="error" width="100px"
                                            height="90px" class="mt-4">
                                    </div>



                                    <div class="col-6 form-group">
                                        <label for="Email">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter Email"
                                            value="{{ $registeredit->email }}">


                                    </div>




                                    <div class=" col-6 form-group">
                                        <label for="Phone">Contact Number</label>
                                        <input type="text" class="form-control" name="phone"
                                            placeholder="Enter Phone Number" value="{{ $registeredit->phone_number }}">

                                    </div>


                                    <div class="col-6 form-group">
                                        <label for="first-dropdown">Category Name</label>
                                        <select name="category_id" class="form-control" id="first-dropdown">
                                            <option value="">Select Category</option>
                                            <option value="1" {{ $registeredit->category_id == '1' ? 'selected' : '' }}>Financial Institutions</option>
                                            <option value="3" {{ $registeredit->category_id == '3' ? 'selected' : '' }}>Support Services</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-6 form-group" id="second-dropdown-wrapper">
                                        <label for="second-dropdown">Services Name</label>
                                        <select name="service_id" class="form-control" id="second-dropdown">
                                            <option value="">Select Service</option>
                                            <option value="1" {{ $registeredit->service_id == '1' ? 'selected' : '' }}>Banking & Financial Institutions</option>
                                            <option value="2" {{ $registeredit->service_id == '2' ? 'selected' : '' }}>Ancillary and Support Services</option>
                                        </select>
                                    </div>
                                    
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>
                                        $(document).ready(function() {
                                            // Initially hide the "Services Name" select dropdown
                                            $('#second-dropdown-wrapper').hide();
                                    
                                            // When the "Category Name" select dropdown value changes
                                            $('#first-dropdown').change(function() {
                                                // If the selected value is "Support Services"
                                                if ($(this).val() == '3') {
                                                    // Hide the "Services Name" select dropdown
                                                    $('#second-dropdown-wrapper').hide();
                                                    // Reset its value
                                                    $('#second-dropdown').val('');
                                                } else {
                                                    // Otherwise, show the "Services Name" select dropdown
                                                    $('#second-dropdown-wrapper').show();
                                                }
                                            });
                                        });
                                    </script>

                                    <div class="col-6 form-group">
                                        <div id="subcategory">
                                            <label for="Subcategory Name">Subcategory Name</span></label>

                                            <select name="subcategor_id" class="form-control" id="subcategor_id"
                                                value="{{ $registeredit->subcategor_id }}">
                                                <option value="">Select Subcategory</option>
                                                @foreach ($subcategory as $subcategories)
                                                <option value="{{ $subcategories->id }}"
                                                    {{ $subcategories->id == $registeredit->subcategor_id ? 'selected' : '' }}>
                                                    {{ $subcategories->sub_category_name }}</option>
                                            @endforeach

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
                                        <input type="radio" id="option1" name="member" value="1"
                                            {{ $registeredit->member == '1' ? 'checked' : '' }} style="
                                            margin-right: 45px;
                                        ">

                                        <label for="option2">No</label>
                                        <input type="radio" id="option2" name="member" value="0"
                                            {{ $registeredit->member == '0' ? 'checked' : '' }}>


                                    </div>



                                    
                                  

<div class=" col-6 form-group">
                                        <label for=" Address ">Short Description</label>
                                        <textarea type="text" class="form-control" name="address"
                                             placeholder="Enter Short Description">{{ $registeredit->address }}</textarea>

                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary" style="color: white !important;">Update</button>
                                        {{-- <a href="{{ route('admin.packagepage') }}" class="btn btn-primary btn-sm">cancel</a> --}}
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

            $('#update_register').on('submit', function(e) {
                // alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.updateregisteruser') }}",
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
{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
       $('.summernote').summernote({
           height: 50
       });
   });
</script> --}}
@endsection
