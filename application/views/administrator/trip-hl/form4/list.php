        

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
                                    <li><a href="<?php echo base_url()."trip_hl/trip_detail/".$kode_trip; ?>">Data Trip</a></li>
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
                                <a class='pull-right btn btn-success btn-sm' href='<?php echo base_url(); ?>trip_hl/form4_add/<?php echo $kode_trip;  ?>'><span class='fa fa-plus-square-o'> </span>Tambahkan Data</a>
                            
                               
    
                            </div>


                            <div class="card-body">

                    	

 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>no_tangkapan</th>
                <th>hari</th>
                <th>bulan</th>
                <th>tahun</th>
                <th>waktu_mulai</th>
                <th>waktu_selesai</th>
                <th>latitude</th>
                <th>longitude</th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
        	<?php 

        	 foreach ($record->result_array() as $row){

                    
        	?>
            <tr>
                <td><?php echo $row['no_tangkapan'] ?></td>
               	<td><?php echo $row['hari'] ?></td>
               	<td><?php echo $row['bulan'] ?></td>
                <td><?php echo $row['tahun'] ?></td>
                <td><?php echo $row['jam_mulai'] ?>:<?php echo $row['menit_mulai'] ?></td>
                <td><?php echo $row['jam_selesai'] ?>:<?php echo $row['menit_selesai'] ?></td>
                <td><?php echo $row['latitude'] ?>  </td>
                <td><?php echo $row['longitude'] ?></td>
                
                <td>	
                	<center>
                       <a class='btn btn-primary btn-xs' title='Edit Data' href='<?php echo base_url()."trip_hl/form4_update/".$row['id_trip']."/".$row['seq']; ?>'><span class='fa fa-pencil-square-o'></span></a>
                       <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url()."trip_hl/form4_delete/".$row['id_trip']."/".$row['seq']; ?>' onclick="return confirm('Are you sure you want to delete this item?');"><span class='fa fa-power-off'></span></a>
                    </center>
                 </td>
            </tr>

            <?php 
        		}
            ?>
        </tbody>
        <tfoot>
              <tr>
                <th>no_tangkapan</th>
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
                                <div class="stat-icon dib flat-color-2">
                                    <i class="pe-7f-server"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                         <!--<a href="<?php echo base_url(); ?>trip/form3/<?php echo $kode_trip; ?>"> <div class="stat-text">  Form 3 </div> </a>-->
                                         <?php echo $link_form3 ; ?>
                                         <span>Data Hasil Tangkapan </span>
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
                                        <!--<a href="<?php echo base_url(); ?>trip/form7/<?php echo $kode_trip; ?>"> <div class="stat-text">  Form 7 </div> </a>-->
                                        <?php echo $link_form7 ; ?>
                                         <span> Alat tangkap Hilang  </span>
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
                                       <?php echo $link_form8 ; ?>
                                  
                                        <span> Pemindahan Ikan   </span>
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
                                        <?php echo $link_form9 ; ?>
                                       
                                         <span> Laporan perjalanan Observer    </span>
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