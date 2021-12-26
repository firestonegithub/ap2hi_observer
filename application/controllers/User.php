<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {



	function add_user(){

		cek_session_admin(); 

		cek_priviledge_return("AddUserData");

		$data['page_category'] = 'User Lists'; 

		$data['page_name'] = 'Add User'; 

		$data['roles'] = $this->Model_user->list_roles();

		$data['suppLists'] =  $this->Model_master->master_supplier_lists();

		$data['landingLists'] =  $this->Model_master->master_landing_lists();

		if (isset($_POST['submit'])){

			$this->form_validation->set_rules('username', 'username', 'required');

			$this->form_validation->set_rules('password', 'password', 'required');

			$this->form_validation->set_rules('name', 'name', 'required');


			 if ( $this->form_validation->run() == TRUE  ) {

			 	if( $_FILES['photo']['name'] != "" ){

			  			$photo = $this->upload_foto('photo');
			  			$_POST['photo'] =  $photo['file_name']  ; 

			  	}


			 	$this->Model_user->add_new_user($this->input->post());

				redirect('user/user_list/');


			 }else{

	          	$data['post'] = $_POST; 

	          	
	          }


		}


		$this->template->load('administrator/template','administrator/user/add' , $data );

	}


	    function upload_foto( $filename ){
	    	
	        $config['upload_path']          = 'assets/users/';

	        $config['allowed_types']        = 'gif|jpg|png|jpeg';

	        $config['encrypt_name']			= TRUE;

	        $this->load->library('upload', $config);

	        ;

	        if ( !$this->upload->do_upload(''.$filename.'')){
					$error = array('error' => $this->upload->display_errors());
			}else{
					$data = array('upload_data' => $this->upload->data());
			}


			 return $this->upload->data();

    	}


	function user_list(){

		cek_session_admin(); 

		cek_priviledge_return("ViewUserData");

		$data['userLists'] = $this->Model_user->select_lists(); 

		$data['page_name'] = 'User Lists'; 

		$this->template->load('administrator/template','administrator/user/list' , $data );

	}


	function role_editor(){

		cek_session_admin(); 

		cek_priviledge_return("ViewRoles");

		$data['roleLists'] = $this->Model_user->list_roles(); 

		$data['page_name'] = 'Role Lists'; 

		$this->template->load('administrator/template','administrator/role/list' , $data );
	}


	function add_role(){

		cek_session_admin(); 

		$data['page_category'] = 'User Role'; 

		$data['page_name'] = 'Update Role'; 

		$data['permissions'] =  $this->Model_user->permission_lists();

		if (isset($_POST['submit'])){

			$this->form_validation->set_rules('role_name', 'role_name', 'required');

			$this->form_validation->set_rules('role_desc', 'role_desc', 'required');


			 if ( $this->form_validation->run() == TRUE  ) {

			 	$this->Model_user->add_new_role($this->input->post());

				redirect('user/role_editor/');


			 }else{

	          	$data['post'] = $_POST; 

	          	
	          }

	      }

	      $this->template->load('administrator/template','administrator/role/add' , $data );

	}


	function role_update($role_id){

		cek_session_admin(); 

		$data['page_category'] = 'User Role'; 

		$data['page_name'] = 'Update Role'; 

		$data['post'] = $this->Model_user->role_detail($role_id)->row_array();

		$data['permissions'] =  $this->Model_user->permission_lists();

		$data['this_permissions'] =  $this->Model_user->this_permissions($role_id);

		$data['role_id'] = $role_id ; 

		if (isset($_POST['submit'])){

			$this->form_validation->set_rules('role_name', 'role_name', 'required');

			$this->form_validation->set_rules('role_desc', 'role_desc', 'required');


			 if ( $this->form_validation->run() == TRUE  ) {

			 	$this->Model_user->update_role($this->input->post());

				redirect('user/role_editor/');


			 }else{

	          	$data['post'] = $_POST; 

	          	
	          }

	      }



		$this->template->load('administrator/template','administrator/role/update' , $data );


	}

	function user_update($id_user){

		cek_session_admin(); 

		$data['page_category'] = 'User Lists'; 

		$data['page_name'] = 'Update User'; 

		$data['roles'] = $this->Model_user->list_roles();

		$data['post'] = $this->Model_user->user_detail($id_user)->row_array();

		$data['suppLists'] =  $this->Model_master->master_supplier_lists();

		$data['landingLists'] =  $this->Model_master->master_landing_lists();

		$data['id_user'] = $id_user ; 

		if (isset($_POST['submit'])){

			$this->form_validation->set_rules('username', 'username', 'required');

			$this->form_validation->set_rules('name', 'name', 'required');


			 if ( $this->form_validation->run() == TRUE  ) {

			 	if( $_FILES['photo']['name'] != "" ){

			  			$photo = $this->upload_foto('photo');
			  			$_POST['photo'] =  $photo['file_name']  ; 

			  	}


			 	$this->Model_user->update_user($this->input->post());

				redirect('user/user_list/');


			 }else{

	          	$data['post'] = $_POST; 

	          	
	          }


		}


		$this->template->load('administrator/template','administrator/user/update' , $data );


	}



	function user_delete($id_user){

		cek_session_admin(); 



		$this->Model_user->user_delete($id_user);

		redirect('user/user_list/');

	}



	function user_detail(){
		cek_session_admin();

		$ci = & get_instance();

		$id_user = $ci->session->userdata('id_user');  

		$data['roles'] = $this->Model_user->list_roles();

		$data['level'] = $ci->session->userdata('level');  
	
		$data['page_category'] = 'User Lists'; 

		$data['page_name'] = 'My User'; 

		$data['post'] = $this->Model_user->user_detail($id_user)->row_array();

		$data['id_user'] = $id_user ; 


		if (isset($_POST['submit'])){

			$this->form_validation->set_rules('username', 'username', 'required');

			$this->form_validation->set_rules('name', 'name', 'required');


			 if ( $this->form_validation->run() == TRUE  ) {

			 	if( $_FILES['photo']['name'] != "" ){

			  			$photo = $this->upload_foto('photo');
			  			$_POST['photo'] =  $photo['file_name']  ; 

			  	}


			 	$this->Model_user->update_user($this->input->post());

				redirect('user/user_list/');


			 }else{

	          	$data['post'] = $_POST; 

	          	
	          }


		}


		$this->template->load('administrator/template','administrator/user/update_self' , $data );


	}



}	