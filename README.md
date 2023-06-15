# WF2S Project

## L3 Informatique

#### Nom : 
Clément Guastavino
#### Numero étudiant :
2185756

### Q1 :
````shell
symfony new WF2S
````

### Q2 : 
#### Création de l'entité
````shell
php bin/console make:entity
````

#### Création de la table
````shell
php bin/console make:migration
````

### Q3 :
#### Installation du paquet
````shell
composer req --dev make doctrine/doctrine-fixtures-bundle
composer require fakerphp/faker
````

#### Chargement des fictures
````shell
php bin/console doctrine:fixtures:load
````

### Q4 :
````shell
symfony console make:controller ListObjectsController
symfony console make:controller ManageObjectController
````

### Q6 :
````shell
composer require league/commonmark
````