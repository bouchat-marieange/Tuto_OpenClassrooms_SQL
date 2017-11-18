<?php
// $bdd = new PDO('mysql:host=localhost;dbname=Tuto_OpenClassrooms', 'root', 'user', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// Cette requête sert à faire la connecion en PHP et la base de données mysql
// Cette requête indique à PHP
// que l'on appelle mysql
// Où se trouve le serveur de base de données MySQL (localhost)
// Quel est le nom de la base de données MySQL utilisée (Tuto_OpenClassrooms)
// Le login et le mot de passe pour s'y connecter (ce sont ceux de PHPmyAdmin root - user) - si pas de mot de passe, on indique juste 'root', '');

// On va maintenant appelé la base de données en récupérant les données qui sont insérées dans la table jeux_video
// Pour faire cela on doit faire une requête, on utilise ici la programmation orientée objet c'est pour cela que la syntaxe peut parâitre étimezone_transitions_get
// On doit juste préciser qu'il s'agit de la base de données précisée dans la première ligne de code ($bdd)
// Ensuite que l'on va faire une requête en MySQL (parenthèse et guillemets)
// On entre la requête en language MySQL comme appris (SELECT, INSERT INTO, FROM, WHERE, ...)
// Ici on précise que l'on veut selectionner (SELECT) toutes les cellules (*) se trouvant dans la table jeux_video (FROM jeux_video)
// On va stocké l'ensemble des données de la table jeux_video dans une variable $reponse
// $reponse = $bdd->query('SELECT * FROM jeux_video');

// On selectionne toutes les cellules (*) de la table jeux_video
// $reponse = $bdd->query('SELECT * FROM jeux_video');

// On peut ne selectionner que certains champs de la table (séparé par une ,), comme ceci:
//Cela évite pas mal de travail au serveur de base de données qui ne rappatriera que les données dont on a besoin
// $reponse = $bdd->query('SELECT console, nom FROM jeux_video');

// On peut également filtrer les résultats qui seront renvoyés avec WHERE (exemple: console="NES");
//Seuls les jeux disponibles sur la console NES seront affichés
// $reponse = $bdd->query('SELECT console, nom FROM jeux_video WHERE console="NES"');

// On peut également faire des filtres avec des AND ou des OR (un peu comme les conditons en PHP)
// $reponse = $bdd->query('SELECT console, nom FROM jeux_video WHERE console="NES" OR console = "PC"');

// On peut également trier ces données avec le mot clef ORDER BY et choisir sur quelles colonnes va s'appliquer ce tri (ici nom) par ordre croissant ASC (par défaut) (A à Z  ou du plus petit ou plus grand) ou DESC (par ordre décroissant)
// $reponse = $bdd->query('SELECT console, nom FROM jeux_video WHERE console="NES" OR console = "PC" ORDER BY nom ASC');

// On peut également trier ces données avec ORDER BY par prix (même si on a pas rappatrier cette colonne tant qu'on ne veut pas afficher le contenu de la colonne).
// Le premier jeu sera donc le moins cher.
// $reponse = $bdd->query('SELECT console, nom FROM jeux_video WHERE console="NES" OR console = "PC" ORDER BY prix ASC');
// Par contre si on veut non seulement effecturer un tri par prix mais égaelemnt afficher les prix, il sera nécessaire de rappatrier la colonne prix avant de demandé son affichage pour eviter un message d'erreur.
// $reponse = $bdd->query('SELECT * FROM jeux_video WHERE console="NES" OR console = "PC" ORDER BY prix ASC');//l'étoile permet de rappatrier les colonnne nom et console mais également toutes les autres colonnes de la tables dont celle contenant les prix
// while ($donnees = $reponse->fetch())
// {
//   echo '<p>'. $donnees['console']. ' - '. $donnees['nom']. ' - '. $donnees['prix']. ' euros</p>'; //On obtient ainsi la liste des jeux NES et PC claséé par ordre de prix du moins cher au plus cher avec l'affichage des prix pour chaque jeux.
// }

// On peut également limiter le nombre de résultats avec LIMIT. On peut indiquer 5 pour avoir les 5 première entrée mais on peut aussi indiqué LIMIT 5,3 pour afficher à partir de la 5e ligne d'affichage et d'afficher les 3 résultats apparaissant dans la liste à partir de cet endroit (attention les lignes commence à 0 comme pour les tableaux)
// Ainsi pour afficher uniquement le prix le moins cher on affichera LIMIT 0,1 (où 0 est la ligne de début d'affichage et 1 le nombre de ligne à afficher à partir de ce point)
// $reponse = $bdd->query('SELECT console, nom FROM jeux_video WHERE console="NES" OR console = "PC" ORDER BY prix ASC LIMIT 0,3');

// Les mots clefs SELECT, FROM, WHERE, OR , AND, ORDER BY, DESC, ASC, LIMIT sont à connaître par coeur
// L'ordre dans lequel on déclare la requête SQL est aussi essentiel, d'abord on selectionne les colonnes, puis on indique la table, puis on peut en option filtrer et/ou ordonner et/ou limité les résultats


//On peut faire en sorte que la requête change en fonction d'une variable que l'on va envoyer
// On peut demander à l'utilisateur quelle type de console il prèfère pour afficher les jeux correspondant
// Puisque l'on ne sais pas au départ la console que va choisir l'utilisateur dans le filtre WHERE on indique un ? à la place du nom de console
// $reponse = $bdd->query('SELECT console, nom FROM jeux_video WHERE console = ?');

//On va maintenant devoir faire une boucle car $reponse est un tableau qui contient toutes les réponses mais pour les afficher, il faut les passer en revue une par une avec une boucle
// while ($donnees = $reponse->fetch()) // Signifie juste que l'on récupére une nouvelle ligne à chaque fois (un peu comme un incrément). Donc à chaque tour de boucle on aura le contenu d'une nouvelle ligne de la table jeux_video et tout cela sera stocké dans un array appelé $données
// {
  // Pour voir ce que cela affiche on va faire un echo en indiquant $données (array) et entre crochet et guillemets le nom de la colonne dont on veut voir le contenu (par exemple 'nom')
  // On peut pour améliorer l'affichage et faire une nouvelle ligne à chaque résultat affiché ajouter par concaténation de balises html (par exemple <p> ou <br/>)
  // Cette boucle va par exemple afficher la liste de tout les noms des jeux vidéo stocké dans la table jeux_video en passant à la ligne à chaque fois grâce aux balises <p> et </p>
    // echo '<p>'. $donnees['nom'].'</p>';
  // On peut également afficher le contenu de plusieurs colonnes (par exemple console - nom du jeu )tout en utilisant la concaténation pour obtenir un affichage plus lisible et plus beau des données
    // echo '<p>'. $donnees['console']. ' - '. $donnees['nom'].'</p>';

  // Erreur fonction FETCH : Si PHP  vous indique une erreur sur la fonction fetch, cela signifie que vous avez très certainement fait une erreur sur le code en language SQL à la ligne précédent le fetch, fait une vérification de cette partie.
  // Erreur Access denied : indique une erreur dans le nom d'utilisateur ou le mot de passe d'accès à la base de données. Lorsque le site ne sera plus héberger en localhost mais sera mis en ligne host changera également (ex: sql.hebergeur.com), le login et mot de passe changeront aussi et vous seront fournis par votre hébergeur
  // Pour obtenir une description plus détaillée des erreurs qui pourrait survenir dans le code, on peut après la connection à la base de donnée indiquée le code suivant ,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); . Il s'agit d'un array avec ces valeurs là ATTR_ERRMODE et ERRMODE_EXCEPTION, cela permet à cet outil de générer ce que l'on appelle une exception lorqu'il y a une erreur .Il va donc afficher un code d'erreur un peu plus clair et plus compréhensible. C'est la base de données qui renvoie le message d'erreur et va par exemple indiqué que la table jeux_vido n'existe pas parce que on l'aura mal orthographier jeux_video. On comprend donc plus rapidement où se situe l'erreur.
  // Erreur de syntaxe par exemple FRO au lieu de FROM dans la requête MySQL affichera un message d'erreur contenant: Syntax error ... Syntax error
  // Undefined index: nom: indique que dans la requête SQL on a oublier de rappatrier SELECT certaines colonnes dont on a besoin plus loin dans le code.
// }




// On va maintenant faire ce que l'on appelle une REQUETE PREPAREE qui s'utilise quand il y a une inconnue dans les données à recevoir pour afficher le contenu. On remplace query par prepare, on indique un ? pour la donnée inconnue et on va stocké cela non pas dans une variable $reponse mais dans une variable $requete
//Il faudra ensuite exécuter la requête en lui indiquant en paramètre sous forme de tableau ce qu'il faut mettre à la place du point d'interrogation)

// $requete = $bdd->prepare('SELECT * FROM jeux_video WHERE console= ?');
// $requete->execute(array('NES')); // Dans le premier champ de l'array j'indique NES, ce qui signifie, que a la place des ? tu vas prendre les jeux NES. Pour l'instant on indique NES en dur dans le code mais on verra ensuite que l'on peut faire varier cette donnée
// Le principe de la requête préparée est précisément de faire changé ce qui est mis en paramètre de l'array en fonction de ce que l'utilisateur nous envoie. On peut par exemple à la place du NES encodé en dur, utilisé un paramètre qui nous a été envoyé en GET en ou en POST par l'utilisateur via à un formulaire.
// $requete->execute(array($_GET['console']));

//On utilise souvent les requêtes préparées car on est souvent confronté à des cas où on ne connait pas au départ les paramètres que nous demande l'utilisateur
// while ($donnees = $requete->fetch()) // Cette fois, attention, on fait un fetch sur la requete qui vient d'être exécutée et non sur la reponse !!!
// {
//   echo '<p>'. $donnees['console']. ' - '. $donnees['nom']. ' - '. $donnees['prix']. 'euros</p>';
// }


//Pour éviter de devoir créer un formulaire, on va directement ajouter un paramètre transmis en GET dans l'url de la page jeux_video.php en indiquant l'url suivante, qui simule le fait que l'utilisateur à transmis en GET que le parmètre console choisi est PC
// http://localhost/Tuto_OpenClassrooms_SQL/jeux_video.php?console=PC
//Et la page affiche alors bien la liste des jeux PC comme indiqué ci-dessous dès que l'on appuie sur Enter
// PC - Enter the Matrix - 45euros
//
// PC - Max Payne 2 - 50euros
//
// PC - Commandos 3 - 44euros
//
// PC - Starcraft - 19euros
//
// PC - Homeworld 2 - 45euros
//
// PC - Half-Life - 15euros

// On peut tester ainsi différents affichage selon le type de console indiqué.
// Il demeure cependant un problème, c'est que si on introduit rien comme paramètre de console ou si on instroduit un nom de console qui n'existe pas ex: "jsppoeur", soit il y un message d'erreur si aucun paramètre n'est indiqué pour console (empty), soit rien ne s'affiche si la console n'existe pas.
// Pour éviter ce type d'erreur, il faut tester la présence et la valeur du paramètre console


//Voici le code comptet avec le test isset pour vérifier que le paramètre console a bien été transmis.

// if (isset($_GET["console"])) // isset = est-ce que la variable existe? Alors j'exécute tout mon code
// {
//   $bdd = new PDO('mysql:host=localhost;dbname=Tuto_OpenClassrooms', 'root', 'user', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//   $requete = $bdd->prepare('SELECT * FROM jeux_video WHERE console= ?');
//   $requete->execute(array($_GET['console']));
//   while ($donnees = $requete->fetch()) // Cette fois, attention, on fait un fetch sur la requete qui vient d'être exécutée et non sur la reponse !!!
//   {
//     echo '<p>'. $donnees['console']. ' - '. $donnees['nom']. ' - '. $donnees['prix']. 'euros</p>';
//   }
// }
// else // si la variable console n'a pas été transmise alors j'affiche un message d'erreur.
// {
//   echo "<p>La console désirée n'a pas été renseignée! </p>";
// }


//Exemple avec multiple requête SQL cumulées

// try
// {
// 	$bdd = new PDO('mysql:host=localhost;dbname=Tuto_OpenClassrooms;charset=utf8', 'root', 'user');
// }
// catch(Exception $e)
// {
//         die('Erreur : '.$e->getMessage());
// }
//
// $reponse = $bdd->query("SELECT nom, possesseur, console, prix FROM jeux_video WHERE console='Xbox' OR console='PS2' ORDER BY prix DESC LIMIT 0,10");
//
// echo '<p>Voici les 10 premières entrées de la table jeux_video :</p>';
// while ($donnees = $reponse->fetch())
// {
// 	echo $donnees['nom'] . ' - ' .$donnees['prix'].' euros <br />';
// }
//
// $reponse->closeCursor();

 ?>
