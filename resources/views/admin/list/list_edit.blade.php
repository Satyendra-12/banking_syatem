@extends('admin.layout.app')
@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Listing</h1>
                    <p class="breadcrumb-item" style="color:black;"><span><a href="{{ route('admin.dashboard') }}" style="color:black;">Dashboard</a></span><span><a
                                href="{{ route('admin.pagepage') }}"><i class="mdi mdi-chevron-right" style="color:black;"> Page List

                                </i>
                            </a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Update List
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
                            <form id="updatelist" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ $edit->id }}">

                


                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Title </label>
                                        <input type="text" class="form-control" name="title" value="{{ $edit->title }}">

                                    </div>
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Description </label>
                                        <input type="text" class="form-control" name="description" value="{{ $edit->description }}">

                                    </div>

                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Category Name</label>
                                        <select name="category_id" id="category" class="form-control">
                                            
                                            {{-- <option value="">Select Category Name</option> --}}
                                            @foreach ($category as $categories)
                                            <option value="{{ $categories->id }}"
                                                {{ $categories->id == $edit->category_id ? 'selected' : '' }}>
                                                {{ $categories->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div id="subcategory">
                                            <label for="Subcategory Name">Subcategory Name</span></label>

                                            <select name="subcategor_id" class="form-control" id="subcategor_id" disabled>
                                                @foreach ($subcategory as $subcategories)
                                                <option value="">select subcategories</option>
                                              <option value="{{ $subcategories->id }}"
                                                    {{ $subcategories->id == $edit->subcategor_id ? 'selected' : '' }}>
                                                    {{ $subcategories->sub_category_name }}</option>
                                            @endforeach

                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-6 form-group" id="location-tab">
                                        <label class="block" for="Location Name">State*</label>
                                        <select
                                            class="form-control"
                                            name="state" id="state_id">
                                            <option value="none">--Select State--</option>
                                            @foreach ($state as $item)
                                                <option value="{{ $edit->states == $item->states ? 'selected' : '' }}">{{ $item->state_title }}</option>
                                            @endforeach
            
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-6" id="districts_data">
            
                                    </div>
            
                                    <div class="form-group col-6" id="city">
            
                                    </div>
                                   
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Pincode </label>
                                        <input type="text" class="form-control" name="pincode" value="{{ $edit->pincode }}">

                                    </div>
                                    <div class="col-6 form-group">
                                        <label for=" Location Name">Address</label>
                                        <input type="text" class="form-control" name="address" value="{{ $edit->address }}">

                                    </div>

                                    {{-- <div class=" col-6 form-group">
                                        <label for=" Location Name">Select Brand</label>
                                        <select class="form-control" name="brand_id">
                                            <option value="">--Select Brand--</option>
                                            @foreach ($brands as $item)
                                                
                                            <option value="{{ $item->id }}">{{ $item->brand_name }}</option>
                                            @endforeach
                                      

                                    </div> --}}
                                    
                                     <div class=" col-6 form-group">
                                        <label for=" Location Name">Page Cover Photo</label>
                                        <input type="file" class="form-control" name="image">

                                    </div>
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1" {{ $edit->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $edit->status == 0 ? 'selected' : '' }}>In-Active</option>
                                        </select>
                                    </div>
                                </div>


                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">Update </button>
                                    <a href="{{ route('admin.pagepage') }}" class="btn btn-primary btn-sm">cancel</a>
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
            $('#state_id').on('change', function(e) {
                var stateId = $(state_id).val();
                 
                let fd = new FormData();
                fd.append('state_id', stateId);
                
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('onchangeselectstate.data') }}",
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
                        var html = '';
                        console.log(result.data);
                        if (result.data.length > 0) {
                            html +=
                                '<label class="block" for="district">District Name</span></label>';
                            html +=
                                '<select name="district" class="w-[200px] px-2 form-control rounded-md border-gray-500 border focus:outline-none get_city_data" id="districts" required>';
                            html +=
                                '<option value="" selected>Select District</option>';
                            $.each(result.data, function(key, value) {
                                html += '<option value="' + value.id + '">' + value
                                    .district_title + '</option>';
                            });
                            html += '</select>';
                        } else {
                            html +=
                                '<label class="block" for="district">District Name</span></label>';
                            html +=
                                '<select name="district" class="district" class="w-[400px] px-2 form-control rounded-md border-gray-500 border focus:outline-none get_city_data" id="districts" required>';
                            html += '<option value="">No data found</option>';
                            html += '</select>';
                        }

                        $('#districts_data').html(html);
                    },
                    error: function(jqXHR, exception) {
                        $('.loader').hide();
                        console.log(jqXHR.responseText);
                    }
                });

            });
            
            $('#updatelist').on('submit', function(e) {
                //   alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.updatelist') }}",
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
            

            // get City
            $(document).on('change', '.get_city_data', function(e) {
                var districtId = $(this).val();
                // alert(districtId);
                let fd = new FormData();
                fd.append('district_id', districtId);
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('onchangeselectdistrict.data') }}",
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
                        var html = '';
                        if (result.data.length > 0) {
                            html +=
                                '<label class="block" for="city">City Name</span></label>';
                            html +=
                                '<select name="city" class="w-[400px] px-2 max-w-full h-12 form-control rounded-md border-gray-500 border focus:outline-none" id="city" required>';
                            html +=
                                '<option value="" selected>Select City</option>';
                            $.each(result.data, function(key, value) {
                                html += '<option value="' + value.id + '">' + value
                                    .name + '</option>';
                            });
                            html += '</select>';
                        } else {
                            html += '<label class="block" for="city">City Name</span></label>';
                            html +=
                                '<select name="city" class="w-[400px] px-2 max-w-full h-12 form-control rounded-md border-gray-500 border focus:outline-none" id="city" required>';
                            html += '<option value="">No data found</option>';
                            html += '</select>';
                        }

                        $('#city').html(html);
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
                    url: "{{ route('admin.modelonchange') }}",
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

        });
    </script>
@endsection
@endsection
