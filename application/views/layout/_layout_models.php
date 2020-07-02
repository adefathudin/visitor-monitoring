<div class="modal fade" id="modalCheckoutVisitor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-info">
                <h5 class="modal-title" id="exampleModalLabel">Form Checkout Pengunjung
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="frmCheckoutVisitor" method="GET" action="<?php echo base_url('services/visitors/checkout_visitor') ?>">
                <div class="modal-body">
                    <input type="hidden" name="visitor_card" class="card" value="">
                    <table class="table table-striped table-border table-responsive tblDetailVisitor">
                    
                         
                    </table>
                </div>
                <div class="modal-footer">
                    <div class="form-group text-right"> 
                        <button type="submit" class="btn-save-checkout-visitor btn btn-primary mb-2">Checkout</button>
                    </div>
                </div> 
            </form>     
        </div>
    </div>
</div>


<div class="modal fade" id="modalCheckinVisitor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-info">
                <h5 class="modal-title" id="exampleModalLabel">Form Checkin Pengunjung
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="frmCheckinVisitor" method="GET" action="<?php echo base_url('services/visitors/checkin_visitor') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id_card" class="card" value="">
                    <input type="hidden" name="status_profesi" class="statusProfesi" value="">
                    <input type="hidden" name="nama_perusahaan" class="namaPerusahaan" value="">
                    <table class="table table-striped table-border table-responsive tblDetailVisitorCheckin">
                    
                         
                    </table>
                </div>
                <div class="modal-footer">
                    <div class="form-group text-right"> 
                        <button type="submit" class="btn-save-checkin-visitor btn btn-primary mb-2">Checkin</button>
                    </div>
                </div> 
            </form>     
        </div>
    </div>
</div>


<div class="modal fade" id="modalAddVisitor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-info">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Identitas Pengunjung
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="frmAddVisitor" method="POST" action="<?php echo base_url('services/visitors/daftar_visitor') ?>">
                <input type="hidden" name="card" class="card" class="form-control" value="">
                <div class="modal-body">
                    <div class="form-group mx-sm-3 mb-2">
                        <div class="form-group">
                            <select class="form-control" name="status_profesi">
                                <option value="Karyawan">Karyawan</option>
                                <option value="Kontraktor">Kontraktor</option>
                            </select>            
                        </div>
                        <div class="form-group">
                            <input type="number" name="nik" class="form-control" placeholder="NIK">    
                        </div>
                        <div class="form-group">
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">    
                        </div>
                        <div class="form-group">
                            <input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan">    
                        </div>                       
                        <div class="form-group">
                            <input type="text" name="nomor_telepon" class="form-control" placeholder="Nomor Telepon">    
                        </div>                        
                        <div class="form-group">
                            <input type="text" name="keperluan" class="form-control" placeholder="Keperluan">    
                        </div>                       
                        <div class="form-group">
                            <input type="password" name="visitor_card" class="form-control visitor-card" placeholder="Tap visitor card">    
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group text-right"> 
                        <button type="submit" class="btn-save-daftar-visitor btn btn-primary mb-2"><i class="mdi mdi-content-save"></i> Simpan</button>
                    </div>
                </div> 
            </form>     
        </div>
    </div>
</div>

<script>
    $("#frmAddVisitor").validate({
        rules: {
        },
        messages: {
        },
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                url: $(form).attr('action'),
                type: $(form).attr('method'),
                beforeSubmit: function () {
                    if (!confirm("Simpan data?")) {
                        return false;
                    }
                    $(".btn-save-daftar-visitor").attr('disabled', 'disabled')
                            .text('Processing ...');
                },
                success: function (data) {
                    if (data.status) {
                        $(".btn-reload").trigger('click');
                        $('.form-control').val('');
                        $('#modalAddVisitor').modal('hide');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            text: '' + data.message + '',
                            showConfirmButton: false,
                            timer: 1300
                        })
                    } else {
                        $('.visitor-card').val('');
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            text: '' + data.message + '',
                            showConfirmButton: false,
                            timer: 1300
                        })
                    }
                    $(".btn-save-daftar-visitor").removeAttr('disabled').html('<i class="fa fa-flag"></i> Simpan');


                }
            });
        }
    });
    
    $("#frmCheckoutVisitor").validate({
        rules: {
        },
        messages: {
        },
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                url: $(form).attr('action'),
                type: $(form).attr('method'),     
                beforeSubmit: function () {
                    if (!confirm("Checkout visitor?")) {
                        return false;
                    }
                    $(".btn-save-checkout-visitor").attr('disabled', 'disabled')
                            .text('Processing ...');
                },
                success: function (data) {
                    if (data.status) {
                        $(".btn-reload").trigger('click');
                        $('.form-control').val('');
                        $('#modalCheckoutVisitor').modal('hide');
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
                    $(".btn-save-checkout-visitor").removeAttr('disabled').html('checkout');


                }
            });
        }
    });
    
    $("#frmCheckinVisitor").validate({
        rules: {
        },
        messages: {
        },
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                url: $(form).attr('action'),
                type: $(form).attr('method'),     
                beforeSubmit: function () {
                    if (!confirm("Checkin visitor?")) {
                        return false;
                    }
                    $(".btn-save-checkin-visitor").attr('disabled', 'disabled')
                            .text('Processing ...');
                },
                success: function (data) {
                    if (data.status) {
                        $(".btn-reload").trigger('click');
                        $('.form-control').val('');
                        $('#modalCheckinVisitor').modal('hide');
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
                    $(".btn-save-checkin-visitor").removeAttr('disabled').html('checkin');


                }
            });
        }
    });
</script>

<script>
    $(".check-card").validate({
        rules: {
        },
        messages: {
        },
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                url: $(form).attr('action'),
                type: $(form).attr('method'),
                beforeSubmit: function () {
                    $(".btn-check-card").attr('disabled', 'disabled')
                            .text('Processing ...');
                },
                success: function (data) {
                    if (data.ada == 'id_card'){
                        $(".btn-reload").trigger('click');
                       Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            text: 'ID Card terdaftar. Silahkan Tap Visitor Card untuk melakukan checkout',
                            showConfirmButton: false,
                            timer: 2300
                        }) 
                    } else if(data.ada == 'visitor_card') {
                        
                        $('#modalCheckoutVisitor').modal('show');
                        detail_visitor_checkout();
                        
                    } else if (data.ada == 'eksist_visitor'){
                        
                        $('#modalCheckinVisitor').modal('show');  
                        detail_visitor_checkin();
                        
                    } else if (data.ada == false){
                        
                        $('#modalAddVisitor').modal('show');  
                        
                        
                    } else if (data.ada == 'null'){
                        
                        Swal.fire(
                            'Harap tap id card!',
                            'error'
                        )
                        
                    } else if (!data.status){
                        
                        Swal.fire(
                            data.message,
                            'error'
                        )
                        
                    } else {
                        
                    }
                    $(".btn-check-card").removeAttr('disabled').html('<i class="mdi mdi-account-search"></i>');
                    
                    $('.card').val($('#tap_card').val());
                    $('#tap_card').focus();
                }

            });
        }
    });    
    
    function detail_visitor_checkout() {
        var card = $('#tap_card').val();
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>services/visitors/detail_visitor_checkout',
            dataType: 'json',
            data: {card:card}
        }).then(function (data) {
            if (data.status) {
                
                $(".btn-reload").trigger('click');
                
                var i = 0;
                var html = '';
                
                for (i = 0; i < data.item.length; i++) {
                    html +=  
                            '<input type="hidden" name="id_visitor" value="'+data.item[i].id_history+'">' +
                            '<tr><td>NIK</td><td>:</td><td>'+data.item[i].nik+'</td></tr> '+
                            '<tr><td>Nama Lengkap</td><td>:</td><td>'+data.item[i].nama_lengkap+'</td></tr> '+
                            '<tr><td>Jenis Profesi</td><td>:</td><td>'+data.item[i].status_profesi+'</td></tr> '+
                            '<tr><td>Asal Perusahaan</td><td>:</td><td>'+data.item[i].nama_perusahaan+'</td></tr> '+
                            '<tr><td>Nomor Telepon</td><td>:</td><td>'+data.item[i].nomor_telepon+'</td></tr>  '+
                            '<tr><td>Keperluan</td><td>:</td><td>'+data.item[i].tujuan+'</td></tr>  '+
                            '<tr><td>Tanggal Masuk</td><td>:</td><td>'+data.item[i].tanggal_in+'</td></tr>  '+
                            '<tr><td>Jam</td><td>:</td><td>'+data.item[i].jam_in+'</td></tr>  '+
                            '<tr><td>Tap ID Card</td><td>:</td><td><input type="password" name="id_card" class="form-control" palceholder="Tap ID Card"></td></tr> ';
                }

                $('.tblDetailVisitor').html(html);
            } else {
                
            }
        });
    };    
    
    function detail_visitor_checkin() {
        var id_card = $('#tap_card').val();
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>services/visitors/detail_visitor_checkin',
            dataType: 'json',
            data: {id_card:id_card}
        }).then(function (data) {
            if (data.status) {
                
                $(".btn-reload").trigger('click');
                
                var i = 0;
                var html = '';
                
                for (i = 0; i < data.item.length; i++) {
                    html +=  
                            '<input type="hidden" name="id_visitor" value="'+data.item[i].id+'">' +
                            '<tr><td>NIK</td><td>:</td><td>'+data.item[i].nik+'</td></tr> '+
                            '<tr><td>Nama Lengkap</td><td>:</td><td>'+data.item[i].nama_lengkap+'</td></tr> '+
                            '<tr><td>Jenis Profesi</td><td>:</td><td>'+data.item[i].status_profesi+'</td></tr> '+
                            '<tr><td>Asal Perusahaan</td><td>:</td><td>'+data.item[i].nama_perusahaan+'</td></tr> '+
                            '<tr><td>Nomor Telepon</td><td>:</td><td>'+data.item[i].nomor_telepon+'</td></tr>  '+
                            '<tr><td>Keperluan</td><td>:</td><td><textarea name="keperluan" class="form-control"></textarea></td></tr>  '+
                            '<tr><td>Tap Visitor Card</td><td>:</td><td><input type="text" name="visitor_card" class="form-control" palceholder="Tap Visitor Card"></td></tr> ';
                            $('.statusProfesi').val(data.item[i].status_profesi);
                            $('.namaPerusahaan').val(data.item[i].nama_perusahaan);
                }

                $('.tblDetailVisitorCheckin').html(html);
                
            } else {
                
            }
        });
    };
</script>
