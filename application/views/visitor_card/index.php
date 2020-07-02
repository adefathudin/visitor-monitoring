
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        List Visitor Card
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dataKartu">
                                <thead>
                                    <tr class="bg-light">
                                        <th> Nomor Visitor Card </th>
                                        <th> Status </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="6">No data available</td>                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="modal fade" id="addKartu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-group add-kartu" method="POST" action="<?= base_url() ?>services/visitor_card/tambah_kartu">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Daftar Visitor Card
                        </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="number" name="nomor" placeholder="Input Nomor Kartu" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="password" name="rfid" placeholder="Tap Visitor Card" class="form-control" required>
                        </div>
                        
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary btn-submit" type="submit">Submit</button>
                    </div>    

                </form>
            </div>
        </div>
    </div>
    
<script type="text/javascript">
    var JS = {
        Init: function(){
            $('#dataKartu').DataTable({
                processing: true,
                serverSide: true,
                searching : true,
                ordering  : true,
                order     : [1, "asc"],
                pageLength : 5,
                scrollY   : false,
                sDom: "<'row'<'col-sm-3'l><'col-sm-5'B><'col-sm-4'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
                buttons: {
                    buttons: [ 
                        {
                            text: '<i class="mdi mdi-repeat "></i> Refresh',
                            className:'btn btn-default btn-sm btn-reload',
                            action: function(e, dt, btn, config){
                                dt.ajax.reload( null, false );
                            }
                        },
                        {
                            extend: 'print',
                            text: '<i class=" mdi mdi-cloud-print"></i> Print',
                            className:'btn btn-default btn-sm',
                            title: 'Data Visitor <?= NAME_CORP ?>',
                            exportOptions: {
                                columns:[0,1,2,3]
                            },
                            message: 'Dicetak pada tanggal <?= date('d/m/Y h:i:s'); ?> melalui aplikasi <?= APP_TITLE ?>'
                        },
                        {
                            text: '<a href="#" data-target="#addKartu" class="btn btn-default" data-toggle="modal"><i class="mdi mdi-plus"></i> Daftar Visitor Card</a>'
                        }
                    ]
                },
              
                ajax      : {
                    url:"<?php echo base_url() ?>services/visitor_card/list_visitor_card",
                    type: "GET"
                },
                select:true,
                columns: [
                    
                    {data: 'nomor_visitor_card', class:'text-left'},
                    {data: 'status', class:'text-center', orderable:false, render: function(data,type,row){
                            
                            var btn = '';
                            
                                if (row.status == '1'){
                                    btn += '<i class="mdi mdi-brightness-1 text-success"></i> Online';
                                } else {                            
                                    btn += '<i class="mdi mdi-brightness-1 text-danger"></i> Offline';                             
                                }
                            
                            return btn;
                    }},
                    
                    {data: 'status', class:'text-center', orderable:false, render: function(data,type,row){
                            
                            var btn = '';
                            
                                if (row.status == '1'){
                                    
                                } else {
                            
                                    btn += '<button class="btn btn-danger delete-kartu btn-sm" data-id="'+row.rfid_visitor_card+'"><i class="mdi mdi-delete"></i></button>';
                                
                                }
                            
                            return btn;
                    }},
                ] 
            });
            
            $('#dataKartu').on('click', '.delete-kartu', function(){
            
                var rfid_visitor_card = $('.delete-kartu').attr('data-id');

                if (!confirm ("Hapus Kartu Visitor?")){
                    return false;
                }

                $.ajax({
                    type: 'GET',
                    url: '<?= base_url("services/visitor_card/delete_kartu") ?>',
                    data: {rfid_visitor_card: rfid_visitor_card}
            
                }).then(function (data) {

                    if (data.status) {
                        
                        $(".btn-reload").trigger('click');

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            text: ''+data.message+'',
                            showConfirmButton: false,
                            timer: 1300
                        })
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            text: ''+data.message+'',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                });
                    
            })
        }
       };
       
           
    $(".add-kartu").validate({
        rules: {
        },
        messages: {
        },
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                url: $(form).attr('action'),
                type: $(form).attr('method'),     
                beforeSubmit: function () {
                    if (!confirm("Daftarkan Kartu Visitor?")) {
                        return false;
                    }
                    $(".btn-submit").attr('disabled', 'disabled')
                            .text('Processing ...');
                },
                success: function (data) {
                    if (data.status) {
                        $(".btn-reload").trigger('click');
                        $('.form-control').val('');
                        $('#addKartu').modal('hide');
                    
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            text: '' + data.message + '',
                            showConfirmButton: false,
                            timer: 1300
                        })
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            text: '' + data.message + '',
                            showConfirmButton: false,
                            timer: 1300
                        })
                    }
                    $(".btn-submit").removeAttr('disabled').html('Submit');


                }
            });
        }
    });
    
    $(document).ready(function(){
        JS.Init();
    });
</script>