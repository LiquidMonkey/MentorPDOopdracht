<?php
  $host="localhost";
  $db="test";
  $username="root";
  $password="";

  try{
      $con = new PDO("mysql:host=$host;dbname=$db", $username, $password);
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  } catch(PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }

  $naam = $_POST['naam'];
  $email = $_POST['email'];

  try{
    $prepared = $con->prepare('INSERT INTO `persoon`(naam, email) VALUES(:naam, :email)');
    $prepared->execute(array('naam' => $naam, 'email' => $email));
  } catch(PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }

  function Redirect($url, $permanent = false)
  {
      header('Location: ' . $url, true, $permanent ? 301 : 302);

      exit();
  }

  Redirect('dbShow.php', false);
?>
