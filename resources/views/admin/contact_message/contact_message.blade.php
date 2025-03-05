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
                    <h1>Contact Message</h1>
                    <p class="breadcrumbs"><span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Contact Message
                    </p>
                </div>
                <div>

                    {{-- <a href="{{ Route('admin.addcontactmessage') }}" class="btn btn-sm btn-primary text-white">Add
                        Message</a> --}}

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="contact_tabel" class="table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            {{-- <th>Phone</th> --}}
                                            <th>Message</th>
                                            <th>Subject</th>

                                            <th>Action</th>
                                            {{-- <th>Publist</th> --}}

                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                         <?php
                                         $new = substr('what is your name? what is your name? what is your name? what is your name? what is your name? what is your name? what is your name? what is your name? what is your name? what is your name? what is your name? what is your name? what is your name? what is your name? what is your name?', 0, 50);
                                         ?>
                                            <td>1</td>
                                            <td>Sumit</td>
                                            <td>Sumit@gmail.com</td>
                                            <td>7860983456</td>
                                            <td style="width:25rem;">{{ $new }}</td>
                                            <td>reply</td>
                                        </tr> --}}
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
        $(function(){

            $('#contact_tabel').dataTable({
                "processing": true,
                pageLength: 10,
                "serverSide": true,
                "bDestroy": true,
                'checkboxes': {
                    'selectRow': true
                },
                "ajax": {
                    url: "{{ route('admin.contactajaxlist') }}",
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
                        "name": "name",
                        'searchable': true,
                        'orderable': false
                    },
                    {
                        "targets": 2,
                        "name": "email",
                        'searchable': false,
                        'orderable': false,
                    },
                    {
                        "targets": 3,
                        "name": "subject",
                        'searchable': false,
                        'orderable': false,
                    },
                    {
                        "targets": 4,
                        "name": "message",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets": 5,
                        "name": "action",
                        'searchable': false,
                        'orderable': false,
                    },
                    // {
                    //     "targets": 5,
                    //     "name": "action",
                    //     'searchable': false,
                    //     'orderable': false
                    // },





                ]
            });


            $('body').on('click', '.deletcontact', function(e) {
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
                                url: "{{ route('admin.deletecontactmessage') }}",
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
                                        $('#contact_tabel').DataTable().ajax.reload();

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
                fd.append('catory_id', id);
                swal({
                        title: `Confirm!`,
                        text: "Sure you want to change user status?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('admin.category.change.status') }}",
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
                                        $('#category').DataTable().ajax.reload();

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
