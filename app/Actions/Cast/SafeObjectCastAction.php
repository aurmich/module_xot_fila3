<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
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
 * Questa action centralizza la logica di accesso sicuro alle proprietà per evitare:
 * - Uso di property_exists() con oggetti che potrebbero avere magic methods
 * - Errori di tipo con accesso diretto alle proprietà
 * - Duplicazione di logica di verifica proprietà
<<<<<<< HEAD
 *
=======
 * 
>>>>>>> e697a77b (.)
 * Principi applicati:
 * - DRY: Evita duplicazione di logica di accesso proprietà
 * - KISS: Metodi semplici e diretti
 * - Robustezza: Gestisce tutti i casi edge e mantiene type safety
 * - Sicurezza: Previene errori di accesso a proprietà inesistenti
 * - Assert: Utilizza webmozart/assert per validazioni robuste
<<<<<<< HEAD
=======
 * 
 * @package Modules\Xot\Actions\Cast
>>>>>>> e697a77b (.)
 */
class SafeObjectCastAction
{
    use QueueableAction;

    /**
     * Verifica se un oggetto ha una proprietà specifica.
     *
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da verificare
     * @param  string  $property  Il nome della proprietà
=======
     * @param object $object L'oggetto da verificare
     * @param string $property Il nome della proprietà
     *
>>>>>>> e697a77b (.)
     * @return bool True se l'oggetto ha la proprietà
     */
    public function hasProperty(object $object, string $property): bool
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
        return isset($object->{$property});
    }

    /**
     * Verifica se un oggetto ha una proprietà con valore non null.
     *
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da verificare
     * @param  string  $property  Il nome della proprietà
=======
     * @param object $object L'oggetto da verificare
     * @param string $property Il nome della proprietà
     *
>>>>>>> e697a77b (.)
     * @return bool True se l'oggetto ha la proprietà con valore non null
     */
    public function hasNonNullProperty(object $object, string $property): bool
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
        return isset($object->{$property}) && $object->{$property} !== null;
    }

    /**
     * Verifica se un oggetto ha una proprietà con valore non vuoto.
     *
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da verificare
     * @param  string  $property  Il nome della proprietà
=======
     * @param object $object L'oggetto da verificare
     * @param string $property Il nome della proprietà
     *
>>>>>>> e697a77b (.)
     * @return bool True se l'oggetto ha la proprietà con valore non vuoto
     */
    public function hasNonEmptyProperty(object $object, string $property): bool
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD

        if (! isset($object->{$property})) {
            return false;
        }

        $value = $object->{$property};

=======
        
        if (!isset($object->{$property})) {
            return false;
        }
        
        $value = $object->{$property};
>>>>>>> e697a77b (.)
        return $value !== '';
    }

    /**
     * Ottiene una proprietà con cast sicuro a string.
     *
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  string|null  $default  Valore di default se la proprietà non esiste o è null
=======
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param string|null $default Valore di default se la proprietà non esiste o è null
     *
>>>>>>> e697a77b (.)
     * @return string Il valore della proprietà convertito in string
     */
    public function getStringProperty(object $object, string $property, ?string $default = ''): string
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD

        if (! isset($object->{$property})) {
            return $default ?? '';
        }

        $value = $object->{$property};

=======
        
        if (!isset($object->{$property})) {
            return $default ?? '';
        }
        
        $value = $object->{$property};
>>>>>>> e697a77b (.)
        return (string) $value;
    }

    /**
     * Ottiene una proprietà con cast sicuro a int.
     *
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  int|null  $default  Valore di default se la proprietà non esiste o è null
=======
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param int|null $default Valore di default se la proprietà non esiste o è null
     *
>>>>>>> e697a77b (.)
     * @return int Il valore della proprietà convertito in int
     */
    public function getIntProperty(object $object, string $property, ?int $default = 0): int
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD

        if (! isset($object->{$property})) {
            return $default ?? 0;
        }

        $value = $object->{$property};

=======
        
        if (!isset($object->{$property})) {
            return $default ?? 0;
        }
        
        $value = $object->{$property};
>>>>>>> e697a77b (.)
        return app(SafeIntCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene una proprietà con cast sicuro a float.
     *
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  float|null  $default  Valore di default se la proprietà non esiste o è null
=======
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param float|null $default Valore di default se la proprietà non esiste o è null
     *
>>>>>>> e697a77b (.)
     * @return float Il valore della proprietà convertito in float
     */
    public function getFloatProperty(object $object, string $property, ?float $default = 0.0): float
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD

        if (! isset($object->{$property})) {
            return $default ?? 0.0;
        }

        $value = $object->{$property};

=======
        
        if (!isset($object->{$property})) {
            return $default ?? 0.0;
        }
        
        $value = $object->{$property};
>>>>>>> e697a77b (.)
        return app(SafeFloatCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene una proprietà con cast sicuro a boolean.
     *
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  bool|null  $default  Valore di default se la proprietà non esiste o è null
=======
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param bool|null $default Valore di default se la proprietà non esiste o è null
     *
>>>>>>> e697a77b (.)
     * @return bool Il valore della proprietà convertito in boolean
     */
    public function getBooleanProperty(object $object, string $property, ?bool $default = false): bool
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD

        if (! isset($object->{$property})) {
            return $default ?? false;
        }

        $value = $object->{$property};

=======
        
        if (!isset($object->{$property})) {
            return $default ?? false;
        }
        
        $value = $object->{$property};
>>>>>>> e697a77b (.)
        return app(SafeBooleanCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene una proprietà con cast sicuro a array.
     *
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  array|null  $default  Valore di default se la proprietà non esiste o è null
=======
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param array|null $default Valore di default se la proprietà non esiste o è null
     *
>>>>>>> e697a77b (.)
     * @return array Il valore della proprietà convertito in array
     */
    public function getArrayProperty(object $object, string $property, ?array $default = []): array
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD

        if (! isset($object->{$property})) {
            return $default ?? [];
        }

        $value = $object->{$property};

=======
        
        if (!isset($object->{$property})) {
            return $default ?? [];
        }
        
        $value = $object->{$property};
>>>>>>> e697a77b (.)
        return app(SafeArrayCastAction::class)->execute($value, $default);
    }

    /**
     * Ottiene una proprietà con cast sicuro a un tipo specifico.
     *
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da cui ottenere la proprietà
     * @param  string  $property  Il nome della proprietà
     * @param  string  $type  Il tipo di cast desiderato (string, int, float, bool, array)
     * @param  mixed  $default  Valore di default se la proprietà non esiste o è null
=======
     * @param object $object L'oggetto da cui ottenere la proprietà
     * @param string $property Il nome della proprietà
     * @param string $type Il tipo di cast desiderato (string, int, float, bool, array)
     * @param mixed $default Valore di default se la proprietà non esiste o è null
     *
>>>>>>> e697a77b (.)
     * @return mixed Il valore della proprietà convertito nel tipo specificato
     */
    public function getTypedProperty(object $object, string $property, string $type, mixed $default = null): mixed
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
        Assert::inArray($type, ['string', 'int', 'float', 'bool', 'array']);
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
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
     * @param  object  $object  L'oggetto da verificare
     * @param  string  $property  Il nome della proprietà
     * @param  mixed  $expectedValue  Il valore atteso
=======
     * @param object $object L'oggetto da verificare
     * @param string $property Il nome della proprietà
     * @param mixed $expectedValue Il valore atteso
     *
>>>>>>> e697a77b (.)
     * @return bool True se l'oggetto ha la proprietà con il valore atteso
     */
    public function hasPropertyValue(object $object, string $property, mixed $expectedValue): bool
    {
        Assert::object($object);
        Assert::stringNotEmpty($property);
<<<<<<< HEAD

        if (! isset($object->{$property})) {
            return false;
        }

        $actualValue = $object->{$property};

=======
        
        if (!isset($object->{$property})) {
            return false;
        }
        
        $actualValue = $object->{$property};
>>>>>>> e697a77b (.)
        return $actualValue === $expectedValue;
    }

    /**
     * Ottiene una proprietà con validazione di tipo e valore.
     *
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
        ?callable $validator = null,
        mixed $default = null
    ): mixed {
        Assert::object($object);
        Assert::stringNotEmpty($property);
        Assert::inArray($type, ['string', 'int', 'float', 'bool', 'array']);
<<<<<<< HEAD

        $value = $this->getTypedProperty($object, $property, $type, $default);

        if ($validator !== null && ! $validator($value)) {
            return $default;
        }

=======
        
        $value = $this->getTypedProperty($object, $property, $type, $default);
        
        if ($validator !== null && !$validator($value)) {
            return $default;
        }
        
>>>>>>> e697a77b (.)
        return $value;
    }

    /**
     * Verifica se un oggetto ha un metodo specifico.
     *
<<<<<<< HEAD
     * @param  object  $object  L'oggetto da verificare
     * @param  string  $method  Il nome del metodo
=======
     * @param object $object L'oggetto da verificare
     * @param string $method Il nome del metodo
     *
>>>>>>> e697a77b (.)
     * @return bool True se l'oggetto ha il metodo
     */
    public function hasMethod(object $object, string $method): bool
    {
        Assert::object($object);
        Assert::stringNotEmpty($method);
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
        return method_exists($object, $method);
    }

    /**
     * Esegue un metodo su un oggetto in modo sicuro.
     *
<<<<<<< HEAD
     * @param  object  $object  L'oggetto su cui eseguire il metodo
     * @param  string  $method  Il nome del metodo
     * @param  array  $parameters  I parametri del metodo
     * @param  mixed  $default  Valore di default se il metodo non esiste o fallisce
=======
     * @param object $object L'oggetto su cui eseguire il metodo
     * @param string $method Il nome del metodo
     * @param array $parameters I parametri del metodo
     * @param mixed $default Valore di default se il metodo non esiste o fallisce
     *
>>>>>>> e697a77b (.)
     * @return mixed Il risultato del metodo o il valore di default
     */
    public function callMethodSafely(object $object, string $method, array $parameters = [], mixed $default = null): mixed
    {
        Assert::object($object);
        Assert::stringNotEmpty($method);
<<<<<<< HEAD

        if (! method_exists($object, $method)) {
            return $default;
        }

=======
        
        if (!method_exists($object, $method)) {
            return $default;
        }
        
>>>>>>> e697a77b (.)
        try {
            return $object->{$method}(...$parameters);
        } catch (\Throwable $e) {
            return $default;
        }
    }
}
