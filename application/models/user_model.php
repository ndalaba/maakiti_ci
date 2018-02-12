<?php
    class User_model extends Model {
        function user_model(){
            parent::Model();
        }
        private $table="user";
        var $id_user='';
        var $nom='';
        var $pwd='';
        var $phone='';
        var $mail='';
        var $ville='';
        var $pays='';          
        var $adresse='';
        var $pseudo='';
        var $dateajout='';
        
        function getUser($email){
            $query = $this->db->get_where($this->table,array('mail' => $email),1);  
            if ($query->num_rows() > 0){
                 return $query->row();  
                }  
        }
        function getUserById($id){
            $query = $this->db->get_where($this->table,array('id_user' => $id),1);  
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
        function checkUser($email,$pseudo){
            $query=$this->db->query("SELECT mail,pseudo FROM user WHERE mail='".$email."' OR pseudo='".$pseudo."'");
            if ($query->num_rows() > 0){
                 return false;  
                }else{ return true;}  
            
        }
        function checkConnection($pseudo,$pwd){
            $query=$this->db->query("SELECT pseudo,pwd,id_user,mail FROM user WHERE mail='".$pseudo."' AND pwd='".md5($pwd)."'");
            if ($query->num_rows() > 0){
                 return $query->row();  
                }
            
        }
        function add(){
            $this->id_user=uniqid();
            $this->pseudo=$_POST['pseudo'];
           $this->nom='';
           $this->pwd=md5($_POST['pwd']);
           $this->phone='';
           $this->mail=$_POST['email'];
           $this->ville='';
           $this->pays='';
           $this->adresse='';
           $this->dateajout=time();                  
           $this->db->insert($this->table,$this);
        }
        function edit($id){
           $data['nom']=$_POST['nom'];
           if($_POST['pwd']=='') $data['pwd']=$_POST['pass'];
                else $data['pwd']=md5($_POST['pwd']);
           $data['phone']=$_POST['phone'];
           $data['ville']=$_POST['ville'];
           $data['pays']=$_POST['pays'];
           $data['adresse']=$_POST['adresse'];    
           $this->db->update($this->table,$data,array('id_user'=>$id));
        }
        function delete($id){
            $this->db->delete($this->table,array('id_user'=>$id));
        }
        function changePwd($email,$pwd){
             $data['pwd']=md5(md5($pwd));
             $this->db->update($this->table,$data,array('mail'=>$email));
        }
    }
 ?>