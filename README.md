Projet Laravel test


## Prérequis 

- Installer Docker Desktop

## Installation d'un nouveau projet

Installer un nouveau projet Laravel avec Sail :
```
# Mac OS
curl -s "https://laravel.build/example-app" | bash

# Windows
curl -s https://laravel.build/example-app | bash
```

Ajouter l'API REST :
```
php artisan install:api
```

## Réinstallation du projet existant

Télécharger le repo puis : 

```
composer install
sail up
sail artisan migrate --seed
```


## Passer Sail dans le path

Ouvrir `~/.zshrc` (ou `~/.bashrc` si le premier n'existe pas)

Ajouter à la fin 
```
alias sail='./vendor/bin/sail' 
```

Enregistrer. 
Dans votre terminal lancez 
```
source `~/.zshrc`
```

Enfin, testez la commande `sail`

## Lancer le serveur

Docker doit tourner sur votre machine.
Lancer le serveur dans le conteneur :

```
sail up
```

Sans mettre sail dans le PATH :
```
./vendor/bin/sail up
```

CTRL+C pour quitter le serveur.
Lancer un autre terminal en parallèle pour les autres commandes

Important : toutes les commandes en `php` sont remplacées par `sail` désormais

Exemple :

```
# Non
php artisan db:seed

# Oui
sail artisan db:seed
```

## Commandes communes d'Artisan

Créer un model complet :
```
sail artisan make:model Product -a 
```

Lancer les migrations : 
```
sail artisan migrate
```

Réinitialiser les migrations : 
```
sail artisan migrate:reset
```

Lancer les seeds :
```
sail artisan db:seed
```

## Mettre à jour la doc Swagger 

```
sail artisan l5-swagger:generate
```