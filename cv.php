<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Mathias Joquet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            padding: 20px;
            border: 2px solid black;
            max-width: 800px;
            margin: auto;
        }
        h1 {
            font-size: 24px;
        }
        .section {
            border: 1px solid black;
            padding: 10px;
            margin-top: 10px;
        }
        .title {
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 2px solid black;
            padding-bottom: 5px;
        }
        .bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
        $nom = "Mathias JOQUET";
        $adresse = "12 Rue Marie-Louise";
        $telephone = "0660434575";
        $email = "mathiasmj18@gmail.com";
        $poste = "Développeur web";
        $annee = date("Y");
    ?>
    
    <header>
        <h1><?php echo $nom; ?></h1>
        <p><?php echo "$adresse • $telephone"; ?><br>
        <?php echo $email; ?><br>
        <span class="bold"><?php echo $poste; ?></span></p>
        <p>Mon portfolio <a href="index.php">Cliquez ici</a></p>
    </header>
    
    <div class="section">
        <p class="title">Objectif</p>
        <p>Trouver une alternance dans le Developpement web pour pouvoir valider mes etudes et contunier dans la cybersécurité.</p>
    </div>

    <div class="section">
        <p class="title">Expériences</p>
        <p><span class="bold">Oct 2023 - Fév 2024</span> - <span class="bold">Stage rémunéré</span></p>
        <p>Simplon Nice</p>
        <ul>
            <li>Création de sites web PHP/JS/Tailwind</li>
            <li>Participation dans la création d’un jeu mobile</li>
            <li>Approfondissement des compétences déjà acquises</li>
        </ul>
        <p><span class="bold">Avr 2024 - Oct 2024</span> - <span class="bold">Piscine du poste</span></p>
        <p>42 Nice</p>
        <ul>
            <li>Prise de connaissance du langage C et C++</li>
            <li>Apprentissage du travail en équipe</li>
            <li>Gestion d’un repository GitHub</li>
        </ul>
    </div>

    <div class="section">
        <p class="title">Éducation</p>
        <p><span class="bold">Bac</span></p>
        <p>Lycée Magnan Nice 06200</p>
    </div>

    <div class="section">
        <p class="title">Compétences</p>
        <p>Résilience et gestion du stress</p>
        <p>Capacité de concentration et de focus</p>
        <p>Compétences en communication et travail d’équipe</p>
        <p>Gestion du temps et organisation</p>
    </div>

    <div class="section">
        <p class="title">Langues</p>
        <p><span class="bold">Anglais</span> Notions élémentaires</p>
    </div>
    
    <footer>
        <p style="text-align: center; margin-top: 20px;">&copy; <?php echo $annee; ?> - <?php echo $nom; ?></p>
    </footer>
</body>
</html>
