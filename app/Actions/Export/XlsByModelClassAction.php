<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Xot\Actions\Model\GetTransKeyByModelClassAction;
// use Modules\Xot\Services\ArrayService;
use Modules\Xot\Exports\CollectionExport;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Webmozart\Assert\Assert;

class XlsByModelClassAction
{
    use QueueableAction;

    /**
     * Esporta i dati di un modello in Excel.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $modelClass  Classe del modello da esportare
     * @param  array<string, mixed>  $where  Condizioni where per la query
     * @param  array<int, string>  $includes  Relazioni o campi da includere
     * @param  array<int, string>  $excludes  Campi da escludere
     * @param  callable|null  $callback  Callback per manipolare i dati
=======
=======
>>>>>>> 89d0c8f4 (.)
     * @param string $modelClass Classe del modello da esportare
     * @param array<string, mixed> $where Condizioni where per la query
     * @param array<int, string> $includes Relazioni o campi da includere
     * @param array<int, string> $excludes Campi da escludere
     * @param callable|null $callback Callback per manipolare i dati
     * 
     * @return BinaryFileResponse
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
     */
    public function execute(
        string $modelClass,
        array $where = [],
        array $includes = [],
        array $excludes = [],
        ?callable $callback = null,
    ): BinaryFileResponse {
        // Verifichiamo che la classe del modello esista
        Assert::classExists($modelClass);
        Assert::subclassOf($modelClass, Model::class);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        $with = $this->getWithByIncludes($includes);

        // Creiamo l'istanza del modello e costruiamo la query
        /** @var Model $model */
        $model = app($modelClass);
        $query = $model->query()->with($with);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        // Applichiamo le condizioni where
        foreach ($where as $key => $value) {
            $query->where($key, $value);
        }

        // Otteniamo i risultati
        /** @var Collection $rows */
        $rows = $query->get();
<<<<<<< HEAD
<<<<<<< HEAD

        // Filtriamo i campi se sono specificati gli includes
        if ($includes !== []) {
=======
        
        // Filtriamo i campi se sono specificati gli includes
        if ([] !== $includes) {
>>>>>>> e697a77b (.)
=======
        
        // Filtriamo i campi se sono specificati gli includes
        if ([] !== $includes) {
>>>>>>> 89d0c8f4 (.)
            $rows = $rows->map(
                static function ($item) use ($includes) {
                    $data = [];
                    foreach ($includes as $include) {
                        $data[$include] = data_get($item, $include);
                    }

                    return $data;
                }
            );
        }

        // Nascondiamo i campi esclusi
<<<<<<< HEAD
<<<<<<< HEAD
        if ($excludes !== []) {
=======
        if ([] !== $excludes) {
>>>>>>> e697a77b (.)
=======
        if ([] !== $excludes) {
>>>>>>> 89d0c8f4 (.)
            $rows = $rows->map(function ($item) use ($excludes) {
                if (is_object($item) && method_exists($item, 'makeHidden')) {
                    /** @var Model $item */
                    return $item->makeHidden($excludes);
                }
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
                return $item;
            });
        }

        // Applichiamo il callback se fornito
<<<<<<< HEAD
<<<<<<< HEAD
        if ($callback !== null) {
=======
        if (null !== $callback) {
>>>>>>> e697a77b (.)
=======
        if (null !== $callback) {
>>>>>>> 89d0c8f4 (.)
            $rows = $rows->map($callback);
        }

        // Otteniamo la chiave di traduzione e creiamo l'export
        $transKey = app(GetTransKeyByModelClassAction::class)->execute($modelClass);
        $collectionExport = new CollectionExport($rows, $transKey);
        $filename = $this->getExportName($modelClass);

        return Excel::download($collectionExport, $filename);
    }

    /**
     * Ottiene le relazioni da caricare in base ai campi inclusi.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<int, string>  $includes  Campi da includere
=======
     * @param array<int, string> $includes Campi da includere
     * 
>>>>>>> e697a77b (.)
=======
     * @param array<int, string> $includes Campi da includere
     * 
>>>>>>> 89d0c8f4 (.)
     * @return array<int, string>
     */
    private function getWithByIncludes(array $includes): array
    {
        $with = [];
        foreach ($includes as $include) {
            // Assicuriamo che $include sia una stringa
            $includeStr = is_string($include) ? $include : (string) $include;
<<<<<<< HEAD
<<<<<<< HEAD

=======
            
>>>>>>> 89d0c8f4 (.)
            // Verifichiamo se contiene un punto (indicatore di relazione)
            if (!Str::contains($includeStr, '.')) {
                continue;
            }
            
            // Estraiamo il nome della relazione (prima parte prima del punto)
            $parts = explode('.', $includeStr);
<<<<<<< HEAD
            if (! empty($parts[0])) {
=======
            
            // Verifichiamo se contiene un punto (indicatore di relazione)
            if (!Str::contains($includeStr, '.')) {
                continue;
            }
            
            // Estraiamo il nome della relazione (prima parte prima del punto)
            $parts = explode('.', $includeStr);
            if (!empty($parts[0])) {
>>>>>>> e697a77b (.)
=======
            if (!empty($parts[0])) {
>>>>>>> 89d0c8f4 (.)
                $with[] = $parts[0];
            }
        }

        return array_unique($with);
    }

    /**
     * Genera il nome del file di export.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $modelClass  Classe del modello
=======
     * @param string $modelClass Classe del modello
     * 
     * @return string
>>>>>>> e697a77b (.)
=======
     * @param string $modelClass Classe del modello
     * 
     * @return string
>>>>>>> 89d0c8f4 (.)
     */
    private function getExportName(string $modelClass): string
    {
        return sprintf(
            '%s %s.xlsx',
            Str::slug(class_basename($modelClass)),
            Carbon::now()->format('d-m-Y His'),
        );
    }
}
