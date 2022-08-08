<?php $connect = mysqli_connect ("localhost","root","","monprojet");
if (mysqli_connect_errno()) {
   echo "erreur" . mysqli_connect_error();
   exit();
}
// echo "good";
// var_dump ($connect);

function verif(string $MotDePasse,int $ID,mysqli $connect) {
 $requete=" SELECT * FROM `client` WHERE `MotDePasse`='$MotDePasse' and`IDclient`='$ID';";
   if ($result=mysqli_query($connect, $requete)) {
      echo "connecter";
      
      $row = mysqli_fetch_assoc($result);

      return $row;
   }

   return false;

}





   ?>