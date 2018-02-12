<?php
    class Admin extends Controller{
        function __construct(){
            parent::__construct();
              $this->load->model(array('admin/admin_model','admin/article_model','admin/Section_model','admin/categorie_model'));
                   
        }
        function index(){
            if($this->session->userdata('id')){
               $data['admin']=$this->admin_model->getOne($this->session->userdata('id'));
               $data['content']='admin/admin';
               if($data['admin']->acces!=1) redirect('admin/home');
                  
               $data['titre']='Administration de Deal-Africa';              
               $data['admins']=$this->admin_model->getList();
               $this->load->view('admin/home',$data); 
            } 
            else $this->connection();          
        }
        function connection(){ 
            $data['titre']="Connection à l'admin de Deal-Africa";
            $data['error']="";
            if(isset($_POST['login'])){        		       	        		
                $this->form_validation->set_rules('login','Votre login','trim|required');
                $this->form_validation->set_rules('pwd','Mot de passe','trim|required');
                if($this->form_validation->run()==FALSE)
                    $this->load->view('admin/connection',$data);
                else{        		 	
                    $query=$this->admin_model->checkAdmin();       		 	
                    if(isset($query)){
                        $this->session->set_userdata(array('id'=>$query->id));
                        redirect("admin/home/");
                    }
                    else{
                        $data['error']="Le login ou le mot de passe que vous avez saisi est incorrect!";
                        $this->load->view('admin/connection',$data);
                    }      		 	
                }        		        			
            }
            else $this->load->view('admin/connection',$data);            
        }
        function deconnection(){
       	    $this->session->sess_destroy();
        	redirect('admin/home');
        }
       function addAdmin(){                           
            if(isset($_POST['login'])){
               $this->form_validation->set_rules('login','Login','trim|required');
               $this->form_validation->set_rules('pwd','Mot de passe','trim|required');
               $this->form_validation->set_rules('acces','Niveau Accès','trim|required');
               if($this->form_validation->run()==FALSE)
                    echo 'Certains champs du formulaire ne sont pas bien remplis!';
               else {
                    if($this->admin_model->validAdmin()){
                       $this->admin_model->add();                                                 
                       redirect('admin/admin/');  
                    }
                    else echo 'Ce administratreur exite d&eacute;ja!';              
                }
            }                               
        }
        function editAdmin(){           
           $this->admin_model->edit($_POST['id']);
        }
        function delete(){
            $this->admin_model->delete($_POST['id'],$this->session->userdata('id'));           
        }
    }