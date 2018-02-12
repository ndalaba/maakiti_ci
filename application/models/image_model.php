<?php
    class Image_model extends Model {
        function image_model(){
            parent::Model();
        }
        private $table="image";
        var $image='';
        var $id_annonce='';
        function getphoto($id){
            $query = $this->db->get_where($this->table,array('id_image' => $id),1);  
            if ($query->num_rows() > 0){
                 return $query->row();  
                }  
        }
        function getphotobyannonce($id){
            $query = $this->db->get_where($this->table,array('id_annonce' => $id));  
            if ($query->num_rows() > 0){
                 return $query->result();  
                }  
        }
        function getFirst($id){
            $query = $this->db->get_where($this->table,array('id_annonce' => $id));  
            if ($query->num_rows() > 0){
                 return $query->row()->image;  
                }  
        }
        function getList(){
             $query = $this->db->get_where($this->table);  
            if ($query->num_rows() > 0){
                 return $query->result();  
                }  
        }
        function add($idannonce,$img){
            $this->image=$img;
            $this->id_annonce=$idannonce;
            $this->db->insert($this->table,$this);
        }
        function edit($id,$idannonce){
            $this->section=$_POST['section'];
            $this->db->update($this->table,$this,array('idphoto'=>$id,'idannonce'=>$idannonce));
        }
        function delete($id){
            $this->db->delete($this->table,array('image'=>$id));
        }
    }
 ?>