<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
     <?php
     $link = mysqli_connect("localhost", "root", "root", "poke");
  //if(!$link){echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;echo "Errno de débogage : " . mysqli_connect_errno() . PHP_EOL;echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL; exit; }
    
  //echo "Succès : Une connexion correcte à MySQL a été faite! La base de donnée bibliothèque a été ouverte." . PHP_EOL;
  //echo "Information d'hôte : " . mysqli_get_host_info($link) . PHP_EOL;
   //var_dump($result);?>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Pokedex</title>
  </head>
  <body>
   
 <h1>My Pokedex</h1>
    <table>
      <thead>
        <tr>
          <th>Sprite</th>
          <th>ID</th>
          <th>Name</th>
          <th>Height</th>
          <th>Weight</th>
          <th>Base exp</th>
        </tr>
      </thead>
       <tbody>
<?php $req = "SELECT * FROM poke.pokemon;";?>
<?php  
  $req1 = "SELECT * FROM poke.pokemon WHERE base_experience>=200;";
  echo "<tr class = super>";?>
<?php $result = mysqli_query($link,$req);
               if ($result) { 
              
   echo "There are ".mysqli_num_rows($result)." pokemons from the database.<br>";

   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      echo "<tr>";
       echo '<td><img src="sprites/'. $row["identifier"] . '.png" alt="bulbasaur" ></td>';
          echo "<td>". $row["id"] . "</td>";
          echo "<td>". $row["identifier"] .  "</td>";
          echo "<td>". $row["height"] .  "</td>";
          echo "<td>". $row["weight"] .  "</td>";
          echo "<td>". $row["base_experience"] .  "</td>";
        echo "</tr>";
       } 
    mysqli_free_result($result);}
    ?>
   </tbody>
    </table>
    
  </body>
  <?php mysqli_close($link); ?> 
</html>
