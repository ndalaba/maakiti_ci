<?php
    class Pub_model extends Model {
        function pub_model(){
            parent::Model();
        }
        private $table="pub";
        var $titre='';
        var $description='';
        var $image='';
        var $lien='';
        var $debut='';
        var $fin='';          
        var $entreprise='';
      
        
        function getPub($id){
            $query = $this->db->get_where($this->table,array('id' =>intval($id)),1);  
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
        function add($image){
           $this->titre=$_POST['titre'];
           $this->description=$_POST['description'];
           $this->image=$image; 
           $this->lien=$_POST['lien'];
           $this->debut=$_POST['debut'];
           $this->fin=$_POST['fin'];
           $this->entreprise=$_POST['entreprise'];                   
           $this->db->insert($this->table,$this);
        }
        function edit($id,$image){
           $this->titre=$_POST['titre'];
           $this->description=$_POST['description'];
           $this->image=$image; 
           $this->lien=$_POST['lien'];
           $this->debut=$_POST['debut'];
           $this->fin=$_POST['fin'];
           $this->entreprise=$_POST['entreprise']; 
            $this->db->update($this->table,$this,array('id_user'=>intval($id)));
        }
        function delete($id){
            $this->db->delete($this->table,array('id_user'=>intval($id)));
        }
    }
 ?>