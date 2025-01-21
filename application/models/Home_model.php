<?php
class Home_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function insert($data_insert)
  {
    $this->db->insert('user_ktna', $data_insert);
  }

  public function get_nomor()
  {
    return $this->db->select('max(nomor) as max')->get('user_ktna')->row_array();
  }
  public function get_nomor_urut()
  {
    return $this->db->select('max(nomor_urut) as nomor_max')->get('user_ktna')->row_array();
  }

  public function get_artikel($limit, $start, $search = '')
  {
    $this->db->select('*');
    $this->db->from('artikel');

    // Jika ada pencarian, tambahkan kondisi pencarian
    if ($search != '') {
      $this->db->like('title', $search);
    }
    $this->db->order_by('tanggal', 'DESC');
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
    $this->db->order_by('tanggal', 'DESC');

    return $this->db->count_all_results();
  }
  public function get_artikel_populer()
  {
    $this->db->select('*');
    $this->db->from('artikel');
    $this->db->order_by('view_count', 'DESC');
    $this->db->limit(4);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_artikel_id($id)
  {
    $this->db->select('*');
    $this->db->from('artikel');
    $this->db->where('Id', $id);
    $query = $this->db->get();
    return $query->row();
  }
  public function update_count($id)
  {
    $this->db->set('view_count', 'view_count + 1', FALSE); // FALSE prevents escaping of the expression
    $this->db->where('Id', $id);
    $this->db->update('artikel'); // Replace 'your_table_name' with your actual table name
  }

  public function artikel_trending_now_1()
  {
    $this->db->select('*');
    $this->db->from('artikel');

    // Filter for articles within the last 7 days
    $this->db->where('tanggal >=', date('Y-m-d', strtotime('-7 days')));
    $this->db->where('tanggal <=', date('Y-m-d')); // Optional: up to today's date

    $this->db->order_by('view_count', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->row();
  }

  public function artikel_trending_now_2()
  {
    $this->db->select('*');
    $this->db->from('artikel');
    $this->db->order_by('view_count', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->row();
  }

  public function artikel_sub_trending_1()
  {
    $trending = $this->artikel_trending_now_1();

    // Get trending article 2 only if trending article 1 is empty
    if (empty($trending)) {
      $trending = $this->artikel_trending_now_2(); // Use trending 2 as fallback
    }

    // Get trending article 2 (for sub-trending), ensuring it does not include trending_1
    $this->db->select('*');
    $this->db->from('artikel');

    // Exclude the article used for trending (either trending_1 or trending_2)
    $this->db->where_not_in('Id', [$trending->Id]);

    $this->db->order_by('view_count', 'DESC');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }

  public function artikel_sub_trending_2()
  {
    // Get trending article 1
    $trending_1 = $this->artikel_trending_now_1();

    // Get trending article 2 only if trending article 1 is empty
    if (empty($trending_1)) {
      $trending_1 = $this->artikel_trending_now_2(); // Use trending 2 as fallback
    }

    // Get sub-trending article 1
    $sub_trending_1 = $this->artikel_sub_trending_1();

    // Collect the IDs of articles to exclude (trending_1, trending_2, and sub_trending_1)
    $exclude_ids = array_merge([$trending_1->Id], [$sub_trending_1[0]->Id]);

    // Get trending article 2 (for sub-trending), ensuring it does not include trending_1, trending_2, or sub_trending_1
    $this->db->select('*');
    $this->db->from('artikel');

    // Exclude the articles that are part of trending_1, trending_2, and sub_trending_1
    $this->db->where_not_in('Id', $exclude_ids);

    $this->db->order_by('view_count', 'DESC');
    $this->db->limit(5);
    $query = $this->db->get();
    return $query->result();
  }
  public function artikel_weekly_topnews()
  {
    // Get trending article 1
    $trending_1 = $this->artikel_trending_now_1();

    // Get trending article 2 only if trending article 1 is empty
    if (empty($trending_1)) {
      $trending_1 = $this->artikel_trending_now_2(); // Use trending 2 as fallback
    }

    // Get sub-trending article 1
    $sub_trending_1 = $this->artikel_sub_trending_1();

    // Get sub-trending article 2
    $sub_trending_2 = $this->artikel_sub_trending_2();

    // Initialize the exclude_ids array
    $exclude_ids = [];

    // Add trending_1 ID if it exists
    if ($trending_1) {
      $exclude_ids[] = $trending_1->Id;
    }

    // Add sub_trending_1 ID if it exists
    if (!empty($sub_trending_1)) {
      $exclude_ids[] = $sub_trending_1[0]->Id; // Assuming it's an array and you want the first element
    }

    // Add sub_trending_2 ID if it exists
    if (!empty($sub_trending_2)) {
      $exclude_ids[] = $sub_trending_2[0]->Id; // Assuming it's an array and you want the first element
    }

    // Get weekly top news, ensuring it does not include trending_1, trending_2, sub_trending_1, or sub_trending_2
    $this->db->select('*');
    $this->db->from('artikel');

    // Exclude the articles that are part of trending_1, trending_2, sub_trending_1, and sub_trending_2
    if (!empty($exclude_ids)) {
      $this->db->where_not_in('Id', $exclude_ids);
    }

    $this->db->order_by('view_count', 'DESC');
    $this->db->limit(5);
    $query = $this->db->get();
    return $query->result();
  }
}
