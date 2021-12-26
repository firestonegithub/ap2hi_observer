

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
                                    echo form_open_multipart('trip_hl/form3_add/'.$kode_trip,$attributes); 
                                ?>


              <div class='col-md-12'>

              <div class="row">
              
                  <div class='col-md-6'>


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
                       

                       <tr>
                            <th width='120px' scope='row'>nama_pemantau </th>   
                            <td><input type='text' class='form-control' name='nama_pemantau' id="nama_pemantau" value="<?php if( !empty($post['nama_pemantau']) ){ echo $post['nama_pemantau']; } ?>" autocomplete=off></td>
                       </tr>
                
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
                                 
                          
                            </td>
                      </tr>

                       
                
                 
                      <tr>
                            <th width='120px' scope='row'>waktu_selesai (*) (contoh: 11:45 AM)</th>   
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

                    </tbody>
                  </table>

                </div>
            

              <div class='col-md-6' >

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
                      

                               <select class='form-control' name='jenis_fad' id="jenis_fad">
                                              <option value="" >Pilih salah satu</option>
                                            <option value="menetap" <?php if( !empty($post['jenis_fad']) ){  if ( $post['jenis_fad'] == 'menetap' ) { echo 'selected'; } } ?> >Menetap</option>
                                            <option value="hanyut" <?php if( !empty($post['jenis_fad']) ){  if ( $post['jenis_fad'] == 'hanyut' ) { echo 'selected'; } } ?> >Hanyut</option>
                                </select>
                            </td>
                      </tr>

                      <tr>
                            <th width='120px' scope='row'>fad 2</th>   
                            <td>
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


</script>
