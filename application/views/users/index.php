
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        List Petugas
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dataUser">
                                <thead>
                                    <tr class="bg-light">
                                        <th> NIK </th>
                                        <th> Nama </th>
                                        <th> Jabatan </th>
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
    
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-group add-petugas" method="POST" action="<?= base_url() ?>services/users/tambah_petugas">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas
                        </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="number" name="nik" placeholder="NIK" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <select class="form-control" name="jabatan" required>
                                <option value="Kepala Kemanan">Kepala Satpam</option>
                                <option value="Staff Keamanan">Staff Satpam</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="password" name="rfid" placeholder="Tap ID Card" class="form-control" required>
                        </div>
                        
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary btn-submit" type="submit">submit</button>
                    </div>    

                </form>
            </div>
        </div>
    </div>
    
<script type="text/javascript">
    var JS = {
        Init: function(){
            $('#dataUser').DataTable({
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
                                columns:[0,1,2,3,4]
                            },
                            message: 'Dicetak pada tanggal <?= date('d/m/Y h:i:s'); ?> melalui aplikasi <?= APP_TITLE ?>'
                        },
                        {
                            text: '<a href="#" data-target="#addUser" class="btn btn-default" data-toggle="modal"><i class="mdi mdi-plus"></i> Tambah Petugas</a>'
                        }
                    ]
                },
              
                ajax      : {
                    url:"<?php echo base_url() ?>services/users/list_petugas",
                    type: "GET"
                },
                select:true,
                columns: [
                    
                    {data: 'nik', class:'text-left'},
                    {data: 'nama_lengkap', class:'text-left'},
                    {data: 'jabatan', class:'text-center'},
                    {data: 'id', class:'text-center', orderable:false, render: function(data,type,row){
                            
                            var btn = '';
                            
                                if (row.nik == '<?= $data_user->nik ?>' || row.jabatan == 'Administrator'){
                                    
                                } else {
                            
                                    btn += '<button class="btn btn-danger block-user btn-sm" data-id="'+row.id+'"><i class="mdi mdi-delete"></i></button>';
                                
                                }
                            
                            return btn;
                    }},
                ] 
            });
            
            $('#dataUser').on('click', '.block-user', function(){
            
                var id = $('.block-user').attr('data-id');

                if (!confirm ("Nonaktifkan User Ini?")){
                    return false;
                }

                $.ajax({
                    type: 'GET',
                    url: '<?= base_url("services/users/block_user") ?>',
                    data: {id: id}
            
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
       
           
    $(".add-petugas").validate({
        rules: {
        },
        messages: {
        },
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                url: $(form).attr('action'),
                type: $(form).attr('method'),     
                beforeSubmit: function () {
                    if (!confirm("Tambah Petugas?")) {
                        return false;
                    }
                    $(".btn-submit").attr('disabled', 'disabled')
                            .text('Processing ...');
                },
                success: function (data) {
                    if (data.status) {
                        $(".btn-reload").trigger('click');
                        $('.form-control').val('');
                        $('#addUser').modal('hide');
                    
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
                    $(".btn-submit").removeAttr('disabled').html('Tambah Petugas');


                }
            });
        }
    });
    
    $(document).ready(function(){
        JS.Init();
    });
</script>