
    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Simpan pesan baru
    public function save_message($nim, $message, $image_path = null) {
        $data = [
            'nim' => $nim,
            'message' => $message,
            'image_path' => $image_path,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        return $this->db->insert('messages', $data);
    }

    // Ambil semua pesan beserta data terkait
    public function get_messages() {
        $this->db->select('*');
        $this->db->from('messages');
        $this->db->order_by('created_at', 'DESC');
        $messages = $this->db->get()->result_array();

        // Tambahkan jumlah like dan komentar pada setiap pesan
        foreach ($messages as &$message) {
            $message['like_count'] = $this->get_likes_count($message['id']);
            $message['comments'] = $this->get_comments($message['id']);
        }

        return $messages;
    }

    // Ambil semua komentar untuk pesan tertentu
    public function get_comments($message_id) {
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->where('message_id', $message_id);
        $this->db->order_by('created_at', 'ASC');
        $comments = $this->db->get()->result_array();

        // Tambahkan balasan untuk setiap komentar
        foreach ($comments as &$comment) {
            $comment['replies'] = $this->get_replies($comment['id']);
        }

        return $comments;
    }

    // Ambil semua balasan untuk komentar tertentu
    public function get_replies($comment_id) {
        $this->db->select('*');
        $this->db->from('replies');
        $this->db->where('comment_id', $comment_id);
        $this->db->order_by('created_at', 'ASC');
        return $this->db->get()->result_array();
    }
    public function get_reply_by_id($reply_id) {
        $this->db->select('*');
        $this->db->from('replies');
        $this->db->where('id', $reply_id);
        return $this->db->get()->row_array();
    }
    


    // Simpan komentar baru
    public function save_comment($message_id, $nim, $comment) {
        $data = [
            'message_id' => $message_id,
            'nim' => $nim,
            'comment' => $comment,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        return $this->db->insert('comments', $data);
    }

    // Simpan balasan komentar
    public function add_reply($comment_id, $message_id, $reply, $nim) {
        $data = [
            'comment_id' => $comment_id,
            'message_id' => $message_id,
            'nim' => $nim,
            'reply' => $reply,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        return $this->db->insert('replies', $data);
    }

    // Tambahkan like pada pesan
    public function like_message($message_id, $nim) {
        $data = [
            'message_id' => $message_id,
            'nim' => $nim,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        return $this->db->insert('likes', $data);
    }

    // Batalkan like pada pesan
    public function unlike_message($message_id, $nim) {
        $this->db->where('message_id', $message_id);
        $this->db->where('nim', $nim);
        return $this->db->delete('likes');
    }

    // Periksa apakah pengguna sudah menyukai pesan
    public function user_liked($message_id, $nim) {
        $this->db->where('message_id', $message_id);
        $this->db->where('nim', $nim);
        return $this->db->get('likes')->num_rows() > 0;
    }

    // Hitung jumlah like untuk pesan tertentu
    public function get_likes_count($message_id) {
        $this->db->where('message_id', $message_id);
        return $this->db->count_all_results('likes');
    }

    // Hapus pesan
    public function delete_message($message_id) {
        $this->db->where('id', $message_id);
        return $this->db->delete('messages');
    }

    // Update pesan
    public function update_message($message_id, $message) {
        $data = ['message' => $message];
        $this->db->where('id', $message_id);
        return $this->db->update('messages', $data);
    }

    // Hapus komentar
    public function delete_comment($comment_id) {
        $this->db->where('id', $comment_id);
        return $this->db->delete('comments');
    }

    // Update komentar
    public function update_comment($comment_id, $data) {
        $this->db->where('id', $comment_id);
        return $this->db->update('comments', $data);
    }

    // Hapus balasan
    public function delete_reply($reply_id) {
        $this->db->where('id', $reply_id);
        return $this->db->delete('replies');
    }

    // Update balasan
    public function edit_reply($reply_id, $data) {
        $this->db->where('id', $reply_id);
        return $this->db->update('replies', $data);
    }

    // Ambil pemilik pesan
    public function get_message_owner($message_id) {
        $this->db->select('nim');
        $this->db->from('messages');
        $this->db->where('id', $message_id);
        $result = $this->db->get()->row_array();
        return $result['nim'] ?? null;
    }

    // Ambil komentar berdasarkan ID
    public function get_comment_by_id($comment_id) {
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->where('id', $comment_id);
        return $this->db->get()->row_array();
    }
}

    

?>