<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class CookieData - Gestisce la configurazione dei cookie per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 */
class CookieData extends Data
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  bool  $accept  Se il cookie è stato accettato
     * @param  string  $type  Tipo di cookie (es. necessari, analitici, marketing)
     * @param  int  $duration_days  Durata dei cookie in giorni
     * @param  string  $policy_url  URL della cookie policy
     * @param  string  $banner_style  Stile del banner dei cookie
=======
=======
>>>>>>> 89d0c8f4 (.)
     * @param bool   $accept         Se il cookie è stato accettato
     * @param string $type           Tipo di cookie (es. necessari, analitici, marketing)
     * @param int    $duration_days  Durata dei cookie in giorni
     * @param string $policy_url     URL della cookie policy
     * @param string $banner_style   Stile del banner dei cookie
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
     */
    public function __construct(
        public readonly bool $accept = false,
        public readonly string $type = 'necessary',
        public readonly int $duration_days = 365,
        public readonly string $policy_url = '/cookie-policy',
        public readonly string $banner_style = 'bottom',
<<<<<<< HEAD
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> 89d0c8f4 (.)

    /**
     * Create a new instance of CookieData with default values.
     *
     * @return static
     */
    public static function make(): static
    {
<<<<<<< HEAD
        return new static;
=======
    ) {
    }

    /**
     * Create a new instance of CookieData with default values.
     *
     * @return static
     */
    public static function make(): static
    {
        return new static();
>>>>>>> e697a77b (.)
=======
        return new static();
>>>>>>> 89d0c8f4 (.)
    }
}
