# Gestione Errori (Best Practice Xot)

## Errori Comuni e Soluzioni Aggiornati

1. **ValidationException custom**
   - ✅ throw ValidationException::withMessages(['email' => ['Messaggio personalizzato']]);

2. **Fallback enum/status**
   - Usare metodo privato per fallback:
   ```php
   private function getDoctorRegistrationStatus(): string {
       if (!class_exists(DoctorRegistrationStatus::class)) return 'pending';
       try {
           foreach (DoctorRegistrationStatus::cases() as $case) {
               if (strtolower($case->name) === 'pending') return $case->value;
           }
           return 'pending';
       } catch (\Exception $e) { return 'pending'; }
   }
   ```

3. **Controllo su modello specializzato**
   - ✅ Doctor::where('email', ...)

## Checklist
- [ ] Error handling idiomatico
- [ ] Fallback enum/status
- [ ] Collegamenti bidirezionali
- [ ] Test e validazione

## Collegamenti
<<<<<<< HEAD
<<<<<<< HEAD
- [Patient Errori e Soluzioni](../../Patient/docs/models.md)
- [Patient Workflow](../../Patient/docs/doctor-registration-workflow.md)
=======
- [Patient Errori e Soluzioni](../../Patient/project_docs/models.md)
- [Patient Workflow](../../Patient/project_docs/doctor-registration-workflow.md)
>>>>>>> c4ec0fb6 (.)
=======
- [Patient Errori e Soluzioni](../../Patient/docs/models.md)
- [Patient Workflow](../../Patient/docs/doctor-registration-workflow.md)
>>>>>>> edc8a701 (.)
- [README Xot](./README.md)

# Errori di Validazione Custom (Laravel)

## Best Practice

Usa sempre:

```php
throw \Illuminate\Validation\ValidationException::withMessages([
    'campo' => ['Messaggio di errore personalizzato.'],
]);
```

## Anti-pattern

```php
throw new \Illuminate\Validation\ValidationException(
    validator([], [])->errors()->add('campo', 'Messaggio di errore.')
);
```

- Questo genera errori runtime e non è supportato.

## Approfondimenti
<<<<<<< HEAD
<<<<<<< HEAD
- [Patient: errors/validation.md](../../Patient/docs/errors/validation.md) 
=======
- [Patient: errors/validation.md](../../Patient/project_docs/errors/validation.md) 
>>>>>>> c4ec0fb6 (.)
=======
- [Patient: errors/validation.md](../../Patient/docs/errors/validation.md) 
>>>>>>> edc8a701 (.)
