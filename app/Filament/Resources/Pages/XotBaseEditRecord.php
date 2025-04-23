<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord as FilamentEditRecord;

abstract class XotBaseEditRecord extends FilamentEditRecord
{
    // ...

    /**
     * Configure the form.
     *
     * @param Form $form The form instance to configure
     * @return Form The configured form
     */
    public function form(Form $form): Form
    {
        $schema = $this->getFormSchema();
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e5c56c3 (.)
=======

>>>>>>> 7b67053 (fix: auto resolve conflict)
        if (empty($schema)) {
            $resource = $this->getResource();
            $schema = $resource::getFormSchema();
        }
<<<<<<< HEAD
<<<<<<< HEAD

        // Ensure schema is properly typed for PHPStan level 10
        /** @var array<string|int, \Filament\Forms\Components\Component>|array<\Filament\Forms\Components\Component> $validSchema */
        $validSchema = $schema;

        return $form->schema($validSchema);
    }

=======
        
=======

>>>>>>> 7b67053 (fix: auto resolve conflict)
        // Ensure schema is properly typed for PHPStan level 10
        /** @var array<string|int, \Filament\Forms\Components\Component>|array<\Filament\Forms\Components\Component> $validSchema */
        $validSchema = $schema;

        return $form->schema($validSchema);
    }
<<<<<<< HEAD
    
>>>>>>> e5c56c3 (.)
=======

>>>>>>> 7b67053 (fix: auto resolve conflict)
    /**
     * Get the form schema.
     *
     * @return array<string|int, \Filament\Forms\Components\Component>|array<\Filament\Forms\Components\Component>
     */
    protected function getFormSchema(): array
    {
        return [];
    }
use Filament\Resources\Pages\EditRecord as FilamenEditRecord;

abstract class XotBaseEditRecord extends FilamenEditRecord
{
    // ...
}
