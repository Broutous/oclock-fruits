<?php

    // on récupère le nom du fruit passé dans l'url (?fruit=xxxx)
    // via la superglobale $_GET.
    // comme $_GET est un array associatif, on récupère la valeur en précisant la clé dans les crochets
    // Attention : la clé est une chaîne ('entre quotes')
    $fruit = $_GET['fruit'];

    // on crée le tableau des fruits
    $fruitsExistants = [
        'banane',
        'pomme',
        'fraise',
        'poire',
        'pêche'
    ];

    // on crée le tableau associatif qui donne la couleur en hexadécimal pour chaque fruit.
    $couleursFruits = [
        'banane' => '#e7ea3f',
        'pomme' => '#c4e86a',
        'fraise' => '#d63931',
        'poire' => '#e7ea3f',
        'pêche' => '#f9a227'
    ];

    // on vérifie que la couleur pour le fruit donné en paramètre d'url existe dans notre tableau
    if (!empty($couleursFruits[$fruit])) {
        $couleurFruit = $couleursFruits[$fruit]; // si c'est le cas on l'affecte à $couleurFruit
    } else {
        $couleurFruit = '#ffffff'; // sinon on met du blanc par défaut.
    }

?>
<!DOCTYPE html>
<html>
<head>
   <meta charset='utf-8'>
   <!-- Un super titre pour être original -->
   <title>Fruits.com, Mangez des fruits !</title>

   <!-- Un peu de style pour être poli -->
   <link rel="stylesheet" href="style.css" />
</head>
<body>
    <!-- On ajoute la couleur dans l'attribut style de la balise <h1> et on ajoute le "s" pour mettre le fruit au pluriel -->
    <h1 style="color: <?php echo $couleursFruits[$fruit] ?>">Mangez des <?php echo $fruit . 's'; ?> !</h1>

    <ul class="liste-fruits">
        <?php 
            // pour chacun des fruits dans la liste des fruits existants ($fruitsExistants),
            // on affiche un lien vers fruits.php en faisant varier la valeur du paramètre d'url "fruit"
            // et la couleur du lien en fonction du fruit (c'est beau !)
            foreach($fruitsExistants as $fruitExistant) {
                // si le fruit dans cette itération est le même que celui demandé en paramètre d'url,
                // on n'affiche pas de lien, car on est déjà sur la page !
                if ($fruit === $fruitExistant) {
                    echo '<li>Mangez des ' .$fruitExistant .'s !</li>';
                } else {
                    echo '<li><a style="color: ' . $couleursFruits[$fruitExistant] . '" href="fruits.php?fruit=' . $fruitExistant . '">Mangez des ' . $fruitExistant . 's' . ' !</a></li>';
                }
            }
        ?>
    </ul>

    <!-- On va chercher l'image qui porte le nom du fruit passé en paramètre d'url en préfixant avec le répertoire /img et 
         en suffixant avec l'extension .jpg -->
    <img src="img/<?php echo $fruit; ?>.jpg" alt="<?php echo $fruit; ?>" />
</body>
</html>