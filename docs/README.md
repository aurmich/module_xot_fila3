# Laraxot PTVX - Documentazione Consolidata

## Panoramica

Laraxot PTVX è un ecosistema modulare basato su Laravel 11, progettato per applicazioni enterprise.

## Architettura Modulare

### Principi Fondamentali

- **Modularità**: Ogni funzionalità è organizzata in moduli indipendenti
- **Coerenza**: Struttura uniforme e convenzioni standardizzate
- **Estensibilità**: Facile aggiunta di nuovi moduli e funzionalità
- **Manutenibilità**: Codice pulito e ben documentato

## Caratteristiche Tecniche

- **Laravel 11**: Framework PHP moderno e potente
- **Filament 3**: Server-Driven UI framework per Laravel
- **Livewire 3**: Full-stack framework per Laravel
- **PHPStan 3**: Static analysis tool (Livello 9/10)
- **Pest 3**: PHP testing framework

## Principi di Sviluppo

- **Namespace**: I namespace dei moduli NON devono includere il segmento `app`
- **Tipizzazione**: Utilizzo di `declare(strict_types=1);` e type hints rigorosi
- **PHPStan**: Compliance con PHPStan Livello 9/10
- **Testing**: Test rigorosi senza `RefreshDatabase`

## Documentazione

### Documenti Principali

- [Convenzioni Laraxot](conventions.md) - Regole e convenzioni per lo sviluppo
- [Laravel Framework](laravel-framework.md) - Documentazione completa del framework
- [Model Context Protocol](model-context-protocol.md) - Implementazione MCP
- [Piano Consolidamento](DOCS_CONSOLIDATION_PLAN.md) - Piano per consolidare documentazione
- [Collegamenti](links.md) - Raccolta di link e riferimenti

### Moduli del Sistema

- **[User Module](../User/docs/README.md)** - Gestione utenti, autenticazione e autorizzazione
- **[UI Module](../UI/docs/README.md)** - Componenti UI e interfacce utente
- **[Performance Module](../Performance/docs/README.md)** - Sistema di valutazione e performance
- **[Lang Module](../Lang/docs/README.md)** - Gestione traduzioni e localizzazione
- **[Progressioni Module](../Progressioni/docs/README.md)** - Sistema di progressioni e schede

## Quick Start

### Installazione

1. Clonare il repository
2. Installare le dipendenze: `composer install`
3. Configurare l'ambiente: `cp .env.example .env`
4. Generare la chiave: `php artisan key:generate`
5. Eseguire le migrazioni: `php artisan migrate`
6. Avviare il server: `php artisan serve`

---

**Data Creazione**: 27 Gennaio 2025  
**Stato**: Consolidato da docs/ root  
**Priorità**: CRITICA (Documentazione principale)