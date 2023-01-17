<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Menara Controller
*| --------------------------------------------------------------------------
*| Menara site
*|
*/
class Menara extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_menara');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Menaras
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('menara_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['menaras'] = $this->model_menara->get($filter, $field, $this->limit_page, $offset);
		$this->data['menara_counts'] = $this->model_menara->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/menara/index/',
			'total_rows'   => $this->data['menara_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Menara List');
		$this->render('backend/standart/administrator/menara/menara_list', $this->data);
	}
	
	/**
	* Add new menaras
	*
	*/
	public function add() {
		$this->is_allowed('menara_add');

		$this->template->title('Menara New');
		$this->render('backend/standart/administrator/menara/menara_add', $this->data);
	}

	/**
	* Add New Menaras
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('menara_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('pemohon_id', 'Pemohon', 'trim|required');
		$this->form_validation->set_rules('kecamatan_id', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kelurahan_id', 'Kelurahan', 'trim|required');
		$this->form_validation->set_rules('tipesite_id', 'Tipe Site', 'trim|required');
		$this->form_validation->set_rules('operator_id', 'Operator Id', 'trim|required');
		$this->form_validation->set_rules('menara_nama', 'Nama Menara', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('menara_alamat', 'Alamat Menara', 'trim|required');
		$this->form_validation->set_rules('menara_rt', 'RT', 'trim|required');
		$this->form_validation->set_rules('menara_rw', 'RW', 'trim|required');
		$this->form_validation->set_rules('menara_menara_file_berkas_name', 'File', 'trim');
		$this->form_validation->set_rules('menara_latitude', 'Latitude', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('menara_longitude', 'Longitude', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('menara_ketinggian', 'Ketinggian', 'trim|required');
		$this->form_validation->set_rules('kawasan_id', 'Kawasan', 'trim|required');
		$this->form_validation->set_rules('menara_nama_penyewa', 'Nama Penyewa', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('menara_pemilik', 'Pemilik', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('menara_kondisi', 'Kondisi', 'trim|required');
		$this->form_validation->set_rules('menara_luas_area', 'Luas Area Menara', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('menara_imb', 'IMB', 'trim|max_length[255]');

		if ($this->form_validation->run()) {
			$menara_menara_file_berkas_uuid = $this->input->post('menara_menara_file_berkas_uuid');
			$menara_menara_file_berkas_name = $this->input->post('menara_menara_file_berkas_name');
		
			$save_data = [
				'pemohon_id' 			=> $this->input->post('pemohon_id'),
				'kecamatan_id' 			=> $this->input->post('kecamatan_id'),
				'kelurahan_id' 			=> $this->input->post('kelurahan_id'),
				'tipesite_id' 			=> $this->input->post('tipesite_id'),
				'operator_id' 			=> $this->input->post('operator_id'),
				'menara_nama' 			=> $this->input->post('menara_nama'),
				'menara_alamat' 		=> $this->input->post('menara_alamat'),
				'menara_rt' 			=> $this->input->post('menara_rt'),
				'menara_rw' 			=> $this->input->post('menara_rw'),
				'menara_latitude' 		=> $this->input->post('menara_latitude'),
				'menara_longitude' 		=> $this->input->post('menara_longitude'),
				'menara_ketinggian' 	=> $this->input->post('menara_ketinggian'),
				'kawasan_id' 			=> $this->input->post('kawasan_id'),
				'menara_nama_penyewa' 	=> $this->input->post('menara_nama_penyewa'),
				'menara_pemilik' 		=> $this->input->post('menara_pemilik'),
				'menara_kondisi' 		=> $this->input->post('menara_kondisi'),
				'menara_luas_area' 		=> $this->input->post('menara_luas_area'),
				'menara_imb' 			=> $this->input->post('menara_imb'),
				'menara_tgl_imb' 		=> $this->input->post('menara_tgl_imb'),
				'menara_user_created' 	=> get_user_data('id'),
				'menara_status' 		=> '1',
				'menara_created_at' 	=> date('Y-m-d H:i:s'),
			];

			if (!is_dir(FCPATH . '/uploads/menara/')) {
				mkdir(FCPATH . '/uploads/menara/');
			}

			if (!empty($menara_menara_file_berkas_name)) {
				$menara_menara_file_berkas_name_copy = date('YmdHis') . '-' . $menara_menara_file_berkas_name;

				rename(FCPATH . 'uploads/tmp/' . $menara_menara_file_berkas_uuid . '/' . $menara_menara_file_berkas_name, 
						FCPATH . 'uploads/menara/' . $menara_menara_file_berkas_name_copy);

				if (!is_file(FCPATH . '/uploads/menara/' . $menara_menara_file_berkas_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['menara_file_berkas'] = $menara_menara_file_berkas_name_copy;
			}
		
			if (count((array) $this->input->post('menara_menara_image_name'))) {
				foreach ((array) $_POST['menara_menara_image_name'] as $idx => $file_name) {
					$menara_menara_image_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['menara_menara_image_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/menara/' . $menara_menara_image_name_copy);

					$listed_image[] = $menara_menara_image_name_copy;

					if (!is_file(FCPATH . '/uploads/menara/' . $menara_menara_image_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['menara_image'] = implode($listed_image, ',');
				$listed_image = [];
			}
			
			$save_menara = $id = $this->model_menara->store($save_data);

			if ($save_menara) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_menara;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/menara/edit/' . $save_menara, 'Edit Menara'),
						anchor('administrator/menara', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/menara/edit/' . $save_menara, 'Edit Menara')
					]), 'success');

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/menara');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/menara');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
		/**
	* Update view Menaras
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('menara_update');

		$this->data['menara'] = $this->model_menara->find($id);

		$this->template->title('Menara Update');
		$this->render('backend/standart/administrator/menara/menara_update', $this->data);
	}

	/**
	* Update Menaras
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('menara_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('pemohon_id', 'Pemohon', 'trim|required');
		$this->form_validation->set_rules('kecamatan_id', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kelurahan_id', 'Kelurahan', 'trim|required');
		$this->form_validation->set_rules('tipesite_id', 'Tipe Site', 'trim|required');
		$this->form_validation->set_rules('operator_id', 'Operator Id', 'trim|required');
		$this->form_validation->set_rules('menara_nama', 'Nama Menara', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('menara_alamat', 'Alamat Menara', 'trim|required');
		$this->form_validation->set_rules('menara_rt', 'RT', 'trim|required');
		$this->form_validation->set_rules('menara_rw', 'RW', 'trim|required');
		$this->form_validation->set_rules('menara_menara_file_berkas_name', 'File', 'trim');
		$this->form_validation->set_rules('menara_latitude', 'Latitude', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('menara_longitude', 'Longitude', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('menara_ketinggian', 'Ketinggian', 'trim|required');
		$this->form_validation->set_rules('kawasan_id', 'Kawasan', 'trim|required');
		$this->form_validation->set_rules('menara_nama_penyewa', 'Nama Penyewa', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('menara_pemilik', 'Pemilik', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('menara_kondisi', 'Kondisi', 'trim|required');
		$this->form_validation->set_rules('menara_luas_area', 'Luas Area Menara', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('menara_imb', 'IMB', 'trim|max_length[255]');

		if ($this->form_validation->run()) {
			$menara_menara_file_berkas_uuid = $this->input->post('menara_menara_file_berkas_uuid');
			$menara_menara_file_berkas_name = $this->input->post('menara_menara_file_berkas_name');
		
			$save_data = [
				'pemohon_id' 			=> $this->input->post('pemohon_id'),
				'kecamatan_id' 			=> $this->input->post('kecamatan_id'),
				'kelurahan_id' 			=> $this->input->post('kelurahan_id'),
				'tipesite_id' 			=> $this->input->post('tipesite_id'),
				'operator_id' 			=> $this->input->post('operator_id'),
				'menara_nama' 			=> $this->input->post('menara_nama'),
				'menara_alamat' 		=> $this->input->post('menara_alamat'),
				'menara_rt' 			=> $this->input->post('menara_rt'),
				'menara_rw' 			=> $this->input->post('menara_rw'),
				'menara_latitude' 		=> $this->input->post('menara_latitude'),
				'menara_longitude' 		=> $this->input->post('menara_longitude'),
				'menara_ketinggian' 	=> $this->input->post('menara_ketinggian'),
				'kawasan_id' 			=> $this->input->post('kawasan_id'),
				'menara_nama_penyewa' 	=> $this->input->post('menara_nama_penyewa'),
				'menara_pemilik' 		=> $this->input->post('menara_pemilik'),
				'menara_kondisi' 		=> $this->input->post('menara_kondisi'),
				'menara_luas_area' 		=> $this->input->post('menara_luas_area'),
				'menara_imb' 			=> $this->input->post('menara_imb'),
				'menara_tgl_imb' 		=> $this->input->post('menara_tgl_imb'),
				'menara_status' 		=> $this->input->post('menara_status'),
			];

			if (!is_dir(FCPATH . '/uploads/menara/')) {
				mkdir(FCPATH . '/uploads/menara/');
			}

			if (!empty($menara_menara_file_berkas_uuid)) {
				$menara_menara_file_berkas_name_copy = date('YmdHis') . '-' . $menara_menara_file_berkas_name;

				rename(FCPATH . 'uploads/tmp/' . $menara_menara_file_berkas_uuid . '/' . $menara_menara_file_berkas_name, 
						FCPATH . 'uploads/menara/' . $menara_menara_file_berkas_name_copy);

				if (!is_file(FCPATH . '/uploads/menara/' . $menara_menara_file_berkas_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['menara_file_berkas'] = $menara_menara_file_berkas_name_copy;
			}
		
			$listed_image = [];
			if (count((array) $this->input->post('menara_menara_image_name'))) {
				foreach ((array) $_POST['menara_menara_image_name'] as $idx => $file_name) {
					if (isset($_POST['menara_menara_image_uuid'][$idx]) AND !empty($_POST['menara_menara_image_uuid'][$idx])) {
						$menara_menara_image_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['menara_menara_image_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/menara/' . $menara_menara_image_name_copy);

						$listed_image[] = $menara_menara_image_name_copy;

						if (!is_file(FCPATH . '/uploads/menara/' . $menara_menara_image_name_copy)) {
							echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
								]);
							exit;
						}
					} else {
						$listed_image[] = $file_name;
					}
				}
			}
			
			$save_data['menara_image'] = implode($listed_image, ',');
			$listed_image = [];
			
			$save_menara = $this->model_menara->change($id, $save_data);

			if ($save_menara) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/menara', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/menara');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/menara');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
	/**
	* delete Menaras
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('menara_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
			set_message(cclang('has_been_deleted', 'menara'), 'success');
		} else {
			set_message(cclang('error_delete', 'menara'), 'error');
		}

		redirect_back();
	}

		/**
	* View view Menaras
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('menara_view');

		$this->data['menara'] = $this->model_menara->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Menara Detail');
		$this->render('backend/standart/administrator/menara/menara_view', $this->data);
	}
	
	/**
	* delete Menaras
	*
	* @var $id String
	*/
	private function _remove($id) {
		$menara = $this->model_menara->find($id);

		if (!empty($menara->menara_file_berkas)) {
			$path = FCPATH . '/uploads/menara/' . $menara->menara_file_berkas;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		if (!empty($menara->menara_image)) {
			foreach ((array) explode(',', $menara->menara_image) as $filename) {
				$path = FCPATH . '/uploads/menara/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		
		return $this->model_menara->remove($id);
	}
	
	/**
	* Upload Image Menara	* 
	* @return JSON
	*/
	public function upload_menara_file_berkas_file() {
		if (!$this->is_allowed('menara_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'menara',
			'allowed_types' => 'PDF|DOC|DOCX|XLS|XLSX',
		]);
	}

	/**
	* Delete Image Menara	* 
	* @return JSON
	*/
	public function delete_menara_file_berkas_file($uuid) {
		if (!$this->is_allowed('menara_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
			'uuid'              => $uuid, 
			'delete_by'         => $this->input->get('by'), 
			'field_name'        => 'menara_file_berkas', 
			'upload_path_tmp'   => './uploads/tmp/',
			'table_name'        => 'menara',
			'primary_key'       => 'menara_id',
			'upload_path'       => 'uploads/menara/'
		]);
	}

	/**
	* Get Image Menara	* 
	* @return JSON
	*/
	public function get_menara_file_berkas_file($id) {
		if (!$this->is_allowed('menara_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$menara = $this->model_menara->find($id);

		echo $this->get_file([
			'uuid'              => $id, 
			'delete_by'         => 'id', 
			'field_name'        => 'menara_file_berkas', 
			'table_name'        => 'menara',
			'primary_key'       => 'menara_id',
			'upload_path'       => 'uploads/menara/',
			'delete_endpoint'   => 'administrator/menara/delete_menara_file_berkas_file'
		]);
	}
	
	
	/**
	* Upload Image Menara	* 
	* @return JSON
	*/
	public function upload_menara_image_file() {
		if (!$this->is_allowed('menara_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'menara',
		]);
	}

	/**
	* Delete Image Menara	* 
	* @return JSON
	*/
	public function delete_menara_image_file($uuid) {
		if (!$this->is_allowed('menara_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
			'uuid'              => $uuid, 
			'delete_by'         => $this->input->get('by'), 
			'field_name'        => 'menara_image', 
			'upload_path_tmp'   => './uploads/tmp/',
			'table_name'        => 'menara',
			'primary_key'       => 'menara_id',
			'upload_path'       => 'uploads/menara/'
		]);
	}

	/**
	* Get Image Menara	* 
	* @return JSON
	*/
	public function get_menara_image_file($id) {
		if (!$this->is_allowed('menara_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$menara = $this->model_menara->find($id);

		echo $this->get_file([
			'uuid'              => $id, 
			'delete_by'         => 'id', 
			'field_name'        => 'menara_image', 
			'table_name'        => 'menara',
			'primary_key'       => 'menara_id',
			'upload_path'       => 'uploads/menara/',
			'delete_endpoint'   => 'administrator/menara/delete_menara_image_file'
		]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('menara_export');

		$this->model_menara->export(
			'menara', 
			'menara',
			$this->model_menara->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('menara_export');

		$this->model_menara->pdf('menara', 'menara');
	}

	public function single_pdf($id = null) {
		$this->is_allowed('menara_export');

		$table = $title = 'menara';
		$this->load->library('HtmlPdf');
	  
		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight'); 

		$result = $this->db->get($table);
	   
		$data = $this->model_menara->find($id);
		$fields = $result->list_fields();

		$content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
			'data' => $data,
			'fields' => $fields,
			'title' => $title
		], TRUE);

		$this->pdf->initialize($config);
		$this->pdf->pdf->SetDisplayMode('fullpage');
		$this->pdf->writeHTML($content);
		$this->pdf->Output($table.'.pdf', 'H');
	}

	public function ajax_pemohon_id($id = null) {
		if (!$this->is_allowed('menara_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		if ($id != null) {
			$results = db_get_all_data('pemohon', ['pemohon_id' => $id]);
		} else {
			$results = db_get_all_data('pemohon');
		}

		$this->response($results);	
	}

	public function ajax_kecamatan_id($id = null) {
		if (!$this->is_allowed('menara_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		if ($id != null) {
			$results = db_get_all_data('kecamatan', ['kecamatan_id' => $id]);
		} else {
			$results = db_get_all_data('kecamatan');
		}

		$this->response($results);	
	}

	public function ajax_kelurahan_id($id = null) {
		if (!$this->is_allowed('menara_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		if ($id != null) {
			$results = db_get_all_data('kelurahan', ['kecamatan_id' => $id]);
		} else {
			$results = db_get_all_data('kelurahan');
		}

		$this->response($results);	
	}

	public function ajax_tipesite_id($id = null) {
		if (!$this->is_allowed('menara_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		if ($id != null) {
			$results = db_get_all_data('tipe_site', ['tipe_site_id' => $id]);
		} else {
			$results = db_get_all_data('tipe_site');
		}

		$this->response($results);	
	}

	public function ajax_operator_id($id = null) {
		if (!$this->is_allowed('menara_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		if ($id != null) {
			$results = db_get_all_data('operator', ['operator_id' => $id]);
		} else {
			$results = db_get_all_data('operator');
		}

		$this->response($results);	
	}

	public function ajax_kawasan_id($id = null) {
		if (!$this->is_allowed('menara_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		if ($id != null) {
			$results = db_get_all_data('kawasan', ['kawasan_id' => $id]);
		} else {
			$results = db_get_all_data('kawasan');
		}

		$this->response($results);	
	}

	
}


/* End of file menara.php */
/* Location: ./application/controllers/administrator/Menara.php */