# Struttura Base del Modulo

## Struttura Standard

```
Modules/
└── [NomeModulo]/           # PascalCase
    ├── app/               # lowercase
    │   ├── Filament/     # PascalCase
    │   │   ├── Resources/
    │   │   ├── Pages/
    │   │   └── Widgets/
    │   └── ...
    ├── resources/         # lowercase
    │   ├── views/        # lowercase
    │   │   └── pages/    # lowercase per Folio
    │   ├── lang/         # lowercase
    │   ├── js/           # lowercase
    │   ├── css/          # lowercase
    │   └── images/       # lowercase
    ├── config/           # lowercase
    ├── database/         # lowercase
    └── docs/             # lowercase
```

## Convenzioni Principali

1. **Case Sensitivity**:
   - Cartelle standard Laravel in lowercase
   - Nome modulo in PascalCase
   - Namespace Filament in PascalCase
   - Tutte le sottocartelle in lowercase

2. **Routing Folio**:
   - Pagine in `resources/views/pages/`
   - Tutte le cartelle e file in lowercase
   - Non definire rotte manualmente
   - Usare la struttura delle cartelle per il routing

3. **Componenti Filament**:
   - In `app/Filament/`
   - Sottocartelle in PascalCase
   - Estendere sempre classi XotBase

## Best Practices

1. **Struttura**:
   - Seguire la struttura standard
   - Usare cartelle per organizzare
   - Mantenere nomi in lowercase

2. **Routing**:
   - Usare Folio per il routing automatico
   - Non definire rotte manualmente
   - Struttura gerarchica chiara

3. **Componenti**:
   - Estendere sempre XotBase
   - Usare PascalCase per namespace
   - Mantenere coerenza nel naming

## Esempi

### Struttura Corretta
```
Modules/User/resources/views/pages/auth/login.blade.php
Modules/User/app/Filament/Resources/UserResource.php
```

### Struttura Errata
```
Modules/User/Resources/views/pages/Auth/Login.blade.php
Modules/User/Filament/Resources/UserResource.php
```

## Note Importanti
- Mantenere coerenza nella struttura
- Seguire le convenzioni di naming
- Documentare eccezioni
- Aggiornare moduli esistenti 