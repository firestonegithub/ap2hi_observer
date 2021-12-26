<?php 
class Model_dashboard extends CI_model{


    
	function getPerbandinganVessel(){

		return $this->db->query("select distinct(v.id_supplier) as id_supplier , nama_perusahaan , count(v.id_vessel) as id_vessel from master_vessel v , master_supplier s where v.id_supplier = s.id_supplier group by v.id_supplier , nama_perusahaan");

	}


}
