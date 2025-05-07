<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Traits;

use TypeError;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Lang\Actions\SaveTransAction;
use Modules\Xot\Actions\GetTransKeyAction;

trait TransTrait
{
    /**
     * Get translation for a given key.
     *
     * @throws \Exception Se exceptionIfNotExist è true e la traduzione non esiste
     */
    public static function trans(string $key, bool $exceptionIfNotExist = false): string
    {
        $tmp = static::getKeyTrans($key);
        /** @var string|array<int|string,mixed>|null $res */
        $res = trans($tmp);

        if (is_string($res)) {
            if ($exceptionIfNotExist && $res === $tmp) {
                throw new \Exception('[' . __LINE__ . '][' . class_basename(__CLASS__) . ']');
            }

            return $res;
        }

        if (is_array($res)) {
            $first = current($res);
            if (is_string($first) || is_numeric($first)) {
                return is_string($first) ? $first : (string) $first;
            }
        }

        return 'fix:' . $tmp;
    }

    /**
     * Get translation key for a given key.
     */
    public static function getKeyTrans(string $key): string
    {
        /** @var string */
        $transKey = app(GetTransKeyAction::class)->execute(static::class);

        $key = $transKey . '.' . $key;
        $key = Str::of($key)->replace('.cluster.pages.', '.')->toString();
        return $key;
    }

    /**
     * Get translation key for a given function name.
     */
    public static function getKeyTransFunc(string $func): string
    {
        $key = Str::of($func)
            ->after('get')
            ->snake()
            ->replace('_', '.')
            ->toString();
        /** @var string */
        $transKey = app(GetTransKeyAction::class)->execute(static::class);

        $key = $transKey . '.' . $key;
        $key = Str::of($key)->replace('.cluster.pages.', '.')->toString();
        return $key;
    }

    /**
     * Get translation for a given function name.
     */
    public static function transFunc(string $func, bool $exceptionIfNotExist = false): string
    {
        $key = static::getKeyTransFunc($func);
<<<<<<< HEAD
=======
<<<<<<< HEAD
        return static::trans($key, $exceptionIfNotExist);
    }

    /**
     * Get translation for a given function name with parameters.
     *
     * @param array<string, mixed> $parameters
     */
    public static function transFuncParams(string $func, array $parameters = [], bool $exceptionIfNotExist = false): string
    {
        $key = static::getKeyTransFunc($func);
        return static::transParams($key, $parameters, $exceptionIfNotExist);
    }

    /**
     * Get translation for a given key with parameters.
     *
     * @param array<string, mixed> $parameters
     */
    public static function transParams(string $key, array $parameters = [], bool $exceptionIfNotExist = false): string
    {
        $tmp = static::getKeyTrans($key);
        /** @var string|array<int|string,mixed>|null $res */
        $res = trans($tmp, $parameters);

        if (is_string($res)) {
            if ($exceptionIfNotExist && $res === $tmp) {
                throw new \Exception('[' . __LINE__ . '][' . class_basename(__CLASS__) . ']');
            }

            return $res;
        }

        if (is_array($res)) {
            $first = current($res);
=======
>>>>>>> 3268b83 (.)
        /** @var string|array<int|string,mixed>|null */
        $trans = null;

        try {
            $trans = trans($key);
        } catch (\TypeError $e) {
            dddx([
                'e' => $e,
                'key' => $key,
            ]);
        }

        if ($key === $trans) {
            $group = Str::of($key)->before('.')->toString();
            $item = Str::of($key)->after($group . '.')->toString();
            $group_arr = trans($group);
            if (is_array($group_arr)) {
                $trans = Arr::get($group_arr, $item);
            }
        }
<<<<<<< HEAD
=======

>>>>>>> 3268b83 (.)
        if (is_numeric($trans)) {
            return strval($trans);
        }

        if (is_array($trans)) {
            $first = current($trans);
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
            if (is_string($first) || is_numeric($first)) {
                return is_string($first) ? $first : (string) $first;
            }
        }

<<<<<<< HEAD
=======
<<<<<<< HEAD
        return 'fix:' . $tmp;
    }

    /**
     * Save translation for a given key.
     */
    public static function saveTrans(string $key, string $value): void
    {
        $tmp = static::getKeyTrans($key);
        app(SaveTransAction::class)->execute($tmp, $value);
    }

    /**
     * Save translation for a given function name.
     */
    public static function saveTransFunc(string $func, string $value): void
    {
        $key = static::getKeyTransFunc($func);
        static::saveTrans($key, $value);
    }

    /**
     * Get translation choice for a given key.
     *
     * @param array<string, mixed> $replace
     */
    protected function transChoice(string $key, int $number, array $replace = []): string
    {
        $tmp = static::getKeyTrans($key);
        /** @var string|array<int|string,mixed>|null $res */
        $res = trans_choice($tmp, $number, $replace);

        if (is_string($res)) {
            return $res;
        }

        if (is_array($res)) {
            $first = current($res);
            if (is_string($first) || is_numeric($first)) {
                return is_string($first) ? $first : (string) $first;
            }
        }

        return 'fix:' . $tmp;
=======
>>>>>>> 3268b83 (.)
        if (is_string($trans)) {
            if ($trans === $key) {
                $newTrans = Str::of($key)
                    ->between('::', '.')
                    ->replace('_', ' ')
                    ->toString();
                app(SaveTransAction::class)->execute($key, $newTrans);

                return $newTrans;
            }

            return $trans;
        }

        if ($trans === null) {
            $newTrans = Str::of($key)
                ->between('::', '.')
                ->replace('_', ' ')
                ->toString();
            app(SaveTransAction::class)->execute($key, $newTrans);

            return $newTrans;
        }

        return 'fix:' . $key;
    }

    protected function transChoice(string $key, int $number, array $replace = []): string
    {
        return trans_choice($key, $number, $replace) ?? $key;
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    }
}
