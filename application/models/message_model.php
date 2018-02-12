<?php
    class Message_model extends Model {
        function message_model(){
            parent::Model();
        }
        private $table="message";
        var $id_annonce='';
        var $id_user='';
        var $nom='';
        var $mail='';
        var $phone='';
        var $sujet='';
        var $message='';
        var $datemessage='';
      
        function getOne($id){
            $query = $this->db->get_where($this->table,array('id_message' => $id),1);  
            if ($query->num_rows() > 0){
                 return $query->row();  
                }  
        }
        function getList(){
             $query = $this->db->get_where($this->table);  
            if ($query->num_rows() > 0){
                 return $query->result();  
                }  
        }
        function getListbyUser($iduser,$nb,$debut){
             $query = $this->db->get_where($this->table,array('id_user' => $iduser),$debut,$nb);  
            if ($query->num_rows() > 0){
                 return $query->result();  
                }  
        }
        function countMessage($iduser){
            $query = $this->db->get_where($this->table,array('id_user' => $iduser));  
           
                 return count($query->result());  
              
        }
        function add(){
            $this->id_annonce=$_POST['idannonce'];
            $this->id_user=$_POST['iduser'];
            $this->nom=$_POST['nom'];
            $this->mail=$_POST['mail'];
            $this->phone=$_POST['phone'];
            $this->sujet=$_POST['sujet'];
            $this->datemessage=time();
            $this->message=$_POST['message'];
            $this->db->insert($this->table,$this);
        }
        function edit($id){
            $this->id_annonce=$_POST['idannonce'];
            $this->id_user=$_POST['iduser'];
            $this->nom=$_POST['nom'];
            $this->mail=$_POST['mail'];
            $this->phone=$_POST['phone'];
            $this->sujet=$_POST['sujet'];
            $this->message=$_POST['message'];
            $this->db->update($this->table,$this,array('id_message'=>$id));
        }
        function delete($id){
            $this->db->delete($this->table,array('id_message'=>$id));
        }
        
    }
 ?>