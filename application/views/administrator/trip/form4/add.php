

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
                                    echo form_open_multipart('trip/form4_add/'.$kode_trip,$attributes); 
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
                            <td><input type='text' class='form-control' name='tanggal' id="tanggal" value="<?php if( !empty($post['tanggal']) ){ echo $post['tanggal']; } ?>" autocomplete=off ></td>
                       </tr>

                       <tr>
                            <th width='120px' scope='row'>tanggal Selesai (*)</th>   
                            <td><input type='text' class='form-control' name='tanggal2' id="tanggal2" value="<?php if( !empty($post['tanggal2']) ){ echo $post['tanggal2']; } ?>" autocomplete=off ></td>
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

                              </div>-->

                            </td>
                       </tr>

                   

                      <tr>
                            <th width='120px' scope='row'>waktu_selesai (*) (contoh: 11:45 AM)</th>   
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
                                        <input type='number' class='form-control' name='lintang_degree' placeholder="Degree" required autocomplete=off>
                                    </div>
                                     <div class='col-md-4'>
                                        <input type='number' class='form-control' name='lintang_minutes'  placeholder="Minutes" required autocomplete=off min="0" max="60" step=".01">
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
                            <th width='120px' scope='row'>bujur (*)</th>   
                            <td>
                              <!--<input type='text' class='form-control' name='bujur' value="<?php if( !empty($post['bujur']) ){ echo $post['bujur']; } ?>">-->
                              <div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='bujur_degree'  placeholder="Degree" required autocomplete=off>
                                    </div>
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='bujur_minutes' placeholder="Minutes" required autocomplete=off min="0" max="60" step=".01">
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
                            <th width='120px' scope='row'>harga_umpan (Rp)</th>   
                            <td><input type='text' class='form-control' name='harga_umpan' id='harga_umpan' onkeyup="textAddCommas()" value="<?php if( !empty($post['harga_umpan']) ){ echo $post['harga_umpan']; } ?>" autocomplete=off></td>
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
                            <th width='120px' scope='row'>rasio_ember_umpan_kapal </th>   
                            <td><input type='number' class='form-control' name='rasio_ember_umpan_kapal'  autocomplete=off value="1"  readonly></td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>rasio_ember_umpan_sampel (*)</th>   
                            <td><input type='number' class='form-control' name='rasio_ember_umpan_sampel' value="<?php if( !empty($post['rasio_ember_umpan_sampel']) ){ echo $post['rasio_ember_umpan_sampel']; } ?>" autocomplete=off></td>
                       </tr>


                      <tr>
                            <th width='120px' scope='row'>berat_sample_ember_umpan (*) (Kg)</th>   
                            <td><input type='text' class='form-control' name='berat_sample_ember_umpan' id="berat_sample_ember_umpan" onkeyup="textAddCommas()"  value="<?php if( !empty($post['berat_sample_ember_umpan']) ){ echo $post['berat_sample_ember_umpan']; } ?>" autocomplete=off step=".01"></td>
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

        var val = document.getElementById('harga_umpan').value;
      document.getElementById('harga_umpan').value = addCommas(val);  
  }


</script>
