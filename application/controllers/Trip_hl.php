<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Trip_hl extends CI_Controller {	

	

	public function add_trip(){


		cek_session_admin();

		cek_priviledge_return("AddTripData"); 

		$data['load_vessel_from_id_supplier']=base_url()."master/load_vessel_from_id_supplier";

		$data['select_vessel_from_id_supplier']=base_url()."master/select_vessel_from_id_supplier";

		$data['record_suppliers'] = $this->Model_master->master_supplier_lists();

		$data['record_landings'] = $this->Model_master->master_landing_lists();

		if (isset($_POST['submit'])){

			$this->form_validation->set_rules('id_supplier', 'Supplier Code', 'required');

			$this->form_validation->set_rules('id_vessel', 'Vessel Code', 'required');

			//$this->form_validation->set_rules('nama_kapal', 'Nama Kapal', 'required');

			$this->form_validation->set_rules('tanggal_keberangkatan', 'Tanggal Keberangkatan', 'required');

			$this->form_validation->set_rules('tanggal_kedatangan', 'Tanggal Kedatangan', 'required');

			$check = 1; 


			if($_POST['id_supplier'] != "" && $_POST['tanggal_keberangkatan'] != "" && $_POST['tanggal_kedatangan'] && $_POST['id_vessel'] != ""){


				$code = $this->Model_trip->createCodeTrip($this->input->post());

				$check = $this->Model_trip->checkExsistingTrip($code); 


			}


			if ( $this->form_validation->run() == TRUE && $check == 0  ) {

			 	//dapatkan kode trip 


			 	$data = $this->input->post();



			 	if( $_FILES['upload_foto_img']['name'] != "" ){

			  			$upload_foto_img = $this->upload_foto('upload_foto_img');
			  			$data['upload_foto_img'] =  $upload_foto_img['file_name']  ; 


				  }



	          	$kode_trip = $this->Model_trip_hl->add_trip_utama($data);

	          	$this->sent_email($kode_trip);

				redirect('trip_hl/trip_detail/'.$kode_trip);


	          }else{

	          	$data['post'] = $_POST; 

	          	$data['vesselData'] =  $this->Model_master->master_vessel_update($_POST['id_vessel'])->row_array();  

	          	$this->template->load('administrator/template','administrator/trip-hl/add_trip_utama' , $data );

	          }


		}else{


			$data['post'] = array();

			$this->template->load('administrator/template','administrator/trip-hl/add_trip_utama' , $data );

		}


		

	}



	function sent_email($kode_trip){

        //sent email-----------------------------------------------------------------
        $config = Array(
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email',$config);

        $this->email->from('eclair.user@gmail.com', "AP2HI Observer");
        $this->email->to('winatamika@gmail.com');
        $this->email->subject('Testing Mail');

        echo $email_body = '
        <html>
            <body>
                <p>Dear AP2HI Administrator, Terdapat informasi trip baru yang telah diinput :</p>
                <p>Silahkan check pada link <a href="'.base_url().'trip_detail/'.$kode_trip.'">ini</a></p>
                <br>
                <br>
                <div><i>Have a nice day...</i></div>
            </body>
        </html>';

        $this->email->message($email_body);

        $this->email->send();
    }



	public function trip_update($kode_trip){


		$data['kode_trip'] = $kode_trip ; 

		$data['load_vessel_from_id_supplier']=base_url()."master/load_vessel_from_id_supplier";

		$data['select_vessel_from_id_supplier']=base_url()."master/select_vessel_from_id_supplier";

		$data['record_suppliers'] = $this->Model_master->master_supplier_lists();

		$data['record_landings'] = $this->Model_master->master_landing_lists();
		
		$data['tripDetail'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();; 

		$data['nama_kapal'] = $this->getNamaKapalFromId($data['tripDetail']['id_vessel']) ; 


		if (isset($_POST['submit'])){

			$this->form_validation->set_rules('id_supplier', 'Supplier Code', 'required');

			$this->form_validation->set_rules('id_vessel', 'Vessel Code', 'required');

			$this->form_validation->set_rules('nama_kapal', 'Nama Kapal', 'required');

			$this->form_validation->set_rules('tanggal_keberangkatan', 'Tanggal Keberangkatan', 'required');

			$this->form_validation->set_rules('tanggal_kedatangan', 'Tanggal Kedatangan', 'required');


			if ( $this->form_validation->run() == TRUE  ) {

				$data = $this->input->post();

			 	if( $_FILES['upload_foto_img']['name'] != "" ){

			  			$upload_foto_img = $this->upload_foto('upload_foto_img');
			  			$data['upload_foto_img'] =  $upload_foto_img['file_name']  ; 


				  }



	          	$this->Model_trip_hl->update_trip_utama($data);

				redirect('trip_hl/trip_detail/'.$kode_trip);


	          }else{

	    
	          	$this->template->load('administrator/template','administrator/trip-hl/update_trip_utama', $data);

	          }


		}else{

			

			$this->template->load('administrator/template','administrator/trip-hl/update_trip_utama', $data);


		}



	}

	function upload_foto( $filename ){
    	
        $config['upload_path']          = './assets/upload/';

        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $config['encrypt_name']			= TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload(''.$filename.'');

        return $this->upload->data();
    }



		public function link_forms($kode_trip){

		$data['link_form1'] = ' <a href="'.base_url().'trip_hl/trip_update/'.$kode_trip.'"><div class="stat-text">  Form 1 </div> </a>'; 


		$checkForm2 = $this->Model_trip_hl->checkExsisting("hl_observerform_catatan_harian", array('id_trip' => $kode_trip) , 'id_trip'); 
		if($checkForm2 > 0 ){
			$data['link_form2'] = ' <a href="'.base_url().'trip_hl/form2/'.$kode_trip.'"><div class="stat-text">  Form 2 </div> </a>' ; 
		}else{
			$data['link_form2'] = ' <a href="'.base_url().'trip_hl/form2_add/'.$kode_trip.'"><div class="stat-text">  Form 2 </div> </a>' ;
		}

		$checkForm3 = $this->Model_trip->checkExsisting("hl_observerform_tangkapan", array('id_trip' => $kode_trip) , 'id_trip'); 
		if($checkForm3 > 0 ){
			$data['link_form3'] = ' <a href="'.base_url().'trip_hl/form3/'.$kode_trip.'"><div class="stat-text">  Form 3 </div> </a>' ; 
		}else{
			$data['link_form3'] = ' <a href="'.base_url().'trip_hl/form3_add/'.$kode_trip.'"><div class="stat-text">  Form 3 </div> </a>' ;
		}


		$checkForm4 = $this->Model_trip->checkExsisting("hl_observerform_umpan", array('id_trip' => $kode_trip) , 'id_trip'); 
		if($checkForm4 > 0 ){
			$data['link_form4'] = ' <a href="'.base_url().'trip_hl/form4/'.$kode_trip.'"><div class="stat-text">  Form 4 </div> </a>' ; 
		}else{
			$data['link_form4'] = ' <a href="'.base_url().'trip_hl/form4_add/'.$kode_trip.'"><div class="stat-text">  Form 4 </div> </a>' ;
		}


		$checkForm5 = $this->Model_trip->checkExsisting("hl_observerform_umpan_terpakai", array('id_trip' => $kode_trip) , 'id_trip'); 
		if($checkForm5 > 0 ){
			$data['link_form5'] = ' <a href="'.base_url().'trip_hl/form5/'.$kode_trip.'"><div class="stat-text">  Form 5 </div> </a>' ; 
		}else{
			$data['link_form5'] = ' <a href="'.base_url().'trip_hl/form5_add/'.$kode_trip.'"><div class="stat-text">  Form 5 </div> </a>' ;
		}


		$checkForm6 = $this->Model_trip->checkExsisting("hl_observerform_etp", array('id_trip' => $kode_trip) , 'id_trip'); 
		if($checkForm6 > 0 ){
			$data['link_form6'] = ' <a href="'.base_url().'trip_hl/form6/'.$kode_trip.'"><div class="stat-text">  Form 6 </div> </a>' ; 
		}else{
			$data['link_form6'] = ' <a href="'.base_url().'trip_hl/form6_add/'.$kode_trip.'"><div class="stat-text">  Form 6 </div> </a>' ;
		}


		$data['link_form7'] = ' <a href="'.base_url().'trip_hl/form7_update/'.$kode_trip.'"><div class="stat-text">  Form 7 </div> </a>' ;


		$checkForm8 = $this->Model_trip->checkExsisting("hl_observerform_pemindahan", array('id_trip' => $kode_trip) , 'id_trip'); 
		if($checkForm8 > 0 ){
			$data['link_form8'] = ' <a href="'.base_url().'trip_hl/form8/'.$kode_trip.'"><div class="stat-text">  Form 8 </div> </a>' ; 
		}else{
			$data['link_form8'] = ' <a href="'.base_url().'trip_hl/form8_add/'.$kode_trip.'"><div class="stat-text">  Form 8 </div> </a>' ;
		}



		$data['link_form9'] = ' <a href="'.base_url().'trip_hl/form9_update/'.$kode_trip.'"><div class="stat-text">  Form 9 </div> </a>' ;


		return $data ; 

	}	


	public function trip_detail($kode_trip){

		$data = $this->link_forms($kode_trip);


		$data['kode_trip'] = $kode_trip ; 

		$data['controller']=$this; 

		$data['tripDetail'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", ""); 

		$data['is_allowed'] = cek_priviledge_disable("ApproveTripDataDraft"); 
		
		$this->template->load('administrator/template','administrator/trip-hl/menu_trip', $data);


	}

	public function getNamaKapalFromId($id){

		$data = $this->Model_master->general_select("master_vessel", array('id_vessel' => $id), "nama_kapal", "")->row_array();; 

	
		return $data['nama_kapal']; 

	}

	public function getNamaPerusahaanFromId($id){

		$data = $this->Model_master->general_select("master_supplier", array('id_supplier' => $id), "nama_perusahaan", "")->row_array();; 

	
		return $data['nama_perusahaan']; 

	}


	public function list_trip_hl(){

		cek_session_admin();


		$role = $this->session->userdata('level'); 

		$data['role'] = $role;

		$data['id_user'] = $this->session->userdata('id_user'); 

		if($role != '3' | $role != '4'){

			$supplier_data = json_decode($this->session->userdata('supplier_data')); 

			$landing_data = json_decode($this->session->userdata('landing_data')); 

			$data['record'] = $this->Model_master->general_select_in("observerform_trip", array('status_trip' => '1', 'tipe_data' => 'HL'), array('id_supplier' => $supplier_data , 'pelabuhan_keberangkatan' => $landing_data) ,  "", "");

		}else{


			$data['record'] = $this->Model_master->general_select("observerform_trip", array('status_trip' => '1', 'tipe_data' => 'HL'), "", "");
		}

		

		$data['controller']=$this; 

		$this->template->load('administrator/template','administrator/trip-hl/list_trip',$data);


	}


	public function detail_pancing($kode_trip){

		$kode_trip;

		$data['kode_trip'] = $kode_trip ; 

		$data['detail'] = $this->Model_master->general_select("hl_observerform_detail_pancing", array('id_trip' => $kode_trip), "", "")->row_array();; 

		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			if( $this->form_validation->run() == TRUE  ) {

				$data = $this->input->post();

				if( $_FILES['gambar_mata_pancing']['name'] != "" ){

			  			$gambar_mata_pancing = $this->upload_foto('gambar_mata_pancing');
			  			$data['gambar_mata_pancing'] =  $gambar_mata_pancing['file_name']  ; 


				  }else{

				  	$data['gambar_mata_pancing'] = 0;
				  
				  }


	          	$this->Model_trip_hl->update_detail_pancing($data);

				redirect('trip_hl/trip_detail/'.$kode_trip);


	          }else{

	    
	          	$this->template->load('administrator/template','administrator/trip-hl/update_trip_utama', $data);

	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip-hl/update_detail_pancing', $data);
	

		}
		

	}



	public function alat_bantu($kode_trip){


		$kode_trip;

		$data['kode_trip'] = $kode_trip ; 

		$data['detail'] = $this->Model_master->general_select("hl_observerform_alat_bantu", array('id_trip' => $kode_trip), "", "")->row_array();; 

		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip_hl->update_alat_bantu($this->input->post());

				redirect('trip_hl/trip_detail/'.$kode_trip);


	          }else{

	    
	          	$this->template->load('administrator/template','administrator/trip-hl/update_trip_utama', $data);

	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip-hl/update_alat_bantu', $data);
	

		}


	}	


	public function palka_tuna($kode_trip){

		$kode_trip;

		$data['kode_trip'] = $kode_trip ; 

		$data['detail'] = $this->Model_master->general_select("hl_observerform_detail_palka", array('id_trip' => $kode_trip), "", "")->result();

		
		$data['numbering'][1] = "";

		$data['numbering'][2] = "";

		$data['numbering'][3] = "";

		$data['numbering'][4] = "";

		$data['numbering'][5] = "";

		$data['numbering'][6] = "";

		
		foreach ($data['detail']  as $res) {

			$data['numbering'][$res->palka_no] =  $res->palka_detail ; 

		 } 

		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip_hl->update_detail_palka($this->input->post());

				redirect('trip/trip_detail/'.$kode_trip);


	          }else{

	    
	          	$this->template->load('administrator/template','administrator/trip-hl/update_trip_utama', $data);

	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip-hl/update_detail_palka', $data);
	

		}

	}


	public function alat_keselamatan($kode_trip){

		$kode_trip;

		$data['kode_trip'] = $kode_trip ; 

		$data['detail'] = $this->Model_master->general_select("hl_observerform_alat_keselamatan", array('id_trip' => $kode_trip), "", "")->row_array();; 

		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip_hl->update_alat_keselamatan($this->input->post());

				redirect('trip_hl/trip_detail/'.$kode_trip);


	          }else{

	    
	          	$this->template->load('administrator/template','administrator/trip-hl/update_trip_utama', $data);

	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip-hl/update_alat_keselamatan', $data);
	

		}

	}


	public function informasi_lain($kode_trip){

		$kode_trip;

		$data['kode_trip'] = $kode_trip ; 

		$data['detail'] = $this->Model_master->general_select("hl_observerform_informasi_lain", array('id_trip' => $kode_trip), "", "")->row_array();; 

		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip_hl->update_informasi_lain($this->input->post());

				redirect('trip_hl/trip_detail/'.$kode_trip);


	          }else{

	    
	          	$this->template->load('administrator/template','administrator/trip-hl/update_trip_utama', $data);

	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip-hl/update_informasi_lain', $data);
	

		}

	}


	/* FORM 2 */

	public function form2($kode_trip){

		$data = $this->link_forms($kode_trip);

		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Daily Notes' ; 

		$data['page_name_detail'] = 'Form 2 HL Daily Notes' ; 

		$data['record'] = $this->Model_master->general_select("hl_observerform_catatan_harian", array('id_trip' => $kode_trip), "", "");

		$this->template->load('administrator/template','administrator/trip-hl/form2/list', $data);

	}


	public function form2_add($kode_trip){

		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Daily Notes' ; 

		$data['page_name_detail'] = 'Add Form 2 Daily Notes' ; 

		$data['kode']  = $this->Model_master->general_select_kode_aktivitas("master_dictionary", array('jenis_aktivitas' => 'kode_aktivitas'), "", "kode_aktivitas");

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();



		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip_hl->form2_add($this->input->post());

				redirect('trip_hl/form2/'.$kode_trip);


	          }else{

	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip-hl/form2/add', $data);


	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip-hl/form2/add', $data);

	

		}

	}


	public function form2_update($kode_trip , $id){

		$data['kode_trip'] = $kode_trip; 

		$data['seq'] = $id ; 

		$data['page_name'] = 'Daily Notes' ; 

		$data['page_name_detail'] = 'Update Form 2 Daily Notes' ; 

		$data['kode']  = $this->Model_master->general_select_kode_aktivitas("master_dictionary", array('jenis_aktivitas' => 'kode_aktivitas'), "", "kode_aktivitas");

		$data['post'] = $this->Model_master->general_select("hl_observerform_catatan_harian", array('id_trip' => $kode_trip , 'seq' => $id) , "", "")->row_array();; 

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();


		
		$lintang = explode("," , $data['post']['lintang']);

            $data['post']['lintang_degree'] = $lintang[0];

            $data['post']['lintang_minutes'] = $lintang[1];

            $data['post']['lintang_us'] = $lintang[2];


		$bujur = explode("," , $data['post']['bujur']);

            $data['post']['bujur_degree'] = $bujur[0];

            $data['post']['bujur_minutes'] = $bujur[1];

            $data['post']['bujur_us'] = $bujur[2];

         $waktu = explode(":" , $data['post']['waktu']);

         	$data['post']['jam'] = $waktu[0];

         	$data['post']['menit'] = $waktu[1];


		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip_hl->form2_update($this->input->post());

				redirect('trip_hl/form2/'.$kode_trip);


	          }else{

	    
	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip-hl/form2/update', $data);


	          }


		}else{

		
				$this->template->load('administrator/template','administrator/trip-hl/form2/update', $data);
	

		}


	}


	public function form2_delete($kode_trip , $id){


		$this->Model_trip_hl->form2_delete($kode_trip , $id);

		redirect('trip_hl/form2/'.$kode_trip);

	}




	/* End form 2*/


	/* form 3*/

	public function form3($kode_trip){

		$data = $this->link_forms($kode_trip);

		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Hasil Tangkapan' ; 

		$data['page_name_detail'] = 'Form 3 Data Hasil Tangkapan' ; 

		$data['record'] = $this->Model_master->general_select("hl_observerform_tangkapan", array('id_trip' => $kode_trip), "", "");

		$this->template->load('administrator/template','administrator/trip-hl/form3/list', $data);

	}

	public function is_digits($val) {

	 return is_numeric( $val ) && floor( $val ) != $val;
	
	}


	public function form3_add($kode_trip){


		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Hasil Tangkapan' ; 

		$data['page_name_detail'] = 'Add Form 3 Data Hasil Tangkapan' ; 

		
		$data['kode_ikan_terlihat']  = $this->Model_master->general_select_kode_aktivitas("master_dictionary", array('jenis_aktivitas' => 'kode_ikan_terlihat'), "", "kode_aktivitas");
		
		$data['kode_terasosiasi']  = $this->Model_master->general_select_kode_aktivitas("master_dictionary", array('jenis_aktivitas' => 'kode_terasosiasi'), "", "kode_aktivitas");

		$data['trip'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip ) , "", "")->row_array();

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();



		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			$this->form_validation->set_rules('tanggal', 'hari required', 'required');

			$this->form_validation->set_rules('set_nomor', 'set_nomor required', 'required');


		
			if( $this->form_validation->run() == TRUE  ) {

	          	$getSeq = $this->Model_trip_hl->form3_add($this->input->post());

				redirect('trip_hl/form3_update/'.$kode_trip.'/'.$getSeq);


	          }else{

	          	$data['post'] = $_POST;

	          	$this->template->load('administrator/template','administrator/trip-hl/form3/add', $data);


	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip-hl/form3/add', $data);

	

		}

	}



	public function form3_update($kode_trip , $id){

		$data['kode_trip'] = $kode_trip; 

		$data['seq'] = $id ; 

		$data['page_name'] = 'Data Hasil Tangkapan' ; 

		$data['page_name_detail'] = 'Update Data Hasil Tangkapan' ; 

		$data['post'] = $this->Model_master->general_select("hl_observerform_tangkapan", array('id_trip' => $kode_trip , 'seq' => $id) , "", "")->row_array();

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();


		$lintang = explode("," , $data['post']['lintang']);

			$data['post']['lintang_degree'] = '';

	        $data['post']['lintang_minutes'] = '';

	        $data['post']['lintang_us'] = '';

		if (!empty($lintang)) {

			if (!empty($lintang[1]) && !(empty($lintang[2])) &&(!empty($lintang[0])) ) {

	            $data['post']['lintang_degree'] = $lintang[0];

	            $data['post']['lintang_minutes'] = $lintang[1];

	            $data['post']['lintang_us'] = $lintang[2];

        	}
        }

        
		$bujur = explode("," , $data['post']['bujur']);

			$data['post']['bujur_degree'] = '';

            $data['post']['bujur_minutes'] = '';

            $data['post']['bujur_us'] = '';

		if (!empty($bujur)) {

			if (!empty($bujur[1]) && !(empty($bujur[2])) &&(!empty($bujur[0])) ) {

            $data['post']['bujur_degree'] = $bujur[0];

            $data['post']['bujur_minutes'] = $bujur[1];

            $data['post']['bujur_us'] = $bujur[2];

        	}
        }


        $fad2 = $data['post']['jenis_fad2']; 
        	$data['post']['jenis_fad2'] = explode("," , $fad2); 


        $data['post']['waktu_mulai'] = $data['post']['jam_mulai'].":".$data['post']['menit_mulai'] ; 

        $data['post']['waktu_selesai'] = $data['post']['jam_selesai'].":".$data['post']['menit_selesai'] ; 



		$data['kode_ikan_terlihat']  = $this->Model_master->general_select_kode_aktivitas("master_dictionary", array('jenis_aktivitas' => 'kode_ikan_terlihat'), "", "kode_aktivitas");
		
		$data['kode_terasosiasi']  = $this->Model_master->general_select_kode_aktivitas("master_dictionary", array('jenis_aktivitas' => 'kode_terasosiasi'), "", "kode_aktivitas");

		$data['kode_ikan']  = $this->Model_master->general_select("master_species", array('jenis_species' => 'Ikan'), "", "fao");


		$data['table1'] = 'TOTAL HASIL SAMPLING TANGKAPAN'; 

		$data['table3'] = 'TOTAL HASIL SAMPLING PAKURA';

		$data['table2'] = 'DETAIL TANGKAPAN'; 



		$data['button_add']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable1" id="AddDataTable1Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

		$data['url_load_table']=base_url()."trip_hl/view_observerform_tangkapan_hasil/".$kode_trip."/".$id;

		$data['url_show_table']=base_url()."trip_hl/view_update_observerform_tangkapan_hasil/";

		$data['url_add_table1']=base_url()."trip_hl/add_observerform_tangkapan_hasil";

		$data['url_update_table1']=base_url()."trip_hl/update_observerform_tangkapan_hasil";

		$data['url_delete_table1']=base_url()."trip_hl/delete_observerform_tangkapan_hasil";




		$data['button_add_3']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable3" id="AddDataTable3Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

		$data['url_load_table3']=base_url()."trip_hl/view_observerform_tangkapan_hasil_pakura/".$kode_trip."/".$id;

		$data['url_show_table3']=base_url()."trip_hl/view_update_observerform_tangkapan_hasil_pakura/";

		$data['url_add_table3']=base_url()."trip_hl/add_observerform_tangkapan_hasil_pakura";

		$data['url_update_table3']=base_url()."trip_hl/update_observerform_tangkapan_hasil_pakura";

		$data['url_delete_table3']=base_url()."trip_hl/delete_observerform_tangkapan_hasil_pakura";






		$data['button_add_2']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable2" id="AddDataTable2Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

		$data['url_load_table2']=base_url()."trip_hl/view_observerform_tangkapan_detail/".$kode_trip."/".$id;

		$data['url_show_table2']=base_url()."trip_hl/view_update_observerform_tangkapan_detail/";

		$data['url_add_table2']=base_url()."trip_hl/add_observerform_tangkapan_detail";

		$data['url_update_table2']=base_url()."trip_hl/update_observerform_tangkapan_detail";

		$data['url_delete_table2']=base_url()."trip_hl/delete_observerform_tangkapan_detail";


		if ( isset($_POST['submit']) ){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			$this->form_validation->set_rules('tanggal', 'hari required', 'required');

			$this->form_validation->set_rules('set_nomor', 'set_nomor required', 'required');

			

			if( $this->form_validation->run() == TRUE) {

	          	$this->Model_trip_hl->form3_update($this->input->post());

				redirect('trip_hl/form3/'.$kode_trip);


	          }else{

	    
	          	$data['post'] = $_POST;

	          	$this->template->load('administrator/template','administrator/trip-hl/form3/update', $data);


	          }


		}else{

		
				$this->template->load('administrator/template','administrator/trip-hl/form3/update', $data);
	

		}


	}


	public function form3_delete($kode_trip , $id){


		$this->Model_trip_hl->form3_delete($kode_trip , $id);

		redirect('trip/form3/'.$kode_trip);


	}

	public function add_observerform_tangkapan_hasil(){


		   //form validation 
        $this->form_validation->set_rules('id_trip', 'id_trip', 'required');
        $this->form_validation->set_rules('seq', 'seq', 'required');
        $this->form_validation->set_rules('kode_species', 'kode_species', 'required');

        if ( $this->form_validation->run()  ) {

        	$post = $this->input->post() ; 

        	$kode_trip = $post['id_trip'] ; 

        	$seq = $post['seq'] ; 

        	$data['trip_info'] = $this->Model_master->general_select("hl_observerform_tangkapan", array('id_trip' => $kode_trip , 'seq' => $seq), "", "")->row_array();

 

					$check_species = $this->Model_trip_hl->check_species_exsist("hl_observerform_tangkapan_hasil", "add" ,  $this->input->post());
            
					            if($check_species){
					            //Insert to Database 
							             $saved = $this->Model_trip_hl->add_observerform_tangkapan_hasil($this->input->post());

							            if ($saved)
							            {
							                 $success = true;
							                 $messages =  "Successfully adding Data! ";
							            }
							            else
							            {
							                 $success = false;
							                 $messages =  "Insert not working ! ";
							            }

					        	}else{

					        		$success = false;
							        $messages =  "Species sudah pernah dimasukkan! ";

					        	}
        	



        	

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Pastikan data species terisi';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);



	}



	public function view_observerform_tangkapan_hasil($kode_trip , $id){


		$query = $this->Model_master->general_select("hl_observerform_tangkapan_hasil", array('id_trip' => $kode_trip , 'seq_tangkapan' => $id) , "", ""); 

        $result = array();

        $no = 0;
        
        foreach($query->result() as $row){


                  $action1 = '<a type="button" data-toggle="modal" data-target="#editTable1Modal" onclick="editData(\'' .$row->id_trip.'\' , '.$row->seq_tangkapan.', '.$row->nomor.')" class="btn btn-primary a-btn-slide-text">
                                    <span class="fa fa-plug" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>            
                                </a>
                                ' ; 
                 $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable1Modal" onclick="disableData(\'' .$row->id_trip.'\'  , '.$row->seq_tangkapan.', '.$row->nomor.')" class="btn btn-danger a-btn-slide-text">
                                   <span class="fa fa-times" aria-hidden="true"></span>
                                    <span><strong>Delete</strong></span>            
                                </a>' ;



                $pakura1_jum = $row->pakura1_jum ; 
                if($row->pakura1_jum == 0 || $row->pakura1_jum == "0"){
           			$pakura1_jum = "" ; 
           		}
	            $pakura1_ber = $row->pakura1_ber ;
                if($row->pakura1_ber == 0 ){
           			$pakura1_ber = "" ; 
           		}

           		$pakura2_jum = $row->pakura1_jum ; 
                if($row->pakura2_jum == 0 || $row->pakura2_jum == "0"){
           			$pakura2_jum = "" ; 
           		}
	            $pakura2_ber = $row->pakura2_ber ;
                if($row->pakura2_ber == 0 ){
           			$pakura2_ber = "" ; 
           		}

           		$pakura3_jum = $row->pakura3_jum ; 
                if($row->pakura3_jum == 0 || $row->pakura3_jum == "0"){
           			$pakura3_jum = "" ; 
           		}
	            $pakura3_ber = $row->pakura3_ber ;
                if($row->pakura3_ber == 0 ){
           			$pakura3_ber = "" ; 
           		}
               
               	$pakura4_jum = $row->pakura4_jum ; 
                if($row->pakura4_jum == 0 || $row->pakura4_jum == "0"){
           			$pakura4_jum = "" ; 
           		}
	            $pakura4_ber = $row->pakura4_ber ;
                if($row->pakura4_ber == 0 ){
           			$pakura4_ber = "" ; 
           		}

           		$pakura5_jum = $row->pakura5_jum ; 
                if($row->pakura5_jum == 0 || $row->pakura5_jum == "0"){
           			$pakura5_jum = "" ; 
           		}
	            $pakura5_ber = $row->pakura5_ber ;
                if($row->pakura5_ber == 0 ){
           			$pakura5_ber = "" ; 
           		}

           		$pakura6_jum = $row->pakura6_jum ; 
                if($row->pakura6_jum == 0 || $row->pakura6_jum == "0"){
           			$pakura6_jum = "" ; 
           		}
	            $pakura6_ber = $row->pakura6_ber ;
                if($row->pakura6_ber == 0 ){
           			$pakura6_ber = "" ; 
           		}

           		$kapal_jum = $row->kapal_jum ; 
                if($row->kapal_jum == 0 || $row->kapal_jum == "0"){
           			$kapal_jum = "" ; 
           		}
	            $kapal_ber = $row->kapal_ber ;
                if($row->kapal_ber == 0 ){
           			$kapal_ber = "" ; 
           		}



                $result['data'][]=array(

                        $row->nomor, 
                        $row->kode_species, 
                        $pakura1_jum , 
                        $pakura1_ber , 
                        $pakura2_jum , 
                        $pakura2_ber ,
                        $pakura3_jum , 
                        $pakura3_ber ,
                        $pakura4_jum , 
                        $pakura4_ber ,
                        $pakura5_jum , 
                        $pakura5_ber ,
                        $pakura6_jum , 
                        $pakura6_ber , 
                        $kapal_jum,
                        $kapal_ber,    
                        $action1, 
                        $action2
                
                
                ); 

        }


         echo json_encode($result);

	}


	public function view_update_observerform_tangkapan_hasil(){


		$response = array();

        $id_trip = $_POST['id_trip'];

        $seq = $_POST['seq'];

        $nomor = $_POST['nomor']; 


        $results = $this->Model_master->general_select("hl_observerform_tangkapan_hasil", array('id_trip' => $id_trip , 'seq_tangkapan' => $seq , 'nomor' => $nomor ) , "", ""); 


        $response = array(

                'success' => true, 

                'messages' => $results->result_array()
            ); 

        echo json_encode($response);

	}


	public function update_observerform_tangkapan_hasil(){


		$this->form_validation->set_rules('edit_id_trip', 'edit_id_trip ', 'required');
        $this->form_validation->set_rules('edit_seq', 'edit_seq ', 'required');
        $this->form_validation->set_rules('edit_nomor', 'edit_nomor ', 'required');
        $this->form_validation->set_rules('edit_kode_species', 'edit_kode_species ', 'required');


    

        
        if ( $this->form_validation->run()  ) {


        	$check_species = $this->Model_trip_hl->check_species_exsist("hl_observerform_tangkapan_hasil", "update" ,  $this->input->post());
            
            if($check_species){
            
		            //Insert to Database 
		             $saved = $this->Model_trip_hl->update_observerform_tangkapan_hasil($this->input->post());

		            if ($saved)
		            {
		                 $success = true;
		                 $messages =  "Successfully adding Data! ";
		            }
		            else
		            {
		                 $success = false;
		                 $messages =  "Update not working ! ";
		            }
        	}else{

        		 $success = false;
            	 $messages =  "Species sudah pernah dimasukkan! ";

        	}

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Pastikan data species terisi';

            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);


	}



	public function delete_observerform_tangkapan_hasil(){


        $saved = $this->Model_trip_hl->delete_observerform_tangkapan_hasil($_POST['id_trip'] , $_POST['seq'] , $_POST['nomor']);

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully disable Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "disable not working ! ";
            }
        
        $validator['success'] = $success;
        $validator['messages'] = $messages;

        echo json_encode($validator);


	}





	public function view_observerform_tangkapan_hasil_pakura($kode_trip , $id){


		$query = $this->Model_master->general_select("hl_observerform_tangkapan_hasil_pakura", array('id_trip' => $kode_trip , 'seq_tangkapan' => $id) , "", ""); 

        $result = array();

        $no = 0;
        
        foreach($query->result() as $row){


                  $action1 = '<a type="button" data-toggle="modal" data-target="#editTable3Modal" onclick="editData3(\'' .$row->id_trip.'\' , '.$row->seq_tangkapan.')" class="btn btn-primary a-btn-slide-text">
                                    <span class="fa fa-plug" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>            
                                </a>
                                ' ; 
                 $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable3Modal" onclick="disableData3(\'' .$row->id_trip.'\'  , '.$row->seq_tangkapan.')" class="btn btn-danger a-btn-slide-text">
                                   <span class="fa fa-times" aria-hidden="true"></span>
                                    <span><strong>Delete</strong></span>            
                                </a>' ;


                $result['data'][]=array(

                        $row->pakura1_mulai  , 
                        $row->pakura1_selesai  , 
                        $row->pakura1_mata_pancing  , 

                        $row->pakura2_mulai  , 
                        $row->pakura2_selesai  , 
                        $row->pakura2_mata_pancing  , 

                        $row->pakura3_mulai  , 
                        $row->pakura3_selesai  , 
                        $row->pakura3_mata_pancing  , 

                        $row->pakura4_mulai  , 
                        $row->pakura4_selesai  , 
                        $row->pakura4_mata_pancing  , 

                        $row->pakura5_mulai  , 
                        $row->pakura5_selesai  , 
                        $row->pakura5_mata_pancing  , 

                        $row->pakura6_mulai  , 
                        $row->pakura6_selesai  , 
                        $row->pakura6_mata_pancing  , 
                        
                        $action1, 
                        $action2
                
                
                ); 

        }


         echo json_encode($result);


	}

	public function add_observerform_tangkapan_hasil_pakura(){

		 $this->form_validation->set_rules('id_trip', 'id_trip', 'required');
        $this->form_validation->set_rules('seq', 'seq', 'required');

        if ( $this->form_validation->run()  ) {

        	$post = $this->input->post() ; 

        	$kode_trip = $post['id_trip'] ; 

        	$seq = $post['seq'] ; 

        	$data['trip_info'] = $this->Model_master->general_select("hl_observerform_tangkapan_hasil_pakura", array('id_trip' => $kode_trip , 'seq_tangkapan' => $seq), "", "")->row_array();

 

			
			if($data['trip_info'] == ''){
				//Insert to Database 
				$saved = $this->Model_trip_hl->add_observerform_tangkapan_hasil_pakura($this->input->post());

				 if ($saved)
					{
						$success = true;
						$messages =  "Successfully adding Data! ";
					}
				else
					{
						$success = false;
						$messages =  "Insert not working ! ";
					}

					    }else{

					        $success = false;
							$messages =  "Data sudah pernah dimasukkan! ";

					    }
        	



        	

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Pastikan data species terisi';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);




	}


	public function view_update_observerform_tangkapan_hasil_pakura(){


		$response = array();

        $id_trip = $_POST['id_trip'];

        $seq = $_POST['seq'];


        $results = $this->Model_master->general_select("hl_observerform_tangkapan_hasil_pakura", array('id_trip' => $id_trip , 'seq_tangkapan' => $seq ) , "", ""); 


        $response = array(

                'success' => true, 

                'messages' => $results->result_array()
            ); 

        echo json_encode($response);

	}


	public function update_observerform_tangkapan_hasil_pakura(){


		$this->form_validation->set_rules('edit_id_trip_pakura', 'edit_id_trip_pakura', 'required');
        $this->form_validation->set_rules('edit_seq_pakura', 'edit_seq_pakura', 'required');


    

        
        if ( $this->form_validation->run()  ) {


        	
            
		            //Insert to Database 
		     $saved = $this->Model_trip_hl->update_observerform_tangkapan_hasil_pakura($this->input->post());

		    $success = true;
            $messages =  "Successfully adding Data! ";

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Pastikan data terisi';

            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);


	}

	public function delete_observerform_tangkapan_hasil_pakura(){


        $saved = $this->Model_trip_hl->delete_observerform_tangkapan_hasil_pakura($_POST['id_trip'] , $_POST['seq']);

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully disable Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "disable not working ! ";
            }
        
        $validator['success'] = $success;
        $validator['messages'] = $messages;

        echo json_encode($validator);


	}




	public function view_observerform_tangkapan_detail($kode_trip , $id){


		$query = $this->Model_master->general_select("hl_observerform_tangkapan_detail", array('id_trip' => $kode_trip , 'seq_tangkapan' => $id) , "", ""); 

        $result = array();

        $no = 0;
        
        foreach($query->result() as $row){


                  $action1 = '<a type="button" data-toggle="modal" data-target="#editTable2Modal" onclick="editData2(\'' .$row->id_trip.'\' , '.$row->seq_tangkapan.', '.$row->nomor.')" class="btn btn-primary a-btn-slide-text">
                                    <span class="fa fa-plug" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>            
                                </a>
                                ' ; 
                 $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable2Modal" onclick="disableData2(\'' .$row->id_trip.'\'  , '.$row->seq_tangkapan.', '.$row->nomor.')" class="btn btn-danger a-btn-slide-text">
                                   <span class="fa fa-times" aria-hidden="true"></span>
                                    <span><strong>Delete</strong></span>            
                                </a>' ;
           
           		if($row->berat == '0'){

           			$row->berat = ""; 

           		}

                $result['data'][]=array(

                        $row->nomor, 
                        $row->kode_species, 
                        $row->panjang , 
                        $row->berat , 
                        $row->alat_tangkap , 
                        $action1, 
                        $action2
                
                
                ); 

        }


         echo json_encode($result);

	}



	public function add_observerform_tangkapan_detail(){


		   //form validation 
        $this->form_validation->set_rules('id_trip', 'id_trip', 'required');
        $this->form_validation->set_rules('seq', 'seq', 'required');
		$this->form_validation->set_rules('kode_species', 'kode_species', 'required');

        
        if ( $this->form_validation->run()  ) {


        	$check_species = $this->Model_trip_hl->check_species_exsist("hl_observerform_tangkapan_hasil", "add" ,  $this->input->post());
            
	            if($check_species){

	            	$success = false;
	             	$messages =  "Species tidak ada dalam TOTAL HASIL TANGKAPAN ! ";
	            
	            
        	}else{

        		$saved = $this->Model_trip_hl->add_observerform_tangkapan_detail($this->input->post());

	            if ($saved)
	            {
	                 $success = true;
	                 $messages =  "Successfully adding Data! ";
	            }
	            else
	            {
	                 $success = false;
	                 $messages =  "Insert not working ! ";
	            }

        		
        	}

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Kode Species harus diisi!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);



	}


	public function update_observerform_tangkapan_detail(){


		$this->form_validation->set_rules('edit_id_trip', 'edit_id_trip ', 'required');
        $this->form_validation->set_rules('edit_seq', 'edit_seq ', 'required');
        $this->form_validation->set_rules('edit_nomor', 'edit_nomor ', 'required');
        $this->form_validation->set_rules('edit_kode_species2', 'edit_kode_species2 ', 'required');


    

        
        if ( $this->form_validation->run()  ) {
            
            //Insert to Database 
             $saved = $this->Model_trip_hl->update_observerform_tangkapan_detail($this->input->post());

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully adding Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "Update not working ! ";
            }

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);


	}

	
	public function view_update_observerform_tangkapan_detail(){


		$response = array();

        $id_trip = $_POST['id_trip'];

        $seq = $_POST['seq'];

        $nomor = $_POST['nomor']; 


        $results = $this->Model_master->general_select("hl_observerform_tangkapan_detail", array('id_trip' => $id_trip , 'seq_tangkapan' => $seq , 'nomor' => $nomor ) , "", ""); 


        $response = array(

                'success' => true, 

                'messages' => $results->result_array()
            ); 

        echo json_encode($response);

	}

	public function delete_observerform_tangkapan_detail(){


        $saved = $this->Model_trip_hl->delete_observerform_tangkapan_detail($_POST['id_trip'] , $_POST['seq'] , $_POST['nomor']);

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully disable Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "disable not working ! ";
            }
        
        $validator['success'] = $success;
        $validator['messages'] = $messages;

        echo json_encode($validator);


	}

	/* End Form 3*/





	/*Form 4*/

	public function form4($kode_trip){

		$data = $this->link_forms($kode_trip);

		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Sampling Umpan HL' ; 

		$data['page_name_detail'] = 'Form 4 Data Sampling Umpan HL' ; 

		$data['record'] = $this->Model_master->general_select("hl_observerform_umpan", array('id_trip' => $kode_trip), "", "");

		$this->template->load('administrator/template','administrator/trip-hl/form4/list', $data);

	}


	public function form4_add($kode_trip){


		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Sampling Umpan' ; 

		$data['page_name_detail'] = 'Add Form 4 Data Sampling Umpan' ; 

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();

		$data['post'] = array();  


		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			

			if( $this->form_validation->run() == TRUE  ) {

				$data = $this->input->post(); 


	          	$getSeq = $this->Model_trip_hl->form4_add($data);

				redirect('trip_hl/form4_update/'.$kode_trip.'/'.$getSeq);



	          }else{

	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip-hl/form4/add', $data);


	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip-hl/form4/add', $data);

	

		}

	}


	public function form4_update($kode_trip , $id){

		$data['kode_trip'] = $kode_trip; 

		$data['seq'] = $id ; 

		$data['page_name'] = 'Data Sampling Umpan' ; 

		$data['page_name_detail'] = 'Update Form 4 Data Sampling Umpan' ; 

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();

		$data['post'] = $this->Model_master->general_select("hl_observerform_umpan", array('id_trip' => $kode_trip , 'seq' => $id) , "", "")->row_array();; 

		$data['kode_umpan']  = $this->Model_master->general_select("master_species", array('jenis_species' => 'Umpan'), "", "fao");

		$data['table1'] = 'Detail Umpan'; 

		$data['button_add']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable1" id="AddDataTable1Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

		$data['url_load_table']=base_url()."trip_hl/view_observerform_umpan_detail/".$kode_trip."/".$id;

		$data['url_show_table']=base_url()."trip_hl/view_update_observerform_umpan_detail/";

		$data['url_add_table1']=base_url()."trip_hl/add_observerform_umpan_detail";

		$data['url_update_table1']=base_url()."trip_hl/update_observerform_umpan_detail";

		$data['url_delete_table1']=base_url()."trip_hl/delete_observerform_umpan_detail";



		$data['table2'] = 'Detail Umpan Panjang'; 

		$data['button_add2']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable2" id="AddDataTable2Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

		$data['url_load_table2']=base_url()."trip_hl/view_observerform_umpan_detail_panjang/".$kode_trip."/".$id;

		$data['url_show_table2']=base_url()."trip_hl/view_update_observerform_umpan_detail_panjang/";

		$data['url_add_table2']=base_url()."trip_hl/add_observerform_umpan_detail_panjang";

		$data['url_update_table2']=base_url()."trip_hl/update_observerform_umpan_detail_panjang";

		$data['url_delete_table2']=base_url()."trip_hl/delete_observerform_umpan_detail_panjang";

		
        $data['post']['waktu_mulai'] = $data['post']['jam_mulai'].":".$data['post']['menit_mulai'] ; 

        $data['post']['waktu_selesai'] = $data['post']['jam_selesai'].":".$data['post']['menit_selesai'] ; 		

		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			$this->form_validation->set_rules('seq', 'seq required', 'required');


			if( $this->form_validation->run() == TRUE  ) {


				$data = $this->input->post(); 

	          	$this->Model_trip_hl->form4_update($data);

				redirect('trip_hl/form4/'.$kode_trip);


	          }else{

	    
	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip-hl/form4/update', $data);


	          }


		}else{

		
				$this->template->load('administrator/template','administrator/trip-hl/form4/update', $data);
	

		}


	}


	public function form4_delete($kode_trip , $id){


		$this->Model_trip_hl->form4_delete($kode_trip , $id);

		redirect('trip_hl/form4/'.$kode_trip);


	}


	public function view_observerform_umpan_detail($kode_trip , $id){

		$query = $this->Model_master->general_select("hl_observerform_umpan_detail_jumlah", array('id_trip' => $kode_trip , 'seq_umpan' => $id) , "", ""); 

        $result = array();

        $no = 0;
        
        foreach($query->result() as $row){


                  $action1 = '<a type="button" data-toggle="modal" data-target="#editTable1Modal" onclick="editData(\'' .$row->id_trip.'\' , '.$row->seq_umpan.', '.$row->nomor.')" class="btn btn-primary a-btn-slide-text">
                                    <span class="fa fa-plug" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>            
                                </a>
                                ' ; 
                 $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable1Modal" onclick="disableData(\'' .$row->id_trip.'\'  , '.$row->seq_umpan.', '.$row->nomor.')" class="btn btn-danger a-btn-slide-text">
                                   <span class="fa fa-times" aria-hidden="true"></span>
                                    <span><strong>Delete</strong></span>            
                                </a>' ;
           

                if($row->berat ==0){

                	$row->berat = ""; 

                }

                $result['data'][]=array(

                        $row->nomor, 
                        $row->kode_species, 

                        $row->jumlah , 
                        $row->berat , 
                        
                        $action1, 
                        $action2
                
                
                ); 

        }


         echo json_encode($result);



	}


	public function add_observerform_umpan_detail(){


		   //form validation 
        $this->form_validation->set_rules('id_trip', 'id_trip', 'required');
        $this->form_validation->set_rules('seq', 'seq', 'required');
        $this->form_validation->set_rules('kode_species', 'kode_species', 'required');



        
        if ( $this->form_validation->run()  ) {


        	//Insert to Database 

            $data = $this->input->post() ; 

           

            $check_species = $this->Model_trip_hl->check_species_exsist("hl_observerform_umpan_detail_jumlah", "add" ,  $this->input->post());
            
            if($check_species){
            
	            //Insert to Database 
	             $saved = $this->Model_trip_hl->add_observerform_umpan_detail($data);

	            if ($saved)
	            {
	                 $success = true;
	                 $messages =  "Successfully adding Data! ";
	            }
	            else
	            {
	                 $success = false;
	                 $messages =  "Insert not working ! ";
	            }

        	}else{

        		$success = false;
	            $messages =  "Species sudah pernah dimasukkan ! ";

        	}

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Pastikan Kode species terisi';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);



	}


	public function view_update_observerform_umpan_detail(){


		$response = array();

        $id_trip = $_POST['id_trip'];

        $seq = $_POST['seq'];

        $nomor = $_POST['nomor']; 


        $results = $this->Model_master->general_select("hl_observerform_umpan_detail_jumlah", array('id_trip' => $id_trip , 'seq_umpan' => $seq , 'nomor' => $nomor ) , "", ""); 


        $response = array(

                'success' => true, 

                'messages' => $results->result_array()
            ); 

        echo json_encode($response);

	}
	
	public function update_observerform_umpan_detail(){


		$this->form_validation->set_rules('edit_id_trip', 'edit_id_trip ', 'required');
        $this->form_validation->set_rules('edit_seq', 'edit_seq ', 'required');
        $this->form_validation->set_rules('edit_nomor', 'edit_nomor ', 'required');
        $this->form_validation->set_rules('edit_kode_species', 'edit_kode_species ', 'required');


    

        
        if ( $this->form_validation->run()  ) {
            
            //Insert to Database 

            $data = $this->input->post() ; 

             $check_species = $this->Model_trip_hl->check_species_exsist("hl_observerform_umpan_detail_jumlah", "update" ,  $this->input->post());
            
            if($check_species){


	             $saved = $this->Model_trip_hl->update_observerform_umpan_detail($data);

	            if ($saved)
	            {
	                 $success = true;
	                 $messages =  "Successfully adding Data! ";
	            }
	            else
	            {
	                 $success = false;
	                 $messages =  "Update not working ! ";
	            }
        	}else
	         {
	            $success = false;
	            $messages =  "Species sudah pernah dimasukkan ! ";
	          }

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Pastikan kode species terisi!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);


	}


	public function delete_observerform_umpan_detail(){


        $saved = $this->Model_trip_hl->delete_observerform_umpan_detail($_POST['id_trip'] , $_POST['seq'] , $_POST['nomor']);

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully disable Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "disable not working ! ";
            }
        
        $validator['success'] = $success;
        $validator['messages'] = $messages;

        echo json_encode($validator);


	}



	public function view_observerform_umpan_detail_panjang($kode_trip , $id){

		$query = $this->Model_master->general_select("hl_observerform_umpan_detail_panjang", array('id_trip' => $kode_trip , 'seq_umpan' => $id) , "", ""); 

        $result = array();

        $no = 0;
        
        foreach($query->result() as $row){


                  $action1 = '<a type="button" data-toggle="modal" data-target="#editTable2Modal" onclick="editData2(\'' .$row->id_trip.'\' , '.$row->seq_umpan.', '.$row->nomor.')" class="btn btn-primary a-btn-slide-text">
                                    <span class="fa fa-plug" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>            
                                </a>
                                ' ; 
                 $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable2Modal" onclick="disableData2(\'' .$row->id_trip.'\'  , '.$row->seq_umpan.', '.$row->nomor.')" class="btn btn-danger a-btn-slide-text">
                                   <span class="fa fa-times" aria-hidden="true"></span>
                                    <span><strong>Delete</strong></span>            
                                </a>' ;
           


                $result['data'][]=array(

                        $row->nomor, 
                        $row->kode_species, 

                        $row->berat , 
                        $row->panjang , 
                        $action1, 
                        $action2
                
                
                ); 

        }


         echo json_encode($result);



	}


	public function add_observerform_umpan_detail_panjang(){


		   //form validation 
        $this->form_validation->set_rules('id_trip2', 'id_trip2', 'required');
        $this->form_validation->set_rules('seq2', 'seq2', 'required');
        $this->form_validation->set_rules('kode_species2', 'kode_species2', 'required');



        
        if ( $this->form_validation->run()  ) {


        	//Insert to Database 

            $data = $this->input->post() ; 

            $check_species = $this->Model_trip_hl->check_species_exsist("hl_observerform_umpan_detail_panjang", "add" ,  $this->input->post());
            
            if($check_species){
            
	            //Insert to Database 
	             $saved = $this->Model_trip_hl->add_observerform_umpan_detail_jumlah($data);

	            if ($saved)
	            {
	                 $success = true;
	                 $messages =  "Successfully adding Data! ";
	            }
	            else
	            {
	                 $success = false;
	                 $messages =  "Insert not working ! ";
	            }

        	}else{

        		$success = false;
	            $messages =  "Species sudah pernah dimasukkan ! ";

        	}

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Pastikan Kode species terisi';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);



	}


	public function view_update_observerform_umpan_detail_panjang(){


		$response = array();

        $id_trip = $_POST['id_trip'];

        $seq = $_POST['seq'];

        $nomor = $_POST['nomor']; 


        $results = $this->Model_master->general_select("hl_observerform_umpan_detail_panjang", array('id_trip' => $id_trip , 'seq_umpan' => $seq , 'nomor' => $nomor ) , "", ""); 


        $response = array(

                'success' => true, 

                'messages' => $results->result_array()
            ); 

        echo json_encode($response);

	}


	public function update_observerform_umpan_detail_panjang(){


		$this->form_validation->set_rules('edit_id_trip2', 'edit_id_trip2', 'required');
        $this->form_validation->set_rules('edit_seq2', 'edit_seq2', 'required');
        $this->form_validation->set_rules('edit_nomor2', 'edit_nomor2 ', 'required');
        $this->form_validation->set_rules('edit_kode_species2', 'edit_kode_species2 ', 'required');


    

        
        if ( $this->form_validation->run()  ) {
            
            //Insert to Database 

            $data = $this->input->post() ; 

             $check_species = $this->Model_trip_hl->check_species_exsist("hl_observerform_umpan_detail_panjang", "update" ,  $this->input->post());
            
            if($check_species){


	             $saved = $this->Model_trip_hl->update_observerform_umpan_detail_panjang($data);

	            if ($saved)
	            {
	                 $success = true;
	                 $messages =  "Successfully adding Data! ";
	            }
	            else
	            {
	                 $success = false;
	                 $messages =  "Update not working ! ";
	            }
        	}else
	         {
	            $success = false;
	            $messages =  "Species sudah pernah dimasukkan ! ";
	          }

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Pastikan kode species terisi!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);


	}



	public function delete_observerform_umpan_detail_panjang(){


        $saved = $this->Model_trip_hl->delete_observerform_umpan_detail_panjang($_POST['id_trip'] , $_POST['seq'] , $_POST['nomor']);

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully disable Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "disable not working ! ";
            }
        
        $validator['success'] = $success;
        $validator['messages'] = $messages;

        echo json_encode($validator);


	}


	/* End Form 4*/



	/* form 5 */

	public function form5($kode_trip){

		$data = $this->link_forms($kode_trip);

		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Umpan yang tidak Gunakan' ; 

		$data['page_name_detail'] = 'Form 5 Data Umpan yang tidak Gunakan' ; 

		$data['record'] = $this->Model_master->general_select("hl_observerform_umpan_terpakai", array('id_trip' => $kode_trip), "", "");

		$this->template->load('administrator/template','administrator/trip-hl/form5/list', $data);

	}

	public function form5_add($kode_trip){


		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Umpan yang Gunakan' ; 

		$data['page_name_detail'] = 'Add Form 5 Data Umpan yang Gunakan' ; 

		$data['post'] = array();  

		$data['kode_umpan']  = $this->Model_master->general_select("master_species", array('jenis_species' => 'Umpan'), "", "fao");
 
 		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();


		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			

			if( $this->form_validation->run() == TRUE  ) {

				$data = $this->input->post(); 


	          	$getSeq = $this->Model_trip_hl->form5_add($data);

				redirect('trip_hl/form5_update/'.$kode_trip.'/'.$getSeq);



	          }else{

	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip-hl/form5/add', $data);


	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip-hl/form5/add', $data);

	

		}

	}


	public function form5_update($kode_trip , $id){

		$data['kode_trip'] = $kode_trip; 

		$data['seq'] = $id ; 

		$data['page_name'] = 'Data Umpan yang  Gunakan' ; 

		$data['page_name_detail'] = 'Update Form 5 Data Umpan yang  Gunakan' ; 

		$data['post'] = $this->Model_master->general_select("hl_observerform_umpan_terpakai", array('id_trip' => $kode_trip , 'seq' => $id) , "", "")->row_array();; 

		$data['kode_umpan']  = $this->Model_master->general_select("master_species", array('jenis_species' => 'Umpan'), "", "fao");
 
 		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();


 		$data['button_add']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable1" id="AddDataTable1Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

 		$data['table1'] = 'TOTAL HASIL UMPAN DETAIL'; 

		$data['url_load_table1']=base_url()."trip_hl/view_observerform_umpan_terpakai_detail/".$kode_trip."/".$id;

		$data['url_show_table1']=base_url()."trip_hl/view_update_observerform_umpan_terpakai_detail/";

		$data['url_add_table1']=base_url()."trip_hl/add_observerform_umpan_terpakai_detail";

		$data['url_update_table1']=base_url()."trip_hl/update_observerform_umpan_terpakai_detail";

		$data['url_delete_table1']=base_url()."trip_hl/delete_observerform_umpan_terpakai_detail";


		$data['button_add2']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable2" id="AddDataTable2Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

 		$data['table2'] = 'TOTAL HASIL UMPAN PEMIKAT'; 

		$data['url_load_table2']=base_url()."trip_hl/view_observerform_umpan_terpakai_pemikat/".$kode_trip."/".$id;

		$data['url_show_table2']=base_url()."trip_hl/view_update_observerform_umpan_terpakai_pemikat/";

		$data['url_add_table2']=base_url()."trip_hl/add_observerform_umpan_terpakai_pemikat";

		$data['url_update_table2']=base_url()."trip_hl/update_observerform_umpan_terpakai_pemikat";

		$data['url_delete_table2']=base_url()."trip_hl/delete_observerform_umpan_terpakai_pemikat";
				

		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			$this->form_validation->set_rules('seq', 'seq required', 'required');

			

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip_hl->form5_update($this->input->post());

				redirect('trip_hl/form5/'.$kode_trip);


	          }else{

	    
	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip-hl/form5/update', $data);


	          }


		}else{

		
				$this->template->load('administrator/template','administrator/trip-hl/form5/update', $data);
	

		}


	}


	public function form5_delete($kode_trip , $id){


		$this->Model_trip_hl->form5_delete($kode_trip , $id);

		redirect('trip_hl/form5/'.$kode_trip);


	}



	public function view_observerform_umpan_terpakai_detail($kode_trip , $id){

		$query = $this->Model_master->general_select("hl_observerform_umpan_terpakai_detail", array('id_trip' => $kode_trip , 'seq_umpan' => $id) , "", ""); 

        $result = array();

        $no = 0;
        
        foreach($query->result() as $row){


                  $action1 = '<a type="button" data-toggle="modal" data-target="#editTable1Modal" onclick="editData(\'' .$row->id_trip.'\' , '.$row->seq_umpan.', '.$row->nomor.')" class="btn btn-primary a-btn-slide-text">
                                    <span class="fa fa-plug" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>            
                                </a>
                                ' ; 
                 $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable1Modal" onclick="disableData(\'' .$row->id_trip.'\'  , '.$row->seq_umpan.', '.$row->nomor.')" class="btn btn-danger a-btn-slide-text">
                                   <span class="fa fa-times" aria-hidden="true"></span>
                                    <span><strong>Delete</strong></span>            
                                </a>' ;
           


                $result['data'][]=array(

                         $row->nomor  ,
                                       $row->kode_species  ,
                                       $row->pakura1_jum  ,
                                       $row->pakura1_ber ,
                                       $row->pakura2_jum ,
                                       $row->pakura2_ber ,
                                       $row->pakura3_jum ,
                                       $row->pakura3_ber ,
                                       $row->pakura4_jum  ,
                                       $row->pakura4_ber  ,
                                       $row->pakura5_jum ,
                                       $row->pakura5_ber  ,
                                       $row->pakura6_jum  ,
                                       $row->pakura6_ber  ,
                                       $row->kapal_jum  ,
                        $row->kapal_ber  ,
                        $action1, 
                        $action2
                
                
                ); 

        }


         echo json_encode($result);



	}


	public function add_observerform_umpan_terpakai_detail(){

	  //form validation 
        $this->form_validation->set_rules('id_trip', 'id_trip', 'required');
        $this->form_validation->set_rules('seq', 'seq', 'required');
        $this->form_validation->set_rules('kode_species', 'kode_species', 'required');



        
        if ( $this->form_validation->run()  ) {


        	//Insert to Database 

            $data = $this->input->post() ; 

           

            $check_species = $this->Model_trip_hl->check_species_exsist("hl_observerform_umpan_terpakai_detail", "add" ,  $this->input->post());
            
            if($check_species){
            
	            //Insert to Database 
	             $saved = $this->Model_trip_hl->add_observerform_umpan_terpakai_detail($data);

	            if ($saved)
	            {
	                 $success = true;
	                 $messages =  "Successfully adding Data! ";
	            }
	            else
	            {
	                 $success = false;
	                 $messages =  "Insert not working ! ";
	            }

        	}else{

        		$success = false;
	            $messages =  "Species sudah pernah dimasukkan ! ";

        	}

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Pastikan Kode species terisi';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);

    }


    public function view_update_observerform_umpan_terpakai_detail(){


		$response = array();

        $id_trip = $_POST['id_trip'];

        $seq = $_POST['seq'];

        $nomor = $_POST['nomor']; 


        $results = $this->Model_master->general_select("hl_observerform_umpan_terpakai_detail", array('id_trip' => $id_trip , 'seq_umpan' => $seq , 'nomor' => $nomor ) , "", ""); 


        $response = array(

                'success' => true, 

                'messages' => $results->result_array()
            ); 

        echo json_encode($response);

	}


	public function update_observerform_umpan_terpakai_detail(){


		$this->form_validation->set_rules('edit_id_trip', 'edit_id_trip', 'required');
        $this->form_validation->set_rules('edit_seq', 'edit_seq', 'required');
        $this->form_validation->set_rules('edit_nomor', 'edit_nomor ', 'required');
        $this->form_validation->set_rules('edit_kode_species', 'edit_kode_species ', 'required');


    

        
        if ( $this->form_validation->run()  ) {
            
            //Insert to Database 

            $data = $this->input->post() ; 

             $check_species = $this->Model_trip_hl->check_species_exsist("hl_observerform_umpan_terpakai_detail", "update" ,  $this->input->post());
            
            if($check_species){


	             $saved = $this->Model_trip_hl->update_observerform_umpan_terpakai_detail($data);

	            if ($saved)
	            {
	                 $success = true;
	                 $messages =  "Successfully adding Data! ";
	            }
	            else
	            {
	                 $success = false;
	                 $messages =  "Update not working ! ";
	            }
        	}else
	         {
	            $success = false;
	            $messages =  "Species sudah pernah dimasukkan ! ";
	          }

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Pastikan kode species terisi!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);


	}


	public function delete_observerform_umpan_terpakai_detail(){


        $saved = $this->Model_trip_hl->delete_observerform_umpan_terpakai_detail($_POST['id_trip'] , $_POST['seq'] , $_POST['nomor']);

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully disable Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "disable not working ! ";
            }
        
        $validator['success'] = $success;
        $validator['messages'] = $messages;

        echo json_encode($validator);


	}


	public function view_observerform_umpan_terpakai_pemikat($kode_trip , $id){

		$query = $this->Model_master->general_select("hl_observerform_umpan_terpakai_pemikat", array('id_trip' => $kode_trip , 'seq_umpan' => $id) , "", ""); 

        $result = array();

        $no = 0;
        
        foreach($query->result() as $row){


                  $action1 = '<a type="button" data-toggle="modal" data-target="#editTable2Modal" onclick="editData2(\'' .$row->id_trip.'\' , '.$row->seq_umpan.')" class="btn btn-primary a-btn-slide-text">
                                    <span class="fa fa-plug" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>            
                                </a>
                                ' ; 
                 $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable2Modal" onclick="disableData2(\'' .$row->id_trip.'\'  , '.$row->seq_umpan.')" class="btn btn-danger a-btn-slide-text">
                                   <span class="fa fa-times" aria-hidden="true"></span>
                                    <span><strong>Delete</strong></span>            
                                </a>' ;
           


                $result['data'][]=array(

                        $row->pakura1_pemikat,
						$row->pakura2_pemikat,
						$row->pakura3_pemikat,
						$row->pakura4_pemikat,
						$row->pakura5_pemikat,
						$row->pakura6_pemikat,
						$row->kapal_pemikat,
                        $action1, 
                        $action2
                
                
                ); 

        }


         echo json_encode($result);



	}


	public function add_observerform_umpan_terpakai_pemikat(){

	   $this->form_validation->set_rules('id_trip', 'id_trip', 'required');
       $this->form_validation->set_rules('seq', 'seq', 'required');

        if ( $this->form_validation->run()  ) {

        	$post = $this->input->post() ; 

        	$kode_trip = $post['id_trip'] ; 

        	$seq = $post['seq'] ; 

        	$data['trip_info'] = $this->Model_master->general_select("hl_observerform_umpan_terpakai_pemikat", array('id_trip' => $kode_trip , 'seq_umpan' => $seq), "", "")->row_array();

 

			
			if($data['trip_info'] == ''){
				//Insert to Database 
				$saved = $this->Model_trip_hl->add_observerform_umpan_terpakai_pemikat($this->input->post());

				 if ($saved)
					{
						$success = true;
						$messages =  "Successfully adding Data! ";
					}
				else
					{
						$success = false;
						$messages =  "Insert not working ! ";
					}

					    }else{

					        $success = false;
							$messages =  "Data sudah pernah dimasukkan! ";

					    }
        	



        	

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Informasi sudah pernah dimasukkan ';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);


    }


    public function view_update_observerform_umpan_terpakai_pemikat(){


		$response = array();

        $id_trip = $_POST['id_trip'];

        $seq = $_POST['seq'];


        $results = $this->Model_master->general_select("hl_observerform_umpan_terpakai_pemikat", array('id_trip' => $id_trip , 'seq_umpan' => $seq  ) , "", ""); 


        $response = array(

                'success' => true, 

                'messages' => $results->result_array()
            ); 

        echo json_encode($response);

	}


	public function update_observerform_umpan_terpakai_pemikat(){


		$this->form_validation->set_rules('edit_id_trip2', 'edit_id_trip2', 'required');
        $this->form_validation->set_rules('edit_seq2', 'edit_seq2', 'required');


    

        
        if ( $this->form_validation->run()  ) {
            
            //Insert to Database 

            $data = $this->input->post() ; 

	        $saved = $this->Model_trip_hl->update_observerform_umpan_terpakai_pemikat($data);
    
	            
	        $success = true;
	        $messages =  "Success ! ";
	            
        	
            
        }else{

            $success = false;
            $messages = 'Trouble adding Data!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);


	}


	public function delete_observerform_umpan_terpakai_pemikat(){


        $saved = $this->Model_trip_hl->delete_observerform_umpan_terpakai_pemikat($_POST['id_trip'] , $_POST['seq'] );

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully disable Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "disable not working ! ";
            }
        
        $validator['success'] = $success;
        $validator['messages'] = $messages;

        echo json_encode($validator);


	}

	/* form 5 */







	/* form 6 */

	public function form6($kode_trip){

		$data = $this->link_forms($kode_trip);

		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Endangered, threatened and protected species ' ; 

		$data['page_name_detail'] = 'Form 6 Endangered, threatened and protected species ' ; 

		$data['record'] = $this->Model_master->general_select("hl_observerform_etp", array('id_trip' => $kode_trip), "", "");

		$this->template->load('administrator/template','administrator/trip-hl/form6/list', $data);

	}


		public function form6_add($kode_trip){


		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Endangered, threatened and protected species ' ; 

		$data['page_name_detail'] = 'Add Form 6 Endangered, threatened and protected species ' ; 

		$data['post'] = array();  

		$data['kode_posisi_pancing_etp'] = $this->Model_master->general_select("master_dictionary", array('jenis_aktivitas' => 'kode_posisi_pancing_etp' ) , "", ""); 

		$data['kode_kondisi_etp'] = $this->Model_master->general_select("master_dictionary", array('jenis_aktivitas' => 'kode_kondisi_etp' ) , "", ""); 

		$data['trip'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip ) , "", "")->row_array();

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();


		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');


			if( $this->form_validation->run() == TRUE  ) {

	          	$getSeq =  $this->Model_trip_hl->form6_add($this->input->post());

				redirect('trip_hl/form6_update/'.$kode_trip.'/'.$getSeq);




	          }else{

	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip-hl/form6/add', $data);


	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip-hl/form6/add', $data);

	

		}

	}


	public function load_species_etp(){

                $id = $_POST['species_fao']; 

                if($id == 'Paus'){

                	$id= 'Lumba-lumba';

                }

                $results = $this->Model_master->load_species_etp($id);

                echo '<option value="">Select Species</option>';
                
                foreach($results->result() as $res){
                    echo '<option value="'.$res->fao.'">'.$res->fao.' - '.$res->english.'</option>'; 
                }
    }


    public function load_species_etp_edit(){

                $jenis = $_POST['jenis']; 

                $kode = $_POST['kode'];

                $results = $this->Model_master->load_species_etp($jenis);

                echo '<option value="">Select Species</option>';
                
                foreach($results->result() as $res){
                    if($res->fao == $kode){
                        echo '<option value="'.$res->fao.'" selected>'.$res->fao.' - '.$res->english.'</option>'; 
                    }else{
                        echo '<option value="'.$res->fao.'">'.$res->fao.' - '.$res->english.'</option>';  
                    }
                }
            }


	public function form6_update($kode_trip , $id){

		$data['kode_trip'] = $kode_trip; 

		$data['seq'] = $id ; 

		$data['page_name'] = 'Endangered, threatened and protected species ' ; 

		$data['page_name_detail'] = 'Add Form 6 Endangered, threatened and protected species ' ; 

		$data['post'] = $this->Model_master->general_select("hl_observerform_etp", array('id_trip' => $kode_trip , 'seq' => $id) , "", "")->row_array();; 

		$data['kode_posisi_pancing_etp'] = $this->Model_master->general_select("master_dictionary", array('jenis_aktivitas' => 'kode_posisi_pancing_etp' ) , "", ""); 

		$data['kode_kondisi_etp'] = $this->Model_master->general_select("master_dictionary", array('jenis_aktivitas' => 'kode_kondisi_etp' ) , "", ""); 
	
		$data['kode_etp_penyu']  = $this->Model_master->general_select("master_species", array('jenis_species' => 'Penyu'), "", "fao");

		$data['kode_etp_lain']  = $this->Model_trip->form6_etp_list();

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();



		$data['table1'] = 'Detail Penyu'; 

		$data['button_add']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable1" id="AddDataTable1Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

		$data['url_load_table']=base_url()."trip_hl/view_observerform_etp_detail/".$kode_trip."/".$id."/penyu";

		$data['url_show_table']=base_url()."trip_hl/view_update_observerform_etp_detail/";

		$data['url_add_table1']=base_url()."trip_hl/add_observerform_etp_detail";

		$data['url_update_table1']=base_url()."trip_hl/update_observerform_etp_detail";

		$data['url_delete_table1']=base_url()."trip_hl/delete_observerform_etp_detail";



		$data['table2'] = 'Detail Lain'; 

		$data['button_add2']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable2" id="AddDataTable2Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

		$data['url_load_table2']=base_url()."trip_hl/view_observerform_etp_detail/".$kode_trip."/".$id."/lain";

		$data['url_show_table2']=base_url()."trip_hl/view_update_observerform_etp_detail/";


		$data['select_load_species'] = base_url()."trip_hl/load_species_etp/";

		$data['select_load_species_edit'] = base_url()."trip_hl/load_species_etp_edit/";


		$lintang = explode("," , $data['post']['lintang']);

			$data['post']['lintang_degree'] = '';

	        $data['post']['lintang_minutes'] = '';

	        $data['post']['lintang_us'] = '';

		if (!empty($lintang)) {

			if (!empty($lintang[1]) && !(empty($lintang[2])) &&(!empty($lintang[0])) ) {

	            $data['post']['lintang_degree'] = $lintang[0];

	            $data['post']['lintang_minutes'] = $lintang[1];

	            $data['post']['lintang_us'] = $lintang[2];

        	}
        }

        
		$bujur = explode("," , $data['post']['bujur']);

			$data['post']['bujur_degree'] = '';

            $data['post']['bujur_minutes'] = '';

            $data['post']['bujur_us'] = '';

		if (!empty($bujur)) {

			if (!empty($bujur[1]) && !(empty($bujur[2])) &&(!empty($bujur[0])) ) {

            $data['post']['bujur_degree'] = $bujur[0];

            $data['post']['bujur_minutes'] = $bujur[1];

            $data['post']['bujur_us'] = $bujur[2];

        	}
        }

        $waktu = explode(":" , $data['post']['waktu']);

         	$data['post']['jam'] = $waktu[0];

         	$data['post']['menit'] = $waktu[1];



		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			$this->form_validation->set_rules('seq', 'seq required', 'required');

			

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip_hl->form6_update($this->input->post());

				redirect('trip_hl/form6/'.$kode_trip);


	          }else{

	    
	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip-hl/form6/update', $data);


	          }


		}else{

		
				$this->template->load('administrator/template','administrator/trip-hl/form6/update', $data);
	

		}


	}


	public function form6_delete($kode_trip , $id){


		$this->Model_trip_hl->form6_delete($kode_trip , $id);

		redirect('trip_hl/form6/'.$kode_trip);


	}


	public function view_observerform_etp_detail($kode_trip , $id , $hewan){


        $result = array();

        $no = 0;


		if($hewan == 'penyu'){

			$query = $this->Model_master->general_select_not_in("hl_observerform_etp_detail", array('id_trip' => $kode_trip , 'seq_etp' => $id) , array('data_penyu' => ''), ""); 


			foreach($query->result() as $row){


		        	 $action1 = '<a type="button" data-toggle="modal" data-target="#editTable1Modal" onclick="editData(\'' .$row->id_trip.'\' , '.$row->seq_etp.', '.$row->nomor.')" class="btn btn-primary a-btn-slide-text">
		                                    <span class="fa fa-plug" aria-hidden="true"></span>
		                                    <span><strong>Edit</strong></span>            
		                                </a>
		                                ' ; 
		             $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable1Modal" onclick="disableData(\'' .$row->id_trip.'\'  , '.$row->seq_etp.', '.$row->nomor.')" class="btn btn-danger a-btn-slide-text">
		                                   <span class="fa fa-times" aria-hidden="true"></span>
		                                    <span><strong>Delete</strong></span>            
		                                </a>' ;

		        	$penyu = json_decode($row->data_penyu , true) ; 
				
							
						if(empty($penyu['sisik_hidung'])){
								$penyu['sisik_hidung']  = "";
							}

						if(empty($penyu['sisik_leher'])){
								$penyu['sisik_leher']  = "";
							}

						if(empty($penyu['sisik_kosta'])){
								$penyu['sisik_kosta']  = "";
							}

						if(empty($penyu['sisik_belakang'])){
								$penyu['sisik_belakang']  = "";
							}

						if(empty($penyu['no_foto'])){
								$penyu['no_foto']  = "";
							}

						if(empty($penyu['scl'])){
								$penyu['scl']  = "";
							}

						if(empty($penyu['cw'])){
								$penyu['cw']  = "";
							}


						if(empty($penyu['ccl'])){
								$penyu['ccl']  = "";
							}

					
		        	

		                $result['data'][]=array(

		                		$penyu['species_penyu'],

		                		$penyu['sisik_hidung'],
								$penyu['sisik_leher'],
								$penyu['sisik_kosta'],
								$penyu['sisik_belakang'],
								$penyu['no_foto'],
								$penyu['scl'],
								$penyu['cw'],

		                        $penyu['ccl'],  
		                        $action1, 
		                        $action2
		                
		                
		                ); 

			}

		}else{

			$query = $this->Model_master->general_select_not_in("hl_observerform_etp_detail", array('id_trip' => $kode_trip , 'seq_etp' => $id) , array('data_lain' => ''), ""); 



			foreach($query->result() as $row){


		        	 $action1 = '<a type="button" data-toggle="modal" data-target="#editTable2Modal" onclick="editData2(\'' .$row->id_trip.'\' , '.$row->seq_etp.', '.$row->nomor.')" class="btn btn-primary a-btn-slide-text">
		                                    <span class="fa fa-plug" aria-hidden="true"></span>
		                                    <span><strong>Edit</strong></span>            
		                                </a>
		                                ' ; 
		             $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable2Modal" onclick="disableData2(\'' .$row->id_trip.'\'  , '.$row->seq_etp.', '.$row->nomor.')" class="btn btn-danger a-btn-slide-text">
		                                   <span class="fa fa-times" aria-hidden="true"></span>
		                                    <span><strong>Delete</strong></span>            
		                                </a>' ;

		        	$lain = json_decode($row->data_lain , true) ; 
				
		        	

		                $result['data'][]=array(

		                        $lain['kode_species'], 
		                        $lain['jenis_kelamin'], 
		                        $lain['foto'],  
		                        $lain['no_foto'], 
		                        $lain['panjang'],  
		                        $action1, 
		                        $action2
		                
		                
		                ); 

			}

		}


         echo json_encode($result);

	}


	public function add_observerform_etp_detail(){



		   //form validation 
        $this->form_validation->set_rules('id_trip', 'id_trip', 'required');
        $this->form_validation->set_rules('seq', 'seq', 'required');



        
        if ( $this->form_validation->run()  ) {
            
            //Insert to Database 
             $saved = $this->Model_trip_hl->add_observerform_etp_detail($this->input->post());

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully adding Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "Insert not working ! ";
            }

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);



	}


	public function view_update_observerform_etp_detail(){

		$response = array();

        $id_trip = $_POST['id_trip'];

        $seq = $_POST['seq'];

        $nomor = $_POST['nomor']; 


        $results = $this->Model_master->general_select("hl_observerform_etp_detail", array('id_trip' => $id_trip , 'seq_etp' => $seq , 'nomor' => $nomor ) , "", ""); 

        $data[] = array(); 

        foreach($results->result_array() as $res){

        	if($res['data_penyu'] != ""){ 
	
	        	$hasil = json_decode( $res['data_penyu'] , true) ; 

        		$data[0] = array( "nomor" => $res["nomor"] ,  
        			"species_penyu" => $hasil['species_penyu'] , 
        			"sisik_hidung" => $hasil['sisik_hidung'] , 
        			"sisik_leher" => $hasil['sisik_leher'] , 
        			"sisik_kosta" => $hasil['sisik_kosta'] ,
        			"sisik_belakang" => $hasil['sisik_belakang'] , 
        			"no_foto" => $hasil['no_foto'] ,
        			"scl" => $hasil['scl'] , 
        			"cw" => $hasil['cw'] ,

        			"ccl" => $hasil['ccl'] , 
        			 ) ;  
        	}
				
			if($res['data_lain'] != ""){ 
	
	        	$hasil = json_decode( $res['data_lain'] , true) ; 

        		$data[0] = array( "nomor" => $res["nomor"] ,  "jenis_kelamin" => $hasil['jenis_kelamin'] ,  "kode_species" => $hasil['kode_species'] , "jenis_species" => $hasil['jenis_species'] ,  "foto" => $hasil['foto'] , "no_foto" => $hasil['no_foto'] ,"panjang" => $hasil['panjang']  ) ;  
        	}
				
        }


        $response = array(

                'success' => true, 

                'messages' =>$data , 

            ); 

        echo json_encode($response);

	}

	public function  update_observerform_etp_detail(){


		$this->form_validation->set_rules('edit_id_trip', 'edit_id_trip ', 'required');
        $this->form_validation->set_rules('edit_seq', 'edit_seq ', 'required');
        $this->form_validation->set_rules('edit_nomor', 'edit_nomor ', 'required');


        
        if ( $this->form_validation->run()  ) {
            
            //Insert to Database 
             $saved = $this->Model_trip_hl->update_observerform_etp_detail($this->input->post());

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully adding Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "Update not working ! ";
            }

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);



	}


	public function delete_observerform_etp_detail(){

		 $saved = $this->Model_trip_hl->delete_observerform_etp_detail($_POST['id_trip'] , $_POST['seq'] , $_POST['nomor']);

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully disable Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "disable not working ! ";
            }
        
        $validator['success'] = $success;
        $validator['messages'] = $messages;

        echo json_encode($validator);

	}



	public function json_test(){

	

			$result = array(
					'kode_species' => '1' , 
					'jenis_kelamin' => '2' , 
					'foto' => '3' , 
					'no_foto' => '4' , 
					'panjang' => '5' , 
					); 

			$test =  json_encode($result);

			$kode_trip = 'HSA_20181001_20181008_2';

			$id = '3' ; 

			$this->Model_trip->json_insert($kode_trip , $id , $test );
			

		
			 //var_dump( json_decode($test , true) ); 


			

	}

	/* form 6 */







	/* Form 7 */

	public function form7_update($kode_trip){


		$kode_trip;

		$data['kode_trip'] = $kode_trip ; 

		$data['detail'] = $this->Model_master->general_select("hl_observerform_fg_hilang", array('id_trip' => $kode_trip), "", "");


	

		$data['add']['jenis_alat1'] = "Tali Pancing Monofilamen/Nilon";
		$data['add']['jenis_alat2'] = "Umpan Buatan/lure";
		$data['add']['jenis_alat3'] = "Joran Fiberglass";
		$data['add']['jenis_alat4'] = "Joran Plastik";
		$data['add']['jenis_alat5'] = "Seser kecil/sibu-sibu (jaring boi-boi)";
		$data['add']['jenis_alat6'] = "Seser besar/sibu-sibu (gagang panjang)";
		$data['add']['jenis_alat7'] = "Jaring untuk tangkap umpan";
		$data['add']['jenis_alat8'] = "Lainnya (jelaskan) ";


		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip_hl->update_hl_observerform_fg_hilang($this->input->post());

				redirect('trip_hl/form7_update/'.$kode_trip);


	          }else{

	    
	          	$this->template->load('administrator/template','administrator/trip-hl/form7/update', $data);

	          }


		}else{

				$check = $this->Model_trip->checkExsisting("hl_observerform_fg_hilang", array('id_trip' => $kode_trip) , 'id_trip'); 
				
				if($check == 0 ){
					$this->template->load('administrator/template','administrator/trip-hl/form7/add', $data);
				}else{
					$this->template->load('administrator/template','administrator/trip-hl/form7/update', $data);
				}
		
			
	

		}


	}

	/* End Form 7 */


/* form 8 */

	public function form8($kode_trip){

		$data = $this->link_forms($kode_trip);

		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Pemindahan Ikan di Laut ' ; 

		$data['page_name_detail'] = 'Form 8 Pemindahan Ikan di Laut ' ; 

		$data['record'] = $this->Model_master->general_select("hl_observerform_pemindahan", array('id_trip' => $kode_trip), "", "");

		$this->template->load('administrator/template','administrator/trip-hl/form8/list', $data);

	}


		public function form8_add($kode_trip){


		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Pemindahan Ikan di Laut ' ; 

		$data['page_name_detail'] = 'Add Form 8 Pemindahan ikan di laut ' ; 

		$data['post'] = array();  

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();


		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');


			if( $this->form_validation->run() == TRUE  ) {

	          	$getSeq = $this->Model_trip_hl->form8_add($this->input->post());

				redirect('trip_hl/form8_update/'.$kode_trip.'/'.$getSeq);


	          }else{

	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip-hl/form8/add', $data);


	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip-hl/form8/add', $data);

	

		}

	}


		public function form8_update($kode_trip , $id){

		$data['kode_trip'] = $kode_trip; 

		$data['seq'] = $id ; 

		$data['page_name'] = 'Pemindahan Ikan di Laut ' ; 

		$data['page_name_detail'] = 'Add Form 8 Kapal penangkapan ikan ' ; 

		$data['post'] = $this->Model_master->general_select("hl_observerform_pemindahan", array('id_trip' => $kode_trip , 'seq' => $id) , "", "")->row_array();; 

		$data['kode_species']  = $this->Model_master->general_select("master_species", array('jenis_species' => 'Ikan'), "", "fao");

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();


		$lintang = explode("," , $data['post']['lintang']);

			$data['post']['lintang_degree'] = '';

	        $data['post']['lintang_minutes'] = '';

	        $data['post']['lintang_us'] = '';

		if (!empty($lintang)) {

			if (!empty($lintang[1]) && !(empty($lintang[2])) &&(!empty($lintang[0])) ) {

	            $data['post']['lintang_degree'] = $lintang[0];

	            $data['post']['lintang_minutes'] = $lintang[1];

	            $data['post']['lintang_us'] = $lintang[2];

        	}
        }

        
		$bujur = explode("," , $data['post']['bujur']);

			$data['post']['bujur_degree'] = '';

            $data['post']['bujur_minutes'] = '';

            $data['post']['bujur_us'] = '';

		if (!empty($bujur)) {

			if (!empty($bujur[1]) && !(empty($bujur[2])) &&(!empty($bujur[0])) ) {

            $data['post']['bujur_degree'] = $bujur[0];

            $data['post']['bujur_minutes'] = $bujur[1];

            $data['post']['bujur_us'] = $bujur[2];

        	}
        }


        $waktu = explode(":" , $data['post']['waktu']);

         	$data['post']['jam'] = $waktu[0];

         	$data['post']['menit'] = $waktu[1];



		$data['table1'] = 'Detail Pemindahan Ikan Di Laut'; 

		$data['button_add']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable1" id="AddDataTable1Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

		$data['url_load_table']=base_url()."trip_hl/view_observerform_pemindahan_detail/".$kode_trip."/".$id;

		$data['url_show_table']=base_url()."trip_hl/view_update_observerform_pemindahan_detail/";

		$data['url_add_table1']=base_url()."trip_hl/add_observerform_pemindahan_detail";

		$data['url_update_table1']=base_url()."trip_hl/update_observerform_pemindahan_detail";

		$data['url_delete_table1']=base_url()."trip_hl/delete_observerform_pemindahan_detail";
		



		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			$this->form_validation->set_rules('seq', 'seq required', 'required');

			

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip_hl->form8_update($this->input->post());

				redirect('trip_hl/form8/'.$kode_trip);


	          }else{

	    
	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip-hl/form8/update', $data);


	          }


		}else{

		
				$this->template->load('administrator/template','administrator/trip-hl/form8/update', $data);
	

		}


	}


	public function form8_delete($kode_trip , $id){


		$this->Model_trip_hl->form8_delete($kode_trip , $id);

		redirect('trip_hl/form8/'.$kode_trip);


	}


	public function view_observerform_pemindahan_detail($kode_trip , $id){


		$query = $this->Model_master->general_select("hl_observerform_pemindahan_detail", array('id_trip' => $kode_trip , 'seq_pindah' => $id) , "", ""); 

        $result = array();

        $no = 0;
        
        foreach($query->result() as $row){


                  $action1 = '<a type="button" data-toggle="modal" data-target="#editTable1Modal" onclick="editData(\'' .$row->id_trip.'\' , '.$row->seq_pindah.', '.$row->nomor.')" class="btn btn-primary a-btn-slide-text">
                                    <span class="fa fa-plug" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>            
                                </a>
                                ' ; 
                 $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable1Modal" onclick="disableData(\'' .$row->id_trip.'\'  , '.$row->seq_pindah.', '.$row->nomor.')" class="btn btn-danger a-btn-slide-text">
                                   <span class="fa fa-times" aria-hidden="true"></span>
                                    <span><strong>Delete</strong></span>            
                                </a>' ;
           

                $result['data'][]=array(

                        $row->nomor, 
                        $row->kode_species, 
                        $row->tipe_produk , 
                        $row->berat , 
                        $action1, 
                        $action2
                
                
                ); 

        }


         echo json_encode($result);

	}


	public function add_observerform_pemindahan_detail(){


		   //form validation 
        $this->form_validation->set_rules('id_trip', 'id_trip', 'required');
        $this->form_validation->set_rules('seq', 'seq', 'required');



        
        if ( $this->form_validation->run()  ) {
            
            //Insert to Database 
             $saved = $this->Model_trip_hl->add_observerform_pemindahan_detail($this->input->post());

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully adding Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "Insert not working ! ";
            }

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);



	}


	public function view_update_observerform_pemindahan_detail(){


		$response = array();

        $id_trip = $_POST['id_trip'];

        $seq = $_POST['seq'];

        $nomor = $_POST['nomor']; 


        $results = $this->Model_master->general_select("hl_observerform_pemindahan_detail", array('id_trip' => $id_trip , 'seq_pindah' => $seq , 'nomor' => $nomor ) , "", ""); 


        $response = array(

                'success' => true, 

                'messages' => $results->result_array()
            ); 

        echo json_encode($response);

	}

	
	public function update_observerform_pemindahan_detail(){


		$this->form_validation->set_rules('edit_id_trip', 'edit_id_trip ', 'required');
        $this->form_validation->set_rules('edit_seq', 'edit_seq ', 'required');
        $this->form_validation->set_rules('edit_nomor', 'edit_nomor ', 'required');
        $this->form_validation->set_rules('edit_kode_species', 'edit_kode_species ', 'required');


    

        
        if ( $this->form_validation->run()  ) {
            
            //Insert to Database 
             $saved = $this->Model_trip_hl->update_observerform_pemindahan_detail($this->input->post());

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully adding Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "Update not working ! ";
            }

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);


	}


	public function delete_observerform_pemindahan_detail(){


        $saved = $this->Model_trip_hl->delete_observerform_pemindahan_detail($_POST['id_trip'] , $_POST['seq'] , $_POST['nomor']);

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully disable Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "disable not working ! ";
            }
        
        $validator['success'] = $success;
        $validator['messages'] = $messages;

        echo json_encode($validator);


	}


	/* form 8 */




	/* Form 9 */

	public function form9_update($kode_trip){


		$kode_trip;

		$data['kode_trip'] = $kode_trip ; 

		$data['detail'] = $this->Model_master->general_select("hl_observerform_laporan", array('id_trip' => $kode_trip), "", "")->row_array(); 

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();

		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip_hl->update_form9($this->input->post());

				redirect('trip_hl/trip_detail/'.$kode_trip);


	          }else{

	    
	          	$this->template->load('administrator/template','administrator/trip-hl/form9/update', $data);

	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip-hl/form9/update', $data);
	

		}


	}	


	/* Form 9 */


	public function extract_data_test(){


		$this->load->library('excel');

	//observerform_trip

		$objWorkSheet = $this->excel->createSheet(0); 

    	$objWorkSheet->setCellValue('A1', 'namafile') ; 
	
	
			$filename='Data_Extract_HL.xls'; //save our workbook as this file name
		 
				header('Content-Type: application/vnd.ms-excel'); //mime type
		 
				header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		 
				header('Cache-Control: max-age=0'); //no cache
							
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 
				//force user to download the Excel file without writing it to server's HD
		ob_end_clean();

		$objWriter->save('php://output');

	}



public function extract_data(){

	$this->load->library('excel');

	//observerform_trip
	
		$objWorkSheet = $this->excel->createSheet(0); 

    	  $objWorkSheet->setCellValue('A1', 'namafile') ; 
		  $objWorkSheet->setCellValue('B1', 'id_vessel') ;
		  $objWorkSheet->setCellValue('C1', 'id_supplier') ;
		  $objWorkSheet->setCellValue('D1', 'call_sign') ;
		  $objWorkSheet->setCellValue('E1', 'wcpfc') ; 
		  $objWorkSheet->setCellValue('F1', 'iotc') ; 
		  $objWorkSheet->setCellValue('G1', 'csbt') ; 
		  $objWorkSheet->setCellValue('H1', 'nama_nahkoda') ; 
		  $objWorkSheet->setCellValue('I1', 'nama_fishing_master') ; 
		  $objWorkSheet->setCellValue('J1', 'pelabuhan_keberangkatan') ; 
		  $objWorkSheet->setCellValue('K1', 'pelabuhan_kedatangan') ; 
		  $objWorkSheet->setCellValue('L1', 'tanggal_keberangkatan') ; 
		  $objWorkSheet->setCellValue('M1', 'tanggal_kedatangan') ; 
		  $objWorkSheet->setCellValue('N1', 'jumlah_wni') ; 
		  $objWorkSheet->setCellValue('O1', 'jumlah_wna') ; 
		  $objWorkSheet->setCellValue('P1', 'vms') ;
		  $objWorkSheet->setCellValue('Q1', 'kondisi_vms') ; 
		  $objWorkSheet->setCellValue('R1', 'vts') ; 
		  $objWorkSheet->setCellValue('S1', 'kondisi_vts') ; 
		  $objWorkSheet->setCellValue('T1', 'penanganan_diatas_kapal') ; 
		  $objWorkSheet->setCellValue('U1', 'cara_penanganan_pasca_panen') ; 
		  $objWorkSheet->setCellValue('V1', 'foto_kapal') ; 
		  $objWorkSheet->setCellValue('W1', 'upload_foto') ; 
		  $objWorkSheet->setCellValue('X1', 'id_user') ;
		  $objWorkSheet->setCellValue('Y1', 'tanggal') ; 
		  $objWorkSheet->setCellValue('Z1', 'nama_kapal') ; 
		  $objWorkSheet->setCellValue('AA1', 'tanda_selar') ; 
		  $objWorkSheet->setCellValue('AB1', 'no_sipi') ; 
		  $objWorkSheet->setCellValue('AC1', 'no_siup') ; 
		  $objWorkSheet->setCellValue('AD1', 'rfmo') ; 
		  $objWorkSheet->setCellValue('AE1', 'tahun_pembuatan_kapal') ; 
		  $objWorkSheet->setCellValue('AF1', 'bendera') ; 
		  $objWorkSheet->setCellValue('AG1', 'bahan') ; 
		  $objWorkSheet->setCellValue('AH1', 'gt') ;
		  $objWorkSheet->setCellValue('AI1', 'hp') ; 
		  $objWorkSheet->setCellValue('AJ1', 'panjang_kapal') ; 
		  $objWorkSheet->setCellValue('AK1', 'lebar_kapal') ; 
		  $objWorkSheet->setCellValue('AL1', 'changed_by') ;
		  $objWorkSheet->setCellValue('AM1', 'changed_date') ;
		  $objWorkSheet->setCellValue('AN1', 'nama_pemantau') ; 
		  $objWorkSheet->setCellValue('AO1', 'id_pemantau') ;
		  $objWorkSheet->setCellValue('AP1', 'tanggal_pemantau') ; 
		  $objWorkSheet->setCellValue('AQ1', 'rfmo_choice') ;
		  $objWorkSheet->setCellValue('AR1', 'upload_foto_img') ;
		  $objWorkSheet->setCellValue('AS1', 'status_trip') ;
		  $objWorkSheet->setCellValue('AT1', 'tipe_data') ;
		  
		

		$result = $this->Model_trip_hl->tripExtract()->result_array();

		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("1-Trip Info");








		#1-abcde
		#hl_observerform_detail_pancing
		$objWorkSheet = $this->excel->createSheet(2); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 

		$objWorkSheet->setCellValue('B1', 'ukuran_mata_pancing_tuna') ; 

		$objWorkSheet->setCellValue('C1', 'ukuran_mata_pancing_umpan') ; 

		$objWorkSheet->setCellValue('D1', 'jenis_mata_pancing') ; 

		$objWorkSheet->setCellValue('E1', 'tali_baja') ; 

		$objWorkSheet->setCellValue('F1', 'pengolahan_limbah') ; 

		$objWorkSheet->setCellValue('G1', 'alat_tangkap') ; 

		$objWorkSheet->setCellValue('H1', 'gambar_mata_pancing') ;
		
		$result = $this->db->query("select d.id_trip ,ukuran_mata_pancing_tuna , ukuran_mata_pancing_umpan ,jenis_mata_pancing , tali_baja , pengolahan_limbah , alat_tangkap , gambar_mata_pancing 
			from observerform_trip t, hl_observerform_detail_pancing d  where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip ")->result_array();
		
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("1a-detail_pancing");














			#hl_observerform_alat_bantu
		$objWorkSheet = $this->excel->createSheet(3); 

		$objWorkSheet->setCellValue('A1', 'Trip ID'); 
		$objWorkSheet->setCellValue('B1', 'sonar') ; 
		$objWorkSheet->setCellValue('C1', 'sonar_kondisi') ;  
		$objWorkSheet->setCellValue('D1', 'fishfinder') ; 
		$objWorkSheet->setCellValue('E1', 'fishfinder_kondisi') ;  
		$objWorkSheet->setCellValue('F1', 'radio') ; 
		$objWorkSheet->setCellValue('G1', 'radio_kondisi') ;  
		$objWorkSheet->setCellValue('H1', 'gps') ; 
		$objWorkSheet->setCellValue('I1', 'gps_kondisi') ;  
		$objWorkSheet->setCellValue('J1', 'telepon_satelite') ;  
		$objWorkSheet->setCellValue('K1', 'telepon_satelite_kondisi') ;  
		$objWorkSheet->setCellValue('L1', 'batu_pemberat') ; 
		$objWorkSheet->setCellValue('M1', 'batu_pemberat_kondisi') ; 
		
		$result = $this->db->query("SELECT d.id_trip, sonar, sonar_kondisi, fishfinder, fishfinder_kondisi, 
		       radio, radio_kondisi, gps, gps_kondisi, telepon_satelite, telepon_satelite_kondisi, 
		       batu_pemberat, batu_pemberat_kondisi
		  from observerform_trip t, hl_observerform_alat_bantu d where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
		
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("1b-detail_alat_bantu");
















			#hl_observerform_detail_palka
		$objWorkSheet = $this->excel->createSheet(4); 
		$objWorkSheet->setCellValue('A1', 'Trip ID'); 
		$objWorkSheet->setCellValue('B1', 'palka_no') ;  
		$objWorkSheet->setCellValue('C1','palka_detail') ; 
		
		$result = $this->db->query("SELECT d.id_trip, palka_no, palka_detail
  		from observerform_trip t,  hl_observerform_detail_palka  d where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
		
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("1c-detail_palka");











			#hl_observerform_alat_keselamatan
		$objWorkSheet = $this->excel->createSheet(5); 
		$objWorkSheet->setCellValue('A1', 'Trip ID'); 
		$objWorkSheet->setCellValue('B1', 'jaket_keselamatan'); 
		$objWorkSheet->setCellValue('C1', 'jumlah_ring'); 
		$objWorkSheet->setCellValue('D1', 'rakit_jumlah'); 
		$objWorkSheet->setCellValue('E1', 'rakit_kapasitas'); 
       	$objWorkSheet->setCellValue('F1', 'rakit_kondisi');  
       	$objWorkSheet->setCellValue('G1', 'p3k'); 
       	$objWorkSheet->setCellValue('H1', 'palka_detail'); 
		
		$result = $this->db->query("SELECT d.id_trip, jaket_keselamatan, jumlah_ring, rakit_jumlah, rakit_kapasitas, 
       		rakit_kondisi, p3k, palka_detail
  			from observerform_trip t,  hl_observerform_alat_keselamatan  d where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
		
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("1d-alat_keselamatan");











			#hl_observerform_informasi_lain
		$objWorkSheet = $this->excel->createSheet(6); 
		$objWorkSheet->setCellValue('A1', 'Trip ID'); 
		$objWorkSheet->setCellValue('B1', 'solar');  
		$objWorkSheet->setCellValue('C1', 'bensin');  
		$objWorkSheet->setCellValue('D1', 'es');  
		$objWorkSheet->setCellValue('E1', 'biaya'); 
		
		$result = $this->db->query("SELECT d.id_trip, solar, bensin, es, biaya
 			 from observerform_trip t,  hl_observerform_informasi_lain d where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
		
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("1e-informasi_lain");














			#2
			#hl_observerform_catatan_harian
		
   		$objWorkSheet = $this->excel->createSheet(7); 
		$objWorkSheet->setCellValue('A1', 'Trip ID'); 
		$objWorkSheet->setCellValue('B1', 'seq');  
		$objWorkSheet->setCellValue('C1', 'tanggal');  
		$objWorkSheet->setCellValue('D1', 'waktu'); 
		$objWorkSheet->setCellValue('E1', 'lintang'); 
		$objWorkSheet->setCellValue('F1', 'u_s'); 
		$objWorkSheet->setCellValue('G1', 'bujur'); 
		$objWorkSheet->setCellValue('H1', 'kode_aktivitas'); 
		
		$result = $this->db->query("SELECT d.id_trip, seq, d.tanggal, waktu, lintang, u_s, bujur, kode_aktivitas
   			from observerform_trip t,   hl_observerform_catatan_harian d where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
		
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("2-catatan_harian");












			#3
			#hl_observerform_tangkapan
		 $objWorkSheet = $this->excel->createSheet(8); 
		 $objWorkSheet->setCellValue('A1', 'id_trip');  
		 $objWorkSheet->setCellValue('B1', 'seq'); 
		 $objWorkSheet->setCellValue('C1', 'd.id_pemantau');  
		 $objWorkSheet->setCellValue('D1', 'd.nama_pemantau'); 
		 $objWorkSheet->setCellValue('E1', 'hari'); 
		 $objWorkSheet->setCellValue('F1', 'bulan'); 
		 $objWorkSheet->setCellValue('G1', 'tahun'); 
       	 $objWorkSheet->setCellValue('H1', 'set_nomor');  
       	 $objWorkSheet->setCellValue('I1', 'jam_mulai'); 
       	 $objWorkSheet->setCellValue('J1', 'menit_mulai');  
       	 $objWorkSheet->setCellValue('K1', 'jam_selesai');  
       	 $objWorkSheet->setCellValue('L1', 'menit_selesai');  
       	 $objWorkSheet->setCellValue('M1', 'jumlah_pemancing');  
         $objWorkSheet->setCellValue('N1', 'alat_pengukur');  
         $objWorkSheet->setCellValue('O1', 'lintang'); 
         $objWorkSheet->setCellValue('P1', 'u_s');  
         $objWorkSheet->setCellValue('Q1', 'bujur');  
         $objWorkSheet->setCellValue('R1', 't_b');  
         $objWorkSheet->setCellValue('S1', 'fad');  
         $objWorkSheet->setCellValue('T1', 'jenis_fad');  
         $objWorkSheet->setCellValue('U1', 'jenis_fad2');  
         $objWorkSheet->setCellValue('V1', 'ikan_terasosiasi');  
         $objWorkSheet->setCellValue('W1', 'lokasi_pemancingan');  
         $objWorkSheet->setCellValue('X1', 'foto_fad');  
         $objWorkSheet->setCellValue('Y1', 'no_foto_fad');  
         $objWorkSheet->setCellValue('Z1', 'd.tanggal'); 

		$result = $this->db->query("SELECT d.id_trip, seq, d.id_pemantau, d.nama_pemantau, hari, bulan, tahun, 
       set_nomor, jam_mulai, menit_mulai, jam_selesai, menit_selesai, 
       jumlah_pemancing, alat_pengukur, lintang, u_s, bujur, t_b, fad, 
       jenis_fad, jenis_fad2, ikan_terasosiasi, lokasi_pemancingan, 
       foto_fad, no_foto_fad, d.tanggal
  from observerform_trip t,  hl_observerform_tangkapan d where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("3-tangkapan");
















			#hl_observerform_tangkapan_detail
		 $objWorkSheet = $this->excel->createSheet(9); 
		 $objWorkSheet->setCellValue('A1', 'id_trip');  
		 $objWorkSheet->setCellValue('B1', 'seq_tangkapan'); 
		 $objWorkSheet->setCellValue('C1', 'd.nomor');  
		 $objWorkSheet->setCellValue('D1', 'd.kode_species'); 
		 $objWorkSheet->setCellValue('E1', 'panjang'); 
		 $objWorkSheet->setCellValue('F1', 'berat'); 
		 $objWorkSheet->setCellValue('G1', 'alat_tangkap'); 

		$result = $this->db->query("select d.id_trip,seq_tangkapan,nomor ,kode_species ,panjang ,berat ,alat_tangkap
from observerform_trip t, hl_observerform_tangkapan_detail d  where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
		$objWorkSheet->fromArray($result, null, 'A2');

			$objWorkSheet->setTitle("3-tangkapan_detail");

			#hl_observerform_tangkapan_hasil
			$objWorkSheet = $this->excel->createSheet(10);

			 	  $objWorkSheet->setCellValue('A1', 'id_trip'); 
				  $objWorkSheet->setCellValue('B1', 'seq_tangkapan');
				  $objWorkSheet->setCellValue('C1', 'nomor'); 
				  $objWorkSheet->setCellValue('D1', 'kode_species'); 
				  $objWorkSheet->setCellValue('E1', 'pakura1_jum'); 
				  $objWorkSheet->setCellValue('F1', 'pakura1_ber');
				  $objWorkSheet->setCellValue('G1', 'pakura2_jum');
				  $objWorkSheet->setCellValue('H1', 'pakura2_ber');
				  $objWorkSheet->setCellValue('I1', 'pakura3_jum');
				  $objWorkSheet->setCellValue('J1', 'pakura3_ber');
				  $objWorkSheet->setCellValue('K1', 'pakura4_jum');
				  $objWorkSheet->setCellValue('L1', 'pakura4_ber');
				  $objWorkSheet->setCellValue('M1', 'pakura5_jum');
				  $objWorkSheet->setCellValue('N1', 'pakura5_ber');
				  $objWorkSheet->setCellValue('O1', 'pakura6_jum');
				  $objWorkSheet->setCellValue('P1', 'pakura6_ber');
				  $objWorkSheet->setCellValue('Q1', 'kapal_jum');
				  $objWorkSheet->setCellValue('R1', 'kapal_ber');

			 $result = $this->db->query("select d.id_trip ,
					  seq_tangkapan,
					  nomor ,
					  kode_species ,
					  pakura1_jum ,
					  pakura1_ber,
					  pakura2_jum,
					  pakura2_ber,
					  pakura3_jum,
					  pakura3_ber,
					  pakura4_jum,
					  pakura4_ber,
					  pakura5_jum,
					  pakura5_ber,
					  pakura6_jum,
					  pakura6_ber,
					  kapal_jum,
					  kapal_ber
					  from observerform_trip t, hl_observerform_tangkapan_hasil d  where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
			  $objWorkSheet->fromArray($result, null, 'A2'); 


			$objWorkSheet->setTitle("3-tangkapan_hasil");














			#hl_observerform_tangkapan_hasil_pakura
			$objWorkSheet = $this->excel->createSheet(11); 


			  $objWorkSheet->setCellValue('A1', 'id_trip');
			  $objWorkSheet->setCellValue('B1', 'seq_tangkapan');
			  $objWorkSheet->setCellValue('C1', 'pakura1_mulai');
			  $objWorkSheet->setCellValue('D1', 'pakura1_selesai');
			  $objWorkSheet->setCellValue('E1', 'pakura1_mata_pancing');
			  $objWorkSheet->setCellValue('F1', 'pakura2_mulai');
			  $objWorkSheet->setCellValue('G1', 'pakura2_selesai');
			  $objWorkSheet->setCellValue('H1', 'pakura2_mata_pancing');
			  $objWorkSheet->setCellValue('I1', 'pakura3_mulai');
			  $objWorkSheet->setCellValue('J1', 'pakura3_selesai');
			  $objWorkSheet->setCellValue('K1', 'pakura3_mata_pancing');
			  $objWorkSheet->setCellValue('L1', 'pakura4_mulai');
			  $objWorkSheet->setCellValue('M1', 'pakura4_selesai');
			  $objWorkSheet->setCellValue('N1', 'pakura4_mata_pancing');
			  $objWorkSheet->setCellValue('O1', 'pakura5_mulai');
			  $objWorkSheet->setCellValue('P1', 'pakura5_selesai');
			  $objWorkSheet->setCellValue('Q1', 'pakura5_mata_pancing');
			  $objWorkSheet->setCellValue('R1', 'pakura6_mulai');
			  $objWorkSheet->setCellValue('S1', 'pakura6_selesai');
			  $objWorkSheet->setCellValue('T1', 'pakura6_mata_pancing');
			  $objWorkSheet->setCellValue('U1', 'kapal_mulai');
			  $objWorkSheet->setCellValue('V1', 'kapal_selesai');
			  $objWorkSheet->setCellValue('W1', 'kapal_mata_pancing');
			  $objWorkSheet->setCellValue('X1', 'ikan_bertanda_tag');
			  $objWorkSheet->setCellValue('Y1', 'kode_species');
			  $objWorkSheet->setCellValue('Z1', 'kelamin');
			  $objWorkSheet->setCellValue('AA1', 'panjang');
			  $objWorkSheet->setCellValue('AB1', 'berat');

				 $result = $this->db->query("select 
			  d.id_trip ,
			  seq_tangkapan,
			  pakura1_mulai,
			  pakura1_selesai,
			  pakura1_mata_pancing ,
			  pakura2_mulai ,
			  pakura2_selesai ,
			  pakura2_mata_pancing ,
			  pakura3_mulai ,
			  pakura3_selesai ,
			  pakura3_mata_pancing ,
			  pakura4_mulai ,
			  pakura4_selesai ,
			  pakura4_mata_pancing ,
			  pakura5_mulai ,
			  pakura5_selesai ,
			  pakura5_mata_pancing ,
			  pakura6_mulai ,
			  pakura6_selesai ,
			  pakura6_mata_pancing ,
			  kapal_mulai ,
			  kapal_selesai ,
			  kapal_mata_pancing ,
			  ikan_bertanda_tag ,
			  kode_species ,
			  kelamin ,
			  panjang ,
			  berat 
			  from observerform_trip t, hl_observerform_tangkapan_hasil_pakura d  where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
			  $objWorkSheet->fromArray($result, null, 'A2'); 



			$objWorkSheet->setTitle("3-tangkapan_hasil_pakura");

		









			#4
			#hl_observerform_umpan
			$objWorkSheet = $this->excel->createSheet(12); 

			 	  $objWorkSheet->setCellValue('A1', 'id_trip ');
				  $objWorkSheet->setCellValue('B1', 'seq ');
				  $objWorkSheet->setCellValue('C1', 'no_tangkapan ');
				  $objWorkSheet->setCellValue('D1', 'hari ');
				  $objWorkSheet->setCellValue('E1', 'bulan ');
				  $objWorkSheet->setCellValue('F1', 'tahun ');
				  $objWorkSheet->setCellValue('G1', 'jam_mulai ');
				  $objWorkSheet->setCellValue('H1', 'menit_mulai ');
				  $objWorkSheet->setCellValue('I1', 'jam_selesai ');
				  $objWorkSheet->setCellValue('J1', 'menit_selesai ');
				  $objWorkSheet->setCellValue('K1', 'latitude ');
				  $objWorkSheet->setCellValue('L1', 'longitude ');
				  $objWorkSheet->setCellValue('M1', 'alat_tangkap_umpan ');
				  $objWorkSheet->setCellValue('N1', 'jum_alat_tangkap ');
				  $objWorkSheet->setCellValue('O1', 'tanggal ');

			  $result = $this->db->query("select 
			  d.id_trip ,
			  seq ,
			  no_tangkapan ,
			  hari ,
			  bulan ,
			  tahun ,
			  jam_mulai ,
			  menit_mulai ,
			  jam_selesai ,
			  menit_selesai ,
			  latitude ,
			  longitude ,
			  alat_tangkap_umpan ,
			  jum_alat_tangkap ,
			  d.tanggal 
			  from observerform_trip t, hl_observerform_umpan d  where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
			  $objWorkSheet->fromArray($result, null, 'A2'); 


			$objWorkSheet->setTitle("4-observerform_umpan");














			#hl_observerform_umpan_detail_jumlah
			$objWorkSheet = $this->excel->createSheet(13); 

			 $objWorkSheet->setCellValue('A1', 'id_trip ');
			 $objWorkSheet->setCellValue('B1', 'seq_umpan ');
			 $objWorkSheet->setCellValue('C1', 'nomor ');
			 $objWorkSheet->setCellValue('D1', 'kode_species ');
			 $objWorkSheet->setCellValue('E1', 'jumlah  ');
			 $objWorkSheet->setCellValue('F1', 'berat ');

			$result = $this->db->query("select 
			  d.id_trip ,
			  seq_umpan,
			  nomor,
			  kode_species,
			  jumlah ,
			  berat
			  from observerform_trip t, hl_observerform_umpan_detail_jumlah d  where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
			  $objWorkSheet->fromArray($result, null, 'A2'); 



			$objWorkSheet->setTitle("4-umpan_detail_jumlah");












			#hl_observerform_umpan_detail_panjang
			$objWorkSheet = $this->excel->createSheet(14); 

			$objWorkSheet->setCellValue('A1', 'id_trip ');
			 $objWorkSheet->setCellValue('B1', 'seq_umpan ');
			 $objWorkSheet->setCellValue('C1', 'nomor ');
			 $objWorkSheet->setCellValue('D1', 'kode_species ');
			 $objWorkSheet->setCellValue('E1', 'panjang  ');
			 $objWorkSheet->setCellValue('F1', 'berat ');

			$result = $this->db->query("select 
			  d.id_trip ,
			  seq_umpan,
			  nomor,
			  kode_species,
			  panjang ,
			  berat
			  from observerform_trip t, hl_observerform_umpan_detail_panjang d  where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
			  $objWorkSheet->fromArray($result, null, 'A2'); 


			$objWorkSheet->setTitle("4-umpan_detail_panjang");

			














			#5
			#hl_observerform_umpan_terpakai
			$objWorkSheet = $this->excel->createSheet(15); 

			  $objWorkSheet->setCellValue('A1', 'id_trip ');
			  $objWorkSheet->setCellValue('B1', 'seq ');
			  $objWorkSheet->setCellValue('C1', 'id_pemantau ');
			  $objWorkSheet->setCellValue('D1', 'nama_pemantau ');
			  $objWorkSheet->setCellValue('E1', 'set_nomor '); 

			 $result = $this->db->query("select 
			  d.id_trip ,
			  seq,
			  d.id_pemantau ,
			  d.nama_pemantau ,
			  set_nomor 
			  from observerform_trip t, hl_observerform_umpan_terpakai d  where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
						  $objWorkSheet->fromArray($result, null, 'A2'); 



			$objWorkSheet->setTitle("5-observerform_umpan_terpakai");

			













			#hl_observerform_umpan_terpakai_detail
			$objWorkSheet = $this->excel->createSheet(16); 

			  $objWorkSheet->setCellValue('A1', 'id_trip ');
			  $objWorkSheet->setCellValue('B1', 'seq_umpan ');
			  $objWorkSheet->setCellValue('C1', 'nomor ');
			  $objWorkSheet->setCellValue('D1', 'kode_species ');
			  $objWorkSheet->setCellValue('E1', 'pakura1_jum  ');
			  $objWorkSheet->setCellValue('F1', 'pakura1_ber  ');
			  $objWorkSheet->setCellValue('G1', 'pakura2_jum  ');
			  $objWorkSheet->setCellValue('H1', 'pakura2_ber  ');
			  $objWorkSheet->setCellValue('I1', 'pakura3_jum  ');
			  $objWorkSheet->setCellValue('J1', 'pakura3_ber  ');
			  $objWorkSheet->setCellValue('K1', 'pakura4_jum  ');
			  $objWorkSheet->setCellValue('L1', 'pakura4_ber  ');
			  $objWorkSheet->setCellValue('M1', 'pakura5_jum  ');
			  $objWorkSheet->setCellValue('N1', 'pakura5_ber  ');
			  $objWorkSheet->setCellValue('O1', 'pakura6_jum  ');
			  $objWorkSheet->setCellValue('P1', 'pakura6_ber  ');
			  $objWorkSheet->setCellValue('Q1', 'kapal_jum  ');
			  $objWorkSheet->setCellValue('R1', 'kapal_ber  ');

			  $result = $this->db->query("select 
			  d.id_trip ,
			 seq_umpan,
			  nomor,
			  kode_species,
			  pakura1_jum ,
			  pakura1_ber ,
			  pakura2_jum ,
			  pakura2_ber ,
			  pakura3_jum ,
			  pakura3_ber ,
			  pakura4_jum ,
			  pakura4_ber ,
			  pakura5_jum ,
			  pakura5_ber ,
			  pakura6_jum ,
			  pakura6_ber ,
			  kapal_jum ,
			  kapal_ber 
			  from observerform_trip t, hl_observerform_umpan_terpakai_detail d  where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
						  $objWorkSheet->fromArray($result, null, 'A2'); 



			$objWorkSheet->setTitle("5-umpan_terpakai_detail");

			













			#hl_observerform_umpan_terpakai_pemikat
			$objWorkSheet = $this->excel->createSheet(17); 

			  $objWorkSheet->setCellValue('A1', 'id_trip');
			  $objWorkSheet->setCellValue('B1', 'seq_umpan');
			  $objWorkSheet->setCellValue('C1', 'pakura1_pemikat');
			  $objWorkSheet->setCellValue('D1', 'pakura2_pemikat');
			  $objWorkSheet->setCellValue('E1', 'pakura3_pemikat');
			  $objWorkSheet->setCellValue('F1', 'pakura4_pemikat');
			  $objWorkSheet->setCellValue('G1', 'pakura5_pemikat');
			  $objWorkSheet->setCellValue('H1', 'pakura6_pemikat');
			  $objWorkSheet->setCellValue('I1', 'kapal_pemikat');

			  $result = $this->db->query("select 
			  d.id_trip ,
			  seq_umpan ,
			  pakura1_pemikat,
			  pakura2_pemikat,
			  pakura3_pemikat,
			  pakura4_pemikat,
			  pakura5_pemikat,
			  pakura6_pemikat,
			  kapal_pemikat
			  from observerform_trip t, hl_observerform_umpan_terpakai_pemikat d  where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
						  $objWorkSheet->fromArray($result, null, 'A2'); 


			$objWorkSheet->setTitle("5-umpan_terpakai_pemikat");

			
















			#6
			#hl_observerform_etp
			$objWorkSheet = $this->excel->createSheet(18); 

			  $objWorkSheet->setCellValue('A1', 'd.id_trip');
			  $objWorkSheet->setCellValue('B1', 'seq');
			  $objWorkSheet->setCellValue('C1', 'id_pemantau');
			  $objWorkSheet->setCellValue('D1', 'nama_pemantau');
			  $objWorkSheet->setCellValue('E1', 'aktivitas_memancing');
			  $objWorkSheet->setCellValue('F1', 'tanggal');
			  $objWorkSheet->setCellValue('G1', 'waktu');
			  $objWorkSheet->setCellValue('H1', 'lintang');
			  $objWorkSheet->setCellValue('I1', 'ket_lintang');
			  $objWorkSheet->setCellValue('J1', 'bujur');
			  $objWorkSheet->setCellValue('K1', 'ket_bujur');
			  $objWorkSheet->setCellValue('L1', 'jenis_pancing');
			  $objWorkSheet->setCellValue('M1', 'kode_posisi_pancing');
			  $objWorkSheet->setCellValue('N1', 'kode_kondisi_tertangkap');
			  $objWorkSheet->setCellValue('O1', 'kode_kondisi_tertangkap_deskripsi');
			  $objWorkSheet->setCellValue('P1', 'kode_kondisi_dilepas');
			  $objWorkSheet->setCellValue('Q1', 'kode_kondisi_dilepas_deskripsi');
			  $objWorkSheet->setCellValue('R1', 'tanda');
			  $objWorkSheet->setCellValue('S1', 'kode_species');
			  $objWorkSheet->setCellValue('T1', 'organisasi');
			  $objWorkSheet->setCellValue('U1', 'nomor_foto');

			  $result = $this->db->query("select 
				  d.id_trip ,
				  seq ,
				  d.id_pemantau ,
				  d.nama_pemantau ,
				  aktivitas_memancing ,
				  d.tanggal ,
				  waktu ,
				  lintang ,
				  ket_lintang ,
				  bujur ,
				  ket_bujur ,
				  jenis_pancing ,
				  kode_posisi_pancing ,
				  kode_kondisi_tertangkap ,
				  kode_kondisi_tertangkap_deskripsi ,
				  kode_kondisi_dilepas ,
				  kode_kondisi_dilepas_deskripsi ,
				  tanda ,
				  kode_species ,
				  organisasi ,
				  nomor_foto 
				  from observerform_trip t, hl_observerform_etp d  where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
						  $objWorkSheet->fromArray($result, null, 'A2'); 


			$objWorkSheet->setTitle("6-observerform_etp");


			














			#hl_observerform_etp_detail
			$objWorkSheet = $this->excel->createSheet(19); 

			  $objWorkSheet->setCellValue('A1', 'd.id_trip');
			  $objWorkSheet->setCellValue('B1', 'seq_etp');
			  $objWorkSheet->setCellValue('C1', 'nomor');
			  $objWorkSheet->setCellValue('D1', 'data_penyu');
			  $objWorkSheet->setCellValue('E1', 'data_lain');
			  $objWorkSheet->setCellValue('F1', 'keterangan');

			 $result = $this->db->query("select 
			  d.id_trip ,
			  seq_etp,
			  nomor,
			  data_penyu,
			  data_lain,
			  keterangan
			  from observerform_trip t, hl_observerform_etp_detail d  where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
						  $objWorkSheet->fromArray($result, null, 'A2'); 


			$objWorkSheet->setTitle("6-etp_detail");

			













			#7
			#hl_observerform_fg_hilang
			$objWorkSheet = $this->excel->createSheet(20); 

			 $objWorkSheet->setCellValue('A1', 'id_trip ');
			 $objWorkSheet->setCellValue('B1', 'nomor ');
			 $objWorkSheet->setCellValue('C1', 'jenis_alat');
			 $objWorkSheet->setCellValue('D1', 'jumlah_alat');
			 $objWorkSheet->setCellValue('E1', 'satuan_alat');
			 $objWorkSheet->setCellValue('F1', 'lainnya');

			 $result = $this->db->query("select 
				  d.id_trip ,
				   nomor ,
				  jenis_alat,
				  jumlah_alat,
				  satuan_alat,
				  lainnya
				  from observerform_trip t, hl_observerform_fg_hilang d  where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
						  $objWorkSheet->fromArray($result, null, 'A2'); 

			$objWorkSheet->setTitle("7-observerform_fg_hilang");

			















			#8
			#hl_observerform_pemindahan
			$objWorkSheet = $this->excel->createSheet(21); 

			  $objWorkSheet->setCellValue('A1', 'id_trip');
			  $objWorkSheet->setCellValue('B1', 'seq');
			  $objWorkSheet->setCellValue('C1', 'nama_pemantau');
			  $objWorkSheet->setCellValue('D1', 'nama_kapal');
			  $objWorkSheet->setCellValue('E1', 'nama_nahkoda');
			  $objWorkSheet->setCellValue('F1', 'bendera');
			  $objWorkSheet->setCellValue('G1', 'sipi');
			  $objWorkSheet->setCellValue('H1', 'tanda_selar');
			  $objWorkSheet->setCellValue('I1', 'rfmo');
			  $objWorkSheet->setCellValue('J1', 'foto_lambung_kapal');
			  $objWorkSheet->setCellValue('K1', 'no_foto');
			  $objWorkSheet->setCellValue('L1', 'tanggal');
			  $objWorkSheet->setCellValue('M1', 'waktu');
			  $objWorkSheet->setCellValue('N1', 'nama_kapal2');
			  $objWorkSheet->setCellValue('O1', 'nama_nahkoda2');
			  $objWorkSheet->setCellValue('P1', 'bendera2');
			  $objWorkSheet->setCellValue('Q1', 'sipi2');
			  $objWorkSheet->setCellValue('R1', 'tanda_selar2');
			  $objWorkSheet->setCellValue('S1', 'rfmo2');
			  $objWorkSheet->setCellValue('T1', 'no_rfmo2');
			  $objWorkSheet->setCellValue('U1', 'foto_lambung_kapal2');
			  $objWorkSheet->setCellValue('V1', 'no_foto2');
			  $objWorkSheet->setCellValue('W1', 'lintang');
			  $objWorkSheet->setCellValue('X1', 'bujur');
			  $objWorkSheet->setCellValue('Y1', 'no_rfmo');

			$result = $this->db->query("select 
			  d.id_trip ,
			   seq ,
			  d.nama_pemantau,
			  d.nama_kapal,
			  d.nama_nahkoda,
			  d.bendera,
			  sipi,
			  d.tanda_selar,
			  d.rfmo,
			  foto_lambung_kapal,
			  no_foto,
			  d.tanggal,
			  waktu,
			  nama_kapal2,
			  nama_nahkoda2,
			  bendera2,
			  sipi2,
			  tanda_selar2,
			  rfmo2,
			  no_rfmo2,
			  foto_lambung_kapal2,
			  no_foto2,
			  lintang,
			  bujur,
			  no_rfmo
			  from observerform_trip t, hl_observerform_pemindahan d  where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
						  $objWorkSheet->fromArray($result, null, 'A2'); 


			$objWorkSheet->setTitle("8-observerform_pemindahan");

			















			#9
			#hl_observerform_laporan
			$objWorkSheet = $this->excel->createSheet(22); 

			 $objWorkSheet->setCellValue('A1', 'id_trip ');
			 $objWorkSheet->setCellValue('B1', 'nama_pemantau');
			 $objWorkSheet->setCellValue('C1', 'tgl_berangkat');
			 $objWorkSheet->setCellValue('D1', 'tgl_kedatangan');
			 $objWorkSheet->setCellValue('E1', 'kendala');
			 $objWorkSheet->setCellValue('F1', 'perubahan');
			 $objWorkSheet->setCellValue('G1', 'masukan');

			 $result = $this->db->query("select 
			  d.id_trip ,
			  d.nama_pemantau,
			  tgl_berangkat,
			  tgl_kedatangan,
			  kendala,
			  perubahan,
			  masukan
			  from observerform_trip t, hl_observerform_laporan d  where status_trip = '1' and t.tipe_data = 'HL' and t.id_trip = d.id_trip;")->result_array();
			$objWorkSheet->fromArray($result, null, 'A2'); 


			$objWorkSheet->setTitle("9-observerform_laporan");



















			$filename='Data_Extract_HL.xls'; //save our workbook as this file name
		 
				header('Content-Type: application/vnd.ms-excel'); //mime type
		 
				header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		 
				header('Cache-Control: max-age=0'); //no cache
							
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 
				//force user to download the Excel file without writing it to server's HD
		ob_end_clean();
		
		$objWriter->save('php://output');

}

}