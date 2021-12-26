
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Data Supplier</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Update Vessel</a></li>
                                    <li class="active">Update Vessel</li>
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
                                <strong class="card-title">Vessel Update</strong>
                              
                            </div>


                            <div class="card-body">

                              
                             <?php 
                               $attributes = array('class'=>'form-horizontal','role'=>'form');
                        echo form_open_multipart('master/update_master_vessel',$attributes); 
                              ?>

              <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>
                    <input type='hidden' name='id_vessel' value="<?php echo $row['id_vessel'] ; ?>">

                       <tr>
                        <th width='120px' scope='row'>Supplier</th>    
                        <td><select class="form-control" name="id_supplier" id="id_supplier">
                           <option value="">Select Supplier</option>
                           <?php foreach($suppliers->result() as $rows){ ?>
                            <option value="<?php echo $rows->id_supplier ; ?>" <?php if($row['id_supplier'] == $rows->id_supplier  ) { ?> selected="selected"  <?php } ?> ><?php echo $rows->nama_perusahaan ; ?></option>
                           <?php  } ?>
                      </select>
                    </td>


                        <tr>
                            <th width='120px' scope='row'>nama_kapal</th>    
                            <td><input type='text' class='form-control' name='nama_kapal'   value="<?php echo $row['nama_kapal'] ; ?>" required  autocomplete=off></td>
                        </tr>
                       
                        <tr>
                            <th width='120px' scope='row'>tanda_selar</th>    
                            <td><input type='text' class='form-control' name='tanda_selar'  value="<?php echo $row['tanda_selar'] ; ?>" value="<?php echo $row['nama_kapal'] ; ?>" autocomplete=off></td>
                        </tr>

                          <tr>
                            <th width='120px' scope='row'>no_sipi</th>    
                            <td><input type='text' class='form-control' name='no_sipi'  value="<?php echo $row['no_sipi'] ; ?>" autocomplete=off></td>
                        </tr> 
                       
                      <tr>
                            <th width='120px' scope='row'>masa_berlaku_sipi</th>    
                            <td><input type='text' class='form-control' name='masa_berlaku_sipi'  value="<?php echo $row['masa_berlaku_sipi'] ; ?>"  autocomplete=off></td>
                        </tr>

                        <tr>
                            <th width='120px' scope='row'>no_siup</th>    
                            <td><input type='text' class='form-control' name='no_siup'  value="<?php echo $row['no_siup'] ; ?>" autocomplete=off></td>
                        </tr>

                        <tr>
                            <th width='120px' scope='row'>call sign</th>    
                            <td><input type='text' class='form-control' name='irc'  value="<?php echo $row['irc'] ; ?>" autocomplete=off></td>
                        </tr>

                        <tr>
                            <th width='120px' scope='row'>nomor registrasi rfmo</th>    
                            <td><input type='text' class='form-control' name='rfmo'   value="<?php echo $row['rfmo'] ; ?>" autocomplete=off></td>
                        </tr>
                      
                        <tr>
                            <th width='120px' scope='row'>rfmo</th>    
                            <td><select class='form-control' name='rfmo_choice'>
                                  <option value="" >Silahkan Pilih</option>
                                    <option value="WCPFC" <?php if( !empty($row['rfmo_choice']) ){ if($row['rfmo_choice'] == "WCPFC"){ echo 'selected';  } } ?>>WCPFC</option>
                                    <option value="IOTC" <?php if( !empty($row['rfmo_choice']) ){ if($row['rfmo_choice'] == "IOTC"){ echo 'selected';  } } ?>>IOTC</option>
                                    <option value="CSBT" <?php if( !empty($row['rfmo_choice']) ){ if($row['rfmo_choice'] == "CSBT"){ echo 'selected';  } } ?>>CSBT</option>
                                </select></td>
                        </tr>

                        <tr>
                            <th width='120px' scope='row'>tahun_pembuatan_kapal</th>    
                            <td><input type='text' class='form-control' name='tahun_pembuatan_kapal'  value="<?php echo $row['tahun_pembuatan_kapal'] ; ?>" autocomplete=off></td>
                        </tr>

                        <tr>
                            <th width='120px' scope='row'>bendera</th>    
                            <td><input type='text' class='form-control' name='bendera'  value="<?php echo $row['bendera'] ; ?>" autocomplete=off ></td>
                        </tr>

                           <tr>
                            <th width='120px' scope='row'>bahan</th>    
                            <td>

                              <!--<input type='text' class='form-control' name='bahan' >-->

                               <select class='form-control' name='bahan' id="bahan">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Kayu" <?php if( !empty($row['bahan']) ){ if($row['bahan'] == "Kayu"){ echo 'selected';  } } ?>>Kayu</option>
                                    <option value="Besi" <?php if( !empty($row['bahan']) ){ if($row['bahan'] == "Besi"){ echo 'selected';  } } ?>>Besi</option>
                                    <option value="Fiberglass" <?php if( !empty($row['bahan']) ){ if($row['bahan'] == "Fiberglass"){ echo 'selected';  } } ?>>Fiberglass</option>
                                </select>


                            </td>
                        </tr>

                         <tr>
                            <th width='120px' scope='row'>GT (Ton)</th>    
                            <td><input type='number' class='form-control' name='gt'  value="<?php echo $row['gt'] ; ?>" autocomplete=off></td>
                        </tr>

                        <tr>
                            <th width='120px' scope='row'>HP (Kw)</th>    
                            <td><input type='number' class='form-control' name='kapasitas_mesin_utama'  value="<?php echo $row['kapasitas_mesin_utama'] ; ?>" autocomplete=off></td>
                        </tr>


                      <tr>
                            <th width='120px' scope='row'>nama_pemilik</th>    
                            <td><input type='text' class='form-control' name='nama_pemilik'  value="<?php echo $row['nama_pemilik'] ; ?>" autocomplete=off ></td>
                        </tr>
                       
                      <tr>
                            <th width='120px' scope='row'>no_ap2hi</th>    
                            <td><input type='text' class='form-control' name='no_ap2hi'  value="<?php echo $row['no_ap2hi'] ; ?>" autocomplete=off></td>
                        </tr>
                       
                       
                      <tr>
                            <th width='120px' scope='row'>no_seafdec</th>    
                            <td><input type='text' class='form-control' name='no_seafdec'  value="<?php echo $row['no_seafdec'] ; ?>"  autocomplete=off></td>
                        </tr>
                       
                      <tr>
                            <th width='120px' scope='row'>no_issf</th>    
                            <td><input type='text' class='form-control' name='no_issf'  value="<?php echo $row['no_issf'] ; ?>" autocomplete=off></td>
                        </tr>
                       
                      <tr>
                            <th width='120px' scope='row'>no_kkp</th>    
                            <td><input type='text' class='form-control' name='no_kkp'  value="<?php echo $row['no_kkp'] ; ?>" autocomplete=off></td>
                        </tr>

                         <tr>
                            <th width='120px' scope='row'>no_imo</th>    
                            <td><input type='text' class='form-control' name='no_imo'  value="<?php echo $row['no_imo'] ; ?>" autocomplete=off></td>
                        </tr>
                       
                      <!--<tr>
                            <th width='120px' scope='row'>no_dkp</th>    
                            <td><input type='text' class='form-control' name='no_dkp' ></td>
                        </tr>-->
                        <input type='hidden' class='form-control' name='no_dkp'  value="<?php echo $row['no_dkp'] ; ?>" autocomplete=off>

                      <!--<tr>
                            <th width='120px' scope='row'>no_vic</th>    
                            <td><input type='text' class='form-control' name='no_vic' ></td>
                        </tr>-->
                        <input type='hidden' class='form-control' name='no_vic'  value="<?php echo $row['no_vic'] ; ?>" autocomplete=off>

                       
                      <!--<tr>
                            <th width='120px' scope='row'>no_nik</th>    
                            <td><input type='text' class='form-control' name='no_nik' ></td>
                      </tr> -->
                       <input type='hidden' class='form-control' name='no_nik'  value="<?php echo $row['no_nik'] ; ?>" autocomplete=off>

                       
                      <!--<tr>
                            <th width='120px' scope='row'>nama_kapal_2tahun</th>    
                            <td><input type='text' class='form-control' name='nama_kapal_2tahun' ></td>
                        </tr> -->
                         <input type='hidden' class='form-control' name='nama_kapal_2tahun'  value="<?php echo $row['nama_kapal_2tahun'] ; ?>" autocomplete=off>

                       
                      <tr>
                            <th width='120px' scope='row'>status_kapal</th>    
                            <td><!--<input type='text' class='form-control' name='status_kapal'  autocomplete=off>-->
                              <select class='form-control' name='status_kapal' id="status_kapal">
                                  <option value="">Silahkan Pilih</option>
                                  <option value="Aktif" <?php if( !empty($row['status_kapal']) ){ if($row['status_kapal'] == "Aktif"){ echo 'selected';  } } ?> >Aktif</option>
                                  <option value="Tidak Aktif" <?php if( !empty($row['status_kapal']) ){ if($row['status_kapal'] == "Tidak Aktif"){ echo 'selected';  } } ?> >Tidak Aktif</option>
                               </select>
                            </td>
                        </tr>
                      
                      <tr>
                            <th width='120px' scope='row'>jenis_kapal</th>    
                            <td>
                              <!--<input type='text' class='form-control' name='jenis_kapal'  autocomplete=off>-->
                                <select class='form-control' name='jenis_kapal' id="jenis_kapal">
                                  <option value="">Silahkan Pilih</option>
                                  <option value="Fishing" <?php if( !empty($row['jenis_kapal']) ){ if($row['jenis_kapal'] == "Fishing"){ echo 'selected';  } } ?>>Fishing</option>
                                  <option value="Carrier" <?php if( !empty($row['jenis_kapal']) ){ if($row['jenis_kapal'] == "Carrier"){ echo 'selected';  } } ?>>Carrier</option>
                               </select>
                            </td>
                        </tr>
                       
                      <tr>
                            <th width='120px' scope='row'>jenis_alat</th>    
                            <td>
                             <!-- <input type='text' class='form-control' name='jenis_alat'  autocomplete=off>-->
                             <select class='form-control' name='jenis_alat' id="jenis_alat">
                                  <option value="">Silahkan Pilih</option>
                                  <option value="HL" <?php if( !empty($row['jenis_alat']) ){ if($row['jenis_alat'] == "HL"){ echo 'selected';  } } ?>>HandLine</option>
                                  <option value="PL" <?php if( !empty($row['jenis_alat']) ){ if($row['jenis_alat'] == "PL"){ echo 'selected';  } } ?>>Pole and Line</option>
                               </select>
                            </td>
                        </tr>
                      
                      <!--<tr>
                            <th width='120px' scope='row'>ukuran</th>    
                            <td><input type='text' class='form-control' name='ukuran' required ></td>
                        </tr> -->
                       <input type='hidden' class='form-control' name='ukuran'  value="<?php echo $row['ukuran'] ; ?>" autocomplete=off >


                      <tr>
                            <th width='120px' scope='row'>loa</th>    
                            <td><input type='text' class='form-control' name='loa'  value="<?php echo $row['loa'] ; ?>" autocomplete=off></td>
                        </tr>
                       
                      <tr>
                            <th width='120px' scope='row'>panjang</th>    
                            <td><input type='text' class='form-control' name='panjang'  value="<?php echo $row['panjang'] ; ?>" autocomplete=off ></td>
                        </tr>
                    
                      <tr>
                            <th width='120px' scope='row'>lebar</th>    
                            <td><input type='text' class='form-control' name='lebar'  value="<?php echo $row['lebar'] ; ?>" autocomplete=off ></td>
                        </tr>
                       
                      <!--<tr>
                            <th width='120px' scope='row'>jenis_mesin_utama</th>    
                            <td><input type='text' class='form-control' name='jenis_mesin_utama' ></td>
                        </tr> -->
                        <input type='hidden' class='form-control' name='jenis_mesin_utama'   autocomplete=off >
                      
                      
                       
                      <tr>
                            <th width='120px' scope='row'>kapasitas_palka_ikan</th>    
                            <td><input type='text' class='form-control' name='kapasitas_palka_ikan'  value="<?php echo $row['kapasitas_palka_ikan'] ; ?>"  autocomplete=off ></td>
                        </tr>
                       
                      <tr>
                            <th width='120px' scope='row'>kapasitas_palka_umpan</th>    
                            <td><input type='text' class='form-control' name='kapasitas_palka_umpan'  value="<?php echo $row['kapasitas_palka_umpan'] ; ?>" autocomplete=off ></td>
                        </tr>
                       
                      <tr>
                            <th width='120px' scope='row'>vms</th>    
                            <td>
                              <select class='form-control' name='vms' id="vms">
                                  <option value="">Silahkan Pilih</option>
                                  <option value="Ya" <?php if( !empty($row['vms']) ){ if($row['vms'] == "Ya"){ echo 'selected';  } } ?>>Ya</option>
                                   <option value="Tidak" <?php if( !empty($row['vms']) ){ if($row['vms'] == "Tidak"){ echo 'selected';  } } ?>>Tidak</option>
                               </select>
                            </td>
                        </tr>
                       
                      <tr>
                            <th width='120px' scope='row'>vts</th>    
                            <td>
                              <select class='form-control' name='lainnya' id="lainnya">
                                  <option value="">Silahkan Pilih</option>
                                  <option value="Ya" <?php if( !empty($row['lainnya']) ){ if($row['lainnya'] == "Ya"){ echo 'selected';  } } ?>>Ya</option>
                                   <option value="Tidak" <?php if( !empty($row['lainnya']) ){ if($row['lainnya'] == "Tidak"){ echo 'selected';  } } ?>>Tidak</option>
                               </select>
                            </td>
                        </tr>
                       
                       
                     <!-- <tr>
                            <th width='120px' scope='row'>jumlah_pancing</th>    
                            <td><input type='text' class='form-control' name='jumlah_pancing' ></td>
                        </tr>-->
                       <input type='hidden' class='form-control' name='jumlah_pancing' >


                      <!--<tr>
                            <th width='120px' scope='row'>jumlah_abk</th>    
                            <td><input type='text' class='form-control' name='jumlah_abk' ></td>
                        </tr>-->
                       
                      <!--<tr>
                            <th width='120px' scope='row'>nama_kapten</th>    
                            <td><input type='text' class='form-control' name='nama_kapten' ></td>
                        </tr> -->
                      <input type='hidden' class='form-control' name='nama_kapten' >
          
                       

                     <!-- <tr>
                            <th width='120px' scope='row'>bendera_2th</th>    
                            <td><input type='text' class='form-control' name='bendera_2th' ></td>
                        </tr> -->
                      <input type='hidden' class='form-control' name='bendera_2th' >
                       
                      <tr>
                            <th width='120px' scope='row'>pelabuhan_pangkalan</th>    
                            <td><input type='text' class='form-control' name='pelabuhan_pangkalan'  value="<?php echo $row['pelabuhan_pangkalan'] ; ?>"  autocomplete=off></td>
                        </tr>
                      
                     <!-- <tr>
                            <th width='120px' scope='row'>muat_singgah</th>    
                            <td><input type='text' class='form-control' name='muat_singgah' ></td>
                        </tr> -->
                        <input type='hidden' class='form-control' name='muat_singgah' >
                       
                      <tr>
                            <th width='120px' scope='row'>copy_surat_ijin</th>    
                            <td>
                              <!--<input type='text' class='form-control' name='copy_surat_ijin'  autocomplete=off>-->
                              <select class='form-control' name='copy_surat_ijin' id="copy_surat_ijin">
                                  <option value="">Silahkan Pilih</option>
                                  <option value="Ya"  <?php if( !empty($row['copy_surat_ijin']) ){ if($row['copy_surat_ijin'] == "Ya"){ echo 'selected';  } } ?>>Ya</option>
                                   <option value="Tidak" <?php if( !empty($row['copy_surat_ijin']) ){ if($row['copy_surat_ijin'] == "Tidak"){ echo 'selected';  } } ?>>Tidak</option>
                               </select>
                            </td>
                        </tr>
                      
                      <tr>
                            <th width='120px' scope='row'>shark_policy</th>    
                            <td><!--<input type='text' class='form-control' name='shark_policy'  autocomplete=off>-->
                              <select class='form-control' name='shark_policy' id="shark_policy">
                                  <option value="">Silahkan Pilih</option>
                                  <option value="Ya" <?php if( !empty($row['shark_policy']) ){ if($row['shark_policy'] == "Ya"){ echo 'selected';  } } ?>>Ya</option>
                                   <option value="Tidak" <?php if( !empty($row['shark_policy']) ){ if($row['shark_policy'] == "Tidak"){ echo 'selected';  } } ?>>Tidak</option>
                               </select>
                            </td>
                        </tr>
                      
                      <tr>
                            <th width='120px' scope='row'>terdaftar_iuu</th>    
                            <td><!--<input type='text' class='form-control' name='terdaftar_iuu'  autocomplete=off>-->

                              <select class='form-control' name='terdaftar_iuu' id="terdaftar_iuu">
                                  <option value="">Silahkan Pilih</option>
                                  <option value="Ya" <?php if( !empty($row['terdaftar_iuu']) ){ if($row['terdaftar_iuu'] == "Ya"){ echo 'selected';  } } ?>>Ya</option>
                                   <option value="Tidak" <?php if( !empty($row['terdaftar_iuu']) ){ if($row['terdaftar_iuu'] == "Tidak"){ echo 'selected';  } } ?>>Tidak</option>
                               </select>

                            </td>
                        </tr>
                      
                      <tr>
                            <th width='120px' scope='row'>kode_etik_pelayaran</th>    
                            <td><!--<input type='text' class='form-control' name='kode_etik_pelayaran'  autocomplete=off>-->
                               <select class='form-control' name='kode_etik_pelayaran' id="kode_etik_pelayaran">
                                  <option value="">Silahkan Pilih</option>
                                  <option value="Ya" <?php if( !empty($row['kode_etik_pelayaran']) ){ if($row['kode_etik_pelayaran'] == "Ya"){ echo 'selected';  } } ?>>Ya</option>
                                   <option value="Tidak" <?php if( !empty($row['kode_etik_pelayaran']) ){ if($row['kode_etik_pelayaran'] == "Tidak"){ echo 'selected';  } } ?>>Tidak</option>
                               </select>
                            </td>
                        </tr>
                       
                     
                      
                     <!-- <tr>
                            <th width='120px' scope='row'>lokasi_pembuatan</th>    
                            <td><input type='text' class='form-control' name='lokasi_pembuatan' ></td>
                        </tr>-->
                        <input type='hidden' class='form-control' name='lokasi_pembuatan' >

                       

                        <!--<tr>
                            <th width='120px' scope='row'>pk</th>    
                            <td><input type='text' class='form-control' name='pk' ></td>
                        </tr> -->
                       <input type='hidden' class='form-control' name='pk' >

                  
                    </tbody>
                  </table>
                </div>
             
               <button type='submit' name='submit' class='btn btn-info'>Update</button>
               <a href='<?php echo base_url(); ?>master/master_vessel/'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



        </div>
    </div><!-- .animated -->
</div><!-- .content -->


