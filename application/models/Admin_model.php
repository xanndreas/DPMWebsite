<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{
    public function get($tabel)
    {
        return $this->db->get($tabel);
    }
    public function getById($tabel, $field_id, $id)
    {
        return $this->db->get_where($tabel, [$field_id => $id])->row();
    }
     public function getASPbyStatus($tabel, $field_id, $id)
    {
        return $this->db->get_where($tabel, [$field_id => $id])->result();
    }
    public function getASPData($tabel, $field_id, $id)
    {
        return $this->db->get_where($tabel, [$field_id => $id])->result_array();
    }
    public function getLastId($title, $table, $limit)
    {
        $this->db->order_by($title, 'desc');
        return $this->db->get($table, $limit);
    }
    public function insert($tabel, $ins)
    {
        return $this->db->insert($tabel, $ins);
    }
    public function insertBatch($table, $object)
    {
        return $this->db->insert_batch($table, $object);
    }
    public function delete($col, $val, $tabel)
    {
        $this->db->where($col, $val);
        return $this->db->delete($tabel);
    }
    public function update($tabel, $obj, $where)
    {
        return $this->db->update($tabel, $obj, $where);
    }
    public function updateDatas($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    //joinTable dalam bentuk array untuk valuenya
    public function getJoinWhere($tabel, $joinTabel, $joinOn, $where, $whereClause, $attr)
    {

        if ($where != null && $whereClause != null) {
            $this->db->where($where, $whereClause);
        }
        if ($joinTabel != null) {
            $this->db->join($joinTabel, $joinOn);
        }
        if ($attr != null) {
            $this->db->select($attr);
        }
        return $this->db->get($tabel);
    }
    public function getProdi()
    {
        $this->db->distinct();
        $this->db->select('PRODI');
        return $this->db->get('aspirasi_view')->result();
    }
    public function getASP()
    {
        $this->db->join('kategori', 'kategori.KAT_ID = aspirasi.KAT_ID', 'left');
        $this->db->join('oki', 'oki.OKI_ID = aspirasi.OKI_ID', 'left');
        return $this->db->get('aspirasi');
    }
    public function getASPById($id)
    {
        $field = 'aspirasi.ASP_ID, kategori.KAT_NAMA, kategori.TUJUAN, users.NAMA, oki.OKI_NAMA, aspirasi.KONTEN, aspirasi.DATE';
        $this->db->join('kategori', 'kategori.KAT_ID = aspirasi.KAT_ID', 'left');
        $this->db->join('oki', 'oki.OKI_ID = aspirasi.OKI_ID', 'left');
        $this->db->join('users', 'users.NIM = aspirasi.NIM');
        $this->db->where('ASP_ID', $id);
        $this->db->select($field);
        return $this->db->get('aspirasi');
    }
    public function getPlot()
    {
        $field = 'plot_detail.ID_DETAIL, list_alat.ALAT_NAMA , plot.NAMA_PEMINJAM, plot.NAMA_ORGANISASI, plot.TANGGAL_PLOT, plot.TANGGAL_PEMINJAMAN, plot.TANGGAL_PENGEMBALIAN, plot.UNTUK_KEPERLUAN, plot.JAMINAN, plot_detail.JUMLAH, plot.STATUS';
        $this->db->join('plot', 'plot.ID_PEMINJAMAN = plot_detail.ID_PEMINJAMAN', 'left');
        $this->db->join('list_alat', 'list_alat.ALAT_ID = plot_detail.ALAT_ID', 'left');
        $this->db->select($field);
        return $this->db->get('plot_detail');
    }
    public function json($id)
    {
        $this->db->join('list_alat', 'list_alat.ALAT_ID = plot_detail.ALAT_ID', 'left');
        $this->db->where('id_peminjaman', $id);
        return $this->db->get('plot_detail');
    }

    //Gallery Function
    public function deleteGallery($id)
    {
        $this->__deleteGallery($id);
        $this->delete('GALERI_ID', $id, 'galeri');
    }
    public function __deleteGallery($id)
    {
        $Gallery = $this->getById('galeri', 'GALERI_ID', $id);
        $filename = explode(".", $Gallery->GAL_NAMA)[0];
        return array_map('unlink', glob(FCPATH . "uploads/$filename.*"));
    }
    public function __getbyid($field, $fieldname, $fieldvalue)
    {
        $this->db->where($fieldname, $fieldvalue);
        return $this->db->get($field);
    }
    public function modal($id)
    {
        return $this->db->query("SELECT * FROM plot_detail as a 
        JOIN plot as b ON a.ID_PEMINJAMAN = b.ID_PEMINJAMAN
        JOIN list_alat as c ON a.ALAT_ID = c.ALAT_ID
        WHERE a.ID_PEMINJAMAN = $id and c.ALAT_ID = a.ALAT_ID");
    }
}
