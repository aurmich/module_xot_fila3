<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Panel;

use Filament\Panel;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Datas\MetatagData;
use Spatie\QueueableAction\QueueableAction;

=======
<<<<<<< HEAD
use Illuminate\Support\Facades\Log;
use Modules\Xot\Datas\MetatagData;
use Spatie\QueueableAction\QueueableAction;

=======
use Illuminate\Support\Facades\Log;
use Modules\Xot\Datas\MetatagData;
use Spatie\QueueableAction\QueueableAction;

>>>>>>> 355a587 (.)
/**
 * Azione per applicare i metatag al panel Filament.
 * 
 * Questa azione è responsabile di configurare l'aspetto visivo del panel
 * utilizzando i metatag definiti in MetatagData.
 */
<<<<<<< HEAD
=======
use Modules\Xot\Datas\MetatagData;
use Spatie\QueueableAction\QueueableAction;

>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
>>>>>>> 355a587 (.)
class ApplyMetatagToPanelAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function execute(Panel &$panel): Panel
=======
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Applica i metatag al panel Filament.
     *
     * @param Panel $panel Il panel Filament da configurare
     * @return Panel Il panel configurato
     */
    public function execute(Panel $panel): Panel
=======
     * Applica i metatag al pannello Filament.
=======
     * Applica i metatag al panel Filament.
>>>>>>> 355a587 (.)
     *
     * @param Panel $panel Il panel Filament da configurare
     * @return Panel Il panel configurato
     */
<<<<<<< HEAD
    public function execute(Panel &$panel): Panel
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
    public function execute(Panel $panel): Panel
>>>>>>> 355a587 (.)
    {
        try {
            $metatag = MetatagData::make();

            return $panel
<<<<<<< HEAD
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
=======
                ->colors(fn () => $metatag->getFilamentColors())
>>>>>>> 355a587 (.)
                ->brandLogo($metatag->getLogoHeader())
                ->brandName($metatag->getBrandName())
                ->darkModeBrandLogo($metatag->getLogoHeaderDark())
                ->brandLogoHeight($metatag->getLogoHeight())
                ->favicon($metatag->getFavicon());
<<<<<<< HEAD
        } catch (\Throwable $e) {
            // Log l'errore ma non bloccare l'applicazione
            \Illuminate\Support\Facades\Log::error('Error applying metatag to panel: ' . $e->getMessage());
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
        } catch (\Exception $e) {
            Log::error('Error applying metatag to panel: ' . $e->getMessage());
>>>>>>> 355a587 (.)
            return $panel;
        }
    }
}
