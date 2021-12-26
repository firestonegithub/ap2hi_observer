        

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
                                    <li><a href="<?php echo base_url()."trip/trip_detail/".$kode_trip; ?>">Data Trip</a></li>
                                    <li class="active"><?php echo $page_name_detail ; ?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


 <div class="content">
<div class="alert alert-info">
  <strong>Info!</strong> Tekan tombol kalkulasi untuk melakukan perhitungan dalam sistem.
</div>

<div class="alert alert-warning">
  <strong>Warning!</strong> Tekan tombol kalkulasi hanya jika sudah selesai mengisikan data set total.
</div>
</div>



           <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-header">
                                <strong class="card-title">Trips Form</strong>
                                <a class='pull-right btn btn-success btn-sm' href='<?php echo base_url(); ?>trip/form4_add/<?php echo $kode_trip;  ?>'><span class='fa fa-plus-square-o'> </span>Tambahkan Data</a>
                                  <center><a class='pull-left btn btn-warning btn-sm' href='<?php echo base_url(); ?>trip/form4_kalkulasi/<?php echo $kode_trip;  ?>'><span class='fa fa-plus-square-o'> </span>Kalkulasi</a> </center>

                               
    
                            </div>


                            <div class="card-body">

                    	

 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>no_angkut</th>
                <th>hari</th>
                <th>bulan</th>
                <th>tahun</th>
                <th>waktu_mulai</th>
                <th>waktu_selesai</th>
                <th>lintang</th>
                <th>bujur</th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
        	<?php 

        	 foreach ($record->result_array() as $row){

                 $lintang = explode("," , $row['lintang'] );

                    $lintang_degree= $lintang[0];

                    $lintang_minutes = $lintang[1];

                    $lintang_us = $lintang[2];

                    if($lintang_us == 'U'){

                        $lintang_us = 'N';

                    }elseif($lintang_us == 'S'){

                        $lintang_us = 'S'; 

                    }


                $bujur = explode("," , $row['bujur']);

                    $bujur_degree = $bujur[0];

                    $bujur_minutes = $bujur[1];

                    $bujur_us = $bujur[2];

                     if($bujur_us == 'T'){

                        $bujur_us = 'E';

                    }
                    
        	?>
            <tr>
                <td><?php echo $row['no_angkut'] ?></td>
               	<td><?php echo $row['hari'] ?></td>
               	<td><?php echo $row['bulan'] ?></td>
                <td><?php echo $row['tahun'] ?></td>
                <td><?php echo $row['jam_mulai'] ?>:<?php echo $row['menit_mulai'] ?></td>
                <td><?php echo $row['jam_selesai'] ?>:<?php echo $row['menit_selesai'] ?></td>
                <td><?php echo $lintang_degree ?>&#176; <?php echo $lintang_minutes ?>' <?php echo $lintang_us ?>  </td>
                <td><?php echo $bujur_degree ?>&#176; <?php echo $bujur_minutes ?>' <?php echo $bujur_us ?></td>
                
                <td>	
                	<center>
                       <a class='btn btn-primary btn-xs' title='Edit Data' href='<?php echo base_url()."trip/form4_update/".$row['id_trip']."/".$row['seq']; ?>'><span class='fa fa-pencil-square-o'></span></a>
                       <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url()."trip/form4_delete/".$row['id_trip']."/".$row['seq']; ?>' onclick="return confirm('Are you sure you want to delete this item?');"><span class='fa fa-power-off'></span></a>
                    </center>
                 </td>
            </tr>

            <?php 
        		}
            ?>
        </tbody>
        <tfoot>
              <tr>
                <th>no_angkut</th>
                <th>hari</th>
                <th>bulan</th>
                <th>tahun</th>
                <th>waktu_mulai</th>
                <th>waktu_selesai</th>
                <th>lintang</th>
                <th>bujur</th>
                <th>Action </th>
            </tr>
        </tfoot>
    </table>

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   





        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<?php if(count($data_kalkulasi) > 0){  ?>


<?php
 $hasil =  $data_kalkulasi['result'];
 $hasil2 = json_decode($hasil , true);


?>

  <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-header">
                                <center><strong class="card-title">Hasil Kalkulasi</strong></center>
                               
                            </div>


                            <div class="card-body">

     <?php 

$CI     = & get_instance();


?>                           

 <table id="example2" class="display" style="width:100%">
        <thead>
            <tr>
                <th>id_trip</th>
                <th>id_set</th>
                <th>no angkut </th>
                <th>Species</th>
                <th>Berat (Kg)</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>

            <?php 

            $i=0;

foreach($hasil2 as $key=>$value){

    foreach($value as $key=>$value2){
         
            if($key>0){
              
                foreach($hasil2[$i][$key] as $keys => $value3){
                    ?>


                        <tr>
                            <td><?php echo $kode_trip; ?></td>
                            <td><?php echo $key; ?></td>
                            <th><?php echo $CI->find_set_from_seq($key , $kode_trip , 'Umpan'); ?></th>
                            <td><?php echo $keys; ?></td>
                            <td><?php echo number_format( $value3['HASIL_AKHIR_by_weight'] , 2 ); ?></td>
                            <td><?php echo number_format($value3['HASIL_AKHIR_by_jumlah']); ?></td>
                            
                        </tr>
                   

                    <?php 


                }
               
                
                $i++;
                
            }



    }

}

            ?>
           
           
        </tbody>
        <tfoot>
              <tr>
                <th>id_trip</th>
                <th>id_set</th>
                <th>no angkut </th>
                <th>Species</th>
                <th>Berat (Kg)</th>
                <th>Jumlah</th>
            </tr>
        </tfoot>
    </table>


                          </div> <!-- /.table-stats -->
                        </div>
                    </div>

                               
    

        </div>
    </div><!-- .animated -->


</div><!-- .content -->



<?php }

 

 ?>




 <div class="content pb-0">

 <div class="row">

             <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7f-note2"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                       <?php echo $link_form1 ; ?>
                                      
                                        <span>Trip Information</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7f-unlock"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                       <?php echo $link_form2 ; ?>
                                      
                                        <span>Daily Notes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="pe-7f-server"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                         <?php echo $link_form3 ; ?>
                                    
                                         <span>Data Hasil Tangkapan </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

       
            </div> 


             <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7f-delete-user"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                       <?php echo $link_form5 ; ?>
                                  
                                         <span> Data Umpan tidak Digunakan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="pe-7f-look"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <?php echo $link_form6 ; ?>
                                       
                                         <span> ETP </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="pe-7f-next-2"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                        <?php echo $link_form7 ; ?>
                                
                                         <span> Pemindahan Ikan </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> 

</div>



<script>

$(document).ready(function() {
    $('#example').DataTable();

    $('#example2').DataTable();
} );

</script>