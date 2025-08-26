<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
# Convenzioni di Nomenclatura in Laravel Modules

Questo documento definisce le convenzioni ufficiali di nomenclatura da utilizzare in tutto il progetto Laravel Modules.

## Panoramica
Questo documento descrive le convenzioni di denominazione da seguire all'interno di un modulo Laravel per garantire coerenza e chiarezza nel codice.

## Principi chiave
1. **Denominazione descrittiva**: Utilizzare nomi descrittivi che indichino chiaramente lo scopo o il comportamento delle variabili, metodi e classi.
2. **Coerenza**: Mantenere schemi di denominazione coerenti in tutto il codice per ridurre il carico cognitivo.

## Linee guida per l'implementazione
### 1. Denominazione delle classi
- Utilizzare PascalCase per i nomi delle classi, assicurandosi che siano sostantivi che descrivono l'entità o la funzionalità.
  ```php
  class UserProfile
  {
      // Definizione della classe
  }
  ```

### 2. Denominazione dei metodi
- Utilizzare camelCase per i nomi dei metodi, iniziando con un verbo che descrive l'azione eseguita.
  ```php
  public function calculateTotalPrice()
  {
      // Implementazione del metodo
  }
  ```

### 3. Denominazione delle variabili
- Utilizzare camelCase per i nomi delle variabili, rendendole descrittive dei dati che contengono.
  ```php
  $userFullName = 'John Doe';
  ```

### 4. Denominazione dei file
- Fare in modo che i nomi dei file corrispondano ai nomi delle classi per le classi, utilizzando PascalCase. Per altri file, utilizzare kebab-case per descrivere il contenuto.
  ```
  UserProfile.php
  user-profile-utils.php
  ```

## Problemi comuni e soluzioni
- **Denominazione incoerente**: Evitare di mescolare stili di denominazione (ad esempio, snake_case con camelCase) per mantenere la leggibilità.
- **Nomi vaghi**: Rinominare nomi vaghi come `$data` o `$temp` in qualcosa di più descrittivo come `$userData` o `$temporaryResult`.

## Documentazione e aggiornamenti
- Documentare eventuali deviazioni da queste convenzioni di denominazione nella cartella di documentazione del modulo pertinente.
- Aggiornare questo documento se vengono introdotti nuovi schemi di denominazione o convenzioni.

## Collegamenti alla documentazione correlata
- [Qualità del codice](./CODE_QUALITY.md)
- [Tipi rigorosi PHP](./PHP-STRICT-TYPES.md)
- [Guida all'implementazione di PHPStan](./PHPSTAN-IMPLEMENTATION-GUIDE.md)
- [Best practice per i provider di servizi](./SERVICE-PROVIDER-BEST-PRACTICES.md)
- [Best practice per Filament](./FILAMENT-BEST-PRACTICES.md)
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b258042 (.)
=======
>>>>>>> 9109118 (.)
# Convenzioni di Nomenclatura in <nome progetto>

Questo documento definisce le convenzioni ufficiali di nomenclatura da utilizzare in tutto il progetto <nome progetto>.

## Convenzioni Generali

### Formato Case

- **PascalCase**: Prima lettera maiuscola, senza spazi o separatori (es. `UserProfile`)
  - Usato per: Nomi di classi, interfacce, enumerazioni, nomi dei moduli
  
- **camelCase**: Prima lettera minuscola, senza spazi o separatori (es. `getUserProfile`)
  - Usato per: Metodi, funzioni, proprietà non statiche
  
- **snake_case**: Tutte le lettere minuscole, parole separate da underscore (es. `user_profile`)
  - Usato per: Variabili, costanti di classe (non globali), nomi di file delle viste, tabelle del database, colonne del database
  
- **UPPER_SNAKE_CASE**: Tutte le lettere maiuscole, parole separate da underscore (es. `MAX_LOGIN_ATTEMPTS`)
  - Usato per: Costanti globali, enums

## Moduli

### Nome del Modulo

Il nome del modulo deve essere in formato **PascalCase** con la prima lettera maiuscola.

- ✅ CORRETTO: `Blog`, `UserProfile`, `MobilitaVolontaria`
- ❌ ERRATO: `blog`, `userProfile`, `mobilitavolontaria`, `Mobilita_Volontaria`

### Namespace del Modulo

I namespace dei moduli devono seguire il formato:

```php
namespace Modules\NomeModulo;
```

### Service Provider

Il service provider principale di un modulo deve:

1. Avere il nome che termina con `ServiceProvider` 
2. Estendere `XotBaseServiceProvider`
3. Definire una proprietà `$name` con il nome del modulo in **PascalCase**

```php
class BlogServiceProvider extends XotBaseServiceProvider {
    public string $name = 'Blog';
    // ...
}
```

## Database

### Tabelle

I nomi delle tabelle devono essere in **snake_case** e al plurale:

- ✅ CORRETTO: `users`, `blog_posts`, `user_profiles`
- ❌ ERRATO: `User`, `BlogPost`, `user_profile`

### Colonne

I nomi delle colonne devono essere in **snake_case**:

- ✅ CORRETTO: `first_name`, `created_at`, `user_id`
- ❌ ERRATO: `firstName`, `CreatedAt`, `UserID`

### Chiavi Primarie

Usare `id` come nome della chiave primaria.

### Chiavi Esterne

Usare `table_name_singular_id` come formato per le chiavi esterne:

- ✅ CORRETTO: `user_id`, `blog_post_id`
- ❌ ERRATO: `userID`, `blogPostId`, `user`

## Filament

### Nomi delle Risorse

I nomi delle risorse Filament devono essere in **PascalCase** e terminare con `Resource`:

- ✅ CORRETTO: `UserResource`, `BlogPostResource`
- ❌ ERRATO: `Users`, `blogPost`, `Blog_Post_Resource`

### Metodi per le azioni

I metodi per le azioni delle tabelle devono essere **pubblici**:

```php
// ✅ CORRETTO
public function getTableHeaderActions(): array
{
    // ...
}

// ❌ ERRATO
protected function getTableHeaderActions(): array
{
    // ...
}
```

## Traduzioni

### Chiavi di Traduzione

Le chiavi di traduzione devono essere in **snake_case**:

```php
// File di traduzione
return [
    'user_profile' => [
        'title' => 'Profilo Utente',
        'fields' => [
            'first_name' => 'Nome',
            'last_name' => 'Cognome',
        ],
    ],
];
```

## Repository Git

### Nomi dei Branch

- **feature/nome-feature**: Per nuove funzionalità
- **bugfix/descrizione-bug**: Per correzioni di bug
- **hotfix/descrizione-hotfix**: Per correzioni urgenti
- **release/versione**: Per preparare release

### Commit Message

Formato consigliato:
```
type(scope): descrizione breve

Descrizione dettagliata se necessaria
```

Tipi: `feat`, `fix`, `docs`, `style`, `refactor`, `test`, `chore`
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> 7ce328e (.)
=======
>>>>>>> 995f7cae (.)
=======
>>>>>>> 9109118 (.)
# Convenzioni di Nomenclatura in Laravel Modules

Questo documento definisce le convenzioni ufficiali di nomenclatura da utilizzare in tutto il progetto Laravel Modules.

## Panoramica
Questo documento descrive le convenzioni di denominazione da seguire all'interno di un modulo Laravel per garantire coerenza e chiarezza nel codice.

## Principi chiave
1. **Denominazione descrittiva**: Utilizzare nomi descrittivi che indichino chiaramente lo scopo o il comportamento delle variabili, metodi e classi.
2. **Coerenza**: Mantenere schemi di denominazione coerenti in tutto il codice per ridurre il carico cognitivo.

## Linee guida per l'implementazione
### 1. Denominazione delle classi
- Utilizzare PascalCase per i nomi delle classi, assicurandosi che siano sostantivi che descrivono l'entità o la funzionalità.
  ```php
  class UserProfile
  {
      // Definizione della classe
  }
  ```

### 2. Denominazione dei metodi
- Utilizzare camelCase per i nomi dei metodi, iniziando con un verbo che descrive l'azione eseguita.
  ```php
  public function calculateTotalPrice()
  {
      // Implementazione del metodo
  }
  ```

### 3. Denominazione delle variabili
- Utilizzare camelCase per i nomi delle variabili, rendendole descrittive dei dati che contengono.
  ```php
  $userFullName = 'John Doe';
  ```

### 4. Denominazione dei file
- Fare in modo che i nomi dei file corrispondano ai nomi delle classi per le classi, utilizzando PascalCase. Per altri file, utilizzare kebab-case per descrivere il contenuto.
  ```
  UserProfile.php
  user-profile-utils.php
  ```

## Problemi comuni e soluzioni
- **Denominazione incoerente**: Evitare di mescolare stili di denominazione (ad esempio, snake_case con camelCase) per mantenere la leggibilità.
- **Nomi vaghi**: Rinominare nomi vaghi come `$data` o `$temp` in qualcosa di più descrittivo come `$userData` o `$temporaryResult`.

## Documentazione e aggiornamenti
- Documentare eventuali deviazioni da queste convenzioni di denominazione nella cartella di documentazione del modulo pertinente.
- Aggiornare questo documento se vengono introdotti nuovi schemi di denominazione o convenzioni.

## Collegamenti alla documentazione correlata
<<<<<<< HEAD
- [Qualità del codice](./CODE_QUALITY.md)
- [Tipi rigorosi PHP](./PHP-STRICT-TYPES.md)
- [Guida all'implementazione di PHPStan](./PHPSTAN-IMPLEMENTATION-GUIDE.md)
- [Best practice per i provider di servizi](./SERVICE-PROVIDER-BEST-PRACTICES.md)
- [Best practice per Filament](./FILAMENT-BEST-PRACTICES.md)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 7dd92412 (.)
=======
>>>>>>> 7ce328e (.)
=======
>>>>>>> 995f7cae (.)
>>>>>>> b258042 (.)
=======
# Naming Conventions for Laraxot Documentation

## Overview

This document defines the mandatory naming conventions for documentation files and folders in Laraxot projects. Following these conventions ensures consistency, maintainability, and proper organization across all modules.

## Core Naming Rules

### 1. **File Names**
- **ALWAYS** use lowercase for all documentation files
- **NEVER** use uppercase letters in filenames
- **ALWAYS** use hyphens (`-`) instead of underscores (`_`)
- **ONLY** exception: `README.md` can contain uppercase letters

### 2. **Folder Names**
- **ALWAYS** use lowercase for all documentation folders
- **NEVER** use uppercase letters in folder names
- **ALWAYS** use hyphens (`-`) instead of underscores (`_`)

## Correct vs. Incorrect Examples

### ✅ CORRECT Naming
```
docs/
├── code-quality.md
├── filament-best-practices.md
├── testing-guidelines.md
├── migration-standards.md
├── translations-best-practices.md
├── namespace-conventions.md
└── troubleshooting/
    ├── git-conflicts-resolution.md
    ├── phpstan-errors.md
    └── common-issues.md
```

### ❌ INCORRECT Naming
```
docs/
├── CODE_QUALITY.md          # Uppercase letters
├── FilamentBestPractices.md # PascalCase
├── testing_guidelines.md    # Underscores
├── Migration-Standards.md   # Mixed case
├── TRANSLATIONS.md          # All uppercase
└── Troubleshooting/         # Uppercase folder
    ├── Git-Conflicts.md     # Mixed case
    └── PHPSTAN_ERRORS.md    # Mixed case and underscores
```

## Module Documentation Structure

### 1. **Standard Module Docs**
```
Modules/ModuleName/
└── docs/
    ├── README.md
    ├── testing.md
    ├── api.md
    ├── models.md
    ├── filament.md
    ├── migrations.md
    ├── translations.md
    └── troubleshooting/
        ├── common-issues.md
        └── error-solutions.md
```

### 2. **Specialized Module Docs**
```
Modules/ModuleName/
└── docs/
    ├── README.md
    ├── business-logic.md
    ├── data-flow.md
    ├── integration-guide.md
    ├── performance-optimization.md
    └── security-guidelines.md
```

## File Naming Patterns

### 1. **General Guidelines**
- Use descriptive, clear names
- Keep names concise but informative
- Use consistent terminology across modules
- Avoid abbreviations unless universally understood

### 2. **Common Patterns**
```
# Testing
testing.md
testing-guidelines.md
testing-best-practices.md
testing-strategy.md

# Code Quality
code-quality.md
code-standards.md
quality-guidelines.md
best-practices.md

# Filament
filament.md
filament-best-practices.md
filament-guidelines.md
filament-components.md

# Migrations
migrations.md
migration-standards.md
migration-guidelines.md
database-migrations.md
```

### 3. **Troubleshooting Files**
```
troubleshooting/
├── common-issues.md
├── error-solutions.md
├── debugging-guide.md
├── performance-issues.md
├── security-issues.md
└── integration-issues.md
```

## Content Organization

### 1. **File Headers**
Every documentation file should start with:
```markdown
# Title of the Document

## Overview

Brief description of the document's purpose and scope.

## Table of Contents

- [Section 1](#section-1)
- [Section 2](#section-2)
- [Section 3](#section-3)
```

### 2. **Section Headers**
Use consistent header levels:
```markdown
# Main Title (H1)
## Section (H2)
### Subsection (H3)
#### Detail (H4)
```

### 3. **Code Examples**
```markdown
```php
<?php

declare(strict_types=1);

namespace Modules\Example;

class ExampleClass
{
    // Implementation
}
```
```

## Cross-References and Links

### 1. **Internal Links**
```markdown
- [Testing Guidelines](./testing.md)
- [Code Quality Standards](./code-quality.md)
- [Migration Standards](./migration-standards.md)
```

### 2. **Cross-Module Links**
```markdown
- [User Module Testing](../../User/docs/testing.md)
- [Chart Module API](../../Chart/docs/api.md)
- [UI Module Components](../../UI/docs/components.md)
```

### 3. **Root Documentation Links**
```markdown
- [Project Testing Strategy](../../../docs/testing-strategy.md)
- [Global Best Practices](../../../docs/best-practices.md)
- [Architecture Overview](../../../docs/architecture.md)
```

## Automation and Maintenance

### 1. **Automation Scripts**
Use the provided automation script to standardize naming:
```bash
# Run from project root
./bashscripts/docs/fix_docs_case.sh
```

### 2. **Regular Audits**
- Monthly review of documentation structure
- Check for naming convention violations
- Update cross-references and links
- Remove outdated or duplicate files

### 3. **Validation Checklist**
Before committing documentation changes:
- [ ] All filenames are lowercase
- [ ] All folder names are lowercase
- [ ] Hyphens used instead of underscores
- [ ] No uppercase letters in names
- [ ] Cross-references are updated
- [ ] Links are bidirectional where appropriate

## Migration from Old Naming

### 1. **Step-by-Step Process**
1. **Identify** files with incorrect naming
2. **Rename** files to follow conventions
3. **Update** all internal references
4. **Update** cross-module references
5. **Update** root documentation references
6. **Test** all links and references
7. **Commit** changes with clear message

### 2. **Example Migration**
```bash
# Before
Modules/ModuleName/docs/CODE_QUALITY.md
Modules/ModuleName/docs/FILAMENT_BEST_PRACTICES.md

# After
Modules/ModuleName/docs/code-quality.md
Modules/ModuleName/docs/filament-best-practices.md
```

### 3. **Update References**
```markdown
# Before
[Code Quality](../CODE_QUALITY.md)
[Filament Best Practices](../FILAMENT_BEST_PRACTICES.md)

# After
[Code Quality](./code-quality.md)
[Filament Best Practices](./filament-best-practices.md)
```

## Best Practices

### 1. **Consistency**
- Use the same naming pattern across all modules
- Maintain consistent terminology
- Follow established conventions

### 2. **Clarity**
- Choose descriptive names
- Avoid ambiguous abbreviations
- Use clear, understandable terms

### 3. **Maintainability**
- Easy to find and navigate
- Simple to update and maintain
- Clear organization structure

### 4. **Searchability**
- Names that are easy to search for
- Consistent patterns for similar content
- Logical grouping of related files

## Common Mistakes to Avoid

### 1. **Mixed Case**
```markdown
# ❌ WRONG
CodeQuality.md
FilamentBestPractices.md
TestingGuidelines.md

# ✅ CORRECT
code-quality.md
filament-best-practices.md
testing-guidelines.md
```

### 2. **Underscores**
```markdown
# ❌ WRONG
code_quality.md
filament_best_practices.md
testing_guidelines.md

# ✅ CORRECT
code-quality.md
filament-best-practices.md
testing-guidelines.md
```

### 3. **Uppercase Letters**
```markdown
# ❌ WRONG
CODE_QUALITY.md
FILAMENT_BEST_PRACTICES.md
TESTING_GUIDELINES.md

# ✅ CORRECT
code-quality.md
filament-best-practices.md
testing-guidelines.md
```

## Tools and Validation

### 1. **Automation Script**
```bash
# Fix naming conventions automatically
./bashscripts/docs/fix_docs_case.sh
```

### 2. **Manual Validation**
```bash
# Check for uppercase files
find . -name "*.md" -exec grep -l "[A-Z]" {} \;

# Check for underscore files
find . -name "*_*.md"
```

### 3. **Git Hooks**
Consider implementing pre-commit hooks to prevent naming convention violations.

## Links to Related Documentation

- [Code Quality Standards](./code-quality.md)
- [Module Structure Standards](./module-structure.md)
- [Testing Guidelines](./testing.md)
- [Migration Standards](./migration-standards.md)
- [Documentation Best Practices](./documentation-best-practices.md)

---

*Naming Conventions for Laraxot Documentation - Ensuring Consistency and Maintainability*
>>>>>>> 1c7b79f (.)
=======
- [Qualità del codice](./code_quality.md)
- [Tipi rigorosi PHP](./php-strict-types.md)
- [Guida all'implementazione di PHPStan](./PHPSTAN-IMPLEMENTATION-GUIDE.md)
- [Best practice per i provider di servizi](./SERVICE-PROVIDER-BEST-PRACTICES.md)
- [Best practice per Filament](./FILAMENT-BEST-PRACTICES.md)
>>>>>>> 9109118 (.)
