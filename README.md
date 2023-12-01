# Blog-en-Php
Blog en Php - projet 5 de la formation openclassrooms

1- Installez xampp (PHP 8.0) 

1- Clonez le projet : git clone https://github.com/OussBel/Blog-en-Php.git.  à lintérieur de votre:  xampp/htdocs/

2- Installez les dépendances du projet avec la commande: composer install. 

4- Créez dans le dossier root: .env et remplissez les paramètres de votre base de données:DB_HOST, DB_NAME, DB_USER, DB_PASSWORD, SHOW_ERRORS.

5- Créez un compte sur mailjet (service d'envoi des emails), communiquez votre adresse émail et génerez une clé API public et une clé API privé.

6- Ajoutez ces deux clés dans le dossier .env : API_KEY (clé public), API_SECRET (clé privée) et modifiez le fichier App/Helpers/Mail.php en mettant votre émail ainsi que votre API_KEY et API_SECRET.

7- Configurez votre xampp: Ouvrez votre xampp et configurer le fichier: Apache(httpd.conf), a l'intérieur, modifier le documentRoot et le documentDirectory comme ceci: 
  
   DocumentRoot "C:/xampp/htdocs/Blog-en-Php/Public"                                           
   
   <Directory "C:/xampp/htdocs/Blog-en-Php/Public">
   

8- Importez le fichier de base de données php_blog.sql.


9- Ouvrez votre xampp et appuyer sur start pour Apache et MYSQL.

10- Pour vous connecter:

    Compte administrateur: admin@phpblog.fr              mot de passe: adminadmin

    Compte utilisateur: user@phpblog.fr                  mot de passe: useruser

