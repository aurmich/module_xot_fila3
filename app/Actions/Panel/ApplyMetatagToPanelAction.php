<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Panel;

use Filament\Panel;
<<<<<<< HEAD
use Modules\Xot\Datas\MetatagData;
use Spatie\QueueableAction\QueueableAction;

=======
<<<<<<< HEAD
use Illuminate\Support\Facades\Log;
use Modules\Xot\Datas\MetatagData;
use Spatie\QueueableAction\QueueableAction;

/**
 * Azione per applicare i metatag al panel Filament.
 * 
 * Questa azione è responsabile di configurare l'aspetto visivo del panel
 * utilizzando i metatag definiti in MetatagData.
 */
=======
use Modules\Xot\Datas\MetatagData;
use Spatie\QueueableAction\QueueableAction;

>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
class ApplyMetatagToPanelAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function execute(Panel &$panel): Panel
=======
    /**
<<<<<<< HEAD
     * Applica i metatag al panel Filament.
     *
     * @param Panel $panel Il panel Filament da configurare
     * @return Panel Il panel configurato
     */
    public function execute(Panel $panel): Panel
=======
     * Applica i metatag al pannello Filament.
     *
     * @param Panel &$panel Il pannello Filament a cui applicare i metatag
     * 
     * @return Panel Il pannello con i metatag applicati
     */
    public function execute(Panel &$panel): Panel
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    {
        try {
            $metatag = MetatagData::make();

            return $panel
<<<<<<< HEAD
                // @phpstan-ignore argument.type
                ->colors($metatag->getColors())
                ->brandLogo($metatag->getBrandLogo())
                ->brandName($metatag->getBrandName())
                ->darkModeBrandLogo($metatag->getDarkModeBrandLogo())
                ->brandLogoHeight($metatag->getBrandLogoHeight())
                ->favicon($metatag->getFavicon());
        } catch (\Exception $e) {
            // Log l'errore ma non bloccare l'applicazione
            \Illuminate\Support\Facades\Log::error('Error applying metatag to panel: ' . $e->getMessage());
=======
<<<<<<< HEAD
                ->colors(fn () => $metatag->getFilamentColors())
                ->brandLogo($metatag->getLogoHeader())
                ->brandName($metatag->getBrandName())
                ->darkModeBrandLogo($metatag->getLogoHeaderDark())
                ->brandLogoHeight($metatag->getLogoHeight())
                ->favicon($metatag->getFavicon());
        } catch (\Exception $e) {
            Log::error('Error applying metatag to panel: ' . $e->getMessage());
=======
                // @phpstan-ignore argument.type
                ->colors($metatag->getColors())
                ->brandLogo($metatag->getLogoHeader())
                ->brandName($metatag->title)
                ->darkModeBrandLogo($metatag->getLogoHeaderDark())
                ->brandLogoHeight($metatag->getLogoHeight())
                ->favicon($metatag->getFavicon());
        } catch (\Throwable $e) {
            // Log l'errore ma non bloccare l'applicazione
            \Illuminate\Support\Facades\Log::error('Error applying metatag to panel: ' . $e->getMessage());
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
            return $panel;
        }
    }
}
