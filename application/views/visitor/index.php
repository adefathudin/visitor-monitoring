
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        List Visitors
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dataUser">
                                <thead>
                                    <tr class="bg-light">
                                        <th> NIK </th>
                                        <th> Nama </th>
                                        <th> Profesi </th>
                                        <th> Perusahaan </th>
                                        <th> Nomor Telepon </th>
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
                        }
                    ]
                },
              
                ajax      : {
                    url:"<?php echo base_url() ?>services/visitors/list_users",
                    type: "GET"
                },
                select:true,
                columns: [
                    
                    {data: 'nik', class:'text-left'},
                    {data: 'nama_lengkap', class:'text-left'},
                    {data: 'status_profesi', class:'text-center'},
                    {data: 'nama_perusahaan', class:'text-left'},
                    {data: 'nomor_telepon', class:'text-center'},
                    {data: 'id', class:'text-center', orderable:false, render: function(data,type,row){
                            
                            var btn = '';
                            
                                btn += '<button class="btn btn-danger block-user btn-sm" data-rfid="'+row.id_card+'" data-id="'+row.id+'"><i class="mdi mdi-account-off"></i></button>';
                            
                            return btn;
                    }},
                ] 
            });
            
            $('#dataUser').on('click', '.block-user', function(){
            
                var id_visitor = $('.block-user').attr('data-id');
                var id_card = $('.block-user').attr('data-rfid');

                if (!confirm ("Block User Ini?")){
                    return false;
                }

                $.ajax({
                    type: 'GET',
                    url: '<?= base_url("services/visitors/block_user") ?>',
                    data: {id_visitor: id_visitor, id_card: id_card}
            
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
    
    $(document).ready(function(){
        JS.Init();
    });
</script>