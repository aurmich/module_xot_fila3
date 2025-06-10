# Service Provider: Regole generali Xot

## Principi
- Tutti i ServiceProvider dei moduli devono estendere XotBaseServiceProvider.
- Studiare SEMPRE la classe base prima di aggiungere override.
- Non duplicare logiche già presenti nella base (traduzioni, viste, config, comandi, ecc.).
- Le traduzioni vanno caricate solo tramite azione centralizzata.
- Le rotte non si caricano da web.php salvo logout/casi documentati.
- Ogni override va motivato e documentato.

## Esempio override sicuro
```php
class CustomModuleServiceProvider extends XotBaseServiceProvider
{
    public function boot(): void
    {
        parent::boot();
        // Solo aggiunte specifiche
    }
}
```

## Backlink
- Vedi anche: ../../Predict/docs/service_provider.md

---

**Ultimo aggiornamento:** 2025-05-24
