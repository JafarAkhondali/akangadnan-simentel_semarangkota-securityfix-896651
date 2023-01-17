<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tipe Site Controller
*| --------------------------------------------------------------------------
*| Tipe Site site
*|
*/
class Tipe_site extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_tipe_site');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tipe Sites
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('tipe_site_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tipe_sites'] 		= $this->model_tipe_site->get($filter, $field, $this->limit_page, $offset);
		$this->data['tipe_site_counts'] = $this->model_tipe_site->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tipe_site/index/',
			'total_rows'   => $this->data['tipe_site_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Tipe Site List');
		$this->render('backend/standart/administrator/tipe_site/tipe_site_list', $this->data);
	}
	
	/**
	* Add new tipe_sites
	*
	*/
	public function add() {
		$this->is_allowed('tipe_site_add');

		$this->template->title('Tipe Site New');
		$this->render('backend/standart/administrator/tipe_site/tipe_site_add', $this->data);
	}

	/**
	* Add New Tipe Sites
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('tipe_site_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);

			exit;
		}

		$this->form_validation->set_rules('tipe_site_nama', 'Tipe Site', 'trim|required|max_length[255]');

		if ($this->form_validation->run()) {
			$save_data = [
				'tipe_site_nama' 			=> $this->input->post('tipe_site_nama'),
				'tipe_site_created_at' 		=> date('Y-m-d H:i:s'),
				'tipe_site_user_created' 	=> get_user_data('id'),
			];
			
			$save_tipe_site = $id = $this->model_tipe_site->store($save_data);

			if ($save_tipe_site) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tipe_site;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tipe_site/edit/' . $save_tipe_site, 'Edit Tipe Site'),
						anchor('administrator/tipe_site', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tipe_site/edit/' . $save_tipe_site, 'Edit Tipe Site')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tipe_site');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tipe_site');
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
	* Update view Tipe Sites
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('tipe_site_update');

		$this->data['tipe_site'] = $this->model_tipe_site->find($id);

		$this->template->title('Tipe Site Update');
		$this->render('backend/standart/administrator/tipe_site/tipe_site_update', $this->data);
	}

	/**
	* Update Tipe Sites
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('tipe_site_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$this->form_validation->set_rules('tipe_site_nama', 'Tipe Site', 'trim|required|max_length[255]');
		
		if ($this->form_validation->run()) {
			$save_data = [
				'tipe_site_nama' 			=> $this->input->post('tipe_site_nama'),
				'tipe_site_updated_at' 		=> date('Y-m-d H:i:s'),
				'tipe_site_user_updated' 	=> get_user_data('id'),
			];
			
			$save_tipe_site = $this->model_tipe_site->change($id, $save_data);

			if ($save_tipe_site) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tipe_site', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tipe_site');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tipe_site');
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
	* delete Tipe Sites
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('tipe_site_delete');

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
            set_message(cclang('has_been_deleted', 'tipe_site'), 'success');
        } else {
            set_message(cclang('error_delete', 'tipe_site'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tipe Sites
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('tipe_site_view');

		$this->data['tipe_site'] = $this->model_tipe_site->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Tipe Site Detail');
		$this->render('backend/standart/administrator/tipe_site/tipe_site_view', $this->data);
	}
	
	/**
	* delete Tipe Sites
	*
	* @var $id String
	*/
	private function _remove($id) {
		$tipe_site = $this->model_tipe_site->find($id);
		
		return $this->model_tipe_site->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('tipe_site_export');

		$this->model_tipe_site->export(
			'tipe_site', 
			'tipe_site',
			$this->model_tipe_site->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('tipe_site_export');

		$this->model_tipe_site->pdf('tipe_site', 'tipe_site');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('tipe_site_export');

		$table = $title = 'tipe_site';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tipe_site->find($id);
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
}


/* End of file tipe_site.php */
/* Location: ./application/controllers/administrator/Tipe Site.php */