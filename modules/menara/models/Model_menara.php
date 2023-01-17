<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_menara extends MY_Model {

    private $primary_key    = 'menara_id';
    private $table_name     = 'menara';
    public $field_search   = ['operator_id', 'menara_nama', 'menara_kondisi', 'pemohon.pemohon_nama', 'kecamatan.kecamatan_nama', 'kelurahan.kelurahan_nama', 'tipe_site.tipe_site_nama', 'operator.operator_nama', 'kawasan.kawasan_nama'];
    public $sort_option = ['menara_id', 'DESC'];
    
    public function __construct()
    {
        $config = array(
            'primary_key'   => $this->primary_key,
            'table_name'    => $this->table_name,
            'field_search'  => $this->field_search,
            'sort_option'   => $this->sort_option,
         );

        parent::__construct($config);
    }

    public function count_all($q = null, $field = null)
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                $f_search = "menara.".$field;

                if (strpos($field, '.')) {
                    $f_search = $field;
                }
                if ($iterasi == 1) {
                    $where .=  $f_search . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " .  $f_search . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "menara.".$field . " LIKE '%" . $q . "%' )";
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        return $query->num_rows();
    }

    public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                $f_search = "menara.".$field;
                if (strpos($field, '.')) {
                    $f_search = $field;
                }

                if ($iterasi == 1) {
                    $where .= $f_search . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " .$f_search . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "menara.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        
        $this->sortable();
        
        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable() {
        $this->db->join('pemohon', 'pemohon.pemohon_id = menara.pemohon_id', 'LEFT');
        $this->db->join('kecamatan', 'kecamatan.kecamatan_id = menara.kecamatan_id', 'LEFT');
        $this->db->join('kelurahan', 'kelurahan.kelurahan_id = menara.kelurahan_id', 'LEFT');
        $this->db->join('tipe_site', 'tipe_site.tipe_site_id = menara.tipesite_id', 'LEFT');
        $this->db->join('operator', 'operator.operator_id = menara.operator_id', 'LEFT');
        $this->db->join('kawasan', 'kawasan.kawasan_id = menara.kawasan_id', 'LEFT');
        
        $this->db->select('pemohon.pemohon_nama,kecamatan.kecamatan_nama,kelurahan.kelurahan_nama,tipe_site.tipe_site_nama,operator.operator_nama,kawasan.kawasan_nama,menara.*,pemohon.pemohon_nama as pemohon_pemohon_nama,pemohon.pemohon_nama as pemohon_nama,kecamatan.kecamatan_nama as kecamatan_kecamatan_nama,kecamatan.kecamatan_nama as kecamatan_nama,kelurahan.kelurahan_nama as kelurahan_kelurahan_nama,kelurahan.kelurahan_nama as kelurahan_nama,tipe_site.tipe_site_nama as tipe_site_tipe_site_nama,tipe_site.tipe_site_nama as tipe_site_nama,operator.operator_nama as operator_operator_nama,operator.operator_nama as operator_nama,kawasan.kawasan_nama as kawasan_kawasan_nama,kawasan.kawasan_nama as kawasan_nama');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            }

        return $this;
    }

}

/* End of file Model_menara.php */
/* Location: ./application/models/Model_menara.php */