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

  try{
    $prepared = $con->prepare('SELECT * FROM `persoon`');
    $prepared->execute();
    $result = $prepared->fetchAll();
    foreach( $result as $row ) {
      echo "naam: " . $row["Naam"] . " <br/> email: " . $row["Email"]. "<br/><br/>";
    }
    echo "<br/> that is all";
  } catch(PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }

  function Redirect($url, $permanent = false)
  {
      header('Location: ' . $url, true, $permanent ? 301 : 302);

      exit();
  }

  //Redirect('dbShow.php', false);
?>
