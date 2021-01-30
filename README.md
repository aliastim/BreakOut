## Installation du projet 

```bash
composer create-project --prefer-dist laravel/laravel BreakOut
```

Lancer le serveur : 
```bash
php artisan serve
npm run watch
```

installer vuejs : 
```bash
composer require laravel/ui
```
```bash
php artisan ui vue
```
installer les dépendences vuejs :
```bash
npm install
```

```bash
npm run dev
```

installer les paramètres de connexion :
```bash
php artisan ui vue --auth
```
-----

Ajouter les dossiers public/css et public/js dans le .gitignore :
-> Les fichiers css et js sont automatiquement (re)créés avec le npm run watch
