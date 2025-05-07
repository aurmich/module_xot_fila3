<<<<<<< HEAD
# Installazione

## Requisiti di Sistema

### 1. Software Richiesto
- PHP 8.2 o superiore
- Composer 2.0 o superiore
- Node.js 18 o superiore
- NPM 9 o superiore
- MySQL 8.0 o superiore

### 2. Estensioni PHP
- BCMath
- Ctype
- cURL
- DOM
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO
- Tokenizer
- XML

## Installazione

### 1. Clonare il Repository
```bash
git clone https://github.com/your-organization/<nome progetto>.git
cd <nome progetto>
```

### 2. Installare le Dipendenze
```bash
# Installare le dipendenze PHP
composer install

# Installare le dipendenze NPM
npm install
```

### 3. Configurazione
```bash
# Copiare il file di ambiente
cp .env.example .env

# Generare la chiave dell'applicazione
php artisan key:generate

# Configurare il database nel file .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<nome progetto>
DB_USERNAME=root
DB_PASSWORD=password
```

### 4. Migrazione del Database
```bash
# Eseguire le migrazioni
php artisan migrate

# Popolare il database con i dati di esempio
php artisan db:seed
```

### 5. Compilazione degli Assets
```bash
# Compilare gli assets
npm run build
```

## Configurazione dei Moduli

### 1. Attivare i Moduli
```bash
# Attivare il modulo Xot
php artisan module:enable Xot

# Attivare altri moduli necessari
php artisan module:enable Cms
```

### 2. Configurare i Temi
```bash
# Pubblicare gli assets del tema
php artisan vendor:publish --tag=theme-one-assets

# Compilare gli assets del tema
npm run theme:build
```

## Verifica dell'Installazione

### 1. Avviare il Server di Sviluppo
```bash
php artisan serve
```

### 2. Verificare l'Accesso
- Aprire http://localhost:8000 nel browser
- Verificare che l'applicazione carichi correttamente
- Controllare che tutti i moduli siano attivi

## Troubleshooting

### 1. Problemi Comuni
- **Errori di Permessi**: Verificare i permessi delle directory
- **Errori di Database**: Controllare le credenziali nel .env
- **Errori di Compilazione**: Verificare le versioni di Node.js e NPM

### 2. Log
- Controllare `storage/logs/laravel.log` per errori
- Verificare i log del server web
- Controllare i log del database

## Collegamenti

- [Configurazione](configuration.md)
- [Troubleshooting](troubleshooting.md)
- [Regole di Documentazione](documentation-rules.md)

## Collegamenti tra versioni di installation.md
* [installation.md](../../../Xot/docs/filament/installation.md)
* [installation.md](../../../Xot/docs/installation.md)
* [installation.md](../../../Xot/docs/base/installation.md)
* [installation.md](../../../User/docs/installation.md)
* [installation.md](../../../Lang/docs/installation.md)
* [installation.md](../../../Cms/docs/installation.md)
* [installation.md](../../../../Themes/One/docs/installation.md)

=======
# Installazione in SaluteOra

Questa guida descrive come installare e configurare il tema One in SaluteOra.

## Requisiti

- PHP 8.1+
- Laravel 10+
- Filament 3.3+
- Node.js 16+
- NPM 8+

## Installazione

1. **Installa il tema**
```bash
composer require saluteora/theme-one
```

2. **Pubblica gli assets**
```bash
php artisan vendor:publish --tag=one-assets
```

3. **Pubblica le viste**
```bash
php artisan vendor:publish --tag=one-views
```

4. **Pubblica le configurazioni**
```bash
php artisan vendor:publish --tag=one-config
```

5. **Installa le dipendenze NPM**
```bash
npm install
```

6. **Compila gli assets**
```bash
npm run dev
```

## Configurazione

1. **Configura il tema in `config/app.php`**
```php
'providers' => [
    // ...
    Themes\One\Providers\ThemeServiceProvider::class,
],
```

2. **Configura il tema in `config/theme.php`**
```php
return [
    'name' => 'One',
    'description' => 'Tema One per SaluteOra',
    'version' => '1.0.0',
    'author' => 'SaluteOra Team',
    'path' => 'themes/one',
    'views' => [
        'path' => 'resources/views',
        'namespace' => 'one',
    ],
    'assets' => [
        'path' => 'public/themes/one',
        'url' => '/themes/one',
    ],
    'providers' => [
        \Themes\One\Providers\ThemeServiceProvider::class,
    ],
];
```

3. **Configura Vite in `vite.config.js`**
```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'themes/one/assets/css/app.css',
                'themes/one/assets/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
```

## Verifica

1. **Verifica l'installazione**
```bash
php artisan theme:list
```

2. **Verifica gli assets**
```bash
php artisan theme:assets
```

3. **Verifica le viste**
```bash
php artisan theme:views
```

## Risoluzione Problemi

### Problemi Comuni

1. **Assets non trovati**
```bash
php artisan theme:publish --force
```

2. **Viste non trovate**
```bash
php artisan view:clear
php artisan cache:clear
```

3. **Configurazioni non caricate**
```bash
php artisan config:clear
php artisan cache:clear
```

### Log

I log del tema sono disponibili in:
```
storage/logs/theme-one.log
```

## Best Practices

1. **Backup**: Fai sempre un backup prima dell'installazione
2. **Versioning**: Usa il controllo versione per il codice
3. **Test**: Verifica sempre l'installazione
4. **Documentazione**: Mantieni la documentazione aggiornata
5. **Sicurezza**: Proteggi le informazioni sensibili
6. **Performance**: Ottimizza le performance
7. **Manutenibilità**: Mantieni il codice pulito
8. **Supporto**: Fornisci supporto per i problemi 
>>>>>>> 3268b83 (.)
