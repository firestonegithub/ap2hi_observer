        

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
                                    <li><a href="#">Data Supplier</a></li>
                                    <li class="active">List Suplier</li>
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
                                <strong class="card-title">Supplier Form</strong>
                                <?php if(cek_priviledge_disable("AddSupplier")){ ?>
                                <a class='pull-right btn btn-success btn-sm' href='<?php echo base_url(); ?>master/add_master_supplier'><span class='fa fa-plus-square-o'> </span>Tambahkan Data</a>
                                <?php  } ?>
                            </div>


                            <div class="card-body">

                            	

 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>kode_name</th>
                <th>Nama Perusahaan</th>
                <th>Tipe Perusahaan</th>
                <th>Alamat</th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
        	<?php 

        	 foreach ($record->result_array() as $row){


        	?>
            <tr>
                <td><?php echo $row['kode_name'] ?></td>
               	<td><?php echo $row['nama_perusahaan'] ?></td>
               	<td><?php echo $row['tipe_perusahaan'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td>	
                	<center>
                        <?php if(cek_priviledge_disable("EditSupplier")){ ?>
                       <a class='btn btn-primary btn-xs' title='Edit Data' href='<?php echo base_url()."master/update_master_supplier/".$row['id_supplier']; ?>'><span class='fa fa-pencil-square-o'></span></a>
                       <?php } ?>

                        <?php if(cek_priviledge_disable("DeleteSupplier")){ ?>
                       <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url()."master/disable_master_supplier/".$row['id_supplier']; ?>' onclick="return confirm('Are you sure you want to delete this item?');"><span class='fa fa-power-off'></span></a>
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
                <th>kode_name</th>
                <th>Nama Perusahaan</th>
                <th>Tipe Perusahaan</th>
                <th>Alamat</th>
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