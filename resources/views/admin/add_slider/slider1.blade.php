@extends('admin.layout.app')
@section('extra_css')
    <link href="{{ asset('assets/plugins/data-tables/datatables.bootstrap5.min.css') }}" rel='stylesheet'>
    <link href="{{ asset('assets/plugins/data-tables/responsive.datatables.min.css') }}" rel='stylesheet'>
@endsection
@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Slider</h1>
                    <p class="breadcrumbs">
                        <span><a href="{{ route('admin.dashboard') }}" style="color:black;"
                                style="color:black;">Dashboard</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Slider
                    </p>
                </div>
                <div>

                    <a href="{{ route('admin.addslider') }}" class="btn btn-sm btn-primary text-white">Add Slider</a>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="slider_tabel" class="table brand_table">
                                    <thead>
                                        <tr>
                                            <th style="color:black;">No</th>
                                            {{-- <th style="color:black;">Slider Name</th> --}}
                                            <th style="color:black;">Image</th>
                                            {{-- <th style="color:black;">Status</th> --}}
                                            <th style="color:black;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('extra_js')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/datatables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/datatables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '{{ route('admin.sliderajaxlist') }}',
                type: 'GET',
                success: function(response) {

                    response.forEach(function(item) {

                        $("#slider_tabel tbody").append('<tr>\
                                    <td>' + item.id + '</td>"\
                                    <td><img src="http://localhost/bahraia_bank/public/'+ item.image +'" style="width:10%"></td>\
                            </tr>');

                               
                        $("#slider_tabel tbody").append(tr_str);
                    
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
    @endsection

    {{-- <script>
    alert('hello');
        $(document).ready(function(){ 
                "<td align='left'>    '<a href="' . route('admin.editSlider', $item->id) . '" class="h5 p-0 pl-2  edit_prduct"><i class="mdi mdi-account-edit"></i></a>
         <a href="javascript:void(0)" class="h5 p-0 pl-2 deleteslider" data-id = "' . $item->id . '"  ><i class="mdi mdi-delete"></i></a>',</td>" +
        $('#slider_tabel').onload(function() {
                    // alert('hello');
                    // AJAX GET request
                    $.ajax({
                        url: '{{ route('admin.sliderajaxlist') }}',
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {

                            createRows(response);
                            // console.log($response);

                        }
                    });

                    function createRows(response) {
                        var len = 0;
                        $('#slider_tabel tbody').empty(); // Empty <tbody>
                        if (response['data'] != null) {
                            len = response['data'].length;
                        }

                        if (len > 0) {
                            for (var i = 0; i < len; i++) {
                                var id = response['data'][i].id;
                                var image = response['data'][i].image;

                                var tr_str = "<tr>" +
                                    "<td align='center'>" + (i + 1) + "</td>" +
                                    "<td align='center'>" + image + "</td>" +
                                    "</tr>";

                                $("#slider_tabel tbody").append(tr_str);
                            }
                        } else {
                            var tr_str = "<tr>" +
                                "<td align='center' colspan='4'>No record found.</td>" +
                                "</tr>";

                            $("#slider_tabel tbody").append(tr_str);
                        }

            });
        });
            
    </script>
@endsection --}}
