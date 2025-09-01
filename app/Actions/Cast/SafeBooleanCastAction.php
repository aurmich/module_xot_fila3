<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

use Spatie\QueueableAction\QueueableAction;

/**
 * Action per convertire in modo sicuro un valore mixed in boolean.
<<<<<<< HEAD
 *
 * Questa action centralizza la logica di cast sicuro per evitare duplicazioni
 * di codice (principio DRY) e garantire comportamento consistente in tutto il codebase.
 *
=======
 * 
 * Questa action centralizza la logica di cast sicuro per evitare duplicazioni
 * di codice (principio DRY) e garantire comportamento consistente in tutto il codebase.
 * 
>>>>>>> e697a77b (.)
 * Principi applicati:
 * - DRY: Evita duplicazione di logica di cast boolean in tutto il progetto
 * - KISS: Logica semplice e diretta, facile da comprendere e mantenere
 * - Sicurezza: Gestisce tutti i casi edge e previene errori di cast
<<<<<<< HEAD
 *
=======
 * 
>>>>>>> e697a77b (.)
 * Casi d'uso tipici:
 * - Conversione di valori da API esterne
 * - Parsing di dati da file CSV/JSON
 * - Gestione di input utente
 * - Risoluzione errori PHPStan "Cannot cast mixed to bool"
<<<<<<< HEAD
 *
 * @example
 * // Uso base
 * $bool = SafeBooleanCastAction::cast($mixedValue);
 *
 * // Con default personalizzato
 * $bool = SafeBooleanCastAction::cast($mixedValue, true);
 *
=======
 * 
 * @example
 * // Uso base
 * $bool = SafeBooleanCastAction::cast($mixedValue);
 * 
 * // Con default personalizzato
 * $bool = SafeBooleanCastAction::cast($mixedValue, true);
 * 
>>>>>>> e697a77b (.)
 * // Con validazione di valori specifici
 * $bool = SafeBooleanCastAction::castFromString($mixedValue, ['yes', 'on', '1']);
 */
class SafeBooleanCastAction
{
    use QueueableAction;

    /**
     * Converte in modo sicuro un valore mixed in boolean.
     *
<<<<<<< HEAD
     * @param  mixed  $value  Il valore da convertire
     * @param  bool|null  $default  Valore di default se la conversione fallisce (default: false)
=======
     * @param mixed $value Il valore da convertire
     * @param bool|null $default Valore di default se la conversione fallisce (default: false)
     *
>>>>>>> e697a77b (.)
     * @return bool Il valore convertito
     */
    public function execute(mixed $value, ?bool $default = false): bool
    {
        // Se è già un boolean, restituiscilo direttamente
        if (is_bool($value)) {
            return $value;
        }
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
        // Se è null, restituisci il default
        if (is_null($value)) {
            return $default ?? false;
        }
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
        // Se è un intero, convertilo (0 = false, altri = true)
        if (is_int($value)) {
            return $value !== 0;
        }
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
        // Se è un float, convertilo (0.0 = false, altri = true)
        if (is_float($value)) {
            return $value !== 0.0 && is_finite($value);
        }
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
        // Se è una stringa, convertila
        if (is_string($value)) {
            return $this->parseStringToBool($value, $default);
        }
<<<<<<< HEAD

        // Se è un array, convertilo (array vuoto = false, altri = true)
        if (is_array($value)) {
            return ! empty($value);
        }

        // Se è un oggetto, convertilo (oggetto vuoto = false, altri = true)
        if (is_object($value)) {
            return ! empty(get_object_vars($value));
        }

=======
        
        // Se è un array, convertilo (array vuoto = false, altri = true)
        if (is_array($value)) {
            return !empty($value);
        }
        
        // Se è un oggetto, convertilo (oggetto vuoto = false, altri = true)
        if (is_object($value)) {
            return !empty(get_object_vars($value));
        }
        
>>>>>>> e697a77b (.)
        // Per tutti gli altri tipi, restituisci il default
        return $default ?? false;
    }

    /**
     * Converte una stringa in boolean con gestione avanzata.
     *
<<<<<<< HEAD
     * @param  string  $value  La stringa da convertire
     * @param  bool|null  $default  Valore di default
=======
     * @param string $value La stringa da convertire
     * @param bool|null $default Valore di default
     *
>>>>>>> e697a77b (.)
     * @return bool Il valore convertito
     */
    private function parseStringToBool(string $value, ?bool $default = false): bool
    {
        $trimmed = strtolower(trim($value));
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
        // Stringa vuota o solo spazi
        if (empty($trimmed)) {
            return $default ?? false;
        }
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
        // Valori che rappresentano true
        $trueValues = ['true', '1', 'yes', 'on', 'enabled', 'active', 'si', 'sì'];
        if (in_array($trimmed, $trueValues, true)) {
            return true;
        }
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
        // Valori che rappresentano false
        $falseValues = ['false', '0', 'no', 'off', 'disabled', 'inactive'];
        if (in_array($trimmed, $falseValues, true)) {
            return false;
        }
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
        // Se la stringa contiene solo numeri, convertila
        if (is_numeric($trimmed)) {
            return (float) $trimmed !== 0.0;
        }
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
        // Per tutte le altre stringhe, restituisci il default
        return $default ?? false;
    }

    /**
     * Converte un valore in boolean con validazione di valori specifici.
     *
<<<<<<< HEAD
     * @param  mixed  $value  Il valore da convertire
     * @param  array  $trueValues  Array di valori che rappresentano true
     * @param  array  $falseValues  Array di valori che rappresentano false
     * @param  bool|null  $default  Valore di default se la conversione fallisce
=======
     * @param mixed $value Il valore da convertire
     * @param array $trueValues Array di valori che rappresentano true
     * @param array $falseValues Array di valori che rappresentano false
     * @param bool|null $default Valore di default se la conversione fallisce
     *
>>>>>>> e697a77b (.)
     * @return bool Il valore convertito
     */
    public function executeWithCustomValues(mixed $value, array $trueValues, array $falseValues, ?bool $default = false): bool
    {
        if (is_string($value)) {
            $trimmed = strtolower(trim($value));
<<<<<<< HEAD

            if (in_array($trimmed, array_map(fn ($value) => is_string($value) ? strtolower($value) : $value, $trueValues), true)) {
                return true;
            }

            if (in_array($trimmed, array_map(fn ($value) => is_string($value) ? strtolower($value) : $value, $falseValues), true)) {
                return false;
            }
        }

=======
            
            if (in_array($trimmed, array_map(fn($value) => is_string($value) ? strtolower($value) : $value, $trueValues), true)) {
                return true;
            }
            
            if (in_array($trimmed, array_map(fn($value) => is_string($value) ? strtolower($value) : $value, $falseValues), true)) {
                return false;
            }
        }
        
>>>>>>> e697a77b (.)
        // Fallback al comportamento standard
        return $this->execute($value, $default);
    }

    /**
     * Converte un valore in boolean con validazione di range numerico.
     *
<<<<<<< HEAD
     * @param  mixed  $value  Il valore da convertire
     * @param  float  $threshold  Soglia per determinare true/false
     * @param  bool  $greaterThanTrue  True se valori > threshold sono true, false altrimenti
     * @param  bool|null  $default  Valore di default se la conversione fallisce
=======
     * @param mixed $value Il valore da convertire
     * @param float $threshold Soglia per determinare true/false
     * @param bool $greaterThanTrue True se valori > threshold sono true, false altrimenti
     * @param bool|null $default Valore di default se la conversione fallisce
     *
>>>>>>> e697a77b (.)
     * @return bool Il valore convertito
     */
    public function executeWithThreshold(mixed $value, float $threshold, bool $greaterThanTrue = true, ?bool $default = false): bool
    {
        if (is_numeric($value)) {
            $numeric = (float) $value;
<<<<<<< HEAD

=======
            
>>>>>>> e697a77b (.)
            if ($greaterThanTrue) {
                return $numeric > $threshold;
            } else {
                return $numeric < $threshold;
            }
        }
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
        // Fallback al comportamento standard
        return $this->execute($value, $default);
    }

    /**
     * Verifica se un valore può essere convertito in boolean.
     *
<<<<<<< HEAD
     * @param  mixed  $value  Il valore da verificare
=======
     * @param mixed $value Il valore da verificare
     *
>>>>>>> e697a77b (.)
     * @return bool True se il valore può essere convertito in boolean
     */
    public function canCast(mixed $value): bool
    {
<<<<<<< HEAD
        return is_bool($value) ||
               is_null($value) ||
               is_scalar($value) ||
               is_array($value) ||
=======
        return is_bool($value) || 
               is_null($value) || 
               is_scalar($value) || 
               is_array($value) || 
>>>>>>> e697a77b (.)
               is_object($value);
    }

    /**
     * Metodo statico di convenienza per chiamate dirette.
     *
<<<<<<< HEAD
     * @param  mixed  $value  Il valore da convertire
     * @param  bool|null  $default  Valore di default se la conversione fallisce (default: false)
=======
     * @param mixed $value Il valore da convertire
     * @param bool|null $default Valore di default se la conversione fallisce (default: false)
     *
>>>>>>> e697a77b (.)
     * @return bool Il valore convertito in boolean
     */
    public static function cast(mixed $value, ?bool $default = false): bool
    {
        return app(self::class)->execute($value, $default);
    }

    /**
     * Metodo statico per cast con valori personalizzati.
     *
<<<<<<< HEAD
     * @param  mixed  $value  Il valore da convertire
     * @param  array  $trueValues  Array di valori che rappresentano true
     * @param  array  $falseValues  Array di valori che rappresentano false
     * @param  bool|null  $default  Valore di default se la conversione fallisce
=======
     * @param mixed $value Il valore da convertire
     * @param array $trueValues Array di valori che rappresentano true
     * @param array $falseValues Array di valori che rappresentano false
     * @param bool|null $default Valore di default se la conversione fallisce
     *
>>>>>>> e697a77b (.)
     * @return bool Il valore convertito
     */
    public static function castWithCustomValues(mixed $value, array $trueValues, array $falseValues, ?bool $default = false): bool
    {
        return app(self::class)->executeWithCustomValues($value, $trueValues, $falseValues, $default);
    }

    /**
     * Metodo statico per cast con soglia numerica.
     *
<<<<<<< HEAD
     * @param  mixed  $value  Il valore da convertire
     * @param  float  $threshold  Soglia per determinare true/false
     * @param  bool  $greaterThanTrue  True se valori > threshold sono true, false altrimenti
     * @param  bool|null  $default  Valore di default se la conversione fallisce
=======
     * @param mixed $value Il valore da convertire
     * @param float $threshold Soglia per determinare true/false
     * @param bool $greaterThanTrue True se valori > threshold sono true, false altrimenti
     * @param bool|null $default Valore di default se la conversione fallisce
     *
>>>>>>> e697a77b (.)
     * @return bool Il valore convertito
     */
    public static function castWithThreshold(mixed $value, float $threshold, bool $greaterThanTrue = true, ?bool $default = false): bool
    {
        return app(self::class)->executeWithThreshold($value, $threshold, $greaterThanTrue, $default);
    }
}
