<?php
class Message_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    // Mendapatkan komentar untuk pesan tertentu
    public function get_comments($message_id) {
        $this->db->where('message_id', $message_id);
        $this->db->order_by('created_at', 'ASC');
        $query = $this->db->get('comments');
        return $query->result_array();
    }
    public function get_likes_count($message_id) {
        $this->db->where('message_id', $message_id);
        $this->db->from('likes');  // Asumsi tabel likes menyimpan like

        return $this->db->count_all_results();
    }
    public function get_messages() {
        $this->db->order_by('created_at', 'ASC');
        $query = $this->db->get('messages');
        return $query->result_array();
    }
    public function update_message($message_id, $message) {
        $data = array(
            'message' => $message,
            'edited_at' => date('Y-m-d H:i:s')
        );
    
        $this->db->where('id', $message_id);
        return $this->db->update('messages', $data);
    }
    public function delete_message($message_id) {
        $this->db->where('id', $message_id);
        return $this->db->delete('messages');
    }
    
    public function get_message_owner($message_id) {
        $this->db->select('nim');
        $this->db->from('messages');
        $this->db->where('id', $message_id);
        $query = $this->db->get();
        return $query->row()->nim;
    }
    public function user_liked($message_id, $nim) {
        $this->db->where('message_id', $message_id);
        $this->db->where('nim', $nim);
        $query = $this->db->get('likes');
        return $query->num_rows() > 0;
    }
    public function save_message($nim, $message) {
        $data = array(
            'nim' => $nim,
            'message' => $message,
            'created_at' => date('Y-m-d H:i:s')
        );
    
        return $this->db->insert('messages', $data);
    }
    
    public function save_like($message_id, $nim) {
        if (!$this->user_liked($message_id, $nim)) {
            $data = array(
                'message_id' => $message_id,
                'nim' => $nim
            );
            return $this->db->insert('likes', $data);
        }
        return false;
    }

    // Menyimpan komentar baru
    public function save_comment($message_id, $nim, $comment) {
        $data = array(
            'message_id' => $message_id,
            'nim' => $nim,
            'comment' => $comment
        );
        return $this->db->insert('comments', $data);
    }
}
?>
