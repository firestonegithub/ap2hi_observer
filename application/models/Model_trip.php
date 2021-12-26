<?php
class Model_trip extends CI_Model{
	

	function checkExsistingTrip($code){

		$query = $this->db->query("Select id_trip from observerform_trip where id_trip = '".$code."'  and status_trip = '1' ");

		
		return $query->num_rows();

		
	}

	function tripExtract(){


			$query = $this->db->query("

				SELECT t.id_trip, t.id_vessel, t.id_supplier, call_sign, wcpfc, iotc, csbt, 
			       nama_nahkoda, nama_fishing_master, pelabuhan_keberangkatan, pelabuhan_kedatangan, 
			       tanggal_keberangkatan, tanggal_kedatangan, jumlah_wni, jumlah_wna, 
			       v.vms, kondisi_vms, vts, kondisi_vts, penanganan_diatas_kapal, 
			       cara_penanganan_pasca_panen, foto_kapal, upload_foto, id_user, 
			       tanggal, v.nama_kapal, v.tanda_selar, v.no_sipi,  v.no_siup, v.rfmo, v.tahun_pembuatan_kapal, 
			       v.bendera, v.bahan, v.gt, t.hp, t.panjang_kapal, lebar_kapal, t.changed_by, 
			       t.changed_date, nama_pemantau, id_pemantau, tanggal_pemantau, t.rfmo_choice, 
			       upload_foto_img, 

				CASE
					    WHEN status_trip = '1' THEN 'Approved'
					    WHEN status_trip = '2' THEN 'Draft'
					    ELSE 'None'
					END AS status_trip
	
			        , tipe_data
			  FROM observerform_trip t , master_vessel v , master_supplier s where t.id_supplier = s.id_supplier and t.id_vessel = v.id_vessel
			  and tipe_data = 'PL'
			  order by id_trip 


				");


			return $query ; 

	}


	function check_species_exsist($table , $tipe ,  $data=array()){

		if($data){


			if($table == 'observerform_tangkapan_hasil_rev1' && $tipe =='add'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['id_trip']."' and  seq_tangkapan = '".$data['seq']."' and kode_species = '".$data['kode_species']."' ");

		
			$check =  $query->num_rows();

			}

			if($table == 'observerform_tangkapan_hasil_rev1' && $tipe =='update'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['edit_id_trip']."' and  seq_tangkapan = '".$data['edit_seq']."' and kode_species = '".$data['edit_kode_species']."' and nomor != '".$data['edit_nomor']."' ");

		
			$check =  $query->num_rows();

			}


			if($table == 'observerform_tangkapan_detail' && $tipe =='add'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['id_trip']."' and  seq_tangkapan = '".$data['seq']."' and kode_species = '".$data['kode_species']."' ");

		
			$check =  $query->num_rows();

			}


			if($table == 'observerform_tangkapan_detail' && $tipe =='update'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['edit_id_trip']."' and  seq_tangkapan = '".$data['edit_seq']."' and kode_species = '".$data['edit_kode_species2']."' and nomor != '".$data['edit_nomor2']."' ");

		
			$check =  $query->num_rows();

			}

			 
			if($table == 'observerform_umpan_detail' && $tipe =='add'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['id_trip']."' and  seq_umpan = '".$data['seq']."' and kode_species = '".$data['kode_species']."' ");

		
			$check =  $query->num_rows();

			}

			if($table == 'observerform_umpan_detail' && $tipe =='update'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['edit_id_trip']."' and  seq_umpan = '".$data['edit_seq']."' and kode_species = '".$data['edit_kode_species']."' and nomor != '".$data['edit_nomor']."' ");

		
			$check =  $query->num_rows();

			}


			if($check > 0){

				return false; 

			}else{

				return true;
				
			}
		}


		return false; 


	}

	function checkExsisting($table, $data, $column=""){

		$where_ = "";
        if (count($data)>0) {
            foreach ($data as $inputkey => $input_value) {
                $where_ .= " AND ".$inputkey." = '".$input_value."' ";
            }
        }
        $where_ = ($where_ != ""?"(".substr($where_, 4).")":"(1=1)");

        $select = "*";
        if ($column!="") {
            $select = $column;
        }

     

        $query = "
            SELECT ".$select." 
            FROM ".$table." 
            WHERE (1=1)
            AND ".$where_;


        return $this->db->query($query)->num_rows();

	}


	function createCodeTrip($POST){

		$supplierData = $this->Model_master->master_supplier_update($POST['id_supplier'])->row_array();

		$codeSupplier = $supplierData['kode_name'] ; 

		$tanggal_keberangkatan=strtotime($POST['tanggal_keberangkatan']); 

		$tanggal_keberangkatan=date("Ymd",$tanggal_keberangkatan);

		$tanggal_kedatangan=strtotime($POST['tanggal_kedatangan']); 

		$tanggal_kedatangan=date("Ymd",$tanggal_kedatangan);

		$id_vessel = $_POST['id_vessel']; 

		$code = $codeSupplier."_".$tanggal_keberangkatan."_".$tanggal_kedatangan."_".$id_vessel; 

		return $code; 
	}


	function add_trip_utama($data=array()){

		$ci = & get_instance();

		if($data){

			$code = $this->createCodeTrip($data);

			$id_user = $ci->session->userdata('id_user');

            $created_date = date('Y-m-d h:i:s');

			$tanggal_keberangkatan=strtotime($data['tanggal_keberangkatan']); 

			$tanggal_keberangkatan=date("Y-m-d",$tanggal_keberangkatan);

			$tanggal_kedatangan=strtotime($data['tanggal_kedatangan']); 

			$tanggal_kedatangan=date("Y-m-d",$tanggal_kedatangan);

			$tanggal_pemantau=strtotime($data['tanggal_pemantau']); 

			$tanggal_pemantau=date("Y-m-d",$tanggal_pemantau);


			$sql = "INSERT INTO observerform_trip(
		            id_trip, id_vessel, id_supplier, call_sign, wcpfc, iotc, csbt, 
		            nama_nahkoda, nama_fishing_master, pelabuhan_keberangkatan, pelabuhan_kedatangan, 
		            tanggal_keberangkatan, tanggal_kedatangan, jumlah_wni, jumlah_wna, 
		            vms, kondisi_vms, vts, kondisi_vts, penanganan_diatas_kapal, 
		            cara_penanganan_pasca_panen, foto_kapal, upload_foto, id_user, 
		            tanggal, nama_kapal, tanda_selar, no_sipi, no_siup, rfmo, tahun_pembuatan_kapal, 
		            bendera, bahan, gt, hp, panjang_kapal, lebar_kapal , rfmo_choice , nama_pemantau , id_pemantau , tanggal_pemantau , upload_foto_img , status_trip, tipe_data)
					    VALUES ('".$code."', '".$data['id_vessel']."', '".$data['id_supplier']."', '".$data['call_sign']."', '".$data['wcpfc']."', '".$data['iotc']."', '".$data['csbt']."', 
		            '".$data['nama_nahkoda']."', '".$data['nama_fishing_master']."', '".$data['pelabuhan_keberangkatan']."', '".$data['pelabuhan_kedatangan']."', 
		            '".$tanggal_keberangkatan."', '".$tanggal_kedatangan."', '".$data['jumlah_wni']."', '".$data['jumlah_wna']."', 
		            '".$data['vms']."', '".$data['kondisi_vms']."', '".$data['vts']."', '".$data['kondisi_vts']."', '".$data['penanganan_diatas_kapal']."', 
		            '".$data['cara_penanganan_pasca_panen']."', '".$data['foto_kapal']."', '".$data['upload_foto']."', '".$id_user."', 
		            '".$created_date."', '".$data['nama_kapal']."', '".$data['tanda_selar']."', '".$data['no_sipi']."', '".$data['no_siup']."', '".$data['rfmo']."', '".$data['tahun_pembuatan_kapal']."', 
		            '".$data['bendera']."', '".$data['bahan']."', '".$data['gt']."', '".$data['hp']."', '".$data['panjang_kapal']."', '".$data['lebar_kapal']."' , '".$data['rfmo_choice']."' , '".$data['nama_pemantau']."' , '".$data['id_pemantau']."' ,'".$tanggal_pemantau."' ,  '".$data['upload_foto_img']."' , '2' , 'PL');" ; 

			
			$result = $this->db->query($sql);



			return $code; 
		}


	}


	public function update_trip_utama($data=array()){

		$ci = & get_instance();

		if ($data)
        {

        	$id_user = $ci->session->userdata('id_user');

        	$changed_date = date('Y-m-d h:i:s');


        	

        	$add = "";

        	if($data['upload_foto_img'] != ''){


        		$add .= " , upload_foto_img = '".$data['upload_foto_img']."' ";
        	}

        	$tanggal_keberangkatan=strtotime($data['tanggal_keberangkatan']); 

			$tanggal_keberangkatan=date("Y-m-d",$tanggal_keberangkatan);

			$tanggal_kedatangan=strtotime($data['tanggal_kedatangan']); 

			$tanggal_kedatangan=date("Y-m-d",$tanggal_kedatangan);


        	$sql = "UPDATE observerform_trip
						   SET call_sign='".$data['call_sign']."',
						   tanggal_keberangkatan='".$tanggal_keberangkatan."' ,
						   tanggal_kedatangan='".$tanggal_kedatangan."',
						    wcpfc='".$data['wcpfc']."', 
						       iotc='".$data['iotc']."', csbt='".$data['csbt']."', nama_nahkoda='".$data['nama_nahkoda']."', nama_fishing_master='".$data['nama_fishing_master']."', pelabuhan_keberangkatan='".$data['pelabuhan_keberangkatan']."', 
						       pelabuhan_kedatangan='".$data['pelabuhan_kedatangan']."', 
						       jumlah_wni='".$data['jumlah_wni']."', jumlah_wna='".$data['jumlah_wna']."', vms='".$data['vms']."', kondisi_vms='".$data['kondisi_vms']."', vts='".$data['vts']."', kondisi_vts='".$data['kondisi_vts']."', 
						       penanganan_diatas_kapal='".$data['penanganan_diatas_kapal']."', cara_penanganan_pasca_panen='".$data['cara_penanganan_pasca_panen']."', foto_kapal='".$data['foto_kapal']."', 
						       upload_foto='".$data['upload_foto']."', tanda_selar='".$data['tanda_selar']."', 
						       no_sipi='".$data['no_sipi']."', no_siup='".$data['no_siup']."', rfmo='".$data['rfmo']."', tahun_pembuatan_kapal='".$data['tahun_pembuatan_kapal']."', bendera='".$data['bendera']."', 
						       bahan='".$data['bahan']."', gt='".$data['gt']."', hp='".$data['hp']."', panjang_kapal='".$data['panjang_kapal']."', lebar_kapal='".$data['lebar_kapal']."', changed_by='".$id_user."', 
						       changed_date='".$changed_date."' , nama_pemantau='".$data['nama_pemantau']."' , id_pemantau='".$data['id_pemantau']."' , tanggal_pemantau='".$data['tanggal_pemantau']."' , rfmo_choice='".$data['rfmo_choice']."' ".$add."
 					WHERE  id_trip = '".$data['kode_trip']."'"; 

			$this->db->query($sql);


			return TRUE;
        }

        return FALSE;


	}


	public function update_detail_pancing($data=array()){

		$kode_trip = $data['kode_trip'];

		$table = "observerform_detail_pancing"; 

		$where = array('id_trip' => $kode_trip); 

		
		if( $this->checkExsisting($table , $where , "") == 0 ){

				$sql = "INSERT INTO observerform_detail_pancing(
		            id_trip, ukuran_mata_pancing, jumlah_pemancing, jumlah_boiboi, 
		            jumlah__palka, kapasitas_palka_umpan, sistem_sirkulasi_air_palka_umpan)
					    VALUES (".$this->db->escape($data['kode_trip']).", ".$this->db->escape($data['ukuran_mata_pancing']).", ".$this->db->escape($data['jumlah_pemancing']).", ".$this->db->escape($data['jumlah_boiboi']).", 
					            ".$this->db->escape($data['jumlah__palka']).", ".$this->db->escape($data['kapasitas_palka_umpan'])." ,  ".$this->db->escape($data['sistem_sirkulasi_air_palka_umpan'])." ) " ; 

		}else{

				$sql = "UPDATE observerform_detail_pancing
						   SET ukuran_mata_pancing = ".$this->db->escape($data['ukuran_mata_pancing']).", jumlah_pemancing=".$this->db->escape($data['jumlah_pemancing']).", jumlah_boiboi=".$this->db->escape($data['jumlah_boiboi']).", 
						       jumlah__palka=".$this->db->escape($data['jumlah__palka']).", kapasitas_palka_umpan=".$this->db->escape($data['kapasitas_palka_umpan']).", sistem_sirkulasi_air_palka_umpan=".$this->db->escape($data['sistem_sirkulasi_air_palka_umpan'])."
						 WHERE id_trip = ".$this->db->escape($data['kode_trip'])." ;
						" ; 



		}

		$this->db->query($sql);


		return TRUE; 


	}


	public function update_detail_kelengkapan($data=array()){


		$kode_trip = $data['kode_trip'];

		$table = "observerform_detail_kelengkapan"; 

		$where = array('id_trip' => $kode_trip); 

		
		if( $this->checkExsisting($table , $where , "") == 0 ){

				$sql = "INSERT INTO observerform_detail_kelengkapan(
		            id_trip, sonar, fishfinder, radio, gps, telepon_satelite)
					    VALUES (".$this->db->escape($data['kode_trip']).", ".$this->db->escape($data['sonar']).", ".$this->db->escape($data['fishfinder']).", ".$this->db->escape($data['radio']).", 
					            ".$this->db->escape($data['gps']).", ".$this->db->escape($data['telepon_satelite'])." ) " ; 

		}else{

				$sql = "UPDATE observerform_detail_kelengkapan
						   SET sonar = ".$this->db->escape($data['sonar']).", fishfinder=".$this->db->escape($data['fishfinder']).", radio=".$this->db->escape($data['radio']).", 
						       gps=".$this->db->escape($data['gps']).", telepon_satelite=".$this->db->escape($data['telepon_satelite'])."
						 WHERE id_trip = ".$this->db->escape($data['kode_trip'])." ;
						" ; 



		}

		$this->db->query($sql);


		return TRUE; 


	}


	public function update_detail_palka($data=array()){

		$kode_trip = $data['kode_trip'];


		$sql = " DELETE FROM observerform_detail_palka WHERE id_trip = '".$kode_trip."'  " ; 

		$this->db->query($sql);

		$palka_no_1 = $data['palka_no_1']; 

		$palka_no_2 = $data['palka_no_2']; 

		$palka_no_3 = $data['palka_no_3']; 

		$palka_no_4 = $data['palka_no_4']; 
		
		$palka_no_5 = $data['palka_no_5']; 

		$palka_no_6 = $data['palka_no_6']; 

		$palkas = array( '1' =>  $palka_no_1 , '2' => $palka_no_2 , '3' =>$palka_no_3 , '4' => $palka_no_4 , '5' => $palka_no_5 , '6' => $palka_no_6 ) ;


			for($i=1; $i<=6; $i++ ){




					$sql = "INSERT INTO observerform_detail_palka(
						            id_trip, palka_no, palka_detail)
						    VALUES (".$this->db->escape($data['kode_trip']).", ".$this->db->escape($i).", ".$this->db->escape($palkas[$i])." )" ; 


					$this->db->query($sql);

			}

			return TRUE; 



	}


	public function update_detail_alat_umpan($data=array()){

		$kode_trip = $data['kode_trip'];

		$table = "observerform_detail_alat_umpan"; 

		$where = array('id_trip' => $kode_trip); 

		
		if( $this->checkExsisting($table , $where , "") == 0 ){

				$sql = "INSERT INTO observerform_detail_alat_umpan(
		            id_trip, lampu , boke_ami )
					    VALUES (".$this->db->escape($data['kode_trip']).", ".$this->db->escape($data['lampu']).", ".$this->db->escape($data['boke_ami']).") " ; 

		}else{

				$sql = "UPDATE observerform_detail_alat_umpan
						   SET lampu = ".$this->db->escape($data['lampu']).", boke_ami=".$this->db->escape($data['boke_ami'])."
						 WHERE id_trip = ".$this->db->escape($data['kode_trip'])." ;
						" ; 



		}

		$this->db->query($sql);


		return TRUE; 

	}

	public function update_detail_lain($data=array()){

		$kode_trip = $data['kode_trip'];

		$table = "observerform_detail_lain"; 

		$where = array('id_trip' => $kode_trip); 

		
		if( $this->checkExsisting($table , $where , "") == 0 ){

				$sql = "INSERT INTO observerform_detail_lain(
		            id_trip, solar , es , biaya_trip )
					    VALUES (".$this->db->escape($data['kode_trip']).",  ".$this->db->escape($data['solar']).", ".$this->db->escape($data['es']).", ".$this->db->escape($data['biaya_trip']).") " ; 

		}else{

				$sql = "UPDATE observerform_detail_lain
						   SET solar = ".$this->db->escape($data['solar']).", es=".$this->db->escape($data['es']).", biaya_trip=".$this->db->escape($data['biaya_trip'])."
						 WHERE id_trip = ".$this->db->escape($data['kode_trip'])." ;
						" ; 



		}

		$this->db->query($sql);


		return TRUE; 


	}


	public function add_kuantitas_tangkapan($data=array()){


		$sql = "
        	
            INSERT INTO observerform_detail_quantityfish(
            id_trip, kode_species, jumlah_ekor)
    				VALUES (".$this->db->escape($data['kode_trip'] ? : "").", ".$this->db->escape($data['kode_species'] ? : "")." , ".$this->db->escape($data['jumlah_ekor'] ? : "").")
    		";


			$this->db->query($sql);

			return TRUE; 
	}

	public function update_kuantitas_tangkapan($data=array()){

		$sql = "
        	
           UPDATE observerform_detail_quantityfish
					   SET jumlah_ekor= ".$this->db->escape($data['jumlah_ekor'])."
					 WHERE  id_trip =  ".$this->db->escape($data['kode_trip'])." and kode_species= ".$this->db->escape($data['kode_species'])."

					 ";


			$this->db->query($sql);

			return TRUE; 

	}

	public function disable_kuantitas_tangkapan($kode_trip , $kode_species){

		 return $this->db->query("DELETE from observerform_detail_quantityfish where id_trip ='$kode_trip' and kode_species = '$kode_species'");



	}


	public function form2_add($data=array()){

		$data['tanggal'] = strtotime($data['tanggal'] ); 

		$data['tanggal'] = date("Y-m-d",$data['tanggal']);

		$lintang = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

		$bujur = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];
			

		//$data['waktu'] = $data['jam'].':'.$data['menit'] ; 


			$sql = "

					INSERT INTO observerform_catatan_harian(
           			 id_trip, tanggal, waktu, lintang , bujur, kode_aktivitas)
				    VALUES (".$this->db->escape($data['kode_trip'] ? : "").", ".$this->db->escape($data['tanggal'] ? : "").", ".$this->db->escape($data['waktu'] ? : "").", ".$this->db->escape($lintang ? : "").", ".$this->db->escape($bujur ? : "").", ".$this->db->escape($data['kode_aktivitas'] ? : "").");
        	
          	";


			$this->db->query($sql);

		

			return TRUE; 

	}


	

	public function form2_update($data=array()){

		$data['tanggal'] = strtotime($data['tanggal'] ); 

		$data['tanggal'] = date("Y-m-d",$data['tanggal']);

		$lintang = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

		$bujur = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];

		//$data['waktu'] = $data['jam'].':'.$data['menit'] ; 


			$sql = "

			UPDATE observerform_catatan_harian
				   SET tanggal=".$this->db->escape($data['tanggal']).", waktu=".$this->db->escape($data['waktu']).", lintang=".$this->db->escape($lintang)." , bujur=".$this->db->escape($bujur).", 
				       kode_aktivitas=".$this->db->escape($data['kode_aktivitas'])."
				 WHERE id_trip=".$this->db->escape($data['kode_trip'])." and seq=".$this->db->escape($data['seq']).";

				   	";


			$this->db->query($sql);

		

			return TRUE; 

		}


	public function form2_delete($kode_trip , $id){


		 return $this->db->query("DELETE from observerform_catatan_harian where id_trip ='$kode_trip' and seq = '$id'");



	}


	public function form3_add($data=array()){

			$lintang = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

			$bujur = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];

			$fad2 = "";

			if(count($data['fad2']) > 0 ){

				foreach($data['fad2'] as $fad2_checkbox){

					$fad2 .= $fad2_checkbox.",";
				}

				$fad2 = substr($fad2, 0, -1);

			}

			

			$data['tanggal'] = strtotime($data['tanggal'] ); 

			$data['tanggal'] = date("Y-m-d",$data['tanggal']);

			$data['hari'] 	= date("d", strtotime( $data['tanggal']) ) ; 

			$data['bulan'] 	= date("m", strtotime( $data['tanggal']) ); 

			$data['tahun'] 	= date("Y", strtotime($data['tanggal'])) ; 

				$data['waktu_mulai'] = explode(":" , $data['waktu_mulai'] ); 

				$data['jam_mulai'] = $data['waktu_mulai'][0] ; 

				$data['menit_mulai'] = $data['waktu_mulai'][1] ;

				$data['waktu_selesai'] = explode(":" , $data['waktu_selesai'] ); 

				$data['jam_selesai'] = $data['waktu_selesai'][0] ; 

				$data['menit_selesai'] = $data['waktu_selesai'][1] ;


			$sql = "

			INSERT INTO observerform_tangkapan(
            id_trip,  id_pemantau, hari, bulan, tahun, set_nomor, jam_mulai, 
            menit_mulai, jam_selesai, menit_selesai, jumlah_pemancing, alat_pengukur, 
            lintang , bujur , fad, fad2 , ikan_terasosiasi, ikan_terlihat_dengan, 
            foto_fad , no_foto_fad , jum_keranjang_tangkapan , berat_keranjang_kosong , tanggal)
			    VALUES (".$this->db->escape($data['kode_trip']).", ".$this->db->escape($data['id_pemantau']).", ".$this->db->escape($data['hari']).", ".$this->db->escape($data['bulan']).", ".$this->db->escape($data['tahun']).", ".$this->db->escape($data['set_nomor']).", ".$this->db->escape($data['jam_mulai']).", 
			            ".$this->db->escape($data['menit_mulai']).", ".$this->db->escape($data['jam_selesai']).", ".$this->db->escape($data['menit_selesai']).", ".$this->db->escape($data['jumlah_pemancing']).", ".$this->db->escape($data['alat_pengukur']).", 
			            ".$this->db->escape($lintang).", ".$this->db->escape($bujur).", ".$this->db->escape($data['fad']).",  ".$this->db->escape($fad2).",".$this->db->escape($data['ikan_terasosiasi']).", ".$this->db->escape($data['ikan_terlihat_dengan']).", 
			            ".$this->db->escape($data['foto_fad'])." , ".$this->db->escape($data['no_foto_fad'])." , ".$this->db->escape( $this->removeComma( $data['jum_keranjang_tangkapan'] ) )." , ".$this->db->escape($data['berat_keranjang_kosong']).", ".$this->db->escape($data['tanggal'])." );

			  	";


			$this->db->query($sql);

			$getid_ = $this->db->insert_id() ; 


			return $getid_; 

	}

	public function form3_update($data=array()){

			$lintang = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

			$bujur = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];

			$fad2 = "";

			foreach($data['fad2'] as $fad2_checkbox){

				$fad2 .= $fad2_checkbox.",";
			}

			$fad2 = substr($fad2, 0, -1);

			$data['tanggal'] = strtotime($data['tanggal'] ); 

			$data['tanggal'] = date("Y-m-d",$data['tanggal']);

			$data['hari'] 	= date("d", strtotime( $data['tanggal']) ) ; 

			$data['bulan'] 	= date("m", strtotime( $data['tanggal']) ); 

			$data['tahun'] 	= date("Y", strtotime($data['tanggal'])) ; 



				$data['waktu_mulai'] = explode(":" , $data['waktu_mulai'] ); 

				$data['jam_mulai'] = $data['waktu_mulai'][0] ; 

				$data['menit_mulai'] = $data['waktu_mulai'][1] ;

				$data['waktu_selesai'] = explode(":" , $data['waktu_selesai'] ); 

				$data['jam_selesai'] = $data['waktu_selesai'][0] ; 

				$data['menit_selesai'] = $data['waktu_selesai'][1] ;

			
		$sql = "


		UPDATE observerform_tangkapan
				   SET id_pemantau=".$this->db->escape($data['id_pemantau']).", hari=".$this->db->escape($data['hari']).", bulan=".$this->db->escape($data['bulan']).", tahun=".$this->db->escape($data['tahun']).", set_nomor=".$this->db->escape($data['set_nomor']).", 
				       jam_mulai=".$this->db->escape($data['jam_mulai']).", menit_mulai=".$this->db->escape($data['menit_mulai']).", jam_selesai=".$this->db->escape($data['jam_selesai']).", menit_selesai=".$this->db->escape($data['menit_selesai']).", jumlah_pemancing=".$this->db->escape($data['jumlah_pemancing']).", 
				       alat_pengukur=".$this->db->escape($data['alat_pengukur']).", lintang=".$this->db->escape($lintang).",  bujur=".$this->db->escape($bujur).", fad=".$this->db->escape($data['fad']).", fad2=".$this->db->escape($fad2).", 
				       ikan_terasosiasi=".$this->db->escape($data['ikan_terasosiasi']).", ikan_terlihat_dengan= ".$this->db->escape($data['ikan_terlihat_dengan']).", foto_fad=".$this->db->escape($data['foto_fad'])." , no_foto_fad=".$this->db->escape($data['no_foto_fad'])."  , jum_keranjang_tangkapan=".$this->db->escape( $this->removeComma( $data['jum_keranjang_tangkapan'] ) )." , berat_keranjang_kosong=".$this->db->escape($data['berat_keranjang_kosong'])." , tanggal = ".$this->db->escape($data['tanggal'])."
				 WHERE id_trip=".$this->db->escape($data['kode_trip'])." and seq=".$this->db->escape($data['seq'])." ;



			  	";


			$this->db->query($sql);

		
		

			return TRUE; 



	}


	public function form3_delete($kode_trip , $id){


		 return $this->db->query("DELETE from observerform_tangkapan where id_trip ='$kode_trip' and seq = '$id'");



	}


	public function add_observerform_tangkapan_hasil($data=array()){

		if ($data)
        {

        	$no = $this->Model_master->select_max( "observerform_tangkapan_hasil_rev1" , array('id_trip' => $data['id_trip'] , 'seq_tangkapan' =>  $data['seq'] ) , "nomor" )->row_array();
        	$no = $no['max'] + 1; 


        		if( empty($data['total_enumerasi_jum']) ){ $data['total_enumerasi_jum'] = 0; }

        		if( empty($data['total_enumerasi_berat']) ){ $data['total_enumerasi_berat'] = 0; }

        		if( empty($data['keranj1_jum']) ){$data['keranj1_jum'] = 0; }

        		if( empty($data['keranj1_ber']) ){ $data['keranj1_ber'] = 0; }


        		if( empty($data['keranj2_jum']) ){ $data['keranj2_jum'] = 0; }

        		if( empty($data['keranj2_ber']) ){ $data['keranj2_ber'] = 0; }

        		if( empty($data['keranj3_jum']) ){ $data['keranj3_jum'] = 0; }

        		if( empty($data['keranj3_ber']) ){ $data['keranj3_ber'] = 0; }

        		if( empty($data['keranj4_jum']) ){ $data['keranj4_jum'] = 0; }

        		if( empty($data['keranj4_ber']) ){ $data['keranj4_ber'] = 0; }

        		if( empty($data['keranj5_jum']) ){ $data['keranj5_jum'] = 0; }

        		if( empty($data['keranj5_ber']) ){ $data['keranj5_ber'] = 0; }

        		if( empty($data['keranj6_jum']) ){ $data['keranj6_jum'] = 0; }

        		if( empty($data['keranj6_ber']) ){ $data['keranj6_ber'] = 0; }



        		if( $data['total_enumerasi_jum'] > 0 || $data['total_enumerasi_berat'] > 0 ){

        			$data['keranj1_jum'] = 0; 
        			$data['keranj1_ber'] = 0; 

        			$data['keranj2_jum'] = 0; 
        			$data['keranj2_ber'] = 0; 

        			$data['keranj3_jum'] = 0; 
        			$data['keranj3_ber'] = 0; 

        			$data['keranj4_jum'] = 0; 
        			$data['keranj4_ber'] = 0; 

        			$data['keranj5_jum'] = 0; 
        			$data['keranj5_ber'] = 0; 

        			$data['keranj6_jum'] = 0; 
        			$data['keranj6_ber'] = 0; 

        		}

        			$sql = "


        			INSERT INTO observerform_tangkapan_hasil_rev1(
					            id_trip, seq_tangkapan, nomor, kode_species, 
					            	total_enumerasi_jum, 
						            total_enumerasi_berat, 
						            keranj1_jum, 
						            keranj1_ber, 
						            keranj2_jum, 
						            keranj2_ber, 
						            keranj3_jum, 
						            keranj3_ber, 
						            keranj4_jum, 
						            keranj4_ber, 
						            keranj5_jum, 
						            keranj5_ber, 
						            keranj6_jum, 
						            keranj6_ber)
					    VALUES (".$this->db->escape($data['id_trip']).", ".$this->db->escape($data['seq']).", '".$no."', 
					    		".$this->db->escape($data['kode_species']).",
					    		".$this->db->escape($this->removeComma($data['total_enumerasi_jum']) ).", 
					            ".$this->db->escape($this->removeComma($data['total_enumerasi_berat'])).",

					            ".$this->db->escape($this->removeComma($data['keranj1_jum'])).", 
					            ".$this->db->escape($this->removeComma($data['keranj1_ber'])).",

					            ".$this->db->escape($this->removeComma($data['keranj2_jum'])).", 
					            ".$this->db->escape($this->removeComma($data['keranj2_ber'])).",

					            ".$this->db->escape($this->removeComma($data['keranj3_jum'])).", 
					            ".$this->db->escape($this->removeComma($data['keranj3_ber'])).",

					            ".$this->db->escape($this->removeComma($data['keranj4_jum'])).", 
					            ".$this->db->escape($this->removeComma($data['keranj4_ber'])).",

					            ".$this->db->escape($this->removeComma($data['keranj5_jum'])).", 
					            ".$this->db->escape($this->removeComma($data['keranj5_ber'])).",

					            ".$this->db->escape($this->removeComma($data['keranj6_jum'])).", 
					            ".$this->db->escape($this->removeComma($data['keranj6_ber']))."
					            )
		
			  	";


			$this->db->query($sql);

			return TRUE; 

        }

        return FALSE; 

	}



	public function update_observerform_tangkapan_hasil($data=array()){

		if ($data)
        {

        		if( empty($data['edit_total_enumerasi_jum']) ){ $data['edit_total_enumerasi_jum'] = 0; }
        		if( empty($data['edit_total_enumerasi_berat']) ){ $data['edit_total_enumerasi_berat'] = 0; }

        		if( empty($data['edit_keranj1_jum']) ){ $data['edit_keranj1_jum'] = 0; }
        		if( empty($data['edit_keranj1_ber']) ){ $data['edit_keranj1_ber'] = 0; }

        		if( empty($data['edit_keranj2_jum']) ){ $data['edit_keranj2_jum'] = 0; }
        		if( empty($data['edit_keranj2_ber']) ){ $data['edit_keranj2_ber'] = 0; }

        		if( empty($data['edit_keranj3_jum']) ){ $data['edit_keranj3_jum'] = 0; }
        		if( empty($data['edit_keranj3_ber']) ){ $data['edit_keranj3_ber'] = 0; }

        		if( empty($data['edit_keranj4_jum']) ){ $data['edit_keranj4_jum'] = 0; }
        		if( empty($data['edit_keranj4_ber']) ){ $data['edit_keranj4_ber'] = 0; }

        		if( empty($data['edit_keranj5_jum']) ){ $data['edit_keranj5_jum'] = 0; }
        		if( empty($data['edit_keranj5_ber']) ){ $data['edit_keranj5_ber'] = 0; }

        		if( empty($data['edit_keranj6_jum']) ){ $data['edit_keranj6_jum'] = 0; }
        		if( empty($data['edit_keranj6_ber']) ){ $data['edit_keranj6_ber'] = 0; }


        		if( $data['edit_total_enumerasi_jum'] > 0 || $data['edit_total_enumerasi_berat'] > 0 ){

        			$data['edit_keranj1_jum'] = 0; 
        			$data['edit_keranj1_ber'] = 0; 

        			$data['edit_keranj2_jum'] = 0; 
        			$data['edit_keranj2_ber'] = 0; 

        			$data['edit_keranj3_jum'] = 0; 
        			$data['edit_keranj3_ber'] = 0; 

        			$data['edit_keranj4_jum'] = 0; 
        			$data['edit_keranj4_ber'] = 0; 

        			$data['edit_keranj5_jum'] = 0; 
        			$data['edit_keranj5_ber'] = 0; 

        			$data['edit_keranj6_jum'] = 0; 
        			$data['edit_keranj6_ber'] = 0; 

        		}

        
        	$sql = "

        		UPDATE observerform_tangkapan_hasil_rev1
						   SET kode_species=".$this->db->escape($data['edit_kode_species']).", 
						   total_enumerasi_jum=".$this->db->escape($this->removeComma( $data['edit_total_enumerasi_jum'])).", 
					       total_enumerasi_berat=".$this->db->escape($this->removeComma( $data['edit_total_enumerasi_berat'])).", 
					       keranj1_jum=".$this->db->escape($this->removeComma( $data['edit_keranj1_jum'])).", 
					       keranj1_ber=".$this->db->escape($this->removeComma( $data['edit_keranj1_ber'])).", 
					       keranj2_jum=".$this->db->escape($this->removeComma( $data['edit_keranj2_jum'])).", 
					       keranj2_ber=".$this->db->escape($this->removeComma( $data['edit_keranj2_ber'])).", 
					       keranj3_jum=".$this->db->escape($this->removeComma( $data['edit_keranj3_jum'])).", 
					       keranj3_ber=".$this->db->escape($this->removeComma( $data['edit_keranj3_ber'])).", 
					       keranj4_jum=".$this->db->escape($this->removeComma( $data['edit_keranj4_jum'])).", 
					       keranj4_ber=".$this->db->escape($this->removeComma( $data['edit_keranj4_ber'])).", 
					       keranj5_jum=".$this->db->escape($this->removeComma( $data['edit_keranj5_jum'])).", 
					       keranj5_ber=".$this->db->escape($this->removeComma( $data['edit_keranj5_ber'])).", 
					       keranj6_jum=".$this->db->escape($this->removeComma( $data['edit_keranj6_jum'])).", 
					       keranj6_ber=".$this->db->escape($this->removeComma( $data['edit_keranj6_ber']))."
						 WHERE id_trip=".$this->db->escape($data['edit_id_trip'])." and seq_tangkapan=".$this->db->escape($data['edit_seq'])." and nomor=".$this->db->escape($data['edit_nomor'])."


        		  	";


			$this->db->query($sql);

			return TRUE; 




        	   }

        return FALSE; 

	}


	public function delete_observerform_tangkapan_hasil($id_trip , $seq , $nomor){

		if($id_trip){


			$sql = "DELETE FROM observerform_tangkapan_hasil_rev1 WHERE id_trip = ".$this->db->escape($id_trip)."  and seq_tangkapan = ".$this->db->escape($seq)." and nomor = ".$this->db->escape($nomor)." "; 

			$this->db->query($sql);


			return TRUE;

		}

		return FALSE;

	}









	public function add_observerform_tangkapan_detail($data=array()){

		if ($data)
        {

        	$no = $this->Model_master->select_max( "observerform_tangkapan_detail" , array('id_trip' => $data['id_trip'] , 'seq_tangkapan' =>  $data['seq'] ) , "nomor" )->row_array();
        	$no = $no['max'] + 1; 

        	if($data['berat'] == ""){
        		$data['berat'] = 0 ;
        	}

        			$sql = "


        			INSERT INTO observerform_tangkapan_detail(
					            id_trip, seq_tangkapan, nomor, kode_species, panjang, 
					            berat)
					    VALUES (".$this->db->escape($data['id_trip']).", ".$this->db->escape($data['seq']).", '".$no."', ".$this->db->escape($data['kode_species']).", ".$this->db->escape($data['panjang']).", 
					            ".$this->db->escape($data['berat']).")
		
			  	";


			$this->db->query($sql);

			return TRUE; 

        }

        return FALSE; 

	}


	public function update_observerform_tangkapan_detail($data=array()){

		if ($data)
        {

        	if($data['edit_berat'] == ""){
        		$data['edit_berat'] = 0 ;
        	}
        
        	 $sql = "

        		UPDATE observerform_tangkapan_detail
						   SET kode_species=".$this->db->escape($data['edit_kode_species2']).", panjang=".$this->db->escape($data['edit_panjang']).", 
						       berat=".$this->db->escape($data['edit_berat'])."
						 WHERE id_trip=".$this->db->escape($data['edit_id_trip'])." and seq_tangkapan=".$this->db->escape($data['edit_seq'])." and nomor=".$this->db->escape($data['edit_nomor'])."


        		  	";


			$this->db->query($sql);


			return TRUE; 




        	   }

        return FALSE; 

	}


	public function delete_observerform_tangkapan_detail($id_trip , $seq , $nomor){

		if($id_trip){


			$sql = "DELETE FROM observerform_tangkapan_detail WHERE id_trip = ".$this->db->escape($id_trip)."  and seq_tangkapan = ".$this->db->escape($seq)." and nomor = ".$this->db->escape($nomor)." "; 

			$this->db->query($sql);


			return TRUE;

		}

		return FALSE;

	}



	public function form4_add($data=array()){

		$lintang = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

		$bujur = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];

			$data['tanggal'] = strtotime($data['tanggal'] ); 

			$data['tanggal'] = date("Y-m-d",$data['tanggal']);

			$data['hari'] 	= date("d", strtotime( $data['tanggal']) ) ; 

			$data['bulan'] 	= date("m", strtotime( $data['tanggal']) ); 

			$data['tahun'] 	= date("Y", strtotime($data['tanggal'])) ;



			$data['tanggal2'] = strtotime($data['tanggal2'] ); 

			$data['tanggal2'] = date("Y-m-d",$data['tanggal2']);

			$data['hari2'] 	= date("d", strtotime( $data['tanggal2']) ) ; 

			$data['bulan2'] 	= date("m", strtotime( $data['tanggal2']) ); 

			$data['tahun2'] 	= date("Y", strtotime($data['tanggal2'])) ;


				$data['waktu_mulai'] = explode(":" , $data['waktu_mulai'] ); 

				$data['jam_mulai'] = $data['waktu_mulai'][0] ; 

				$data['menit_mulai'] = $data['waktu_mulai'][1] ;

				$data['waktu_selesai'] = explode(":" , $data['waktu_selesai'] ); 

				$data['jam_selesai'] = $data['waktu_selesai'][0] ; 

				$data['menit_selesai'] = $data['waktu_selesai'][1] ; 


		$sql = "


						INSERT INTO observerform_umpan(
				            id_trip,  no_angkut, hari, bulan, tahun, hari2, bulan2, tahun2, jam_mulai, menit_mulai, 
				            jam_selesai, menit_selesai, rasio_ember_umpan_kapal, rasio_ember_umpan_sampel, 
				            berat_ember_sample_umpan_kosong, berat_tupper_umpan_kosong, asal_umpan, 
				            sample_ember_no, lintang, bujur, harga_umpan, jumlah_ember_diangkut, 
				            berat_sample_ember_umpan, berat_sample_tupper_umpan,total_umpan_dibawa,berat_sample_minus_tupper, tanggal , tanggal2 )
				    VALUES (".$this->db->escape($data['kode_trip']).",  ".$this->db->escape($data['no_angkut']).", ".$this->db->escape($data['hari']).", ".$this->db->escape($data['bulan']).", ".$this->db->escape($data['tahun']).", ".$this->db->escape($data['hari2']).", ".$this->db->escape($data['bulan2']).", ".$this->db->escape($data['tahun2']).",  ".$this->db->escape($data['jam_mulai']).", ".$this->db->escape($data['menit_mulai']).", 
				            ".$this->db->escape($data['jam_selesai']).", ".$this->db->escape($data['menit_selesai']).", ".$this->db->escape($data['rasio_ember_umpan_kapal']).", ".$this->db->escape($data['rasio_ember_umpan_sampel']).", 
				            ".$this->db->escape($this->removeComma($data['berat_ember_sample_umpan_kosong'])).", ".$this->db->escape($this->removeComma($data['berat_tupper_umpan_kosong'])).", ".$this->db->escape($data['asal_umpan']).", 
				            ".$this->db->escape($data['sample_ember_no']).", ".$this->db->escape($lintang).", ".$this->db->escape($bujur).", ".$this->db->escape($data['harga_umpan']).", ".$this->db->escape( $this->removeComma($data['jumlah_ember_diangkut'])).", 
				            ".$this->db->escape($this->removeComma( $data['berat_sample_ember_umpan'])).", ".$this->db->escape($this->removeComma($data['berat_sample_tupper_umpan'])).", ".$this->db->escape($this->removeComma($data['total_umpan_dibawa']))." , ".$this->db->escape($this->removeComma($data['berat_sample_minus_tupper']))." , ".$this->db->escape($data['tanggal'])." , ".$this->db->escape($data['tanggal2'])." )
		
			  	";


			$this->db->query($sql);

			$getid_ = $this->db->insert_id() ; 


			return $getid_; 


	}

	public function form4_update($data=array()){

		$lintang = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

		$bujur = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];

			$data['tanggal'] = strtotime($data['tanggal'] ); 

			$data['tanggal'] = date("Y-m-d",$data['tanggal']);

			$data['hari'] 	= date("d", strtotime( $data['tanggal']) ) ; 

			$data['bulan'] 	= date("m", strtotime( $data['tanggal']) ); 

			$data['tahun'] 	= date("Y", strtotime($data['tanggal'])) ; 


			$data['tanggal2'] = strtotime($data['tanggal2'] ); 

			$data['tanggal2'] = date("Y-m-d",$data['tanggal2']);

			$data['hari2'] 	= date("d", strtotime( $data['tanggal2']) ) ; 

			$data['bulan2'] 	= date("m", strtotime( $data['tanggal2']) ); 

			$data['tahun2'] 	= date("Y", strtotime($data['tanggal2'])) ;




				$data['waktu_mulai'] = explode(":" , $data['waktu_mulai'] ); 

				$data['jam_mulai'] = $data['waktu_mulai'][0] ; 

				$data['menit_mulai'] = $data['waktu_mulai'][1] ;

				$data['waktu_selesai'] = explode(":" , $data['waktu_selesai'] ); 

				$data['jam_selesai'] = $data['waktu_selesai'][0] ; 

				$data['menit_selesai'] = $data['waktu_selesai'][1] ; 

		$sql = "

		UPDATE observerform_umpan
			   SET  no_angkut=".$this->db->escape($data['no_angkut']).", hari=".$this->db->escape($data['hari']).", bulan=".$this->db->escape($data['bulan']).", tahun=".$this->db->escape($data['tahun']).", hari2=".$this->db->escape($data['hari2']).", bulan2=".$this->db->escape($data['bulan2']).", tahun2=".$this->db->escape($data['tahun2'])." ,  jam_mulai=".$this->db->escape($data['jam_mulai']).", 
			       menit_mulai=".$this->db->escape($data['menit_mulai']).", jam_selesai=".$this->db->escape($data['jam_selesai']).", menit_selesai=".$this->db->escape($data['menit_selesai']).", rasio_ember_umpan_kapal=".$this->db->escape($data['rasio_ember_umpan_kapal']).", 
			       rasio_ember_umpan_sampel=".$this->db->escape($data['rasio_ember_umpan_sampel']).", berat_ember_sample_umpan_kosong=".$this->db->escape($this->removeComma($data['berat_ember_sample_umpan_kosong'])).", 
			       berat_tupper_umpan_kosong=".$this->db->escape($this->removeComma($data['berat_tupper_umpan_kosong'])).", asal_umpan=".$this->db->escape($data['asal_umpan']).", sample_ember_no=".$this->db->escape($data['sample_ember_no']).", 
			       lintang=".$this->db->escape($lintang).", bujur=".$this->db->escape($bujur).", harga_umpan=".$this->db->escape($data['harga_umpan']).", jumlah_ember_diangkut=".$this->db->escape($this->removeComma($data['jumlah_ember_diangkut'])).", berat_sample_ember_umpan=".$this->db->escape($this->removeComma($data['berat_sample_ember_umpan'])).", 
			       berat_sample_tupper_umpan=".$this->db->escape($this->removeComma($data['berat_sample_tupper_umpan']))." , total_umpan_dibawa=".$this->db->escape($this->removeComma($data['total_umpan_dibawa'])).", berat_sample_minus_tupper=".$this->db->escape($this->removeComma($data['berat_sample_minus_tupper']))." , tanggal=".$this->db->escape($data['tanggal'])." , tanggal2=".$this->db->escape($data['tanggal2'])."
			 WHERE id_trip=".$this->db->escape($data['kode_trip'])." and seq=".$this->db->escape($data['seq']).";



			  	";


			$this->db->query($sql);

		

			return TRUE; 



	}


	public function form4_delete($kode_trip , $id){


		 return $this->db->query("DELETE from observerform_umpan where id_trip ='$kode_trip' and seq = '$id'");


	}


	public function add_observerform_umpan_detail($data=array()){

		if ($data)
        {

        	$no = $this->Model_master->select_max( "observerform_umpan_detail" , array('id_trip' => $data['id_trip'] , 'seq_umpan' =>  $data['seq'] ) , "nomor" )->row_array();
        	$no = $no['max'] + 1; 

        			$sql = "
 

        			INSERT INTO observerform_umpan_detail(
					            id_trip, seq_umpan, nomor, kode_species, jumlah, 
					            berat)
					    VALUES (".$this->db->escape($data['id_trip']).", ".$this->db->escape($data['seq']).", '".$no."', ".$this->db->escape($data['kode_species']).", ".$this->db->escape($this->removeComma($data['jumlah'])).", 
					            ".$this->db->escape($this->removeComma($data['berat']))." )
		
			  	";


			$this->db->query($sql);

			return TRUE; 

        }

        return FALSE; 



	}


	public function update_observerform_umpan_detail($data=array()){

		if ($data)
        {
        
        	$sql = "

        		UPDATE observerform_umpan_detail
						   SET kode_species=".$this->db->escape($data['edit_kode_species']).", jumlah=".$this->db->escape($this->removeComma($data['edit_jumlah'])).", 
						       berat=".$this->db->escape($this->removeComma($data['edit_berat']))." 
						 WHERE id_trip=".$this->db->escape($data['edit_id_trip'])." and seq_umpan=".$this->db->escape($data['edit_seq'])." and nomor=".$this->db->escape($data['edit_nomor'])."


        		  	";


			$this->db->query($sql);

			return TRUE; 




        	   }

        return FALSE; 

	}


	public function delete_observerform_umpan_detail($id_trip , $seq , $nomor){

		if($id_trip){


			$sql = "DELETE FROM observerform_umpan_detail WHERE id_trip = ".$this->db->escape($id_trip)."  and seq_umpan = ".$this->db->escape($seq)." and nomor = ".$this->db->escape($nomor)." "; 

			$this->db->query($sql);


			return TRUE;

		}

		return FALSE;


	}






	public function form5_add($data=array()){

		$data['tanggal'] = strtotime($data['tanggal'] ); 

		$data['tanggal'] = date("Y-m-d",$data['tanggal']);

		//$data['waktu'] = $data['jam'].':'.$data['menit'] ; 

		$sql = "


						INSERT INTO observerform_umpan_non_used(
				            id_trip,  tanggal, waktu, berat_umpan_non_used, kode_aktivitas1 , kode_aktivitas2 , kode_aktivitas3 , kode_aktivitas4 , 
            					keterangan)
				    	VALUES (".$this->db->escape($data['kode_trip']).",  ".$this->db->escape($data['tanggal']).", ".$this->db->escape($data['waktu']).", ".$this->db->escape( $this->removeComma($data['berat_umpan_non_used'])).", 
				    	".$this->db->escape($data['kode_aktivitas1']).",  ".$this->db->escape($data['kode_aktivitas2']).",  ".$this->db->escape($data['kode_aktivitas3']).", ".$this->db->escape($data['kode_aktivitas4']).",   
				    	".$this->db->escape($data['keterangan'])."
				           )
		
			  	";


			$this->db->query($sql);

		

			return TRUE; 


	}

	public function form5_update($data=array()){

		$data['tanggal'] = strtotime($data['tanggal'] ); 

		$data['tanggal'] = date("Y-m-d",$data['tanggal']);

		//$data['waktu'] = $data['jam'].':'.$data['menit'] ; 

		$sql = "


		UPDATE observerform_umpan_non_used
			   SET  tanggal=".$this->db->escape($data['tanggal']).", waktu=".$this->db->escape($data['waktu']).", berat_umpan_non_used=".$this->db->escape( $this->removeComma($data['berat_umpan_non_used'])).", 
			       kode_aktivitas1=".$this->db->escape($data['kode_aktivitas1']).", kode_aktivitas2=".$this->db->escape($data['kode_aktivitas2']).", kode_aktivitas3=".$this->db->escape($data['kode_aktivitas3']).", kode_aktivitas4=".$this->db->escape($data['kode_aktivitas4']).", keterangan=".$this->db->escape($data['keterangan'])."
			 WHERE id_trip=".$this->db->escape($data['kode_trip'])." and seq=".$this->db->escape($data['seq']).";

			  	";


			$this->db->query($sql);

		

			return TRUE; 



	}


	public function form5_delete($kode_trip , $id){


		 return $this->db->query("DELETE from observerform_umpan_non_used where id_trip ='$kode_trip' and seq = '$id'");


	}



	public function form6_add($data=array()){

		$data['tanggal'] = strtotime($data['tanggal'] ); 

		$data['tanggal'] = date("Y-m-d",$data['tanggal']);

		$data['lintang'] = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

		$data['bujur'] = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];

		//$data['waktu'] = $data['jam'].':'.$data['menit'] ; 


		$sql = "

					INSERT INTO observerform_etp(
					            id_trip, id_pemantau, aktivitas_memancing, tanggal, waktu, 
					            lintang, bujur , jenis_pancing, kode_posisi_pancing, 
					            kode_kondisi_tertangkap, kode_kondisi_tertangkap_deskripsi, kode_kondisi_dilepas, 
					            kode_kondisi_dilepas_deskripsi, tanda)
					    VALUES (".$this->db->escape($data['kode_trip']).", ".$this->db->escape($data['id_pemantau']).", ".$this->db->escape($data['aktivitas_memancing']).", ".$this->db->escape($data['tanggal']).", ".$this->db->escape($data['waktu']).", 
					            ".$this->db->escape($data['lintang']).", ".$this->db->escape($data['bujur']).", ".$this->db->escape($data['jenis_pancing']).", ".$this->db->escape($data['kode_posisi_pancing']).", 
					            ".$this->db->escape($data['kode_kondisi_tertangkap']).", ".$this->db->escape($data['kode_kondisi_tertangkap_deskripsi']).", ".$this->db->escape($data['kode_kondisi_dilepas']).", 
					            ".$this->db->escape($data['kode_kondisi_dilepas_deskripsi']).", ".$this->db->escape($data['tanda']).")

			  	";


			$this->db->query($sql);

			$getid_ = $this->db->insert_id() ; 


			return $getid_; 


	}

	public function form6_update($data=array()){

		$data['tanggal'] = strtotime($data['tanggal'] ); 

		$data['tanggal'] = date("Y-m-d",$data['tanggal']);

		$data['lintang'] = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

		$data['bujur'] = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];

		//$data['waktu'] = $data['jam'].':'.$data['menit'] ; 


		$sql = "


		UPDATE observerform_etp
		   SET id_pemantau=".$this->db->escape($data['id_pemantau']).", aktivitas_memancing=".$this->db->escape($data['aktivitas_memancing']).", tanggal=".$this->db->escape($data['tanggal']).", 
		       waktu=".$this->db->escape($data['waktu']).", lintang=".$this->db->escape($data['lintang']).", bujur=".$this->db->escape($data['bujur']).", jenis_pancing=".$this->db->escape($data['jenis_pancing']).", 
		       kode_posisi_pancing=".$this->db->escape($data['kode_posisi_pancing']).", kode_kondisi_tertangkap=".$this->db->escape($data['kode_kondisi_tertangkap']).", kode_kondisi_tertangkap_deskripsi=".$this->db->escape($data['kode_kondisi_tertangkap_deskripsi']).", 
		       kode_kondisi_dilepas=".$this->db->escape($data['kode_kondisi_dilepas']).", kode_kondisi_dilepas_deskripsi=".$this->db->escape($data['kode_kondisi_dilepas_deskripsi']).", tanda=".$this->db->escape($data['tanda'])."
		 WHERE id_trip=".$this->db->escape($data['kode_trip'])." and seq=".$this->db->escape($data['seq']).";




			  	";


			$this->db->query($sql);

		

			return TRUE; 



	}


	public function form6_delete($kode_trip , $id){


		 return $this->db->query("DELETE from observerform_etp where id_trip ='$kode_trip' and seq = '$id'");


	}


	public function form6_etp_list(){

		 return $this->db->query("SELECT * FROM master_species WHERE  jenis_species in ('Burung' , 'Hiu' , 'Burung' , 'Lumba-lumba')");


	}




	public function form7_add($data=array()){

		$data['tanggal'] = strtotime($data['tanggal'] ); 

		$data['tanggal'] = date("Y-m-d",$data['tanggal']);

		$lintang = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

		$bujur = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];

		//$data['waktu'] = $data['jam'].':'.$data['menit'] ; 


		$sql = "

		INSERT INTO observerform_pemindahan(
            id_trip, nama_kapal, nama_nahkoda, bendera, sipi, tanda_selar, 
		            rfmo, no_rfmo, foto_lambung_kapal, no_foto, tanggal, waktu, lintang, 
		            bujur , 
		            nama_kapal2 , nama_nahkoda2 , bendera2 , sipi2 , tanda_selar2 , rfmo2 , no_rfmo2 , foto_lambung_kapal2 , no_foto2
		             )
		    VALUES (".$this->db->escape($data['kode_trip']).",  ".$this->db->escape($data['nama_kapal']).", ".$this->db->escape($data['nama_nahkoda']).", ".$this->db->escape($data['bendera']).", ".$this->db->escape($data['sipi']).", ".$this->db->escape($data['tanda_selar']).", 
		            ".$this->db->escape($data['rfmo']).", ".$this->db->escape($data['no_rfmo']).", ".$this->db->escape($data['foto_lambung_kapal']).", ".$this->db->escape($data['no_foto']).", ".$this->db->escape($data['tanggal']).", ".$this->db->escape($data['waktu']).", ".$this->db->escape($lintang).", 
		            ".$this->db->escape($bujur)." , 
		            ".$this->db->escape($data['nama_kapal2']).", ".$this->db->escape($data['nama_nahkoda2']).", ".$this->db->escape($data['bendera2']).", ".$this->db->escape($data['sipi2']).", ".$this->db->escape($data['tanda_selar2']).", ".$this->db->escape($data['rfmo2']).",
		            ".$this->db->escape($data['no_rfmo2']).", ".$this->db->escape($data['foto_lambung_kapal2']).", ".$this->db->escape($data['no_foto2'])."
		             )
			
			  	";


			$this->db->query($sql);

			$getid_ = $this->db->insert_id() ; 

			return $getid_; 


	}

	public function form7_update($data=array()){

		$data['tanggal'] = strtotime($data['tanggal'] ); 

		$data['tanggal'] = date("Y-m-d",$data['tanggal']);

		$lintang = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

		$bujur = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];

		//$data['waktu'] = $data['jam'].':'.$data['menit'] ; 


		$sql = "

		UPDATE observerform_pemindahan
			   SET nama_kapal=".$this->db->escape($data['nama_kapal']).", nama_nahkoda=".$this->db->escape($data['nama_nahkoda']).", bendera=".$this->db->escape($data['bendera']).", sipi=".$this->db->escape($data['sipi']).", 
			       tanda_selar=".$this->db->escape($data['tanda_selar']).", rfmo=".$this->db->escape($data['rfmo']).", no_rfmo=".$this->db->escape($data['no_rfmo']).", foto_lambung_kapal=".$this->db->escape($data['foto_lambung_kapal']).", no_foto=".$this->db->escape($data['no_foto']).", 
			       tanggal=".$this->db->escape($data['tanggal']).", waktu=".$this->db->escape($data['waktu']).", lintang=".$this->db->escape($lintang).", bujur=".$this->db->escape($bujur)." , 

			      	nama_kapal2 =".$this->db->escape($data['nama_kapal']).",nama_nahkoda2=".$this->db->escape($data['nama_nahkoda2']).", bendera2=".$this->db->escape($data['bendera2']).",
					sipi2=".$this->db->escape($data['sipi2']).",tanda_selar2=".$this->db->escape($data['tanda_selar2']).",
					rfmo2=".$this->db->escape($data['rfmo2']).",no_rfmo2=".$this->db->escape($data['no_rfmo2']).",
					foto_lambung_kapal2=".$this->db->escape($data['foto_lambung_kapal2']).", no_foto2=".$this->db->escape($data['no_foto2'])."

			 WHERE id_trip=".$this->db->escape($data['kode_trip'])." and seq=".$this->db->escape($data['seq'])."

	  	";


			$this->db->query($sql);

		

			return TRUE; 



	}


	public function form7_delete($kode_trip , $id){


		 return $this->db->query("DELETE from observerform_pemindahan where id_trip ='$kode_trip' and seq = '$id'");


	}


	public function add_observerform_pemindahan_detail($data=array()){


			if ($data)
        {

        	$no = $this->Model_master->select_max( "observerform_pemindahan_detail" , array('id_trip' => $data['id_trip'] , 'seq_pindah' =>  $data['seq'] ) , "nomor" )->row_array();
        	$no = $no['max'] + 1; 

        			$sql = "


        			INSERT INTO observerform_pemindahan_detail(
					            id_trip, seq_pindah, nomor, kode_species, tipe_produk, 
					            berat)
					    VALUES (".$this->db->escape($data['id_trip']).", ".$this->db->escape($data['seq']).", '".$no."', ".$this->db->escape($data['kode_species']).", ".$this->db->escape($data['tipe_produk']).", 
					            ".$this->db->escape($data['berat']).")
		
			  	";


			$this->db->query($sql);

			return TRUE; 

        }

        return FALSE; 

	}


	public function update_observerform_pemindahan_detail($data=array()){

		if ($data)
        {
        
        	$sql = "

        		UPDATE observerform_pemindahan_detail
						   SET kode_species=".$this->db->escape($data['edit_kode_species']).", tipe_produk=".$this->db->escape($data['edit_tipe_produk']).", 
						       berat=".$this->db->escape($data['edit_berat'])."
						 WHERE id_trip=".$this->db->escape($data['edit_id_trip'])." and seq_pindah=".$this->db->escape($data['edit_seq'])." and nomor=".$this->db->escape($data['edit_nomor'])."


        		  	";


			$this->db->query($sql);

			return TRUE; 




        	   }

        return FALSE; 


	}

	

	public function delete_observerform_pemindahan_detail($id_trip , $seq , $nomor){

		if($id_trip){


			$sql = "DELETE FROM observerform_pemindahan_detail WHERE id_trip = ".$this->db->escape($id_trip)."  and seq_pindah = ".$this->db->escape($seq)." and nomor = ".$this->db->escape($nomor)." "; 

			$this->db->query($sql);


			return TRUE;

		}

		return FALSE;


	}


	public function json_insert($kode_trip , $id , $data  ){



		$sql = "

		INSERT INTO observerform_etp_detail(
            id_trip, seq_etp, nomor, data_lain )
    				VALUES (".$this->db->escape($kode_trip).", ".$this->db->escape($id).", '3', ".$this->db->escape($data)." );
 "; 

		$this->db->query($sql);

		$this->db->query($sql);

	}


	public function add_observerform_etp_detail($data=array()){

	
		if ($data)
        {

        	$input = array() ; 

        	$col = "data_penyu";

			if($data['tipe'] == 'penyu'){


		
		
				$input = array(
						'species_penyu' => $data['species_penyu'], 
						'sisik_hidung' => $data['sisik_hidung'] , 
						'sisik_leher' => $data['sisik_leher'] , 
						'sisik_kosta' => $data['sisik_kosta'] , 
						'sisik_belakang' => $data['sisik_belakang'] , 
						'no_foto' => $data['no_foto'] , 
						'scl' => $data['scl'] , 
						'cw' => $data['cw'] ,  
						'ccl' => $data['ccl']  , 
						); 

				
				$col = "data_penyu";

			}else{

					$input = array(
						'kode_species' => $data['kode_species'] , 
						'jenis_species' => $data['jenis_species'] , 
						'jenis_kelamin' => $data['jenis_kelamin']  , 
						'foto' => $data['foto'] , 
						'no_foto' => $data['no_foto']  , 
						'panjang' => $data['panjang']  
						); 

				$col = "data_lain";

			}

			$json =  json_encode($input);
        
        	$no = $this->Model_master->select_max( "observerform_etp_detail" , array('id_trip' => $data['id_trip'] , 'seq_etp' =>  $data['seq'] ) , "nomor" )->row_array();
        	$no = $no['max'] + 1; 

        			$sql = "


        			INSERT INTO observerform_etp_detail(
					            id_trip, seq_etp, nomor, ".$col."  )
					    VALUES (".$this->db->escape($data['id_trip']).", ".$this->db->escape($data['seq']).", '".$no."', ".$this->db->escape($json).")
		
			  	";


			$this->db->query($sql);

			return TRUE; 


        	   }

        return FALSE; 


	}


	public function update_observerform_etp_detail($data=array()){

		if ($data)
        {


        	$input = array() ; 

        	$col = "data_penyu"; 

			if($data['edit_tipe'] == 'penyu'){



				$input = array(
						'species_penyu' => $data['edit_species_penyu'] , 
						'sisik_hidung' => $data['edit_sisik_hidung'] , 
						'sisik_leher' => $data['edit_sisik_leher'] , 
						'sisik_kosta' => $data['edit_sisik_kosta'] , 
						'sisik_belakang' => $data['edit_sisik_belakang'] , 
						'no_foto' => $data['edit_no_foto'] , 
						'scl' => $data['edit_scl'] , 
						'cw' => $data['edit_cw'] ,  
						'ccl' => $data['edit_ccl']  , 
						); 

				$col = "data_penyu"; 


			}else{


				$input = array(
						'kode_species' => $data['edit_kode_species'] , 
						'jenis_species' => $data['edit_jenis_species'] , 
						'jenis_kelamin' => $data['edit_jenis_kelamin']  , 
						'foto' => $data['edit_foto'] , 
						'no_foto' => $data['edit_no_foto2']  , 
						'panjang' => $data['edit_panjang']  
						); 

				$col = "data_lain"; 

			}

			$json =  json_encode($input);
        		$sql = "


        			UPDATE observerform_etp_detail
						   SET ".$col." = ".$this->db->escape($json)."
						 WHERE id_trip=".$this->db->escape($data['edit_id_trip'])." and seq_etp=".$this->db->escape($data['edit_seq'])." and nomor=".$this->db->escape($data['edit_nomor'])."


        	
			  	";


			$this->db->query($sql);

			return TRUE; 


        }

         return FALSE; 

	}

	
	public function delete_observerform_etp_detail($id_trip , $seq , $nomor){

		if($id_trip){


			$sql = "DELETE FROM observerform_etp_detail WHERE id_trip = ".$this->db->escape($id_trip)."  and seq_etp = ".$this->db->escape($seq)." and nomor = ".$this->db->escape($nomor)." "; 

			$this->db->query($sql);


			return TRUE;

		}

		return FALSE;


	}



    public function kalkulasi3_get_distinct_species($id_trip){

         $query = $this->db->query("SELECT distinct(kode_species) as kode_species
  								FROM observerform_tangkapan_hasil_rev1 where id_trip = '".$id_trip."' order by kode_species");

        return $query;

    }


    public function kalkulasi4_get_distinct_species($id_trip , $seq ){

         $query = $this->db->query("SELECT distinct(kode_species) as kode_species
  								FROM observerform_umpan_detail where id_trip = '".$id_trip."' and seq_umpan = '".$seq."' order by kode_species");

        return $query;

    }


    

     public function kalkulasi_insert($id_trip , $form , $result){

     	$query = $this->db->query("DELETE FROM  kalkulasi WHERE id_trip = '".$id_trip."' and form = '".$form."'");

     	$result = json_encode($result);


        $query = $this->db->query("INSERT INTO kalkulasi(
								            id_trip, form, result)
								    VALUES ('".$id_trip."', '".$form."', '".$result."');");



        return $query;

    }


    public function removeComma($str){


    	$str = str_replace(",", "", $str);

    	return $str ; 
    }



    public function trip_disable($id_trip){

    	//$query = $this->db->query("update observerform_trip set status_trip = '0' where id_trip = '".$id_trip."'");

	$query = $this->db->query("DELETE from observerform_trip  where id_trip = '".$id_trip."'");


    	return $query ;
    }


    public function trip_approve($id_trip,$id_user,$status_trip){

	$query = $this->db->query("UPDATE observerform_trip set status_trip = '".$status_trip."' , approved_by='".$id_user."',approved_date='".date('Y-m-d')."' where id_trip = '".$id_trip."'");


    	return $query ;
    }


    public function count_trip($status_trip){

    	$query = $this->db->query("select * from observerform_trip where status_trip = '".$status_trip."'; ");


    	return $query ;


    }

}
