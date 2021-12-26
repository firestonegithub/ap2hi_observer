        

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><b>Data Trips Handline</b></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Trips</a></li>
                                    <li class="active">List Trips</li>
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
                                <?php if(cek_priviledge_disable("AddTripData")){ ?>
                                <a class='pull-right btn btn-success btn-sm' href='<?php echo base_url(); ?>trip_hl/add_trip'><span class='fa fa-plus-square-o'> </span>Tambahkan Data HL</a>
                                <?php } ?>
                               
                                <a class='pull-right btn btn-danger btn-sm' href='<?php echo base_url(); ?>trip_hl/extract_data'><span class='fa fa-plus-square-o'> </span>Download Data</a>
                            </div>


                            <div class="card-body">
                            	
 <table id="example" class="display" style="width:100%">
        <thead>

            <tr>
            
                <th>id_trip</th>
            
                <th>Nama Perusahaan</th>
            
                <th>Nama_kapal</th>
            
                <th>tanggal_keberangkatan</th>
            
                <th>tanggal_kedatangan</th>
            
                <th>Action </th>
            
            </tr>
        
        </thead>
        
        <tbody>
        
        	<?php 

        	 foreach ($record->result_array() as $row){


        	?>
            <tr>

                <td><?php echo $row['id_trip'] ?></td>

               	<td><?php echo $controller->getNamaPerusahaanFromId($row['id_supplier']); ?></td>

                <td><?php echo $controller->getNamaKapalFromId($row['id_vessel']); ?></td>

                <td><?php echo $row['tanggal_keberangkatan'] ?></td>

                <td><?php echo $row['tanggal_kedatangan'] ?></td>

                <td>	
                	<center>
                    <?php if(cek_priviledge_disable("EditTripData")){ ?>
                        <?php if($row['id_user'] == $id_user || $role == '1' ){ ?>
                       <a class='btn btn-primary btn-xs' title='Edit Data' href='<?php echo base_url()."trip_hl/trip_detail/".$row['id_trip']; ?>'><span class='fa fa-pencil-square-o'></span></a>
                    <?php } ?>
                    <?php } ?>

                    <?php if(cek_priviledge_disable("DeleteTripData")){ ?>
                        <?php if($row['id_user'] == $id_user  || $role == '1' ){ ?>
                       <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url()."trip_hl/trip_disable/".$row['id_trip']; ?>' onclick="return confirm('Are you sure you want to delete this item?');"><span class='fa fa-power-off'></span></a> 
                        <?php } ?>
                     <?php } ?>
                     
                    </center>
                 </td>
            </tr>

            <?php 
        		}
            ?>
        </tbody>
        <tfoot>
              <tr>

                <th>id_trip</th>

                <th>Nama Perusahaan</th>

                <th>Nama_kapal</th>

                <th>tanggal_keberangkatan</th>

                <th>tanggal_kedatangan</th>

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


<script>

$(document).ready(function() {
    $('#example').DataTable();
} );

</script>