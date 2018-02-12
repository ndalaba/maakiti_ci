<?php
    class Article_Model extends Model{
        private $table="article";
        var $titre="";
        var $categorie_article="";
        var $contenu="";
        var $ajout="";
        var $image="";
        var $auteur="";
        var $doc="";       
        var $publie='non';
        var $publication="";
        function __construct(){
            parent::__construct();            
        } 
        function getNextNew($id,$cat){
            $query=$this->db->query("SELECT *
            						 FROM article WHERE categorie_article=".$cat." AND id>".intval($id)." AND publication < NOW() LIMIT 0,1");            
            if($query->num_rows()>0)
                return $query->row();
        }
        function getPreviousNew($id,$cat){
           $query=$this->db->query("SELECT * 
           							FROM article WHERE categorie_article=".$cat." AND id<".intval($id)." AND publication < NOW() ORDER BY id DESC LIMIT 0,1");
            if($query->num_rows()>0)
                return $query->row();
        }      
        function add(){
            $this->titre=utf8_encode($_POST['title']);
            $this->categorie_article=intval($_POST['categorie_article']);
            $this->auteur=$_POST['auteur'];
            $this->contenu=utf8_encode($_POST['comment']);              
            $this->ajout=mktime($_POST['hh'],$_POST['mn'],00,$_POST['mm'],$_POST['jj'],$_POST['aa'])-14400;            
            $this->image=$_POST['image']; 
            $this->doc=$_POST['doc'];
            $this->publication=$_POST['aa'].'-'.$_POST['mm'].'-'.$_POST['jj'].' '.$_POST['hh'].':'.$_POST['mn'].':00';
            $this->publie='non';                       
            $this->db->insert($this->table,$this);            
        }
        function edit($id){ 
            $this->db->set('titre',utf8_encode($_POST['title']));            
            $this->db->set('categorie_article',intval($_POST['categorie_article']),false);
            $this->db->set('auteur',$_POST['auteur']);
            $this->db->set('contenu',utf8_encode($_POST['comment']));           
            $this->db->set('image',$_POST['image']); 
            $this->db->set('doc',$_POST['doc']);  
            $this->db->set('ajout',mktime($_POST['hh'],$_POST['mn'],00,$_POST['mm'],$_POST['jj'],$_POST['aa'])-14400,false);                  
            $pub=$_POST['aa'].'-'.$_POST['mm'].'-'.$_POST['jj'].' '.$_POST['hh'].':'.$_POST['mn'].':00';         
            $this->db->set('publication',$pub);                       
            $this->db->where(array('id'=>intval($id)));                                                  
            $this->db->update($this->table);                         
        }
        function delete($id){
            $this->db->delete($this->table,array('id'=>intval($id)));                 
        }                
        function getNewAdmin($id){//R&eacute;cup&eacute;ration d'un article par Admin
            $query=$this->db->get_where($this->table,array('id'=>intval($id),'id_admin'=>$user));
            if($query->num_rows()>0)
                return $query->row();
        }
        function getOne($id){// R&eacute;cup&eacute;ration de l'article 
           $query=$this->db->query('        
           SELECT  article.id AS AID,categorie_article.id AS CID,admin.id AS UID, titre, publication, contenu, ajout, publie, categorie_article.categorie_article, login, image, doc
                                    FROM article
                                    INNER JOIN categorie_article ON categorie_article.id = article.categorie_article
                                    INNER JOIN admin ON admin.id = article.auteur
                                     WHERE article.id='.intval($id));
            if($query->num_rows()>0)
                return $query->row();
        }
        function countNews(){// compter le nombre d'article
            return $this->db->count_all($this->table);
        }
        function countbycat($cat){
            return count($this->db->query("SELECT id FROM article WHERE article.categorie_article='".$cat."'")->result());
        }
        function countPublie(){
            return count($this->db->query("SELECT id FROM article WHERE publie='oui'")->result());
        }
        function countNonPublie(){
            return count($this->db->query("SELECT id FROM article WHERE publie='non'")->result());
        }        
        function getList($dbt=0,$nb){//R&eacute;cup&eacute;ration liste article d'un nombre limit&eacute;            
            $this->db->query("UPDATE article SET publie='oui' WHERE ajout<".time());
            $this->db->query("UPDATE article SET publie='non' WHERE ajout>".time());
            $query=$this->db->query('SELECT article.id as AID,categorie_article.id AS CID, titre, publication, contenu, ajout, publie, categorie_article.categorie_article, login, image, doc
                                    FROM article
                                    INNER JOIN categorie_article ON categorie_article.id = article.categorie_article
                                    INNER JOIN admin ON admin.id = article.auteur
                                    ORDER BY ajout DESC
                                     LIMIT '.$dbt.','.$nb);            
            return $query->result();
        } 
        function getListPublie($dbt=0,$nb){//R&eacute;cup&eacute;ration liste article d'un nombre limit&eacute;            
            $this->db->query("UPDATE article SET publie='oui' WHERE ajout<".time());
            $this->db->query("UPDATE article SET publie='non' WHERE ajout>".time());
            $query=$this->db->query("SELECT article.id as AID,categorie_article.id AS CID, titre, publication, contenu, ajout, publie, categorie_article.categorie_article, login, image, doc
                                    FROM article
                                    INNER JOIN categorie_article ON categorie_article.id = article.categorie_article
                                    INNER JOIN admin ON admin.id = article.auteur
                                    WHERE publie='oui'
                                    ORDER BY ajout DESC
                                     LIMIT ".$dbt.",".$nb);           
            return $query->result();
        } 
          function getListbycat($dbt=0,$nb,$cat){//R&eacute;cup&eacute;ration liste article d'un nombre limit&eacute par categorie_article;            
            $this->db->query("UPDATE article SET publie='oui' WHERE ajout<".time());
            $this->db->query("UPDATE article SET publie='non' WHERE ajout>".time());
            $query=$this->db->query('SELECT article.id as AID, titre, publication, categorie_article.id AS CID,contenu, ajout, publie, categorie_article.categorie_article, login, image, doc
                                    FROM article
                                    INNER JOIN categorie_article ON categorie_article.id = article.categorie_article
                                    INNER JOIN admin ON admin.id = article.auteur
                                     WHERE categorie_article.id='.$cat.'
                                     ORDER BY ajout DESC
                                     LIMIT '.$dbt.','.$nb);            
            return $query->result();
        }
        function getPublie($dbt=0,$nb){//R&eacute;cup&eacute;ration liste article d'un nombre limit&eacute; et publie           
            $query=$this->db->query("SELECT article.id as AID, titre, publication,categorie_article.id AS CID, contenu, ajout, publie, categorie_article.categorie_article, login, image, doc
                                    FROM article
                                    INNER JOIN categorie_article ON categorie_article.id = article.categorie_article
                                    INNER JOIN admin ON admin.id = article.auteur
                                     WHERE publie='oui'
                                     ORDER BY ajout DESC
                                     LIMIT ".$dbt.",".$nb);             
            return $query->result();
        }
         function getNonPublie($dbt=0,$nb){//R&eacute;cup&eacute;ration liste article d'un nombre limit&eacute; et non publie           
            $query=$this->db->query("SELECT article.id as AID, titre, publication,categorie_article.id AS CID, contenu, ajout, publie, categorie_article.categorie_article, login, image, doc
                                    FROM article
                                    INNER JOIN categorie_article ON categorie_article.id = article.categorie_article
                                    INNER JOIN admin ON admin.id = article.auteur
                                     WHERE publie='non'
                                     ORDER BY ajout DESC
                                     LIMIT ".$dbt.",".$nb);            
            return $query->result();
        }
        function getFiltre($dbt=0,$nb){//R&eacute;cup&eacute;ration liste article d'un nombre limit&eacute; et non publie   
             $sql=   "SELECT article.id as AID, titre, publication,categorie_article.id AS CID, contenu, ajout, publie, categorie_article.categorie_article, login, image, doc
                                    FROM article
                                    INNER JOIN categorie_article ON categorie_article.id = article.categorie_article
                                    INNER JOIN admin ON admin.id = article.auteur ";
             if(isset($_POST['cat'])){
                 if($_POST['cat']!=0)
                    $sql.= "WHERE categorie_article.id=".$_POST['cat']." ORDER BY ajout DESC LIMIT ".$dbt.",".$nb;
                 else $sql.= "ORDER BY ajout DESC LIMIT ".$dbt.",".$nb;
             }else $sql.= "ORDER BY ajout DESC LIMIT ".$dbt.",".$nb;
            $query=$this->db->query($sql);            
            return $query->result();
        }  
    
        function getMonthActiv($dbt=0,$nb,$cat,$mois){//R&eacute;cup&eacute;ration liste article d'un nombre limit&eacute par categorie_article;            
            $this->db->query("UPDATE article SET publie='oui' WHERE ajout<".time());
            $this->db->query("UPDATE article SET publie='non' WHERE ajout>".time());
            $annee=date('Y',time());
            $query=$this->db->query('SELECT article.id as AID, titre,categorie_article.id AS CID, publication, contenu, ajout, publie, categorie_article.categorie_article, login, image, doc
                                    FROM article
                                    INNER JOIN categorie_article ON categorie_article.id = article.categorie_article
                                    INNER JOIN admin ON admin.id = article.auteur
                                     WHERE section.id_section='.$cat.' AND YEAR(publication) = '.intval($annee).' AND MONTH(publication) = '.intval($mois).'
                                     ORDER BY ajout DESC
                                     LIMIT '.$dbt.','.$nb);            
            return $query->result();
        }  
        function countbycatMonth($cat,$mois){
            $annee=date('Y',time());
            return count($this->db->query("SELECT id FROM article WHERE article.categorie_article='".$cat."' AND YEAR(publication) = ".intval($annee)." AND MONTH(publication) = ".intval($mois))->result());
        }
                                              
    }