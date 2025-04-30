# Convenzioni di Naming nel Modulo Xot

## Classi Base

### Pattern di Naming
Le classi base nel modulo Xot seguono il pattern `XotBase{Type}`. Questo pattern è stato scelto per:
- Chiarezza sulla provenienza (Xot)
- Indicazione esplicita che è una classe base
- Evitare conflitti con altri namespace

### Esempi
```php
// Corretto
use Modules\Xot\Filament\Pages\XotBaseCreateRecord;
use Modules\Xot\Filament\Pages\XotBaseEditRecord;
use Modules\Xot\Filament\Pages\XotBaseListRecords;

// Da Evitare
use Modules\Xot\Filament\Pages\XotCreateRecord;     // ❌
use Modules\Xot\Filament\Pages\XotEditRecord;       // ❌
use Modules\Xot\Filament\Pages\XotListRecords;      // ❌
```

### Struttura delle Classi Base
```php
namespace Modules\Xot\Filament\Pages;

class XotBaseCreateRecord extends CreateRecord
{
    // Funzionalità base comuni a tutte le pagine di creazione
}
```

## Estensione delle Classi Base

### Pattern Corretto
```php
namespace Modules\Cms\Filament\Resources\SectionResource\Pages;

use Modules\Xot\Filament\Pages\XotBaseCreateRecord;

class CreateSection extends XotBaseCreateRecord
{
    // Implementazione specifica
}
```

### Errori Comuni
1. **Omissione di "Base"**
   ```php
   // Errato
   use Modules\Xot\Filament\Pages\XotCreateRecord;
   ```

2. **Namespace Errato**
   ```php
   // Errato
   use Modules\Xot\Pages\XotBaseCreateRecord;
   ```

## Best Practices

### 1. Naming
- Usare sempre il prefisso "XotBase" per le classi base
- Mantenere coerenza nei namespace
- Documentare le eccezioni al pattern

### 2. Organizzazione
- Classi base in Modules/Xot
- Implementazioni specifiche nei rispettivi moduli
- Mantenere la gerarchia dei namespace

### 3. Documentazione
- Documentare i cambi di naming
- Mantenere esempi aggiornati
- Spiegare le eccezioni

## Collegamenti
- [Documentazione Errori](../../../Cms/docs/errors/class-loading-issues.md)
- [Documentazione Root](../../../../docs/naming-conventions.md)
- [Architettura Moduli](architecture.md) 
