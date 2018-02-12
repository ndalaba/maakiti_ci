<?php
    class Admin_model extends Model{
        private $table='admin';
        var $id;
        var $nom;
        var $login;
        var $pwd;
        var $acces;
        function __construct(){
            parent::__construct();
        }
        function checkAdmin(){// V&eacute;rification authentification administrateur
            $login=$_POST['login'];
			$password=sha1($_POST['pwd']);
			$query=$this->db->query("SELECT id FROM admin WHERE login='".$login."' AND pwd='".$password."'");
			if($query->num_rows()>0)
				return $query->row();
        }
        function validAdmin(){// verification de l'existance d'un autre administrateur du m�me login
            $query=$this->db->get_where($this->table, array("login"=>$_POST['login'],"nom"=>$_POST['nom']));
            if($query->num_rows()>0)
                return FALSE;
            else return TRUE;
        }

        function add(){
           $this->id=uniqid();
           $this->nom=utf8_encode($_POST['nom']);
           $this->login=utf8_encode($_POST['login']);
           $this->pwd=sha1($_POST['pwd']);
           $this->acces=intval($_POST['acces']);
           $this->db->insert($this->table,$this);
        }
        function edit($id){
            $this->db->set('login',utf8_encode($_POST['login']));
            $this->db->set('nom',utf8_encode($_POST['nom']));
            $this->db->set('acces',intval($_POST['acces']),false);
            if(strlen($_POST['pwd'])!=0)
                $this->db->set('pwd',sha1($_POST['pwd']));
            $this->db->where(array('id'=>$id));
            $this->db->update($this->table);
        }
        function delete($id,$admin){
            $this->db->query("DELETE FROM admin WHERE id='".$id."' AND id!='".$admin."'");
        }
        function getOne($id){
        	$query=$this->db->get_where($this->table,array('id'=>$id));
			if($query->num_rows()>0)
				return $query->row();
        }
        function getList(){
          $query=$this->db->query("SELECT * FROM admin ORDER BY acces");
          return $query->result();
        }
    }