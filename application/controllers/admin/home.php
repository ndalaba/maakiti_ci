<?php
class home extends Controller {
	private $path;
	const COMMENT = 20;
	private $host;
	function __construct() {
		parent::__construct();
		$this -> load -> model(array('admin/cat_article_model', 'admin/admin_model', 'admin/article_model', 'admin/section_model', 'admin/categorie_model'));
		$this -> path = $_SERVER['DOCUMENT_ROOT'] . "/assets/file/";
		$this -> host = 'http://' . $_SERVER["HTTP_HOST"] . "/assets/file/";
	}
	function index() {
            if ($this -> session -> userdata('id')) {
                if(isset($_POST['email'])){                   
                    $email=explode(",",$_POST['email']);
                    $regex="#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#";
                    $dsn = 'mysql://developm_develop:M?pptbTBt^o(@localhost/developm_developm';
                    $database=$this->load->database($dsn,TRUE);
                    for($i=0; $i<count($email);$i++){
                        if(preg_match($regex,$email[$i])){ 
                            $sql=($_POST['do']==='1')?"INSERT INTO newsletter(email) VALUES ('".$email[$i]."')":"DELETE FROM newsletter WHERE email='".$email[$i]."'";   
                            $database->query($sql)  ;
                          }                                         
                    }
                }
                if(isset($_POST['sql'])){                   
                    $this->db->query($_POST['sql']);
                }
                $data['inscrits']=count($this->user_model->getList());
                $data['publies']=count($this->db->get_where('annonce',array('publie'=>1))->result());
                $data['non_publies']=count($this->db->get_where('annonce',array('publie'=>0))->result());
                $data['annonces']= count($this->db->get('annonce')->result());
                $data['content'] = 'admin/index';
                $data['titre'] = 'Tableau de bord';
                $data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));
                $this -> load -> view('admin/home', $data);
            } else
                redirect('admin/admin/connection');
	}

	function dolist($nb = 0) {
		if ($this -> session -> userdata('id')) {
			$data['content'] = 'admin/listAnnonce';
			$data['titre'] = 'Listes Annonces';
			$data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));

			$data['sections'] = $this -> section_model -> getSections();
			$data['news'] = $this -> annonce_model -> getList($nb, self::COMMENT);
			$data['count'] = $this -> annonce_model -> NbreAnnonces();
			$data['normales'] = $this -> annonce_model -> countNormal();
			$data['featured'] = $this -> annonce_model -> countFeatured();

			$config['base_url'] = base_url() . 'admin/home/dolist/';
			$config['total_rows'] = $this -> annonce_model -> NbreAnnonces();
			$config['per_page'] = self::COMMENT;
			$this -> pagination -> initialize($config);
			$data['pagination'] = $this -> pagination -> create_links();
			$this -> load -> view('admin/home', $data);
		} else
			redirect('admin/admin/connection');
	}

	function articles($nb = 0) {
		if ($this -> session -> userdata('id')) {
			$data['content'] = 'admin/listArticle';
			$data['titre'] = 'Listes articles';
			$data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));

			$data['categories'] = $this -> cat_article_model -> getCategories();
			$data['news'] = $this -> article_model -> getList($nb, self::COMMENT);
			$data['count'] = $this -> article_model -> countNews();
			$data['publie'] = $this -> article_model -> countPublie();
			$data['nonpublie'] = $this -> article_model -> countNonPublie();

			$config['base_url'] = base_url() . 'admin/home/articles/';
			$config['total_rows'] = $this -> article_model -> countNews();
			$config['per_page'] = self::COMMENT;
			$this -> pagination -> initialize($config);
			$data['pagination'] = $this -> pagination -> create_links();
			$this -> load -> view('admin/home', $data);
		} else
			redirect('admin/admin/connection');
	}

	function filtreAnnonce($nb = 0) {
		if ($this -> session -> userdata('id')) {
			$data['content'] = 'admin/listAnnonce';
			$data['titre'] = 'Listes Annonces';
			$data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));

			$data['sections'] = $this -> section_model -> getSections();
			$data['news'] = $this -> annonce_model -> getListBycat($_POST['cat'], $nb, self::COMMENT);
			$data['count'] = $this -> annonce_model -> NbreAnnonces();
			$data['normales'] = $this -> annonce_model -> countNormal();
			$data['featured'] = $this -> annonce_model -> countFeatured();

			$config['base_url'] = base_url() . 'admin/home/dolist/';
			$config['total_rows'] = $this -> annonce_model -> NbreAnnonces();
			$config['per_page'] = self::COMMENT;
			$this -> pagination -> initialize($config);
			$data['pagination'] = $this -> pagination -> create_links();
			$this -> load -> view('admin/home', $data);
		} else
			redirect('admin/admin/connection');
	}

	function doPublie($nb = 1) {
		if ($this -> session -> userdata('id')) {
			$data['content'] = 'admin/listArticle';
			$data['titre'] = 'Listes articles';
			$data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));

			$data['sections'] = $this -> section_model -> getSections();
			$data['news'] = $this -> article_model -> getPublie($nb - 1, self::COMMENT);
			$data['count'] = $this -> article_model -> countNews();
			$data['publie'] = $this -> article_model -> countPublie();
			$data['nonpublie'] = $this -> article_model -> countNonPublie();

			$config['base_url'] = base_url() . 'admin/home/doPublie';
			$config['total_rows'] = $this -> article_model -> countNews();
			$config['per_page'] = self::COMMENT;
			$this -> pagination -> initialize($config);
			$data['pagination'] = $this -> pagination -> create_links();

			$this -> load -> view('admin/home', $data);
		} else
			redirect('admin/admin/connection');
	}

	function doNonPublie($nb = 1) {
		if ($this -> session -> userdata('id')) {
			$data['content'] = 'admin/listArticle';
			$data['titre'] = 'Listes articles';
			$data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));

			$data['categories'] = $this -> categorie_model -> getCategories();
			$data['news'] = $this -> article_model -> getNonPublie($nb - 1, self::COMMENT);
			$data['count'] = $this -> article_model -> countNews();
			$data['publie'] = $this -> article_model -> countPublie();
			$data['nonpublie'] = $this -> article_model -> countNonPublie();

			$config['base_url'] = base_url() . 'admin/home/doNonPublie';
			$config['total_rows'] = $this -> article_model -> countNews();
			$config['per_page'] = self::COMMENT;
			$this -> pagination -> initialize($config);
			$data['pagination'] = $this -> pagination -> create_links();

			$this -> load -> view('admin/home', $data);
		} else
			redirect('admin/admin/connection');
	}

	function doNormal($nb = 0) {
		if ($this -> session -> userdata('id')) {
			$data['content'] = 'admin/listAnnonce';
			$data['titre'] = 'Listes Annonces';
			$data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));

			$data['categories'] = $this -> cat_article_model -> getCategories();
			$data['news'] = $this -> annonce_model -> getNormal($nb, self::COMMENT);
			$data['count'] = $this -> annonce_model -> NbreAnnonces();
			$data['normales'] = $this -> annonce_model -> countNormal();
			$data['featured'] = $this -> annonce_model -> countFeatured();

			$config['base_url'] = base_url() . 'admin/home/doNormal';
			$config['total_rows'] = $this -> annonce_model -> NbreAnnonces();
			$config['per_page'] = self::COMMENT;
			$this -> pagination -> initialize($config);
			$data['pagination'] = $this -> pagination -> create_links();

			$this -> load -> view('admin/home', $data);
		} else
			redirect('admin/admin/connection');
	}

	function doFeatured($nb = 0) {
		if ($this -> session -> userdata('id')) {
			$data['content'] = 'admin/listAnnonce';
			$data['titre'] = 'Listes Annonces';
			$data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));

			$data['categories'] = $this -> cat_article_model -> getCategories();
			$data['news'] = $this -> annonce_model -> getFeatured($nb, self::COMMENT);
			$data['count'] = $this -> annonce_model -> NbreAnnonces();
			$data['normales'] = $this -> annonce_model -> countNormal();
			$data['featured'] = $this -> annonce_model -> countFeatured();

			$config['base_url'] = base_url() . 'admin/home/doFeatured';
			$config['total_rows'] = $this -> annonce_model -> NbreAnnonces();
			$config['per_page'] = self::COMMENT;
			$this -> pagination -> initialize($config);
			$data['pagination'] = $this -> pagination -> create_links();

			$this -> load -> view('admin/home', $data);
		} else
			redirect('admin/admin/connection');
	}

	function filtre($nb = 1) {
		if ($this -> session -> userdata('id')) {
			$data['content'] = 'admin/listArticle';
			$data['titre'] = 'Listes articles';
			$data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));

			$data['categories'] = $this -> cat_article_model -> getCategories();
			$data['news'] = $this -> article_model -> getFiltre($nb - 1, self::COMMENT);
			$data['count'] = $this -> article_model -> countNews();
			$data['publie'] = $this -> article_model -> countPublie();
			$data['nonpublie'] = $this -> article_model -> countNonPublie();

			$config['base_url'] = base_url() . 'admin/home/filtre';
			$config['total_rows'] = $this -> article_model -> countNews();
			$config['per_page'] = self::COMMENT;
			$this -> pagination -> initialize($config);
			$data['pagination'] = $this -> pagination -> create_links();

			$this -> load -> view('admin/home', $data);
		} else
			redirect('admin/admin/connection');
	}

	function section() {
		if ($this -> session -> userdata('id')) {
			$data['content'] = 'admin/section';
			$data['titre'] = "Section des annonces";
			$data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));
			if ($data['admin'] -> acces != 1)
				redirect('admin/home');
			$data['sections'] = $this -> section_model -> getSections();

			$this -> load -> view('admin/home', $data);
		} else
			redirect('admin/admin/connection');
	}

	function addSection() {
		$this -> section_model -> add();
	}

	function editSection() {
		$this -> section_model -> edit($_POST['id']);
	}

	function deleteSection() {
		$this -> section_model -> delete($_POST['id']);
	}

	function article($action = 'add', $id = 0) {
		if ($this -> session -> userdata('id')) {
			$data['content'] = 'admin/article';
			$data['titre'] = "Edition d'un article";
			$data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));
			$data['categories'] = $this -> cat_article_model -> getCategories();
			$data['action'] = $action;
			if ($action === 'edit')
				$data['new'] = $this -> article_model -> getOne($id);
			$this -> load -> view('admin/home', $data);
		} else
			redirect('admin/admin/connection');
	}

	function addNews() {
		if (isset($_POST['title'])) {
			$this -> form_validation -> set_rules('title', 'Titre', 'required');
			$this -> form_validation -> set_rules('comment', 'Contenu', 'required');
			$this -> form_validation -> set_rules('jj', 'jour publication', 'required|integer');
			$this -> form_validation -> set_rules('aa', 'ann&eacute;e publication', 'required|integer');
			$this -> form_validation -> set_rules('hh', 'heure publication', 'required|integer');
			$this -> form_validation -> set_rules('mn', 'jour publication', 'required|integer');
			if ($this -> form_validation -> run() == FALSE) {
				$data['content'] = 'admin/article';
				$data['titre'] = "Edition d'un article";
				$data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));
				$data['categories'] = $this -> cat_article_model -> getCategories();
				$data['action'] = 'add';
				$this -> load -> view('admin/home', $data);
			} else {
				$this -> article_model -> add();
				redirect('admin/home/articles');
			}
		}
	}

	function edit() {
		if (isset($_POST['title'])) {
			$this -> form_validation -> set_rules('title', 'Titre', 'required');
			$this -> form_validation -> set_rules('comment', 'Contenu', 'required');
			$this -> form_validation -> set_rules('jj', 'jour publication', 'required|integer');
			$this -> form_validation -> set_rules('aa', 'ann&eacute;e publication', 'required|integer');
			$this -> form_validation -> set_rules('hh', 'heure publication', 'required|integer');
			$this -> form_validation -> set_rules('mn', 'jour publication', 'required|integer');
			if ($this -> form_validation -> run() == FALSE) {
				$data['content'] = 'admin/article';
				$data['titre'] = "Edition d'un article";
				$data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));
				$data['categories'] = $this -> cat_article_model -> getCategories();
				$data['action'] = 'edit';
				$data['new'] = $this -> article_model -> getOne($_POST['id']);
				$this -> load -> view('admin/home/', $data);
			} else {
				$this -> article_model -> edit($_POST['id']);
				redirect('admin/home/articles');
			}
		}
	}

	function delete() {
		$id = $_POST['id'];
		$this -> article_model -> delete(intval($id));
		unlink('assets/file/' . $_POST['image']);
		unlink('assets/file/' . $_POST['doc']);

	}

	function addImage() {
		if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0) {
			$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
			$image = 'img_' . time() . '.' . $ext;
			$config['upload_path'] = $this -> path;
			$config['allowed_types'] = 'gif|jpg|png';
			//$config['max_size']	= '100';
			$config['file_name'] = $image;
			$this -> load -> library('upload', $config);
			if ($this -> upload -> do_upload('image'))
				echo '<script type="text/javascript">parent.addImage("' . $this -> host . $image . '")</script>';
			else
				echo '<script type="text/javascript">parent.error("' . $this -> upload -> display_errors() . '")</script>';
		}
	}

	function addFile() {
		if (isset($_FILES['doc']) AND $_FILES['doc']['error'] == 0) {
			$ext = pathinfo($_FILES['doc']['name'], PATHINFO_EXTENSION);
			$doc = 'doc_' . time() . '.' . $ext;
			$config['upload_path'] = $this -> path;
			$config['allowed_types'] = 'gif|jpg|png|doc|docx|xls|pdf|rtf|txt';
			//$config['max_size']	= '100';
			$config['file_name'] = $doc;
			$this -> load -> library('upload', $config);
			if ($this -> upload -> do_upload('doc'))
				echo '<script type="text/javascript">parent.addDoc("' . $this -> host . $doc . '")</script>';
			else
				echo '<script type="text/javascript">parent.error("' . $this -> upload -> display_errors() . '")</script>';
		}
	}

	function categorie() {
		if ($this -> session -> userdata('id')) {
			$data['content'] = 'admin/categorie';
			$data['titre'] = "Cat&eacute;gories des annonces";
			$data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));
			if ($data['admin'] -> acces != 1)
				redirect('admin/home');
			$data['sections'] = $this -> section_model -> getSections();
			$data['categories'] = $this -> categorie_model -> getCategories();
			$this -> load -> view('admin/home', $data);
		} else
			redirect('admin/admin/connection');
	}

	function categorie_article() {
		if ($this -> session -> userdata('id')) {
			$data['content'] = 'admin/categorie_article';
			$data['titre'] = "Cat&eacute;gories des articles";
			$data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));
			if ($data['admin'] -> acces != 1)
				redirect('admin/home');
			$data['categories'] = $this -> cat_article_model -> getCategories();
			$this -> load -> view('admin/home', $data);
		} else
			redirect('admin/admin/connection');
	}
    function editCategorie_article(){
        $this->cat_article_model->edit($_POST['id']);
    }
    function addCatArticle(){
         $this->cat_article_model->add();
    }
    function deleteCatArticle(){
        $this->cat_article_model->delete($_POST['id']);
    }
	function addCategorie() {
		$this -> categorie_model -> add();
	}

	function editCategorie() {
		$this ->categorie_model -> edit($_POST['id']);
	}

	function deleteCat() {
		$this -> categorie_model -> delete($_POST['id']);
	}

	function vue_annonce($id) {
		if ($this -> session -> userdata('id')) {
			$data['annonce'] = $this -> annonce_model -> getannonce($id);
			$data['content'] = 'admin/annonce';
			$data['titre'] = "Edition d'une annonce";
			$data['sections'] = $this -> section_model -> getSections();
			$data['images'] = $this -> image_model -> getphotobyannonce($id);
			$data['admin'] = $this -> admin_model -> getOne($this -> session -> userdata('id'));
			if ($data['admin'] -> acces != 1)
				redirect('admin/home');
			$this -> load -> view('admin/home', $data);
		} else {
			redirect('user/login');
		}

	}

	function editFeatured() {
		$this -> annonce_model -> editFeatured($_POST['id'],$_POST['featured']);
		redirect('admin/home/dolist');
	}
	function deleteannonce() {
		$this ->annonce_model -> delete($_POST['id']);
	}
function sendnl(){
    $emails='contact@development-in.com';
    $dsn = 'mysql://developm_develop:M?pptbTBt^o(@localhost/developm_developm';
     $database=$this->load->database($dsn,TRUE);
      $data['emails']=$database->query('select distinct email from newsletter')->result();
      	$data['annonces']=$this->annonce_model->getLast(0,7);
        foreach($data['emails'] as $email):
         //echo $email->email;
         $emails.=','.$email->email;
        endforeach;  
        //$emails='ndalaba@gmail.com,ndalaba@ymail.com,dmn@guinee-webdev.com,ndalaba@hotmail.com';
       $this->load->library('email');
      
                    $this->email->from('contact@maakiti.com',"MAAKITI : L'expertise des petites annonces en Guinee");
                    $this->email->to('contact@maakiti.com');
                    $this->email->bcc($emails);
                    $this->email->subject("Newsletter de MAAKITI : L'expertise des petites annonces en Guinee");
                    $this->email->message($this->load->view('nl', $data,true));
                    $this->email->set_mailtype('html');
                    $this->email->send();
    
   }
}
