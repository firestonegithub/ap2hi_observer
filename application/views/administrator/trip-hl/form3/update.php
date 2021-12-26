


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
                                    <li><a href="<?php echo base_url()."trip_hl/form3/".$kode_trip; ?>"><?php echo $page_name ; ?></a></li>
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

                               <b><?php echo form_error('kode_trip'); ?></b>
                                <b><?php echo form_error('tanggal'); ?></b>
                                <b><?php echo form_error('set_nomor'); ?></b>
                           


                                
                                <?php 
                                 $attributes = array('class'=>'form-horizontal','role'=>'form');
                                    echo form_open_multipart('trip_hl/form3_update/'.$kode_trip."/".$seq,$attributes); 
                                ?>

             <div class='col-md-12'>

              <div class="row">
              
                  <div class='col-md-4'>


                  <table class='table table-condensed table-bordered'>

    
                  <tbody>

                    

                       <tr>
                            <th width='120px' scope='row'>kode trip</th>   
                            <td><input type='text' class='form-control' name='kode_trip' value="<?php echo $kode_trip; ?>" readonly></td>
                       </tr>

                       <tr>
                            <th width='120px' scope='row'>id_pemantau</th>   
                            <td><input type='text' class='form-control' name='id_pemantau' value="<?php if( !empty($post['id_pemantau']) ){ echo $post['id_pemantau']; } ?>" autocomplete=off readonly></td>
                       </tr>

                        <tr>
                            <th width='120px' scope='row'>nama_pemantau </th>   
                            <td><input type='text' class='form-control' name='nama_pemantau' id="nama_pemantau" value="<?php if( !empty($post['nama_pemantau']) ){ echo $post['nama_pemantau']; } ?>" autocomplete=off></td>
                       </tr>

                        <tr>
                            <th width='120px' scope='row'>Id Set</th>   
                            <td> <input type="text" class="form-control" id="seq" name="seq" value="<?php echo $seq ; ?>" readonly required></td>
                       </tr>


                       <tr>
                            <th width='120px' scope='row'>tanggal (*)</th>   
                            <td><input type='text' class='form-control' name='tanggal' id="tanggal" value="<?php if( !empty($post['tanggal']) ){ echo $post['tanggal']; } ?>" autocomplete=off></td>
                       </tr>
                      
                      <tr>
                            <th width='120px' scope='row'>set_nomor</th>   
                            <td><input type='number' class='form-control' name='set_nomor' value="<?php if( !empty($post['set_nomor']) ){ echo $post['set_nomor']; } ?>" autocomplete=off></td>
                      </tr>

                       
                      <tr>
                            <th width='120px' scope='row'>waktu_mulai (*) (contoh: 11:45 AM)</th>   
                            <td>
                                  <input type='time' class='form-control' name='waktu_mulai' value="<?php if( !empty($post['waktu_mulai']) ){ echo $post['waktu_mulai']; } ?>" autocomplete=off min="0" max ="23" placeholder="jam">
                               
            
                            </td>
                      </tr>

                       
                      <tr>
                            <th width='120px' scope='row'>jam_selesai (*) (contoh: 11:45 AM)</th>   
                            <td>
                             
                                 <input type='time' class='form-control' name='waktu_selesai' value="<?php if( !empty($post['waktu_selesai']) ){ echo $post['waktu_selesai']; } ?>" autocomplete=off min="0" max ="23" placeholder="jam">
                             

                            </td>
                      </tr>

                       
                  

                       <tr>
                            <th width='120px' scope='row'>jumlah_pemancing</th>   
                            <td>
                              <input type='number' class='form-control' name='jumlah_pemancing' value="<?php if( !empty($post['jumlah_pemancing']) ){ echo $post['jumlah_pemancing']; } ?>" autocomplete=off>
                            </td>
                      </tr>

                    </tbody>
                  </table>

                </div>
            

              <div class='col-md-4' >

              <table class='table table-condensed table-bordered'>
                <tbody>

                        <tr>
                            <th width='120px' scope='row'>alat_pengukur</th>   
                            <td>
                                          <select class='form-control' name='alat_pengukur' id="alat_pengukur">
                                              <option value="" >Pilih salah satu</option>
                                            <option value="papan ukur" <?php if( !empty($post['alat_pengukur']) ){  if ( $post['alat_pengukur'] == 'papan ukur' ) { echo 'selected'; } } ?> >Papan Ukur</option>
                                            <option value="kaliper" <?php if( !empty($post['alat_pengukur']) ){  if ( $post['alat_pengukur'] == 'kaliper' ) { echo 'selected'; } } ?> >Kaliper</option>
                                            <option value="pita pengukur" <?php if( !empty($post['alat_pengukur']) ){  if ( $post['alat_pengukur'] == 'pita pengukur' ) { echo 'selected'; } } ?> >Pita Pengukur</option>
                                        </select>
                  
                            
                            </td>
                      </tr>

                       
                      <tr>
                            <th width='120px' scope='row'>lintang (*)</th>   
                            <td>
                       

                              <div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='lintang_degree' value="<?php echo $post['lintang_degree']; ?>"  placeholder="Degree" required autocomplete=off>
                                    </div>
                                     <div class='col-md-4'>
                                        <input type='number' class='form-control' name='lintang_minutes' value="<?php echo $post['lintang_minutes']; ?>"  placeholder="Minutes" required autocomplete=off min="0" max="60" step=".01">
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
                             <!-- <input type='text' class='form-control' name='bujur' value="<?php if( !empty($post['bujur']) ){ echo $post['bujur']; } ?>">-->

                              <div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='bujur_degree' value="<?php echo $post['bujur_degree']; ?>"  placeholder="Degree" required autocomplete=off>
                                    </div>
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='bujur_minutes' value="<?php echo $post['bujur_minutes']; ?>"  placeholder="Minutes" required autocomplete=off min="0" max="60" step=".01">
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
                            <th width='120px' scope='row'>fad</th>   
                            <td>
                            <select class='form-control' name='fad' id="fad">
                                  <option value="">Silahkan Pilih</option>
                                  <option value="Ya" <?php if( !empty($post['fad']) ){ if($post['fad'] == "Ya"){ echo 'selected';  } } ?>>Ya</option>
                                   <option value="Tidak" <?php if( !empty($post['fad']) ){ if($post['fad'] == "Tidak"){ echo 'selected';  } } ?>>Tidak</option>
                               </select>
                               </td>
                      </tr>
                       
                      <tr>
                            <th width='120px' scope='row'>jenis fad</th>   
                            <td>
                          

                               <select class='form-control' name='jenis_fad' id="jenis fad">
                                              <option value="" >Pilih salah satu</option>
                                            <option value="menetap" <?php if( !empty($post['jenis_fad']) ){  if ( $post['jenis_fad'] == 'menetap' ) { echo 'selected'; } } ?> >Menetap</option>
                                            <option value="hanyut" <?php if( !empty($post['jenis_fad']) ){  if ( $post['jenis_fad'] == 'hanyut' ) { echo 'selected'; } } ?> >Hanyut</option>
                                </select>
                            </td>
                      </tr>

                      <tr>
                            <th width='120px' scope='row'>fad 2</th>   
                            <td>
                              <input type="checkbox" name="fad2[]" value="berumah" <?php if(in_array('berumah', $post['jenis_fad2'])){ echo 'checked'; }  ?> >Berumah
                              <input type="checkbox" name="fad2[]" value="ponton" <?php if(in_array('ponton', $post['jenis_fad2'])){ echo 'checked'; }  ?> >Ponton
                              <input type="checkbox" name="fad2[]" value="styrofoam" <?php if(in_array('styrofoam', $post['jenis_fad2'])){ echo 'checked'; }  ?> >Styrofoam
                              <input type="checkbox" name="fad2[]" value="rakit" <?php if(in_array('rakit', $post['jenis_fad2'])){ echo 'checked'; }  ?> >Rakit


                            </td>
                      </tr>


                    <tr>
                            <th width='120px' scope='row'>ikan_terasosiasi</th>   
                             <td>
                                <select class="form-control" name="ikan_terasosiasi" id="ikan_terasosiasi">
                                     <option value="">Select kode_terasosiasi</option>
                                       <?php foreach($kode_terasosiasi->result() as $row){ ?>
                                        <option value="<?php echo $row->kode_aktivitas ; ?>"  <?php if( !empty($post['ikan_terasosiasi']) ){  if ( $post['ikan_terasosiasi'] == $row->kode_aktivitas ) { echo 'selected'; } } ?>><?php echo $row->kode_aktivitas ; ?> - <?php echo $row->nama_aktivitas ; ?></option>
                                       <?php  } ?>
                                </select>
                             </td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>lokasi_pemancingan</th>   
                             <td>
                                <select class="form-control" name="lokasi_pemancingan" id="lokasi_pemancingan">
                                     <option value="">Select lokasi_pemancingan</option>
                                       <?php foreach($kode_ikan_terlihat->result() as $row){ ?>
                                        <option value="<?php echo $row->kode_aktivitas ; ?>" <?php if( !empty($post['lokasi_pemancingan']) ){  if ( $post['lokasi_pemancingan'] == $row->kode_aktivitas ) { echo 'selected'; } } ?>><?php echo $row->kode_aktivitas ; ?> - <?php echo $row->nama_aktivitas ; ?></option>
                                       <?php  } ?>
                                </select>
                             </td>
                    </tr>


                      <tr>
                            <th width='120px' scope='row'>foto_fad</th>   
                            <td>
                              <select class='form-control' name='foto_fad' id="foto_fad">
                                  <option value="">Silahkan Pilih</option>
                                  <option value="Ya" <?php if( !empty($post['foto_fad']) ){ if($post['foto_fad'] == "Ya"){ echo 'selected';  } } ?>>Ya</option>
                                   <option value="Tidak" <?php if( !empty($post['foto_fad']) ){ if($post['foto_fad'] == "Tidak"){ echo 'selected';  } } ?>>Tidak</option>
                               </select>
                            </td>
                      </tr>

                       <tr>
                            <th width='120px' scope='row'>no_foto_fad</th>   
                            <td><input type='text' class='form-control' name='no_foto_fad' value="<?php if( !empty($post['no_foto_fad']) ){ echo $post['no_foto_fad']; } ?>" autocomplete=off></td>
                      </tr>

          

                </tbody>
              </table>

            </div>
          </div>
                


                </div>
             
               <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
               <a href="<?php echo base_url(); ?>trip_hl/form3/<?php echo $kode_trip ; ?>"><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
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

               
                      <table id="observerform_tangkapan_hasil" border="1" class="table-style table table-striped table-bordered " cellspacing="0" width="100px">
        
                           <thead>
                                <tr>
                                    <th> Nomor  </th>
                                    <th> Kode Species  </th>
                                    <th> Pakura 1 Jumlah </th>
                                    <th> Pakura 1 Berat Kg  </th>
                                    <th> Pakura 2 Jumlah </th>
                                    <th> Pakura 2 Berat Kg  </th>
                                    <th> Pakura 3 Jumlah </th>
                                    <th> Pakura 3 Berat Kg  </th>
                                    <th> Pakura 4 Jumlah </th>
                                    <th> Pakura 4 Berat Kg  </th>
                                    <th> Pakura 5 Jumlah </th>
                                    <th> Pakura 5 Berat Kg  </th>
                                    <th> Pakura 6 Jumlah </th>
                                    <th> Pakura 6 Berat Kg  </th>
                                    <th> Kapal Jumlah </th>
                                    <th> Kapal Berat Kg  </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>

                              <tfoot>
                                <tr>
                                    <th> Nomor  </th>
                                    <th> Kode Species  </th>
                                    <th> Pakura 1 Jumlah </th>
                                    <th> Pakura 1 Berat Kg  </th>
                                    <th> Pakura 2 Jumlah </th>
                                    <th> Pakura 2 Berat Kg  </th>
                                    <th> Pakura 3 Jumlah </th>
                                    <th> Pakura 3 Berat Kg  </th>
                                    <th> Pakura 4 Jumlah </th>
                                    <th> Pakura 4 Berat Kg  </th>
                                    <th> Pakura 5 Jumlah </th>
                                    <th> Pakura 5 Berat Kg  </th>
                                    <th> Pakura 6 Jumlah </th>
                                    <th> Pakura 6 Berat Kg  </th>
                                    <th> Kapal Jumlah </th>
                                    <th> Kapal Berat Kg  </th>
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
                               
                                <strong class="card-title">TABLE <?php echo $table3; ?></strong>
                              
                            </div>


                            <div class="card-body">

                              <?php echo $button_add_3 ; ?>

               
                      <table id="observerform_tangkapan_hasil_pakura" border="1" class="table-style table table-striped table-bordered " cellspacing="0" width="100px">
        
                           <thead>
                                <tr>
                                      <th> pakura1_mulai </th> 
                                      <th> pakura1_selesai  </th>
                                      <th> pakura1_mata_pancing  </th>
                                      <th> pakura2_mulai </th> 
                                      <th> pakura2_selesai  </th>
                                      <th> pakura2_mata_pancing  </th>
                                      <th> pakura3_mulai </th> 
                                      <th> pakura3_selesai  </th>
                                      <th> pakura3_mata_pancing  </th>
                                      <th> pakura4_mulai </th> 
                                      <th> pakura4_selesai  </th>
                                      <th> pakura4_mata_pancing  </th>
                                      <th> pakura5_mulai </th> 
                                      <th> pakura5_selesai  </th>
                                      <th> pakura5_mata_pancing  </th>
                                      <th> pakura6_mulai </th> 
                                      <th> pakura6_selesai  </th>
                                      <th> pakura6_mata_pancing  </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>

                              <tfoot>
                                <tr>
                                      <th> pakura1_mulai </th> 
                                      <th> pakura1_selesai  </th>
                                      <th> pakura1_mata_pancing  </th>
                                      <th> pakura2_mulai </th> 
                                      <th> pakura2_selesai  </th>
                                      <th> pakura2_mata_pancing  </th>
                                      <th> pakura3_mulai </th> 
                                      <th> pakura3_selesai  </th>
                                      <th> pakura3_mata_pancing  </th>
                                      <th> pakura4_mulai </th> 
                                      <th> pakura4_selesai  </th>
                                      <th> pakura4_mata_pancing  </th>
                                      <th> pakura5_mulai </th> 
                                      <th> pakura5_selesai  </th>
                                      <th> pakura5_mata_pancing  </th>
                                      <th> pakura6_mulai </th> 
                                      <th> pakura6_selesai  </th>
                                      <th> pakura6_mata_pancing  </th>
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

                                
                              <?php echo $button_add_2 ; ?>

                      <table id="observerform_tangkapan_detail" border="1" class="table-style table table-striped table-bordered" cellspacing="0" width="100%">
        
                            <thead>
                                <tr>
                                    <th> Nomor  </th>
                                    <th>Kode Species  </th>
                                    <th> Panjang (Cm)</th>
                                    <th>Berat (Kg)</th>
                                    <th>Alat Tangkap </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>

                             <tfoot>
                                <tr>
                                    <th> Nomor  </th>
                                    <th>Kode Species  </th>
                                    <th> Panjang (Cm)</th>
                                    <th>Berat (Kg)</th>
                                    <th>Alat Tangkap </th>
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



<!-- Modal 0 -->


<!-- Modal -->

 <div class="modal fade" tabindex="-1" role="dialog" id="myModalTable1">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <center><h5 class="modal-title">Tambah Total Hasil Tangkapan</h5></center>
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

    

        <input type="hidden" class="form-control" id="seq" name="seq" value="<?php echo $seq ; ?>" readonly required>

        <div class="form-group">
          <label for="exampleInputEmail1">kode_species</label>
   
           <select class="form-control" name="kode_species" id="kode_species">
                                     <option value="">Select Kode Species</option>
                                       <?php foreach($kode_ikan->result() as $row){ ?>
                                        <option value="<?php echo $row->fao ; ?>" ><?php echo $row->fao ; ?> - <?php echo $row->english ; ?></option>
                                       <?php  } ?>
                                </select>

        </div>


        <div class="row">

        <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura1_jum </label>
          <input type="text" class="form-control" id="pakura1_jum" name="pakura1_jum"   autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura1_ber (Kg) </label>
          <input type="text" class="form-control" id="pakura1_ber" name="pakura1_ber"   autocomplete=off step=".01">
        </div>
        </div>


        <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura2_jum </label>
          <input type="text" class="form-control" id="pakura2_jum" name="pakura2_jum"   autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura2_ber (Kg) </label>
          <input type="text" class="form-control" id="pakura2_ber" name="pakura2_ber"   autocomplete=off step=".01">
        </div>
        </div>


        <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura3_jum </label>
          <input type="text" class="form-control" id="pakura3_jum" name="pakura3_jum"  autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura3_ber (Kg) </label>
          <input type="text" class="form-control" id="pakura3_ber" name="pakura3_ber" autocomplete=off step=".01">
        </div>
        </div>


        <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura4_jum </label>
          <input type="text" class="form-control" id="pakura4_jum" name="pakura4_jum"  autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura4_ber (Kg) </label>
          <input type="text" class="form-control" id="pakura4_ber" name="pakura4_ber" autocomplete=off step=".01">
        </div>
        </div>


        <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura5_jum </label>
          <input type="text" class="form-control" id="pakura5_jum" name="pakura5_jum"  autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura5_ber (Kg) </label>
          <input type="text" class="form-control" id="pakura5_ber" name="pakura5_ber"   autocomplete=off step=".01">
        </div>
        </div>


        <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura6_jum </label>
          <input type="text" class="form-control" id="pakura6_jum" name="pakura6_jum"    autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura6_ber (Kg) </label>
          <input type="text" class="form-control" id="pakura6_ber" name="pakura6_ber"   autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">kapal_jum </label>
          <input type="text" class="form-control" id="kapal_jum" name="kapal_jum"  autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">kapal_ber (Kg) </label>
          <input type="text" class="form-control" id="kapal_ber" name="kapal_ber"  autocomplete=off step=".01">
        </div>
        </div>


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
            <center><h5 class="modal-title">Update Total Hasil Tangkapan</h5></center>
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

       
         <input type="hidden" class="form-control" id="edit_seq" name="edit_seq" value="<?php echo $seq ; ?>" readonly required>

        <div class="form-group">
          <label for="exampleInputEmail1">nomor</label>
          <input type="text" class="form-control" id="edit_nomor" name="edit_nomor" readonly required>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">kode_species</label>
   
           <select class="form-control" name="edit_kode_species" id="edit_kode_species">
                                     <option value="">Select Kode Species</option>
                                       <?php foreach($kode_ikan->result() as $row){ ?>
                                        <option value="<?php echo $row->fao ; ?>" ><?php echo $row->fao ; ?> - <?php echo $row->english ; ?></option>
                                       <?php  } ?>
                                </select>

        </div>


        <div class="row">

        <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura1_jum </label>
          <input type="text" class="form-control" id="edit_pakura1_jum" name="edit_pakura1_jum"   autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura1_ber (Kg) </label>
          <input type="text" class="form-control" id="edit_pakura1_ber" name="edit_pakura1_ber"   autocomplete=off step=".01">
        </div>
        </div>


        <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura2_jum </label>
          <input type="text" class="form-control" id="edit_pakura2_jum" name="edit_pakura2_jum"   autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura2_ber (Kg) </label>
          <input type="text" class="form-control" id="edit_pakura2_ber" name="edit_pakura2_ber"   autocomplete=off step=".01">
        </div>
        </div>


        <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura3_jum </label>
          <input type="text" class="form-control" id="edit_pakura3_jum" name="edit_pakura3_jum"  autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura3_ber (Kg) </label>
          <input type="text" class="form-control" id="edit_pakura3_ber" name="edit_pakura3_ber" autocomplete=off step=".01">
        </div>
        </div>


        <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura4_jum </label>
          <input type="text" class="form-control" id="edit_pakura4_jum" name="edit_pakura4_jum"  autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura4_ber (Kg) </label>
          <input type="text" class="form-control" id="edit_pakura4_ber" name="edit_pakura4_ber" autocomplete=off step=".01">
        </div>
        </div>


        <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura5_jum </label>
          <input type="text" class="form-control" id="edit_pakura5_jum" name="edit_pakura5_jum"  autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura5_ber (Kg) </label>
          <input type="text" class="form-control" id="edit_pakura5_ber" name="edit_pakura5_ber"   autocomplete=off step=".01">
        </div>
        </div>


        <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura6_jum </label>
          <input type="text" class="form-control" id="edit_pakura6_jum" name="edit_pakura6_jum"  autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura6_ber (Kg) </label>
          <input type="text" class="form-control" id="edit_pakura6_ber" name="edit_pakura6_ber"   autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">kapal_jum </label>
          <input type="text" class="form-control" id="edit_kapal_jum" name="edit_kapal_jum"  autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">kapal_ber (Kg) </label>
          <input type="text" class="form-control" id="edit_kapal_ber" name="edit_kapal_ber"  autocomplete=off step=".01">
        </div>
        </div>


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
    <div class="modal-dialog modal-md" role="document">
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



<!-- tABLE 3 Modal -->

<!-- Modal -->

<!-- Modal -->

 <div class="modal fade" tabindex="-1" role="dialog" id="myModalTable3">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <center><h5 class="modal-title">Tambah Total Hasil Pakura</h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form class="form-horizontal" action="<?php echo $url_add_table3; ?>" method="post" id="AddDataTable3Form">
      <div class="modal-body">

        <div class="messages"></div>


          <div class="form-group">
          <label for="exampleInputEmail1">id_trip</label>
          <input type="text" class="form-control" id="id_trip" name="id_trip" value="<?php echo $kode_trip ; ?>" readonly required>
        </div>

    

        <input type="hidden" class="form-control" id="seq" name="seq" value="<?php echo $seq ; ?>" readonly required>



        <div class="row">

        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura1_mulai </label>
          <input type="text" class="form-control" id="pakura1_mulai" name="pakura1_mulai"   autocomplete=off step=".01">
        </div>
        </div>
         <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura1_selesai </label>
          <input type="text" class="form-control" id="pakura1_selesai" name="pakura1_selesai"   autocomplete=off step=".01">
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura1_mata_pancing </label>
          <input type="text" class="form-control" id="pakura1_mata_pancing" name="pakura1_mata_pancing"   autocomplete=off step=".01">
        </div>
        </div>

        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura2_mulai </label>
          <input type="text" class="form-control" id="pakura2_mulai" name="pakura2_mulai"   autocomplete=off step=".01">
        </div>
        </div>
         <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura2_selesai </label>
          <input type="text" class="form-control" id="pakura2_selesai" name="pakura2_selesai"   autocomplete=off step=".01">
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura2_mata_pancing </label>
          <input type="text" class="form-control" id="pakura2_mata_pancing" name="pakura2_mata_pancing"   autocomplete=off step=".01">
        </div>
        </div>
        
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura3_mulai </label>
          <input type="text" class="form-control" id="pakura3_mulai" name="pakura3_mulai"   autocomplete=off step=".01">
        </div>
        </div>
         <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura3_selesai </label>
          <input type="text" class="form-control" id="pakura3_selesai" name="pakura3_selesai"   autocomplete=off step=".01">
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura3_mata_pancing </label>
          <input type="text" class="form-control" id="pakura3_mata_pancing" name="pakura3_mata_pancing"   autocomplete=off step=".01">
        </div>
        </div>
    
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura4_mulai </label>
          <input type="text" class="form-control" id="pakura4_mulai" name="pakura4_mulai"   autocomplete=off step=".01">
        </div>
        </div>
         <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura4_selesai </label>
          <input type="text" class="form-control" id="pakura4_selesai" name="pakura4_selesai"   autocomplete=off step=".01">
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura4_mata_pancing </label>
          <input type="text" class="form-control" id="pakura4_mata_pancing" name="pakura4_mata_pancing"   autocomplete=off step=".01">
        </div>
        </div>
    
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura5_mulai </label>
          <input type="text" class="form-control" id="pakura5_mulai" name="pakura5_mulai"   autocomplete=off step=".01">
        </div>
        </div>
         <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura5_selesai </label>
          <input type="text" class="form-control" id="pakura5_selesai" name="pakura5_selesai"   autocomplete=off step=".01">
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura5_mata_pancing </label>
          <input type="text" class="form-control" id="pakura5_mata_pancing" name="pakura5_mata_pancing"   autocomplete=off step=".01">
        </div>
        </div>
    
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura6_mulai </label>
          <input type="text" class="form-control" id="pakura6_mulai" name="pakura6_mulai"   autocomplete=off step=".01">
        </div>
        </div>
         <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura6_selesai </label>
          <input type="text" class="form-control" id="pakura6_selesai" name="pakura6_selesai"   autocomplete=off step=".01">
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura6_mata_pancing </label>
          <input type="text" class="form-control" id="pakura6_mata_pancing" name="pakura6_mata_pancing"   autocomplete=off step=".01">
        </div>
        </div>
    
    
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">kapal_mulai </label>
          <input type="text" class="form-control" id="kapal_mulai" name="kapal_mulai"   autocomplete=off step=".01">
        </div>
        </div>
         <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">kapal_selesai </label>
          <input type="text" class="form-control" id="kapal_selesai" name="kapal_selesai"   autocomplete=off step=".01">
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">kapal_mata_pancing </label>
          <input type="text" class="form-control" id="kapal_mata_pancing" name="kapal_mata_pancing"   autocomplete=off step=".01">
        </div>
        </div>
    
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">ikan_bertanda_tag </label>
          <input type="text" class="form-control" id="ikan_bertanda_tag" name="ikan_bertanda_tag"   autocomplete=off step=".01">
        </div>
        </div>
         <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">kode_species </label>
          <select class="form-control" name="kode_species_pakura" id="kode_species_pakura">
                                     <option value="">Select Kode Species</option>
                                       <?php foreach($kode_ikan->result() as $row){ ?>
                                        <option value="<?php echo $row->fao ; ?>" ><?php echo $row->fao ; ?> - <?php echo $row->english ; ?></option>
                                       <?php  } ?>
                                </select>
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">kelamin </label>
          <input type="text" class="form-control" id="kelamin" name="kelamin"   autocomplete=off step=".01">
        </div>
        </div>
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">panjang </label>
          <input type="text" class="form-control" id="panjang" name="panjang"   autocomplete=off step=".01">
        </div>
        </div>
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">berat </label>
          <input type="text" class="form-control" id="berat" name="berat"   autocomplete=off step=".01">
        </div>
        </div>

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



<div class="modal fade" tabindex="-1" role="dialog" id="editTable3Modal">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <center><h5 class="modal-title">Update Total Hasil Tangkapan</h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form class="form-horizontal" action="<?php echo $url_update_table3; ?>" method="post" id="EditDataTable3Form">
       <div class="modal-body">

        <div class="edit-messages"></div>


          <div class="form-group">
          <label for="exampleInputEmail1">id_trip</label>
          <input type="text" class="form-control" id="edit_id_trip_pakura" name="edit_id_trip_pakura" value="<?php echo $kode_trip ; ?>" readonly required>
        </div>

       
         <input type="hidden" class="form-control" id="edit_seq_pakura" name="edit_seq_pakura" value="<?php echo $seq ; ?>" readonly required>

        <div class="row">

       <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura1_mulai </label>
          <input type="text" class="form-control" id="edit_pakura1_mulai" name="edit_pakura1_mulai"   autocomplete=off step=".01">
        </div>
        </div>
         <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura1_selesai </label>
          <input type="text" class="form-control" id="edit_pakura1_selesai" name="edit_pakura1_selesai"   autocomplete=off step=".01">
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura1_mata_pancing </label>
          <input type="text" class="form-control" id="edit_pakura1_mata_pancing" name="edit_pakura1_mata_pancing"   autocomplete=off step=".01">
        </div>
        </div>

        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura2_mulai </label>
          <input type="text" class="form-control" id="edit_pakura2_mulai" name="edit_pakura2_mulai"   autocomplete=off step=".01">
        </div>
        </div>
         <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura2_selesai </label>
          <input type="text" class="form-control" id="edit_pakura2_selesai" name="edit_pakura2_selesai"   autocomplete=off step=".01">
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura2_mata_pancing </label>
          <input type="text" class="form-control" id="edit_pakura2_mata_pancing" name="edit_pakura2_mata_pancing"   autocomplete=off step=".01">
        </div>
        </div>
        
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura3_mulai </label>
          <input type="text" class="form-control" id="edit_pakura3_mulai" name="edit_pakura3_mulai"   autocomplete=off step=".01">
        </div>
        </div>
         <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura3_selesai </label>
          <input type="text" class="form-control" id="edit_pakura3_selesai" name="edit_pakura3_selesai"   autocomplete=off step=".01">
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura3_mata_pancing </label>
          <input type="text" class="form-control" id="edit_pakura3_mata_pancing" name="edit_pakura3_mata_pancing"   autocomplete=off step=".01">
        </div>
        </div>
    
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura4_mulai </label>
          <input type="text" class="form-control" id="edit_pakura4_mulai" name="edit_pakura4_mulai"   autocomplete=off step=".01">
        </div>
        </div>
         <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura4_selesai </label>
          <input type="text" class="form-control" id="edit_pakura4_selesai" name="edit_pakura4_selesai"   autocomplete=off step=".01">
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura4_mata_pancing </label>
          <input type="text" class="form-control" id="edit_pakura4_mata_pancing" name="edit_pakura4_mata_pancing"   autocomplete=off step=".01">
        </div>
        </div>
    
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura5_mulai </label>
          <input type="text" class="form-control" id="edit_pakura5_mulai" name="edit_pakura5_mulai"   autocomplete=off step=".01">
        </div>
        </div>
         <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura5_selesai </label>
          <input type="text" class="form-control" id="edit_pakura5_selesai" name="edit_pakura5_selesai"   autocomplete=off step=".01">
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura5_mata_pancing </label>
          <input type="text" class="form-control" id="edit_pakura5_mata_pancing" name="edit_pakura5_mata_pancing"   autocomplete=off step=".01">
        </div>
        </div>
    
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura6_mulai </label>
          <input type="text" class="form-control" id="edit_pakura6_mulai" name="edit_pakura6_mulai"   autocomplete=off step=".01">
        </div>
        </div>
         <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura6_selesai </label>
          <input type="text" class="form-control" id="edit_pakura6_selesai" name="edit_pakura6_selesai"   autocomplete=off step=".01">
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">pakura6_mata_pancing </label>
          <input type="text" class="form-control" id="edit_pakura6_mata_pancing" name="edit_pakura6_mata_pancing"   autocomplete=off step=".01">
        </div>
        </div>
    
    
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">kapal_mulai </label>
          <input type="text" class="form-control" id="edit_kapal_mulai" name="edit_kapal_mulai"   autocomplete=off step=".01">
        </div>
        </div>
         <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">kapal_selesai </label>
          <input type="text" class="form-control" id="edit_kapal_selesai" name="edit_kapal_selesai"   autocomplete=off step=".01">
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">kapal_mata_pancing </label>
          <input type="text" class="form-control" id="edit_kapal_mata_pancing" name="edit_kapal_mata_pancing"   autocomplete=off step=".01">
        </div>
        </div>
    
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">ikan_bertanda_tag </label>
          <input type="text" class="form-control" id="edit_ikan_bertanda_tag" name="edit_ikan_bertanda_tag"   autocomplete=off step=".01">
        </div>
        </div>
    
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">kode_species </label>
          <select class="form-control" name="edit_kode_species_pakura" id="edit_kode_species_pakura">
                                     <option value="">Select Kode Species</option>
                                       <?php foreach($kode_ikan->result() as $row){ ?>
                                        <option value="<?php echo $row->fao ; ?>" ><?php echo $row->fao ; ?> - <?php echo $row->english ; ?></option>
                                       <?php  } ?>
                                </select>
        </div>
        </div>
        <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">kelamin </label>
          <input type="text" class="form-control" id="edit_kelamin_pakura" name="edit_kelamin_pakura"   autocomplete=off step=".01">
        </div>
        </div>
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">panjang </label>
          <input type="text" class="form-control" id="edit_panjang_pakura" name="edit_panjang_pakura"   autocomplete=off step=".01">
        </div>
        </div>
    <div class='col-md-4' >
         <div class="form-group">
          <label for="exampleInputEmail1">berat </label>
          <input type="text" class="form-control" id="edit_berat_pakura" name="edit_berat_pakura"   autocomplete=off step=".01">
        </div>
        </div>




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
  <div class="modal fade" tabindex="-1" role="dialog" id="disableTable3Modal">
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
          <button type="button" class="btn btn-primary" id="hapusBtn3">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- /remove modal -->



<!--End  tABLE 3 Modal -->


<!-- tABLE 2 Modal -->

 <div class="modal fade" tabindex="-1" role="dialog" id="myModalTable2">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <center><h5 class="modal-title">Tambah Total Hasil Tangkapan Detail </h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form class="form-horizontal" action="<?php echo $url_add_table2; ?>" method="post" id="AddDataTable2Form">
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
           <select class="form-control" name="kode_species" id="kode_species_detil" onchange="changeSpecies()">
                                     <option value="">Select Kode Species</option>
                                       <?php foreach($kode_ikan->result() as $row){ ?>
                                        <option value="<?php echo $row->fao ; ?>" ><?php echo $row->fao ; ?> - <?php echo $row->english ; ?></option>
                                       <?php  } ?>
                                </select>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">panjang (Cm)</label>
          <input type="number" class="form-control" id="panjang" name="panjang"  max="???" min="???" step="0.5" autocomplete=off required>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">berat (Kg) </label>
          <input type="number" class="form-control" id="berat" name="berat"  max="???" min="???" autocomplete=off step=".01">
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">alat tangkap </label>
          <input type="text" class="form-control" id="alat_tangkap" name="alat_tangkap"   autocomplete=off >
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
            <center><h5 class="modal-title">Update Total Hasil Tangkapan Detail</h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form class="form-horizontal" action="<?php echo $url_update_table2; ?>" method="post" id="EditDataTable2Form">
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
          <input type="text" class="form-control" id="edit_nomor2" name="edit_nomor" readonly required>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">kode_species</label>
          <!--<input type="text" class="form-control" id="edit_kode_species2" name="edit_kode_species" placeholder="Enter kode_species" required>-->
          <select class="form-control" name="edit_kode_species2" id="edit_kode_species2" onchange="changeSpecies2()">
                                     <option value="">Select Kode Species</option>
                                       <?php foreach($kode_ikan->result() as $row){ ?>
                                        <option value="<?php echo $row->fao ; ?>" ><?php echo $row->fao ; ?> - <?php echo $row->english ; ?></option>
                                       <?php  } ?>
                                </select>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">edit_panjang (Kg) </label>
          <input type="number" class="form-control" id="edit_panjang" name="edit_panjang" max="???" min="???" step="0.5" autocomplete=off  required>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">edit_berat (Kg) </label>
          <input type="number" class="form-control" id="edit_berat" name="edit_berat"   autocomplete=off step=".01">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">alat tangkap </label>
          <input type="text" class="form-control" id="edit_alat_tangkap" name="edit_alat_tangkap"   autocomplete=off >
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

<!-- Table 2 Modal -->



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
  
   observerform_tangkapan_hasil = $("#observerform_tangkapan_hasil").DataTable({
    "ajax": "<?php echo $url_load_table ?>",
        "order": [],   
    "scrollX": true
    });

   observerform_tangkapan_detail = $("#observerform_tangkapan_detail").DataTable({
    "ajax": "<?php echo $url_load_table2 ?>",
        "order": [],   
    "scrollX": true
    });

   observerform_tangkapan_hasil_pakura = $("#observerform_tangkapan_hasil_pakura").DataTable({
    "ajax": "<?php echo $url_load_table3 ?>",
        "order": [],   
    "scrollX": true
    });






     $('#AddDataTable1Btn').on('click',function(){

      clear_text();
        
      $('#AddDataTable1Form')[0].reset();
      $('.form-group').removeClass('has-error').removeClass('has-success');
      $('.text-danger').remove();
      $('.messages').html("");
       
      $('#AddDataTable1Form').unbind('submit').bind('submit',function(e){

        alert('tes2');
        
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
                            observerform_tangkapan_hasil.ajax.reload(null,false);

                            


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


              clear_text(); 


          return false;  
      });
      
    });


    $('#AddDataTable3Btn').on('click',function(){
        
      $('#AddDataTable3Form')[0].reset();
      $('.form-group').removeClass('has-error').removeClass('has-success');
      $('.text-danger').remove();
      $('.messages').html("");
       
      $('#AddDataTable3Form').unbind('submit').bind('submit',function(e){

      
        
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
                            $('#AddDataTable3Form')[0].reset();
                            //reload the datatables
                            observerform_tangkapan_hasil_pakura.ajax.reload(null,false);
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
                            observerform_tangkapan_detail.ajax.reload(null,false);
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

  clear_text(); 

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
              $('#edit_kode_name').val(response.messages[0].kode_species);
              $('#edit_kode_species').val(response.messages[0].kode_species);


              if(response.messages[0].pakura1_jum == "0"){
                $('#edit_pakura1_jum').val("");
              }else{
                $('#edit_pakura1_jum').val(response.messages[0].pakura1_jum); 
              }
              if(response.messages[0].pakura1_ber == "0"){
                $('#edit_pakura1_ber').val("");
              }else{
                $('#edit_pakura1_ber').val(response.messages[0].pakura1_ber); 
              }

              if(response.messages[0].pakura2_jum == "0"){
                $('#edit_pakura2_jum').val("");
              }else{
                $('#edit_pakura2_jum').val(response.messages[0].pakura2_jum); 
              }
              if(response.messages[0].pakura2_ber == "0"){
                $('#edit_pakura2_ber').val("");
              }else{
                $('#edit_pakura2_ber').val(response.messages[0].pakura2_ber); 
              }

              if(response.messages[0].pakura3_jum == "0"){
                $('#edit_pakura3_jum').val("");
              }else{
                $('#edit_pakura3_jum').val(response.messages[0].pakura3_jum); 
              }
              if(response.messages[0].pakura3_ber == "0"){
                $('#edit_pakura3_ber').val("");
              }else{
                $('#edit_pakura3_ber').val(response.messages[0].pakura3_ber); 
              }

              if(response.messages[0].pakura4_jum == "0"){
                $('#edit_pakura4_jum').val("");
              }else{
                $('#edit_pakura4_jum').val(response.messages[0].pakura4_jum); 
              }
              if(response.messages[0].pakura4_ber == "0"){
                $('#edit_pakura4_ber').val("");
              }else{
                $('#edit_pakura4_ber').val(response.messages[0].pakura4_ber); 
              }

              if(response.messages[0].pakura5_jum == "0"){
                $('#edit_pakura5_jum').val("");
              }else{
                $('#edit_pakura5_jum').val(response.messages[0].pakura5_jum); 
              }
              if(response.messages[0].pakura5_ber == "0"){
                $('#edit_pakura5_ber').val("");
              }else{
                $('#edit_pakura5_ber').val(response.messages[0].pakura5_ber); 
              }

              if(response.messages[0].pakura6_jum == "0"){
                $('#edit_pakura6_jum').val("");
              }else{
                $('#edit_pakura6_jum').val(response.messages[0].pakura6_jum); 
              }
              if(response.messages[0].pakura6_ber == "0"){
                $('#edit_pakura6_ber').val("");
              }else{
                $('#edit_pakura6_ber').val(response.messages[0].pakura6_ber); 
              }

              if(response.messages[0].kapal_jum == "0"){
                $('#edit_kapal_jum').val("");
              }else{
                $('#edit_kapal_jum').val(response.messages[0].kapal_jum); 
              }
              if(response.messages[0].kapal_ber == "0"){
                $('#edit_kapal_ber').val("");
              }else{
                $('#edit_kapal_ber').val(response.messages[0].kapal_ber); 
              }
          

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
                        
                    
                        observerform_tangkapan_hasil.ajax.reload(null,false);
                        
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


  function editData3(id_trip = null, seq=null ){



  if(id_trip){
        $(".form-group").removeClass('has-error').removeClass('has-success');
        $(".text-danger").remove();
        // empty the message div
        $(".edit-messages").html("");

         $('#EditDataTable3Form')[0].reset();

         $.ajax({
            url: '<?php echo $url_show_table3; ?>',
            type: 'post',
            data: {id_trip : id_trip , seq : seq  },
            dataType: 'json',
            success:function(response) {

              $('#edit_nomor_pakura').val(response.messages[0].seq_tangkapan);
              $('#edit_pakura1_mulai').val(response.messages[0].pakura1_mulai);
              $('#edit_pakura1_selesai').val(response.messages[0].pakura1_selesai); 
              $('#edit_pakura1_mata_pancing').val(response.messages[0].pakura1_mata_pancing); 
              $('#edit_pakura2_mulai').val(response.messages[0].pakura2_mulai); 
              $('#edit_pakura2_selesai').val(response.messages[0].pakura2_selesai); 
              $('#edit_pakura2_mata_pancing').val(response.messages[0].pakura2_mata_pancing); 
              $('#edit_pakura3_mulai').val(response.messages[0].pakura3_mulai); 
              $('#edit_pakura3_selesai').val(response.messages[0].pakura3_selesai); 
              $('#edit_pakura3_mata_pancing').val(response.messages[0].pakura3_mata_pancing);
              $('#edit_pakura4_mulai').val(response.messages[0].pakura4_mulai); 
              $('#edit_pakura4_selesai').val(response.messages[0].pakura4_selesai); 
              $('#edit_pakura4_mata_pancing').val(response.messages[0].pakura4_mata_pancing); 
              $('#edit_pakura5_mulai').val(response.messages[0].pakura5_mulai); 
              $('#edit_pakura5_selesai').val(response.messages[0].pakura5_selesai); 
              $('#edit_pakura5_mata_pancing').val(response.messages[0].pakura5_mata_pancing); 
              $('#edit_pakura6_mulai').val(response.messages[0].pakura6_mulai); 
              $('#edit_pakura6_selesai').val(response.messages[0].pakura6_selesai); 
              $('#edit_pakura6_mata_pancing').val(response.messages[0].pakura6_mata_pancing); 
              $('#edit_kapal_mulai').val(response.messages[0].kapal_mulai); 
              $('#edit_kapal_selesai').val(response.messages[0].kapal_selesai); 
              $('#edit_kapal_mata_pancing').val(response.messages[0].kapal_mata_pancing); 
              $('#edit_ikan_bertanda_tag').val(response.messages[0].ikan_bertanda_tag); 
              $('#edit_kode_species_pakura').val(response.messages[0].kode_species);
              $('#edit_kelamin_pakura').val(response.messages[0].kelamin); 
              $('#edit_panjang_pakura').val(response.messages[0].panjang); 
              $('#edit_berat_pakura').val(response.messages[0].berat); 


              $("#EditDataTable3Form").unbind('submit').bind('submit', function(e) {

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
                        
                        observerform_tangkapan_hasil_pakura.ajax.reload(null,false);
                        
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
              $('#edit_kode_name').val(response.messages[0].kode_species);
              $('#edit_kode_species2').val(response.messages[0].kode_species);
              $('#edit_panjang').val(response.messages[0].panjang);
              $('#edit_berat').val(response.messages[0].berat);
              $('#edit_alat_tangkap').val(response.messages[0].alat_tangkap);
            
          

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
                        
                    
                        observerform_tangkapan_detail.ajax.reload(null,false);
                        
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
                    
                    observerform_tangkapan_hasil.ajax.reload(null,false);
                    alert('berhasil');
                    $('#disableSupplierModal').modal('hide');

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

function disableData3(id_trip = null, seq=null ){


     if(id_trip) {
      
      $("#hapusBtn3").unbind('click').bind('click', function() {


          $.ajax({
                url: '<?php echo $url_delete_table3; ?>',
                type: 'post',
                data: { id_trip : id_trip , seq : seq  },
                dataType: 'json',
                success:function(response) {
                  console.log(response);
                     if (response.success == true) {       
                        $(".disable-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                            '</div>');
                    
                    observerform_tangkapan_hasil_pakura.ajax.reload();


                    alert('berhasil');

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
                    
                    observerform_tangkapan_detail.ajax.reload(null,false);
                    alert('berhasil');
                    $('#disableTable2Modal').modal('hide');

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




function clear_text(){



            document.getElementById('pakura1_jum').disabled = false; 

            document.getElementById('pakura2_jum').disabled = false; 

            document.getElementById('pakura3_jum').disabled = false; 

            document.getElementById('pakura4_jum').disabled = false; 

            document.getElementById('pakura5_jum').disabled = false; 

            document.getElementById('pakura6_jum').disabled = false; 

            document.getElementById('pakura1_ber').disabled = false; 

            document.getElementById('pakura2_ber').disabled = false; 

            document.getElementById('pakura3_ber').disabled = false; 

            document.getElementById('pakura4_ber').disabled = false; 

            document.getElementById('pakura5_ber').disabled = false; 

            document.getElementById('pakura6_ber').disabled = false; 




            

}


function changeSpecies(){

  var kode_species = document.getElementById("kode_species_detil").value;

  if(kode_species == 'YFT' || kode_species == 'BET' || kode_species == 'ALB' || kode_species == 'SKJ'){

    $("#panjang").attr({
         "max" : 200,
         "min" : 10
      });


     $("#berat").attr({
         "max" : 200,
         "min" : 0
      });

  }
    

}


function changeSpecies2(){


  var kode_species = document.getElementById("edit_kode_species2").value;

  if(kode_species == 'YFT' || kode_species == 'BET' || kode_species == 'ALB' || kode_species == 'SKJ'){

    $("#edit_panjang").attr({
         "max" : 200,
         "min" : 10
      });


     $("#edit_berat").attr({
        "max" : 200,
         "min" : 0
      });

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

      var val = document.getElementById('total_enumerasi_jum').value;

      document.getElementById('total_enumerasi_jum').value = addCommas(val);  

      var val = document.getElementById('total_enumerasi_berat').value;

      document.getElementById('total_enumerasi_berat').value = addCommas(val);  



      var val = document.getElementById('keranj1_jum').value;

      document.getElementById('keranj1_jum').value = addCommas(val);  

      var val = document.getElementById('keranj1_ber').value;

      document.getElementById('keranj1_ber').value = addCommas(val);  


      var val = document.getElementById('keranj2_jum').value;

      document.getElementById('keranj2_jum').value = addCommas(val);  

      var val = document.getElementById('keranj2_ber').value;

      document.getElementById('keranj2_ber').value = addCommas(val);


      var val = document.getElementById('keranj3_jum').value;

      document.getElementById('keranj3_jum').value = addCommas(val);  

      var val = document.getElementById('keranj3_ber').value;

      document.getElementById('keranj3_ber').value = addCommas(val);  


      var val = document.getElementById('keranj4_jum').value;

      document.getElementById('keranj4_jum').value = addCommas(val);  

      var val = document.getElementById('keranj4_ber').value;

      document.getElementById('keranj4_ber').value = addCommas(val);  


      var val = document.getElementById('keranj5_jum').value;

      document.getElementById('keranj5_jum').value = addCommas(val);  

      var val = document.getElementById('keranj5_ber').value;

      document.getElementById('keranj5_ber').value = addCommas(val); 


      var val = document.getElementById('keranj6_jum').value;

      document.getElementById('keranj6_jum').value = addCommas(val);  

      var val = document.getElementById('keranj6_ber').value;

      document.getElementById('keranj6_ber').value = addCommas(val);  
}



function textAddCommasUpdate(){


      var val = document.getElementById('edit_total_enumerasi_jum').value;

      document.getElementById('edit_total_enumerasi_jum').value = addCommas(val);  

      var val = document.getElementById('edit_total_enumerasi_berat').value;

      document.getElementById('edit_total_enumerasi_berat').value = addCommas(val);  



      var val = document.getElementById('edit_keranj1_jum').value;

      document.getElementById('edit_keranj1_jum').value = addCommas(val);  

      var val = document.getElementById('edit_keranj1_ber').value;

      document.getElementById('edit_keranj1_ber').value = addCommas(val);  


      var val = document.getElementById('edit_keranj2_jum').value;

      document.getElementById('edit_keranj2_jum').value = addCommas(val);  

      var val = document.getElementById('edit_keranj2_ber').value;

      document.getElementById('edit_keranj2_ber').value = addCommas(val);


      var val = document.getElementById('edit_keranj3_jum').value;

      document.getElementById('edit_keranj3_jum').value = addCommas(val);  

      var val = document.getElementById('edit_keranj3_ber').value;

      document.getElementById('edit_keranj3_ber').value = addCommas(val);  


      var val = document.getElementById('edit_keranj4_jum').value;

      document.getElementById('edit_keranj4_jum').value = addCommas(val);  

      var val = document.getElementById('edit_keranj4_ber').value;

      document.getElementById('edit_keranj4_ber').value = addCommas(val);  


      var val = document.getElementById('edit_keranj5_jum').value;

      document.getElementById('edit_keranj5_jum').value = addCommas(val);  

      var val = document.getElementById('edit_keranj5_ber').value;

      document.getElementById('edit_keranj5_ber').value = addCommas(val); 


      var val = document.getElementById('edit_keranj6_jum').value;

      document.getElementById('edit_keranj6_jum').value = addCommas(val);  

      var val = document.getElementById('edit_keranj6_ber').value;

      document.getElementById('edit_keranj6_ber').value = addCommas(val);  





}




</script>

<style>

div.dataTables_wrapper {
        width: 1600px;
        margin: 0 auto;
    }

</style>