<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }
	
	public function index() {
		$this->load->view('home',array('error' => ' ' ));
	}
	
	public function proses_upload()
    {
		$abc = $this->input->post('userfile');
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']    = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('home', $error);
        }
        else
        {
			$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$file_name = $upload_data['raw_name'];
			
			$this->image_proses($upload_data);
			$this->resize_image($upload_data);
        }
    }

    private function image_proses($upload_data) {
	/* menambah gambar watermark */
		$this->input->post('foto');
		$this->load->library('image_lib');
		
        $config['image_library'] = 'GD2';
        $config['source_image'] = 'assets/uploads/'.$upload_data['file_name'];
        $config['new_image'] = 'assets/results/'.$upload_data['raw_name'].'-done.jpg';
		
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = 'assets/images/desain.png';
        $config['wm_opacity'] = '50';
        $config['wm_vrt_alignment'] = 'top'; 
        $config['wm_hor_alignment'] = 'left';
        $config['wm_hor_offset'] = '10';
        $config['wm_vrt_offset'] = '10';

        $this->image_lib->initialize($config);

        if (!$this->image_lib->watermark()) {
            echo $this->image_lib->display_errors();
        }
		
		$data['file_name'] = $upload_data['raw_name'].'-resize.jpg';

        $this->load->view('result', $data);
    }
	
	private function resize_image($upload_data)
    {
		$width = 1000;
		$height = 1000;
		
        $this->image_lib->clear();
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'assets/results/'.$upload_data['raw_name'].'-done.jpg';
        $config['new_image'] = 'assets/results/'.$upload_data['raw_name'].'-resize.jpg';
        $config['quality'] = '100%';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = true;
        $config['thumb_marker'] = '';
        $config['width'] = $width;
        $config['height'] = $height;
        $this->image_lib->initialize($config);
 
        if ($this->image_lib->resize())
            return true;
        return false;
    }

}
