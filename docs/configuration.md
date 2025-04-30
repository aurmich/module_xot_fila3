# Configurazione

## Configurazione Base

### 1. Ambiente
```env
APP_NAME="SaluteOra"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost
```

### 2. Database
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=saluteora
DB_USERNAME=root
DB_PASSWORD=password
```

### 3. Cache
```env
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
```

## Configurazione dei Moduli

### 1. Xot Module
```php
// config/xot.php
return [
    'name' => 'Xot',
    'description' => 'Modulo base per la gestione delle funzionalità comuni',
    'version' => '1.0.0',
    'providers' => [
        \Modules\Xot\Providers\XotServiceProvider::class,
    ],
];
```

### 2. CMS Module
```php
// config/cms.php
return [
    'name' => 'CMS',
    'description' => 'Sistema di gestione dei contenuti',
    'version' => '1.0.0',
    'providers' => [
        \Modules\Cms\Providers\CmsServiceProvider::class,
    ],
];
```

## Configurazione dei Temi

### 1. Tema One
```php
// config/theme-one.php
return [
    'name' => 'One',
    'description' => 'Tema base per il frontend',
    'version' => '1.0.0',
    'assets' => [
        'path' => 'public/themes/one',
        'url' => '/themes/one',
    ],
    'views' => [
        'path' => 'resources/views',
        'namespace' => 'one',
    ],
];
```

### 2. Configurazione Vite
```javascript
// vite.config.js
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

## Configurazione di Filament

### 1. Admin Panel
```php
// config/filament.php
return [
    'default_filesystem_disk' => 'public',
    'auth' => [
        'guard' => 'web',
        'pages' => [
            'login' => \Filament\Pages\Auth\Login::class,
        ],
    ],
];
```

### 2. Widgets
```php
// config/filament/widgets.php
return [
    'default' => [
        'account' => \Filament\Widgets\AccountWidget::class,
        'info' => \Filament\Widgets\InfoWidget::class,
    ],
];
```

## Configurazione di Volt

### 1. Componenti
```php
// config/volt.php
return [
    'path' => 'resources/views/components',
    'namespace' => 'App\\View\\Components',
];
```

### 2. Livewire
```php
// config/livewire.php
return [
    'class_namespace' => 'App\\Http\\Livewire',
    'view_path' => 'resources/views/livewire',
];
```

## Collegamenti

- [Installazione](installation.md)
- [Troubleshooting](troubleshooting.md)
- [Regole di Documentazione](documentation-rules.md) 
