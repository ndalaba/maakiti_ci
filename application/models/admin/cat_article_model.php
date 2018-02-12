<?php
    class Cat_article_model extends Model{
        private $table="categorie_article";
      
        var $categorie_article;
        var $description;
        function __construct(){
            parent::__construct();
        }
        function add(){
            $this->categorie_article=utf8_encode($_POST['cat']);
           
            $this->description=utf8_encode($_POST['content']);
            $this->db->insert($this->table,$this);
        } 
        function edit($id){
            $this->categorie_article=utf8_encode($_POST['cat']);
        
            $this->description=utf8_encode($_POST['content']);
           $this->db->where(array('id'=>intval($id)));
           $this->db->update($this->table,$this); 
        }
        function delete($id){
          $this->db->delete($this->table,array('id'=>intval($id)));  
        }
        function getOne($id){
           
           $this->db->select('*');
            $this->db->from('categorie_article');
            $this->db->where('categorie_article.id', $id); 
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() > 0){
                 return $query->row();  
                }  
        }
        
        function getCategories(){
            $query=$this->db->query("SELECT count(article.id) as titre, categorie_article.id as CID, categorie_article.categorie_article, categorie_article.description
                                      FROM article
                                      RIGHT JOIN categorie_article ON article.categorie_article=categorie_article.id
                                      GROUP BY categorie_article.id");
            return $query->result();
        }
        
    }