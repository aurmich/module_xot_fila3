<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Traits;

use TypeError;
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
                throw new \Exception('[' . __LINE__ . '][' . class_basename(__CLASS__) . ']');
<<<<<<< HEAD
=======
<<<<<<< HEAD
                throw new \Exception('[' . __LINE__ . '][' . class_basename(__CLASS__) . ']');
=======
                throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
                throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
                throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
                throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
>>>>>>> c2dac53 (.)
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
        return 'fix:' . $tmp;
<<<<<<< HEAD
=======
<<<<<<< HEAD
        return 'fix:' . $tmp;
=======
        return 'fix:'.$tmp;
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
=======
        return 'fix:'.$tmp;
>>>>>>> c2dac53 (.)
        return 'fix:' . $tmp;
                return (string) $first;
            }
        }

        return 'fix:'.$tmp;
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
    }

    /**
     * Get translation key for a given key.
     */
    public static function getKeyTrans(string $key): string
    {
        /** @var string */
        $transKey = app(GetTransKeyAction::class)->execute(static::class);

        $key = $transKey . '.' . $key;
        $key = $transKey . '.' . $key;
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $key = $transKey . '.' . $key;
=======
        $key = $transKey.'.'.$key;
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> e5c56c3 (.)
=======
        $key = $transKey.'.'.$key;
>>>>>>> c2dac53 (.)
        $key = Str::of($key)->replace('.cluster.pages.', '.')->toString();
        return $key;
        $key = Str::of($key)->replace('.cluster.pages.', '.')->toString();
        return $key;
        return $transKey.'.'.$key;
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
        $key = $transKey . '.' . $key;
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $key = $transKey . '.' . $key;
=======
        $key = $transKey.'.'.$key;
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> e5c56c3 (.)
=======
        $key = $transKey.'.'.$key;
>>>>>>> c2dac53 (.)
        $key = Str::of($key)->replace('.cluster.pages.', '.')->toString();
        return $key;
        $key = Str::of($key)->replace('.cluster.pages.', '.')->toString();
        return $key;
        return $transKey.'.'.$key;
    }

    /**
     * Get translation for a given function name.
     */
    public static function transFunc(string $func, bool $exceptionIfNotExist = false): string
    {
        $key = static::getKeyTransFunc($func);
<<<<<<< HEAD
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
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
=======
>>>>>>> c2dac53 (.)
        
        /** @var string|array<int|string,mixed>|null $trans */
        try{
            $trans = trans($key);
        }catch(TypeError $e){
            dddx([
                'e'=>$e,
                'key'=>$key
            ]);
        }
        /** @var string|array<int|string,mixed>|null $trans */
        $trans = trans($key);

        if ($key == $trans) {
            $group = Str::of($key)->before('.')->toString();
            $item = Str::of($key)->after($group.'.')->toString();
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
            $group_arr = trans($group);
            if (is_array($group_arr)) {
                $trans = Arr::get($group_arr, $item);
            }
        }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD

=======
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======

=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======


>>>>>>> c2dac53 (.)
        if (is_numeric($trans)) {
            return strval($trans);
        }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        // if (! is_string($trans) && ! is_numeric($trans) && ! is_array($trans)) {
        //    return 'fix:'.$key;
        // }
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
        // if (! is_string($trans) && ! is_numeric($trans) && ! is_array($trans)) {
        //    return 'fix:'.$key;
        // }
>>>>>>> c2dac53 (.)
        if (is_array($trans)) {
            $first = current($trans);
            if (is_string($first) || is_numeric($first)) {
                return is_string($first) ? $first : (string) $first;
            }
        }

        if (is_string($trans)) {
        if (is_string($trans)) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
        if (is_string($trans)) {
=======
        if (is_string($trans) /* || is_numeric($trans) */) {
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
=======
        if (is_string($trans) /* || is_numeric($trans) */) {
>>>>>>> c2dac53 (.)
        if (is_string($trans)) {
        // if (! is_string($trans) && ! is_numeric($trans) && ! is_array($trans)) {
        //    return 'fix:'.$key;
        // }
        if (is_array($trans)) {
            $first = current($trans);
            if (is_string($first) || is_numeric($first)) {
                return (string) $first;
            }
        }

        if (is_string($trans) /* || is_numeric($trans) */) {
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
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
        if ($trans === null) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
        if ($trans === null) {
=======
        if (is_null($trans)) {
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
        if (is_null($trans)) {
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
        if (is_null($trans)) {
        if (is_null($trans)) {
>>>>>>> c2dac53 (.)
            $newTrans = Str::of($key)
                ->between('::', '.')
                ->replace('_', ' ')
                ->toString();
            app(SaveTransAction::class)->execute($key, $newTrans);

            return $newTrans;
        }

        return 'fix:' . $key;
        return 'fix:' . $key;
<<<<<<< HEAD
=======
<<<<<<< HEAD
        return 'fix:' . $key;
=======
=======
>>>>>>> c2dac53 (.)
        // $first = current($trans);
        // if (is_string($first) || is_numeric($first)) {
        //    return is_string($first) ? $first : (string) $first;
        // }

        return 'fix:'.$key;
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
=======
>>>>>>> c2dac53 (.)
        // $first = current($trans);
        // if (is_string($first) || is_numeric($first)) {
        //    return (string) $first;
        // }

        return 'fix:'.$key;
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
    }

    protected function transChoice(string $key, int $number, array $replace = []): string
    {
        return trans_choice($key, $number, $replace) ?? $key;
    }
}
