<?php
class User_model extends CI_model
{
    private $table_name = 'user';

    public function tambahDataPendaftar()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'gambar' => 'default.jpg',
            'password' => htmlspecialchars(password_hash($this->input->post('password1', true), PASSWORD_DEFAULT)),
            'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
            'fakultas' => htmlspecialchars($this->input->post('fakultas', true)),
            'angkatan' => htmlspecialchars($this->input->post('angkatan', true)),
            'motivasi' => htmlspecialchars($this->input->post('motivasi', true)),
            'role_id' => '2',
            'is_actived' => '1',
            'data_created' => time()


        ];
        $this->db->insert('users', $data);
    }

    public function get()
    {
        $query = $this->db->get($this->table_name);

        return $query->result();
    }
    public function tambah($data)
    {
        $this->db->insert($this->table_name, $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function keamanan()
    {
        $data = $this->session->userdata('email');
        if (empty($data)) {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }
}
