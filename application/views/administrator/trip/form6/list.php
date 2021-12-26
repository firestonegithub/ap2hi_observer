        

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
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-header">
                                <strong class="card-title">Trips Form</strong>
                                <a class='pull-right btn btn-success btn-sm' href='<?php echo base_url(); ?>trip/form6_add/<?php echo $kode_trip;  ?>'><span class='fa fa-plus-square-o'> </span>Tambahkan Data</a>
                            </div>


                            <div class="card-body">

                    	

 <table id="example" class="display nowrap" style="width:100%;">
        <thead>
            <tr>

                   <th>kode trip  <th>
                   <th>id_pemantau  <th>
                   <th>aktivitas_memancing  <th>
                   <th>tanggal  <th>
                   <th>waktu  <th>
                   <th>lintang  <th>
                   <th>bujur  <th>
                   <th>jenis_pancing  <th>
                   <th>kode_posisi_pancing  <th>
                   <th>kode_kondisi_tertangkap  <th>
                   <th>kode_kondisi_tertangkap_deskripsi  <th>
                   <th>kode_kondisi_dilepas  <th>
                   <th>kode_kondisi_dilepas_deskripsi  <th>
                   <th>tanda  <th>
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
               
                     <td><?php echo $row['id_trip'] ?>  <td>
                    <td><?php echo $row['id_pemantau'] ?>  <td>
                   <td><?php echo $row['aktivitas_memancing'] ?>  <td>
                   <td><?php echo $row['tanggal'] ?>  <td>
                   <td><?php echo $row['waktu'] ?>  <td>
                   <td> <?php echo $lintang_degree ?>&#176; <?php echo $lintang_minutes ?>' <?php echo $lintang_us ?>  <td>
                   <td> <?php echo $bujur_degree ?>&#176; <?php echo $bujur_minutes ?>' <?php echo $bujur_us ?>  <td>
                   <td><?php echo $row['jenis_pancing'] ?>  <td>
                   <td><?php echo $row['kode_posisi_pancing'] ?>  <td>
                   <td><?php echo $row['kode_kondisi_tertangkap'] ?> <td>
                   <td><?php echo $row['kode_kondisi_tertangkap_deskripsi'] ?>  <td>
                   <td><?php echo $row['kode_kondisi_dilepas'] ?>  <td>
                   <td><?php echo $row['kode_kondisi_dilepas_deskripsi'] ?>  <td>
                   <td><?php echo $row['tanda'] ?>  <td>
                <td>	
                	<center>
                       <a class='btn btn-primary btn-xs' title='Edit Data' href='<?php echo base_url()."trip/form6_update/".$row['id_trip']."/".$row['seq']; ?>'><span class='fa fa-pencil-square-o'></span></a>
                       <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url()."trip/form6_delete/".$row['id_trip']."/".$row['seq']; ?>' onclick="return confirm('Are you sure you want to delete this item?');"><span class='fa fa-power-off'></span></a>
                    </center>
                 </td>
            </tr>

            <?php 
        		}
            ?>
        </tbody>
        <tfoot>
              <tr>
                    <th>kode trip  <th>
                   <th>id_pemantau  <th>
                   <th>aktivitas_memancing  <th>
                   <th>tanggal  <th>
                   <th>waktu  <th>
                   <th>lintang  <th>
                   <th>bujur  <th>
                   <th>jenis_pancing  <th>
                   <th>kode_posisi_pancing  <th>
                   <th>kode_kondisi_tertangkap  <th>
                   <th>kode_kondisi_tertangkap_deskripsi  <th>
                   <th>kode_kondisi_dilepas  <th>
                   <th>kode_kondisi_dilepas_deskripsi  <th>
                   <th>tanda  <th>
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
                                <div class="stat-icon dib flat-color-3">
                                    <i class="pe-7f-plug"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                      <?php echo $link_form4 ; ?>
                                       
                                         <span> Data Sampling Umpan </span>
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
    $('#example').DataTable( {
        "scrollX": true
    } );
} );

</script>

<style>

div.dataTables_wrapper {
        width: 1600px;
        margin: 0 auto;
    }

</style>