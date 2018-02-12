<?php
    class Categorie_model extends Model{
        private $table="categorie";
        var $id_section;
        var $categorie;
        var $description;
        function __construct(){
            parent::__construct();
        }
        function add(){
            $this->categorie=utf8_encode($_POST['cat']);
            $this->id_section=utf8_encode($_POST['sec']);
            $this->description=utf8_encode($_POST['content']);
            $this->db->insert($this->table,$this);
        } 
        function edit($id){
            $this->categorie=utf8_encode($_POST['cat']);
            $this->id_section=utf8_encode($_POST['sec']);
            $this->description=utf8_encode($_POST['content']);
           $this->db->where(array('id_cat'=>intval($id)));
           $this->db->update($this->table,$this); 
        }
        function delete($id){
          $this->db->delete($this->table,array('id_cat'=>intval($id)));  
        }
        function getOne($id){
          
           $this->db->select('*,categorie.description as CATD');
            $this->db->from('categorie');
            $this->db->join('section', 'categorie.id_section=section.id_section  ');
            $this->db->where('categorie.id_cat', $id); 
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() > 0){
                 return $query->row();  
                }  
        }
        
        function getCategories(){
            $query=$this->db->query("SELECT count(annonce.id_annonce) as titre, categorie.id_cat, categorie.categorie, categorie.description 
                                      FROM annonce
                                      RIGHT JOIN categorie ON annonce.id_category=categorie.id_cat
                                      GROUP BY categorie.id_cat");
            return $query->result();
        }
        function getListbySec($idsec){
             $query = $this->db->get_where($this->table,array('id_section' => $idsec));  
            if ($query->num_rows() > 0){
                 return $query->result();  
                }  
        }   
    }