<?php 
Class Annonces extends Controller {
        const COMMENT=5;
        function __construct(){
            parent::__construct();
            $this->load->model(array('message_model','annonce_model','user_model','image_model','admin/section_model','admin/categorie_model'));
        }
         function add(){
         $data['titre']="Vous y trouvez tout ce que vous cherchez";
            if($this->session->userdata('email')){
             if(isset($_POST['save'])){
                    $this->form_validation->set_rules('titre', 'Titre', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('ville', 'Ville', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('cat', 'Categorie', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('pays', 'Pays', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('prix','Prix','trim|required|xss_clean');
                    $this->form_validation->set_rules('monnaie', 'Monnaie', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('publier','Publier','trim|required|xss_clean');
                    $this->form_validation->set_rules('description','Description', 'trim|xss_clean');
                    $this->form_validation->set_rules('type_annonce', 'Type annonce','trim|required');
                    if($this->form_validation->run()==FALSE){
                        $data['id']='';
                        $data['contents']='add_annonce';
                        $data['sections']=$this->section_model->getSections();
                        $this->load->view('template',$data);   
                    }else{
                   	    if(isset($_FILES['userfile']) and $_FILES['userfile']['error'][0] == 0){
                   	        $config['upload_path'] = './assets/uploads/'; // server directory
                            $config['allowed_types'] = 'gif|jpg|png'; // by extension, will check for whether it is an image
                            $config['max_size']    = '1000'; // in kb
                            $this->load->library('upload', $config);
                            $this->load->library('Multi_upload');
                            $files = $this->multi_upload->go_upload();
                            if(!$files){
                                $data['id']='';
                                $data['contents']='add_annonce';
                                $data['sections']=$this->section_model->getSections();
                                $data['error']=$this->upload->display_errors();
                                $this->load->view('template', $data);
                            }
                            else{
                                $data=$this->user_model->getUser($this->session->userdata('email'));
                                $idannonce= $this->annonce_model->add($data->id_user);
                                foreach($files as $file) {
                                    $this->image_model->add($idannonce,$file['name']);
                                }
                                redirect('annonces/confirm/'.$idannonce);
                            }
                        }else{
                            $data=$this->user_model->getUser($this->session->userdata('email'));
                            $idannonce=$this->annonce_model->add($data->id_user);
                            $this->session->set_userdata('idannonce',mysql_insert_id());
                            redirect('annonces/confirm/'.$idannonce);
                        }
                    }
            }else{ 
                $data['id']='';
                 $data['contents']='add_annonce';
                 $data['sections']=$this->section_model->getSections();
                 $this->load->view('template',$data);   
            }
        }else{
            redirect('user/login');
            }
    }
    function categorie($id,$nb=20){
        $data['id']='annonces';
        $data['unes']=$this->annonce_model->getFeatured(0,5);
        $config['base_url'] = base_url().'annonces/categorie/'.$id.'/';
        $config['total_rows'] = $this->annonce_model->countBycat($id);
        $config['per_page'] =self::COMMENT; 
        $config['cur_tag_open'] = '<span class="current">';$config['cur_tag_close'] = '</span>';
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();  
        $data['nombre']=$this->annonce_model->countBycat($id);
        $data['contents']='annonces_categorie';
        $data['annonces']=$this->annonce_model->getListBycat($id,$nb);
        $data['categorie']=$this->categorie_model->getOne($id);
        $data['sections']=$this->section_model->getSections();
        $data['titre']=$data['categorie']->categorie;
        $data['description']=character_limiter($data['categorie']->description,195);
        $this->load->view('template',$data);   
    }
    function section($id,$nb=0){
         $data['id']='annonces';
        $data['unes']=$this->annonce_model->getFeatured(0,5);
        $config['base_url'] = base_url().'annonces/section/'.$id.'/';
        $config['total_rows'] = $this->annonce_model->countBysec($id);
        $data['nombre']=$this->annonce_model->countBysec($id);
        $config['per_page'] =self::COMMENT; 
        $config['cur_tag_open'] = '<span class="current">';$config['cur_tag_close'] = '</span>';
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
        $data['sections']=$this->section_model->getSections(); 
        $data['contents']='annonces_section';
        $data['annonces']=$this->annonce_model->getListBysec($id,$nb,self::COMMENT);
        $data['section']=$this->section_model->getOne($id);
        $data['titre']=$data['section']->section;
        $data['description']=character_limiter($data['section']->description,195);
        $this->load->view('template',$data);   
    }
       function ajouterImage(){
               $id=$_POST['id'];
               if(isset($_FILES['image']) and $_FILES['image']['error'] == 0){
    		    	$ext=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                    $image='img'.time().'.'.$ext;
                   $config['upload_path'] = './assets/uploads/';//$_SERVER['DOCUMENT_ROOT']."/maakiti/assets/uploads/";
            		$config['allowed_types'] = 'gif|jpg|png';
                    $config['file_name']= $image;
            		$this->load->library('upload', $config);
                    if($this->upload->do_upload('image')){
                       $this->image_model->add($id,$image);
                        //redirect('admin/home/listingDetail/'.$id);
                        echo '<script type="text/javascript">
                                    parent.addImg("'.$image.'");
                        </script>';
                    }
                    else{
                        echo '<script type="text/javascript">
                                    alert("'.$this->upload->display_errors().'");
                                    history.back()
                             </script>';
                    }
    	    	} //else redirect('admin/home/listingDetail/'.$id);
            }
        function supImage(){
            $image=$_POST['image'];
            $this->image_model->delete($image);
            //unlink('assets/uploads/'.$image);
            echo 'true';
        }    
       function edit(){
             if($this->session->userdata('email')){
             if(isset($_POST['save'])){
                    $this->form_validation->set_rules('titre', 'Titre', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('ville', 'Ville', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('cat', 'Categorie', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('pays', 'Pays', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('prix','Prix','trim|required|xss_clean');
                    $this->form_validation->set_rules('publier','Publier','trim|required|xss_clean');
                    $this->form_validation->set_rules('type_annonce', 'Type annonce','trim|required');
                    if($this->form_validation->run()==FALSE){
                        $data['id']='';
                        $data['annonce']=$this->annonce_model->getannonce($_POST['idannonce']);
                         $data['images']=$this->image_model->getphotobyannonce($_POST['idannonce']);
                        $data['contents']='edit_annonce';
                        $data['sections']=$this->section_model->getSections();
                        $data['titre']="modification annonce ".$data['annonce']->titre;
                        $this->load->view('template',$data);   
                    }else{
                   	    if(isset($_FILES['userfile']) and $_FILES['userfile']['error'][0] == 0){
                   	        $config['upload_path'] = './assets/uploads/'; // server directory
                            $config['allowed_types'] = 'gif|jpg|png'; // by extension, will check for whether it is an image
                            $config['max_size']    = '1000'; // in kb
                            $this->load->library('upload', $config);
                            $this->load->library('Multi_upload');
                            $files = $this->multi_upload->go_upload();
                            if(!$files){
                                 $data['id']='';
                                $data['contents']='edit_annonce';
                                $data['sections']=$this->section_model->getSections();
                                $data['error']=$this->upload->display_errors();
                                $this->load->view('template', $data);
                            }
                            else{
                                $data=$this->user_model->getUser($this->session->userdata('email'));
                                $idannonce= $this->annonce_model->edit($_POST['idannonce'],$data->id_user);
                                foreach($files as $file) {
                                    $this->image_model->add($idannonce,$file['name']);
                                }
                                redirect('user/my_annonces');
                            }
                        }else{
                            $data=$this->user_model->getUser($this->session->userdata('email'));
                            $this->annonce_model->edit($_POST['idannonce'],$data->id_user);
                            $this->session->set_userdata('idannonce',$_POST['idannonce']);
                            redirect('user/my_annonces');
                        }
                    }
            }else{ 
                 $data['id']='';
                 $data['contents']='edit_annonce';
                 $data['sections']=$this->section_model->getSections();
                 $data['titre']="Vous y trouvez tout ce que vous cherchez";                 
                 $this->load->view('template',$data);   
            }
        }else{
            redirect('user/login');
            }
    }
    function confirm($id){
        if($this->session->userdata('email')){
             $data['id']='';
        	$data['annonce']=$this->annonce_model->getannonce($id);
			$data['images']=$this->image_model->getphotobyannonce($id);
            $data['image1']=$this->image_model->getFirst($id);
            $data['unes']=$this->annonce_model->getFeatured(0,5);
            $data['contents']='vue_annonce';
            $data['titre']="Vous y trouvez tout ce que vous cherchez";
            $this->load->view('template',$data);
         }else{
            redirect('user/login');
            }
    }
    function vue_annonce($id){
        if($this->session->userdata('email')){
            $data['annonce']=$this->annonce_model->getannonce($id);
            $data['id']='';
            $data['contents']='edit_annonce';
            $data['sections']=$this->section_model->getSections();
            $data['images']=$this->image_model->getphotobyannonce($id);
            $data['titre']="Vous y trouvez tout ce que vous cherchez";
            $data['description']=character_limiter($data['annonce']->description,195);
            $this->load->view('template',$data);
         }else{
            redirect('user/login');
            }
    }
    function detail($id){
            $data['id']='annonces';
            $data['unes']=$this->annonce_model->getFeatured(0,5);
            $data['annonce1']=$this->annonce_model->getannonce($id);
            $data['user']=$this->user_model->getUserById($data['annonce1']->id_user);
            $data['annonces']=$this->annonce_model->getByCat($data['annonce1']->id_category,10,$id);
            $data['annonces_users']=$this->annonce_model->getListbyUser($data['annonce1']->id_user,0,10);
            $data['views']=$this->annonce_model->getListViews(0,10);
            $data['contents']='detail';
            $data['sections']=$this->section_model->getSections();
            $data['images']=$this->image_model->getphotobyannonce($id);
            $data['image1']=$this->image_model->getFirst($id);
            $data['titre']=$data['annonce1']->titre;
            $data['description']=character_limiter($data['annonce1']->description,195);
            $this->load->view('template',$data);
            $this->db->query('Update annonce set views=views+1 WHERE id_annonce='.$id);
    }
    function ViewAnnonce(){
        $id=$_POST['idA'];
         $this->db->query('Update annonce set views=views+1 WHERE id_annonce='.$id);
         echo 'ok';
    }
    function sendMessage(){ //$config['mailtype'] = 'html'; $this->email->initialize($config);
        
        $this->message_model->add();
        $user=$this->user_model->getUserById($_POST['iduser']);
        $this->load->library('email');
        $config['mailtype'] = 'html'; $this->email->initialize($config);
        $this->email->from("contact@maakiti.com","Maakiti");
        $this->email->to($user->mail);       
        $this->email->subject($_POST['sujet']);
        $this->email->message('Vous avez reçu un message concernant votre annonce  '.$_POST['sujet'].' sur Maakiti , vous pouvez le lire en vous  connectant sur votre espace <a href="http://www.maakiti.com/user/profil">Mon Maakiti</a>');
        $this->email->send();
        $data['succes']="Votre message a été envoyé!";//pas encore fonctionnel
        $data['color']="#008000";//pas encore fonctionnel
        redirect('annonces/detail/'.$_POST['idannonce']);
    }
    function Updatepublication(){
        $this->annonce_model->publication($_POST['id'],$_POST['publier']);
      }
    function rech_avancee(){
         $data['unes']=$this->annonce_model->getFeatured(0,5);
      $this->load->view('rech_avancee',$data);   
    }  
 // TEST 
 function go(){
		// here is pre-search page to generate the criteria
		$part = array();
		foreach(array_keys($_POST) as $key){
		// loop all form field
			$value = trim($this->input->post($key));
			if($value!='' and $key!='smt'){
				// collect all form field but submit button
				$part[] = $key . "_" .$value;
			}
		}
		$criteria = implode("__", $part);
		// join it
		redirect('annonces/search/' . $criteria);
		// you can go now :)
	}
	function search($criteria='all'){
	        //if(isset($_POST['motcle']))          $criteria=$_POST['motcle'];
	        $this->load->library('pagination');
	        //$this->load->helper('car'); /*i put function parsing_criteria here*/
	        $pagination_per_page = 5;
	        $pagination_uri_segment = 4;
	        $pagination_pageno = $this->uri->segment(4)=='' ? 1 : $this->uri->segment(4);
	        /* i put parsing_criteria in a helper
	        $option will contain array of criteria*/
	        $option = parsing_criteria($criteria);
	        /* add `start` and `count` to $option array for the sql query*/
	        $option['start'] = $pagination_pageno-1;
	        $option['count'] = $pagination_per_page;
	        $config = array(
	            'base_url' => base_url().'annonces/search/' . $criteria . "/",
	            'cur_tag_open' => '<span class="current">',
	            'cur_tag_close' => '</span>',
	            /* call some model using $option (array) to be used in sql query */
	            //'total_rows' => $this->car_model->count_car($option),
	            'total_rows'    => $this->annonce_model->countAnnonces($option), 
	            'per_page'      => $pagination_per_page,
	            'uri_segment'   => $pagination_uri_segment
	        );
	        $this->pagination->initialize($config);
	        /* call some model using $option (array) to be used in sql query */
	        $data['annonces'] = $this->annonce_model->search($option);
	        $data['pagination'] = $this->pagination->create_links();
	        $data['news']=$this->article_model->getList(0,6);
	        $data['counts']=$config['total_rows'];
	        if(isset($option['cat'])){
	            $data['nombre']=$this->annonce_model->countBycat($option['cat']);
	        if($option['cat']!='') $data['category']=$this->categorie_model->getOne($option['cat']);
	            else $data['category']='';
	       }        
	        $data['sections']=$this->section_model->getSections();
	        $data['titre']="Vous y trouvez tout ce que vous cherchez";
	        $this->load->view('resultats',$data);   
	}
}
