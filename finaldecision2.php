<?php
session_start();
require_once "sql_config.php";

//check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 18 
      WHERE id =:player_id");
    $sth->bindValue(':player_id', $_SESSION["player_id"]);
    $sth->execute();
    }
  catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";          
  }
}else {
    header('Location: login.php'); //if user isn't signed in send to login
}
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Cul Cavboj</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" href="cssandjs/finaldecision2.css">
  </head>
  <body>
    <h1>Decision: Freedom or Boss Face Off</h1>
      <div id = "container">
        <div id = "boss">
            <img src = "img/gun.png" width = 80% alt = "boss" />
            <br>
            <a href = "boss.php"><input type = "button" class = "buttons" name = "boss" value = "Boss face off" /></a>
        </div>
        
        <div id = "freedom">
            <img src = "https://i.pinimg.com/originals/f5/0c/af/f50cafbb38da918ad4129ae5e13ffd50.png" width = 56% alt = "freedom" />
            <br>
            <a href = "freedom.php"><input type = "button" class = "buttons" name = "freedom" value = "Freedom" /></a>
        </div>
      </div>
    <br /><a href="logout.php"><input type = 'button' value = 'Save and Log Out' /></a>
  </body>
<html>

