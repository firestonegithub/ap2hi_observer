<?php 
class Model_master extends CI_model{

	function countryLists(){

		$query = $this->db->query("Select * from static_country order by country_name");

		return $query; 

	}

	public function provinceLists(){

		$query = $this->db->query("Select * from static_provinces order by name");

		return $query;

	}

    public function getProvince($id){

        $query = $this->db->query("Select name from static_provinces where id = '".$id."'");

        return $query;

    }

	public function load_regencies($id){

		$query = $this->db->query("Select * from static_regencies where province_id = '".$id."' order by name");

		return $query;

	}

    
    public function getRegencies($id){

        $query = $this->db->query("Select name from static_regencies where id = '".$id."'");

        return $query;

    }

	public function load_districts($id){

		$query = $this->db->query("Select * from static_districts where regency_id = '".$id."' order by name");

		return $query;

	}

    public function getDistrict($id){

        $query = $this->db->query("Select name from static_districts where id = '".$id."'");

        return $query;

    }

	public function load_villages($id){
		$query = $this->db->query("Select * from static_villages where district_id = '".$id."' order by name");

		return $query;

	}

    public function getVillage($id){

        $query = $this->db->query("Select name from static_villages where id = '".$id."'");

        return $query;

    }



    function master_supplier_lists(){

        return $this->db->query("SELECT * FROM master_supplier where status = '1' ORDER BY id_supplier DESC");

    }


    function add_master_supplier($data=array()){

    	$ci = & get_instance();


    	if ($data)
        {

        	$this->db->select_max('id_supplier');

        	$query  = $this->db->get('master_supplier');

        	$maxId = $query->row_array(); 

        	$id_supplier = $maxId["id_supplier"] + 1;

        	$id_user = $ci->session->userdata('id_user');

        	$created_date = date('Y-m-d h:i:s');


        $sql = "
        	INSERT INTO master_supplier(
            id_supplier, kode_name, nama_perusahaan, tipe_perusahaan, lokasi, address, 
            country, province, regencies, district, village, status , 
            created_by , created_date 
             )
   			 VALUES (
   			'".$id_supplier."', ".$this->db->escape(strtoupper($data['kode_name'])).", ".$this->db->escape($data['nama_perusahaan']).", ".$this->db->escape($data['tipe_perusahaan']).",  ".$this->db->escape($data['lokasi'])." ,  ".$this->db->escape($data['address'])." , 
   			 ".$this->db->escape($data['country'] ? : "").", ".$this->db->escape($data['province'] ? : "").", ".$this->db->escape($data['regencies'] ? : "" )." , ".$this->db->escape($data['district'] ? : "")." , ".$this->db->escape($data['village'] ? : "" )." , '1' , 
   			 '".$id_user."' , '".$created_date."' 
            )
				"; 

			$this->db->query($sql);
			
			return  $maxId["id_supplier"] + 1 ;
        }

		return FALSE;
    }
    

    function master_supplier_update($id){

    	return $this->db->query("SELECT * FROM master_supplier where id_supplier='".$id."'");

    }

    function update_master_supplier($data=array()){



    	$ci = & get_instance();


    	if ($data)
        {

        	$id_user = $ci->session->userdata('id_user');
        	$changed_date = date('Y-m-d h:i:s');
        	$id_supplier = $data['id_supplier'];

        	$sql = "UPDATE master_supplier
					   SET kode_name= ".$this->db->escape(strtoupper($data['kode_name']))." , nama_perusahaan=".$this->db->escape($data['nama_perusahaan']).", tipe_perusahaan=".$this->db->escape($data['tipe_perusahaan']).", 
					       lokasi=".$this->db->escape($data['lokasi']).", address = ".$this->db->escape($data['address'])." , 
					       country=".$this->db->escape($data['country'] ? : "").", province=".$this->db->escape($data['province'] ? : "").", regencies=".$this->db->escape($data['regencies'] ? : "").", district=".$this->db->escape($data['district'] ? : "").", village=".$this->db->escape($data['village'] ? : "").", 
					        changed_by='".$id_user."', changed_date='".$changed_date."'
					 WHERE id_supplier = '".$id_supplier."'"; 

			$this->db->query($sql);


			return TRUE;
        }

        return FALSE;
    	
   }


   public function checkCodeSupplier($kode_name , $tipe , $id_supp=""){

   		if($tipe =='add'){
			
			$query = $this->db->query("Select kode_name from master_supplier where kode_name = '".$kode_name."' ");

		}else{

			$query = $this->db->query("Select kode_name from master_supplier where kode_name = '".$kode_name."' and id_supplier != '".$id_supp."' ");

		}
		return $query->num_rows();

	}


	public function disable_supplier($id_supplier){

		 return $this->db->query("UPDATE  master_supplier set status = '0' where id_supplier ='$id_supplier'");

	}


    public function master_landing_lists(){

         return $this->db->query("SELECT * FROM master_landing where status = '1' ORDER BY kode_name DESC");

    }

    public function add_master_landing($data=array()){


        $ci = & get_instance();


        if ($data)
        {


            $id_user = $ci->session->userdata('id_user');

            $created_date = date('Y-m-d h:i:s');

            $find_landing = "select kode_name from master_landing where kode_name like '%".$data['regencies']."%'" ; 

            $result = $this->db->query($find_landing);

             if ($result->num_rows() > 0) { 

                foreach ($result->result_array() as $row){

                    $kode = $row['kode_name'] ; 

                    $max =  substr($kode, -2);

                    $urut = $max + 1 ;

                    if($urut < 10){

                         $kode_name = $data['regencies']."0".$urut ;

                    }else{

                         $kode_name = $data['regencies']."".$urut ;


                    }


                }

             }else{

                $kode_name = $data['regencies']."01" ;


             }


        $sql = "
            INSERT INTO master_landing( kode_name, nama_landing , lokasi, province, regencies, district, village, status , created_by , created_date  )
            
             VALUES ( 

            '".$kode_name."', ".$this->db->escape(strtoupper($data['nama_landing'])).", ".$this->db->escape($data['lokasi']).", 
            
            ".$this->db->escape($data['province'] ? : "").", ".$this->db->escape($data['regencies'] ? : "" )." , ".$this->db->escape($data['district'] ? : "")." , ".$this->db->escape($data['village'] ? : "" )." , '1' , 
            
             '".$id_user."' , '".$created_date."' 
            
            )
                "; 

            $this->db->query($sql);
            
            return  $maxId["id_supplier"] + 1 ;
        }

        return FALSE;

    }


     function update_master_landing($data=array()){



        $ci = & get_instance();


        if ($data)
        {

            $id_user = $ci->session->userdata('id_user');

            $changed_date = date('Y-m-d h:i:s');

            $kode_name = $data['kode_name'];

            $sql = "UPDATE master_landing
                       SET nama_landing=".$this->db->escape($data['nama_landing']).", lokasi=".$this->db->escape($data['lokasi']).", 
                        changed_by='".$id_user."', changed_date='".$changed_date."'
                     WHERE kode_name = '".$kode_name."'"; 

            $this->db->query($sql);


            return TRUE;
        }

        return FALSE;
        
   }

   function master_landing_update($id){

        return $this->db->query("SELECT * FROM master_landing where kode_name='".$id."'");


   }

   function disable_landing($id){

        return $this->db->query("UPDATE  master_landing set status = '0' where kode_name ='$id'");

   }


   function master_vessel_lists(){

          return $this->db->query("SELECT * FROM master_vessel where status = 'active' ORDER BY id_supplier , nama_kapal DESC");

   }

   function checkVesselExsist($checks){

        $where_ = ""; 

        foreach($checks as $key=>$value){

            $where_ .= " AND ".$key." = '".$value."' ";

        }

        $where_ = ($where_ != ""?"(".substr($where_, 4).")":"(1=1)");


        $query = $this->db->query("Select * from master_vessel WHERE (1=1) AND ".$where_ );

        
        return $query->num_rows();
        

   }


   function checkVesselExsistUpdate($checks, $id_vessel){


        $where_ = ""; 

            foreach($checks as $key=>$value){

                $where_ .= " AND ".$key." = '".$value."' ";

            }

            $where_ = ($where_ != ""?"(".substr($where_, 4).")":"(1=1)");


            $query = $this->db->query("Select * from master_vessel WHERE (1=1) AND ".$where_." AND id_vessel != '".$id_vessel."' and status = 'active' ");

            
            return $query->num_rows();

   }

   function add_master_vessel($data=array()){


        $ci = & get_instance();


        if ($data)
        {


            $id_user = $ci->session->userdata('id_user');

            $created_date = date('Y-m-d h:i:s');

            $maxUrut = $this->db->query("Select max(urut) as urut from master_vessel ")->row();
           
            $id_vessel = $maxUrut->urut + 1 ; 

            $urut = $id_vessel; 

            $no_ap2hi = $id_vessel ; 
           


         $sql = "
                    INSERT INTO master_vessel(
                    id_vessel, id_supplier, urut, nama_kapal, nama_pemilik, no_ap2hi, 
                    no_siup, no_seafdec, no_issf, no_kkp, no_dkp, no_vic, no_nik, 
                    nama_kapal_2tahun, status_kapal, jenis_kapal, jenis_alat, ukuran, 
                    loa, bahan, jenis_mesin_utama, kapasitas_mesin_utama, kapasitas_palka_ikan, 
                    kapasitas_palka_umpan, vms, lainnya, irc, jumlah_pancing, jumlah_abk, 
                    nama_kapten, no_sipi, masa_berlaku_sipi, rfmo, rfmo_choice ,  tahun_pembuatan_kapal, 
                    bendera, bendera_2th, pelabuhan_pangkalan, muat_singgah, copy_surat_ijin, 
                    shark_policy, terdaftar_iuu, kode_etik_pelayaran, no_imo, lokasi_pembuatan, tanda_selar ,  gt , pk ,
                    status, created_by, created_date , panjang  )
            VALUES (".$this->db->escape($id_vessel)."  , 
                    ".$this->db->escape($data['id_supplier'])." ,
                    ".$this->db->escape($urut)." , 
                    ".$this->db->escape(strtoupper($data['nama_kapal'])).", 
                    ".$this->db->escape($data['nama_pemilik'])."  , 
                    ".$this->db->escape($data['no_ap2hi'])." , 
                    ".$this->db->escape($data['no_siup'])."  ,
                    ".$this->db->escape($data['no_seafdec'])."  ,
                    ".$this->db->escape($data['no_issf'])."   , 
                    ".$this->db->escape($data['no_kkp'])."   , 
                    ".$this->db->escape($data['no_dkp'])."   , 
                    ".$this->db->escape($data['no_vic'])."   , 
                    ".$this->db->escape($data['no_nik'])." , 
                    ".$this->db->escape($data['nama_kapal_2tahun'])." ,
                    ".$this->db->escape($data['status_kapal'])." , 
                    ".$this->db->escape($data['jenis_kapal'])." ,
                    ".$this->db->escape($data['jenis_alat'])."  ,
                    ".$this->db->escape($data['ukuran'])."   , 
                    ".$this->db->escape($data['loa'])." ,
                    ".$this->db->escape($data['bahan'])." ,
                    ".$this->db->escape($data['jenis_mesin_utama'])." ,
                    ".$this->db->escape($data['kapasitas_mesin_utama'])." , 
                    ".$this->db->escape($data['kapasitas_palka_ikan'])." , 
                    ".$this->db->escape($data['kapasitas_palka_umpan'])." , 
                    ".$this->db->escape($data['vms'])." ,
                    ".$this->db->escape($data['lainnya'])." ,
                    ".$this->db->escape($data['irc'])." ,
                    ".$this->db->escape($data['jumlah_pancing'])." ,
                    ".$this->db->escape($data['jumlah_abk'])." , 
                    ".$this->db->escape($data['nama_kapten'])." ,
                    ".$this->db->escape($data['no_sipi'])."  , 
                    ".$this->db->escape($data['masa_berlaku_sipi'])."  ,
                    ".$this->db->escape($data['rfmo'])."   ,
                    ".$this->db->escape($data['rfmo_choice'])."   ,
                    ".$this->db->escape($data['tahun_pembuatan_kapal'])."    , 
                    ".$this->db->escape($data['bendera'])." , 
                    ".$this->db->escape($data['bendera_2th'])." , 
                    ".$this->db->escape($data['pelabuhan_pangkalan'])." ,
                    ".$this->db->escape($data['muat_singgah'])."  ,
                    ".$this->db->escape($data['copy_surat_ijin'])."   , 
                    ".$this->db->escape($data['shark_policy'])." , 
                    ".$this->db->escape($data['terdaftar_iuu'])." , 
                    ".$this->db->escape($data['kode_etik_pelayaran'])." ,
                    ".$this->db->escape($data['no_imo'])."  , 
                    ".$this->db->escape($data['lokasi_pembuatan'])."  , 
                    ".$this->db->escape($data['tanda_selar'])."  , 
                    ".$this->db->escape($data['gt'])."  , 
                    ".$this->db->escape($data['pk'])."  , 
                    ".$this->db->escape('active')." , 
                    ".$this->db->escape($id_user)." , 
                    ".$this->db->escape($created_date)." ,
                    ".$this->db->escape($data['panjang'])."  
                     );

                        "; 

            $this->db->query($sql);
            
            return  $maxId["id_supplier"] + 1 ;

        }

        return FALSE;


   }


   function master_vessel_update($id){


        return $this->db->query("SELECT * FROM master_vessel where id_vessel='".$id."'");


   }


   function update_master_vessel($data=array()){



        $ci = & get_instance();


        if ($data)
        {

            $id_user = $ci->session->userdata('id_user');

            $changed_date = date('Y-m-d h:i:s');

            echo $sql = "UPDATE master_vessel
                       SET 
                        nama_kapal=".$this->db->escape(strtoupper($data['nama_kapal'])).", 
                        nama_pemilik=".$this->db->escape($data['nama_pemilik'])." ,  
                        no_siup=".$this->db->escape($data['no_siup'])." , 
                        no_seafdec=".$this->db->escape($data['no_seafdec']).",  
                        no_issf=".$this->db->escape($data['no_issf'])." ,  
                        no_kkp=".$this->db->escape($data['no_kkp'])." ,  
                        no_dkp=".$this->db->escape($data['no_dkp'])." ,  
                        no_vic=".$this->db->escape($data['no_vic'])." ,  
                        no_nik=".$this->db->escape($data['no_nik'])." , 
                        no_ap2hi=".$this->db->escape($data['no_ap2hi'])." , 
                        nama_kapal_2tahun=".$this->db->escape($data['nama_kapal_2tahun']).", 
                        status_kapal=".$this->db->escape($data['status_kapal']).", 
                        jenis_kapal=".$this->db->escape($data['jenis_kapal']).", 
                        jenis_alat=".$this->db->escape($data['jenis_alat']).", 
                        ukuran=".$this->db->escape($data['ukuran']).", 
                        loa=".$this->db->escape($data['loa']).", 
                        lebar=".$this->db->escape($data['lebar']).", 
                        bahan=".$this->db->escape($data['bahan']).", 
                        jenis_mesin_utama=".$this->db->escape($data['jenis_mesin_utama']).", 
                        kapasitas_mesin_utama=".$this->db->escape($data['kapasitas_mesin_utama']).", 
                        kapasitas_palka_ikan=".$this->db->escape($data['kapasitas_palka_ikan']).", 
                        kapasitas_palka_umpan=".$this->db->escape($data['kapasitas_palka_umpan']).", 
                        vms=".$this->db->escape($data['vms']).", 
                        lainnya=".$this->db->escape($data['lainnya']).", 
                        irc=".$this->db->escape($data['irc']).", 
                        jumlah_pancing=".$this->db->escape($data['jumlah_pancing']).", 
                        jumlah_abk=".$this->db->escape($data['jumlah_abk']).", 
                        nama_kapten=".$this->db->escape($data['nama_kapten']).",
                        no_sipi=".$this->db->escape($data['no_sipi']).", 
                        masa_berlaku_sipi=".$this->db->escape($data['masa_berlaku_sipi']).", 
                        rfmo=".$this->db->escape($data['rfmo']).", 
                        rfmo_choice=".$this->db->escape($data['rfmo_choice']).",
                        tahun_pembuatan_kapal=".$this->db->escape($data['tahun_pembuatan_kapal']).", 
                        bendera=".$this->db->escape($data['bendera']).", 
                        bendera_2th=".$this->db->escape($data['bendera_2th']).", 
                        pelabuhan_pangkalan=".$this->db->escape($data['pelabuhan_pangkalan']).", 
                        muat_singgah=".$this->db->escape($data['muat_singgah']).", 
                        copy_surat_ijin=".$this->db->escape($data['copy_surat_ijin']).", 
                        shark_policy=".$this->db->escape($data['shark_policy']).", 
                        terdaftar_iuu=".$this->db->escape($data['terdaftar_iuu']).", 
                        kode_etik_pelayaran=".$this->db->escape($data['kode_etik_pelayaran']).", 
                        no_imo=".$this->db->escape($data['no_imo']).", 
                        lokasi_pembuatan=".$this->db->escape($data['lokasi_pembuatan']).", 
                        tanda_selar=".$this->db->escape($data['tanda_selar']).", 
                        gt=".$this->db->escape($data['gt']).", 
                        pk=".$this->db->escape($data['pk']).", 
                        changed_by=".$this->db->escape($id_user).", 
                        changed_date=".$this->db->escape($changed_date)." , 
                        panjang=".$this->db->escape($data['panjang'])."   
                     WHERE id_vessel = '".$data['id_vessel']."' ";

            $this->db->query($sql);



            return TRUE;
        }

        return FALSE;
        
   }


   public function disable_vessel($id){


        return $this->db->query("UPDATE  master_vessel set status = 'disable' where id_vessel ='$id'");


   }


   public function master_dictionary_lists($checks , $table){


        $where_ = ""; 

        foreach($checks as $key=>$value){

            $where_ .= " AND ".$key." = '".$value."' ";

        }

        $where_ = ($where_ != ""?"(".substr($where_, 4).")":"(1=1)");


        $query = $this->db->query("Select * from ".$table." WHERE (1=1) AND ".$where_." order by kode_aktivitas" );

        
        return $query;
    

   }

   public function disable_master_dictionary($id , $jenis_aktivitas){

        return $this->db->query("delete from master_dictionary where jenis_aktivitas  = '".$jenis_aktivitas."' and kode_aktivitas = '".$id."' ");


   }


   public function master_dictionary_update($tipe , $id){


        return $this->db->query("SELECT * FROM master_dictionary where kode_aktivitas='".$id."' AND jenis_aktivitas = '".$tipe."' ");

   }

   public function update_master_dictionary($data=array()){


        
        $ci = & get_instance();


        if ($data)
        {

            $kode_aktivitas = $data['kode_aktivitas']; 

            $jenis_aktivitas = $data['jenis_aktivitas'];

            $nama_aktivitas = $data['nama_aktivitas'];


            $sql = "UPDATE master_dictionary

                       SET nama_aktivitas='".$nama_aktivitas."'

                     WHERE kode_aktivitas = '".$kode_aktivitas."' AND jenis_aktivitas = '".$jenis_aktivitas."'"; 

            $this->db->query($sql);
           
            return TRUE;
        }

        return FALSE;


       

   }


   public function add_master_dictionary($data=array()){



        $ci = & get_instance();


        if ($data)
        {



        echo $sql = "

        INSERT INTO master_dictionary(
                            
                                kode_aktivitas, jenis_aktivitas, nama_aktivitas)
                            
                            VALUES ( ".$this->db->escape($data['kode_aktivitas'] ? : "")."  ,   ".$this->db->escape($data['jenis_aktivitas'] ? : "")." ,   ".$this->db->escape($data['nama_aktivitas'] ? : "")."  );



    
                "; 

            $this->db->query($sql);
            
            
        }

        return FALSE;


   }


    public function insert_master_species($data=array()){



        $ci = & get_instance();


        if ($data)
        {



        echo $sql = "

        INSERT INTO master_species(
                            
                                fao, jenis_species, latin ,english , family )
                            
                            VALUES ( ".$this->db->escape($data['fao'] ? : "")."  ,   ".$this->db->escape($data['jenis_species'] ? : "")." ,   ".$this->db->escape($data['latin'] ? : "")." , ".$this->db->escape($data['english'] ? : "")." , ".$this->db->escape($data['family'] ? : "")." );



    
                "; 




            $this->db->query($sql);
            
            
        }

        return FALSE;


   }


    function get_count( $table , $count_field , $checks ){

        $where_ = ""; 


        if(count($checks) > 0 ){

            foreach($checks as $key=>$value){

                $where_ .= " AND ".$key." = '".$value."' ";

            }
            
        }


        $where_ = ($where_ != ""?"(".substr($where_, 4).")":"(1=1)");


        $query = $this->db->query("Select count(".$count_field.") as total from ".$table." WHERE (1=1) AND ".$where_." " );

        
        return $query;
    

    }


   function not_in($checks , $not_in ,  $table){

   

        $where_ = ""; 

        foreach($checks as $key=>$value){

            $where_ .= " AND ".$key." = '".$value."' ";

        }

        foreach($not_in as $key=>$value){

            $where_ .= " AND ".$key." != '".$value."' ";

        }


        $where_ = ($where_ != ""?"(".substr($where_, 4).")":"(1=1)");


        $query = $this->db->query("Select * from ".$table." WHERE (1=1) AND ".$where_." " );

        
        return $query;
    

   

   }


   function general_select($table, $data, $column="", $order_by=""){
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

        $order_by_ = "";
        if ($order_by!="") {
            $order_by_ = "ORDER BY ".$order_by."";
        }

        $query_string = "
            SELECT ".$select." 
            FROM ".$table." 
            WHERE (1=1)
            AND ".$where_.
            $order_by_;

        $query = $this->db->query($query_string);
        /*
        if ($data_show=="row") {
            return $query->row();   
        }
        elseif ($data_show=="result"){
            return $query->result();   
        }
        //So We can maintain the results
        */
        return $query; 
    }


    function general_select_not_in($table, $data, $not , $order_by=""){
        $where_ = "";
        if (count($data)>0) {
            foreach ($data as $inputkey => $input_value) {
                $where_ .= " AND ".$inputkey." = '".$input_value."' ";
            }
        }
        $where_ = ($where_ != ""?"(".substr($where_, 4).")":"(1=1)");


        $where_not_="";
        if (count($not)>0) {
            foreach ($not as $inputkey => $input_value) {
                $where_not_ .= " AND ".$inputkey." != '".$input_value."' ";
            }
        }

        $select = "*";
     

        $order_by_ = "";
        if ($order_by!="") {
            $order_by_ = "ORDER BY ".$order_by."";
        }

        $query_string = "
            SELECT ".$select." 
            FROM ".$table." 
            WHERE (1=1)
            AND ".$where_."".$where_not_.
            $order_by_;

        $query = $this->db->query($query_string);
 
        return $query; 
    }


    public function general_select_sum($table, $data, $column="", $order_by=""){

    
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

        $order_by_ = "";
        if ($order_by!="") {
            $order_by_ = "ORDER BY ".$order_by."";
        }

        $query_string = "
            SELECT sum(".$select.") as ".$column." 
            FROM ".$table." 
            WHERE (1=1)
            AND ".$where_.
            $order_by_;

        $query = $this->db->query($query_string);
        /*
        if ($data_show=="row") {
            return $query->row();   
        }
        elseif ($data_show=="result"){
            return $query->result();   
        }
        //So We can maintain the results
        */
        return $query; 
   

    }


       function general_select_kode_aktivitas($table, $data, $column="", $order_by=""){
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

        $order_by_ = "";
        if ($order_by!="") {
            $order_by_ = "ORDER BY ".$order_by."::int";
        }

        $query_string = "
            SELECT ".$select." 
            FROM ".$table." 
            WHERE (1=1)
            AND ".$where_.
            $order_by_;

        $query = $this->db->query($query_string);
   
        return $query; 
    }


    function general_select_in($table, $data, $list_in , $column="", $order_by=""){

        $where_ = "";
        if (count($data)>0) {
            foreach ($data as $inputkey => $input_value) {
                $where_ .= " AND ".$inputkey." = '".$input_value."' ";
            }
        }
        $where_ = ($where_ != ""?"(".substr($where_, 4).")":"(1=1)");

        $where_supplier_id_in_ = "";
        
        $where_pelabuhan_keberangkatan_in_ = "";



        if(  !empty($list_in) ){

            if( !empty($list_in['id_supplier'])  ){

                $supplier_id = ''; 

                foreach ($list_in['id_supplier'] as $loop) {
                
                    $supplier_id .= "'".$loop."',";

                    
                }

                $supplier_id = rtrim($supplier_id, ",");

                $where_supplier_id_in_ .= " AND id_supplier in ( ".$supplier_id." ) " ;
                

            }

             if( !empty($list_in['pelabuhan_keberangkatan'])  ){

                $landing_id = ''; 

                foreach ($list_in['pelabuhan_keberangkatan'] as $loop) {
                
                    $landing_id .= "'".$loop."',";

                    
                }

                $landing_id = rtrim($landing_id, ",");

                $where_pelabuhan_keberangkatan_in_ .= " AND pelabuhan_keberangkatan in ( ".$landing_id." ) " ;
                


            }

        }

        


        $select = "*";
        if ($column!="") {
            $select = $column;
        }

        $order_by_ = "";
        if ($order_by!="") {
            $order_by_ = "ORDER BY ".$order_by."";
        }

        $query_string = "
            SELECT ".$select." 
            FROM ".$table." 
            WHERE (1=1)
            AND ".$where_." "
            .$where_supplier_id_in_." "
            .$where_pelabuhan_keberangkatan_in_." "
            .$order_by_;

        $query = $this->db->query($query_string);
        
        return $query; 


    }


    function load_species_etp($id){

        $query = $this->db->query("SELECT * FROM master_species WHERE  jenis_species = '".$id."' order by fao");

        return $query;

    }



     function select_max($table, $data, $column="" ){

        $where_ = "";
        if (count($data)>0) {
            foreach ($data as $inputkey => $input_value) {
                $where_ .= " AND ".$inputkey." = '".$input_value."' ";
            }
        }
        $where_ = ($where_ != ""?"(".substr($where_, 4).")":"(1=1)");

      
        $query_string = "
            SELECT MAX( ".$column." )
            FROM ".$table." 
            WHERE (1=1)
            AND ".$where_;

        $query = $this->db->query($query_string);

        return $query ; 
     }

    public function load_vessel_from_id_supplier($id){

        $query = $this->db->query("Select id_vessel , nama_kapal from master_vessel where id_supplier = '".$id."' and status = 'active'");

        return $query;

    }



}
