<?php
class Annonce_model extends Model {
	function annonce_model() {
		parent::Model();
	}

	private $table = "annonce";
	var $id_user = '';
	var $id_category = '';
	var $titre = '';
	var $description = '';
	var $prix = '';
	var $publie = '';
	var $ajout = '';
	var $pays = '';
	var $ville = '';
	var $monaie = '';
	var $type_annonce = '';
	var $featured = '';
	function CountAnnonceUser($iduser) {
		$query = $this -> db -> get_where($this -> table, array('id_user' => $iduser));
		return count($query -> result());
	}

	function getannonce($id) {
		$this -> db -> select('*,annonce.description as detail');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> join('section', 'categorie.id_section=section.id_section  ');
		$this -> db -> where('annonce.id_annonce', $id);
		$query = $this -> db -> get();
		if ($query -> num_rows() > 0) {
			return $query -> row();
		}
	}

	function getListbyUser($id, $debut, $nb) {
		$this -> db -> select('*');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> join('section', 'categorie.id_section=section.id_section  ');
		$this -> db -> where('annonce.id_user', $id);
                $this -> db -> where('publie', 1);
                $this -> db -> order_by('annonce.id_annonce','DESC');
		$this -> db -> limit($nb, $debut);
		$query = $this -> db -> get();
		if ($query -> num_rows() > 0) {
			return $query -> result();
		}
	}
        
        function getAnnonceUser($id, $debut, $nb) {
		$this -> db -> select('*');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> join('section', 'categorie.id_section=section.id_section  ');
		$this -> db -> where('annonce.id_user', $id);
                $this -> db -> order_by('annonce.id_annonce','DESC');
                //$this -> db -> where('publie', 1);
		$this -> db -> limit($nb, $debut);
		$query = $this -> db -> get();
		if ($query -> num_rows() > 0) {
			return $query -> result();
		}
	}
    function getListByCat($cat,$nb){
        $this -> db -> select('*,annonce.description as detail');
        $this -> db -> from('annonce');
        $this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
        $this -> db -> join('section', 'categorie.id_section=section.id_section  ');
        $this -> db -> where('annonce.id_category', $cat);
        $this -> db -> where('annonce.publie', 1);
        $this -> db -> order_by('featured','DESC');
        $this -> db -> order_by('annonce.id_annonce','DESC');
        $this -> db -> limit($nb, 0);
        $query = $this -> db -> get();
        if ($query -> num_rows() > 0) {
            return $query -> result();
        }
    }
    function getByCat($cat,$nb,$id){
        $this -> db -> select('*');
        $this -> db -> from('annonce');
        $this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
        $this -> db -> join('section', 'categorie.id_section=section.id_section  ');
        $this -> db -> where('annonce.id_category', $cat);
        $this -> db -> where('annonce.publie', 1);
        $this -> db -> where('id_annonce !=', (int)$id);
        $this -> db -> order_by('featured','DESC');
        $this -> db -> order_by('annonce.id_annonce','DESC');
        $this -> db -> limit($nb, 0);
        $query = $this -> db -> get();
        if ($query -> num_rows() > 0) {
            return $query -> result();
        }
    }

	function countOnline($id) {
		$this -> db -> select('*');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> join('section', 'categorie.id_section=section.id_section  ');
		$this -> db -> where('annonce.id_user', $id);
		$this -> db -> where('annonce.publie', 1);
		$query = $this -> db -> get();

		return count($query -> result());

	}

	function countOffline($id) {
		$this -> db -> select('*');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> join('section', 'categorie.id_section=section.id_section  ');
		$this -> db -> where('annonce.id_user', $id);
		$this -> db -> where('annonce.publie', 0);
		$query = $this -> db -> get();

		return count($query -> result());

	}

	

	function countBycat($idcat) {
		$this -> db -> select('*');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> where(array('categorie.id_cat' => $idcat, 'annonce.publie' => 1));
		$query = $this -> db -> get();
		return count($query -> result());
	}

	function countBysec($idsec) {
		$this -> db -> select('*');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> join('section', 'categorie.id_section=section.id_section  ');
		$this -> db -> where(array('section.id_section' => $idsec, 'annonce.publie' => 1));
		$query = $this -> db -> get();
		return count($query -> result());
	}

	function getListBysec($idsec, $debut, $nb) {
		$this -> db -> select('*,annonce.description as detail');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> join('section', 'categorie.id_section=section.id_section  ');
		$this -> db -> where(array('section.id_section' => $idsec, 'annonce.publie' => 1));
                $this -> db -> order_by('annonce.id_annonce','DESC');
		$this -> db -> limit($nb, $debut);
		$query = $this -> db -> get();
		if ($query -> num_rows() > 0) {
			return $query -> result();
		}
	}

	function getList($debut, $nb) {
		$this -> db -> select('*,annonce.description as detail');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> join('section', 'categorie.id_section=section.id_section  ');
                $this->db->order_by('id_annonce','DESC');
		$this -> db -> limit($nb, $debut);        
		$query = $this -> db -> get();
		if ($query -> num_rows() > 0) {
			return $query -> result();
		}
	}
	function getLast($debut, $nb){
		$this -> db -> select('*, annonce.description as C_ANNONCE');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> join('section', 'categorie.id_section=section.id_section  ');
		$this -> db -> where(array('publie'=>1));
		$this -> db -> limit($nb, $debut);
		$this -> db -> order_by('id_annonce', 'DESC');
		$query = $this -> db -> get();
		if ($query -> num_rows() > 0) {
			return $query -> result();
		}
	}

	function getListRand($debut, $nb) {
		$this -> db -> select('*,annonce.description as detail');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> join('section', 'categorie.id_section=section.id_section  ');		
		$this -> db -> order_by('RAND()');
		$this -> db -> limit($nb, $debut);

		$query = $this -> db -> get();
		if ($query -> num_rows() > 0) {
			return $query -> result();
		}
	}
	

	function add($iduser) {
		$this -> id_user = $iduser;
		$this -> id_category = $_POST['cat'];
		$this -> titre = $_POST['titre'];
		$this -> description = $_POST['description'];
		$this -> prix =  intval(str_replace(" ","",$_POST['prix']));
		$this -> publie = $_POST['publier'];
		$this -> ajout = date('y-m-d', time());
		$this -> ville = $_POST['ville'];
		$this -> pays = $_POST['pays'];
		$this -> monaie = $_POST['monnaie'];
		$this -> type_annonce = $_POST['type_annonce'];
		$this -> featured = 0;
		$this -> db -> insert('annonce', $this);
		return mysql_insert_id();
	}

	function edit($id, $iduser) {
		$this -> id_user = $iduser;
		$this -> id_category = $_POST['cat'];
		$this -> titre = $_POST['titre'];
		$this -> description = $_POST['description'];
		$this -> prix =  intval(str_replace(" ","",$_POST['prix']));
		$this -> publie = $_POST['publier'];
		$this -> ajout = date('y-m-d', time());
		$this -> ville = $_POST['ville'];
		$this -> pays = $_POST['pays'];
		$this -> monaie = $_POST['monaie'];
		$this -> type_annonce = $_POST['type_annonce'];
		$this -> featured = $_POST['featured'];
		$this -> db -> update($this -> table, $this, array('id_annonce' => $id));
	}

	function delete($id) {
		$this -> db -> delete($this -> table, array('id_annonce' => $id));
	}

	function publication($id, $publier) {
		$data['publie'] = $publier;
		$this -> db -> update($this -> table, $data, array('id_annonce' => $id));
	}

	function getListViews($debut, $nb) {
		$this -> db -> select('*');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> join('section', 'categorie.id_section=section.id_section  ');
		$this -> db -> where(array('annonce.publie' => 1));
		$this -> db -> limit($nb, $debut);
		$this -> db -> order_by('views', 'DESC');
		$query = $this -> db -> get();
		if ($query -> num_rows() > 0) {
			return $query -> result();
		}
	}

	function NbreAnnonces() {// compter le nombre d'article
		return $this -> db -> count_all($this -> table);
	}

	function getFeatured($debut, $nb) {
		$this -> db -> select('*');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> join('section', 'categorie.id_section=section.id_section  ');
		$this -> db -> where(array('annonce.featured' => 1));
		$this -> db -> where(array('annonce.publie' => 1));
                $this -> db -> order_by('views', 'DESC');
                $this -> db -> order_by('annonce.id_annonce','DESC');
		$this -> db -> limit($nb, $debut);		
		$query = $this -> db -> get();
		if ($query -> num_rows() > 0) {
			return $query -> result();
		}
	}

	function getNormal($debut, $nb) {
		$this -> db -> select('*');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> join('section', 'categorie.id_section=section.id_section  ');
		$this -> db -> where(array('annonce.featured' => 0));
		$this -> db -> limit($nb, $debut);
		$this -> db -> order_by('views', 'DESC');
                $this -> db -> order_by('annonce.id_annonce','DESC');
		$query = $this -> db -> get();
		if ($query -> num_rows() > 0) {
			return $query -> result();
		}
	}

	function countNormal() {
		return count($this -> db -> query("SELECT id_annonce FROM annonce WHERE featured=0") -> result());
	}

	function countFeatured() {
		return count($this -> db -> query("SELECT id_annonce FROM annonce WHERE featured=1") -> result());
	}

	function search($option) {
		$this -> db -> select('*,annonce.description as detail');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> join('section', 'categorie.id_section=section.id_section  ');
		$this -> db -> where(array('annonce.publie' => 1));
		if (isset($option['motcle'])) {
			if ($option['motcle'] == 'Rechercher des annonces sur deal africa')
				$mcle = '';
			
            else {
				$mcle = $option['motcle'];
				$motcle = explode(" ", $option['motcle']);
				$datas = plusdetrois($motcle);
				if (count($datas) > 0) {
					for ($i = 0; $i < count($datas); $i++) {
						$this -> db -> like('lower(annonce.titre)', $datas[$i], 'both');
						$this -> db -> or_like('lower(annonce.description)', $datas[$i], 'both');
					}
				}
			}

		}
		if (isset($option['type'])) {
			$this -> db -> where('annonce.type_annonce', $option['type']);
		}
		if (isset($option['pays'])) {
			$this -> db -> where('annonce.pays', $option['pays']);
		}
		if (isset($option['ville'])) {

			if (($option['ville'] != 'Ville') AND ($option['ville'] != ''))
				$this -> db -> where('annonce.ville', $option['ville']);

		}
		if (isset($option['cat'])) {
			$this -> db -> where('annonce.id_category', $option['cat']);
		}
		if (isset($option['monnaie'])) {
			$this -> db -> where('annonce.monaie', $option['monnaie']);
		}
		if (isset($option['pmin'])) {
			$this -> db -> where('annonce.prix >=', intval($option['pmin']));
		}
		if (isset($option['pmax'])) {
			$this -> db -> where('annonce.prix <=', intval($option['pmax']));
		}
                $this -> db -> order_by('annonce.featured','DESC');
		$this -> db -> order_by('views', 'DESC');
                $this -> db -> order_by('annonce.id_annonce','DESC');
		$this -> db -> limit($option['count'], $option['start']);
		$query = $this -> db -> get();

		if ($query -> num_rows() > 0) {
			return $query -> result();
		}
	}

	function countAnnonces($option) {
		$this -> db -> select('*');
		$this -> db -> from('annonce');
		$this -> db -> join('categorie', 'categorie.id_cat = annonce.id_category');
		$this -> db -> join('section', 'categorie.id_section=section.id_section  ');
		$this -> db -> where(array('annonce.publie' => 1));
		if (isset($option['motcle'])) {

			if ($option['motcle'] == 'Rechercher des annonces sur deal africa')
				$mcle = '';
			
else {
				$mcle = $option['motcle'];
				$motcle = explode(" ", $option['motcle']);
				$datas = plusdetrois($motcle);
				if (count($datas) > 0) {
					for ($i = 0; $i < count($datas); $i++) {
						$this -> db -> like('lower(annonce.titre)', $datas[$i], 'both');
						$this -> db -> or_like('lower(annonce.description)', $datas[$i], 'both');
					}
				}
			}

		}
		if (isset($option['type'])) {
			$this -> db -> where('annonce.type_annonce', $option['type']);
		}
		if (isset($option['pays'])) {
			$this -> db -> where('annonce.pays', $option['pays']);
		}
		if (isset($option['ville'])) {

			if (($option['ville'] != 'Ville') AND ($option['ville'] != ''))
				$this -> db -> where('annonce.ville', $option['ville']);

		}
		if (isset($option['cat'])) {
			$this -> db -> where('annonce.id_category', $option['cat']);
		}
		if (isset($option['monnaie'])) {
			$this -> db -> where('annonce.monaie', $option['monnaie']);
		}
		if (isset($option['pmin'])) {
			$this -> db -> where('annonce.prix >=', intval($option['pmin']));
		}
		if (isset($option['pmax'])) {
			$this -> db -> where('annonce.prix <=', intval($option['pmax']));
		}
		$this -> db -> order_by('views', 'DESC');
		$query = $this -> db -> count_all_results();
		;

		return $query;

	}

	function editFeatured($id,$fe) {		
		$data['featured'] =$fe;
		$this -> db -> update($this -> table, $data, array('id_annonce' => $id));

	}

}
?>
