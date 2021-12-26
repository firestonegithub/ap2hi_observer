

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><?php echo $page_name ; ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo base_url()."administrator/" ?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url()."trip/form4/".$kode_trip; ?>"><?php echo $page_name ; ?></a></li>
                                    <li class="active"><?php echo $page_name_detail ; ?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


 <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-header">
                                <strong class="card-title">Add Data <?php echo $page_name_detail; ?></strong>
                              
                            </div>


                            <div class="card-body">

                                
                                <?php 
                                 $attributes = array('class'=>'form-horizontal','role'=>'form');
                                    echo form_open_multipart('trip/form4_update/'.$kode_trip."/".$seq,$attributes); 
                                ?>

            <div class="row">

              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>



                       <tr>
                            <th width='120px' scope='row'>kode trip</th>   
                            <td><input type='text' class='form-control' name='kode_trip' value="<?php echo $kode_trip; ?>" readonly></td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>seq</th>   
                            <td><input type='text' class='form-control' name='seq' value="<?php echo $seq; ?>" readonly></td>
                      </tr>


                       
                      <tr>
                            <th width='120px' scope='row'>no_angkut (*)</th>   
                            <td><input type='number' class='form-control' name='no_angkut' value="<?php if( !empty($post['no_angkut']) ){ echo $post['no_angkut']; } ?>" autocomplete=off></td>
                       </tr>

                      <!--
                      <tr>
                            <th width='120px' scope='row'>hari</th>   
                            <td><input type='number' class='form-control' name='hari' value="<?php if( !empty($post['hari']) ){ echo $post['hari']; } ?>" autocomplete=off></td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>bulan</th>   
                            <td><input type='text' class='form-control' name='bulan' value="<?php if( !empty($post['bulan']) ){ echo $post['bulan']; } ?>" autocomplete=off></td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>tahun</th>   
                            <td><input type='number' class='form-control' name='tahun' value="<?php if( !empty($post['tahun']) ){ echo $post['tahun']; } ?>" autocomplete=off></td>
                       </tr>
                     -->

                      <tr>
                            <th width='120px' scope='row'>tanggal Mulai (*)</th>   
                            <td><input type='text' class='form-control' name='tanggal' id="tanggal" value="<?php if( !empty($post['tanggal']) ){ echo $post['tanggal']; } ?>" autocomplete=off readonly></td>
                       </tr>

                       <tr>
                            <th width='120px' scope='row'>tanggal Selesai (*)</th>   
                            <td><input type='text' class='form-control' name='tanggal2' id="tanggal2" value="<?php if( !empty($post['tanggal2']) ){ echo $post['tanggal2']; } ?>" autocomplete=off readonly></td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>waktu_mulai (contoh: 11:45 AM)</th>   
                            <td>

                                 <input type='time' class='form-control' name='waktu_mulai' value="<?php if( !empty($post['waktu_mulai']) ){ echo $post['waktu_mulai']; } ?>" autocomplete=off min="0" max ="23" placeholder="jam">

                                <!-- <div class="row">
                                  <div class='col-md-6'>
                                        <input type='number' class='form-control' name='jam_mulai' value="<?php if( !empty($post['jam_mulai']) ){ echo $post['jam_mulai']; } ?>" autocomplete=off min="0" max ="23" placeholder="jam">
                                  </div>

                                  <div class='col-md-6'>
                                        <input type='number' class='form-control' name='menit_mulai' value="<?php if( !empty($post['menit_mulai']) ){ echo $post['menit_mulai']; } ?>" autocomplete=off min="0" max ="59" placeholder="menit">
                                  </div>

                              </div>-->

                            </td>
                       </tr>

                   

                      <tr>
                            <th width='120px' scope='row'>waktu_selesai (*) (contoh: 11:45 AM)</th>   
                            <td>

                                  <input type='time' class='form-control' name='waktu_selesai' value="<?php if( !empty($post['waktu_selesai']) ){ echo $post['waktu_selesai']; } ?>" autocomplete=off min="0" max ="23" placeholder="jam">
                                <!-- <div class="row">
                                  <div class='col-md-6'>
                                         <input type='number' class='form-control' name='jam_selesai' value="<?php  if( !empty($post['jam_selesai']) ){ echo $post['jam_selesai']; } ?>" autocomplete=off min="0" max ="23" placeholder="jam">
                                   </div>

                                  <div class='col-md-6'>
                                        <input type='number' class='form-control' name='menit_selesai' value="<?php if( !empty($post['menit_selesai']) ){ echo $post['menit_selesai']; } ?>" autocomplete=off min="0" max ="59" placeholder="menit">
                                  </div>

                              </div>-->

                            </td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>asal_umpan</th>   
                            <td>
                             <!-- <input type='text' class='form-control' name='asal_umpan' value="<?php if( !empty($post['asal_umpan']) ){ echo $post['asal_umpan']; } ?>" autocomplete=off>-->
                                <select class='form-control' name='asal_umpan' id="asal_umpan">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Beli" <?php if( !empty($post['asal_umpan']) ){ if($post['asal_umpan'] == "Beli"){ echo 'selected';  } } ?>>Beli</option>
                                    <option value="Budidaya" <?php if( !empty($post['asal_umpan']) ){ if($post['asal_umpan'] == "Budidaya"){ echo 'selected';  } } ?>>Budidaya</option>
                                    <option value="Tangkap" <?php if( !empty($post['asal_umpan']) ){ if($post['asal_umpan'] == "Tangkap"){ echo 'selected';  } } ?>>Tangkap</option>
                                </select>
                            </td>
                       </tr>

                       <tr>
                            <th width='120px' scope='row'>sample_ember_no</th>   
                            <td><input type='number' class='form-control' name='sample_ember_no' value="<?php if( !empty($post['sample_ember_no']) ){ echo $post['sample_ember_no']; } ?>" autocomplete=off></td>
                       </tr>


                   </tbody>
                  </table>
              </div>


               <div class='col-md-5'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>


                    


                      <tr>
                            <th width='120px' scope='row'>lintang (*)</th>   
                            <td>
                              <!--<input type='text' class='form-control' name='lintang' value="<?php if( !empty($post['lintang']) ){ echo $post['lintang']; } ?>">-->
                                 <div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='lintang_degree' value="<?php echo $post['lintang_degree']; ?>" placeholder="Degree" required autocomplete=off>
                                    </div>
                                     <div class='col-md-4'>
                                        <input type='number' class='form-control' name='lintang_minutes'  value="<?php echo $post['lintang_minutes']; ?>" placeholder="Minutes" required autocomplete=off min="0" max="60" step=".01">
                                    </div>
                                     <div class='col-md-4'>
                                        <select class='form-control' name='lintang_us' id="lintang_us">
                                            <option value="U" <?php if( !empty($post['lintang_us']) ){ if($post['lintang_us'] == "U"){ echo 'selected';  } } ?> >Utara</option>
                                            <option value="S" <?php if( !empty($post['lintang_us']) ){ if($post['lintang_us'] == "S"){ echo 'selected';  } } ?> > Selatan</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>bujur (*)</th>   
                            <td>
                              <!--<input type='text' class='form-control' name='bujur' value="<?php if( !empty($post['bujur']) ){ echo $post['bujur']; } ?>">-->
                              <div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='bujur_degree' value="<?php echo $post['bujur_degree']; ?>"  placeholder="Degree" required autocomplete=off>
                                    </div>
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='bujur_minutes' value="<?php echo $post['bujur_minutes']; ?>" placeholder="Minutes" required autocomplete=off min="0" max="60" step=".01">
                                    </div>
                                    <div class='col-md-4'>
                                       <select class='form-control' name='bujur_us' id="bujur_us">
                                            <option value="T" <?php if( !empty($post['bujur_us']) ){ if($post['bujur_us'] == "T"){ echo 'selected';  } } ?> > Timur</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>harga_umpan</th>   
                            <td><input type='text' class='form-control' name='harga_umpan' id="harga_umpan" onkeyup="textAddCommas()" value="<?php if( !empty($post['harga_umpan']) ){ echo $post['harga_umpan']; } ?>" autocomplete=off></td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>jumlah_ember_diangkut (*)</th>   
                            <td><input type='text' class='form-control' name='jumlah_ember_diangkut' id="jumlah_ember_diangkut" onkeyup="textAddCommas()" value="<?php if( !empty($post['jumlah_ember_diangkut']) ){ echo $post['jumlah_ember_diangkut']; } ?>" autocomplete=off></td>
                      </tr>

                      <tr>
                            <th width='120px' scope='row'>berat_ember_sample_umpan_kosong (*) (Kg)</th>   
                            <td><input type='text' class='form-control' name='berat_ember_sample_umpan_kosong' id="berat_ember_sample_umpan_kosong" onkeyup="textAddCommas()" value="<?php if( !empty($post['berat_ember_sample_umpan_kosong']) ){ echo $post['berat_ember_sample_umpan_kosong']; } ?>" autocomplete=off step=".01"></td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>berat_tupper_umpan_kosong (*) (G)</th>   
                            <td><input type='text' class='form-control' name='berat_tupper_umpan_kosong' id="berat_tupper_umpan_kosong" onkeyup="textAddCommas()" value="<?php if( !empty($post['berat_tupper_umpan_kosong']) ){ echo $post['berat_tupper_umpan_kosong']; } ?>" autocomplete=off step=".01"></td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>rasio_ember_umpan_kapal (*)</th>   
                            <td><input type='number' class='form-control' name='rasio_ember_umpan_kapal' value="1" readonly autocomplete=off></td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>rasio_ember_umpan_sampel</th>   
                            <td><input type='number' class='form-control' name='rasio_ember_umpan_sampel' value="<?php if( !empty($post['rasio_ember_umpan_sampel']) ){ echo $post['rasio_ember_umpan_sampel']; } ?>" autocomplete=off></td>
                       </tr>


                      <tr>
                            <th width='120px' scope='row'>berat_sample_ember_umpan (*) (Kg)</th>   
                            <td><input type='text' class='form-control' name='berat_sample_ember_umpan' id="berat_sample_ember_umpan" onkeyup="textAddCommas()" value="<?php if( !empty($post['berat_sample_ember_umpan']) ){ echo $post['berat_sample_ember_umpan']; } ?>" autocomplete=off step=".01"></td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>berat_sample_tupper_umpan (*) (G)</th>   
                            <td><input type='text' class='form-control' name='berat_sample_tupper_umpan' id="berat_sample_tupper_umpan" onkeyup="textAddCommas()" value="<?php if( !empty($post['berat_sample_tupper_umpan']) ){ echo $post['berat_sample_tupper_umpan']; } ?>" autocomplete=off step=".01"></td>
                       </tr>

                   </tbody>
                  </table>
              </div>




              </div> 
             
               <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
                <a href="<?php echo base_url(); ?>trip/form4/<?php echo $kode_trip ; ?>"><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>
                  </form>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->



 <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-header">
                               
                                <strong class="card-title">TABLE <?php echo $table1; ?></strong>
                              
                            </div>


                            <div class="card-body">

                              <?php echo $button_add ; ?>

                      <table id="observerform_umpan_detail" border="1" class="table-style table table-striped table-bordered" cellspacing="0" width="100%">
        
                            <thead>
                                <tr>
                                    <th> Nomor  </th>
                                    <th> Kode Species  </th>
                                    <th> berat (g) </th>
                                    <th> Jumlah  </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>

                             <tfoot>
                                <tr>
                                    <th> Nomor  </th>
                                    <th> Kode Species  </th>
                                    <th> berat (g)</th>
                                    <th> Jumlah  </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                             </tfoot>
                            
                            </table>
                              

              <div class='col-md-12'>


              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>





<!-- Modal -->

 <div class="modal fade" tabindex="-1" role="dialog" id="myModalTable1">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <center><h5 class="modal-title">Tambah observerform_umpan_detail </h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form class="form-horizontal" action="<?php echo $url_add_table1; ?>" method="post" id="AddDataTable1Form">
       <div class="modal-body">

        <div class="messages"></div>


          <div class="form-group">
          <label for="exampleInputEmail1">id_trip</label>
          <input type="text" class="form-control" id="id_trip" name="id_trip" value="<?php echo $kode_trip ; ?>" readonly required>
        </div>

          <div class="form-group">
          <label for="exampleInputEmail1">seq</label>
          <input type="text" class="form-control" id="seq" name="seq" value="<?php echo $seq ; ?>" readonly required>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">kode_species</label>
          <!--<input type="text" class="form-control" id="kode_species" name="kode_species" placeholder="Enter kode_species" required>-->
           <select class="form-control" name="kode_species" id="kode_species">
                                     <option value="">Select Kode Species</option>
                                       <?php foreach($kode_umpan->result() as $row){ ?>
                                        <option value="<?php echo $row->fao ; ?>" ><?php echo $row->fao ; ?> - <?php echo $row->english ; ?></option>
                                       <?php  } ?>
                                </select>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">jumlah</label>
          <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Enter jumlah" onkeyup="textAddCommas()"  required autocomplete=off>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">berat (G)</label>
          <input type="text" class="form-control" id="berat" name="berat" placeholder="Enter berat" onkeyup="textAddCommas()" required autocomplete=off  step=".01">
        </div>

 

       </div>

       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Submit data</button>
        </div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



 <div class="modal fade" tabindex="-1" role="dialog" id="editTable1Modal">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <center><h5 class="modal-title">Update observerform_umpan_detail</h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form class="form-horizontal" action="<?php echo $url_update_table1; ?>" method="post" id="EditDataTable1Form">
       <div class="modal-body">

        <div class="edit-messages"></div>


          <div class="form-group">
          <label for="exampleInputEmail1">id_trip</label>
          <input type="text" class="form-control" id="edit_id_trip" name="edit_id_trip" value="<?php echo $kode_trip ; ?>" readonly required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">seq</label>
          <input type="text" class="form-control" id="edit_seq" name="edit_seq" value="<?php echo $seq ; ?>" readonly required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">nomor</label>
          <input type="text" class="form-control" id="edit_nomor" name="edit_nomor" readonly required>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">kode_species</label>
          <!--<input type="text" class="form-control" id="edit_kode_species" name="edit_kode_species" placeholder="Enter kode_species" required>-->
           <select class="form-control" name="edit_kode_species" id="edit_kode_species">
                                     <option value="">Select Kode Species</option>
                                       <?php foreach($kode_umpan->result() as $row){ ?>
                                        <option value="<?php echo $row->fao ; ?>" ><?php echo $row->fao ; ?> - <?php echo $row->english ; ?></option>
                                       <?php  } ?>
                                </select>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">jumlah</label>
          <input type="text" class="form-control" id="edit_jumlah" name="edit_jumlah" onkeyup="textAddCommas()" placeholder="Enter jumlah"  required autocomplete=off>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">berat (G)</label>
          <input type="text" class="form-control" id="edit_berat" name="edit_berat" onkeyup="textAddCommas()" placeholder="Enter berat"  required autocomplete=off  step=".01">
        </div>

 
       </div>

       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Submit data</button>
        </div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- remove modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="disableTable1Modal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
              <center><h5 class="modal-title">Disable</h5></center>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="disable-messages"></div>
          <p>Do you really want to disable ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="hapusBtn">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- /remove modal -->


<!--END  Modal -->














<script>

 $( function() {
    $( "#tanggal" ).datepicker(
    {   
        dateFormat: 'yy-mm-dd', 
        changeMonth: true,
        changeYear: true,
        minDate: new Date("<?php echo $trip_info['tanggal_keberangkatan']; ?>"),
        maxDate: new Date("<?php echo $trip_info['tanggal_kedatangan']; ?>"),
        numberOfMonths: 2,
        onSelect: function(selected) {
          $("#tanggal").datepicker("option","minDate", selected)
        }

    });


           $( "#tanggal2" ).datepicker(
    {   
        dateFormat: 'yy-mm-dd', 
        changeMonth: true,
        changeYear: true,
        minDate: new Date("<?php echo $trip_info['tanggal_keberangkatan']; ?>"),
        maxDate: new Date("<?php echo $trip_info['tanggal_kedatangan']; ?>"),
        numberOfMonths: 2,
        onSelect: function(selected) {
          $("#tanggal2").datepicker("option","minDate", selected)
        }

    });

  } );


$(document).ready(function() {
  
   observerform_umpan_detail = $("#observerform_umpan_detail").DataTable({
    "ajax": "<?php echo $url_load_table ?>",
        "order": [],   
    "scrollX": true
    });




     $('#AddDataTable1Btn').on('click',function(){
        
      $('#AddDataTable1Form')[0].reset();
      $('.form-group').removeClass('has-error').removeClass('has-success');
      $('.text-danger').remove();
      $('.messages').html("");
       
      $('#AddDataTable1Form').unbind('submit').bind('submit',function(e){

      
        
        $('.text-danger').remove();
        $('.messages').html("");
          var form = $(this);

                      var me = $(this);
                        e.preventDefault();
                      if ( me.data('requestRunning') ) {
                        return;
                      }
                      me.data('requestRunning', true);
                      
          $.ajax({
                    url : form.attr('action'),
                    type : form.attr('method'),
                    data : form.serialize(),
                    dataType :'json',
                    success:function(response){
                        // remove pesan error
                        $('.form-group').removeClass('has-error').removeClass('has-success');

                        if (response.success == true) {
                            $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                            '</div>');

                            //reset form 
                            $('#AddDataTable1Form')[0].reset();
                            //reload the datatables
                            observerform_umpan_detail.ajax.reload(null,false);
                        }else{
                            $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                            '</div>');
                        }
                    }
                    , error: function( xhr, status, error){
                            console.log(xhr.statusText);
                            console.log(error);
                            console.log(status);


                            alert('500 Internal server error !');
                      } ,
                      complete: function() {
                        me.data('requestRunning', false);
                      } 
                });





          return false;  
      });
      
    });











}) ; 


function editData(id_trip = null, seq=null , nomor=null ){


  if(id_trip){
        $(".form-group").removeClass('has-error').removeClass('has-success');
        $(".text-danger").remove();
        // empty the message div
        $(".edit-messages").html("");

         $('#EditDataTable1Form')[0].reset();

         $.ajax({
            url: '<?php echo $url_show_table; ?>',
            type: 'post',
            data: {id_trip : id_trip , seq : seq , nomor : nomor  },
            dataType: 'json',
            success:function(response) {

              $('#edit_nomor').val(response.messages[0].nomor);
              $('#edit_kode_species').val(response.messages[0].kode_species);
              $('#edit_berat').val(response.messages[0].berat);
              $('#edit_jumlah').val(response.messages[0].jumlah);
            
          
              $("#EditDataTable1Form").unbind('submit').bind('submit', function(e) {

                 $(".text-danger").remove();

                    var form = $(this);
                    var me = $(this);
                        e.preventDefault();
                      if ( me.data('requestRunning') ) {
                        return;
                      }
                      me.data('requestRunning', true);

                   $.ajax({
                                url: form.attr('action'),
                                type: form.attr('method'),
                                data: form.serialize(),
                                dataType: 'json',
                                success:function(response) {
                    if (response.success == true) {
                        $(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                          '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                          '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                        '</div>');
                        
                    
                        observerform_umpan_detail.ajax.reload(null,false);
                        
                      }else{
                        $(".edit-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                          '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                          '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                        '</div>');
                        alert('Gagal');
                      }
                          } ,
                       error: function(xhr, status, error) {
                        console.log(status);
                        console.log(error);
                    },
                      complete: function() {
                        me.data('requestRunning', false);
                      } 
                  }); // /ajax



                 return false;
                   
                });


            }  // /success
            , error: function( xhr, status, error){
                console.log(xhr.statusText);
                console.log(error);
                console.log(status);


               alert('500 Internal server error !');
            } 
        }); // /fetch selected member info

   } else {
        alert('Error: Refresh the page again');
    }

    
    }



    function disableData(id_trip = null, seq=null , nomor=null ){


     if(id_trip) {
      
      $("#hapusBtn").unbind('click').bind('click', function() {


          $.ajax({
                url: '<?php echo $url_delete_table1; ?>',
                type: 'post',
                data: { id_trip : id_trip , seq : seq , nomor : nomor },
                dataType: 'json',
                success:function(response) {
                  console.log(response);
                     if (response.success == true) {       
                        $(".disable-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                            '</div>');
                    
                    observerform_umpan_detail.ajax.reload(null,false);
                    alert('berhasil');
                    $('#disableTable1Modal').modal('hide');

                    } else {
                        $(".disable-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                            '</div>');
                    }
                }, error: function(xhr, status, error) {
          console.log(status);
          console.log(error);
      }
            });


      }); // click remove btn
    } 
    else {
        alert('Error: Refresh the page again');
    }


}


 function addCommas(str){

       // return str.replace(/^0+/, '').replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");

       //allow decimal 

       var check = str; 
      
        if(check.charAt(0) == '.') {

            var zero = "0"; 

            check = zero.concat(check);

            return check; 

        }else if(check.includes('.')){

          if((check.split(".").length > 2) ){
            
            return check = str.substring(0, str.length-1);

          }
            return check = str.replace(/[^0-9\.]+/g, '');

        }
        else{
          
           check =   str.replace(/^0+/, '').replace(/(?!-)[^0-9.]/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            return check; 
        
        }


        

    }


  function textAddCommas(){

      var val = document.getElementById('harga_umpan').value;
      document.getElementById('harga_umpan').value = addCommas(val);  

      var val = document.getElementById('jumlah_ember_diangkut').value;
      document.getElementById('jumlah_ember_diangkut').value = addCommas(val);  

  
      var val = document.getElementById('berat_ember_sample_umpan_kosong').value;
      document.getElementById('berat_ember_sample_umpan_kosong').value = addCommas(val);  
       
       var val = document.getElementById('berat_tupper_umpan_kosong').value;
      document.getElementById('berat_tupper_umpan_kosong').value = addCommas(val);  
       
       var val = document.getElementById('berat_sample_ember_umpan').value;
      document.getElementById('berat_sample_ember_umpan').value = addCommas(val);  
       
       var val = document.getElementById('berat_sample_tupper_umpan').value;
      document.getElementById('berat_sample_tupper_umpan').value = addCommas(val);  

       var val = document.getElementById('jumlah').value;
      document.getElementById('jumlah').value = addCommas(val);  

       var val = document.getElementById('berat').value;
      document.getElementById('berat').value = addCommas(val);  

       var val = document.getElementById('edit_jumlah').value;
      document.getElementById('edit_jumlah').value = addCommas(val);  

       var val = document.getElementById('edit_berat').value;
      document.getElementById('edit_berat').value = addCommas(val);  
  }


   function allowOneDot(e) {
        var dots = 0;
        var length = txt.value.length;
        var text = txt.value;
        for(var i=0; i<length; i++) {
            if(text[i]=='.') dots++;
            if(dots>1) {
                txt.value = prevValue;
                return false;
            }
        }
        prevValue = text;
        return true;
    }


</script>
