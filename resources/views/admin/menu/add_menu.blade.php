@extends('admin.layout.app')

@section('extra_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Menu</h1>
                    <p class="breadcrumb-item mt-3" style="color: black;"><span><a
                                href="{{ route('admin.dashboard') }}" style="color: black;">Dashboard</a></span><span><a
                                href="{{ route('admin.menupage') }}" style="color: black;"><i class="mdi mdi-chevron-right"> Menu

                                </i>
                            </a></span>
                        <span><i class="mdi mdi-chevron-right">Add Menu</i></span>
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-header">
                            Menu Information
                        </div>

                        <div class="card-body">
                            <form id="addmenu" enctype="multipart/form-data">
                                <div class="row">                                    

                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Menu Name </label>
                                        <input type="text" class="form-control" name="menu_name" placeholder="Enter Menu Name">

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
                                    
                                    {{-- <div class=" col-6 form-group">
                                        <label for=" Location Name">menu Cover Photo <span><i>(Recommended Size : 400 x
                                                    200)</i></span></label>
                                        <input type="file" class="form-control" name="menu_cover">

                                    </div> --}}

                                    {{-- <div class=" col-6 form-group">
                                        <label for=" Location Name">menu Icon <samp><i>(Recommended Size : 200 x
                                                    200 | svg file only)</i></samp></label>
                                        <input type="file" class="form-control" name="menu_icon" accept=".svg">
                                    </div> --}}

                                    {{-- <div class=" col-6 form-group">
                                        <label for=" Location Name">Manu Status</label>
                                        <select class="form-control" name="manu_status">
                                            <option value="1">Active</option>
                                            <option value="0">In-Active</option>
                                        </select>
                                    </div> --}}
                                    <div class=" col-6 form-group">
                                        <label for=" Location Name">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">In-Active</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                    <a href="{{ route('admin.menupage') }}" class="btn btn-primary btn-sm">cancel</a>
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
        $(function() {
            $('#addmenu').on('submit', function(e) {
                e.preventDefault()
                //  alert('hello');

                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.savemenu') }}",
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

            // select search dropdown with jquery

            // var $disabledResults = $("#brand_id");
            // $disabledResults.select2();

        });
    </script>
@endsection