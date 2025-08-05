# Gestione dei Conflitti Git

## Principi Fondamentali

1. **Prevenzione**
   - Pull frequenti dal branch principale
   - Commit piccoli e focalizzati
   - Branch feature di breve durata
   - Comunicazione con il team

2. **Workflow Standard**
   ```bash
   git checkout main
   git pull origin main
   git checkout feature-branch
   git merge main
   # Risolvi conflitti se presenti
   git add .
   git commit -m "Merge main into feature-branch"
   ```

## Risoluzione dei Conflitti

### 1. Analisi
```bash
<<<<<<< HEAD

=======
>>>>>>> aea6513 (.)
# Verifica lo stato
git status

# Visualizza i file in conflitto
git diff --name-only --diff-filter=U
```

### 2. Strategie di Risoluzione

#### Approccio Manuale
```bash
<<<<<<< HEAD

# Apri i file in conflitto

=======
# Apri i file in conflitto
>>>>>>> aea6513 (.)
# Cerca i marcatori di conflitto:
codice nel tuo branch
codice nel branch da mergeare

# Decidi quale codice mantenere
<<<<<<< HEAD

=======
>>>>>>> aea6513 (.)
# Rimuovi i marcatori di conflitto
```

#### Strumenti Visuali
```bash
<<<<<<< HEAD

=======
>>>>>>> aea6513 (.)
# Usa uno strumento di merge
git mergetool

# Configura lo strumento preferito
git config --global merge.tool vscode
```

## Best Practices

1. **Prima del Merge**
   - Backup del branch corrente
   - Verifica dei test
   - Review del codice da mergeare

2. **Durante il Merge**
   - Un file alla volta
   - Mantenere la funzionalità
   - Documentare le decisioni

3. **Dopo il Merge**
   - Verifica dei test
   - Review del codice finale
   - Push immediato

## Casi Comuni

### 1. Conflitti nei File di Configurazione
```bash
<<<<<<< HEAD

=======
>>>>>>> aea6513 (.)
# Usa la strategia ours per file di configurazione locali
git checkout --ours config/local.php
git add config/local.php

# Usa la strategia theirs per file di configurazione condivisi
git checkout --theirs config/shared.php
git add config/shared.php
```

### 2. Conflitti nei File di Lock
```bash
<<<<<<< HEAD

=======
>>>>>>> aea6513 (.)
# Risolvi conflitti in composer.lock
git checkout --theirs composer.lock
composer install
git add composer.lock
```

### 3. Conflitti nelle Migrazioni
```bash
<<<<<<< HEAD

# Rinomina le migrazioni in conflitto
git checkout --ours database/migrations/*

=======
# Rinomina le migrazioni in conflitto
git checkout --ours database/migrations/*
>>>>>>> aea6513 (.)
# Aggiorna i timestamp
php artisan migration:fresh
```

## Comandi Utili

```bash
<<<<<<< HEAD

=======
>>>>>>> aea6513 (.)
# Annulla merge in corso
git merge --abort

# Visualizza storia dei merge
git log --merges

# Verifica branch mergati
git branch --merged

# Branch non mergati
git branch --no-merged
```

## Prevenzione dei Conflitti

1. **Organizzazione del Codice**
   - Struttura modulare
   - File piccoli e focalizzati
   - Separazione delle responsabilità

2. **Convenzioni del Team**
   - Standard di codifica
   - Naming conventions
   - Workflow Git condiviso

3. **Automazione**
   - Pre-commit hooks
   - CI/CD pipeline
   - Test automatici

## Risoluzione Avanzata

### 1. Rebase Interattivo
```bash
<<<<<<< HEAD

=======
>>>>>>> aea6513 (.)
# Inizia rebase interattivo
git rebase -i main

# Comandi disponibili:
<<<<<<< HEAD

# pick - usa il commit

# squash - unisci con il commit precedente

# edit - modifica il commit

=======
# pick - usa il commit
# squash - unisci con il commit precedente
# edit - modifica il commit
>>>>>>> aea6513 (.)
# drop - elimina il commit
```

### 2. Cherry-Pick
```bash
<<<<<<< HEAD

=======
>>>>>>> aea6513 (.)
# Seleziona commit specifici
git cherry-pick <commit-hash>

# Gestisci conflitti
git add .
git cherry-pick --continue
```

## Testing Post-Conflitto

1. **Test Automatici**
```bash
<<<<<<< HEAD

=======
>>>>>>> aea6513 (.)
# Esegui tutti i test
php artisan test

# Test specifici
php artisan test --filter=TestClass
```

2. **Verifica Manuale**
   - Funzionalità principali
   - Casi edge
   - Performance

## Collegamenti

- [Git Documentation](https://git-scm.com/doc)
- [Workflow Git](../../../Xot/docs/git/workflow.md)
- [Best Practices](../../../Xot/docs/best-practices/git.md)
- [CI/CD Pipeline](../../../Xot/docs/ci-cd/README.md) 
