<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemain extends CI_Controller {

	public function index($idKlub)
	{
		$this->load->model('klub_model');
		$data["pemain_list"] = $this->klub_model->getPemainByKlub($idKlub);
		$data['klub']=$this->klub_model->getDataKlubId($idKlub);
		$this->load->view('pemain',$data);	
		
	}

	public function create($idKlub)
	{
		$this->load->model('klub_model');
		$data['klub']=$this->klub_model->getDataKlubId($idKlub);
		$data["pemain_list"] = $this->klub_model->getPemainByKlub($idKlub);



		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->load->model('klub_model');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('tambah_pemain');

		}else{
				
				$this->klub_model->insertPemain($idKlub);
				$this->load->view('tambah_pemain');
			
			

		}
	}

	public function update($id)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('klub_model');
		$data['pemain']=$this->klub_model->getPemainID($id);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('edit_pemain',$data);

		}else{
			$this->klub_model->updateByIdPemain($id);
			$this->load->view('edit_pemain_sukses');

		}
	}


	public function delete($id,$fk)
	{

		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('klub_model');
		$this->klub_model->deleteByIdPemain($id);
		if($this->form_validation->run()==FALSE){
			redirect('pemain/index/'.$fk);
		}
		
	}

}


/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

 ?>