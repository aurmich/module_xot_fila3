<<<<<<< HEAD
<?php

declare(strict_types=1);

?>
=======
>>>>>>> c4ec0fb6 (.)
<x-filament-panels::page>
    <x-filament-panels::form wire:submit="save">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getFormActions()"
        />

    </x-filament-panels::form>
</x-filament-panels::page>
