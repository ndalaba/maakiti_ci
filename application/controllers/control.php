<?php
class Control extends Controller {
	function control()
	{
		parent::Controller();
        $this->load->model('admin/cat_article_model');	
	}
    function index(){
        
        redirect('control/accueil');
    }
    function newsletter()
	{
		$data['annonces']=$this->annonce_model->getLast(0,7);
        $this->load->view('nl', $data);
	}
    function accueil()
	{
        $data['news']=$this->article_model->getListPublie(0,3);
        $data['contents'] = 'index';
        $data['css']='global.css';
        $data['id']='accueil';
        $data['views']=$this->annonce_model->getListViews(0,10);
        $data['sections']=$this->section_model->getSections();
        $data['unes']=$this->annonce_model->getFeatured(0,10);
	$data['annonces']=$this->annonce_model->getLast(0,7);
	$data['titre']="Vous y trouvez tout ce que vous cherchez";
    $data['description']="Petites annonces gratuites d'occasion (immobilier, voiture, moto, produits d'occasion, horlogerie, bijouterie, habillement, services de proximité, ordinateur ...).";
        $this->load->view('template', $data);
	}
	function apropos()
	{   $data['id']='apropos';     
        $data['contents'] = 'about';
        $data['css']='global.css';
		 $data['unes']=$this->annonce_model->getFeatured(0,5);
        $data['sections']=$this->section_model->getSections();
        $data['titre']="A propos de Maakiti.com";
        $data['description']="Petites annonces gratuites d'occasion (immobilier, voiture, moto, produits d'occasion, horlogerie, bijouterie, habillement, services de proximité, ordinateur ...).";
        $this->load->view('template', $data);
	}
    	function regles_generales()
	{   $data['id']='';     
        $data['contents'] = 'regles_generales';
        $data['css']='global.css';
		 $data['unes']=$this->annonce_model->getFeatured(0,5);
        $data['sections']=$this->section_model->getSections();
        $data['titre']="Règles générales";
        $data['description']="Petites annonces gratuites d'occasion (immobilier, voiture, moto, produits d'occasion, horlogerie, bijouterie, habillement, services de proximité, ordinateur ...).";
        $this->load->view('template', $data);
	}
	function help()
	{    $data['id']='help';     
        $data['contents'] = 'help';
        $data['css']='global.css';
		$data['unes']=$this->annonce_model->getFeatured(0,5);
        $data['sections']=$this->section_model->getSections();
        $data['titre']="Aide";
        $data['description']="Petites annonces gratuites d'occasion (immobilier, voiture, moto, produits d'occasion, horlogerie, bijouterie, habillement, services de proximité, ordinateur ...).";
        $this->load->view('template', $data);
	}
	function actualites()
	{ $data['id']='actualites';
	     $data['news']=$this->article_model->getListPublie(0,6);
	    $data['cats']=$this->cat_article_model->getCategories();
        $data['contents'] = 'news';
        $data['views']=$this->annonce_model->getListViews(0,10);
        $data['sections']=$this->section_model->getSections();
        $data['titre']="Toutes l'actualité de Maakiti";
        $data['description']="Actualités immobilier, voiture, moto, produits d'occasion, horlogerie, bijouterie, habillement, services de proximité, ordinateur";
        $data['css']='global.css';
        $this->load->view('template', $data);
	}
	function contact()
	{
         $data['id']='contact';
         $data['unes']=$this->annonce_model->getFeatured(0,5);
         $data['titre']="Nous contacter";
        $data['contents'] = 'contact';
        $data['css']='global.css';
        $data['sections']=$this->section_model->getSections();
        $data['description']="Petites annonces gratuites d'occasion (immobilier, voiture, moto, produits d'occasion, horlogerie, bijouterie, habillement, services de proximité, ordinateur ...).";
         $this->load->library('form_validation');
           if(isset($_POST['nom'])){
                 $this->form_validation->set_rules('nom','Nom et Pr&eacute;noms','trim|required');
                 $this->form_validation->set_rules('email','Email','trim|required|valid_email');
                 $this->form_validation->set_rules('sujet','Sujet','trim|required');
                 $this->form_validation->set_rules('message','Message','trim|required');
                 if($this->form_validation->run()==TRUE){
                    $this->load->library('email');
                    $this->email->from($_POST['email'],$_POST['nom']);
                    $this->email->to('contact@maakiti.com');
                    $this->email->subject($_POST['sujet']);
                    $this->email->message($_POST['message']);
                    $this->email->send();
                 }else $data['error']=validation_errors();
           }
            $this->load->view('template',$data);
	}
    function actu_detail($id){
        $data['id']='actualites';
         $data['news']=$this->article_model->getListPublie(0,6);
        $data['new']=$this->article_model->getOne($id);
	    $data['cats']=$this->cat_article_model->getCategories();
        $data['contents'] = 'detail_actu';
        $data['sections']=$this->section_model->getSections();
        $data['titre']=$data['new']->titre;
        $data['description']=character_limiter($data['new']->contenu,195);
        $data['lienfbcomment']="http://maakiti.com/control/actu_detail/".$id;
        $data['css']='global.css';
        $this->load->view('template', $data);
    }
   	function cat_actualites($idcat)
	{        
         $data['id']='actualites';
         $data['categ']=$this->cat_article_model->getOne($idcat);
	    $data['newscat']=$this->article_model->getListBycat(0,6,$idcat);
	    $data['cats']=$this->cat_article_model->getCategories();
        $data['contents'] = 'articles_categorie';
        $data['sections']=$this->section_model->getSections();
        $data['titre']=$data['categ']->categorie_article;
         $data['description']=character_limiter($data['categ']->description,195);
        $data['css']='global.css';
        $this->load->view('template', $data);
	}
}
?>
