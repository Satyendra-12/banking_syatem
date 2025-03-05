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
                    <h1 style="color:#000;">Who's Who Profile</h1>
                    <p class="breadcrumbs" style="color:#000;"><span><a href="{{ route('admin.dashboard') }}" style="color:#000;">Dashboard</a></span>
                        <span style="color:#000;"><i class="mdi mdi-chevron-right"></i></span>Who's Who Profile
                    </p>
                </div>
                <div>

                    <a href="{{ url('admin/add-who') }}" class="btn btn-sm btn-primary text-white">Add
                        Profile</a>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="who" class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th style="color: black;">Image</th>
                                            <th style="color: black;">Designation</th>
                                            <th style="color: black;">Bank/Comapny Name</th>
                                            <th style="color: black;">Address</th>
                                            <th style="color: black;">Position</th>
                                            <th style="color:#000;">Status</th>
                                            {{-- <th style="color: black;">Manu Status</th> --}}
                                            <th style="color:#000;">Action</th>
                                            {{-- <th>Publist</th> --}}

                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($get as $key => $c)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $c->category_name }}</td>
                                                <td>
                                                    <img src="{{ url('/') . '/storage/app/public/' . $c->category_icon }}"
                                                        alt="logo" width="40px" height="40px">
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.editCategory', $c->id) }}"
                                                        class="btn btn-primary btn-sm ">edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm " id="delete_categroy"
                                                        data-id="{{ $c->id }}">delete</a>
                                                </td>

                                            </tr>
                                        @endforeach --}}
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

            $('#who').dataTable({
                "processing": true,
                pageLength: 10,
                "serverSide": true,
                "bDestroy": true,
                'checkboxes': {
                    'selectRow': true
                },
                "ajax": {
                    url: "{{ route('admin.whoajaxlist') }}",
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
                        "targets":2 ,
                        "name": "image",
                        'searchable': true,
                        'orderable': true
                    },
                    {
                        "targets": 3,
                        "name": "position",
                        'searchable': true,
                        'orderable': true
                    },
                    {
                        "targets":4 ,
                        "name": "roll",
                        'searchable': true,
                        'orderable': true
                    },
                    {
                        "targets":5 ,
                        "name": "address",
                        'searchable': true,
                        'orderable': true
                    },
                    {
                        "targets":6 ,
                        "name": "pos",
                        'searchable': true,
                        'orderable': true
                    },
                    {
                        "targets": 7,
                        "name": "status",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets": 8,
                        "name": "action",
                        'searchable': false,
                        'orderable': false
                    },
                ]
            });


            $('body').on('click', '.delete_who', function(e) {
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
                                url: "{{ route('admin.deletewho') }}",
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
                                        $('#category').DataTable().ajax
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
                fd.append('who_id', id);
                swal({
                        title: `Confirm!`,
                        text: "Sure you want to change Profile status?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('admin.who.change.status') }}",
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
                                        $('#who').DataTable().ajax.reload();

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
