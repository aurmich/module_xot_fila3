<?php

declare(strict_types=1);

namespace Modules\Notify\Models\Panels;

use Illuminate\Http\Request;
// --- Services --

use Modules\Cms\Models\Panels\XotBasePanel;

class NotifyThemePanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Modules\Notify\Models\NotifyTheme';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    /**
     * Get the fields displayed by the resource.
        'value'=>'..',
     */
    public function fields(): array {
        return [
            (object) [
                'type' => 'Id',
                'name' => 'id',
                'col_size' => 3,
                'comment' => null,
            ],

            (object) [
                // 'type' => 'String',
                'type' => 'Select',
                'name' => 'lang',
                'comment' => null,
                'col_size' => 3,
                'options' => [
                    'it' => 'it',
                    'fr' => 'fr',
                    'en' => 'en',
                    'de' => 'de',
                ],
            ],

            (object) [
                // 'type' => 'String',
                'type' => 'Select',
                'name' => 'type',
                'comment' => null,
                'col_size' => 3,
                'options' => [
                    'mail' => 'mail',
                    'sms' => 'sms',
                ],
            ],
            (object) [
                'type' => 'String',
                'name' => 'from',
                // 'rules' => 'required|max:11', // max:11 solo se è sms
                'rules' => 'required',
                'comment' => null,
                'col_size' => 3,
            ],
            (object) [
                'type' => 'String',
                'name' => 'from_email',
                // 'rules' => 'required|max:11', // max:11 solo se è sms
                // 'rules' => 'required',
                'comment' => null,
                'col_size' => 3,
            ],

            (object) [
                'type' => 'String',
                'name' => 'subject',
                'comment' => null,
                'col_size' => 12,
            ],

            (object) [
                'type' => 'Textarea',
                'name' => 'body',
                'comment' => null,
                'except' => ['index'],
            ],

            (object) [
                'type' => 'WysiwygSceditor',
                'name' => 'body_html',
                'comment' => null,
                'except' => ['index'],
                'col_size' => 12,
            ],
            (object) [
                'type' => 'Select',
                'name' => 'theme',
                'comment' => null,
                'col_size' => 3,
                'options' => [
                    'empty' => 'empty',
                    'ark' => 'ark',
                    'minty' => 'minty',
                    'sunny' => 'sunny',
                    'widgets' => 'widgets',
                ],
            ],
            (object) [
                'type' => 'String',
                'name' => 'post_type',
                'col_size' => 3,
                'comment' => null,
            ],
        ];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array {
        $tabs_name = [];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function filters(Request $request = null): array {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(): array {
        return [];
    }
}
