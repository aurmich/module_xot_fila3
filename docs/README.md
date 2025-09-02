# Xot Module - Framework Base Laraxot

## Overview
Modulo base del framework Laraxot con funzionalità core e best practices.

## Quick Links
- [🏆 PHPStan Level 9 Achievement](phpstan-level9-achievement.md) - **✅ COMPLETATO** - 832→0 errori PHPStan
- [🎨 Theme Assets Workflow](theme-assets-workflow.md) - **⚠️ CRITICO** - Workflow CSS/JS per temi
- [PHPStan Array Types Fixes](phpstan-array-types-fixes.md) - **✅ COMPLETATO** - Correzioni complete tipi array
- [Filament Complete Guide](consolidated/filament-complete-guide.md)
- [PHPStan Complete Guide](consolidated/phpstan-complete-guide.md)
- [Migration Complete Guide](consolidated/migration-complete-guide.md)
- [Testing Complete Guide](consolidated/testing-complete-guide.md)
- [Translation Complete Guide](consolidated/translation-complete-guide.md)

## Architecture
- Base classes per tutti i moduli
- Service providers centralizzati
- Convenzioni e standard

## Installation
```bash
composer require laraxot/xot
```

## Configuration
Configurazione automatica tramite service providers.

## Documentation Archive
I file di documentazione originali sono stati consolidati per seguire i principi DRY + KISS.
Per accedere alla documentazione dettagliata originale, vedere il backup in:
`docs-consolidation-backup-*/Xot-docs-original/`

## Principles
- **DRY**: Un solo punto di verità
- **KISS**: Semplicità e chiarezza
- **Type Safety**: Tipizzazione rigorosa
- **Documentation**: Documentazione essenziale

<<<<<<< HEAD
## Links
- [Root Documentation](../../../docs/)
- [SaluteOra Module](../SaluteOra/docs/)
- [Original Documentation Backup](../../../docs-consolidation-backup-*/Xot-docs-original/)
=======
// Sanitizzazione
protected function sanitizeInput(array $data): array
{
    return array_map('trim', $data);
}
```

### Autorizzazione

```php
// Verifica permessi
protected function checkPermission(string $permission): void
{
    if (!auth()->user()->can($permission)) {
        abort(403, 'Unauthorized action.');
    }
}

// Verifica proprietà
protected function checkOwnership(Model $model): void
{
    if ($model->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }
}
```

## Monitoraggio e Logging

### Log Base

```php
// Log operazioni
protected function logOperation(string $operation, array $context = []): void
{
    Log::info("Xot operation: {$operation}", array_merge([
        'user_id' => auth()->id(),
        'model' => static::class,
        'timestamp' => now(),
    ], $context));
}

// Log errori
protected function logError(string $message, \Throwable $exception): void
{
    Log::error("Xot error: {$message}", [
        'exception' => $exception->getMessage(),
        'trace' => $exception->getTraceAsString(),
        'user_id' => auth()->id(),
    ]);
}
```

### Metriche

- Numero estensioni per classe base
- Performance operazioni base
- Utilizzo trait condivisi
- Errori e eccezioni

## Troubleshooting

### Problemi Comuni

1. **Classi Base Non Trovate**
   - Verificare autoloading
   - Controllare namespace
   - Verificare estensioni corrette

2. **Trait Non Funzionanti**
   - Verificare use statement
   - Controllare metodi richiesti
   - Verificare compatibilità

3. **Service Provider Non Registrati**
   - Controllare config/app.php
   - Verificare estensione corretta
   - Controllare errori di sintassi

### Debug

```php
// Debug configurazione
config(['xot.debug' => true]);

// Log dettagliato
Log::debug('Xot debug', [
    'config' => config('xot'),
    'models' => get_declared_classes(),
    'traits' => get_declared_traits(),
]);
```

## Testing e Qualità del Codice

### Principi Fondamentali

Il modulo Xot segue rigorosamente i principi di testing senza `RefreshDatabase` per garantire:

- **Performance**: Test unitari < 100ms ciascuno
- **Isolamento**: Ogni test è indipendente
- **Velocità**: Suite completa < 30 secondi
- **Manutenibilità**: Test chiari e semplici

### ❌ Anti-Pattern VIETATI

```php
// ❌ VIETATO ASSOLUTAMENTE
use Illuminate\Foundation\Testing\RefreshDatabase;

class XotTest extends TestCase
{
    use RefreshDatabase; // VIETATO!
    
    public function test_something()
    {
        $model = Model::factory()->create(); // VIETATO!
        // ...
    }
}
```

### ✅ Pattern Corretti

```php
// ✅ CORRETTO - Test unitario con oggetti in-memory
it('can process data', function () {
    $data = ['test' => 'value'];
    $processor = new DataProcessor();
    
    $result = $processor->process($data);
    
    expect($result)->toBe('processed');
});

// ✅ CORRETTO - Test con mock
it('can handle external service', function () {
    $mockService = Mockery::mock(ExternalService::class);
    $mockService->shouldReceive('call')->andReturn('success');
    
    $handler = new ServiceHandler($mockService);
    $result = $handler->process();
    
    expect($result)->toBe('success');
});
```

### Helper Functions Disponibili

```php
// Genera email unica per test (NO database)
protected static function generateUniqueEmail(): string

// Ottiene classe User via XotData (pattern corretto)
protected static function getUserClass(): string

// Crea utente di test in-memory (NO database)
protected static function createTestUser(array $attributes = []): UserContract

// Mock XotData per testing (NO database)
protected static function mockXotData(): void
```

### Best Practices

1. **Test Unitari**: Solo logica di business, NO database
2. **Mock e Stub**: Per dipendenze esterne
3. **Oggetti In-Memory**: Per dati di test
4. **Isolamento**: Test non devono interferire tra loro
5. **Performance**: Ogni test < 100ms

### Documentazione Completa

Per informazioni dettagliate sui best practices di testing:
- [Testing Best Practices](../../../docs/testing-best-practices-no-refresh-database.md)
- [Code Quality Guidelines](archive/code-quality.md)

## Integrazione con Altri Moduli

### Registrazione Modulo

```php
// Nel ServiceProvider del modulo
public function boot(): void
{
    parent::boot();
    
    // Registrazione specifica del modulo
    $this->registerResources();
    $this->registerCommands();
}
```

### Utilizzo Cross-Module

```php
// In qualsiasi modulo
use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Traits\HasUuid;

class MyModel extends XotBaseModel
{
    use HasUuid;
    
    // Implementazione specifica del modulo
}
```

## Roadmap

### Funzionalità Future

- [ ] Sistema di plugin avanzato
- [ ] API REST base
- [ ] Sistema di eventi avanzato
- [ ] Cache intelligente
- [ ] Monitoring avanzato
- [ ] Sistema di backup automatico

### Miglioramenti

- [ ] Performance optimization
- [ ] Advanced caching
- [ ] Real-time updates
- [ ] Analytics avanzate
- [ ] API REST completa

## Contributi

### Sviluppo

1. Fork del repository
2. Creazione branch feature
3. Implementazione funzionalità
4. Test completi
5. Pull request con documentazione

### Standard di Codice

- PSR-12 coding standards
- PHPStan livello 9+
- Test coverage >90%
- Documentazione PHPDoc completa

## Licenza

Questo modulo è rilasciato sotto la licenza MIT. Vedi il file LICENSE per i dettagli.

## Supporto

Per supporto tecnico o domande:

- **Issues**: GitHub Issues
- **Documentazione**: Questa documentazione
- **Wiki**: Wiki del progetto
- **Chat**: Canale Slack/Teams

---

*Ultimo aggiornamento: {{ date('Y-m-d') }}*
>>>>>>> 34e775e (.)
