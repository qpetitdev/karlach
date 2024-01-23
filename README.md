# README #

Karlach est l'API pour le projet de gestion d'événement
### Setup ###

Depuis la racine du projet:

- Cloner le repo:

        git clone git@github.com:qpetitdev/karlach.git

- Copier les environnements:

        cp .env.dev .env && cp src/.env.dev src/.env

- Build l'image docker principale via docker compose (nécessite d'avoir installé [docker](https://docs.docker.com/engine/install/ "Install docker") et [docker-compose](https://docs.docker.com/compose/install/ "Install docker-compose")):

        docker-compose build

- Lancer les containers de la stack au moyen de docker-compose:

        docker-compose up -d

- Jouer les migrations dans le container de l'appli:

        docker exec -it karlach-app php artisan migrate

### Infos utiles ###

- Pour lancer le projet au moyen de docker-compose:

        docker-compose up -d

- Pour stopper le projet:

        docker-compose down

- Une instance de PhpMyAdmin est installée dans un container de la stack de dev, permettant directement de gérer la db. Accessible à l'adresse :

        http://localhost:1100

- Pour lancer les tests unitaires:

        docker exec -it karlach-app vendor/bin/phpunit --exclude integration ou php artisan test --exclude integration

- Pour lancer les tests d'integration:

        docker exec -it karlach-app vendor/bin/phpunit --group integration ou php artisan test --group integration