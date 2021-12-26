

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
                                    <li><a href="<?php echo base_url()."trip_hl/form4/".$kode_trip; ?>"><?php echo $page_name ; ?></a></li>
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
                                    echo form_open_multipart('trip_hl/form4_update/'.$kode_trip."/".$seq,$attributes); 
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
                            <th width='120px' scope='row'>no_tangkapan (*)</th>   
                            <td><input type='number' class='form-control' name='no_tangkapan' value="<?php if( !empty($post['no_tangkapan']) ){ echo $post['no_tangkapan']; } ?>" autocomplete=off></td>
                       </tr>

                     
                      <tr>
                            <th width='120px' scope='row'>tanggal Mulai (*)</th>   
                            <td><input type='text' class='form-control' name='tanggal' id="tanggal" value="<?php if( !empty($post['tanggal']) ){ echo $post['tanggal']; } ?>" autocomplete=off ></td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>waktu_mulai (*) (contoh: 11:45 AM)</th>   
                            <td>

                                <input type='time' class='form-control' name='waktu_mulai' value="<?php if( !empty($post['waktu_mulai']) ){ echo $post['waktu_mulai']; } ?>" autocomplete=off min="0" max ="23" placeholder="jam">

                            </td>
                       </tr>

                   

                      <tr>
                            <th width='120px' scope='row'>waktu_selesai (*) (contoh: 11:45 AM)</th>   
                            <td>

                                <input type='time' class='form-control' name='waktu_selesai' value="<?php if( !empty($post['waktu_selesai']) ){ echo $post['waktu_selesai']; } ?>" autocomplete=off min="0" max ="23" placeholder="jam">
                          
                            </td>
                       </tr>

                        <tr>
                            <th width='120px' scope='row'>latitude</th>   
                            <td><input type='text' class='form-control' name='latitude' value="<?php if( !empty($post['latitude']) ){ echo $post['latitude']; } ?>"></td>
                       </tr>

                        <tr>
                            <th width='120px' scope='row'>longitude</th>   
                            <td><input type='text' class='form-control' name='longitude' value="<?php if( !empty($post['longitude']) ){ echo $post['longitude']; } ?>"></td>
                       </tr>

                        <tr>
                            <th width='120px' scope='row'>alat_tangkap_umpan</th>   
                            <td><input type='text' class='form-control' name='alat_tangkap_umpan' value="<?php if( !empty($post['alat_tangkap_umpan']) ){ echo $post['alat_tangkap_umpan']; } ?>"></td>
                       </tr>

                        <tr>
                            <th width='120px' scope='row'>jum_alat_tangkap</th>   
                            <td><input type='text' class='form-control' name='jum_alat_tangkap' value="<?php if( !empty($post['jum_alat_tangkap']) ){ echo $post['jum_alat_tangkap']; } ?>"></td>
                       </tr>

                   </tbody>
                  </table>
              </div>




              </div> 
             
               <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
                <a href="<?php echo base_url(); ?>trip_hl/form4/<?php echo $kode_trip ; ?>"><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
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
                                    <th> Jumlah  </th>
                                    <th> berat (g)</th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>

                             <tfoot>
                                <tr>
                                    <th> Nomor  </th>
                                    <th> Kode Species  </th>
                                    <th> Jumlah  </th>
                                    <th> berat (g)</th>
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




 <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-header">
                               
                                <strong class="card-title">TABLE <?php echo $table2; ?></strong>
                              
                            </div>


                            <div class="card-body">

                              <?php echo $button_add2 ; ?>

                      <table id="observerform_umpan_detail_panjang" border="1" class="table-style table table-striped table-bordered" cellspacing="0" width="100%">
        
                            <thead>
                                <tr>
                                    <th> Nomor  </th>
                                    <th> Kode Species  </th>
                                    <th> panjang  </th>
                                    <th> berat (g)</th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>

                             <tfoot>
                                <tr>
                                    <th> Nomor  </th>
                                    <th> Kode Species  </th>
                                    <th> panjang  </th>
                                    <th> berat (g)</th>
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



<div class="modal fade" tabindex="-1" role="dialog" id="myModalTable2">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <center><h5 class="modal-title">Tambah observerform_umpan_detail_panjang </h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form class="form-horizontal" action="<?php echo $url_add_table2; ?>" method="post" id="AddDataTable2Form">
       <div class="modal-body">

        <div class="messages"></div>


          <div class="form-group">
          <label for="exampleInputEmail1">id_trip</label>
          <input type="text" class="form-control" id="id_trip2" name="id_trip2" value="<?php echo $kode_trip ; ?>" readonly required>
        </div>

          <div class="form-group">
          <label for="exampleInputEmail1">seq</label>
          <input type="text" class="form-control" id="seq2" name="seq2" value="<?php echo $seq ; ?>" readonly required>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">kode_species</label>
          <!--<input type="text" class="form-control" id="kode_species" name="kode_species" placeholder="Enter kode_species" required>-->
           <select class="form-control" name="kode_species2" id="kode_species2">
                                     <option value="">Select Kode Species</option>
                                       <?php foreach($kode_umpan->result() as $row){ ?>
                                        <option value="<?php echo $row->fao ; ?>" ><?php echo $row->fao ; ?> - <?php echo $row->english ; ?></option>
                                       <?php  } ?>
                                </select>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">panjang</label>
          <input type="text" class="form-control" id="panjang2" name="panjang2" placeholder="Enter jumlah" onkeyup="textAddCommas()"  required autocomplete=off>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">berat (G)</label>
          <input type="text" class="form-control" id="berat2" name="berat2" placeholder="Enter berat" onkeyup="textAddCommas()" required autocomplete=off  step=".01">
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





 <div class="modal fade" tabindex="-1" role="dialog" id="editTable2Modal">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <center><h5 class="modal-title">Update observerform_umpan_detail</h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form class="form-horizontal" action="<?php echo $url_update_table2; ?>" method="post" id="EditDataTable2Form">
       <div class="modal-body">

        <div class="edit-messages"></div>


          <div class="form-group">
          <label for="exampleInputEmail1">id_trip</label>
          <input type="text" class="form-control" id="edit_id_trip2" name="edit_id_trip2" value="<?php echo $kode_trip ; ?>" readonly required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">seq</label>
          <input type="text" class="form-control" id="edit_seq2" name="edit_seq2" value="<?php echo $seq ; ?>" readonly required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">nomor</label>
          <input type="text" class="form-control" id="edit_nomor2" name="edit_nomor2" readonly required>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">kode_species</label>
          <!--<input type="text" class="form-control" id="edit_kode_species" name="edit_kode_species" placeholder="Enter kode_species" required>-->
           <select class="form-control" name="edit_kode_species2" id="edit_kode_species2">
                                     <option value="">Select Kode Species</option>
                                       <?php foreach($kode_umpan->result() as $row){ ?>
                                        <option value="<?php echo $row->fao ; ?>" ><?php echo $row->fao ; ?> - <?php echo $row->english ; ?></option>
                                       <?php  } ?>
                                </select>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">panjang</label>
          <input type="text" class="form-control" id="edit_panjang2" name="edit_panjang2" onkeyup="textAddCommas()" placeholder="Enter panjang"  required autocomplete=off>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">berat (G)</label>
          <input type="text" class="form-control" id="edit_berat2" name="edit_berat2" onkeyup="textAddCommas()" placeholder="Enter berat"  required autocomplete=off  step=".01">
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


<!-- remove modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="disableTable2Modal">
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
          <button type="button" class="btn btn-primary" id="hapusBtn2">Save changes</button>
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
  
   observerform_umpan_detail = $("#observerform_umpan_detail").DataTable({
    "ajax": "<?php echo $url_load_table ?>",
        "order": [],   
    "scrollX": true
    });


      observerform_umpan_detail_panjang = $("#observerform_umpan_detail_panjang").DataTable({
    "ajax": "<?php echo $url_load_table2 ?>",
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




   $('#AddDataTable2Btn').on('click',function(){
        
      $('#AddDataTable2Form')[0].reset();
      $('.form-group').removeClass('has-error').removeClass('has-success');
      $('.text-danger').remove();
      $('.messages').html("");
       
      $('#AddDataTable2Form').unbind('submit').bind('submit',function(e){

      
        
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
                            $('#AddDataTable2Form')[0].reset();
                            //reload the datatables
                            observerform_umpan_detail_panjang.ajax.reload(null,false);
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




function editData2(id_trip = null, seq=null , nomor=null ){

  if(id_trip){

        $(".form-group").removeClass('has-error').removeClass('has-success');

        $(".text-danger").remove();
        // empty the message div
        $(".edit-messages").html("");

         $('#EditDataTable2Form')[0].reset();

         $.ajax({
            url: '<?php echo $url_show_table2; ?>',
            type: 'post',
            data: {id_trip : id_trip , seq : seq , nomor : nomor  },
            dataType: 'json',
            success:function(response) {

              $('#edit_nomor2').val(response.messages[0].nomor);
              $('#edit_kode_species2').val(response.messages[0].kode_species);
              $('#edit_berat2').val(response.messages[0].berat);
              $('#edit_panjang2').val(response.messages[0].panjang);
            
          
              $("#EditDataTable2Form").unbind('submit').bind('submit', function(e) {

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
                        
                    
                        observerform_umpan_detail_panjang.ajax.reload(null,false);
                        
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


function disableData2(id_trip = null, seq=null , nomor=null ){


     if(id_trip) {
      
      $("#hapusBtn2").unbind('click').bind('click', function() {


          $.ajax({
                url: '<?php echo $url_delete_table2; ?>',
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
                    
                    observerform_umpan_detail_panjang.ajax.reload(null,false);
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
