
function confirmation() {
    return  confirm('voulez vous vraiment supprimer');
}


function recuperation(sel, idRdv) {
   //document.getElementById("choixCol").innerHTML = "you selected: " + sel.value;
   console.log(sel.value);
   console.log(idRdv);

   var ancre = document.getElementById(idRdv);

   console.log(ancre);

   ancre.href= 'index.php?page=validation_collaborateurs_chauffeur&IDrdvChauffeur=' + idRdv + '&IDcollaborateurs=' + sel.value;


}

// document.querySelector('select[name=collaborateurListe]').addEventListener('change',function(e) { 
//     console.log(e);
//     console.log('test');
// });