<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Widgets\ChartWidget as FilamentChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Modules\Xot\Filament\Traits\TransTrait;
=======
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\ChartWidget as FilamentChartWidget;
>>>>>>> e697a77b (.)
=======
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\ChartWidget as FilamentChartWidget;
>>>>>>> 89d0c8f4 (.)

/**
 * Widget per visualizzare il trend delle registrazioni pazienti.
 *
 * Mostra un grafico a linee con il numero di pazienti registrati nel tempo.
 * I dati sono cacheati per 5 minuti per ottimizzare le performance.
 */
abstract class XotBaseChartWidget extends FilamentChartWidget
{
<<<<<<< HEAD
<<<<<<< HEAD
    use InteractsWithPageFilters;
=======
>>>>>>> 89d0c8f4 (.)
    use TransTrait;
    use InteractsWithPageFilters;
    protected static ?string $heading = null;
    protected static ?int $sort = 1;
    protected static bool $isLazy = true;
<<<<<<< HEAD

=======
    use TransTrait;
    use InteractsWithPageFilters;
    protected static ?string $heading = null;
    protected static ?int $sort = 1;
    protected static bool $isLazy = true;
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
    protected static ?string $pollingInterval = null;

    /**
     * Restituisce il titolo del widget.
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> e697a77b (.)
=======
     * 
>>>>>>> 89d0c8f4 (.)
     * CRITICO: Deve essere public per rispettare il contratto ChartWidget
     */
    public function getHeading(): ?string
    {
        return static::trans('navigation.heading');
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
    }

    /**
     * Restituisce i dati per il grafico.
     *
     * @return array<string, mixed>
     */
    protected function getData(): array
    {
        return [];
    }

    /**
     * Restituisce il tipo di grafico.
     */
    protected function getType(): string
    {
        return 'line';
    }

    /**
     * Restituisce le opzioni del grafico.
     *
     * @return array<string, mixed>
     */
    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
                'tooltip' => [
                    'mode' => 'index',
                    'intersect' => false,
                    'callbacks' => [
                        'label' => 'function(context) {
<<<<<<< HEAD
<<<<<<< HEAD
                            return "'.__('salutemo::widgets.patient_registration_trend.total_registrations').'".replace(":count", context.parsed.y);
=======
                            return "' . __('salutemo::widgets.patient_registration_trend.total_registrations') . '".replace(":count", context.parsed.y);
>>>>>>> e697a77b (.)
=======
                            return "' . __('salutemo::widgets.patient_registration_trend.total_registrations') . '".replace(":count", context.parsed.y);
>>>>>>> 89d0c8f4 (.)
                        }',
                    ],
                ],
            ],
            'scales' => [
                'x' => [
                    'display' => true,
                    'title' => [
                        'display' => true,
                        'text' => __('salutemo::widgets.patient_registration_trend.period.label'),
                    ],
                    'grid' => [
                        'display' => false,
                    ],
                ],
                'y' => [
                    'display' => true,
                    'title' => [
                        'display' => true,
                        'text' => __('salutemo::widgets.patient_registration_trend.total_registrations'),
                    ],
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
            'interaction' => [
                'mode' => 'nearest',
                'axis' => 'x',
                'intersect' => false,
            ],
        ];
    }

    /**
     * Restituisce l'altezza del widget.
     */
    protected function getHeight(): ?string
    {
        return '300px';
    }
<<<<<<< HEAD
<<<<<<< HEAD
}
=======


} 
>>>>>>> e697a77b (.)
=======


} 
>>>>>>> 89d0c8f4 (.)
