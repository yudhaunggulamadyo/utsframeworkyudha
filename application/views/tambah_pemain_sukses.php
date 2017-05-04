<?php 

	echo "Data Berhasil Tersimpan!";

	echo anchor('pemain/index'.$this->uri->segment(3), 'Masukkan Data Lagi');
 ?>