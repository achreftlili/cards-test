# Jeux de carte

un joueur tire une main de 10 cartes tirées de manière aléatoire. Chaque carte possède une couleur ("Carreaux", par exemple) et une valeur ("10", par exemple). On vous demande de présenter la main "non triée" à l'écran puis la main triée. C'est-à-dire que vous devez classer les cartes par couleur et valeur. L'ordre des couleurs est, par exemple, le suivant : --> Carreaux, Cœur, Pique, Trèfle L'ordre des valeurs est, par exemple, le suivant : --> AS, 2, 3, 4, 5, 6, 7, 8, 9, 10, Valet, Dame, Roi Vous présenterez une solution qui tourne sur le langage PHP (Symfony) et en architecture API

## cards-api

c'est une API rest basé sur symfony 7.1 + php 8.2 pour lancer l'api il suffit de lancer la commande
`docker-compose up -d
`
pour avoir un endpoint http://localhost:9500/

## cards-front 

c'est une application front basé sur Angular 17 pour afficher le resultat et consommer les deux endpoints
* /cards pour la récuperation des cards 
* /sort-cards pour trier les cards

pour lancer l'application front il suffit de lancé `npm start` pour avoir l'application lancé sur http://localhost:4200/

<img width="1666" alt="Capture d’écran 2024-06-21 à 02 08 32" src="https://github.com/achreftlili/cards-test/assets/4409405/29920114-d137-473e-adde-b5bbe02c10fb">
