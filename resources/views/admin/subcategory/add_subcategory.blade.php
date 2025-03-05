@extends('admin.layout.app')
@section('extra_css')
    <style>
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
                    <h1>Sub-categories</h1>
                    <p class="breadcrumb-item" style="color:black;"><span><a href="{{ route('admin.dashboard') }}"
                                style="color:black;">Dashboard</a></span><span><a href="{{ route('admin.subCategory') }}"><i
                                    class="mdi mdi-chevron-right" style="color:black;"> Sub-categories

                                </i>
                            </a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Add sub Category
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header">
                            Subcategory Information
                        </div>

                        <div class="card-body">
                            <form id="addsubcategoriy" enctype="multipart/form-data">
                                <div class="row">
                                    <div class=" col-6 form-group">
                                        <label for="first-dropdown">Category Name</label>
                                        <select name="category_id" class="form-control" id="first-dropdown">
                                            <option value="">Select Category</option>
                                            <option value="1">Financial Services</option>
                                            <option value="3">Support Services</option>
                                            {{-- <option value="3">Support Services</option> --}}

                                        </select>

                                    </div>

                                    <div class="col-6 form-group hidden" id="second-dropdown-container">
                                        <label for="second-dropdown">Services Name</label>
                                        <select name="service_id" class="form-control" id="second-dropdown">
                                            <option value="">Select Services</option>
                                            <option value="1">Banking & Financial Services</option>
                                            <option value="2">Ancillary and Support Services</option>
                                            {{-- <option value="3">Support Services</option> --}}
                                        </select>
                                    </div>


                                    {{-- <div class=" col-6 form-group">
                                        <label for=" Location Name">Category Name</label>
                                        <select name="category_id" class="form-control" id="category_id">
                                            <option value="">Select Category</option>
                                            <option value="1">Banking & Financial Services</option>
                                            <option value="2">Ancillary and Support Services</option>
                                            <option value="3">Support Services</option>
                                           
                                        </select>

                                    </div> --}}
                                    {{-- <div class=" col-6 form-group">
                                        <label for=" Location Name"> Image </label>
                                        <input type="file" class="form-control" name="image">

                                    </div> --}}







                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">SubCategory Name <p></p></label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Enter Sub-Category">

                                    </div>
                                    {{-- 
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Icon </label>
                                        <input type="file" class="form-control" name="icon" accept=".svg"><span><i>(Recommended Size : 400 x
                                            200 | svg file only)</i></span>

                                    </div> --}}
                                </div>


                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">Create</button>
                                    {{-- <a href="{{ route('admin.subCategory') }}" class="btn btn-primary btn-sm">cancel</a> --}}
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@section('extra_js')
    <script>
        $(function() {

            $('#addsubcategoriy').on('submit', function(e) {
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.savesubcategory') }}",
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
        })
        // $('#first-dropdown').on('change', function(e) {
        //     // alert('hello');
        //     var selectBox = document.getElementById("first-dropdown");
        //     var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        //     var secondDropdown = document.getElementById("second-dropdown");

        //     if (selectedValue === "1") {
        //         secondDropdown.classList.remove("hidden");
        //     } else {
        //         secondDropdown.classList.add("hidden");
        //     }



            $('#first-dropdown').on('change', function(e) {
                var selectBox = document.getElementById("first-dropdown");
                var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                var secondDropdownContainer = document.getElementById("second-dropdown-container");
                var secondDropdown = document.getElementById("second-dropdown");

                if (selectedValue === "1") {
                    secondDropdownContainer.classList.remove("hidden");
                    secondDropdown.setAttribute("required", "required");
                } else {
                    secondDropdownContainer.classList.add("hidden");
                    secondDropdown.removeAttribute("required");
                }
            });



        
    </script>
@endsection
@endsection
