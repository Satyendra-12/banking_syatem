@extends('admin.layout.app')
@section('extra_css')
    <link href="{{ asset('assets/plugins/data-tables/datatables.bootstrap5.min.css') }}" rel='stylesheet'>
    <link href="{{ asset('assets/plugins/data-tables/responsive.datatables.min.css') }}" rel='stylesheet'>
@endsection
@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1 style="color:#000;">Events Page</h1>
                    <p class="breadcrumbs" style="color:#000;"><span><a href="{{ route('admin.dashboard') }}" style="color:#000;">Dashboard</a></span>
                        <span style="color:#000;"><i class="mdi mdi-chevron-right"></i></span>Events Page
                    </p>
                </div>
                <div>

                    <a href="{{ url('admin/add-articles') }}" class="btn btn-sm btn-primary text-white">Add
                        Events</a>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-Ad card card-default">
                        <div class="card-body">
                            <div class="table-responsive" style="
                            overflow-x: scroll !important;
                        ">
                                <table id="articles" class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Events Name</th>
                                            <th style="color: black;">Start Date</th>
                                            <th style="color: black;">End Date</th>
                                            <th style="color:#000;">Events Image</th>
                                            <th style="color: black;">Description</th>
                                            <th style="color: black;">Location</th>
                                            <th style="color: black;">Organized By</th>
                                            <th style="color: black;">Telphone</th>
                                            <th style="color: black;">Email</th>
                                            <th style="color: black;">Website</th>
                                            <th style="color: black;">Status</th>
                                            <th style="color:#000;">Action</th>
                                            {{-- <th>PubAd</th> --}}

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
@section('extra_js')
    <script src="{{ asset('assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/datatables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/datatables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>

    <script>
        $(function() {

            $('#articles').dataTable({
                "processing": true,
                pageLength: 10,
                "serverSide": true,
                "bDestroy": true,
                'checkboxes': {
                    'selectRow': true
                },
                "ajax": {
                    url: "{{ route('admin.articlesajaxlist') }}",
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
                        'orderable': true
                    },
                    {
                        "targets": 1,
                        "name": "name",
                        'searchable': true,
                        'orderable': true
                    },
                   
                    {
                        "targets": 2,
                        "name": "date",
                        'searchable': true,
                        'orderable': false
                    },
                    {
                        "targets": 3,
                        "name": "enddate",
                        'searchable': true,
                        'orderable': false
                    },
                    {
                        "targets": 4,
                        "name": "image",
                        'searchable': true,
                        'orderable': false
                    },
                    {
                        "targets": 5 ,
                        "name": "description",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets":6 ,
                        "name": "location",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets":7 ,
                        "name": "organized_by",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets":8 ,
                        "name": "telphone",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets": 9,
                        "name": "email",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets": 10,
                        "name": "website",
                        'searchable': false,
                        'orderable': false
                    },
                   
                    {
                        "targets": 11,
                        "name": "status",
                        'searchable': true,
                        'orderable': false
                    },
                    {
                        "targets": 12,
                        "name": "action",
                        'searchable': true,
                        'orderable': false
                    },
                ]
            });


            $('body').on('click', '.delete_articles', function(e) {
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
                                url: "{{ route('admin.deletearticles') }}",
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
                                        $('#articles').DataTable().ajax
                                            .reload();

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

            $('body').on("click", ".changesatus_c", function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                let fd = new FormData()
                fd.append('_token', "{{ csrf_token() }}");
                fd.append('articles_id', id);
                swal({
                        title: `Confirm!`,
                        text: "Sure you want to change events status?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('admin.articles.change.status') }}",
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
                                        $('#articles').DataTable().ajax.reload();

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
@endsection
