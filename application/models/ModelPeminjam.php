<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPeminjam extends CI_Model {

    //manajemen peminjam
    public function getPeminjam() { 
        return $this->db->get('peminjam'); 
    } 
    
    public function peminjamWhere($where) { 
        return $this->db->get_where('peminjam', $where); 
    } 
    
    public function simpanPeminjam($data = null) { 
        $this->db->insert('peminjam',$data); 
    } 
    
    public function updatePeminjam($data = null, $where = null) { 
        $this->db->update('peminjam', $data, $where); 
    } 
    
    public function hapusPeminjam($where = null) { 
        $this->db->delete('peminjam', $where); 
    } 
    
    public function total($field, $where) { 
        $this->db->select_sum($field); 
        if(!empty($where) && count($where) > 0){ 
            $this->db->where($where); 
        } 
        $this->db->from('peminjam'); 
        return $this->db->get()->row($field); 
    }

    //join 
   public function joinJudulBuku($where) { $this->db->select('buku.judul_buku,peminjam.judul_buku'); 
       $this->db->from('buku'); $this->db->join('peminjam','buku.judul_buku = peminjam.judul_buku'); 
        $this->db->where($where); return $this->db->get(); 
    } 

    //function joinJudulBuku(){
        //$this->db->select('*');
       // $this->db->from('peminjam');
        //$this->db->join('buku','buku.judul_buku = peminjam.judul_buku');      
        //$query = $this->db->get();
        //return $query;
     }
  
    
