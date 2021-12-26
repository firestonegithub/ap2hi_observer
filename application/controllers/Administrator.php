<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administrator extends CI_Controller {
 
	function index(){

		if (isset($_POST['submit'])){
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$cek = $this->Users_model->auth_user($username,$password);
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){

				//GetRoles
				 $results = $this->Users_model->getRoleByIdUser($row['id_user']);
        			foreach($results as $result){

            			$roles[$result->role_name] = $this->getRolePerms($result->role_id);
        			
        			}

				$this->session->set_userdata('upload_image_file_manager',true);
				$this->session->set_userdata(array('username'=>$row['username'],
								   'level'=>$row['role'] , 'role_name'=>$row['role_name'] , 'id_user'=>$row['id_user'] , 'photos' => $row['photo'] , 'supplier_data' => $row['supplier_data'] , 'landing_data' => $row['landing_data'], 'role_data' => $roles));

				$this->Users_model->checkin_user($row['id_user']);
				
				redirect('administrator/home');
			}else{
				
				$data['message'] = 'Login anda gagal, silahkan periksa username atau password anda!';
				$data['title'] = 'Administrator &rsaquo; Log In';
				$this->load->view('administrator/view_login',$data);
			}
		}else{


			if ($this->session->level != ''){
				redirect('administrator/home');
			}else{
				
				$data['title'] = 'Administrator &rsaquo; Log In';
				$this->load->view('administrator/view_login',$data);
			}

		}

	}


	public function getRolePerms($role_id){


        $results = $this->Users_model->getRolePerms($role_id);

        foreach($results as $result){

            $role[$result->perm_desc] = true;

        }

        return $role;

    }


	function home(){

		cek_session_admin();

		//get_supplier_data
		$supplier_data = $this->session->userdata('supplier_data'); 

		$data['user_data'] = $this->session->get_userdata();

		$data['total_trips'] = $this->Model_master->get_count("observerform_trip", "id_trip" ,  array("status_trip" => "1") )->row_array(); ; 

		$data['total_vessel'] = $this->Model_master->get_count("master_vessel", "id_vessel" ,  array("status" => "active") )->row_array(); ; 

		$data['total_supp'] =  $this->Model_master->get_count("master_supplier", "id_supplier" ,  array("status" => "1") )->row_array(); 

		$data['total_user'] = $this->Model_master->get_count("tb_user", "id_user" ,  array("active" => "1") )->row_array(); 

		$data['list_users'] = $this->Model_user->lists() ;  

		$data['getPerbandinganVessel'] = $this->Model_dashboard->getPerbandinganVessel();

		$data['is_map'] = 1; 

		$data['url_get_ping'] = base_url()."administrator/ping";


		$data['listsSupplier'] = $this->Model_statistic->listsSupplier(); 

        $data['listsProvince'] = $this->Model_statistic->listsProvince(); 

        $data['listsAktivitas'] = $this->Model_statistic->listsAktivitas(); 

        

		$this->template->load('administrator/template','administrator/view_home' , $data);


	}



	function ping(){

		$response = array();

		$kode_perusahaan = isset( $_POST['kode_perusahaan'] ) ? $_POST['kode_perusahaan']  : '' ; 
        
		$kode_provinsi  = isset($_POST['kode_provinsi']) ? $_POST['kode_provinsi'] : ""; 
        
		$date = isset($_POST['date']) ? $_POST['date'] : "" ;

		$kode_aktivitas = isset($_POST['kode_aktivitas']) ? $_POST['kode_aktivitas'] : "" ;

		$alat_tangkap = isset($_POST['alat_tangkap']) ? $_POST['alat_tangkap'] : "" ;

		$isDate = isset($_POST['isDate']) ? $_POST['isDate'] : "" ;
		

		$resultHL = $this->Model_statistic->pingCatatanSql('PL' , $kode_perusahaan,$kode_provinsi , $date, $isDate , $kode_aktivitas , $alat_tangkap);
        
        $resultPL =  $this->Model_statistic->pingCatatanSql('HL' , $kode_perusahaan,$kode_provinsi , $date, $isDate, $kode_aktivitas , $alat_tangkap);
 
        $result_merger = array_merge($resultHL->result() , $resultPL->result() ) ; 

		if(count($result_merger) > 0){

			//var_dump($result_merger);

			foreach($result_merger as $row ) {

			
				
				$lintang = explode(',', $row->lintang) ; 
			

				$bujur = explode(',',$row->bujur); 

				if($lintang[2] == 'S'){

					$lat = "-".$lintang[0].".".$lintang[1];

					$long = "-".$bujur[0].".".$bujur[1];

				}

				if($lintang[2] == 'U'){

					$lat = $lintang[0].".".$lintang[1];

					$long = $bujur[0].".".$bujur[1];

				}


			
				$response[] = array(
					'lat' => $lat, 
					'long' => $long ,
					'content' => $row->label." ".$row->tanggal." ".$row->lintang." ".$row->bujur." ".$isDate." ".$row->kode_aktivitas, 
					'kode_aktivitas' => $row->kode_aktivitas
				);


			}


		}



		/*
		$response[] = array(
			'lat' => 4.21475, 
			'long' => 98.57852 ,
			'content' => 'Tanggal '
		);


		$response[] = array(
			'lat' => -4.46361 , 
			'long' => 116.87308  ,
			'content' => 'Tanggal '
		);


		$response[] = array(
			'lat' => -9.44070 , 
			'long' => 136.43663 ,
			'content' => 'Tanggal '
		);
		*/

		echo json_encode($response,JSON_NUMERIC_CHECK); 

	}


	function tes_peta(){


		cek_session_admin();

		//get_supplier_data
		$supplier_data = $this->session->userdata('supplier_data'); 

		$data['user_data'] = $this->session->get_userdata();

		$data['total_trips'] = $this->Model_master->get_count("observerform_trip", "id_trip" ,  array("status_trip" => "1") )->row_array(); ; 

		$data['total_vessel'] = $this->Model_master->get_count("master_vessel", "id_vessel" ,  array("status" => "active") )->row_array(); ; 

		$data['total_supp'] =  $this->Model_master->get_count("master_supplier", "id_supplier" ,  array("status" => "1") )->row_array(); 

		$data['total_user'] = $this->Model_master->get_count("tb_user", "id_user" ,  array("active" => "1") )->row_array(); 

		$data['list_users'] = $this->Model_user->lists() ;  

		$data['getPerbandinganVessel'] = $this->Model_dashboard->getPerbandinganVessel();

		//$this->template->load('administrator/template_map','administrator/peta' , $data);

		$this->load->view( 'administrator/peta' , $data);

	}



	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}


	function user_detail(){



	}

}	