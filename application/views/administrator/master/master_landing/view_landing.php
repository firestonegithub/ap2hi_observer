        

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Data Landing</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Landing</a></li>
                                    <li class="active">List Landing</li>
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
                                <strong class="card-title">Landing  Form</strong>
                                <?php if(cek_priviledge_disable("AddLanding")){ ?>
                                <a class='pull-right btn btn-success btn-sm' href='<?php echo base_url(); ?>master/add_master_landing'><span class='fa fa-plus-square-o'> </span>Tambahkan Data</a>
                                <?php  } ?>
                            </div>


                            <div class="card-body">

                            	

 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>kode_name</th>
                <th>Nama Landing</th>
                <th>Lokasi</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
        	<?php 

        	$ci = & get_instance();

        	 foreach ($record->result_array() as $row){


        	?>
            <tr>
                <td><?php echo $row['kode_name'] ?></td>
               	<td><?php echo $row['nama_landing'] ?></td>
               	<td><?php echo $row['lokasi'] ?></td>
                <td><?php echo $ci->getProvince($row['province']); ?></td>
                <td><?php echo $ci->getRegencies($row['regencies']); ?></td>
                <td><?php echo $ci->getDistrict($row['district']); ?></td>
                <td>	
                	<center>
                     <?php if(cek_priviledge_disable("EditLanding")){ ?>
                       <a class='btn btn-primary btn-xs' title='Edit Data' href='<?php echo base_url()."master/update_master_landing/".$row['kode_name']; ?>'><span class='fa fa-pencil-square-o'></span></a>
                     <?php  } ?>

                     <?php if(cek_priviledge_disable("DeleteLanding ")){ ?>
                       <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url()."master/disable_master_landing/".$row['kode_name']; ?>' onclick="return confirm('Are you sure you want to delete this item?');"><span class='fa fa-power-off'></span></a>
                       <?php  } ?>
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
                <th>Nama Landing</th>
                <th>Lokasi</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
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