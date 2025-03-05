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
                    <h1>All Member List</h1>
                    <p class="breadcrumbs mt-3"><span><a href="{{ route('admin.dashboard') }}" style="color:black;">Dashboard</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Other Member List
                    </p>
                </div>
                <div>

                    <a href="{{ route('admin.addmember') }}" class="btn btn-sm btn-primary text-white">Add
                        Member Options</a>

                </div>
            </div>
           
            <div class="row">
                <div class="col-12">
                  
                    <div class="ec-vendor-list card card-default">
                      
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="row" style="padding-bottom: 15px;">
                                    
                                    {{-- <div class="col-md-5"><form action="{{ route('members.import') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file">
                                        <button type="submit" style="
                                        background: rgb(5,73,142);
                                        color: white;
                                        padding: 7px;
                                        border-radius: 5px;
                                    ">Import CSV</button>
                                    </form></div> --}}
                                </div>
                               
                                
                                <table id="register_table" class="table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            
                                            <th>UserName</th>
                                            <th>Overview</th>
                                            <th>Managements</th>
                                            <th>Features</th>
                                            <th>Who's Who</th>
                                            <th>Products & Services</th>
                                            <th>Branches </th>
                                            <th>ATMs</th>
                                            <th>Careers</th>
                                            <th>Offers</th>
                                            <th>Reviews</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($get as $key => $c)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $c->category_name}}</td>
                                <td>
                                    <a href="{{ route('admin.editCategory',$c->id)}}"
                                        class="btn btn-primary btn-sm ">edit</a>
                                    <a href="#" class="btn btn-danger btn-sm " id="delete_categroy" data-id="{{$c->id}}">delete</a>
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
@endsection

@section('extra_js')
    <script src="{{ asset('assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/datatables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/datatables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
   
    
    <script>
        
        $(function() {
            $('#register_table').dataTable({

                "processing": true,
                pageLength: 10,
                "serverSide": true,
                "bDestroy": true,
                'checkboxes': {
                    'selectRow': true
                },
                "ajax": {
                    url: "{{ route('admin.memberajaxlist') }}",
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
                        "name": "username",
                        'searchable': true,
                        'orderable': true
                    },
                    {
                        "targets": 2,
                        "name": "overview ",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets": 3,
                        "name": "management ",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets": 4,
                        "name": "feature ",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets": 5,
                        "name": "who ",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets": 6,
                        "name": "products ",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets": 7,
                        "name": "branch ",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets": 8,
                        "name": "atm",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets": 8,
                        "name": "carrer ",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets": 9,
                        "name": "offer ",
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "targets": 10,
                        "name": "review",
                        'searchable': false,
                        'orderable': false
                    },
                                        {
                        "targets": 11,
                        "name": "action",
                        'searchable': false,
                        'orderable': false
                    },
                    // {
                    //     "targets": 5,
                    //     "name": "description",
                    //     'searchable': false,
                    //     'orderable': false
                    // },
                    // {
                    //     "targets": 6,
                    //     "name": "status",
                    //     'searchable': false,
                    //     'orderable': false
                    // },
                    // {
                    //     "targets": 7,
                    //     "name": "action",
                    //     'searchable': false,
                    //     'orderable': false
                    // },



                ]
            });


            //delete sweet alert

            $('body').on('click', '.delete_member', function(e) {
                //  alert('hello');

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
                                url: "{{ route('admin.deletemember') }}",
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
                                        $('#register_table').DataTable().ajax.reload();

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


            $('body').on("click", ".changeuserregisterstatus", function(e) {
            // alert('hello');
            e.preventDefault();
            var id = $(this).data('id');
            let fd = new FormData()
            fd.append('_token', "{{ csrf_token() }}");
            fd.append('user_id', id);
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
                            url: "{{ route('admin.member.change.status') }}",
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
                                    $('#register_table').DataTable().ajax.reload();

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

        })
    </script>
@endsection
