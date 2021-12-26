


 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><?php echo $page_name ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo base_url()."administrator/" ?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url()."user/user_list"; ?>"><?php echo $page_category ?></a></li>
                                    <li class="active"><?php echo $page_name ?></li>
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
                                <strong class="card-title"><?php echo $page_name ?></strong>
                                
                            </div>


                            <div class="card-body">

                            	<?php echo validation_errors(); ?>
                            	<?php 
                            	 $attributes = array('class'=>'form-horizontal','role'=>'form');
             						echo form_open_multipart('user/user_update/'.$id_user.'',$attributes); 
                            	?>

              <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                   <input type='hidden' class='form-control' name='id_user' id="id_user" value="<?php if( !empty($post['id_user']) ){ echo $post['id_user']; } ?>" autocomplete=off> 
                    <tr>
                            <th width='120px' scope='row'>username</th>    
                            <td><input type='text' class='form-control' name='username' id="username" value="<?php if( !empty($post['username']) ){ echo $post['username']; } ?>" autocomplete=off></td>
                    </tr>
                    <tr>
                            <th width='120px' scope='row'>username</th>    
                            <td><input type='text' class='form-control' name='username' id="username" value="<?php if( !empty($post['username']) ){ echo $post['username']; } ?>" autocomplete=off></td>
                    </tr>

                    
                    <tr>
                            <th width='120px' scope='row'>password</th>    
                            <td><input type='password' class='form-control' name='password' id="password" value="<?php if( !empty($post['kode_species']) ){ echo $post['kode_species']; } ?>" autocomplete=off></td>
                    </tr>

                    
                    <tr>
                            <th width='120px' scope='row'>name</th>    
                            <td><input type='text' class='form-control' name='name' id="name" value="<?php if( !empty($post['name']) ){ echo $post['name']; } ?>" autocomplete=off></td>
                    </tr>

                    
                    <tr>
                            <th width='120px' scope='row'>address</th>    
                            <td><input type='text' class='form-control' name='address' id="address" value="<?php if( !empty($post['address']) ){ echo $post['address']; } ?>" autocomplete=off></td>
                    </tr>

                    
                    <tr>
                            <th width='120px' scope='row'>current_address</th>    
                            <td><input type='text' class='form-control' name='current_address' id="current_address" value="<?php if( !empty($post['current_address']) ){ echo $post['current_address']; } ?>" autocomplete=off></td>
                    </tr>

                    
                    <tr>
                            <th width='120px' scope='row'>no_telp</th>    
                            <td><input type='number' class='form-control' name='no_telp' id="no_telp" value="<?php if( !empty($post['no_telp']) ){ echo $post['no_telp']; } ?>" autocomplete=off></td>
                    </tr>

                    
                    <tr>
                            <th width='120px' scope='row'>no_hp</th>    
                            <td><input type='number' class='form-control' name='no_hp' id="no_hp" value="<?php if( !empty($post['no_hp']) ){ echo $post['no_hp']; } ?>" autocomplete=off></td>
                    </tr>

                    
                    <tr>
                            <th width='120px' scope='row'>email</th>    
                            <td><input type='text' class='form-control' name='email' id="email" value="<?php if( !empty($post['email']) ){ echo $post['email']; } ?>" autocomplete=off></td>
                    </tr>

                    
                    <tr>
                            <th width='120px' scope='row'>photo</th>    
                            <td><input type='file' class='form-control' name='photo' id="photo"></td>
                    </tr>

                    
                        
                            <th width='120px' scope='row'>role</th>    
                            <td>
                          
                                <?php  if($level == '3' || $level == '4'){ ?>
                                    <select class="form-control" name='role' id="role" style="display: none;">
                                        <option value="">Select Role</option>
                                       <?php foreach($roles->result() as $row){ ?>
                                        <option value="<?php echo $row->role_id ; ?>" <?php if( !empty($post['role']) ){  if ( $post['role'] == $row->role_id ) { echo 'selected'; } } ?> ><?php echo $row->role_name ; ?></option>
                                       <?php  } ?>
                                    </select>
                                <?php }else{ ?>

                                    <select class="form-control" name='role' id="role">
                                        <option value="">Select Role</option>
                                       <?php foreach($roles->result() as $row){ ?>
                                        <option value="<?php echo $row->role_id ; ?>" <?php if( !empty($post['role']) ){  if ( $post['role'] == $row->role_id ) { echo 'selected'; } } ?> ><?php echo $row->role_name ; ?></option>
                                       <?php  } ?>
                                    </select>
                                
                                <?php } ?>
                                     
                           
                                 
                            </td>
                       
                       
                    </tr>


     
                    </tbody>
                  </table>
                </div>
             
               <button type='submit' name='submit' class='btn btn-info'>Add</button>
               <a href='<?php echo base_url()."user/user_list/"; ?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



        </div>
    </div><!-- .animated -->
</div><!-- .content -->