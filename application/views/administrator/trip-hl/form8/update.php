

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
                                    <li><a href="<?php echo base_url()."trip_hl/form8/".$kode_trip; ?>"><?php echo $page_name ; ?></a></li>
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
                                    echo form_open_multipart('trip_hl/form8_update/'.$kode_trip."/".$seq,$attributes); 
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
                            <th width='120px' scope='row'>nama_kapal</th>   
                            <td><input type='text' class='form-control' name='nama_kapal' value="<?php if( !empty($post['nama_kapal']) ){ echo $post['nama_kapal']; } ?>" autocomplete=off></td>
                       </tr>

                    

                        <tr>
                            <th width='120px' scope='row'>nama_nahkoda</th>   
                            <td><input type='text' class='form-control' name='nama_nahkoda' value="<?php if( !empty($post['nama_nahkoda']) ){ echo $post['nama_nahkoda']; } ?>" autocomplete=off></td>
                       </tr>

                    
                               <tr>
                            <th width='120px' scope='row'>bendera</th>   
                            <td><input type='text' class='form-control' name='bendera' value="<?php if( !empty($post['bendera']) ){ echo $post['bendera']; } ?>" autocomplete=off></td>
                       </tr>

                    

                        <tr>
                            <th width='120px' scope='row'>sipi</th>   
                            <td><input type='text' class='form-control' name='sipi' value="<?php if( !empty($post['sipi']) ){ echo $post['sipi']; } ?>" autocomplete=off></td>
                       </tr>

                    

                      
                         <tr>
                            <th width='120px' scope='row'>tanda_selar</th>   
                            <td><input type='text' class='form-control' name='tanda_selar' value="<?php if( !empty($post['tanda_selar']) ){ echo $post['tanda_selar']; } ?>" autocomplete=off></td>
                       </tr>

                    

                        <tr>
                            <th width='120px' scope='row'>rfmo</th>   
                            <td><input type='text' class='form-control' name='rfmo' value="<?php if( !empty($post['rfmo']) ){ echo $post['rfmo']; } ?>" autocomplete=off></td>
                       </tr>

                    


                

                   
                    
           
                  

                     </tbody>

                   </table>
              </div>


                <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                            <tr>
                            <th width='120px' scope='row'>no_rfmo</th>   
                            <td><input type='text' class='form-control' name='no_rfmo' value="<?php if( !empty($post['no_rfmo']) ){ echo $post['no_rfmo']; } ?>" autocomplete=off></td>
                       </tr>


                    


                         <tr>
                            <th width='120px' scope='row'>foto_lambung_kapal</th>   
                            <td>
                               <select class="form-control" name="foto_lambung_kapal" id="foto_lambung_kapal">
                                   <option value="">Select</option>
                                    <option value="Ya" <?php if( !empty($post['foto_lambung_kapal']) ){ if( 'Ya' ==  $post['foto_lambung_kapal']) { echo 'selected';  } } ?> >Ya</option>
                                     <option value="Tidak" <?php if( !empty($post['foto_lambung_kapal']) ){ if( 'Tidak' ==  $post['foto_lambung_kapal']) { echo 'selected';  } } ?> >Tidak</option>
                                 
                              </select>
                              
                            </td>
                       </tr>

                        <tr>
                            <th width='120px' scope='row'>no_foto</th>   
                            <td><input type='text' class='form-control' name='no_foto' value="<?php if( !empty($post['no_foto']) ){ echo $post['no_foto']; } ?>" autocomplete=off></td>
                       </tr>


                        <tr>
                            <th width='120px' scope='row'>tanggal</th>   
                            <td><input type='text' class='form-control' name='tanggal' id="tanggal" value="<?php if( !empty($post['tanggal']) ){ echo $post['tanggal']; } ?>" autocomplete=off></td>
                       </tr>

                     <tr>
                            <th width='120px' scope='row'>waktu (contoh: 11:45 AM)</th>   
                            <td>
                               
                               <input type='time' class='form-control' name='waktu' value="<?php if( !empty($post['waktu']) ){ echo $post['waktu']; } ?>" placeholder="waktu">

                              <!--<input type='text' class='form-control' name='waktu' value="<?php if( !empty($post['waktu']) ){ echo $post['waktu']; } ?>" autocomplete=off>-->
                              <!-- <div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' placeholder="Jam" name='jam' required autocomplete=off required min='0' max='23' value="<?php if( !empty($post['jam']) ){ echo $post['jam']; } ?>">
                                    </div>
                                    <b>:</b> 
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' placeholder="Menit" name='menit' required autocomplete=off required min='0' max='59' value="<?php if( !empty($post['menit']) ){ echo $post['menit']; } ?>">
                                    </div>
                                </div>-->

                              </td>
                       </tr>

                    
                   <tr>
                            <th width='120px' scope='row'>lintang</th>   
                            <td>
                                 <div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='lintang_degree' value="<?php echo $post['lintang_degree']; ?>" placeholder="Lintang Degree" required autocomplete=off>
                                    </div>
                                     <div class='col-md-4'>
                                        <input type='number' class='form-control' name='lintang_minutes'  value="<?php echo $post['lintang_minutes']; ?>" placeholder="Lintang Minutes" required autocomplete=off min="0" max="60" step=".01">
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
                            <th width='120px' scope='row'>bujur</th>   
                            <td>
                                <div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='bujur_degree' value="<?php echo $post['bujur_degree']; ?>"  placeholder="Bujur Degree" required autocomplete=off>
                                    </div>
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='bujur_minutes' value="<?php echo $post['bujur_minutes']; ?>" placeholder="Bujur Minutes" required autocomplete=off min="0" max="60" step=".01">
                                    </div>
                                    <div class='col-md-4'>
                                       <select class='form-control' name='bujur_us' id="bujur_us">
                                            <option value="T" <?php if( !empty($post['bujur_us']) ){ if($post['bujur_us'] == "T"){ echo 'selected';  } } ?> > Timur</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                       </tr>


                
                     </tbody>

                   </table>
              </div>

            </div>

             

               <h3> <b>  Kapal Pengangkutan ikan </b> </h3>
           
 <div class="row">

              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                

                        <tr>
                            <th width='120px' scope='row'>nama_kapal</th>   
                            <td><input type='text' class='form-control' name='nama_kapal2' value="<?php if( !empty($post['nama_kapal2']) ){ echo $post['nama_kapal2']; } ?>" autocomplete=off></td>
                       </tr>

                    

                        <tr>
                            <th width='120px' scope='row'>nama_nahkoda</th>   
                            <td><input type='text' class='form-control' name='nama_nahkoda2' value="<?php if( !empty($post['nama_nahkoda2']) ){ echo $post['nama_nahkoda2']; } ?>" autocomplete=off></td>
                       </tr>

                    
                               <tr>
                            <th width='120px' scope='row'>bendera</th>   
                            <td><input type='text' class='form-control' name='bendera2' value="<?php if( !empty($post['bendera2']) ){ echo $post['bendera2']; } ?>" autocomplete=off></td>
                       </tr>

                    

                        <tr>
                            <th width='120px' scope='row'>sipi</th>   
                            <td><input type='text' class='form-control' name='sipi2' value="<?php if( !empty($post['sipi2']) ){ echo $post['sipi2']; } ?>" autocomplete=off></td>
                       </tr>

                    

                      
                         <tr>
                            <th width='120px' scope='row'>tanda_selar</th>   
                            <td><input type='text' class='form-control' name='tanda_selar2' value="<?php if( !empty($post['tanda_selar2']) ){ echo $post['tanda_selar2']; } ?>" autocomplete=off></td>
                       </tr>

                    

                        <tr>
                            <th width='120px' scope='row'>rfmo</th>   
                            <td><!--<input type='text' class='form-control' name='rfmo' value="<?php if( !empty($post['rfmo']) ){ echo $post['rfmo']; } ?>" autocomplete=off>-->

                               <select class='form-control' name='rfmo2' id="rfmo2">
                                  <option value="" >Silahkan Pilih</option>
                                    <option value="WCPFC" <?php if( !empty($post['rfmo2']) ){ if($post['rfmo2'] == "WCPFC"){ echo 'selected';  } } ?>>wcpfc</option>
                                    <option value="IOTC" <?php if( !empty($post['rfmo2']) ){ if($post['rfmo2'] == "IOTC"){ echo 'selected';  } } ?>>iotc</option>
                                    <option value="CSBT" <?php if( !empty($post['rfmo2']) ){ if($post['rfmo2'] == "CSBT"){ echo 'selected';  } } ?>>csbt</option>
                                </select>

                            </td>
                       </tr>


                  

                     </tbody>

                   </table>
              </div>


                <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                            <tr>
                            <th width='120px' scope='row'>no_rfmo</th>   
                            <td>
                              <input type='text' class='form-control' name='no_rfmo2' value="<?php if( !empty($post['no_rfmo2']) ){ echo $post['no_rfmo2']; } ?>" autocomplete=off>



                            </td>
                       </tr>


                    


                         <tr>
                            <th width='120px' scope='row'>foto_lambung_kapal</th>   
                            <td>
                               <select class="form-control" name="foto_lambung_kapal2" id="foto_lambung_kapal2">
                                   <option value="">Select</option>
                                    <option value="Ya" <?php if( !empty($post['foto_lambung_kapal2']) ){ if( 'Ya' ==  $post['foto_lambung_kapal2']) { echo 'selected';  } } ?> >Ya</option>
                                     <option value="Tidak" <?php if( !empty($post['foto_lambung_kapal2']) ){ if( 'Tidak' ==  $post['foto_lambung_kapal2']) { echo 'selected';  } } ?> >Tidak</option>
                                 
                              </select>
                              
                            </td>
                       </tr>

                        <tr>
                            <th width='120px' scope='row'>no_foto</th>   
                            <td><input type='text' class='form-control' name='no_foto2' value="<?php if( !empty($post['no_foto2']) ){ echo $post['no_foto2']; } ?>" autocomplete=off></td>
                       </tr>


  
                
                     </tbody>

                   </table>



                   
              </div>

            </div>
             
               <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
               <a href="<?php echo base_url(); ?>trip_hl/form8/<?php echo $kode_trip; ?>"><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
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

                      <table id="observerform_pemindahan_detail" border="1" class="table-style table table-striped table-bordered" cellspacing="0" width="100%">
        
                            <thead>
                                <tr>
                                    <th> Nomor  </th>
                                    <th> Kode Species  </th>
                                    <th> tipe_produk  </th>
                                    <th> berat </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>

                             <tfoot>
                                <tr>
                                    <th> Nomor  </th>
                                    <th> Kode Species  </th>
                                    <th> tipe_produk  </th>
                                    <th> berat </th>
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
                                       <?php foreach($kode_species->result() as $row){ ?>
                                        <option value="<?php echo $row->fao ; ?>" ><?php echo $row->fao ; ?> - <?php echo $row->english ; ?></option>
                                       <?php  } ?>
                                </select>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">tipe_produk</label>
           <select class='form-control' name='tipe_produk' id="tipe_produk">
                                            <option value="" >Silahkan Pilih</option>
                                            <option value="Utuh" >Utuh</option>
                                            <option value="Loin" >Loin</option>
                                        </select>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">berat</label>
          <input type="number" class="form-control" id="berat" name="berat" placeholder="Enter berat"  required autocomplete=off step=".01">
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
         <!-- <input type="text" class="form-control" id="edit_kode_species" name="edit_kode_species" placeholder="Enter kode_species" required>-->
           <select class="form-control" name="edit_kode_species" id="edit_kode_species">
                                     <option value="">Select Kode Species</option>
                                       <?php foreach($kode_species->result() as $row){ ?>
                                        <option value="<?php echo $row->fao ; ?>" ><?php echo $row->fao ; ?> - <?php echo $row->english ; ?></option>
                                       <?php  } ?>
                                </select>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">tipe_produk</label>
          <select class='form-control' name='edit_tipe_produk' id="edit_tipe_produk">
                                        <option value="" >Silahkan Pilih</option>
                                            <option value="Utuh" >Utuh</option>
                                            <option value="Loin" >Loin</option>
                                        </select>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">berat</label>
          <input type="number" class="form-control" id="edit_berat" name="edit_berat" placeholder="Enter berat"  required autocomplete=off step=".01">
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

  } );


$(document).ready(function() {
  
   observerform_pemindahan_detail = $("#observerform_pemindahan_detail").DataTable({
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
                            observerform_pemindahan_detail.ajax.reload(null,false);
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
              $('#edit_tipe_produk').val(response.messages[0].tipe_produk);
            
            

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
                        
                    
                        observerform_pemindahan_detail.ajax.reload(null,false);
                        
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



                 //return false;
                   
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
                    
                    observerform_pemindahan_detail.ajax.reload(null,false);
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


</script>
