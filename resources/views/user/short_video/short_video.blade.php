@extends('user.layout.app')
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
                    <h1>{{ __('lang.short')}}</h1>
                    <p class="breadcrumbs"><span><a href="{{ route('user.dashbord') }}">{{ __('lang.dashboard')}}</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>{{ __('lang.short')}}
                    </p>
                </div>
                <div>

                    <a href="{{ Route('user.addshortvideo') }}" class="btn btn-sm btn-primary text-white">
                        {{ __('lang.add_short')}}</a>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="short_tabel" class="table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('lang.s.no')}}</th>
                                            <th>{{ __('lang.title')}}</th>
                                            <th>{{ __('lang.video')}}</th>
                                            {{-- <th>Banner</th> --}}
                                            <th>{{ __("lang.status")}}</th>
                                            <th>{{ __('lang.action')}}</th>
                                            {{-- <th>Publist</th> --}}

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
     <!-- Modal -->
     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog" >
         <div class="modal-content" style="background-color: transparent; border:none;">
             <div class="modal-header" style="border-bottom:none;">
                 {{-- <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5> --}}
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body" style="height: 90vh; margin: auto;">
                 <video controls id="video1" style="width: 100%;height:100%;"></video>
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
            //  alert('hello');
            $('#short_tabel').dataTable({
                "processing": true,
                pageLength: 10,
                "serverSide": true,
                "bDestroy": true,
                'checkboxes': {
                    'selectRow': true
                },
                "ajax": {
                    url: "{{ route('user.shortajaxlist') }}",
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
                        "name": "video",
                        'searchable': false,
                        'orderable': false,
                    },
                    {
                        "targets": 3,
                        "name": "status",
                        'searchable': false,
                        'orderable': false,
                    },
                    {
                        "targets": 4,
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

            // delete sweet alert
            $('body').on('click', '.deleteshort', function(e) {
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
                                url: "{{ route('user.userdelete') }}",
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
                                        $('#short_tabel').DataTable().ajax.reload();

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


        $('body').on("click", ".changeshortvideo", function(e) {
            // alert('hello');
            e.preventDefault();
            var id = $(this).data('id');
            let fd = new FormData()
            fd.append('_token', "{{ csrf_token() }}");
            fd.append('shortvideo_id', id);
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
                            url: "{{ route('user.shortstatuschange') }}",
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
                                    $('#short_tabel').DataTable().ajax.reload();

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
    </script>

<script>
    function modalCall(id) {
        var staticBackdrop = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
            keyboard: false
        });
        console.log(id);
        document.getElementById("video1").innerHTML = '<source src="'+id+'" type="video/mp4">';
        staticBackdrop.show();
    }
</script>
@endsection


