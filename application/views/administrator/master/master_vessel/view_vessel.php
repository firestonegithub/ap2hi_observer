        

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Data Vessel</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Vessel</a></li>
                                    <li class="active">List Vessel</li>
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
                                <strong class="card-title">Vessel Form</strong>
                                 <?php if(cek_priviledge_disable("AddVessel")){ ?>
                                <a class='pull-right btn btn-success btn-sm' href='<?php echo base_url(); ?>master/add_master_vessel'><span class='fa fa-plus-square-o'> </span>Tambahkan Data</a>
                                <?php  } ?>
                            </div>


                            <div class="card-body">

                            	

 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                  <th> id_vessel </th> 
				  <th> id_supplier  </th>
				  <th> urut  </th>
				  <th> nama_kapal  </th>
				  <th> nama_pemilik </th> 
				  <th> no_ap2hi  </th>
				  <th> no_siup </th>
				  <th> no_seafdec  </th>
				  <th> no_issf  </th>
				  <th> no_kkp  </th>
				  <th> no_dkp  </th>
				  <th> no_vic  </th>
				  <th> no_nik  </th>
				  <th> nama_kapal_2tahun  </th>
				  <th> status_kapal </th>
				  <th> jenis_kapal </th>
				  <th> jenis_alat  </th>
				  <th> ukuran  </th>
				  <th> loa  </th>
				  <th> bahan  </th>
				  <th> lebar  </th>
				  <th> jenis_mesin_utama  </th>
				  <th> kapasitas_mesin_utama </th>
				  <th> kapasitas_palka_ikan  </th>
				  <th> kapasitas_palka_umpan  </th>
				  <th> vms  </th>
				  <th> lainnya  </th>
				  <th> irc  </th>
				  <th> jumlah_pancing  </th>
				  <th> jumlah_abk  </th>
				  <th> nama_kapten  </th>
				  <th> no_sipi  </th>
				  <th> masa_berlaku_sipi  </th>
				  <th> rfmo  </th>
				  <th> tahun_pembuatan_kapal  </th>
				  <th> bendera </th>
				  <th> bendera_2th  </th>
				  <th> pelabuhan_pangkalan  </th>
				  <th> muat_singgah  </th>
				  <th> copy_surat_ijin  </th>
				  <th> shark_policy  </th>
				  <th> terdaftar_iuu  </th>
				  <th> kode_etik_pelayaran  </th>
				  <th> no_imo  </th>
				  <th> lokasi_pembuatan  </th>
				  <th> tanda_selar </th>
				  <th> gt </th>
				  <th> pk </th>
				  <th> status  </th>
				  <th>Action </th>
            </tr>
        </thead>
        <tbody>
        	<?php 

        	 foreach ($record->result_array() as $row){


        	?>
            <tr>
				  <td> <?php echo $row['id_vessel'] ?> </td> 
				  <td> <?php echo $row['id_supplier'] ?>  </td>
				  <td> <?php echo $row['urut'] ?>  </td>
				  <td> <?php echo $row['nama_kapal'] ?>  </td>
				  <td> <?php echo $row['nama_pemilik'] ?> </td> 
				  <td> <?php echo $row['no_ap2hi'] ?>  </td>
				  <td> <?php echo $row['no_siup'] ?> </td>
				  <td> <?php echo $row['no_seafdec'] ?>  </td>
				  <td> <?php echo $row['no_issf'] ?>  </td>
				  <td> <?php echo $row['no_kkp'] ?>  </td>
				  <td> <?php echo $row['no_dkp'] ?>  </td>
				  <td> <?php echo $row['no_vic'] ?>  </td>
				  <td> <?php echo $row['no_nik'] ?>  </td>
				  <td> <?php echo $row['nama_kapal_2tahun'] ?>  </td>
				  <td> <?php echo $row['status_kapal'] ?> </td>
				  <td> <?php echo $row['jenis_kapal'] ?> </td>
				  <td> <?php echo $row['jenis_alat'] ?>  </td>
				  <td> <?php echo $row['ukuran'] ?>  </td>
				  <td> <?php echo $row['loa'] ?>  </td>
				  <td> <?php echo $row['bahan'] ?>  </td>
				  <td> <?php echo $row['lebar'] ?>  </td>
				  <td> <?php echo $row['jenis_mesin_utama'] ?>  </td>
				  <td> <?php echo $row['kapasitas_mesin_utama'] ?> </td>
				  <td> <?php echo $row['kapasitas_palka_ikan'] ?>  </td>
				  <td> <?php echo $row['kapasitas_palka_umpan'] ?>  </td>
				  <td> <?php echo $row['vms'] ?>  </td>
				  <td> <?php echo $row['lainnya'] ?>  </td>
				  <td> <?php echo $row['irc'] ?>  </td>
				  <td> <?php echo $row['jumlah_pancing'] ?>  </td>
				  <td> <?php echo $row['jumlah_abk'] ?>  </td>
				  <td> <?php echo $row['nama_kapten'] ?>  </td>
				  <td> <?php echo $row['no_sipi'] ?>  </td>
				  <td> <?php echo $row['masa_berlaku_sipi'] ?>  </td>
				  <td> <?php echo $row['rfmo'] ?>  </td>
				  <td> <?php echo $row['tahun_pembuatan_kapal'] ?>  </td>
				  <td> <?php echo $row['bendera'] ?> </td>
				  <td> <?php echo $row['bendera_2th'] ?>  </td>
				  <td> <?php echo $row['pelabuhan_pangkalan'] ?>  </td>
				  <td> <?php echo $row['muat_singgah'] ?>  </td>
				  <td> <?php echo $row['copy_surat_ijin'] ?>  </td>
				  <td> <?php echo $row['shark_policy'] ?>  </td>
				  <td> <?php echo $row['terdaftar_iuu'] ?>  </td>
				  <td> <?php echo $row['kode_etik_pelayaran'] ?>  </td>
				  <td> <?php echo $row['no_imo'] ?>  </td>
				  <td> <?php echo $row['lokasi_pembuatan'] ?>  </td>
				  <td> <?php echo $row['tanda_selar'] ?> </td>
				  <td> <?php echo $row['gt'] ?> </td>
				  <td> <?php echo $row['pk'] ?> </td>
				  <td> <?php echo $row['status'] ?>  </td>
				  <td>
					<center>
							<?php if(cek_priviledge_disable("EditVessel")){ ?>
				                       <a class='btn btn-primary btn-xs' title='Edit Data' href='<?php echo base_url()."master/update_master_vessel/".$row['id_vessel']; ?>'><span class='fa fa-pencil-square-o'></span></a>
				              <?php  } ?>

				             <?php if(cek_priviledge_disable("DeleteVessel")){ ?>          
				                       <a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo base_url()."master/disable_master_vessel/".$row['id_vessel']; ?>' onclick="return confirm('Are you sure you want to delete this item?');"><span class='fa fa-power-off'></span></a>
				              <?php  } ?>
				                    </center>
				  </td>
            </tr>

            <?php 
        		}
            ?>
        </tbody>
        <tfoot>
              <tr>
                  <th> id_vessel </th> 
				  <th> id_supplier  </th>
				  <th> urut  </th>
				  <th> nama_kapal  </th>
				  <th> nama_pemilik </th> 
				  <th> no_ap2hi  </th>
				  <th> no_siup </th>
				  <th> no_seafdec  </th>
				  <th> no_issf  </th>
				  <th> no_kkp  </th>
				  <th> no_dkp  </th>
				  <th> no_vic  </th>
				  <th> no_nik  </th>
				  <th> nama_kapal_2tahun  </th>
				  <th> status_kapal </th>
				  <th> jenis_kapal </th>
				  <th> jenis_alat  </th>
				  <th> ukuran  </th>
				  <th> loa  </th>
				  <th> bahan  </th>
				  <th> lebar  </th>
				  <th> jenis_mesin_utama  </th>
				  <th> kapasitas_mesin_utama </th>
				  <th> kapasitas_palka_ikan  </th>
				  <th> kapasitas_palka_umpan  </th>
				  <th> vms  </th>
				  <th> lainnya  </th>
				  <th> irc  </th>
				  <th> jumlah_pancing  </th>
				  <th> jumlah_abk  </th>
				  <th> nama_kapten  </th>
				  <th> no_sipi  </th>
				  <th> masa_berlaku_sipi  </th>
				  <th> rfmo  </th>
				  <th> tahun_pembuatan_kapal  </th>
				  <th> bendera </th>
				  <th> bendera_2th  </th>
				  <th> pelabuhan_pangkalan  </th>
				  <th> muat_singgah  </th>
				  <th> copy_surat_ijin  </th>
				  <th> shark_policy  </th>
				  <th> terdaftar_iuu  </th>
				  <th> kode_etik_pelayaran  </th>
				  <th> no_imo  </th>
				  <th> lokasi_pembuatan  </th>
				  <th> tanda_selar </th>
				  <th> gt </th>
				  <th> pk </th>
				  <th> status  </th>
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
    $('#example').DataTable({
        "scrollX": true
    });
} );

</script>


<style>

div.dataTables_wrapper {
        width: 1600px;
        margin: 0 auto;
    }

</style>