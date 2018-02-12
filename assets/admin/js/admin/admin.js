function runClock() {// Function pour charger les champs de date de publication d'un article
      today   = new Date();
      $('#hh').val(today.getHours());
      $('#mn').val(today.getMinutes());
      $('#aa').val(today.getFullYear());
      $('#mm').val(today.getMonth());
      $('#jj').val(today.getDate()); 
      document.getElementById('mm').selectedIndex=today.getMonth();         
}
 //FONCTIONS POUR AJOUTER UNE IMAGE ET UN FICHIER DANS L'AJOUT D'UN ARTICLE
 function addImage(image){
   /* p=document.createElement('p');
    p.innerHTML=image;
    document.getElementById('divImage').appendChild(p);
    //if(document.getElementById('himage').value=="")*/ 
        document.getElementById('himage').value=image; 
    //document.getElementById('image').value='';  
 }
 
 function error(data){
    alert(data);
 }
 //FIN FONCTIONS
 
 //FUNCTION SECTION ANNONCE
 function supprimerSection(id){//Fonction de suppression d'une cat&eacute;gorie
    $("body").css('cursor','wait');
    var lien=ref+"admin/home/deleteSection/";
    if(confirm("Voulez vous supprimer cette Section ?")) {
         $.ajax({
            type:"POST",
            url:lien,            
            data:"id="+id,
            success:function(data){            
                $("body").css('cursor','default');
                $('#catID').val(''); $('#cat_name').val('');$('#content').val('');               
                window.location.reload();                
            }
        });
    }   
}
function chargerSection(id){// fonction pour charger la section dans le formulaire de modification
    $('#catID').val(id);
    $('#cat_name').val($('#titre'+id).html());
    $('#content').val($('#desc'+id).html());
}
function addSection(){// fonction pour ajouter une section
    if($.trim($('#cat_name').val())=="" || $.trim($('#content').val())==""){
        alert("Un ou plusieurs champs ne sont pas renseign&eacute;s!");
        return;
    }        
    $("body").css('cursor','wait');
    var lien=ref+"admin/home/addSection/";   
     $.ajax({
        type:"POST",
        url:lien,            
        data:'sec='+$('#cat_name').val()+'&content='+$('#content').val(),
        success:function(data){ 
           $("body").css('cursor','default');
             $('#catID').val(''); $('#cat_name').val('');$('#content').val('');              
            window.location.reload(); 
            }
    });    
}
function editSection(){//fonction pour modifier une section
    if($.trim($('#cat_name').val())=="" || $.trim($('#content').val())==""){
        alert("Un ou plusieurs champs ne sont pas renseign&eacute;s!");
        return;
    }
    $("body").css('cursor','wait');
    var lien=ref+"admin/home/editSection/";    
     $.ajax({
        type:"POST",
        url:lien,            
        data:"id="+$('#catID').val()+'&sec='+$('#cat_name').val()+'&content='+$('#content').val(),
        success:function(data){ 
            $("body").css('cursor','default');  
            $('#catID').val(''); $('#cat_name').val('');$('#content').val('');             
            window.location.reload();                
        }
    });     
}

//FUNCTION CATEGORIE ANNONCE
function chargerCategorie(id){// fonction pour charger la sous cat&eacute;gorie dans le formulaire de modification
    $('#catID').val(id);
    $('#cat_name').val($('#titre'+id).html());
    $('#content').val($('#desc'+id).html());
}
function addCategorie(){// fonction pour ajouter une sous cat&eacute;gorie
    if($.trim($('#cat_name').val())=="" || $.trim($('#content').val())==""){
        alert("Un ou plusieurs champs ne sont pas renseign&eacute;s!");
        return;
    }        
    $("body").css('cursor','wait');
    var lien=ref+"admin/home/addCategorie/"; 
    var cat=document.getElementById('sec').options[document.getElementById('sec').selectedIndex].value;  
     $.ajax({
        type:"POST",
        url:lien,            
        data:'sec='+cat+'&content='+$('#content').val()+'&cat='+$('#cat_name').val(),
        success:function(data){ 
             $("body").css('cursor','default');
             $('#catID').val(''); $('#cat_name').val('');$('#content').val('');              
            window.location.reload(); 
        }
    });    
}
function editCategorie(){//fonction pour modifier une sous cat&eacute;gorie
    if($.trim($('#cat_name').val())=="" || $.trim($('#content').val())==""){
        alert("Un ou plusieurs champs ne sont pas renseign&eacute;s!");
        return;
    }
    $("body").css('cursor','wait');
    var lien=ref+"admin/home/editCategorie/";
     var cat=document.getElementById('sec').options[document.getElementById('sec').selectedIndex].value;      
     $.ajax({
        type:"POST",
        url:lien,            
        data:"id="+$('#catID').val()+'&cat='+$('#cat_name').val()+'&content='+$('#content').val()+'&sec='+cat,
        success:function(data){ 
            $("body").css('cursor','default');  
            $('#catID').val(''); $('#cat_name').val('');$('#content').val('');             
            window.location.reload();                
        }
    });     
}
function supprimerCategorie(id){//Fonction de suppression d'une cat&eacute;gorie
    $("body").css('cursor','wait');
    var lien=ref+"admin/home/deleteCat/";
    if(confirm("Voulez vous supprimer cette categorie ?")) {
         $.ajax({
            type:"POST",
            url:lien,            
            data:"id="+id,
		    success:function(data){            
		        $("body").css('cursor','default');
		        $('#catID').val(''); $('#cat_name').val('');$('#content').val('');               
		        window.location.reload();                
		    }
        });
    }  
 }

//FUNCTION ANNONCE
function supprimerAnnonce(id){//Fonction de suppression d'une cat&eacute;gorie
    $("body").css('cursor','wait');
    var lien=ref+"admin/home/deleteannonce/";
    if(confirm("Voulez vous supprimer cette Annonce ?")) {
	 $.ajax({
	    type:"POST",
	    url:lien,            
	    data:"id="+id,
	    success:function(data){            
	        $("body").css('cursor','default');
	        $('#catID').val(''); $('#cat_name').val('');$('#content').val('');               
	        window.location.reload();                
	    }
	});
} 
}

//FUNCTION ARTICLE
function editCatArticle(){
	 if($.trim($('#cat_name').val())=="" || $.trim($('#content').val())==""){
        alert("Un ou plusieurs champs ne sont pas renseign&eacute;s!");
        return;
    }
	 $("body").css('cursor','wait');
	    var lien=ref+"admin/home/editCategorie_article/";
	 $.ajax({
	        type:"POST",
	        url:lien,            
	        data:"id="+$('#catID').val()+'&cat='+$('#cat_name').val()+'&content='+$('#content').val(),
	        success:function(data){ 
	            $("body").css('cursor','default');  
	            $('#catID').val(''); $('#cat_name').val('');$('#content').val('');             
	            window.location.reload();                
	        }
	    }); 
}
function addCatArticle(){
	if($.trim($('#cat_name').val())=="" || $.trim($('#content').val())==""){
        alert("Un ou plusieurs champs ne sont pas renseign&eacute;s!");
        return;
    }        
    $("body").css('cursor','wait');
    var lien=ref+"admin/home/addCatArticle/";   
     $.ajax({
        type:"POST",
        url:lien,            
        data:'content='+$('#content').val()+'&cat='+$('#cat_name').val(),
        success:function(data){ 
             $("body").css('cursor','default');
             $('#catID').val(''); $('#cat_name').val('');$('#content').val('');              
            window.location.reload(); 
        }
    });  
}
function supprimerCatArticle(id){
	 $("body").css('cursor','wait');
	    var lien=ref+"admin/home/deleteCatArticle/";
	    if(confirm("Voulez vous supprimer cette categorie ?")) {
	         $.ajax({
	            type:"POST",
	            url:lien,            
	            data:"id="+id,
			    success:function(data){            
			        $("body").css('cursor','default');
			        $('#catID').val(''); $('#cat_name').val('');$('#content').val('');               
			        window.location.reload();                
			    }
	        });
	    }  
}
function supprimerArticle(id,image,doc){//Fonction de suppression d'un Article
    $("body").css('cursor','wait');
    var lien=ref+"admin/home/delete/";
    if(confirm("Voulez vous supprimer cet article ?")) {
         $.ajax({
            type:"POST",
            url:lien,            
            data:"id="+id+"&image="+image+"&doc="+doc,
            success:function(data){            
                $("body").css('cursor','default');                             
                window.location.reload();                
            }
        });
    }   
}
function chpub(){// Function pour charger les champs de date de publication d'un article modifcation
      pub=$('#pub').html(); 
      tab=pub.split(' ');// pour avoir les deux blocs aaaa-mm-jj et hh:mn
      b1=tab[0]; b2=tab[1]; //les deux blocs dans des variables 
      tab1=b1.split('-'); // tableau du premier bloc
      tab2=b2.split(':'); // tableau du second bloc    
      $('#hh').val(tab2[0]);
      $('#mn').val(tab2[1]);
      $('#aa').val(tab1[0]);
      $('#mm').val(tab1[1]);
      $('#jj').val(tab1[2]); 
      //document.getElementById('mm').selectedIndex=today.getMonth();
}

//FUNCTION ADMINISTRATEUR
 function supprimerAdmin(id){//Fonction de suppression d'un utilisateur
    $("body").css('cursor','wait');
    var lien=ref+"admin/admin/delete/";
    if(confirm("Voulez vous supprimer cet utilisateur ?")) {
         $.ajax({
            type:"POST",
            url:lien,            
            data:"id="+id,
            success:function(data){            
                $("body").css('cursor','default');
                 $('#AID').val(''); $('#login').val('');$('#nom').val('');$('#pwd').val('');                
                window.location.reload();                
            }
        });
    }   
}
function chargerAdmin(id){// fonction pour charger un utilisateur
    $('#AID').val(id);
    $('#login').val($('#login'+id).html());
    $('#nom').val($('#nom'+id).html());
}
function editAdmin(){//fonction pour modifier un utilisateur
    if($.trim($('#login').val())=="" || $.trim($('#nom').val())=="" ){
        alert("Un ou plusieurs champs ne sont pas renseign&eacute;s!");
        return;
    }
    $("body").css('cursor','wait');
    var lien=ref+"admin/admin/editAdmin/";    
     $.ajax({
        type:"POST",
        url:lien,            
        data:"id="+$('#AID').val()+'&login='+$('#login').val()+'&nom='+$('#nom').val()+'&pwd='+$('#pwd').val()+'&acces='+$('#acces').val(),
        success:function(data){            
            $("body").css('cursor','default');  
            $('#AID').val(''); $('#login').val('');$('#nom').val('');$('#pwd').val('');             
            window.location.reload();                
        }
    });     
}
function validation(){// validation formulaire ajout utilisateur
    var ok=true;
    if($.trim($('#Fnom').val())==""){
        ok=false; $('#Fnom').css('borderColor','red');
    }else $('#Fnom').css('borderColor','');
    if($.trim($('#Flogin').val())==""){
        ok=false; $('#Flogin').css('borderColor','red');
    }else $('#Flogin').css('borderColor','');
    if($.trim($('#Fpwd').val())==""){
        ok=false; $('#Fpwd').css('borderColor','red');
    }else $('#Fpwd').css('borderColor','');
    return ok;
}
function loadContent(){
    var cont= window.monEditeur.document.getElementById('editor').innerHTML;   
    $('#contenu').html(cont);  
    if($.trim($('#contenu').val())=="<br>")
        $('#contenu').val('');
}
// Fonctions Pour la sous categorie

