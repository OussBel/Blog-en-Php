# Blog-en-Php
Blog en Php - projet 5 de la formation openclassrooms

1- Clonez le projet : git clone https://github.com/OussBel/Blog-en-Php.git.

2- Installez les dépendances du projet avec la commande: composer install. 

3- Créez dans le dossier root: .env et remplissez les paramètres de votre base de données mettre :DB_HOST, DB_NAME, DB_USER, DB_PASSWORD, SHOW_ERRORS.

4- Créez un compte sur mailjet (service d'envoi des emails), communiquez votre adresse émail et génerez une clé API public et une clé API privé, 
  Ajoutez ces deux clés dans le dossier .env : API_KEY (clé public), API_SECRET (clé privée) et modifiez le fichier App/Helpers/Mail.php.
  
5- créez vos tableaux dans mysql: article, category, comment, user.

6- Pour vous connecter:

    Compte administrateur: admin@phpblog.fr              mot de passe: adminadmin

    Compte utilisateur: user@phpblog.fr                  mot de passe: useruser

