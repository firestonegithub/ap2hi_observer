

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
                                    <li><a href="<?php echo base_url()."trip_hl/form6/".$kode_trip; ?>"><?php echo $page_name ; ?></a></li>
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
                                    echo form_open_multipart('trip_hl/form6_add/'.$kode_trip,$attributes); 
                                ?>



           <div class="row">

              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                     <tr>
                            <th width='120px' scope='row'>kode trip</th>   
                            <td><input type='text' class='form-control' name='kode_trip' value="<?php echo $kode_trip; ?>" readonly autocomplete=off></td>
                       </tr>

                        <tr>
                            <th width='120px' scope='row'>id_pemantau</th>   
                           <td><input type='text' class='form-control' name='id_pemantau' value="<?php if( !empty($trip['id_pemantau']) ){ echo $trip['id_pemantau']; } ?>" autocomplete=off readonly></td>
                        </tr>

                       
                         
                     
                       <tr>
                            <th width='120px' scope='row'>aktivitas_memancing</th>   
                            <td>
                              
                                <select class='form-control' name='aktivitas_memancing' id="aktivitas_memancing">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="1" <?php if( !empty($post['aktivitas_memancing']) ){ if($post['aktivitas_memancing'] == "1"){ echo 'selected';  } } ?>>Pole and line</option>
                                    <option value="2" <?php if( !empty($post['aktivitas_memancing']) ){ if($post['aktivitas_memancing'] == "2"){ echo 'selected';  } } ?>>Handline </option>
                                    <option value="3" <?php if( !empty($post['aktivitas_memancing']) ){ if($post['aktivitas_memancing'] == "3"){ echo 'selected';  } } ?>>Umpan</option>
                                    <option value="4" <?php if( !empty($post['aktivitas_memancing']) ){ if($post['aktivitas_memancing'] == "4"){ echo 'selected';  } } ?>>Lain-lain</option>
                                </select>
                            </td>
                       </tr>

                     
                   <tr>
                            <th width='120px' scope='row'>tanggal</th>   
                            <td><input type='text' class='form-control' name='tanggal' id="tanggal" value="<?php if( !empty($post['tanggal']) ){ echo $post['tanggal']; } ?>" autocomplete=off></td>
                       </tr>


                     
                   <tr>
                            <th width='120px' scope='row'>waktu (contoh: 11:45 AM)</th>   
                            <td>

                               <input type='time' class='form-control' name='waktu' value="<?php if( !empty($post['waktu']) ){ echo $post['waktu']; } ?>" placeholder="waktu">

                              <!-- <input type='time' class='form-control' name='waktu' value="<?php if( !empty($post['waktu']) ){ echo $post['waktu']; } ?>" placeholder="waktu">-->
                               
                              <!--<input type='text' class='form-control' name='waktu' value="<?php if( !empty($post['waktu']) ){ echo $post['waktu']; } ?>" autocomplete=off>-->
                              <!-- <div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' placeholder="Jam" name='jam' required autocomplete=off required min='0' max='23' value="<?php if( !empty($post['jam']) ){ echo $post['jam']; } ?>">
                                    </div>
                                    <b>:</b> 
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' placeholder="Menit" name='menit' required autocomplete=off required min='0' max='59' value="<?php if( !empty($post['menit']) ){ echo $post['menit']; } ?>">
                                    </div>
                                </div> -->
                            </td>
                       </tr>


                     
                   <tr>
                            <th width='120px' scope='row'>lintang</th>   
                            <td>
                             <!-- <input type='text' class='form-control' name='lintang' value="<?php if( !empty($post['lintang']) ){ echo $post['lintang']; } ?>" >-->
                              <div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='lintang_degree' placeholder="Lintang Degree" required autocomplete=off>
                                    </div>
                                     <div class='col-md-4'>
                                        <input type='number' class='form-control' name='lintang_minutes'  placeholder="Lintang Minutes" required autocomplete=off  min="0" max="60" step=".01">
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


                     
                   <!--<tr>
                            <th width='120px' scope='row'>ket_lintang</th>   
                            <td><input type='text' class='form-control' name='ket_lintang' value="<?php if( !empty($post['ket_lintang']) ){ echo $post['ket_lintang']; } ?>"></td>
                       </tr> -->

                     
                   <tr>
                            <th width='120px' scope='row'>bujur</th>   
                            <td>
                             <!-- <input type='text' class='form-control' name='bujur' value="<?php if( !empty($post['bujur']) ){ echo $post['bujur']; } ?>" autocomplete=off>-->
                               <div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='bujur_degree'  placeholder="Bujur Degree" required autocomplete=off>
                                    </div>
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='bujur_minutes' placeholder="Bujur Minutes" required autocomplete=off  min="0" max="60" step=".01">
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
                            <th width='120px' scope='row'>ket_bujur</th>   
                            <td><input type='text' class='form-control' name='ket_bujur' value="<?php if( !empty($post['ket_bujur']) ){ echo $post['ket_bujur']; } ?>"></td>
                       </tr>-->

                     



                  </tbody>

                </table>
              </div>


               <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                     <tr>
                            <th width='120px' scope='row'>jenis_pancing</th>   

                            <td><input type='text' class='form-control' name='jenis_pancing' value="<?php if( !empty($post['jenis_pancing']) ){ echo $post['jenis_pancing']; } ?>" autocomplete=off></td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>kode_posisi_pancing</th>   
                            <td>
                                
                                     
                               
                                <select class="form-control" name="kode_posisi_pancing" id="kode_posisi_pancing">
                                     <option value="">Select kode_posisi_pancing_etp</option>
                                     <?php foreach($kode_posisi_pancing_etp->result() as $row){ ?>
                                        <option value="<?php echo $row->kode_aktivitas ; ?>" <?php if( !empty($post['kode_posisi_pancing_etp']) ){ if($row->kode_aktivitas == $post['kode_posisi_pancing_etp']) { echo 'selected';  }  } ?>><?php echo $row->nama_aktivitas ; ?></option>
                                    <?php } ?>
                               </select>
                               </td>
                       </tr>

                     
                   <tr>
                            <th width='120px' scope='row'>kode_kondisi_tertangkap</th>   
                            <td>


                                <select class="form-control" name="kode_kondisi_tertangkap" id="kode_kondisi_tertangkap">
                                     <option value="">Select kode_kondisi_tertangkap</option>
                                     <?php foreach($kode_kondisi_etp->result() as $row){ ?>
                                        <option value="<?php echo $row->kode_aktivitas ; ?>" <?php if( !empty($post['kode_kondisi_tertangkap']) ){ if($row->kode_aktivitas == $post['kode_kondisi_tertangkap']) { echo 'selected';  }  } ?>><?php echo $row->nama_aktivitas ; ?></option>
                                    <?php } ?>
                               </select>
                               </td>
                            </td>
                       </tr>

                     
                   <tr>
                            <th width='120px' scope='row'>kode_kondisi_tertangkap_deskripsi</th>   
                            <td><input type='text' class='form-control' name='kode_kondisi_tertangkap_deskripsi' value="<?php if( !empty($post['kode_kondisi_tertangkap_deskripsi']) ){ echo $post['kode_kondisi_tertangkap_deskripsi']; } ?>" autocomplete=off></td>
                       </tr>

                     
                   <tr>
                            <th width='120px' scope='row'>kode_kondisi_dilepas</th>   
                            <td>
                              <select class="form-control" name="kode_kondisi_dilepas" id="kode_kondisi_tertangkap">
                                     <option value="">Select kode_kondisi_dilepas</option>
                                     <?php foreach($kode_kondisi_etp->result() as $row){ ?>
                                        <option value="<?php echo $row->kode_aktivitas ; ?>" <?php if( !empty($post['kode_kondisi_dilepas']) ){ if($row->kode_aktivitas == $post['kode_kondisi_dilepas']) { echo 'selected';  }  } ?>><?php echo $row->nama_aktivitas ; ?></option>
                                    <?php } ?>
                               </select>
                            </td>
                       </tr>

                     
                   <tr>
                            <th width='120px' scope='row'>kode_kondisi_dilepas_deskripsi</th>   
                            <td><input type='text' class='form-control' name='kode_kondisi_dilepas_deskripsi' value="<?php if( !empty($post['kode_kondisi_dilepas_deskripsi']) ){ echo $post['kode_kondisi_dilepas_deskripsi']; } ?>" autocomplete=off></td>
                       </tr>

                     
                   <tr>
                            <th width='120px' scope='row'>tanda</th>   
                            <td><input type='text' class='form-control' name='tanda' value="<?php if( !empty($post['tanda']) ){ echo $post['tanda']; } ?>" autocomplete=off></td>
                       </tr>





                  </tbody>

                </table>
              </div>

            </div>

        
             
               <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
                <a href="<?php echo base_url(); ?>trip_hl/form6/<?php echo $kode_trip ; ?>"><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
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
