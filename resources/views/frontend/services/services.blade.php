@extends('user.layout.app')
@section('extra_css')
    <link href="{{ asset('assets/plugins/data-tables/datatables.bootstrap5.min.css') }}" rel='stylesheet'>
    <link href="{{ asset('assets/plugins/data-tables/responsive.datatables.min.css') }}" rel='stylesheet'>
@endsection
@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Service</h1>
                    <p class="breadcrumbs">
                        
                        <span><i class="mdi mdi-chevron-right"></i></span>Service
                    </p>
                </div>
                <div>

                    <a href="{{ route('user.addservices') }}" class="btn btn-sm btn-primary text-white">Add Service</a>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="service_tabel" class="table brand_table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Service Name</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
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
    <script src="{{ asset('assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/datatables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/datatables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(function() {
            $('#service_tabel').dataTable({
                "processing": true,
                pageLength: 10,
                "serverSide": true,
                "bDestroy": true,
                'checkboxes': {
                    'selectRow': true
                },
                "ajax": {
                    url: "{{ route('user.servicesajaxlist') }}",
                    "type": "POST",
                    "data": function(d) {
                        d._token = "{{ csrf_token() }}";
                    },
                    dataFilter: function(data) {
                        var json = jQuery.parseJSON(data);
                        json.recordsTotal = json.recordsTotal;
                        json.recordsFiltered = json.recordsFiltered;
                        json.data = json.data;
                        return JSON.stringify(json); // return JSON string
                    }
                },
                "order": [
                    [0, 'desc']
                ],
                "columns": [{
                        "targets": 0,
                        "name": "id",
                        'searchable': true,
                        'orderable': true,
                    },
                    {
                        "targets": 1,
                        "name": "title",
                        'searchable': true,
                        'orderable': false
                    },
                    {
                        "targets": 2,
                        "name": "image",
                        'searchable': false,
                        'orderable': false,
                    },
                    {
                        "targets": 3,
                        "name": "desc",
                        'searchable': false,
                        'orderable': false,
                    },
                    {
                        "targets": 4,
                        "name": "status",
                        'searchable': false,
                        'orderable': false,
                    },
                    {
                        "targets": 5,
                        "name": "action",
                        'searchable': false,
                        'orderable': false
                    },
                    // {
                    //     "targets": 5,
                    //     "name": "action",
                    //     'searchable': false,
                    //     'orderable': false,
                    // },
                    // {
                    //     "targets": 5,
                    //     "name": "action",
                    //     'searchable': false,
                    //     'orderable': false
                    // },





                ]
            });

            //delete sweet alert
            $('body').on('click', '.deleteservices', function(e) {
                //alert('hello');

                e.preventDefault();
                var id = $(this).data('id');
                let fd = new FormData();
                fd.append('_token', "{{ csrf_token() }}");
                fd.append('id', id);

                swal({
                        title: `Are you sure you want to delete this row?`,
                        text: "It will gone forevert",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('user.deleteservices') }}",
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
                                        $('#service_tabel').DataTable().ajax.reload();

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
                        }
                    });


            })



            $('body').on("click", ".changeservicesstatus", function(e) {
                // alert('hello');
                e.preventDefault();
                var id = $(this).data('id');
                let fd = new FormData()
                fd.append('_token', "{{ csrf_token() }}");
                fd.append('services_id', id);
                swal({
                        title: `Confirm!`,
                        text: "Sure you want to change Service status?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('user.statusservices') }}",
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
                                        $('#service_tabel').DataTable().ajax.reload();

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
                        }
                    });
            })
        });
    </script>
@endsection
