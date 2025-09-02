<x-filament-panels::page class="fi-dashboard-page">
    @if (method_exists($this, 'filtersForm'))
        {{ $this->filtersForm }}
    @endif

    <x-filament-widgets::widgets 
        :columns="$this->getColumns()" 
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        :data="[...isset($this->filters) ? ['filters' => $this->filters] : [], ...$this->getWidgetData()]" 
=======
        :data="[...(data_get($this, 'filters') !== null ? ['filters' => data_get($this, 'filters')] : []), ...$this->getWidgetData()]" 
>>>>>>> 5852845d (.)
=======
        :data="[...(data_get($this, 'filters') !== null ? ['filters' => data_get($this, 'filters')] : []), ...$this->getWidgetData()]" 
>>>>>>> abfbbdf (.)
=======
        :data="[...(data_get($this, 'filters') !== null ? ['filters' => data_get($this, 'filters')] : []), ...$this->getWidgetData()]" 
>>>>>>> 1fd4ceb6 (.)
=======
        :data="[...(data_get($this, 'filters') !== null ? ['filters' => data_get($this, 'filters')] : []), ...$this->getWidgetData()]" 
>>>>>>> 1c7b79f (.)
=======
        :data="[...($this->filters ?? null) !== null ? ['filters' => $this->filters] : [], ...$this->getWidgetData()]" 
>>>>>>> 9109118 (.)
        :widgets="$this->getVisibleWidgets()" 
    />
</x-filament-panels::page>
