<!DOCTYPE html>
<html>
<head>
    <title>privacy</title>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div>
                <h1>Privacy&Policy</h1>
                <p class="breadcrumbs"><span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>privacypolicy
                </p>
            </div>
            
            <div class="col-md-6 offset-3 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">privacy-policies</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="privacypolicies" class="table">
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Description</th>
                            </tr>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

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
                    url: "{{ route('admin.contactusajaxlist')   }}",
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
                        "name": "discription",
                        'searchable': false,
                        'orderable': false,
                    },
                    {
                        "targets": 3,
                        "name": "action",
                        'searchable': false,
                        'orderable': false,
                    },
                    {
                        "targets": 4,
                        "name": "action",
                        'searchable': false,
                        'orderable': false,
                    },
                    ]
            });
            
            $('body').on('click', '.deletcontact', function(e) {
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
                                url: "{{ route('contact-us.destroy',"+id+") }}",
                                type: "GET",
                                data: fd,
                                dataType: 'json',
                                processData: false,
                                contentType: false,
                                beforeSend: function() {
                                    $('#login-button').prop('disabled', true);
                                    $('.loader').show();
                                },
                                success: function(result) {
                                    if (result) {
                                        console.log(result);
                                        return false;
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
        });

</script>
@endsection