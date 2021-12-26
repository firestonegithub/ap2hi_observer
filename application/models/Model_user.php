<?php 
class Model_user extends CI_model{


	function select_lists(){

		$ci = & get_instance();

		$id_user = $ci->session->userdata('id_user'); 


		return $this->db->query("SELECT * FROM tb_user , tb_user_detail , tb_roles
			where active ='1' 
			and tb_user.id_user = tb_user_detail.id_user 
			and tb_user.role = tb_roles.role_id::varchar
			and tb_user.id_user != '".$id_user."'  
			order by tb_user.id_user 

			");

	}

	function lists(){

	return $this->db->query("SELECT * FROM tb_user , tb_user_detail where active ='1' and tb_user.id_user = tb_user_detail.id_user order by tb_user.id_user  ");


	}

	function list_roles(){

		return $this->db->query("SELECT role_id, role_name, role_desc FROM tb_roles ORDER BY role_id");
	}

	function role_detail($role_id){

		return $this->db->query("
			SELECT *
			FROM tb_roles
			where role_id =  '".$role_id."'");


	}


	function add_new_user($data=array()){


		$ci = & get_instance();

		if($data){

		
			$created_by =   $ci->session->userdata('id_user'); 
			
			$created_date =  date('Y-m-d h:i:s');

			$sql = "INSERT INTO tb_user(
		            name, username, password, active , created_by , created_date , role )
					    VALUES ('".$data['name']."', '".$data['username']."', '".md5($data['password'])."', '1', '".$created_by."', '".$created_date."', 
		            '".$data['role']."');" ; 
			
			$result = $this->db->query($sql);

			$getid_ = $this->db->insert_id() ; 


			$result = $this->db->query( "INSERT INTO tb_user_detail(
								             id_user, name, address, current_address, photo, 
								            no_telp, no_hp, email)
								    				VALUES ( '".$getid_."', '".$data['name']."', '".$data['address']."', '".$data['current_address']."', 
								            '".$data['photo']."', '".$data['no_telp']."', '".$data['no_hp']."', '".$data['email']."'); ");


			if($data['role'] == 3 | $data['role'] == 4){
		            $supp_data = json_encode($data['supp_id']);
		            $landing_data = json_encode($data['landing_id']);

							$sql = "INSERT INTO tb_user_access(
					            id_user, supplier_data, landing_data)
					    			VALUES ('".$getid_."', '".$supp_data."', '".$landing_data."');";
					    	$this->db->query($sql);

		        }

		}


	}


	function add_new_role($data=array()){

		$ci = & get_instance();

		if($data){

			$create_by =   $ci->session->userdata('id_user'); 
			
			$create_date =  date('Y-m-d h:i:s');

			$sql = "
				INSERT INTO tb_roles(  role_name, role_desc, create_by, create_date)
			    VALUES ( '".$data['role_name']."' , '".$data['role_desc']."'  , '".$create_by."'  , '".$create_date."');";

			$this->db->query($sql);

			$getid_ = $this->db->insert_id() ; 



		if(isset($data['perm_id'])){

			$this->db->query("DELETE from tb_role_perm where role_id ='".$getid_."'");

			foreach($data['perm_id'] as $row){

				$sql = "INSERT INTO tb_role_perm(
					            role_id, perm_id)
					    			VALUES ('".$getid_."', '".$row."');";
					    	$this->db->query($sql);

			}


		}
			

		}



	}


	function update_role($data=array()){

		$ci = & get_instance();

		if($data){

			$changed_by =   $ci->session->userdata('id_user'); 
			
			$changed_date =  date('Y-m-d h:i:s');

			$sql = "UPDATE tb_roles
									   SET  role_name = '".$data['role_name']."' ,
									   role_desc = '".$data['role_desc']."' , 
									    change_by = '".$changed_by."' , 
									    change_dateby = '".$changed_date."' 
									 WHERE role_id ='".$data['role_id']."';";
					    	$this->db->query($sql);


		if(isset($data['perm_id'])){

			$this->db->query("DELETE from tb_role_perm where role_id ='".$data['role_id']."'");

			foreach($data['perm_id'] as $row){

				$sql = "INSERT INTO tb_role_perm(
					            role_id, perm_id)
					    			VALUES ('".$data['role_id']."', '".$row."');";
					    	$this->db->query($sql);

			}


		}
			

		}
	}


	function permission_lists(){

		return $this->db->query("SELECT * FROM tb_permissions ORDER BY perm_id");

	}

	function this_permissions($role_id){

		return $this->db->query("SELECT perm_id FROM tb_role_perm where role_id = '".$role_id."' ORDER BY perm_id");

	}

	function update_user($data=array()){

		$ci = & get_instance();


			if($data){

		
			$changed_by =   $ci->session->userdata('id_user'); 
			
			$changed_date =  date('Y-m-d h:i:s');

			if($data["password"] != ""){

			$sql = "
						UPDATE tb_user
						   SET  name='".$data['name']."', username='".$data['username']."', password='".md5($data['password'])."', active='1', changed_by='".$changed_by."', 
						       changed_date='".$changed_date."', role='".$data['role']."'
						 WHERE id_user='".$data['id_user']."'
			" ; 
			
				$result = $this->db->query($sql);

			}else{

			$sql = "
						UPDATE tb_user
						   SET  name='".$data['name']."', username='".$data['username']."', active='1', changed_by='".$changed_by."', 
						       changed_date='".$changed_date."', role='".$data['role']."'
						 WHERE id_user='".$data['id_user']."'
			" ; 
			
				$result = $this->db->query($sql);

			}



			if($data["photo"] != ""){

	
				$result = $this->db->query( "


					UPDATE tb_user_detail
								   SET  name='".$data['name']."', address='".$data['address']."', current_address='".$data['current_address']."', 
								       photo='".$data['photo']."', no_telp='".$data['no_telp']."', no_hp='".$data['no_hp']."', email='".$data['email']."'
								 WHERE  id_user='".$data['id_user']."' ");

			}else{

				$result = $this->db->query( "


				UPDATE tb_user_detail
							   SET  name='".$data['name']."', address='".$data['address']."', current_address='".$data['current_address']."', 
							       no_telp='".$data['no_telp']."', no_hp='".$data['no_hp']."', email='".$data['email']."'
							 WHERE  id_user='".$data['id_user']."' ");

			}



			if($data['role'] == '3' || $data['role'] == '4'){

				   $supp_data = json_encode($data['supp_id']);
				   $landing_data = json_encode($data['landing_id']);

							$sql = "
								UPDATE tb_user_access
									   SET  supplier_data= '".$supp_data."' ,
									   landing_data= '".$landing_data."' 
									 WHERE id_user='".$data['id_user']."';";
					    	$this->db->query($sql);

			}

		


	}

	}


	function user_detail($id_user){

		return $this->db->query("
			SELECT u.id_user, u.name , username, password, active , role, address , current_address, photo , no_telp, no_hp, nationality, email , supplier_data, landing_data
			FROM tb_user u inner join tb_user_detail ud on u.id_user = ud.id_user left join tb_user_access ua on u.id_user = ua.id_user
			where active ='1' and u.id_user = '".$id_user."'");


	}


	function user_delete($id_user){

		 return $this->db->query("DELETE from tb_user where id_user ='$id_user' ");

	}
    


}