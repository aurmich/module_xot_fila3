<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
<<<<<<< HEAD
<<<<<<< HEAD

/**
 * Action per gestire in modo sicuro l'accesso alle proprietà degli oggetti generici.
 *
=======
use function Safe\json_decode;

/**
 * Action per gestire in modo sicuro l'accesso alle proprietà degli oggetti generici.
 * 
>>>>>>> e697a77b (.)
=======
use function Safe\json_decode;

/**
 * Action per gestire in modo sicuro l'accesso alle proprietà degli oggetti generici.
 * 
>>>>>>> 89d0c8f4 (.)
 * Questa action centralizza la logica di accesso sicuro alle proprietà per evitare:
 * - Uso di property_exists() con oggetti che potrebbero avere magic methods
 * - Errori di tipo con accesso diretto alle proprietà
 * - Duplicazione di logica di verifica proprietà
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
 * 
>>>>>>> e697a77b (.)
=======
 * 
>>>>>>> 89d0c8f4 (.)
 * Principi applicati:
 * - DRY: Evita duplicazione di logica di accesso proprietà
 * - KISS: Metodi semplici e diretti
 * - Robustezza: Gestisce tutti i casi edge e mantiene type safety
 * - Sicurezza: Previene errori di accesso a proprietà inesistenti
 * - Assert: Utilizza webmozart/assert per validazioni robuste
<<<<<<< HEAD
<<<<<<< HEAD
=======
 * 
 * @package Modules\Xot\Actions\Cast
>>>>>>> e697a77b (.)
=======
 * 
 * @package Modules\Xot\Actions\Cast
>>>>>>> 89d0c8f4 (.)
 */
class SafeObjectCastAction
{
    use QueueableAction;

    /**
     * Verifica se un oggetto ha una proprietà specifica.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da verificare
     * @param  string  $property  Il nome della proprietà
=======
     * @param object $object L'oggetto da verificare
     * @param string $property Il nome della proprietà
     *
>>>>>>> e697a77b (.)
=======
     * @param object $object L'oggetto da verificare
     * @param string $property Il nome della proprietà
     *
>>>>>>> 89d0c8f4 (.)
     * @return bool True se l'oggetto ha la proprietà
     */
    public function hasProperty(object $object, string $property): bool
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        return isset($object->{$property});
    }

    /**
     * Verifica se un oggetto ha una proprietà con valore non null.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da verificare
     * @param  string  $property  Il nome della proprietà
=======
     * @param object $object L'oggetto da verificare
     * @param string $property Il nome della proprietà
     *
>>>>>>> e697a77b (.)
=======
     * @param object $object L'oggetto da verificare
     * @param string $property Il nome della proprietà
     *
>>>>>>> 89d0c8f4 (.)
     * @return bool True se l'oggetto ha la proprietà con valore non null
     */
    public function hasNonNullProperty(object $object, string $property): bool
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        return isset($object->{$property}) && $object->{$property} !== null;
    }

    /**
     * Verifica se un oggetto ha una proprietà con valore non vuoto.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da verificare
     * @param  string  $property  Il nome della proprietà
=======
     * @param object $object L'oggetto da verificare
     * @param string $property Il nome della proprietà
     *
>>>>>>> e697a77b (.)
=======
     * @param object $object L'oggetto da verificare
     * @param string $property Il nome della proprietà
     *
>>>>>>> 89d0c8f4 (.)
     * @return bool True se l'oggetto ha la proprietà con valore non vuoto
     */
    public function hasNonEmptyProperty(object $object, string $property): bool
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD
<<<<<<< HEAD

        if (! isset($object->{$property})) {
=======
        
        if (!isset($object->{$property})) {
>>>>>>> 89d0c8f4 (.)
            return false;
        }
        
        $value = $object->{$property};
<<<<<<< HEAD

=======
        
        if (!isset($object->{$property})) {
            return false;
        }
        
        $value = $object->{$property};
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
        return $value !== '';
    }

    /**
     * Ottiene una proprietà con cast sicuro a string.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  string|null  $default  Valore di default se la proprietà non esiste o è null
=======
=======
>>>>>>> 89d0c8f4 (.)
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param string|null $default Valore di default se la proprietà non esiste o è null
     *
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
     * @return string Il valore della proprietà convertito in string
     */
    public function getStringProperty(object $object, string $property, ?string $default = ''): string
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD
<<<<<<< HEAD

        if (! isset($object->{$property})) {
=======
        
        if (!isset($object->{$property})) {
>>>>>>> 89d0c8f4 (.)
            return $default ?? '';
        }
        
        $value = $object->{$property};
<<<<<<< HEAD

=======
        
        if (!isset($object->{$property})) {
            return $default ?? '';
        }
        
        $value = $object->{$property};
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
        return (string) $value;
    }

    /**
     * Ottiene una proprietà con cast sicuro a int.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  int|null  $default  Valore di default se la proprietà non esiste o è null
=======
=======
>>>>>>> 89d0c8f4 (.)
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param int|null $default Valore di default se la proprietà non esiste o è null
     *
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
     * @return int Il valore della proprietà convertito in int
     */
    public function getIntProperty(object $object, string $property, ?int $default = 0): int
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD
<<<<<<< HEAD

        if (! isset($object->{$property})) {
=======
        
        if (!isset($object->{$property})) {
>>>>>>> 89d0c8f4 (.)
            return $default ?? 0;
        }
        
        $value = $object->{$property};
<<<<<<< HEAD

=======
        
        if (!isset($object->{$property})) {
            return $default ?? 0;
        }
        
        $value = $object->{$property};
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
        return app(SafeIntCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene una proprietà con cast sicuro a float.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  float|null  $default  Valore di default se la proprietà non esiste o è null
=======
=======
>>>>>>> 89d0c8f4 (.)
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param float|null $default Valore di default se la proprietà non esiste o è null
     *
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
     * @return float Il valore della proprietà convertito in float
     */
    public function getFloatProperty(object $object, string $property, ?float $default = 0.0): float
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD
<<<<<<< HEAD

        if (! isset($object->{$property})) {
=======
        
        if (!isset($object->{$property})) {
>>>>>>> 89d0c8f4 (.)
            return $default ?? 0.0;
        }
        
        $value = $object->{$property};
<<<<<<< HEAD

=======
        
        if (!isset($object->{$property})) {
            return $default ?? 0.0;
        }
        
        $value = $object->{$property};
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
        return app(SafeFloatCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene una proprietà con cast sicuro a boolean.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  bool|null  $default  Valore di default se la proprietà non esiste o è null
=======
=======
>>>>>>> 89d0c8f4 (.)
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param bool|null $default Valore di default se la proprietà non esiste o è null
     *
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
     * @return bool Il valore della proprietà convertito in boolean
     */
    public function getBooleanProperty(object $object, string $property, ?bool $default = false): bool
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD
<<<<<<< HEAD

        if (! isset($object->{$property})) {
=======
        
        if (!isset($object->{$property})) {
>>>>>>> 89d0c8f4 (.)
            return $default ?? false;
        }
        
        $value = $object->{$property};
<<<<<<< HEAD

=======
        
        if (!isset($object->{$property})) {
            return $default ?? false;
        }
        
        $value = $object->{$property};
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
        return app(SafeBooleanCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene una proprietà con cast sicuro a array.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  array|null  $default  Valore di default se la proprietà non esiste o è null
=======
=======
>>>>>>> 89d0c8f4 (.)
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param array|null $default Valore di default se la proprietà non esiste o è null
     *
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
     * @return array Il valore della proprietà convertito in array
     */
    public function getArrayProperty(object $object, string $property, ?array $default = []): array
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD
<<<<<<< HEAD

        if (! isset($object->{$property})) {
=======
        
        if (!isset($object->{$property})) {
>>>>>>> 89d0c8f4 (.)
            return $default ?? [];
        }
        
        $value = $object->{$property};
<<<<<<< HEAD

=======
        
        if (!isset($object->{$property})) {
            return $default ?? [];
        }
        
        $value = $object->{$property};
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
        return app(SafeArrayCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene una proprietà con cast sicuro a un tipo specifico.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  string  $type  Il tipo di cast desiderato (string, int, float, bool, array)
     * @param  mixed  $default  Valore di default se la proprietà non esiste o è null
=======
=======
>>>>>>> 89d0c8f4 (.)
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param string $type Il tipo di cast desiderato (string, int, float, bool, array)
     * @param mixed $default Valore di default se la proprietà non esiste o è null
     *
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
     * @return mixed Il valore della proprietà convertito nel tipo specificato
     */
    public function getTypedProperty(object $object, string $property, string $type, mixed $default = null): mixed
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
        Assert::inArray($type, ['string', 'int', 'float', 'bool', 'array']);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        return match ($type) {
            'string' => $this->getStringProperty($object, $property, is_string($default) ? $default : null),
            'int' => $this->getIntProperty($object, $property, is_int($default) ? $default : null),
            'float' => $this->getFloatProperty($object, $property, is_float($default) ? $default : null),
            'bool' => $this->getBooleanProperty($object, $property, is_bool($default) ? $default : null),
            'array' => $this->getArrayProperty($object, $property, is_array($default) ? $default : null),
            default => throw new \InvalidArgumentException("Tipo non supportato: {$type}")
        };
    }

    /**
     * Verifica se un oggetto ha una proprietà con valore specifico.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da verificare
     * @param  string  $property  Il nome della proprietà
     * @param  mixed  $expectedValue  Il valore atteso
=======
=======
>>>>>>> 89d0c8f4 (.)
     * @param object $object L'oggetto da verificare
     * @param string $property Il nome della proprietà
     * @param mixed $expectedValue Il valore atteso
     *
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
     * @return bool True se l'oggetto ha la proprietà con il valore atteso
     */
    public function hasPropertyValue(object $object, string $property, mixed $expectedValue): bool
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD
<<<<<<< HEAD

        if (! isset($object->{$property})) {
=======
        
        if (!isset($object->{$property})) {
>>>>>>> 89d0c8f4 (.)
            return false;
        }
        
        $actualValue = $object->{$property};
<<<<<<< HEAD

=======
        
        if (!isset($object->{$property})) {
            return false;
        }
        
        $actualValue = $object->{$property};
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
        return $actualValue === $expectedValue;
    }

    /**
     * Ottiene una proprietà con validazione di tipo e valore.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  string  $type  Il tipo di cast desiderato
     * @param  callable|null  $validator  Funzione di validazione opzionale
     * @param  mixed  $default  Valore di default se la validazione fallisce
     * @return mixed Il valore della proprietà validato e convertito
     */
    public function getValidatedProperty(
        object $object,
        string $property,
        string $type,
=======
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param string $type Il tipo di cast desiderato
     * @param callable|null $validator Funzione di validazione opzionale
     * @param mixed $default Valore di default se la validazione fallisce
     *
     * @return mixed Il valore della proprietà validato e convertito
     */
    public function getValidatedProperty(
        object $object, 
        string $property, 
        string $type, 
>>>>>>> e697a77b (.)
=======
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param string $type Il tipo di cast desiderato
     * @param callable|null $validator Funzione di validazione opzionale
     * @param mixed $default Valore di default se la validazione fallisce
     *
     * @return mixed Il valore della proprietà validato e convertito
     */
    public function getValidatedProperty(
        object $object, 
        string $property, 
        string $type, 
>>>>>>> 89d0c8f4 (.)
        ?callable $validator = null,
        mixed $default = null
    ): mixed {
        Assert::object($object);
        Assert::stringNotEmpty($property);
        Assert::inArray($type, ['string', 'int', 'float', 'bool', 'array']);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> 89d0c8f4 (.)
        $value = $this->getTypedProperty($object, $property, $type, $default);
        
        if ($validator !== null && !$validator($value)) {
            return $default;
        }
<<<<<<< HEAD

=======
        
        $value = $this->getTypedProperty($object, $property, $type, $default);
        
        if ($validator !== null && !$validator($value)) {
            return $default;
        }
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        return $value;
    }

    /**
     * Verifica se un oggetto ha un metodo specifico.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da verificare
     * @param  string  $method  Il nome del metodo
=======
     * @param object $object L'oggetto da verificare
     * @param string $method Il nome del metodo
     *
>>>>>>> e697a77b (.)
=======
     * @param object $object L'oggetto da verificare
     * @param string $method Il nome del metodo
     *
>>>>>>> 89d0c8f4 (.)
     * @return bool True se l'oggetto ha il metodo
     */
    public function hasMethod(object $object, string $method): bool
    {
        Assert::object($object);
        Assert::stringNotEmpty($method);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        return method_exists($object, $method);
    }

    /**
     * Esegue un metodo su un oggetto in modo sicuro.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  object  $object  L'oggetto su cui eseguire il metodo
     * @param  string  $method  Il nome del metodo
     * @param  array  $parameters  I parametri del metodo
     * @param  mixed  $default  Valore di default se il metodo non esiste o fallisce
=======
=======
>>>>>>> 89d0c8f4 (.)
     * @param object $object L'oggetto su cui eseguire il metodo
     * @param string $method Il nome del metodo
     * @param array $parameters I parametri del metodo
     * @param mixed $default Valore di default se il metodo non esiste o fallisce
     *
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
     * @return mixed Il risultato del metodo o il valore di default
     */
    public function callMethodSafely(object $object, string $method, array $parameters = [], mixed $default = null): mixed
    {
        Assert::object($object);
        Assert::stringNotEmpty($method);
<<<<<<< HEAD
<<<<<<< HEAD

        if (! method_exists($object, $method)) {
            return $default;
        }

=======
        
        if (!method_exists($object, $method)) {
            return $default;
        }
        
>>>>>>> e697a77b (.)
=======
        
        if (!method_exists($object, $method)) {
            return $default;
        }
        
>>>>>>> 89d0c8f4 (.)
        try {
            return $object->{$method}(...$parameters);
        } catch (\Throwable $e) {
            return $default;
        }
    }
}
