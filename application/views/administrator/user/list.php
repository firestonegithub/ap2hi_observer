        

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
                                 	 <li><a href="#">User Lists</a></li>
                                    <li class="active">User</li>
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
                                <strong class="card-title">List users</strong>
                                <?php if(cek_priviledge_disable("AddUserData")){ ?>
                                <a class='pull-right btn btn-success btn-sm' href='<?php echo base_url(); ?>user/add_user/'><span class='fa fa-plus-square-o'> </span>Tambahkan Data</a>
                                <?php } ?>
                            </div>


                            <div class="card-body">

                            	

 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>id_user</th>
                <th>username</th>
                <th>name</th>
                <th>role</th>
                <th>address</th>
                <th>no_telp</th>
                <th>no_hp</th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
        	<?php 

        	 foreach ($userLists->result_array() as $row){

        	?>
            <tr>
                <td><?php echo $row['id_user'] ?></td>
               	<td><?php echo $row['username'] ?></td>
               	<td><?php echo $row['name'] ?></td>
                <td><?php echo $row['role_name'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><?php echo $row['no_telp'] ?></td>
                <td><?php echo $row['no_hp'] ?></td>
                <td>	
                	<center>
                       <?php if(cek_priviledge_disable("EditUserData")){ ?>
                       <a class='btn btn-primary btn-xs' title='Edit Data' href='<?php echo base_url()."user/user_update/".$row['id_user']; ?>'><span class='fa fa-pencil-square-o'></span></a>
                       <?php } ?>

                       <?php if(cek_priviledge_disable("DeleteUserData")){ ?>
                       <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url()."user/user_delete/".$row['id_user']; ?>' onclick="return confirm('Are you sure you want to delete this item?');"><span class='fa fa-power-off'></span></a>
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
                <th>id_user</th>
                <th>username</th>
                <th>name</th>
                <th>role</th>
                <th>address</th>
                <th>no_telp</th>
                <th>no_hp</th>
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