 //var ref="http://localhost/classifieds/"; Déplacé vers template pour que ce soit général pour
$("#nav li a.sf-with-ul").hover(
    $("#nav li a.sf-with-ul").css('display','block'),$("#nav li a.sf-with-ul").css('display','none')
)
function RechSubmit(){
    var motcle=$('#s').val();
    var ville=$('#ville').val();
    if(motcle=='Rechercher des annonces sur Maakiti') $('#s').val('')
    if(ville=='Ville') $('#ville').val('');
    $('#searchform').submit();
}
function ViewAnnonce(id,titre){// Voir le detail de l'annonce et comptabiliser le nombre de vues
      $('body').css('cursor','wait'); 
            
        $.ajax({
               url:ref+"annonces/ViewAnnonce",
               type:"POST",
               data:'idA='+id,
               success:function(data){
                        $('body').css('cursor','');
                        if(data=='ok') {window.location.href=ref+'annonces/detail/'+titre+'_'+id; }    
                                          
                     } 
        });
}
 function ajouterImage(){ //function pour ajouter une image � une annonce
    var listImg=document.getElementById('listImg');
    var li=listImg.getElementsByTagName('li');
    var nbreLi=li.length;
    if(nbreLi<3){
        $('#form').submit();
    } else alert('Vous avez le nombre maximum d\'image autoris&eacute;');       
 }
 function suppImage(image){// function pour supprimer une image d'une annonce
 if(window.confirm('Voulez vous supprimer cette image ?')){
     $('body').css('cursor','wait'); 
      var lien=ref+"annonces/supImage/";               
        $.ajax({
               url:ref+"/annonces/suppImage",
               type:"POST",
               url:lien,     
               data:'image='+image,
               success:function(data){
                        $('body').css('cursor','');
                        if(data=='true') document.getElementById('listImg').removeChild(document.getElementById(image));                          
                     } 
        });	}	 
 }
 function addImg(image){
    ul=document.getElementById('listImg');
    li=document.createElement('li');
    li.setAttribute('id',image);
    lien=document.createElement('a');
    lien.href="javascript:"; 
    b=document.createElement('b');
    b.innerHTML='<img src="'+ref+'assets/uploads/'+image+'" height="50" width="70"/><i onclick="suppImage(\''+image+'\')" class="lien"></i>';
    lien.appendChild(b);
    li.appendChild(lien);
    ul.appendChild(li);
    $('#image').val('');
     }
     
 function suppMessage(id){// function pour supprimer une image d'une annonce
 if(window.confirm('Voulez vous supprimer ce message ?')){
     $('body').css('cursor','wait'); 
      var lien=ref+"user/deletemessage/";               
            $.ajax({
            type:"POST",
            url:lien,            
            data:"id="+id,
            success:function(data){            
                $("body").css('cursor','default');                         
                window.location.reload();                
            }
        });
   
 }
}
     
 function suppAnnonce(id){// function pour supprimer une image d'une annonce
 if(window.confirm('Voulez vous supprimer cette annonce ?')){
     $('body').css('cursor','wait'); 
      var lien=ref+"user/deleteAnnonce/";               
            $.ajax({
            type:"POST",
            url:lien,            
            data:"id="+id,
            success:function(data){            
                $("body").css('cursor','default');                         
                window.location.reload();                
            }
        });
   
 }
}
function Publier(id,publier){
    $('body').css('cursor','wait'); 
      var lien=ref+"annonces/Updatepublication/";               
            $.ajax({
            type:"POST",
            url:lien,            
            data:"id="+id+"&publier="+publier,
            success:function(data){            
                $("body").css('cursor','default');                         
                window.location.reload();                
            }
        });
}
function annonceurDisplay(){
    $('#priceblock2').hide();
    $('#priceblock3').show();
    $('#usertab').addClass('selected');
    $('#contacttab').removeClass('selected');
    
}
function contactDisplay(){
    $('#priceblock3').hide();
    $('#priceblock2').show();
    $('#contacttab').addClass('selected');
    $('#usertab').removeClass('selected');
}