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
                    <h1 style="color:#000;">Menu</h1>
                    <p class="breadcrumbs" style="color:#000;"><span><a href="{{ route('admin.dashboard') }}" style="color:#000;">Dashboard</a></span>
                        <span style="color:#000;"><i class="mdi mdi-chevron-right"></i></span>Menu
                    </p>
                </div>
                <div>

                    <a href="{{ url('admin/add-menu') }}" class="btn btn-sm btn-primary text-white">Add
                        Menu</a>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="menu" class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Menu Name</th>
                                            {{-- <th style="color: black;">Image</th> --}}
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
                                                <td>{{ $c->Menu_name }}</td>
                                                <td>
                                                    <img src="{{ url('/') . '/storage/app/public/' . $c->Menu_icon }}"
                                                        alt="logo" width="40px" height="40px">
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.editMenu', $c->id) }}"
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

            $('#menu').dataTable({
                "processing": true,
                pageLength: 10,
                "serverSide": true,
                "bDestroy": true,
                'checkboxes': {
                    'selectRow': true
                },
                "ajax": {
                    url: "{{ route('admin.menuajaxlist') }}",
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
                        "name": "menu_name",
                        'searchable': true,
                        'orderable': true
                    },
                   
                    {
                        "targets": 2,
                        "name": "status",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets": 3,
                        "name": "action",
                        'searchable': false,
                        'orderable': false
                    },
                ]
            });


            $('body').on('click', '.delete_menu', function(e) {
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
                                url: "{{ route('admin.deletemenu') }}",
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
                                        $('#menu').DataTable().ajax
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
                fd.append('menu_id', id);
                swal({
                        title: `Confirm!`,
                        text: "Sure you want to change Menu status?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('admin.menu.change.status') }}",
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
                                        $('#menu').DataTable().ajax.reload();

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
