
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        
        <div class="row">
            
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card shadow h-90 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs text-uppercase mb-1">Total Visitor</div>
                    </div>
                    <div class="col-auto text-info font-weight-bold total-visitor">0</div>
                  </div>                    
                </div>
              </div>
            </div>            
            
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card shadow h-90 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs text-uppercase mb-1">Karyawan</div>
                    </div>
                    <div class="col-auto  text-info font-weight-bold total-karyawan">0</div>
                  </div>                    
                </div>
              </div>
            </div>
            
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card shadow h-90 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs text-uppercase mb-1">Kontraktor</div>
                    </div>
                    <div class="col-auto  text-info font-weight-bold total-kontraktor">0</div>
                  </div>
                </div>
              </div>
            </div>
 
        </div>
        
        
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card shadow">
                    <div class="card-header text-center font-weight-bold">
                        List Visitor
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dataVisitor">
                                <thead>
                                    <tr class="bg-light">
                                        <th> NIK </th>
                                        <th> Nama </th>
                                        <th> Asal </th>
                                        <th> Status </th>
                                        <th> Keperluan </th>
                                        <th> Masuk </th>
                                        <th> Keluar </th>
                                    </tr>
                                </thead>
                                <tbody class="dataVisitor">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="modal fade" id="detailVisitor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-info">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Laporan
                    </h5>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-border table-responsive">
                        <tr><td>ID Laporan</td><td>:</td><td>'+data.item.id+'</td></tr>
                        <tr><td>Ketogori</td><td>:</td><td>'+data.item.kategori+'</td></tr>
                        <tr><td>Nama Laporan</td><td>:</td><td>'+data.item.nama_laporan+'</td></tr>
                        <tr><td>Deskripsi</td><td>:</td><td>'+data.item.deskripsi+'</td></tr>
                        <tr><td>Lokasi</td><td>:</td><td>'+data.item.lokasi+'</td></tr> 
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-gradient-light" type="button" data-dismiss="modal" aria-label="Close">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
    var JS = {
        Init: function(){
            $('#dataVisitor').DataTable({
                processing: true,
                serverSide: true,
                searching : true,
                ordering  : true,
                order     : [6, "asc"],
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
                                columns:[0,1,2,3,4,5,6]
                            },
                            message: 'Dicetak pada tanggal <?= date('d/m/Y h:i:s'); ?> melalui aplikasi <?= APP_TITLE ?>'
                        }
                    ]
                },
              
                ajax      : {
                    url:"<?php echo base_url() ?>services/dashboard/list_visitor_by_date",
                    type: "GET"
                },
                select:true,
                columns: [
                    
                    {data: 'nik', class:'text-left'},
                    {data: 'nama_lengkap', class:'text-left'},
                    {data: 'nama_perusahaan', class:'text-left', orderable:false, render: function(data,type,row){
                            
                            var icon = '';
                            if (row.status_profesi == 'Karyawan'){
                                icon += '<i class="mdi mdi-account-tie"></i> ' + row.nama_perusahaan;
                            } else {
                                icon += '<i class="mdi mdi-car"></i> ' + row.nama_perusahaan;
                            }
                            return icon;
                    }},
                    {data: 'checkout', class:'text-left', orderable:false, render: function(data,type,row){
                            
                            var status = '';
                            if (row.checkout == '1'){
                                status += '<label class="badge badge-gradient-success"><i class=" mdi mdi-check"></i> Done</label>';
                            } else {
                                status += '<label class="badge badge-gradient-danger"><i class=" mdi mdi-run"></i> PROGRESS</label>';
                            }
                            return status;
                    }},
                    {data: 'tujuan', class:'text-left'},
                    {data: 'jam_in', class:'text-center'},
                    {data: 'jam_out', class:'text-center'}
                ]
            });
        }
       };
    
    $(document).ready(function(){
        JS.Init();
    });
    </script>
    
    <script>
        list_visitor();
            function list_visitor() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>services/dashboard/total_visitors',
                dataType: 'json'
            }).then(function (data) {
                $('.total-visitor').text(data.total_visitor);
                $('.total-karyawan').text(data.total_karyawan);
                $('.total-kontraktor').text(data.total_kontraktor);
            });
        }
        ;
    </script>
    
