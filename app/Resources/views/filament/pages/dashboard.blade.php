<x-filament-panels::page class="fi-dashboard-page">
    @if (method_exists($this, 'filtersForm'))
        {{ $this->filtersForm }}
    @endif

    <x-filament-widgets::widgets 
        :columns="$this->getColumns()" 
<<<<<<< HEAD
        :data="[...(data_get($this, 'filters') !== null ? ['filters' => data_get($this, 'filters')] : []), ...$this->getWidgetData()]" 
=======
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
>>>>>>> 5207ce7 (.)
        :widgets="$this->getVisibleWidgets()" 
    />
</x-filament-panels::page>
