

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
                                    <li><a href="<?php echo base_url()."trip/form7/".$kode_trip; ?>"><?php echo $page_name ; ?></a></li>
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

                              <h3> <b> Kapal penangkapan ikan </b>  </h3>

                                <?php 
                                 $attributes = array('class'=>'form-horizontal','role'=>'form');
                                    echo form_open_multipart('trip/form7_add/'.$kode_trip,$attributes); 
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
                            <td><!--<input type='text' class='form-control' name='rfmo' value="<?php if( !empty($post['rfmo']) ){ echo $post['rfmo']; } ?>" autocomplete=off>-->

                               <select class='form-control' name='rfmo' id="rfmo">
                                  <option value="" >Silahkan Pilih</option>
                                    <option value="WCPFC" <?php if( !empty($post['rfmo']) ){ if($post['rfmo'] == "WCPFC"){ echo 'selected';  } } ?>>wcpfc</option>
                                    <option value="IOTC" <?php if( !empty($post['rfmo']) ){ if($post['rfmo'] == "IOTC"){ echo 'selected';  } } ?>>iotc</option>
                                    <option value="CSBT" <?php if( !empty($post['rfmo']) ){ if($post['rfmo'] == "CSBT"){ echo 'selected';  } } ?>>csbt</option>
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
                              <!--<div class="row">
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
                                        <input type='number' class='form-control' name='lintang_degree' placeholder="Lintang Degree" required autocomplete=off>
                                    </div>
                                     <div class='col-md-4'>
                                        <input type='number' class='form-control' name='lintang_minutes'  placeholder="Lintang Minutes" required autocomplete=off min="0" max="60" step=".01">
                                    </div>
                                     <div class='col-md-4'>
                                        <select class='form-control' name='lintang_us' id="lintang_us">
                                            <option value="U" >Utara</option>
                                            <option value="S" >Selatan</option>
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
                                        <input type='number' class='form-control' name='bujur_degree'  placeholder="Bujur Degree" required autocomplete=off>
                                    </div>
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='bujur_minutes' placeholder="Bujur Minutes" required autocomplete=off min="0" max="60" step=".01">
                                    </div>
                                    <div class='col-md-4'>
                                       <select class='form-control' name='bujur_us' id="bujur_us">
                                            <option value="T" >Timur</option>
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
               <a href="<?php echo base_url(); ?>trip/form7/<?php echo $kode_trip ; ?>"><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 


                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>




                   



        </div>
    </div><!-- .animated -->
</div><!-- .content -->


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


</script>
