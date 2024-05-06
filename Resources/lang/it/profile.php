<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Profilo',
        'plural' => 'Profili',
        'group' => [
            'name' => 'Admin',
        ],
    ],
    'pages' => [
        'create' => 'Nuovo Tecnico',
        'edit' => 'Modifica Tecnico',
        'view' => 'Tecnico',
        'list_technicians'=>[
            'navigation' => [
                'name' => 'Tecnici',
                'plural' => 'Tecnici',
                'group' => [
                    'name' => 'Gestione Utenti',
                ],
            ],
            'fields' => [
                'user_name' => 'Nome Utente',
                'name' => 'Nome Utente',
                'first_name' => 'Nome',
                'last_name' => 'Cognome',
                'email' => 'Email',
                'is_active' => 'Stato account',
                'color' => 'Colore',
                'asset_id_root' => 'Abitazione',
                'asset_id' => 'Asset',
                'type'=>'Tipo',
            ],
        ],
    ],
    'fields' => [
        'name' => 'Nome Utente',
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'email' => 'Email',
        'is_active' => 'Stato account',
        'color' => 'Colore',
        'asset_id_root' => 'Abitazione',
        'asset_id' => 'Asset',
        'type'=>'tipo',
        'user_name'=>'nome utente',
    ],
    'filters' => [
        'is_active' => [
            'all' => 'Tutti i tecnici',
            'active' => 'Solo attivi',
            'inactive' => 'Solo inattivi',
        ],
    ],
    'actions' => [
        'bulk_activate' => [
            'cta' => 'Attiva selezionati',
        ],
        'bulk_inactivate' => [
            'cta' => 'Disattiva selezionati',
        ],
        'is_active_on' => [
            'cta' => 'Abilita account',
        ],
        'is_active_off' => [
            'cta' => 'Disabilita account',
        ],
    ],
];
