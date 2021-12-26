        

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Data <?php echo $name ; ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Miscellaneous</a></li>
                                    <li><a href="#"><?php echo $name ; ?></a></li>
                                    <li class="active">List <?php echo $name ; ?></li>
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
                                <strong class="card-title"><?php echo $name ; ?>  Form</strong>
                                <a class='pull-right btn btn-success btn-sm' href='<?php echo base_url(); ?>master/add_master_dictionary/<?php echo $tipe ; ?>'><span class='fa fa-plus-square-o'> </span>Tambahkan Data</a>
                            </div>


                            <div class="card-body">

                            	

 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Kode Aktivitas</th>
                <th>Jenis Aktivitas</th>
                <th>Nama Aktivitas</th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
        	<?php 

        	$ci = & get_instance();

        	 foreach ($record->result_array() as $row){


        	?>
            <tr>
                <td><?php echo $row['kode_aktivitas'] ?></td>
               	<td><?php echo $row['jenis_aktivitas'] ?></td>
               	<td><?php echo $row['nama_aktivitas'] ?></td>
                <td>	
                	<center>
                       <a class='btn btn-primary btn-xs' title='Edit Data' href='<?php echo base_url()."master/update_master_dictionary/".$tipe."/".$row['kode_aktivitas']; ?>'><span class='fa fa-pencil-square-o'></span></a>
                       <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url()."master/disable_master_dictionary/".$tipe."/".$row['kode_aktivitas']; ?>' onclick="return confirm('Are you sure you want to delete this item?');"><span class='fa fa-power-off'></span></a>
                    </center>
                 </td>
            </tr>

            <?php 
        		}
            ?>
        </tbody>
        <tfoot>
              <tr>
                <th>Kode Aktivitas</th>
                <th>Jenis Aktivitas</th>
                <th>Nama Aktivitas</th>
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