<?php
//   $mytext = $_POST['id_station'];
//   echo $mytext;

header('Access-Control-Allow-Origin: *');

require "config.php";



// Create database in phpMy admin with user table (id, username, password)


$id_station = $_POST['id_station'];
$bikes_available = $_POST['marker_bikes'];
$user_id = $_POST['user_id'];

echo  "Station numéro : ";
echo $id_station;
echo "\n";
echo  "Vélos disponible : ";
echo $bikes_available;
echo "\n";
echo  "id de l'utilisateur : ";
echo $user_id;
echo "\n";


// EFFACE les réservation de - de 20 minutes
$now = new DateTime();
function updateReservations($db){
   $q = $db->prepare("DELETE FROM veloStation WHERE reservation_timer <= now() - interval 20 minute ");
   $q->execute();
}

// UPDATE des vélos si y'a déjà réservation
$q = $db->prepare("SELECT * FROM `veloStation` WHERE `id_station` = '".$id_station."' AND `user_id` = '".$user_id."' ");
$q->execute();
$count = $q->rowCount();
if ( $count > 0){
   updateReservations($db);
   // Mise a jour du délai de 20 minutes
   $q = $db->prepare("UPDATE veloStation SET reservation_timer=NOW() WHERE `id_station` = '".$id_station."' AND `user_id` = '".$user_id."' ");
   $q->execute();
   $data = $q->fetch(PDO::FETCH_ASSOC);
   echo $message = "Actualisation de la réservation dans la DB.";
}
else
{
   updateReservations($db);
   // bikes - 1
   // création délai 20 minutes
   $bikes_available = $bikes_available - 1;
   $q = $db->prepare("INSERT INTO veloStation (id_station, nb_reserve, user_id) VALUES ('$id_station', '$bikes_available', '$user_id')");
   $q->execute();
   $data = $q->fetch(PDO::FETCH_ASSOC);
   echo $message = "Insertion de la réservation dans la DB.";
}





// $counn = null;
// $res = null;

// $req = $db->prepare("SELECT * FROM veloStation WHERE id_station=:id_station ");
// $req->execute(array(
//    'id_station ' => $id_station,
// ));
// $resultat = $req->fetch();
// if(!$resultat){
//    $q = $db->prepare("INSERT INTO veloStation (id_station, nb_reserve) VALUES (:station_number,:marker_bikes) ");
//    $q->bindParam(":station_number", ($_POST ["id_station"]));
//    $q->bindParam(":marker_bikes", ($_POST ["marker_bikes"]));
//    $q->execute();
//    $data = $q->fetch(PDO::FETCH_ASSOC);
// }else{
//    echo 'Null';
// }



// Connect to database




?>