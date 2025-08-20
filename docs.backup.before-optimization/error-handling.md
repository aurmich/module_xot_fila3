# Gestione degli Errori e Logging

## Configurazione Base

### File di Configurazione
```php
// config/logging.php
return [
    'default' => env('LOG_CHANNEL', 'stack'),
    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['single', 'daily', 'slack'],
        ],
        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
        ],
        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 14,
        ],
    ],
];
```

## Gestione degli Errori

### Exception Handler
```php
namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            if (app()->bound('sentry')) {
                app('sentry')->captureException($e);
            }
        });
    }
}
```

### Custom Exceptions
```php
namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
        ], 500);
    }
}
```

## Logging

### Utilizzo Base
```php
use Illuminate\Support\Facades\Log;

// Log di base
Log::info('Messaggio informativo');
Log::error('Errore critico');
Log::warning('Avviso importante');
Log::debug('Informazione di debug');

// Log con contesto
Log::info('Utente loggato', ['user_id' => $user->id]);

// Log con stack trace
Log::error('Errore nell\'applicazione', [
    'exception' => $exception,
    'trace' => $exception->getTraceAsString()
]);
```

### Logging Personalizzato
```php
use Illuminate\Support\Facades\Log;

class CustomLogger
{
    public function logUserAction($user, $action)
    {
        Log::channel('user_actions')->info('Azione utente', [
            'user_id' => $user->id,
            'action' => $action,
            'timestamp' => now(),
        ]);
    }
}
```

## Best Practices

### 1. Gestione Errori
- Implementare try-catch appropriati
- Utilizzare custom exceptions
- Gestire gli errori in modo centralizzato
- Implementare fallback appropriati

### 2. Logging
- Utilizzare i livelli di log appropriati
- Aggiungere contesto ai log
- Implementare rotazione dei log
- Monitorare i log regolarmente

### 3. Monitoraggio
- Implementare error tracking
- Configurare alerting
- Monitorare le performance
- Tracciare gli errori in produzione

### 4. Sicurezza
- Non loggare dati sensibili
- Implementare sanitizzazione
- Proteggere i file di log
- Implementare retention policy

## Strumenti Utili

### Pacchetti Consigliati
- [Sentry](https://sentry.io)
- [Fluentd](https://www.fluentd.org)
- [Logstash](https://www.elastic.co/logstash)
- [Graylog](https://www.graylog.org)

### Comandi Artisan
```bash
# Pulire i log
php artisan log:clear

# Visualizzare i log
php artisan log:show

# Monitorare i log in tempo reale
php artisan log:tail
```

## Esempi di Utilizzo

### Logging di Transazioni
```php
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

try {
    DB::beginTransaction();
    
    // Operazioni sul database
    
    DB::commit();
    Log::info('Transazione completata con successo');
} catch (\Exception $e) {
    DB::rollBack();
    Log::error('Errore nella transazione', [
        'error' => $e->getMessage(),
        'trace' => $e->getTraceAsString()
    ]);
}
```

### Logging di API
```php
use Illuminate\Support\Facades\Log;

class ApiLogger
{
    public function logRequest($request)
    {
        Log::channel('api')->info('Richiesta API', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);
    }

    public function logResponse($response)
    {
        Log::channel('api')->info('Risposta API', [
            'status' => $response->status(),
            'time' => $response->headers->get('X-Response-Time'),
        ]);
    }
}
``` 