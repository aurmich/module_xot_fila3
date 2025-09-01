<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 89d0c8f4 (.)
use Filament\Forms\Form;
use Modules\Xot\Filament\Traits\TransTrait;
<<<<<<< HEAD
=======

use Filament\Forms\Form;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Resources\Pages\EditRecord as FilamentEditRecord;
>>>>>>> e697a77b (.)
=======
use Filament\Resources\Pages\EditRecord as FilamentEditRecord;
>>>>>>> 89d0c8f4 (.)

abstract class XotBaseEditRecord extends FilamentEditRecord
{
    use TransTrait;

    /**
     * Configure the form.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Form  $form  The form instance to configure
=======
     * @param Form $form The form instance to configure
>>>>>>> e697a77b (.)
=======
     * @param Form $form The form instance to configure
>>>>>>> 89d0c8f4 (.)
     * @return Form The configured form
     */
    public function form(Form $form): Form
    {
        $schema = $this->getFormSchema();
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        if (empty($schema)) {
            $resource = $this->getResource();
            $schema = $resource::getFormSchema();
        }
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> 89d0c8f4 (.)
        // Ensure schema is properly typed for PHPStan level 10
        /** @var array<string|int, \Filament\Forms\Components\Component>|array<\Filament\Forms\Components\Component> $validSchema */
        $validSchema = $schema;
        
        return $form->schema($validSchema);
    }
<<<<<<< HEAD

=======
        
        // Ensure schema is properly typed for PHPStan level 10
        /** @var array<string|int, \Filament\Forms\Components\Component>|array<\Filament\Forms\Components\Component> $validSchema */
        $validSchema = $schema;
        
        return $form->schema($validSchema);
    }
    
>>>>>>> e697a77b (.)
=======
    
>>>>>>> 89d0c8f4 (.)
    /**
     * Get the form schema.
     *
     * @return array<string|int, \Filament\Forms\Components\Component>|array<\Filament\Forms\Components\Component>
     */
    protected function getFormSchema(): array
    {
        return [];
    }

    public static function getNavigationLabel(): string
    {
        return static::transFunc(__FUNCTION__);
    }

    public static function getNavigationIcon(): string
    {
        return static::transFunc(__FUNCTION__);
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> e697a77b (.)
=======

>>>>>>> 89d0c8f4 (.)
}
