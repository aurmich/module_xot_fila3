# Componenti Filament - Guida di Riferimento

## FileUpload Component

### Metodi Corretti
```php
FileUpload::make('field_name')
    ->disk('public')                              // Disco di storage
    ->directory('path/to/dir')                    // Directory di destinazione
    ->acceptedFileTypes(['application/pdf'])      // Tipi di file accettati
    ->maxSize(5120)                              // Dimensione massima in KB
    ->downloadable()                             // Permette il download
    ->previewable()                              // Mostra anteprima
    ->imagePreviewHeight('100')                  // Altezza anteprima
    ->loadingIndicatorPosition('left')           // Posizione indicatore caricamento
    ->removeUploadedFileButtonPosition('right')  // Posizione pulsante rimozione
    ->uploadButtonPosition('left')               // Posizione pulsante upload
    ->uploadProgressIndicatorPosition('left')    // Posizione barra progresso
```

### Metodi Deprecati o Non Esistenti
❌ NON USARE:
- `removeButtonPosition()` -> Usa `removeUploadedFileButtonPosition()`
- `deleteButtonPosition()` -> Non esiste
- `cancelButtonPosition()` -> Non esiste

### Best Practices
1. Usa sempre `disk()` e `directory()` per organizzare i file
2. Imposta sempre `maxSize()` per limitare dimensioni
3. Specifica `acceptedFileTypes()` per sicurezza
4. Usa `imagePreviewHeight()` per anteprime consistenti
5. Configura le posizioni dei pulsanti per UX coerente

### Esempi Comuni

#### Upload Documenti
```php
FileUpload::make('document')
    ->disk('public')
    ->directory('documents')
    ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
    ->maxSize(5120)
    ->required()
    ->downloadable()
    ->previewable()
```

#### Upload Immagini
```php
FileUpload::make('image')
    ->disk('public')
    ->directory('images')
    ->acceptedFileTypes(['image/jpeg', 'image/png'])
    ->maxSize(2048)
    ->image()
    ->imagePreviewHeight('100')
```

## TextInput Component

### Metodi Corretti
```php
TextInput::make('field_name')
    ->label('Label')
    ->placeholder('Placeholder')
    ->required()
    ->maxLength(255)
    ->prefixIcon('heroicon-o-user')
    ->suffixIcon('heroicon-o-check')
```

### Best Practices
1. Usa sempre `label()` per accessibilità
2. Imposta `maxLength()` per validazione
3. Usa icone consistenti dal set Heroicons

## DatePicker Component

### Metodi Corretti
```php
DatePicker::make('field_name')
    ->label('Label')
    ->format('Y-m-d')
    ->displayFormat('d/m/Y')
    ->minDate('2020-01-01')
    ->maxDate('today')
```

## Note Importanti
1. Controlla sempre la documentazione ufficiale di Filament per i metodi più recenti
2. Usa l'autocompletamento dell'IDE per verificare i metodi disponibili
3. Mantieni consistenza nei nomi dei metodi in tutto il progetto
4. Aggiorna questa documentazione quando trovi nuovi metodi o pattern utili 