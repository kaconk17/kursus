<?php

class System_model extends CI_Model{
   

    function login($email, $password){
       
        $this->db->select('*');
        $this->db->from('tb_member');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $this->db->limit(1);
        //$query= $this->db->get_where('tb_member', array('email'=>$email,'password'=>$password));
        $query = $this->db->get();
        if ($query->num_rows()==1) {
           return $query->result();
        } else{
            return false;
        }
        
    }

public function insert_into ($table, $data_member){
        //$query = "INSERT INTO tb_member values($id_member, $nama, $email, $password)";
      $exe = $this->db->insert($table,$data_member);
        return $exe;
    }

public function get_selected($table,$column, $data){
    $result = $this->db->where($column,$data)->get($table)->num_rows();
    return $result;
}

public function get_where($table,$column, $data){
    $result = $this->db->get_where($table, array($column=>$data))->result_array();
    return $result;
}

public function update_data($table, $data, $kondisi){
    $this->db->set($data);
    $this->db->where($kondisi);
    $this->db->update($table);

    return true;
}

public function delete_data($table, $kondis){
    $this->db->delete($table, $kondis);

    return true;
}

public function get_alldata($table){
    $result = $this->db->get($table)->result_array();
    return $result;

}

public function get_join($rowperpage, $rowno){
    $this->db->select('*');
    $this->db->from('tb_kursus');
    $this->db->join('tb_profile', 'tb_profile.id_member = tb_kursus.id_guru');
    $this->db->join('tb_member', 'tb_member.id_member = tb_kursus.id_guru');
    //$this->db->where('tb_member.user_name','kil');
    $this->db->limit($rowperpage,$rowno);
    $query = $this->db->get()->result_array();

    return $query;
}

public function count_cari($column, $data){
    $this->db->select('*');
    $this->db->from('tb_kursus');
    $this->db->join('tb_profile', 'tb_profile.id_member = tb_kursus.id_guru');
    $this->db->join('tb_member', 'tb_member.id_member = tb_kursus.id_guru');
    $this->db->like($column,$data);
    $result = $this->db->get()->num_rows();
    return $result;
}

public function get_condition($rowperpage, $rowno, $column, $data){
    $this->db->select('*');
    $this->db->from('tb_kursus');
    $this->db->join('tb_profile', 'tb_profile.id_member = tb_kursus.id_guru');
    $this->db->join('tb_member', 'tb_member.id_member = tb_kursus.id_guru');
    $this->db->like($column,$data);
    $this->db->limit($rowperpage,$rowno);
    $query = $this->db->get()->result_array();

    return $query;
}



}