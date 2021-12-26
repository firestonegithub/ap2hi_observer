

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
                                    <li><a href="<?php echo base_url()."trip/form3/".$kode_trip; ?>"><?php echo $page_name ; ?></a></li>
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
                                <b><?php if( !empty($berat_keranjang_kosong_dec) ) { echo '<label style="color:red;">(*) '.$berat_keranjang_kosong_dec.'</label>' ; } ?></b>


                                
                                <?php 
                                 $attributes = array('class'=>'form-horizontal','role'=>'form');
                                    echo form_open_multipart('trip/form3_update/'.$kode_trip."/".$seq,$attributes); 
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
                            <th width='120px' scope='row'>Id Set</th>   
                            <td> <input type="text" class="form-control" id="seq" name="seq" value="<?php echo $seq ; ?>" readonly required></td>
                       </tr>

                        
                       <!--
                       
                      <tr>
                            <th width='120px' scope='row'>hari</th>   
                            <td><input type='text' class='form-control' name='hari' value="<?php if( !empty($post['hari']) ){ echo $post['hari']; } ?>" autocomplete=off ></td>
                      </tr>

                      
                      <tr>
                            <th width='120px' scope='row'>bulan</th>   
                            <td><input type='text' class='form-control' name='bulan' value="<?php if( !empty($post['bulan']) ){ echo $post['bulan']; } ?>" autocomplete=off></td>
                      </tr>

                       
                      <tr>
                            <th width='120px' scope='row'>tahun</th>   
                            <td><input type='text' class='form-control' name='tahun' value="<?php if( !empty($post['tahun']) ){ echo $post['tahun']; } ?>" autocomplete=off></td>
                      </tr>

                      -->

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
                               
                                 <!--<div class="row">
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
                            <th width='120px' scope='row'>jam_selesai (*) (contoh: 11:45 AM)</th>   
                            <td>
                             
                                 <input type='time' class='form-control' name='waktu_selesai' value="<?php if( !empty($post['waktu_selesai']) ){ echo $post['waktu_selesai']; } ?>" autocomplete=off min="0" max ="23" placeholder="jam">
                               
                                 <!--<div class="row">
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
                              <!--<input type='text' class='form-control' name='alat_pengukur' value="<?php if( !empty($post['alat_pengukur']) ){ echo $post['alat_pengukur']; } ?>" autocomplete=off>-->
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
                              <!--<input type='text' class='form-control' name='lintang' value="<?php if( !empty($post['lintang']) ){ echo $post['lintang']; } ?>">-->

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


                      <!--<tr>
                            <th width='120px' scope='row'>u_s</th>   
                            <td><input type='text' class='form-control' name='u_s' value="<?php if( !empty($post['u_s']) ){ echo $post['u_s']; } ?>"></td>
                      </tr>-->

                       
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

                       
                      <!--<tr>
                            <th width='120px' scope='row'>t_b</th>   
                            <td><input type='text' class='form-control' name='t_b' value="<?php if( !empty($post['t_b']) ){ echo $post['t_b']; } ?>"></td>
                      </tr>-->

                       
                      <tr>
                            <th width='120px' scope='row'>fad 1</th>   
                            <td>
                              <!--<input type='text' class='form-control' name='fad' value="<?php if( !empty($post['fad']) ){ echo $post['fad']; } ?>" autocomplete=off>-->

                               <select class='form-control' name='fad' id="fad">
                                              <option value="" >Pilih salah satu</option>
                                            <option value="menetap" <?php if( !empty($post['fad']) ){  if ( $post['fad'] == 'menetap' ) { echo 'selected'; } } ?> >Menetap</option>
                                            <option value="hanyut" <?php if( !empty($post['fad']) ){  if ( $post['fad'] == 'hanyut' ) { echo 'selected'; } } ?> >Hanyut</option>
                                </select>
                            </td>
                      </tr>

                      <tr>
                            <th width='120px' scope='row'>fad 2</th>   
                            <td>
                              <!--<input type='text' class='form-control' name='fad' value="<?php if( !empty($post['fad']) ){ echo $post['fad']; } ?>" autocomplete=off>-->
                              <input type="checkbox" name="fad2[]" value="berumah" <?php if(in_array('berumah', $post['fad2'])){ echo 'checked'; }  ?> >Berumah
                              <input type="checkbox" name="fad2[]" value="ponton" <?php if(in_array('ponton', $post['fad2'])){ echo 'checked'; }  ?> >Ponton
                              <input type="checkbox" name="fad2[]" value="styrofoam" <?php if(in_array('styrofoam', $post['fad2'])){ echo 'checked'; }  ?> >Styrofoam
                              <input type="checkbox" name="fad2[]" value="rakit" <?php if(in_array('rakit', $post['fad2'])){ echo 'checked'; }  ?> >Rakit


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
                            <th width='120px' scope='row'>ikan_terlihat_dengan</th>   
                             <td>
                                <select class="form-control" name="ikan_terlihat_dengan" id="ikan_terlihat_dengan">
                                     <option value="">Select ikan_terlihat_dengan</option>
                                       <?php foreach($kode_ikan_terlihat->result() as $row){ ?>
                                        <option value="<?php echo $row->kode_aktivitas ; ?>" <?php if( !empty($post['ikan_terlihat_dengan']) ){  if ( $post['ikan_terlihat_dengan'] == $row->kode_aktivitas ) { echo 'selected'; } } ?>><?php echo $row->kode_aktivitas ; ?> - <?php echo $row->nama_aktivitas ; ?></option>
                                       <?php  } ?>
                                </select>
                             </td>
                    </tr>


                      <tr>
                            <th width='120px' scope='row'>foto_fad</th>   
                            <td><!--<input type='text' class='form-control' name='foto_fad' value="<?php if( !empty($post['foto_fad']) ){ echo $post['foto_fad']; } ?>" autocomplete=off>-->
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

                       <tr>
                            <th width='120px' scope='row'>jum_keranjang_tangkapan </th>   
                            <td><input type='text' class='form-control' name='jum_keranjang_tangkapan'  id="jum_keranjang_tangkapan" value="<?php if( !empty($post['jum_keranjang_tangkapan']) ){ echo $post['jum_keranjang_tangkapan']; } ?>" autocomplete=off onkeyup="jum_keranjang_tangkapan_1()" step=".01"></td>
                      </tr>

                       <tr>
                            <th width='120px' scope='row'>berat_keranjang_kosong</th>   
                            <td><input type='number' class='form-control' name='berat_keranjang_kosong' value="<?php if( !empty($post['berat_keranjang_kosong']) ){ echo $post['berat_keranjang_kosong']; } ?>" autocomplete=off step=".01"></td>
                      </tr>


                </tbody>
              </table>

            </div>
          </div>
                


                </div>
             
               <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
               <a href="<?php echo base_url(); ?>trip/form3/<?php echo $kode_trip ; ?>"><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
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
                                    <th> Enumerasi  Jumlah </th>
                                    <th> Enumerasi  Berat  </th>
                                    <th> Krj 1 Jumlah </th>
                                    <th> Krj 1 Berat Kg  </th>
                                    <th> Krj 2 Jumlah </th>
                                    <th> Krj 2 Berat Kg  </th>
                                    <th> Krj 3 Jumlah </th>
                                    <th> Krj 3 Berat Kg  </th>
                                    <th> Krj 4 Jumlah </th>
                                    <th> Krj 4 Berat Kg  </th>
                                    <th> Krj 5 Jumlah </th>
                                    <th> Krj 5 Berat Kg  </th>
                                    <th> Krj 6 Jumlah </th>
                                    <th> Krj 6 Berat Kg  </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>

                             <tfoot>
                                <tr>
                                    <th> Nomor  </th>
                                    <th> Kode Species  </th>
                                    <th> Enumerasi  Jumlah </th>
                                    <th> Enumerasi  Berat  </th>
                                    <th> Krj 1 Jumlah </th>
                                    <th> Krj 1 Berat Kg  </th>
                                    <th> Krj 2 Jumlah </th>
                                    <th> Krj 2 Berat Kg  </th>
                                    <th> Krj 3 Jumlah </th>
                                    <th> Krj 3 Berat Kg  </th>
                                    <th> Krj 4 Jumlah </th>
                                    <th> Krj 4 Berat Kg  </th>
                                    <th> Krj 5 Jumlah </th>
                                    <th> Krj 5 Berat Kg  </th>
                                    <th> Krj 6 Jumlah </th>
                                    <th> Krj 6 Berat Kg  </th>
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

        <!--
        <div class="form-group">
          <label for="exampleInputEmail1">seq</label>
        </div>-->

        <input type="hidden" class="form-control" id="seq" name="seq" value="<?php echo $seq ; ?>" readonly required>

        <div class="form-group">
          <label for="exampleInputEmail1">kode_species</label>
          <!--<input type="text" class="form-control" id="kode_species" name="kode_species" placeholder="Enter kode_species" >-->
           <select class="form-control" name="kode_species" id="kode_species">
                                     <option value="">Select Kode Species</option>
                                       <?php foreach($kode_ikan->result() as $row){ ?>
                                        <option value="<?php echo $row->fao ; ?>" ><?php echo $row->fao ; ?> - <?php echo $row->english ; ?></option>
                                       <?php  } ?>
                                </select>

        </div>

       <!--  <div class="form-group">
          <label for="exampleInputEmail1">jum_ekor_tangkap</label>
          <input type="text" class="form-control" id="jum_ekor_tangkap" name="jum_ekor_tangkap" placeholder="Enter jum_ekor_tangkap"  required>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">jum_ekor_sample</label>
          <input type="text" class="form-control" id="jum_ekor_sample" name="jum_ekor_sample" placeholder="Enter jum_ekor_sample"  required>
        </div> -->
        <div class="row">

        <div class='col-md-6' >
          <div class="form-group">
          <label for="exampleInputEmail1"># Total Enumerasi Jumlah </label>
          <input type="text" class="form-control" id="total_enumerasi_jum" name="total_enumerasi_jum" onkeyup="disable_routine(); textAddCommas()" autocomplete=off  >
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">Total Enumerasi Berat (Kg) </label>
          <input type="text" class="form-control" id="total_enumerasi_berat" name="total_enumerasi_berat" onkeyup="disable_routine(); textAddCommas()"  autocomplete=off  step=".01">
        </div>
        </div>

         <div class='col-md-6' >
          <div class="form-group">
          <label for="exampleInputEmail1"># Keranjang 1</label>
          <input type="text" class="form-control" id="keranj1_jum" name="keranj1_jum" onkeyup="disable_routine(); textAddCommas()"  autocomplete=off >
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">Berat Keranjang 1 (Kg) </label>
          <input type="text" class="form-control" id="keranj1_ber" name="keranj1_ber" onkeyup="disable_routine(); textAddCommas()"  autocomplete=off step=".01">
        </div>
        </div>


         <div class='col-md-6' >
          <div class="form-group">
          <label for="exampleInputEmail1"># Keranjang 2</label>
          <input type="text" class="form-control" id="keranj2_jum" name="keranj2_jum" onkeyup="disable_routine(); textAddCommas()"  autocomplete=off >
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">Berat Keranjang 2 (Kg) </label>
          <input type="text" class="form-control" id="keranj2_ber" name="keranj2_ber" onkeyup="disable_routine(); textAddCommas()"  autocomplete=off step=".01">
        </div>
        </div>


         <div class='col-md-6' >
          <div class="form-group">
          <label for="exampleInputEmail1"># Keranjang 3</label>
          <input type="text" class="form-control" id="keranj3_jum" name="keranj3_jum" onkeyup="disable_routine(); textAddCommas()"  autocomplete=off  >
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">Berat Keranjang 3 (Kg) </label>
          <input type="text" class="form-control" id="keranj3_ber" name="keranj3_ber" onkeyup="disable_routine(); textAddCommas()"  autocomplete=off step=".01">
        </div>
        </div>


         <div class='col-md-6' >
          <div class="form-group">
          <label for="exampleInputEmail1"># Keranjang 4</label>
          <input type="text" class="form-control" id="keranj4_jum" name="keranj4_jum" onkeyup="disable_routine(); textAddCommas()" autocomplete=off >
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">Berat Keranjang 4 (Kg) </label>
          <input type="text" class="form-control" id="keranj4_ber" name="keranj4_ber" onkeyup="disable_routine(); textAddCommas()"  autocomplete=off step=".01">
        </div>
        </div>


         <div class='col-md-6' >
          <div class="form-group">
          <label for="exampleInputEmail1"># Keranjang 5</label>
          <input type="text" class="form-control" id="keranj5_jum" name="keranj5_jum" onkeyup="disable_routine(); textAddCommas()"  autocomplete=off >
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">Berat Keranjang 5 (Kg) </label>
          <input type="text" class="form-control" id="keranj5_ber" name="keranj5_ber" onkeyup="disable_routine(); textAddCommas()" autocomplete=off step=".01">
        </div>
        </div>


         <div class='col-md-6' >
          <div class="form-group">
          <label for="exampleInputEmail1"># Keranjang 6</label>
          <input type="text" class="form-control" id="keranj6_jum" name="keranj6_jum" onkeyup="disable_routine(); textAddCommas()"  autocomplete=off >
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">Berat Keranjang 6 (Kg) </label>
          <input type="text" class="form-control" id="keranj6_ber" name="keranj6_ber" onkeyup="disable_routine(); textAddCommas()"  autocomplete=off step=".01">
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

        <!--<div class="form-group">
          <label for="exampleInputEmail1">seq</label>
        </div>-->
         <input type="hidden" class="form-control" id="edit_seq" name="edit_seq" value="<?php echo $seq ; ?>" readonly required>

        <div class="form-group">
          <label for="exampleInputEmail1">nomor</label>
          <input type="text" class="form-control" id="edit_nomor" name="edit_nomor" readonly required>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">kode_species</label>
          <!--<input type="text" class="form-control" id="edit_kode_species" name="edit_kode_species" placeholder="Enter kode_species" required>-->
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
          <label for="exampleInputEmail1"># Total Enumerasi Jumlah </label>
          <input type="text" class="form-control" id="edit_total_enumerasi_jum" onkeyup="disable_routine_update(); textAddCommasUpdate()"  name="edit_total_enumerasi_jum"  autocomplete=off  >
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">Total Enumerasi Berat (Kg) </label>
          <input type="text" class="form-control" id="edit_total_enumerasi_berat" onkeyup="disable_routine_update(); textAddCommasUpdate()" name="edit_total_enumerasi_berat" autocomplete=off step=".01">
        </div>
        </div>

         <div class='col-md-6' >
          <div class="form-group">
          <label for="exampleInputEmail1"># Keranjang 1</label>
          <input type="text" class="form-control" id="edit_keranj1_jum" onkeyup="disable_routine_update(); textAddCommasUpdate()" name="edit_keranj1_jum"  autocomplete=off >
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">Berat Keranjang 1 (Kg) </label>
          <input type="text" class="form-control" id="edit_keranj1_ber" onkeyup="disable_routine_update(); textAddCommasUpdate()" name="edit_keranj1_ber"  autocomplete=off step=".01">
        </div>
        </div>


         <div class='col-md-6' >
          <div class="form-group">
          <label for="exampleInputEmail1"># Keranjang 2</label>
          <input type="text" class="form-control" id="edit_keranj2_jum" onkeyup="disable_routine_update(); textAddCommasUpdate()" name="edit_keranj2_jum" autocomplete=off >
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">Berat Keranjang 2 (Kg) </label>
          <input type="text" class="form-control" id="edit_keranj2_ber" onkeyup="disable_routine_update(); textAddCommasUpdate()" name="edit_keranj2_ber" autocomplete=off step=".01">
        </div>
        </div>


         <div class='col-md-6' >
          <div class="form-group">
          <label for="exampleInputEmail1"># Keranjang 3</label>
          <input type="text" class="form-control" id="edit_keranj3_jum" onkeyup="disable_routine_update(); textAddCommasUpdate()" name="edit_keranj3_jum"  autocomplete=off >
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">Berat Keranjang 3 (Kg) </label>
          <input type="text" class="form-control" id="edit_keranj3_ber" onkeyup="disable_routine_update(); textAddCommasUpdate()" name="edit_keranj3_ber" autocomplete=off step=".01" >
        </div>
        </div>


         <div class='col-md-6' >
          <div class="form-group">
          <label for="exampleInputEmail1"># Keranjang 4</label>
          <input type="text" class="form-control" id="edit_keranj4_jum" onkeyup="disable_routine_update(); textAddCommasUpdate()" name="edit_keranj4_jum" autocomplete=off >
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">Berat Keranjang 4 (Kg) </label>
          <input type="text" class="form-control" id="edit_keranj4_ber" onkeyup="disable_routine_update(); textAddCommasUpdate()" name="edit_keranj4_ber"  autocomplete=off step=".01">
        </div>
        </div>


         <div class='col-md-6' >
          <div class="form-group">
          <label for="exampleInputEmail1"># Keranjang 5</label>
          <input type="text" class="form-control" id="edit_keranj5_jum" onkeyup="disable_routine_update(); textAddCommasUpdate()" name="edit_keranj5_jum"  autocomplete=off >
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">Berat Keranjang 5 (Kg) </label>
          <input type="text" class="form-control" id="edit_keranj5_ber" onkeyup="disable_routine_update(); textAddCommasUpdate()" name="edit_keranj5_ber" autocomplete=off step=".01">
        </div>
        </div>


         <div class='col-md-6' >
          <div class="form-group">
          <label for="exampleInputEmail1"># Keranjang 6</label>
          <input type="text" class="form-control" id="edit_keranj6_jum" onkeyup="disable_routine_update(); textAddCommasUpdate()" name="edit_keranj6_jum"  autocomplete=off >
        </div>
        </div>

         <div class='col-md-6' >
         <div class="form-group">
          <label for="exampleInputEmail1">Berat Keranjang 6 (Kg) </label>
          <input type="text" class="form-control" id="edit_keranj6_ber" onkeyup="disable_routine_update(); textAddCommasUpdate()" name="edit_keranj6_ber"  autocomplete=off step=".01" >
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
          <!--<input type="number" class="form-control" id="berat" name="berat"  max="???" min="???" step="0.5" autocomplete=off step=".01"> -->
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
              
              if(response.messages[0].total_enumerasi_jum == "0"){
                $('#edit_total_enumerasi_jum').val("");
              }else{
                $('#edit_total_enumerasi_jum').val(response.messages[0].total_enumerasi_jum); 
              }
              if(response.messages[0].total_enumerasi_berat == "0"){
                $('#edit_total_enumerasi_berat').val("");
              }else{
                $('#edit_total_enumerasi_berat').val(response.messages[0].total_enumerasi_berat); 
              }
       
              if(response.messages[0].keranj1_jum == "0"){
                $('#edit_keranj1_jum').val("");
              }else{
                $('#edit_keranj1_jum').val(response.messages[0].keranj1_jum); 
              }
              if(response.messages[0].keranj1_ber == "0"){
                $('#edit_keranj1_ber').val("");
              }else{
                $('#edit_keranj1_ber').val(response.messages[0].keranj1_ber); 
              }

              if(response.messages[0].keranj2_jum == "0"){
                $('#edit_keranj2_jum').val("");
              }else{
                $('#edit_keranj2_jum').val(response.messages[0].keranj2_jum); 
              }
              if(response.messages[0].keranj2_ber == "0"){
                $('#edit_keranj2_ber').val("");
              }else{
                $('#edit_keranj2_ber').val(response.messages[0].keranj2_ber); 
              }

              if(response.messages[0].keranj3_jum == "0"){
                $('#edit_keranj3_jum').val("");
              }else{
                $('#edit_keranj3_jum').val(response.messages[0].keranj3_jum); 
              }
              if(response.messages[0].keranj3_ber == "0"){
                $('#edit_keranj3_ber').val("");
              }else{
                $('#edit_keranj3_ber').val(response.messages[0].keranj3_ber); 
              }


              if(response.messages[0].keranj4_jum == "0"){
                $('#edit_keranj4_jum').val("");
              }else{
                $('#edit_keranj4_jum').val(response.messages[0].keranj4_jum); 
              }
              if(response.messages[0].keranj4_ber == "0"){
                $('#edit_keranj4_ber').val("");
              }else{
                $('#edit_keranj4_ber').val(response.messages[0].keranj4_ber); 
              }

              if(response.messages[0].keranj5_jum == "0"){
                $('#edit_keranj5_jum').val("");
              }else{
                $('#edit_keranj5_jum').val(response.messages[0].keranj5_jum); 
              }
              if(response.messages[0].keranj5_ber == "0"){
                $('#edit_keranj5_ber').val("");
              }else{
                $('#edit_keranj5_ber').val(response.messages[0].keranj5_ber); 
              }


              if(response.messages[0].keranj6_jum == "0"){
                $('#edit_keranj6_jum').val("");
              }else{
                $('#edit_keranj6_jum').val(response.messages[0].keranj6_jum); 
              }
              if(response.messages[0].keranj6_ber == "0"){
                $('#edit_keranj6_ber').val("");
              }else{
                $('#edit_keranj6_ber').val(response.messages[0].keranj6_ber); 
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


function disable_routine(){

     if(document.getElementById("total_enumerasi_jum").value !="" ||  document.getElementById("total_enumerasi_berat").value !="" ) { 

            document.getElementById('total_enumerasi_jum').disabled = false; 

            document.getElementById('total_enumerasi_berat').disabled = false; 


            document.getElementById('keranj1_jum').value = ""; 

            document.getElementById('keranj2_jum').value = ""; 

            document.getElementById('keranj3_jum').value = ""; 

            document.getElementById('keranj4_jum').value = ""; 

            document.getElementById('keranj5_jum').value = ""; 

            document.getElementById('keranj6_jum').value = ""; 


            document.getElementById('keranj1_ber').value = ""; 

            document.getElementById('keranj2_ber').value = ""; 

            document.getElementById('keranj3_ber').value = ""; 

            document.getElementById('keranj4_ber').value = ""; 

            document.getElementById('keranj5_ber').value = ""; 

            document.getElementById('keranj6_ber').value = ""; 



            document.getElementById('keranj1_jum').disabled = true; 

            document.getElementById('keranj2_jum').disabled = true; 

            document.getElementById('keranj3_jum').disabled = true; 

            document.getElementById('keranj4_jum').disabled = true; 

            document.getElementById('keranj5_jum').disabled = true; 

            document.getElementById('keranj6_jum').disabled = true; 

            document.getElementById('keranj1_ber').disabled = true; 

            document.getElementById('keranj2_ber').disabled = true; 

            document.getElementById('keranj3_ber').disabled = true; 

            document.getElementById('keranj4_ber').disabled = true; 

            document.getElementById('keranj5_ber').disabled = true; 

            document.getElementById('keranj6_ber').disabled = true; 

            

      }


      if(document.getElementById("total_enumerasi_jum").value ==="" &&  document.getElementById("total_enumerasi_berat").value ==="" ) {


            document.getElementById('total_enumerasi_jum').disabled = true; 

            document.getElementById('total_enumerasi_berat').disabled = true; 

            document.getElementById('keranj1_jum').disabled = false; 

            document.getElementById('keranj2_jum').disabled = false; 

            document.getElementById('keranj3_jum').disabled = false; 

            document.getElementById('keranj4_jum').disabled = false; 

            document.getElementById('keranj5_jum').disabled = false; 

            document.getElementById('keranj6_jum').disabled = false; 

            document.getElementById('keranj1_ber').disabled = false; 

            document.getElementById('keranj2_ber').disabled = false; 

            document.getElementById('keranj3_ber').disabled = false; 

            document.getElementById('keranj4_ber').disabled = false; 

            document.getElementById('keranj5_ber').disabled = false; 

            document.getElementById('keranj6_ber').disabled = false; 
    

      }


            if( document.getElementById("total_enumerasi_jum").value ==="" && 
         document.getElementById("total_enumerasi_berat").value ==="" &&
          document.getElementById('keranj1_jum').value === "" && 
          document.getElementById('keranj2_jum').value === "" &&
          document.getElementById('keranj3_jum').value === "" &&
          document.getElementById('keranj4_jum').value === "" &&
          document.getElementById('keranj5_jum').value === "" &&
          document.getElementById('keranj6_jum').value === "" && 

          document.getElementById('keranj1_ber').value === "" && 
          document.getElementById('keranj2_ber').value === "" && 
          document.getElementById('keranj3_ber').value === "" && 
          document.getElementById('keranj4_ber').value === "" && 
          document.getElementById('keranj5_ber').value === "" && 
          document.getElementById('keranj6_ber').value === ""  

        ){


            document.getElementById('total_enumerasi_jum').disabled = false; 

            document.getElementById('total_enumerasi_berat').disabled = false; 

            document.getElementById('keranj1_jum').disabled = false; 

            document.getElementById('keranj2_jum').disabled = false; 

            document.getElementById('keranj3_jum').disabled = false; 

            document.getElementById('keranj4_jum').disabled = false; 

            document.getElementById('keranj5_jum').disabled = false; 

            document.getElementById('keranj6_jum').disabled = false; 

            document.getElementById('keranj1_ber').disabled = false; 

            document.getElementById('keranj2_ber').disabled = false; 

            document.getElementById('keranj3_ber').disabled = false; 

            document.getElementById('keranj4_ber').disabled = false; 

            document.getElementById('keranj5_ber').disabled = false; 

            document.getElementById('keranj6_ber').disabled = false; 


      }



}




function disable_routine_update(){

     if(document.getElementById("edit_total_enumerasi_jum").value !="" ||  document.getElementById("edit_total_enumerasi_berat").value !="" ) { 

            document.getElementById('edit_total_enumerasi_jum').disabled = false; 

            document.getElementById('edit_total_enumerasi_berat').disabled = false; 


            document.getElementById('edit_keranj1_jum').value = ""; 

            document.getElementById('edit_keranj2_jum').value = ""; 

            document.getElementById('edit_keranj3_jum').value = ""; 

            document.getElementById('edit_keranj4_jum').value = ""; 

            document.getElementById('edit_keranj5_jum').value = ""; 

            document.getElementById('edit_keranj6_jum').value = ""; 


            document.getElementById('edit_keranj1_ber').value = ""; 

            document.getElementById('edit_keranj2_ber').value = ""; 

            document.getElementById('edit_keranj3_ber').value = ""; 

            document.getElementById('edit_keranj4_ber').value = ""; 

            document.getElementById('edit_keranj5_ber').value = ""; 

            document.getElementById('edit_keranj6_ber').value = ""; 



            document.getElementById('edit_keranj1_jum').disabled = true; 

            document.getElementById('edit_keranj2_jum').disabled = true; 

            document.getElementById('edit_keranj3_jum').disabled = true; 

            document.getElementById('edit_keranj4_jum').disabled = true; 

            document.getElementById('edit_keranj5_jum').disabled = true; 

            document.getElementById('edit_keranj6_jum').disabled = true; 

            document.getElementById('edit_keranj1_ber').disabled = true; 

            document.getElementById('edit_keranj2_ber').disabled = true; 

            document.getElementById('edit_keranj3_ber').disabled = true; 

            document.getElementById('edit_keranj4_ber').disabled = true; 

            document.getElementById('edit_keranj5_ber').disabled = true; 

            document.getElementById('edit_keranj6_ber').disabled = true; 

            

      }


      if( document.getElementById("edit_total_enumerasi_jum").value ==="" &&  document.getElementById("edit_total_enumerasi_berat").value ==="" ) {


            document.getElementById('edit_total_enumerasi_jum').disabled = true; 

            document.getElementById('edit_total_enumerasi_berat').disabled = true; 

            document.getElementById('edit_keranj1_jum').disabled = false; 

            document.getElementById('edit_keranj2_jum').disabled = false; 

            document.getElementById('edit_keranj3_jum').disabled = false; 

            document.getElementById('edit_keranj4_jum').disabled = false; 

            document.getElementById('edit_keranj5_jum').disabled = false; 

            document.getElementById('edit_keranj6_jum').disabled = false; 

            document.getElementById('edit_keranj1_ber').disabled = false; 

            document.getElementById('edit_keranj2_ber').disabled = false; 

            document.getElementById('edit_keranj3_ber').disabled = false; 

            document.getElementById('edit_keranj4_ber').disabled = false; 

            document.getElementById('edit_keranj5_ber').disabled = false; 

            document.getElementById('edit_keranj6_ber').disabled = false; 
    

      }


            if( document.getElementById("edit_total_enumerasi_jum").value ==="" && 
         document.getElementById("edit_total_enumerasi_berat").value ==="" &&
          document.getElementById('edit_keranj1_jum').value === "" && 
          document.getElementById('edit_keranj2_jum').value === "" &&
          document.getElementById('edit_keranj3_jum').value === "" &&
          document.getElementById('edit_keranj4_jum').value === "" &&
          document.getElementById('edit_keranj5_jum').value === "" &&
          document.getElementById('edit_keranj6_jum').value === "" && 

          document.getElementById('edit_keranj1_ber').value === "" && 
          document.getElementById('edit_keranj2_ber').value === "" && 
          document.getElementById('edit_keranj3_ber').value === "" && 
          document.getElementById('edit_keranj4_ber').value === "" && 
          document.getElementById('edit_keranj5_ber').value === "" && 
          document.getElementById('edit_keranj6_ber').value === ""  

        ){


            document.getElementById('edit_total_enumerasi_jum').disabled = false; 

            document.getElementById('edit_total_enumerasi_berat').disabled = false; 

            document.getElementById('edit_keranj1_jum').disabled = false; 

            document.getElementById('edit_keranj2_jum').disabled = false; 

            document.getElementById('edit_keranj3_jum').disabled = false; 

            document.getElementById('edit_keranj4_jum').disabled = false; 

            document.getElementById('edit_keranj5_jum').disabled = false; 

            document.getElementById('edit_keranj6_jum').disabled = false; 

            document.getElementById('edit_keranj1_ber').disabled = false; 

            document.getElementById('edit_keranj2_ber').disabled = false; 

            document.getElementById('edit_keranj3_ber').disabled = false; 

            document.getElementById('edit_keranj4_ber').disabled = false; 

            document.getElementById('edit_keranj5_ber').disabled = false; 

            document.getElementById('edit_keranj6_ber').disabled = false; 


      }



}


function clear_text(){


            document.getElementById('total_enumerasi_jum').disabled = false; 

            document.getElementById('total_enumerasi_berat').disabled = false; 

            document.getElementById('keranj1_jum').disabled = false; 

            document.getElementById('keranj2_jum').disabled = false; 

            document.getElementById('keranj3_jum').disabled = false; 

            document.getElementById('keranj4_jum').disabled = false; 

            document.getElementById('keranj5_jum').disabled = false; 

            document.getElementById('keranj6_jum').disabled = false; 

            document.getElementById('keranj1_ber').disabled = false; 

            document.getElementById('keranj2_ber').disabled = false; 

            document.getElementById('keranj3_ber').disabled = false; 

            document.getElementById('keranj4_ber').disabled = false; 

            document.getElementById('keranj5_ber').disabled = false; 

            document.getElementById('keranj6_ber').disabled = false; 




            document.getElementById('edit_total_enumerasi_jum').disabled = false; 

            document.getElementById('edit_total_enumerasi_berat').disabled = false; 

            document.getElementById('edit_keranj1_jum').disabled = false; 

            document.getElementById('edit_keranj2_jum').disabled = false; 

            document.getElementById('edit_keranj3_jum').disabled = false; 

            document.getElementById('edit_keranj4_jum').disabled = false; 

            document.getElementById('edit_keranj5_jum').disabled = false; 

            document.getElementById('edit_keranj6_jum').disabled = false; 

            document.getElementById('edit_keranj1_ber').disabled = false; 

            document.getElementById('edit_keranj2_ber').disabled = false; 

            document.getElementById('edit_keranj3_ber').disabled = false; 

            document.getElementById('edit_keranj4_ber').disabled = false; 

            document.getElementById('edit_keranj5_ber').disabled = false; 

            document.getElementById('edit_keranj6_ber').disabled = false; 

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

function jum_keranjang_tangkapan_1(){


      var val = document.getElementById('jum_keranjang_tangkapan').value;

      document.getElementById('jum_keranjang_tangkapan').value = addCommas(val);  
  

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