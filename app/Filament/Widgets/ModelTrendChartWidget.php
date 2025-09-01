<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
<<<<<<< HEAD
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
=======
use Modules\Xot\Filament\Widgets\XotBaseChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Modules\SaluteOra\Models\Appointment;
>>>>>>> e697a77b (.)
=======
use Modules\Xot\Filament\Widgets\XotBaseChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Modules\SaluteOra\Models\Appointment;
>>>>>>> 89d0c8f4 (.)

class ModelTrendChartWidget extends XotBaseChartWidget
{
    protected static ?string $heading = null;
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 89d0c8f4 (.)
    protected static ?int $sort = 5;
    protected static bool $isLazy = true;
<<<<<<< HEAD

=======
    protected static ?int $sort = 5;
    protected static bool $isLazy = true;
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
    protected static ?string $pollingInterval = '300s'; // 5 minuti

    public string $model;

    public function getHeading(): ?string
    {
        return static::transClass($this->model, 'widgets.model_trend_chart.heading');
    }

    protected function getData(): array
    {
        try {
            $data = Trend::model($this->model)
                ->between(
                    start: now()->subDays(30),
                    end: now(),
                )
                ->perDay()
                ->count();

            return [
                'datasets' => [
                    [
                        'label' => __('salutemo::widgets.appointment_creation_chart.label'),
                        'data' => $data->map(fn (mixed $value) => $value instanceof TrendValue ? $value->aggregate : 0),
                        'backgroundColor' => 'rgba(139, 92, 246, 0.5)',
                        'borderColor' => 'rgb(139, 92, 246)',
                        'borderWidth' => 2,
                        'tension' => 0.4,
                    ],
                ],
                'labels' => $data->map(fn (mixed $value) => $value instanceof TrendValue ? \Carbon\Carbon::parse($value->date)->format('d/m') : ''),
            ];
        } catch (\Exception $e) {
            // Fallback appropriato senza logging inutile
            return [
                'datasets' => [
                    [
                        'label' => __('salutemo::widgets.appointment_creation_chart.label'),
                        'data' => [],
                        'backgroundColor' => 'rgba(139, 92, 246, 0.5)',
                        'borderColor' => 'rgb(139, 92, 246)',
                        'borderWidth' => 2,
                        'tension' => 0.4,
                    ],
                ],
                'labels' => [],
            ];
        }
    }

    protected function getType(): string
    {
        return 'line';
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
