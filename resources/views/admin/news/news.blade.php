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
                    <h1 style="color:#000;">Articles & Features Lists</h1>
                    <p class="breadcrumbs" style="color:#000;"><span><a href="{{ route('admin.dashboard') }}" style="color:#000;">Dashboard</a></span>
                        <span style="color:#000;"><i class="mdi mdi-chevron-right"></i></span>  Articles & Features Lists                  <h1 style="color:#000;"></h1>

                    </p>
                </div>
                <div>

                    <a href="{{ url('admin/add-news') }}" class="btn btn-sm btn-primary text-white">Add
                        Articles & Features </a>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-Ad card card-default">
                        <div class="card-body">
                            <div class="table-responsive" style="
                            overflow-x: scroll !important;
                            ">
                                <table id="news" class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th> Name</th>
                                            {{-- <th style="color: black;">Start Date</th> --}}
                                            {{-- <th style="color: black;">End Date</th> --}}
                                            <th style="color:#000;">Image</th>
                                            <th style="color: black;">Description</th>
                                            {{-- <th style="color: black;">Location</th> --}}
                                            {{-- <th style="color: black;">Organized By</th> --}}
                                            {{-- <th style="color: black;">Telphone</th> --}}
                                            {{-- <th style="color: black;">Email</th> --}}
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

            $('#news').dataTable({
                "processing": true,
                pageLength: 10,
                "serverSide": true,
                "bDestroy": true,
                'checkboxes': {
                    'selectRow': true
                },
                "ajax": {
                    url: "{{ route('admin.newsajaxlist') }}",
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
                        "name": "image",
                        'searchable': true,
                        'orderable': false
                    },
                    {
                        "targets": 3 ,
                        "name": "description",
                        'searchable': false,
                        'orderable': false
                    },
                 
                    {
                        "targets": 4,
                        "name": "website",
                        'searchable': false,
                        'orderable': false
                    },
                   
                    {
                        "targets": 5,
                        "name": "status",
                        'searchable': true,
                        'orderable': false
                    },
                    {
                        "targets": 6,
                        "name": "action",
                        'searchable': true,
                        'orderable': false
                    },
                ]
            });


            $('body').on('click', '.delete_news', function(e) {
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
                                url: "{{ route('admin.deletenews') }}",
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
                fd.append('news_id', id);
                swal({
                        title: `Confirm!`,
                        text: "Sure you want to change articles & features status?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('admin.news.change.status') }}",
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
                                        $('#news').DataTable().ajax.reload();

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
