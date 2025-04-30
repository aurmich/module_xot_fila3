<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord as FilamentEditRecord;

abstract class XotBaseEditRecord extends FilamentEditRecord
{
    // ...
<<<<<<< HEAD
    protected static string $resource;// = SectionResource::class;
=======
>>>>>>> aurmich/dev

    /**
     * Configure the form.
     *
     * @param Form $form The form instance to configure
     * @return Form The configured form
     */
<<<<<<< HEAD
    final public function form(Form $form): Form
=======
    public function form(Form $form): Form
>>>>>>> aurmich/dev
    {
        $schema = $this->getFormSchema();
        
        if (empty($schema)) {
            $resource = $this->getResource();
            $schema = $resource::getFormSchema();
        }
        
        // Ensure schema is properly typed for PHPStan level 10
        /** @var array<string|int, \Filament\Forms\Components\Component>|array<\Filament\Forms\Components\Component> $validSchema */
        $validSchema = $schema;
        
        return $form->schema($validSchema);
    }
    
    /**
     * Get the form schema.
     *
     * @return array<string|int, \Filament\Forms\Components\Component>|array<\Filament\Forms\Components\Component>
     */
<<<<<<< HEAD
    public function getFormSchema(): array
=======
    protected function getFormSchema(): array
>>>>>>> aurmich/dev
    {
        return [];
    }
}
