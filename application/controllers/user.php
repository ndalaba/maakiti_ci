<?php 
Class User extends Controller {
     const COMMENT=10;
    function __construct(){
        parent::__construct();
        $this->load->model(array('user_model','annonce_model','message_model'));
        header('P3P: CP="CAO PSA OUR"'); 
    }
    function login(){
    	$data['unes']=$this->annonce_model->getFeatured(0,5);
    	$data['titre']="Connection à mon maakiti";
         $data['description']="Petites annonces gratuites d'occasion (immobilier, voiture, moto, produits d'occasion, horlogerie, bijouterie, habillement, services de proximité, ordinateur ...).";
        $data['contents']='login';
        $data['sections']=$this->section_model->getSections();
         $data['id']='';
        $this->load->view('template',$data);
    }
    function logout(){
        $this->session->unset_userdata('email');
        redirect('user/login');
    }
    function connexion(){   
    $data['titre']="Connection à maakiti.com";     
           if(isset($_POST['pseudo'])){
                $query=$this->user_model->checkConnection($_POST['pseudo'],md5($_POST['pwd']));
                if ($query!=NULL){                   
                    $this->session->set_userdata('email',$query->mail);
                    redirect('user/my_annonces');  
                }else{
                    $data['errorConnection']='Adresse email ou mot de passe incorrect';
                    $data['contents']='login';
                    $data['unes']=$this->annonce_model->getFeatured(0,5);    
                    $data['id']='';
                    $this->load->view('template', $data);
                }      
            }else{
            	$data['unes']=$this->annonce_model->getFeatured(0,5);            	 
                $data['contents']='login';
                $data['id']='';
                $this->load->view('template', $data);
            }
            
        }
        function inscription(){
        	$data['titre']="Inscription à maakiti.com";
        	 $data['description']="Inscription à maakiti.com";
           if (isset($_POST['register'])){
                $this->form_validation->set_rules('pseudo', 'Pseudo', 'trim|required|xss_clean');
                $this->form_validation->set_rules('pwd', 'Mot de Passe','trim|required|matches[cpwd]|md5');
                $this->form_validation->set_rules('cpwd', 'Confirmation Nouveau Mot de Passe', 'trim|required');
                $this->form_validation->set_rules('email', 'Adresse Email', 'trim|required|valid_email');
        		if ($this->form_validation->run() == FALSE)
        		{ $data['id']='';
                    $data['contents']='register';
                    $data['unes']=$this->annonce_model->getFeatured(0,5);
                    $this->load->view('template',$data);
                   
        		}
        		else
        		{
        		$req=$this->user_model->checkUser($_POST['email'],$_POST['pseudo']);
                        if($req==true){
                        $this->user_model->add();
                        $this->session->set_userdata('email',$_POST['email']);
                                redirect('user/updateUser');
			    }else{ 
			         $data['id']='';
			        $data['existe']='Cet Pseudo ou Email existe d&eacute;j&agrave;';
			         $data['unes']=$this->annonce_model->getFeatured(0,5);
			        $data['contents']='register';
			        $this->load->view('template',$data);
			    }    
        		} 
            }
            else{
                 $data['id']='';
            	 $data['unes']=$this->annonce_model->getFeatured(0,5);
                $data['contents']='register';
                $this->load->view('template',$data);
            }
        }
     function updateUser(){
       $data['titre']="Modification profil";
        $data['description']="Modification profil";
        if($this->session->userdata('email')){ 
        if (isset($_POST['submit'])){
                $this->form_validation->set_rules('nom', 'Nom et Pr&eacute;noms', 'trim|xss_clean');
                $this->form_validation->set_rules('phone', 'T&eacute;l&eacute;phone', 'trim|xss_clean');
                $this->form_validation->set_rules('adresse','Adresse', 'trim|xss_clean');
                $this->form_validation->set_rules('ville','Ville','trim|xss_clean');
                 $this->form_validation->set_rules('pays','Pays','trim|xss_clean');
                $this->form_validation->set_rules('pwd', 'Mot de Passe','trim|matches[cpwd]|md5');
                $this->form_validation->set_rules('cpwd', 'Confirmation Nouveau Mot de Passe', 'trim');
              	if ($this->form_validation->run() == FALSE)
        		{ $data['id']='profil';
        		    $data['membre']=$this->user_model->getUser($this->session->userdata('email'));
					$data['offline']=$this->annonce_model->countOffline($data['membre']->id_user);
		            $data['online']=$this->annonce_model->countOnline($data['membre']->id_user);
		             $data['total']=$this->annonce_model->CountAnnonceUser($data['membre']->id_user);
                    $data['contents']='modif_profil';
                    $this->load->view('template',$data);
        		}
        		else
        		{
        		   $this->user_model->edit($_POST['id']);
                    redirect('user/profil');
                   
                }    
  		} 
      else{
               $data['id']='profil';
                $data['membre']=$this->user_model->getUser($this->session->userdata('email'));
			    $data['offline']=$this->annonce_model->countOffline($data['membre']->id_user);
	            $data['online']=$this->annonce_model->countOnline($data['membre']->id_user);
            	 $data['total']=$this->annonce_model->CountAnnonceUser($data['membre']->id_user);
                $data['contents']='modif_profil';
                $this->load->view('template',$data);
           }
       }else{ redirect('user/login');}
    }
    function my_messages($nb=0){
       $data['titre']="Mon maakiti - Messages";
        $data['description']="Mon maakiti - les listes messages profils";       
         if($this->session->userdata('email')){
            $session_email=$this->session->userdata('email');
             $data['id']='profil';
            $data['membre']=$this->user_model->getUser($session_email);
            $data['offline']=$this->annonce_model->countOffline($data['membre']->id_user);
            $data['online']=$this->annonce_model->countOnline($data['membre']->id_user);
             $data['total']=$this->annonce_model->CountAnnonceUser($data['membre']->id_user);
            $data['contents']='my_messages';
            $data['my_messages']=$this->message_model->getListbyUser($data['membre']->id_user,$nb,self::COMMENT);
            $config['base_url'] = base_url().'user/my_messages/';
            $config['total_rows'] = $this->message_model->countMessage($data['membre']->id_user);
            $config['per_page'] =self::COMMENT; $config['cur_tag_open'] = '<span class="current">';$config['cur_tag_close'] = '</span>';
            $this->pagination->initialize($config);
            $data['pagination']=$this->pagination->create_links();
        $this->load->view('template',$data);
         }else{ redirect('user/login');}
    }
    function my_annonces($nb=0){
    $data['titre']="Mon maakiti - annonces";
     $data['description']="Petites annonces gratuites d'occasion (immobilier, voiture, moto, produits d'occasion, horlogerie, bijouterie, habillement, services de proximité, ordinateur ...).";
        if($this->session->userdata('email')){
            $session_email=$this->session->userdata('email');
             $data['id']='profil';
            $data['membre']=$this->user_model->getUser($session_email);
            $data['offline']=$this->annonce_model->countOffline($data['membre']->id_user);
            $data['online']=$this->annonce_model->countOnline($data['membre']->id_user); 
            $data['contents']='my_annonces';
            $data['my_annonces']=$this->annonce_model->getAnnonceUser($data['membre']->id_user,$nb,self::COMMENT);
            $config['base_url'] = base_url().'user/my_annonces/';
            $config['total_rows'] = $this->annonce_model->CountAnnonceUser($data['membre']->id_user);
            $data['total']= $config['total_rows'];
            $config['per_page'] =self::COMMENT; $config['cur_tag_open'] = '<span class="current">';$config['cur_tag_close'] = '</span>';
            $this->pagination->initialize($config);
            $data['pagination']=$this->pagination->create_links();
            //print_r($data['my_annonces']);
            $this->load->view('template',$data);
        }else{ redirect('user/login');} 
    }
    function profil($nb=1){
     $data['titre']="Mon maakiti";
        if($this->session->userdata('email')){
             $data['id']='profil';
            $session_email=$this->session->userdata('email');
            $data['membre']=$this->user_model->getUser($session_email);
             $data['description']="profil annonceur maakiti.com - ".$data['membre']->nom;
            $data['offline']=$this->annonce_model->countOffline($data['membre']->id_user);
            $data['online']=$this->annonce_model->countOnline($data['membre']->id_user);
            $data['total']=$this->annonce_model->CountAnnonceUser($data['membre']->id_user);
            $data['contents']='my_annonces';
            $data['my_annonces']=$this->annonce_model->getAnnonceUser($data['membre']->id_user,$nb-1,self::COMMENT);
            $config['base_url'] = base_url().'user/my_annonces/';
            $config['total_rows'] = $this->annonce_model->CountAnnonceUser($data['membre']->id_user);
            $config['per_page'] =self::COMMENT; $config['cur_tag_open'] = '<span class="current">';$config['cur_tag_close'] = '</span>';
           $this->pagination->initialize($config);
            $data['pagination']=$this->pagination->create_links();  
            $this->load->view('template',$data);
        }else{ redirect('user/login');}
    }
    function vue_message($id){
        if($this->session->userdata('email')){
            $session_email=$this->session->userdata('email');
            $data['membre']=$this->user_model->getUser($session_email);
             $data['id']='';
              $data['offline']=$this->annonce_model->countOffline($data['membre']->id_user);
            $data['online']=$this->annonce_model->countOnline($data['membre']->id_user);
            $data['total']=$this->annonce_model->CountAnnonceUser($data['membre']->id_user);

            $data['membre']=$this->user_model->getUser($session_email);
            $data['contents']='vue_message';
            $data['message']=$this->message_model->getOne($id);
            $data['description']=$data['message']->message;
            $data['titre']="Mon maakiti - Messages ";
            $this->load->view('template',$data);
        }else{ redirect('user/login');}
    }
     function deletemessage(){
        if($this->session->userdata('email')){
            $this->message_model->delete($_POST['id']);
        }else{ redirect('user/login');}
    }
    function deleteAnnonce(){
        if($this->session->userdata('email')){
            $this->annonce_model->delete($_POST['id']);
        }else{ redirect('user/login');}
    }
    function change_passw(){
    
     if(isset($_POST['email'])) {
        $this->form_validation->set_rules('email', 'Adresse Email', 'trim|required|valid_email');
        		if ($this->form_validation->run() == FALSE)
        		{ 
        		  $data['error']=validation_errors();
                   
        		}else {
        		   $data['membre']=$this->user_model->getUser($_POST['email']);
                   if(count($data['membre'])==0) {
                      $data['error']='Cet Email n\'existe dans la base de don&eacute;e de Maakiti.com';
                   }
                   else {
                      $val=uniqid();
                      $this->user_model->changePwd($_POST['email'],$val);
                      $data['valid']='Un message contenant votre nouveau mot de passe  vous a &eacute;t&eacute; envoy&eacute; &agrave; l\'adresse suivante  '.$_POST['email'];
                      //$data['pwd']=$val;
                        $this->load->library('email');
                        $this->email->from('contact@maakiti.com','Maakiti');
                        $this->email->to($_POST['email']);
                        $this->email->subject('Mot de passe');
                        $this->email->message('Ceci est un message de http://maakiti.com envoyé à votre demande pour modifier votre mot de passe  Votre nouveau mot de passe est '.$val.'  Vous pourrez le modifier dans votre profil maakiti');
                        $this->email->send();
                   }

        		}
     }   
       $data['unes']=$this->annonce_model->getFeatured(0,5);
       $data['titre']="Modification mot de passe";            	 
       $data['contents']='change_passw';
       $data['sections']=$this->section_model->getSections();
       $data['id']='';
       $this->load->view('template', $data);
    }
    
}?>
