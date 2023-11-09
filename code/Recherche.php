  <?php require 'begin.html'; ?>

  <form method="post" role="search">
    <label for="search">Recherchez un acteur</label>
    <input id="search" name="acteur" type="search" placeholder="Entrez un nom" autofocus required />
    <button type="submit">GO</button>    
  </form>

  <?php 
  $acteurs = [
    "Brad Pitt", 
    "Meryl Streep", 
    "Leonardo DiCaprio", 
    "Julia Roberts", 
    "Tom Hanks",
    "Nicole Kidman", 
    "Johnny Depp", 
    "Cate Blanchett", 
    "Denzel Washington", 
    "Angelina Jolie",
    "George Clooney", 
    "Charlize Theron", 
    "Will Smith", 
    "Jennifer Lawrence", 
    "Robert Downey Jr.",
    "Natalie Portman", 
    "Tom Cruise", 
    "Kate Winslet", 
    "Matt Damon", 
    "Emma Watson"
  ];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acteurRecherche = $_POST['acteur'];
    $matches = [];
    
    foreach ($acteurs as $acteur) {
      if (preg_match("/$acteurRecherche\s*$/i", $acteur) || preg_match("/^\s*$acteurRecherche/i", $acteur)
      ) {
        $matches[] = $acteur;
      }
    }
    
    if (!empty($matches)) {
      echo '<div class="resultats">';
      foreach ($matches as $match) {
        echo "<p class='resultat'>$match</p>";
      }
      echo '</div>';
    } else {
      echo '<p class="resultat">Le nom que vous avez entré ne correspond à aucun acteur de notre base</p>';
    }
    
  }

  require 'end.html';
  ?>
