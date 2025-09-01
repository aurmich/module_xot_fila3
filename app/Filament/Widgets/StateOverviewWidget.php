<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Cache;
=======
>>>>>>> 89d0c8f4 (.)
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
=======
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;

=======
>>>>>>> 89d0c8f4 (.)
use Illuminate\Support\Facades\Cache;
use Modules\Xot\Contracts\StateContract;
use Modules\SaluteOra\Models\Appointment;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
/**
 * Widget per la panoramica degli appuntamenti per stato.
 * Mostra statistiche compatte degli appuntamenti raggruppati per stato.
 */
class StateOverviewWidget extends XotBaseWidget
{
    /**
     * Vista del widget.
     */
    protected static string $view = 'xot::filament.widgets.state-overview';
<<<<<<< HEAD
<<<<<<< HEAD

=======
    
>>>>>>> e697a77b (.)
=======
    
>>>>>>> 89d0c8f4 (.)
    /**
     * Titolo del widget.
     */
    public string $title = '';
<<<<<<< HEAD
<<<<<<< HEAD

=======
    
>>>>>>> e697a77b (.)
=======
    
>>>>>>> 89d0c8f4 (.)
    /**
     * Occupa tutta la larghezza disponibile.
     */
    protected int|string|array $columnSpan = 'full';
<<<<<<< HEAD
<<<<<<< HEAD

=======
    
>>>>>>> e697a77b (.)
=======
    
>>>>>>> 89d0c8f4 (.)
    /**
     * Intervallo di polling disabilitato per performance.
     */
    protected static ?string $pollingInterval = null;

<<<<<<< HEAD
<<<<<<< HEAD
    public string $stateClass;
=======
>>>>>>> 89d0c8f4 (.)


    public string $stateClass;
    public string $model;

<<<<<<< HEAD
    public string $cacheKey = '';

=======


    public string $stateClass;
    public string $model;

    public string $cacheKey='';
>>>>>>> e697a77b (.)
=======
    public string $cacheKey='';
>>>>>>> 89d0c8f4 (.)
    /**
     * Schema del form (vuoto per questo widget).
     *
     * @return array<int|string, \Filament\Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [];
    }
<<<<<<< HEAD
<<<<<<< HEAD

=======
    
>>>>>>> e697a77b (.)
=======
    
>>>>>>> 89d0c8f4 (.)
    /**
     * Dati da passare alla vista.
     *
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> 89d0c8f4 (.)
        return [
            'states' => $this->getStates(),
            //'title' => $this->getWidgetTitle(),
        ];
    }
    
    


    protected function getCacheKey(): string
    {
        try{
            $cacheKey = 'states-' . class_basename($this->model).'-'.class_basename($this->stateClass);
            $cacheKey = Str::slug($cacheKey);
            $this->cacheKey = $cacheKey;
            return $cacheKey;
        }catch(\Error $e){
            if($this->cacheKey==''){
                $this->cacheKey = Str::uuid()->toString();
            }
            return $this->cacheKey;
        }
    }
<<<<<<< HEAD

=======
        
        return [
            'states' => $this->getStates(),
            //'title' => $this->getWidgetTitle(),
        ];
    }
    
    


    protected function getCacheKey(): string
    {
        try{
            $cacheKey = 'states-' . class_basename($this->model).'-'.class_basename($this->stateClass);
            $cacheKey = Str::slug($cacheKey);
            $this->cacheKey = $cacheKey;
            return $cacheKey;
        }catch(\Error $e){
            if($this->cacheKey==''){
                $this->cacheKey = Str::uuid()->toString();
            }
            return $this->cacheKey;
        }
    }
    
>>>>>>> e697a77b (.)
=======
    
>>>>>>> 89d0c8f4 (.)
    /**
     * Ottiene gli stati degli appuntamenti con statistiche.
     *
     * @return array<int, array<string, mixed>>
     */
    protected function getStates(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD

        $res = Cache::remember(
=======
       
        
        $res= Cache::remember(
>>>>>>> e697a77b (.)
=======
       
        
        $res= Cache::remember(
>>>>>>> 89d0c8f4 (.)
            $this->getCacheKey(),
            now()->addMinutes(5),
            fn () => $this->calculateStates()
        );

        Assert::isArray($res);
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 89d0c8f4 (.)
        return $res;
        
    }
<<<<<<< HEAD

=======
        return $res;
        
    }
    
>>>>>>> e697a77b (.)
=======
    
>>>>>>> 89d0c8f4 (.)
    /**
     * Calcola le statistiche degli stati degli appuntamenti.
     *
     * @return array<int, array<string, mixed>>
     */
    protected function calculateStates(): array
    {
        $states = [];
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
        
>>>>>>> 89d0c8f4 (.)
        $modelInstance = app($this->model);
        
        $stateMapping = $this->stateClass::getStateMapping()->toArray();
        
        foreach ($stateMapping as $name => $stateClass) {
           
                
                $state = new $stateClass($modelInstance);
                Assert::isInstanceOf($state, StateContract::class);                
                $states[] = [
                    'name' => $name,
                    'label' => $state->label(),
                    'icon' => $this->cleanIconName($state->icon()),
                    'color' => $state->bgColor(),
                    'count' => $this->getCountForState($name),
                ];
           
        }
        
        return $states;
    }
<<<<<<< HEAD

=======
        
        
        $modelInstance = app($this->model);
        
        $stateMapping = $this->stateClass::getStateMapping()->toArray();
        
        foreach ($stateMapping as $name => $stateClass) {
           
                
                $state = new $stateClass($modelInstance);
                Assert::isInstanceOf($state, StateContract::class);                
                $states[] = [
                    'name' => $name,
                    'label' => $state->label(),
                    'icon' => $this->cleanIconName($state->icon()),
                    'color' => $state->bgColor(),
                    'count' => $this->getCountForState($name),
                ];
           
        }
        
        return $states;
    }
    
>>>>>>> e697a77b (.)
=======
    
>>>>>>> 89d0c8f4 (.)
    /**
     * Ottiene il conteggio degli appuntamenti per uno stato specifico.
     * IMPORTANTE: Mostra TUTTI gli appuntamenti, non filtrati per utente.
     * Questo è un widget di panoramica generale per dashboard amministrativa.
     */
    protected function getCountForState(string $stateName): int
    {
        return $this->model::where('state', $stateName)->count();
    }
<<<<<<< HEAD
<<<<<<< HEAD

=======
    
>>>>>>> e697a77b (.)
=======
    
>>>>>>> 89d0c8f4 (.)
    /**
     * Pulisce il nome dell'icona rimuovendo prefissi non necessari.
     */
    protected function cleanIconName(string $iconName): string
    {
        // Rimuove prefissi comuni come 'heroicon-o-' se presenti
        return str_replace(['heroicon-o-', 'heroicon-s-'], '', $iconName);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
    }
}
