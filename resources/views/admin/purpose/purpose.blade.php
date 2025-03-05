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
                    <h1 style="color:#000;">Purpose</h1>
                    <p class="breadcrumbs" style="color:#000;"><span><a href="{{ route('admin.dashboard') }}" style="color:#000;">Dashboard</a></span>
                        <span style="color:#000;"><i class="mdi mdi-chevron-right"></i></span>Purpose
                    </p>
                </div>
                <div>

                    <a href="{{ url('admin/add-purpose') }}" class="btn btn-sm btn-primary text-white">Add
                        Purpose</a>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="purpose" class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Purpose Name</th>
                                            {{-- <th style="color: black;">Manu Status</th> --}}
                                            <th style="color:#000;">Action</th>
                                            {{-- <th>Publist</th> --}}

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

            $('#purpose').dataTable({
                "processing": true,
                pageLength: 10,
                "serverSide": true,
                "bDestroy": true,
                'checkboxes': {
                    'selectRow': true
                },
                "ajax": {
                    url: "{{ route('admin.purposeajaxlist') }}",
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
                        "name": "action",
                        'searchable': false,
                        'orderable': false
                    },
                ]
            });


            $('body').on('click', '.delete_purpose', function(e) {
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
                                url: "{{ route('admin.deletepurpose') }}",
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
                                        $('#purpose').DataTable().ajax
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

            // $('body').on("click", ".changesatus_c", function(e) {
            //     e.preventDefault();
            //     var id = $(this).data('id');
            //     let fd = new FormData()
            //     fd.append('_token', "{{ csrf_token() }}");
            //     fd.append('purpose_id', id);
            //     swal({
            //             title: `Confirm!`,
            //             text: "Sure you want to change purpose status?",
            //             icon: "warning",
            //             buttons: true,
            //             dangerMode: true,
            //         })
            //         .then((willDelete) => {
            //             if (willDelete) {
            //                 $.ajax({
            //                     url: "{{ route('admin.purpose.change.status') }}",
            //                     type: "POST",
            //                     data: fd,
            //                     dataType: 'json',
            //                     processData: false,
            //                     contentType: false,
            //                     beforeSend: function() {
            //                         $('#login-button').prop('disabled', true);
            //                         $('.loader').show();
            //                     },
            //                     success: function(result) {
            //                         if (result.status) {
            //                             iziToast.success({
            //                                 title: '',
            //                                 message: result.msg,
            //                                 position: 'topRight'
            //                             });
            //                             $('#purpose').DataTable().ajax.reload();

            //                         } else {
            //                             iziToast.error({
            //                                 title: '',
            //                                 message: result.msg,
            //                                 position: 'topRight'
            //                             });
            //                         }
            //                     },
            //                     complete: function() {
            //                         $('.loader').hide();
            //                     },
            //                     error: function(jqXHR, exception) {
            //                         $('.loader').hide();
            //                         console.log(jqXHR.responseText);
            //                     }
            //                 });
            //             }
            //         });
            // })

            


        });
    </script>
@endsection
@endsection
