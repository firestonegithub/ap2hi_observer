<?php
class Users_model extends CI_Model{
	

	function auth_user($username,$password){

		$query=$this->db->query("

			SELECT u.id_user, u.name , username, password, active , role, role_name , address , current_address, photo , no_telp, no_hp, nationality, email , supplier_data, landing_data
			FROM tb_user u inner join tb_user_detail ud on u.id_user = ud.id_user inner join 
			tb_roles r on u.role = r.role_id::varchar
			left join tb_user_access ua on u.id_user = ua.id_user
			where active ='1' AND username='$username' AND password='$password' Limit 1");
		
		return $query;
	}


	function checkin_user($id){

		$check=$this->db->query("SELECT first_login FROM tb_user where id_user = '".$id."' ")->row_array();

		$login_date = date('Y-m-d h:i:s');

		if($check['first_login'] != '' ){



						$query=$this->db->query("

						UPDATE tb_user
							   SET 
							       last_login_date='".$login_date."'
							 WHERE id_user = '".$id."';


						");

		}else{


						$last_login_date = date('Y-m-d h:i:s');

						$query=$this->db->query("

						UPDATE tb_user
							   SET 
							       first_login='".$login_date."'
							 WHERE id_user = '".$id."';


			");


		}


		
		
		return $query;

	}


	function getRoleByIdUser($id_user){

        $sql = "SELECT u.role as role_id , r.role_name FROM tb_user as u

                JOIN tb_roles as r ON u.role = r.role_id::varchar

                WHERE u.id_user ='".$id_user."'";

        $run_query = $this->db->query($sql);

        return $run_query->result();

    }


    public function getRolePerms($role_id){

        $sql = "SELECT t2.perm_desc FROM tb_role_perm as t1

                JOIN tb_permissions as t2 ON t1.perm_id = t2.perm_id

                WHERE t1.role_id =  '".$role_id."'";

        $run_query = $this->db->query($sql);

        return $run_query->result();

    }



}

