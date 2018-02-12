<?php
    class Section_model extends Model{
        private $table="section";
        var $section;
        var $description;
        function __construct(){
            parent::__construct();
        }
         function getOne($id){
             $query = $this->db->get_where($this->table,array('id_section' => $id));  
            if ($query->num_rows() > 0){
                 return $query->row();  
                }  
        }
        function add(){
            $this->section=utf8_encode($_POST['sec']);
            $this->description=utf8_encode($_POST['content']);
            $this->db->insert($this->table,$this);
        } 
        function edit($id){
          $this->section=utf8_encode($_POST['sec']);
           $this->description=utf8_encode($_POST['content']);
           $this->db->where(array('id_section'=>intval($id)));
           $this->db->update($this->table,$this); 
        }
        function delete($id){
          $this->db->delete($this->table,array('id_section'=>intval($id)));  
        }
        function getCat($idsec){
            $query=$this->db->query("SELECT section.section as sec,section.id_section as idsec
                                    FROM  section
                                    WHERE section.id_section = ".$idsec."
                                   
                                    ");
             return $query->result();
        }
        function getSections(){
            $query=$this->db->query("SELECT count(annonce.id_annonce) as titre, section.id_section, section.section, section.description
                                      FROM annonce
                                      RIGHT JOIN categorie
                                      ON annonce.id_category=categorie.id_cat
                                       RIGHT JOIN section
                                      ON section.id_section=categorie.id_section
                                      GROUP BY section.id_section");
            return $query->result();
        }   
    }