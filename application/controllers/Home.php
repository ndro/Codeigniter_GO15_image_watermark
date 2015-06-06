<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct() {
        parent::__construct();
		$this->open();
		$this->load->library('image_lib');
		$this->load->helper('download');
    }
	
	public function index() {
		$this->load->view('home',array('error' => ' ' ));
		
		$this->close();
	}
	
	public function upload_page_left() {
		$this->load->view('upload_left');
		
		$this->close();
	}
	
	public function upload_page_keep() {
		$this->load->view('upload_center');
		
		$this->close();
	}
	
	public function upload_page_right() {
		$this->load->view('upload_right');
		
		$this->close();
	}
	
	public function cropping_page($data) {
		$this->load->view('cropping', $data);
		
		$this->close();
	}
	
	public function cropping_page_keep_calm($data) {
		$this->load->view('cropping_keep_calm', $data);
		
		$this->close();
	}
	
	public function result($data) {	
        $this->load->view('result', $data);
		
		$this->close();
	}
	
	public function download($file_name) {
		$path = base_url().'assets/results/'.$file_name;
		
		$data = file_get_contents($path); // Read the file's contents
		$name = $file_name;

		force_download($name, $data);
	}
	
	public function proses_upload() {
		$mode = $this->input->post('mode');
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size']    = '100';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        $config['file_name']  = 'hasil.png';
        $config['overwrite']  = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('home', $error);
			
			$this->close();
        }
        else
        {
			$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			
			$data['file_name'] = $upload_data['file_name'];
			$data['raw_name'] = $upload_data['raw_name'];
			$data['mode'] = $mode;
			
			if (strcmp($mode, "keep") !== 0) {
				$this->cropping_page($data);
			}
			else {
				$this->cropping_page_keep_calm($data);
			}
			
        }
    }
	
	public function proses_crop() {
		//crop it
        $data['x'] = $this->input->post('x');
        $data['y'] = $this->input->post('y');
        $data['w'] = $this->input->post('w');
        $data['h'] = $this->input->post('h');
        $data['file_name'] = $this->input->post('file_name');
        $data['raw_name'] = $this->input->post('raw_name');
        $data['mode'] = $this->input->post('mode');
		
		if(isset($data['raw_name'])){
		
			$this->image_lib->clear();
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'assets/uploads/'.$data['file_name'];
			$config['new_image'] = 'assets/crops/'.$data['raw_name'].'-crop.png';
			$config['maintain_ratio'] = FALSE;
			$config['width']  = $data['w'];
			$config['height'] = $data['h'];
			$config['x_axis'] = $data['x'];
			$config['y_axis'] = $data['y'];

			$this->image_lib->initialize($config);

			if(!$this->image_lib->crop())
			{
				$error = array('error' => $this->image_lib->display_errors());
				$this->load->view('home', $error);
				
				$this->close();
			}
			else {
				$this->resize_image($data);
				if (strcmp($data['mode'], "keep") !== 0) {
					$this->image_proses($data);
				}
				else {
					$this->background_proses($data);
					$this->image_proses_keep($data);
				}
			}
		}
		else { // data kosong
			redirect('home');
		}
		
	}
	
	private function background_proses($upload_data) {
	/* menambah gambar watermark */
		
		$this->image_lib->clear();
        $config['image_library'] = 'GD2';
        $config['source_image'] = 'assets/images/background.png';
        $config['new_image'] = 'assets/crops/'.$upload_data['raw_name'].'-fix.jpg';
		
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = 'assets/results/'.$upload_data['raw_name'].'-resize.jpg';
        $config['wm_opacity'] = '100';
        $config['wm_vrt_alignment'] = 'middle'; 
        $config['wm_hor_alignment'] = 'left';
        // $config['wm_hor_offset'] = '10';
        // $config['wm_vrt_offset'] = '10';

        $this->image_lib->initialize($config);

        if (!$this->image_lib->watermark()) {
            echo $this->image_lib->display_errors();
        }

    }

    private function image_proses($upload_data) {
	/* menambah gambar watermark */
		
		$this->image_lib->clear();
        $config['image_library'] = 'GD2';
        $config['source_image'] = 'assets/results/'.$upload_data['raw_name'].'-resize.jpg';
        $config['new_image'] = 'assets/results/'.$upload_data['raw_name'].'-done.jpg';
		
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = 'assets/images/'.$upload_data['mode'].'-resized.png';
        $config['wm_opacity'] = '50';
        $config['wm_vrt_alignment'] = 'middle'; 
        $config['wm_hor_alignment'] = 'center';
        // $config['wm_hor_offset'] = '10';
        // $config['wm_vrt_offset'] = '10';

        $this->image_lib->initialize($config);

        if (!$this->image_lib->watermark()) {
            echo $this->image_lib->display_errors();
        }
		
		$data['file_name'] = $upload_data['raw_name'].'-done.jpg';
		
		$this->result($data);

    }

    private function image_proses_keep($upload_data) {
	/* menambah gambar watermark */
		
		$this->image_lib->clear();
        $config['image_library'] = 'GD2';
        $config['source_image'] = 'assets/crops/'.$upload_data['raw_name'].'-fix.jpg';
        $config['new_image'] = 'assets/results/'.$upload_data['raw_name'].'-done.jpg';
		
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = 'assets/images/'.$upload_data['mode'].'-resized.png';
        $config['wm_opacity'] = '50';
        $config['wm_vrt_alignment'] = 'middle'; 
        $config['wm_hor_alignment'] = 'center';
        // $config['wm_hor_offset'] = '10';
        // $config['wm_vrt_offset'] = '10';

        $this->image_lib->initialize($config);

        if (!$this->image_lib->watermark()) {
            echo $this->image_lib->display_errors();
        }
		
		$data['file_name'] = $upload_data['raw_name'].'-done.jpg';
		
		$this->result($data);

    }
	
	private function resize_image($upload_data) {
		$width = 800;
		$height = 800;
		
        $this->image_lib->clear();
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'assets/crops/'.$upload_data['raw_name'].'-crop.png';
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
