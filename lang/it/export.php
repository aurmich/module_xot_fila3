<?php return array (
<<<<<<< HEAD
  'pages' => 'Pagine',
  'widgets' => 'Widgets',
  'navigation' => 
  array (
    'name' => 'Export',
    'plural' => 'Exports',
    'group' => 
    array (
      'name' => 'Import/Export',
      'description' => 'Gestione delle esportazioni dati',
    ),
    'label' => 'export',
    'sort' => 49,
    'icon' => 'export.navigation',
  ),
  'fields' => 
  array (
    'id' => 'ID',
    'name' => 'Nome',
    'description' => 'Descrizione',
    'type' => 'Tipo',
    'format' => 'Formato',
    'status' => 'Stato',
    'file_name' => 'Nome File',
    'file_path' => 'Percorso File',
    'file_size' => 'Dimensione File',
    'rows_count' => 'Numero Righe',
    'created_at' => 'Creato il',
    'updated_at' => 'Aggiornato il',
    'completed_at' => 'Completato il',
    'downloaded_at' => 'Scaricato il',
    'error' => 'Errore',
    'options' => 'Opzioni',
    'guard_name' => 'Guard',
    'permissions' => 'Permessi',
    'first_name' => 'Nome',
    'last_name' => 'Cognome',
    'select_all' => 
    array (
      'name' => 'Seleziona Tutti',
      'message' => '',
    ),
  ),
  'actions' => 
  array (
    'import' => 
    array (
      'fields' => 
      array (
        'import_file' => 'Seleziona un file XLS o CSV da caricare',
      ),
    ),
    'export' => 
    array (
      'label' => 'Esporta',
      'modal' => 
      array (
        'heading' => 'Esporta Dati',
        'description' => 'Seleziona le opzioni per l\'esportazione',
      ),
      'messages' => 
      array (
        'success' => 'Esportazione avviata con successo',
      ),
      'filename_prefix' => 'Aree al',
      'columns' => 
      array (
        'name' => 'Nome area',
        'parent_name' => 'Nome area livello superiore',
      ),
    ),
    'download' => 
    array (
      'label' => 'Scarica',
      'modal' => 
      array (
        'heading' => 'Scarica File',
        'description' => 'Vuoi scaricare il file esportato?',
      ),
      'messages' => 
      array (
        'success' => 'File scaricato con successo',
      ),
    ),
    'delete' => 
    array (
      'label' => 'Elimina',
      'modal' => 
      array (
        'heading' => 'Elimina Export',
        'description' => 'Sei sicuro di voler eliminare questa esportazione?',
      ),
      'messages' => 
      array (
        'success' => 'Export eliminato con successo',
      ),
    ),
  ),
  'messages' => 
  array (
    'no_exports' => 'Nessuna esportazione presente',
    'export_started' => 'Esportazione avviata',
    'export_completed' => 'Esportazione completata',
    'export_failed' => 'Esportazione fallita',
    'file_not_found' => 'File non trovato',
    'invalid_format' => 'Formato non valido',
  ),
  'statuses' => 
  array (
    'pending' => 'In Attesa',
    'processing' => 'In Elaborazione',
    'completed' => 'Completato',
    'failed' => 'Fallito',
    'downloaded' => 'Scaricato',
  ),
  'types' => 
=======
  'navigation' => 
  array (
    'name' => 'Esportazione',
    'plural' => 'Esportazioni',
    'group' => 
    array (
      'name' => 'Sistema',
      'description' => 'Gestione delle esportazioni di dati',
    ),
    'label' => 'Esportazione Dati',
    'sort' => 97,
    'icon' => 'job-export',
  ),
  'fields' => 
  array (
    'name' => 'Nome',
    'format' => 'Formato',
    'filters' => 'Filtri',
    'columns' => 'Colonne',
    'total_records' => 'Totale Record',
    'status' => 'Stato',
    'created_at' => 'Creato il',
    'completed_at' => 'Completato il',
    'download_url' => 'URL Download',
  ),
  'formats' => 
>>>>>>> cca53d624fe322cea7456476c18cf85580f41a5d
  array (
    'csv' => 'CSV',
    'excel' => 'Excel',
    'json' => 'JSON',
<<<<<<< HEAD
    'pdf' => 'PDF',
    'xml' => 'XML',
  ),
  'formats' => 
  array (
    'standard' => 'Standard',
    'extended' => 'Esteso',
    'minimal' => 'Minimo',
    'custom' => 'Personalizzato',
=======
    'xml' => 'XML',
    'pdf' => 'PDF',
  ),
  'options' => 
  array (
    'include_headers' => 'Includi intestazioni',
    'delimiter' => 'Delimitatore',
    'encoding' => 'Codifica',
    'worksheet_name' => 'Nome foglio di lavoro',
    'chunk_size' => 'Dimensione chunk',
  ),
  'actions' => 
  array (
    'create' => 'Nuova Esportazione',
    'download' => 'Scarica',
    'cancel' => 'Annulla',
    'delete' => 'Elimina',
  ),
  'messages' => 
  array (
    'export_queued' => 'Esportazione in coda',
    'export_processing' => 'Esportazione in corso',
    'export_completed' => 'Esportazione completata',
    'export_failed' => 'Esportazione fallita',
>>>>>>> cca53d624fe322cea7456476c18cf85580f41a5d
  ),
);