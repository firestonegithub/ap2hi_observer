        

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
                                 	 <li><a href="#">Role Lists</a></li>
                                    <li class="active">Roles</li>
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
                                <strong class="card-title">List roles</strong>
                                <?php //if(cek_priviledge_disable("AddUserData")){ ?>
                                <a class='pull-right btn btn-success btn-sm' href='<?php echo base_url(); ?>user/add_role/'><span class='fa fa-plus-square-o'> </span>Tambahkan Data</a>
                                <?php //} ?>
                            </div>


                            <div class="card-body">

                            	

 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>role_id</th>
                <th>role_name</th>
                <th>role_desc</th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
        	<?php 

        	 foreach ($roleLists->result_array() as $row){

        	?>
            <tr>
                <td><?php echo $row['role_id'] ?></td>
               	<td><?php echo $row['role_name'] ?></td>
               	<td><?php echo $row['role_desc'] ?></td>
                <td>	
                	<center>
                       <?php //if(cek_priviledge_disable("EditUserData")){ ?>
                       <a class='btn btn-primary btn-xs' title='Edit Data' href='<?php echo base_url()."user/role_update/".$row['role_id']; ?>'><span class='fa fa-pencil-square-o'></span></a>
                       <?php //} ?>

                 
                    </center>
                 </td>
            </tr>

            <?php 
        		}
            ?>
        </tbody>
        <tfoot>
              <tr>
               	<th>role_id</th>
                <th>role_name</th>
                <th>role_desc</th>
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