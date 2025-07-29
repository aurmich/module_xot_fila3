<?php

<<<<<<< HEAD
declare(strict_types=1);

return [
    'fields' => [
        'id' => [
            'label' => 'ID',
            'placeholder' => 'Identificativo',
            'help' => 'Identificativo univoco',
        ],
        'created_at' => [
            'label' => 'Data creazione',
            'placeholder' => 'Seleziona la data di creazione',
            'help' => 'Data in cui è stato creato il record',
        ],
        'updated_at' => [
            'label' => 'Data aggiornamento',
            'placeholder' => 'Seleziona la data di aggiornamento',
            'help' => 'Data dell’ultima modifica',
        ],
        'view' => [
            'label' => 'Visualizza',
            'description' => 'Visualizza dettagli elemento',
            'placeholder' => 'Clicca per visualizzare',
            'help' => 'Visualizza i dettagli completi dell\'elemento selezionato',
        ],
        'delete' => [
            'label' => 'Elimina',
            'description' => 'Elimina elemento',
            'placeholder' => 'Clicca per eliminare',
            'help' => 'Elimina definitivamente l\'elemento selezionato',
        ],
        'edit' => [
            'label' => 'Modifica',
            'description' => 'Modifica elemento',
            'placeholder' => 'Clicca per modificare',
            'help' => 'Modifica i dati dell\'elemento selezionato',
        ],
        'detach' => [
            'label' => 'Scollega',
            'description' => 'Scollega elemento',
            'placeholder' => 'Clicca per scollegare',
            'help' => 'Rimuovi la connessione con l\'elemento selezionato',
        ],
        'attach' => [
            'label' => 'Collega',
            'description' => 'Collega elemento',
            'placeholder' => 'Clicca per collegare',
            'help' => 'Crea una connessione con l\'elemento selezionato',
        ],
        'pregnancy_certificate' => [
            'label' => 'Certificato di Gravidanza',
            'description' => 'Documento attestante lo stato di gravidanza',
            'placeholder' => 'Carica certificato di gravidanza',
            'help' => 'Carica il certificato medico che attesta lo stato di gravidanza',
        ],
        'health_card' => [
            'label' => 'Tessera Sanitaria',
            'description' => 'Tessera sanitaria del Sistema Sanitario Nazionale',
            'placeholder' => 'Carica tessera sanitaria',
            'help' => 'Carica la foto fronte/retro della tessera sanitaria',
        ],
        'identity_document' => [
            'label' => 'Documento di Identità',
            'description' => 'Documento di identità valido (CI, Patente, Passaporto)',
            'placeholder' => 'Carica documento di identità',
            'help' => 'Carica un documento di identità valido e non scaduto',
        ],
        'isee_certificate' => [
            'label' => 'Certificazione ISEE',
            'description' => 'Indicatore della Situazione Economica Equivalente',
            'placeholder' => 'Carica certificazione ISEE',
            'help' => 'Carica la certificazione ISEE per eventuali agevolazioni economiche',
        ],
        'certifications' => [
            'label' => 'Certificazioni',
            'description' => 'Certificazioni e documenti aggiuntivi',
            'placeholder' => 'Carica certificazioni',
            'help' => 'Carica eventuali certificazioni mediche o documenti aggiuntivi richiesti',
        ],
        'certification' => [
            'label' => 'Certificato',
            'description' => 'Certificato medico o documentazione sanitaria',
            'placeholder' => 'Carica certificato',
            'help' => 'Tesserino sanitario o certificato di iscrizione all\'Ordine',
        ],
        'doctor_certificate' => [
            'label' => 'Certificato Medico',
            'description' => 'Certificato di abilitazione o iscrizione all\'Ordine',
            'placeholder' => 'Carica certificato medico',
            'help' => 'Tesserino sanitario o certificato di iscrizione all\'Ordine',
        ],
    ],
    'validation' => [
        'required' => [
            'label' => 'Campo obbligatorio',
            'description' => 'Questo campo è obbligatorio e deve essere compilato',
        ],
        'email' => [
            'label' => 'Email non valida',
            'description' => 'Inserisci un indirizzo email valido',
        ],
        'numeric' => [
            'label' => 'Deve essere un numero',
            'description' => 'Questo campo deve contenere solo numeri',
        ],
        'date' => [
            'label' => 'Data non valida',
            'description' => 'Inserisci una data valida nel formato richiesto',
        ],
        'file' => [
            'label' => 'File non valido',
            'description' => 'Il file caricato non è valido o è troppo grande',
        ],
    ],
    'actions' => [
        'submit' => [
            'label' => 'Invia',
            'help' => 'Invia il modulo',
        ],
        'save' => [
            'label' => 'Salva',
            'help' => 'Salva le modifiche',
        ],
        'save' => [
            'label' => 'Salva',
            'success' => 'Salvataggio completato con successo',
            'error' => 'Errore durante il salvataggio',
        ],
        'delete' => [
            'label' => 'Elimina',
            'success' => 'Eliminazione completata con successo',
            'error' => 'Errore durante l’eliminazione',
            'confirmation' => 'Sei sicuro di voler eliminare questo elemento?',
        ],
    ],
    'steps' => [
        'confirm_step' => [
            'label' => 'Conferma',
            'help' => 'Conferma i dati inseriti',
        ],
        'date_step' => [
            'label' => 'Data',
            'help' => 'Seleziona la data',
        ],
        'studio_step' => [
            'label' => 'Studio',
            'help' => 'Inserisci i dati dello studio',
        ],
        'search_step' => [
            'label' => 'Ricerca',
            'help' => 'Cerca tra gli elementi',
        ],
    ],
    'messages' => [
        'saved' => 'Elemento salvato correttamente',
        'deleted' => 'Elemento eliminato correttamente',
        'error' => 'Si è verificato un errore',
    ],
];
=======
return array (
  'fields' => 
  array (
    'view' => 
    array (
      'label' => 'Visualizza',
      'description' => 'Visualizza dettagli elemento',
      'placeholder' => 'Clicca per visualizzare',
      'help' => 'Visualizza i dettagli completi dell\'elemento selezionato',
    ),
    'delete' => 
    array (
      'label' => 'Elimina',
      'description' => 'Elimina elemento',
      'placeholder' => 'Clicca per eliminare',
      'help' => 'Elimina definitivamente l\'elemento selezionato',
    ),
    'edit' => 
    array (
      'label' => 'Modifica',
      'description' => 'Modifica elemento',
      'placeholder' => 'Clicca per modificare',
      'help' => 'Modifica i dati dell\'elemento selezionato',
    ),
    'detach' => 
    array (
      'label' => 'Scollega',
      'description' => 'Scollega elemento',
      'placeholder' => 'Clicca per scollegare',
      'help' => 'Rimuovi la connessione con l\'elemento selezionato',
    ),
    'attach' => 
    array (
      'label' => 'Collega',
      'description' => 'Collega elemento',
      'placeholder' => 'Clicca per collegare',
      'help' => 'Crea una connessione con l\'elemento selezionato',
    ),
    'pregnancy_certificate' => 
    array (
      'label' => 'Certificato di Gravidanza',
      'description' => 'Documento attestante lo stato di gravidanza',
      'placeholder' => 'Carica certificato di gravidanza',
      'help' => 'Carica il certificato medico che attesta lo stato di gravidanza',
    ),
    'health_card' => 
    array (
      'label' => 'Tessera Sanitaria',
      'description' => 'Tessera sanitaria del Sistema Sanitario Nazionale',
      'placeholder' => 'Carica tessera sanitaria',
      'help' => 'Carica la foto fronte/retro della tessera sanitaria',
    ),
    'identity_document' => 
    array (
      'label' => 'Documento di Identità',
      'description' => 'Documento di identità valido (CI, Patente, Passaporto)',
      'placeholder' => 'Carica documento di identità',
      'help' => 'Carica un documento di identità valido e non scaduto',
    ),
    'isee_certificate' => 
    array (
      'label' => 'Certificazione ISEE',
      'description' => 'Indicatore della Situazione Economica Equivalente',
      'placeholder' => 'Carica certificazione ISEE',
      'help' => 'Carica la certificazione ISEE per eventuali agevolazioni economiche',
    ),
    'certifications' => 
    array (
      'label' => 'Certificazioni',
      'description' => 'Certificazioni e documenti aggiuntivi',
      'placeholder' => 'Carica certificazioni',
      'help' => 'Carica eventuali certificazioni mediche o documenti aggiuntivi richiesti',
    ),
    'certification' => 
    array (
      'label' => 'Certificato',
      'description' => 'Certificato medico o documentazione sanitaria',
      'placeholder' => 'Carica certificato',
      'help' => 'Tesserino sanitario o certificato di iscrizione all\'Ordine',
    ),
    'doctor_certificate' => 
    array (
      'label' => 'Certificato Medico',
      'description' => 'Certificato di abilitazione o iscrizione all\'Ordine',
      'placeholder' => 'Carica certificato medico',
      'help' => 'Tesserino sanitario o certificato di iscrizione all\'Ordine',
    ),
  ),
  'validation' => 
  array (
    'required' => 
    array (
      'label' => 'Campo obbligatorio',
      'description' => 'Questo campo è obbligatorio e deve essere compilato',
    ),
    'email' => 
    array (
      'label' => 'Email non valida',
      'description' => 'Inserisci un indirizzo email valido',
    ),
    'numeric' => 
    array (
      'label' => 'Deve essere un numero',
      'description' => 'Questo campo deve contenere solo numeri',
    ),
    'date' => 
    array (
      'label' => 'Data non valida',
      'description' => 'Inserisci una data valida nel formato richiesto',
    ),
    'file' => 
    array (
      'label' => 'File non valido',
      'description' => 'Il file caricato non è valido o è troppo grande',
    ),
  ),
  'actions' => 
  array (
    'save' => 
    array (
      'label' => 'save',
    ),
  ),
);
>>>>>>> 5bb5e55 (.)
