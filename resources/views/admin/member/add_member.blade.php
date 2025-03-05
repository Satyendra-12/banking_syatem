@extends('admin.layout.app')
@section('extra_css')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* -webkit-appearance: none; */
            margin: 0;
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
                    <h1>Member Options Informations</h1>
                    <p class="breadcrumb-item mt-3" style="color:black;"><span><a href="{{ route('admin.dashboard') }}"
                                style="color:black;">Dashboard</a></span><span><a
                                href="{{ route('admin.registeruser') }}"><i class="mdi mdi-chevron-right"
                                    style="color:black;"> Member Otions

                                </i>
                            </a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span> Add Member Options
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
                                            <label for="member">Choose a Member:</label>
                                            <select name="user_id" class="form-control" id="user_id">
                                            <option value="">Select Member</option>
                                            @foreach ($member as $item)
                                                <option value="{{ $item->id }}">{{ $item->username }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                        <div class="col-6 form-group"style="padding-top: 32px;" >
                                            <div class="col"> <input type="checkbox" id="managements" name="managements" value="1">
                                                <label for="Managements" style="">Managements</label>
                                                </div>
                                            <div class="col"> <input type="checkbox" id="features" name="features" value="1">
                                                <label for="Features" style=""> Features</label>
                                                </div>
                                            <div class="col"> <input type="checkbox" id="who" name="who" value="1">
                                                <label for="Who" style=""> Who's Who</label>
                                                </div>
                                            <div class="col"> <input type="checkbox" id="products" name="products" value="1">
                                                <label for="Products" style=""> Products & Services</label>
                                                </div>
                                            <div class="col"> <input type="checkbox" id="branches" name="branches" value="1">
                                                <label for="Branches" style=""> Branches</label>
                                                </div>
                                                <div class="col"> <input type="checkbox" id="atm" name="atm" value="1">
                                                    <label for="Branches" style=""> ATMs</label>
                                                    </div>
                                            <div class="col"> <input type="checkbox" id="careers" name="careers" value="1">
                                                <label for="Careers" style=""> Careers</label>
                                                </div>
                                            <div class="col"> <input type="checkbox" id="offers" name="offers" value="1">
                                                <label for="Offers" style="">Offers</label>
                                                </div>
                                            <div class="col"> <input type="checkbox" id="reviews" name="reviews" value="1">
                                                <label for="Reviews" style=""> Reviews</label>
                                               </div>
                                


                                        </div>
                                    </div>




                                       


                                    <div>
                                        <button type="submit" class="btn btn-primary btn-sm mt-4">Create</button>
                                        {{-- <a href="{{ route('admin.packagepage') }}" class="btn btn-primary btn-sm">cancel</a> --}}
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

    
    <script>
        $(function() {


            $('#addregisteruser').on('submit', function(e) {
                e.preventDefault()
                //  alert('hello');

                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.savemember') }}",
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
                    var ser_id = $('#service-dropdown').val(); // 'this' refers to the dropdown that triggered the event
              

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
   
@endsection
