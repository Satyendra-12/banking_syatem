@extends('admin.layout.app')
@section('extra_css')
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Edit Plans</h1>
                    <p class="breadcrumb-item mt-3"><span><a
                                href="{{ route('admin.dashboard') }}" style="color:black;">Dashboard</a></span><span><a
                                href="{{ route('admin.planspage') }}"><i class="mdi mdi-chevron-right" style="color:black;">Plans

                                </i>
                            </a></span>
                        {{-- <span><i class="mdi mdi-chevron-right"></i></span> Add Price --}}
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header">
                            Edit Plans
                        </div>

                        <div class="card-body">
                            <form id="editplans">
                                <div class="row">


                                    <div class=" col-6 form-group">
                                        <label for=" Price Name">Month</label>
                                        <input type="hidden" name="id" value="{{$editplans->id}}">
                                        <input type="number" class="form-control" name="month" placeholder="Enter Month"
                                            min="1" max="12" value="{{$editplans->months}}">


                                    </div>
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Price</label>
                                        <input type="text" class="form-control" name="price" placeholder="Enter price" value="{{$editplans->price}}">

                                    </div>





                                </div>
                                <div class="row">
                                    {{-- <div class="col-6">
                                    <label for=" Location Name">Post count
                                    </label>
                                    <input type="text" class="form-control" name="post_count">


                                </div>  --}}
                                    {{-- <div class=" col-6 form-group">
                                    <label for=" Location Name">duration</label>
                                    <select name="duration" id="duration_id" class="form-control">
                                        <option value="">Select Duration</option>
                                        <option value="1">1 Month</option>
                                        <option value="3">3 Month</option>
                                        <option value="6">6 Month</option>
                                        <option value="12">12 Month</option>
                                    </select>
                                    <input type="text" class="form-control" name="select_package">

                                </div> --}}
                                </div>

                                {{-- <div class="row">
                                <div class="col-6">
                                    <label for=" Location Name">Package In App Purchases Product ID
                                    </label>
                                    <input type="text" class="form-control" name="package_in_app_purchases_product_id">


                                </div>
                                <div class=" col-6 form-group">
                                    <label for=" Location Name">Package In App Purchases Type
                                    </label>
                                    <input type="text" class="form-control" name="package_in_app_purchases_type">

                                </div>
                            </div> --}}


                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
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
            
            $('#editplans').on('submit', function(e) {
                // alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.updateplans') }}",
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
    </script>
@endsection
