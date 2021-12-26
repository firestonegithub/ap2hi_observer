

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
                                <b><?php if( !empty($berat_keranjang_kosong_dec) ) { echo $berat_keranjang_kosong_dec ; } ?></b>

                                <?php 
                                 $attributes = array('class'=>'form-horizontal','role'=>'form');
                                    echo form_open_multipart('trip/form3_add/'.$kode_trip,$attributes); 
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
                            <td><input type='text' class='form-control' name='id_pemantau' value="<?php if( !empty($trip['id_pemantau']) ){ echo $trip['id_pemantau']; } ?>" autocomplete=off readonly></td>
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
                            <td><input type='number' class='form-control' name='set_nomor' value="<?php if( !empty($post['set_nomor']) ){ echo $post['set_nomor']; } ?>" autocomplete=off </td>
                      </tr>

                       
                      <tr>
                            <th width='120px' scope='row'>waktu_mulai (*) (contoh: 11:45 AM)</th>   
                            <td>

                                
                                <input type='time' class='form-control' name='waktu_mulai' value="<?php if( !empty($post['waktu_mulai']) ){ echo $post['waktu_mulai']; } ?>" autocomplete=off min="0" max ="23" placeholder="jam">
                                 
                             <!-- <div class="row">
                                  <div class='col-md-6'>
                                        <input type='number' class='form-control' name='jam_mulai' value="<?php if( !empty($post['jam_mulai']) ){ echo $post['jam_mulai']; } ?>" autocomplete=off min="0" max ="23" placeholder="jam">
                                  </div>

                                  <div class='col-md-6'>
                                        <input type='number' class='form-control' name='menit_mulai' value="<?php if( !empty($post['menit_mulai']) ){ echo $post['menit_mulai']; } ?>" autocomplete=off min="0" max ="59" placeholder="menit">
                                  </div>

                              </div> -->

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

                              </div> -->

                             
                            </td>
                      </tr>

                       <tr>
                            <th width='120px' scope='row'>jumlah_pemancing</th>   
                            <td>
                              <input type='number' class='form-control' name='jumlah_pemancing' value="<?php if( !empty($post['jumlah_pemancing']) ){ echo $post['jumlah_pemancing']; } ?>" autocomplete=off>
                            </td>
                      </tr>

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

                    </tbody>
                  </table>

                </div>
            

              <div class='col-md-4' >

              <table class='table table-condensed table-bordered'>
                <tbody>

                 

                       
                      <tr>
                            <th width='120px' scope='row'>lintang (*)</th>   
                            <td>
                              <!--<input type='text' class='form-control' name='lintang' value="<?php if( !empty($post['lintang']) ){ echo $post['lintang']; } ?>">-->

                              <div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='lintang_degree' placeholder="Degree" value="<?php if( !empty($post['lintang_degree']) ){ echo $post['lintang_degree']; } ?>" required autocomplete=off>
                                    </div>
                                     <div class='col-md-4'>
                                        <input type='number' class='form-control' name='lintang_minutes'  placeholder="Minutes" value="<?php if( !empty($post['lintang_degree']) ){ echo $post['lintang_degree']; } ?>" required autocomplete=off min="0" max="60" step=".01">
                                    </div>
                                     <div class='col-md-4'>
                                        <select class='form-control' name='lintang_us' id="lintang_us">
                                            <option value="U" <?php if( !empty($post['lintang_us']) ){  if ( $post['lintang_us'] == 'U' ) { echo 'selected'; } } ?>>Utara</option>
                                            <option value="S" <?php if( !empty($post['lintang_us']) ){  if ( $post['lintang_us'] == 'S' ) { echo 'selected'; } } ?>>Selatan</option>
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
                                        <input type='number' class='form-control' name='bujur_degree'  placeholder="Degree" required autocomplete=off value="<?php if( !empty($post['bujur_degree']) ){ echo $post['bujur_degree']; } ?>">
                                    </div>
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='bujur_minutes' placeholder="Minutes" required autocomplete=off value="<?php if( !empty($post['bujur_degree']) ){ echo $post['bujur_degree']; } ?>" min="0" max="60" step=".01">
                                    </div>
                                    <div class='col-md-4'>
                                       <select class='form-control' name='bujur_us' id="bujur_us">
                                            <option value="T" >Timur</option>
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
                              <input type="checkbox" name="fad2[]" value="berumah">Berumah
                              <input type="checkbox" name="fad2[]" value="ponton">Ponton
                              <input type="checkbox" name="fad2[]" value="styrofoam">Styrofoam
                              <input type="checkbox" name="fad2[]" value="rakit">Rakit


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
                            <td><input type='text' class='form-control' name='jum_keranjang_tangkapan' id="jum_keranjang_tangkapan" value="<?php if( !empty($post['jum_keranjang_tangkapan']) ){ echo $post['jum_keranjang_tangkapan']; } ?>" autocomplete=off onkeyup="jum_keranjang_tangkapan_1()" ></td>
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

</script>
