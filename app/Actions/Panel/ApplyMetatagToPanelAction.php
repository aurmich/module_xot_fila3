<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Panel;

use Filament\Panel;
use Modules\Xot\Datas\MetatagData;
use Spatie\QueueableAction\QueueableAction;

class ApplyMetatagToPanelAction
{
    use QueueableAction;

<<<<<<< HEAD
    /**
     * Applica i metatag al pannello Filament.
     *
     * @param Panel &$panel Il pannello Filament a cui applicare i metatag
     *
     * @return Panel Il pannello con i metatag applicati
     */
=======
>>>>>>> e5c56c3 (.)
    public function execute(Panel &$panel): Panel
    {
        try {
            $metatag = MetatagData::make();

            return $panel
<<<<<<< HEAD
                // @phpstan-ignore argument.type
                ->colors($metatag->getColors())
=======
<<<<<<< HEAD
                // @phpstan-ignore argument.type
                ->colors($metatag->getColors())
=======
<<<<<<< HEAD
                // @phpstan-ignore argument.type
                ->colors($metatag->getColors())
=======
                //->colors($metatag->getColors())
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> e5c56c3 (.)
                ->brandLogo($metatag->getLogoHeader())
                ->brandName($metatag->title)
                ->darkModeBrandLogo($metatag->getLogoHeaderDark())
                ->brandLogoHeight($metatag->getLogoHeight())
                ->favicon($metatag->getFavicon());
<<<<<<< HEAD
        } catch (\Throwable $e) {
=======
        } catch (\Exception $e) {
>>>>>>> e5c56c3 (.)
            // Log l'errore ma non bloccare l'applicazione
            \Illuminate\Support\Facades\Log::error('Error applying metatag to panel: ' . $e->getMessage());
            return $panel;
        }
    }
}
