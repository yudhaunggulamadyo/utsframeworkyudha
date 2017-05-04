<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klub extends CI_Controller {

	public function index()
	{
		$this->load->model('klub_model');
		$data["klub_list"] = $this->klub_model->getDataKlub();
		$this->load->view('klub',$data);	
	}


	public function datatable()
	{
		$this->load->model('klub_model');
		$data["klub_list"] = $this->klub_model->getDataKlub();
		$this->load->view('klub_datatable',$data);	
	}

	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->load->model('klub_model');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('tambah_klub');

		}else{
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '1000000000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('userfile')){
				$error = array('error' => $this->upload->display_errors('tambah_klub', $error));
			}
			else{
				$this->klub_model->insertKlub();
				$this->load->view('tambah_klub');
				redirect('klub');
			}
			

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
		$data['klub']=$this->klub_model->getDataKlubId($id);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('edit_klub',$data);

		}else{

			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '1000000000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('userfile')){
				$error = array('error' => $this->upload->display_errors('edit_klub', $error));
			}
			else{
				$this->klub_model->updateById($id);
				$this->load->view('edit_klub_sukses');
			}

			

		}
	}

	public function delete($id)
	{

		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('klub_model');
		$this->klub_model->deleteById($id);
		if($this->form_validation->run()==FALSE){
			redirect('klub');
		}
		
	}


}
/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

 ?>