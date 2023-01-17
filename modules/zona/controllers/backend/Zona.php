<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Zona Controller
*| --------------------------------------------------------------------------
*| Zona site
*|
*/
class Zona extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_zona');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Zonas
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('zona_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['zonas'] = $this->model_zona->get($filter, $field, $this->limit_page, $offset);
		$this->data['zona_counts'] = $this->model_zona->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/zona/index/',
			'total_rows'   => $this->data['zona_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Zona List');
		$this->render('backend/standart/administrator/zona/zona_list', $this->data);
	}
	
	/**
	* Add new zonas
	*
	*/
	public function add() {
		$this->is_allowed('zona_add');

		$this->template->title('Zona New');
		$this->render('backend/standart/administrator/zona/zona_add', $this->data);
	}

	/**
	* Add New Zonas
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('zona_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('kecamatan_id', 'Nama Kecamatan', 'trim|required');
		$this->form_validation->set_rules('zona_nama', 'Nama Zona', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('zona_lat_lng', 'Latitude & Longitude', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('zona_radius', 'Radius', 'trim|required|max_length[255]');

		if ($this->form_validation->run()) {
			$lat_lng = explode(', ', $this->input->post('zona_lat_lng'));

			$save_data = [
				'kecamatan_id' 		=> $this->input->post('kecamatan_id'),
				'zona_nama' 		=> $this->input->post('zona_nama'),
				'zona_longitude' 	=> $lat_lng[1],
				'zona_latitude' 	=> $lat_lng[0],
				'zona_radius' 		=> $this->input->post('zona_radius'),
				'zona_user_created' => get_user_data('id'),
				'zona_created_at' 	=> date('Y-m-d H:i:s'),
			];
			
			$save_zona = $id = $this->model_zona->store($save_data);

			if ($save_zona) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_zona;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/zona/edit/' . $save_zona, 'Edit Zona'),
						anchor('administrator/zona', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/zona/edit/' . $save_zona, 'Edit Zona')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/zona');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/zona');
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
	* Update view Zonas
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('zona_update');

		$this->data['zona'] = $this->model_zona->find($id);

		$this->template->title('Zona Update');
		$this->render('backend/standart/administrator/zona/zona_update', $this->data);
	}

	/**
	* Update Zonas
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('zona_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('kecamatan_id', 'Nama Kecamatan', 'trim|required');
		$this->form_validation->set_rules('zona_nama', 'Nama Zona', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('zona_lat_lng', 'Latitude & Longitude', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('zona_radius', 'Radius', 'trim|required|max_length[255]');
		
		if ($this->form_validation->run()) {
			$lat_lng = explode(', ', $this->input->post('zona_lat_lng'));

			$save_data = [
				'kecamatan_id' 		=> $this->input->post('kecamatan_id'),
				'zona_nama' 		=> $this->input->post('zona_nama'),
				'zona_longitude' 	=> $lat_lng[1],
				'zona_latitude' 	=> $lat_lng[0],
				'zona_radius' 		=> $this->input->post('zona_radius'),
				'zona_user_updated' => get_user_data('id'),
				'zona_updated_at' 	=> date('Y-m-d H:i:s'),
			];
			
			$save_zona = $this->model_zona->change($id, $save_data);

			if ($save_zona) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/zona', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/zona');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/zona');
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
	* delete Zonas
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('zona_delete');

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
            set_message(cclang('has_been_deleted', 'zona'), 'success');
        } else {
            set_message(cclang('error_delete', 'zona'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Zonas
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('zona_view');

		$this->data['zona'] = $this->model_zona->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Zona Detail');
		$this->render('backend/standart/administrator/zona/zona_view', $this->data);
	}
	
	/**
	* delete Zonas
	*
	* @var $id String
	*/
	private function _remove($id) {
		$zona = $this->model_zona->find($id);
		
		return $this->model_zona->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('zona_export');

		$this->model_zona->export(
			'zona', 
			'zona',
			$this->model_zona->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('zona_export');

		$this->model_zona->pdf('zona', 'zona');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('zona_export');

		$table = $title = 'zona';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_zona->find($id);
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

	public function ajax_kecamatan_id($id = null) {
		if (!$this->is_allowed('zona_list', false)) {
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
}


/* End of file zona.php */
/* Location: ./application/controllers/administrator/Zona.php */