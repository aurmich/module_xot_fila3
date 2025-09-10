# Best Practices

## Laravel
- Utilizzare sempre i Data Transfer Objects (DTO) di Spatie per la gestione dei dati
- Preferire le QueableActions di Spatie invece dei Services
- Seguire le convenzioni PSR-12 per il codice
- Utilizzare i tipi di ritorno e i parametri tipizzati
- Implementare le interfacce per le dipendenze
- Utilizzare i Repository Pattern per l'accesso ai dati
- Implementare il Model Context Protocol per la gestione del contesto

## Database
- Utilizzare le migrazioni per tutte le modifiche al database
- Implementare gli indici appropriati
- Utilizzare le foreign key constraints
- Implementare il soft delete dove appropriato
- Utilizzare le transazioni per operazioni multiple

## Testing
- Scrivere test unitari per la logica di business
- Scrivere test di integrazione per le API
- Utilizzare i factory per i test
- Implementare il test coverage
- Utilizzare i database in memoria per i test

## Sicurezza
- Implementare la validazione dei dati
- Utilizzare l'escape appropriato per l'output
- Implementare l'autenticazione e l'autorizzazione
- Utilizzare HTTPS
- Implementare il rate limiting
- Proteggere contro CSRF e XSS

## Performance
- Utilizzare il caching appropriato
- Ottimizzare le query del database
- Implementare la paginazione
- Utilizzare le code per i task pesanti
- Implementare il lazy loading

## Code Review
- Verificare la conformità con le convenzioni
- Controllare la sicurezza
- Verificare la performance
- Controllare la manutenibilità
- Verificare la testabilità