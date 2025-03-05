@extends('user.layout.app')

@section('extra_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                <h1>Add List</h1>
                    <p class="breadcrumb-item mt-3" style="color: black;"><span><a
                                href="{{ route('user.dashboard') }}" style="color: black;">Dashboard</a></span><span><a
                                href="{{ route('user.listPage') }}" style="color: black;"><i class="mdi mdi-chevron-right"> Lists

                                </i>
                            </a></span>
                        <span><i class="mdi mdi-chevron-right">Add Lists</i></span>
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header">
                            List Information
                        </div>

                        <div class="card-body">
                            <form id="addlist" enctype="multipart/form-data">
                                <div class="row">                

                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Title </label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Title Name" required>

                                    </div>
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Description </label>
                                        <input type="text" class="form-control" name="description" placeholder="Enter Description">

                                    </div>

                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Category Name</label>
                                        <select name="category_id" id="category" class="form-control" required>
                                            
                                            <option value="">Select Category Name</option>
                                            @foreach ($category as $categories)
                                                <option value="{{ $categories->id }}">{{ $categories->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div id="subcategory">
                                            <label for="Subcategory Name">Subcategory Name</span></label>

                                            <select name="subcategor_id" class="form-control" id="subcategor_id" required>
                                                <option value="">Select Subcategories</option>

                                            </select>
                                        </div>

                                    </div>
                                    {{-- <div class="col-6 form-group" id="location-tab">
                                        <label class="block" for="Location Name">State*</label>
                                        <select
                                            class="form-control"
                                            name="state" id="state_id">
                                            <option value="none">--Select State--</option>
                                            @foreach ($state as $item)
                                                <option value="{{ $item->id }}">{{ $item->state_title }}</option>
                                            @endforeach
            
                                        </select>
                                    </div>
                                    
                                    <div class="col-6 form-group" id="districts_data">
                                        <label class="block" for="district">District Name</span></label>
                                        <select name="district" class="w-[200px] px-2 form-control rounded-md border-gray-500 border focus:outline-none get_city_data" id="districts" required>
                                    </div>
            
                                    <div class="col-6 form-group" id="city">
                                        
                                        <label class="block" for="city">City Name</span></label>
                                        <select name="city" class="w-[200px] px-2 max-w-full h-12 form-control rounded-md border-gray-500 border focus:outline-none" id="city" required>
                                        
                                    </div> --}}
                                   
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Pincode </label>
                                        <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode" required>

                                    </div>
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Enter Address" required>

                                    </div>

                                    {{-- <div class=" col-6 form-group">
                                        <label for=" Location Name">Select Brand</label>
                                        <select class="form-control" name="brand_id">
                                            <option value="">--Select Brand--</option>
                                            @foreach ($brands as $item)
                                                
                                            <option value="{{ $item->id }}">{{ $item->brand_name }}</option>
                                            @endforeach
                                        </select>

                                    </div> --}}
                                    
                                     <div class=" col-6 form-group">
                                        <label for=" Location Name">Page Cover Photo</label>
                                        <input type="file" class="form-control" name="image" required>

                                    </div>

                                    {{-- <div class=" col-6 form-group">
                                        <label for=" Location Name">page Icon <samp><i>(Recommended Size : 200 x
                                                    200 | svg file only)</i></samp></label>
                                        <input type="file" class="form-control" name="page_icon" accept=".svg">
                                    </div> --}}

                                    {{-- <div class=" col-6 form-group">
                                        <label for=" Location Name">Manu Status</label>
                                        <select class="form-control" name="manu_status">
                                            <option value="1">Active</option>
                                            <option value="0">In-Active</option>
                                        </select>
                                    </div> --}}
                                    
                                

                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                    <a href="{{ route('user.listPage') }}" class="btn btn-primary btn-sm">cancel</a>
                                </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('extra_js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script>
        // get District
        // $('#state_id').on('change', function(e) {
        //         var stateId = $(state_id).val();
        //         //  alert(stateId);
        //         let fd = new FormData();
        //         fd.append('state_id', stateId);
        //         fd.append('_token', "{{ csrf_token() }}");
        //         $.ajax({
        //             url: "{{ route('onchangeselectstate.data') }}",
        //             type: "POST",
        //             data: fd,
        //             dataType: 'json',
        //             processData: false,
        //             contentType: false,
        //             beforeSend: function() {
        //                 $('#login-button').prop('disabled', true);
        //                 $('.loader').show();
        //             },
        //             success: function(result) {
        //                 var html = '';
        //                 console.log(result.data);
        //                 if (result.data.length > 0) {
        //                     html +=
        //                         '<label class="block" for="district">District Name</span></label>';
        //                     html +=
        //                         '<select name="district" class="w-[200px] px-2 form-control rounded-md border-gray-500 border focus:outline-none get_city_data" id="districts" required>';
        //                     html +=
        //                         '<option value="" selected>Select District</option>';
        //                     $.each(result.data, function(key, value) {
        //                         html += '<option value="' + value.id + '">' + value
        //                             .district_title + '</option>';
        //                     });
        //                     html += '</select>';
        //                 } else {
        //                     html +=
        //                         '<label class="block" for="district">District Name</span></label>';
        //                     html +=
        //                         '<select name="district" class="district" class="w-[400px] px-2 form-control rounded-md border-gray-500 border focus:outline-none get_city_data" id="districts" required>';
        //                     html += '<option value="">No data found</option>';
        //                     html += '</select>';
        //                 }

        //                 $('#districts_data').html(html);
        //             },
        //             error: function(jqXHR, exception) {
        //                 $('.loader').hide();
        //                 console.log(jqXHR.responseText);
        //             }
        //         });

        //     });

        //     // get City
        //     $(document).on('change', '.get_city_data', function(e) {
        //         var districtId = $(this).val();
        //         // alert(districtId);
        //         let fd = new FormData();
        //         fd.append('district_id', districtId);
        //         fd.append('_token', "{{ csrf_token() }}");
        //         $.ajax({
        //             url: "{{ route('onchangeselectdistrict.data') }}",
        //             type: "POST",
        //             data: fd,
        //             dataType: 'json',
        //             processData: false,
        //             contentType: false,
        //             beforeSend: function() {
        //                 $('#login-button').prop('disabled', true);
        //                 $('.loader').show();
        //             },
        //             success: function(result) {
        //                 var html = '';
        //                 if (result.data.length > 0) {
        //                     html +=
        //                         '<label class="block" for="city">City Name</span></label>';
        //                     html +=
        //                         '<select name="city" class="w-[400px] px-2 max-w-full h-12 form-control rounded-md border-gray-500 border focus:outline-none" id="city" required>';
        //                     html +=
        //                         '<option value="" selected>Select City</option>';
        //                     $.each(result.data, function(key, value) {
        //                         html += '<option value="' + value.id + '">' + value
        //                             .name + '</option>';
        //                     });
        //                     html += '</select>';
        //                 } else {
        //                     html += '<label class="block" for="city">City Name</span></label>';
        //                     html +=
        //                         '<select name="city" class="w-[400px] px-2 max-w-full h-12 form-control rounded-md border-gray-500 border focus:outline-none" id="city" required>';
        //                     html += '<option value="">No data found</option>';
        //                     html += '</select>';
        //                 }

        //                 $('#city').html(html);
        //             },
        //             error: function(jqXHR, exception) {
        //                 $('.loader').hide();
        //                 console.log(jqXHR.responseText);
        //             }
        //         });

        //     });
        
        $(function() {
            $('#addlist').on('submit', function(e) {
                e.preventDefault()
                //  alert('hello');

                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('user.savelist') }}",
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

            $('#category').on('change', function(e) {
                var cat_id = $('#category').val();
                let fd = new FormData();
                fd.append('catid', cat_id);
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('user.modelonchange') }}",
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
                        // if (result.status) {}
                        // console.log('hollo');
                        // console.log(result.data);
                        // } else {
                        // console.log('try again');
                        // }
                        var html = '';
                        if (result.data.length > 0) {

                            // alert(result.data.length);

                            // var i = 1;
                            // console.log(result.data);
                            html +=
                                '<label for="Subcategory Name">{{ __('lang.subcategory_name')}}</span></label>';
                            html +=
                                '<select name="subcategor_id" class="form-control" id="subcategor_id">';
                            html += '<option value="">{{ __('lang.select_subcategories')}}</option>';
                            $.each(result.data, function(key, value) {
                                html += '<option value="' + value.id + '">' + value
                                    .sub_category_name + '</option>';
                            });
                            // console.log(i);
                            html += '</select>';

                        } else {
                            html +=
                                '<label for="Subcategory Name">{{ __('lang.subcategory_name')}}</span></label>';
                            html +=
                                '<select name="subcategor_id" class="form-control" id="subcategor_id">';
                            html += '<option value="">{{ __('lang.no_data_found.')}}</option>';
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

            // select search dropdown with jquery

            // var $disabledResults = $("#brand_id");
            // $disabledResults.select2();

        });
    </script>
@endsection