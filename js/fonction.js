
function confirmation() {
    return  confirm('voulez vous vraiment supprimer');
}

function recuperation(sel, idRdv, urlBouton) {
   //document.getElementById("choixCol").innerHTML = "you selected: " + sel.value;
   console.log(sel.value);
   console.log(idRdv);
   console.log(urlBouton);

   var ancre = document.getElementById(idRdv);

   console.log(ancre);

   ancre.href= urlBouton + '&IDcollaborateurs=' + sel.value;


}



// document.querySelector('select[name=collaborateurListe]').addEventListener('change',function(e) { 
//     console.log(e);
//     console.log('test');
// });
