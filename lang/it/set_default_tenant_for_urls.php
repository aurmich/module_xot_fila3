<?php

declare(strict_types=1);

return [
    'actions' => [
        'set_default_tenant' => [
            'label' => 'Imposta tenant di default per gli URL',
            'success' => 'Tenant di default impostato correttamente per tutti gli URL.',
            'error' => 'Errore durante l’impostazione del tenant di default per gli URL.',
            'confirmation' => 'Sei sicuro di voler impostare il tenant di default per tutti gli URL?',
            'tooltip' => 'Imposta il tenant di default per tutti gli URL generati',
        ],
    ],
    'messages' => [
        'success' => 'Tenant di default impostato per tutti gli URL.',
        'error' => 'Si è verificato un errore durante l’impostazione del tenant di default.',
    ],
    'fields' => [
        'tenant_id' => [
            'label' => 'Tenant',
            'placeholder' => 'Seleziona il tenant',
            'help' => 'Scegli il tenant da impostare come default per tutti gli URL.',
        ],
    ],
];
