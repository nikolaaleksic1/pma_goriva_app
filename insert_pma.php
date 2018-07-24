<?php
error_reporting(0);
session_start();
include('connection.php');



if(isset($_REQUEST))
{
  $date = $_POST['date'];
  $price = $_POST['price'];
  $id = $_POST['id'];
  $sqlDate = date("Y-m-d", strtotime($date));
  $id_sub = 0;
   $user = $_SESSION['user'];



// var_dump(is_int($price)) ;
// var_dump(is_float($id)) ;



if($id !== '' && strlen($id) == 18){
  $id_sub = substr($id, 7,2);
  $id_prep = substr($id, 0, 2);
}else if($id !== '' && strlen($id) == 19){
  $id_sub = substr($id, 7,3);
  $id_prep = substr($id, 0, 2);
}else if($id !== '' && strlen($id) == 22){
  $id_sub = substr($id, 11,2);
  $id_prep = substr($id, 0, 6);
}else if($id !== '' && strlen($id) > 22){
  $id_sub = substr($id, 11,3);
  $id_prep = substr($id, 0, 6);
}



if($id_sub !== '' && $id_prep == 'mp'){

  $stmt = $dbpma->prepare('INSERT INTO pma_goriva_cene (pma_goriva_id, datum_vazi_od, iznos, user) VALUES(:pma_goriva_id, :datum_vazi_od, :iznos, :user) ON DUPLICATE KEY UPDATE iznos=VALUES(iznos), user=VALUES(user)');
   $stmt->bindParam(':pma_goriva_id', $id_sub, PDO::PARAM_STR);
   $stmt->bindParam(':datum_vazi_od', $sqlDate, PDO::PARAM_STR);
   $stmt->bindParam(':iznos', $price, PDO::PARAM_STR);
   $stmt->bindParam(':user', $_SESSION['user_id'], PDO::PARAM_STR);
   $stmt->execute();

}else if($id_sub !== '' && $id_prep == 'popust'){

  $stmt = $dbpma->prepare('INSERT INTO pma_goriva_popusti (pma_goriva_id, datum_vazi_od, iznos, user) VALUES(:pma_goriva_id, :datum_vazi_od, :iznos, :user) ON DUPLICATE KEY UPDATE iznos=VALUES(iznos), user=VALUES(user)');
   $stmt->bindParam(':pma_goriva_id', $id_sub, PDO::PARAM_STR);
   $stmt->bindParam(':datum_vazi_od', $sqlDate, PDO::PARAM_STR);
   $stmt->bindParam(':iznos', $price, PDO::PARAM_STR);
   $stmt->bindParam(':user', $_SESSION['user_id'], PDO::PARAM_STR);
   $stmt->execute();

}



}



?>
