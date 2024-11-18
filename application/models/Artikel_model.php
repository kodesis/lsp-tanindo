<?php
class Artikel_model extends CI_Model
{
    public function get_artikel($limit, $start, $search = '')
    {
        $this->db->select('*');
        $this->db->from('artikel');

        // Jika ada pencarian, tambahkan kondisi pencarian
        if ($search != '') {
            $this->db->like('title', $search);
        }

        $this->db->limit($limit, $start); // Paginasi
        $query = $this->db->get();
        return $query->result_array();
    }
    public function count_all_artikel($search = '')
    {
        $this->db->from('artikel');

        // Jika ada pencarian, tambahkan kondisi pencarian
        if ($search != '') {
            $this->db->like('title', $search);
        }

        return $this->db->count_all_results();
    }
    public function save($data)
    {
        return $this->db->insert('artikel', $data);
    }
    public function update($data, $where)
    {
        $this->db->update('artikel', $data, $where);
    }
    public function delete($uid)
    {
        $this->db->delete('artikel', $uid);
    }
    public function get_artikel_id($id)
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->where('Id', $id);
        $query = $this->db->get();
        return $query->row();
    }
}
