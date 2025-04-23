<?php

/**
 * -WIP.
 */

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Component;
use Illuminate\Support\Arr;
use Modules\Lang\Actions\SaveTransAction;
use Modules\Xot\Actions\GetTransKeyAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Classe per automatizzare l'assegnazione di etichette ai componenti Filament.
 */
/**
 * Classe per automatizzare l'assegnazione di etichette ai componenti Filament.
 */
class AutoLabelAction
{
    use QueueableAction;

    /**
     * Get the component name based on its actual type.
     *
     * @param Field|Component $component Il componente di cui ottenere il nome
     * @return string Il nome del componente
     */
    private function getComponentName(Field|Component $component): string
    {
        // Per i componenti Field di Filament
        if (method_exists($component, 'getName')) {
            $name = $component->getName();
            return is_string($name) ? $name : (string) $name;
        }

        // Per i componenti generali di Filament
        // PHPStan rileva che questo controllo è sempre vero per Component
        // ma lo manteniamo per chiarezza e per gestire eventuali cambiamenti futuri in Filament
        // @phpstan-ignore function.alreadyNarrowedType
        if (method_exists($component, 'getStatePath')) {
            $statePath = $component->getStatePath();
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

            return $statePath;
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
<<<<<<< HEAD
=======
>>>>>>> c2dac53 (.)
            return $statePath;
            return $statePath;
            return is_string($statePath) ? $statePath : (string) $statePath;
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======

            return $statePath;
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======

            return $statePath;
>>>>>>> c2dac53 (.)
        }

        // Fallback a reflection per altri casi
        $reflectionClass = new \ReflectionClass($component);
        if ($reflectionClass->hasProperty('name') && $reflectionClass->getProperty('name')->isPublic()) {
            $property = $reflectionClass->getProperty('name');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

            Assert::string($value = $property->getValue($component));
            return $value;
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
<<<<<<< HEAD
=======
>>>>>>> c2dac53 (.)
            Assert::string($value = $property->getValue($component));
            return $value;
            Assert::string($value = $property->getValue($component));
            return $value;
            $value = $property->getValue($component);
            return is_string($value) ? $value : (string) $value;
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======

            Assert::string($value = $property->getValue($component));
            return $value;
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======

            Assert::string($value = $property->getValue($component));
            return $value;
>>>>>>> c2dac53 (.)
        }

        // Ultima risorsa: ritorniamo il nome della classe
        return class_basename($component);
    }

    /**
     * Applica automaticamente le etichette ai componenti Filament.
     *
     * @param Field|Component $component Il componente a cui applicare l'etichetta
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> c2dac53 (.)
     * 
     *
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
     * @return Field|Component Il componente con l'etichetta applicata
     */
    public function execute(Field|Component $component): Field|Component
    {
        Assert::isInstanceOf($component, Field::class, 'Il componente deve essere un\'istanza di Field o Component');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> c2dac53 (.)

        
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======

>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======

>>>>>>> c2dac53 (.)
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 6);

        // Otteniamo il valore dalla backtrace
        $class = Arr::get($backtrace, '5.class');

        // Gestiamo il caso in cui $class sia vuoto
        if (empty($class)) {
            // Se non riusciamo a ottenere la classe dal backtrace, usiamo la classe del componente
            $class = get_class($component);
        }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)

        if (is_object($class)) {
            $class = get_class($class);
        }

        // Assicuriamo che $class sia una stringa
        Assert::stringNotEmpty($class, 'La classe deve essere una stringa non vuota');

        // Otteniamo la chiave di traduzione
        $transKeyAction = app(GetTransKeyAction::class);
        Assert::isCallable([$transKeyAction, 'execute'], 'GetTransKeyAction::execute deve essere chiamabile');

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
=======
>>>>>>> c2dac53 (.)
        
        // Assicuriamo che $class sia una stringa
        if (!is_string($class)) {
            $class = is_object($class) ? get_class($class) : is_string($class) ? $class : (string) $class;
        }

        Assert::stringNotEmpty($class, 'La classe deve essere una stringa non vuota');
        
        // Otteniamo la chiave di traduzione
        $transKeyAction = app(GetTransKeyAction::class);
        Assert::isCallable([$transKeyAction, 'execute'], 'GetTransKeyAction::execute deve essere chiamabile');
        
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
        $trans_key = $transKeyAction->execute($class);
        Assert::stringNotEmpty($trans_key, 'La chiave di traduzione non può essere vuota');

        // Otteniamo il nome del componente
        $componentName = $this->getComponentName($component);
        Assert::stringNotEmpty($componentName, 'Il nome del componente non può essere vuoto');

        // Costruiamo la chiave per l'etichetta
        $label_key = $trans_key . '.fields.' . $componentName . '.label';
        $label = trans($label_key);

        $label_key = $trans_key . '.fields.' . $componentName . '.label';
        $label = trans($label_key);

<<<<<<< HEAD
=======
<<<<<<< HEAD
        $label_key = $trans_key . '.fields.' . $componentName . '.label';
        $label = trans($label_key);

=======
        $label_key = $trans_key.'.fields.'.$componentName.'.label';
        $label = trans($label_key);
        
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
        $label_key = $trans_key . '.fields.' . $componentName . '.label';
        $label = trans($label_key);

>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
        $label_key = $trans_key.'.fields.'.$componentName.'.label';
        $label = trans($label_key);
        
        $label_key = $trans_key . '.fields.' . $componentName . '.label';
        $label = trans($label_key);

>>>>>>> c2dac53 (.)
        if (is_string($label)) {
            if ($label_key === $label) {
                // Se la traduzione non esiste, creiamone una utilizzando il nome del componente
                $label_value = $componentName;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)

                // Proviamo a ottenere una traduzione più breve
                $label_key1 = $trans_key . '.fields.' . $componentName;
                $label1 = trans($label_key1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
=======
>>>>>>> c2dac53 (.)
                
                // Proviamo a ottenere una traduzione più breve
                $label_key1 = $trans_key.'.fields.'.$componentName;
                $label1 = trans($label_key1);
                
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
                if ($label_key1 !== $label1 && is_string($label1)) {
                    $label_value = $label1;
                }

                // Salviamo la traduzione
                $saveTransAction = app(SaveTransAction::class);
                Assert::isCallable([$saveTransAction, 'execute'], 'SaveTransAction::execute deve essere chiamabile');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)

                $saveTransAction->execute($label_key, $label_value);
            }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
=======
>>>>>>> c2dac53 (.)
                
                $saveTransAction->execute($label_key, $label_value);
            }
            
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> e5c56c3 (.)
=======
>>>>>>> c2dac53 (.)
            // Applichiamo l'etichetta al componente
            // Field ha sempre un metodo label(), quindi possiamo chiamarlo direttamente
            // Applichiamo l'etichetta al componente
            // Field ha sempre un metodo label(), quindi possiamo chiamarlo direttamente
     * Undocumented function.
     * return number of input added.
     */
    public function execute($component)
    {
        $backtrace = debug_backtrace();
        Assert::string($class = Arr::get($backtrace, '5.class'));
        $trans_key = app(GetTransKeyAction::class)->execute($class);
        $label_key = $trans_key.'.fields.'.$component->getName().'.label';
        $label = trans($label_key);
        if (is_string($label)) {
            if ($label_key == $label) {
                $label_value = $component->getName();
                $label_key1 = $trans_key.'.fields.'.$component->getName();
                $label1 = trans($label_key1);
                if ($label_key1 != $label1) {
                    $label_value = $label1;
                }

                app(SaveTransAction::class)->execute($label_key, $label_value);
            }
            $component->label($label);
        }

        return $component;
    }
}
