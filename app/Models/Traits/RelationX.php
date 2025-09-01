<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;

/**
 * Trait Modules\Xot\Models\Traits\RelationX.
 */
trait RelationX
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string<Model>  $related  aaa
     * @param  class-string<Model>|string|null  $table  aaa
     * @param  string|null  $foreignPivotKey  aaa
     * @param  string|null  $relatedPivotKey  aaa
     * @param  string|null  $parentKey  aaa
     * @param  string|null  $relatedKey  aaa
     * @param  string|null  $relation  aaa
=======
=======
>>>>>>> 89d0c8f4 (.)
     * @param class-string<Model>             $related         aaa
     * @param class-string<Model>|string|null $table           aaa
     * @param string|null                     $foreignPivotKey aaa
     * @param string|null                     $relatedPivotKey aaa
     * @param string|null                     $parentKey       aaa
     * @param string|null                     $relatedKey      aaa
     * @param string|null                     $relation        aaa
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
     */
    public function belongsToManyX(
        string $related,
        ?string $table = null,
        ?string $foreignPivotKey = null,
        ?string $relatedPivotKey = null,
        ?string $parentKey = null,
        ?string $relatedKey = null,
        ?string $relation = null,
    ): BelongsToMany {
        Assert::isInstanceOf($related_model = app($related), Model::class, '['.__LINE__.']['.class_basename($this).']');
        $pivot = $this->guessPivot($related);
        $table = $pivot->getTable();
        $pivotFields = $pivot->getFillable();

        $pivotDbName = $pivot->getConnection()->getDatabaseName();
        $dbName = $this->getConnection()->getDatabaseName();
        $relatedDbName = $related_model->getConnection()->getDatabaseName();
        // if ($pivotDbName !== $dbName) {
        if ($pivotDbName != $dbName || $relatedDbName != $dbName) {
            $table = $pivotDbName.'.'.$table;
        }
        // }
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        return $this->belongsToMany(
            related: $related,
            table: $table,
            foreignPivotKey: $foreignPivotKey,
            relatedPivotKey: $relatedPivotKey,
            parentKey: $parentKey,
            relatedKey: $relatedKey,
            relation: $relation,
        )
            ->using($pivot::class)
            ->withPivot($pivotFields)
            ->withTimestamps();
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> e697a77b (.)
=======

>>>>>>> 89d0c8f4 (.)
    /**
     * Define a polymorphic many-to-many relationship.
     *
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     *
     * @param  class-string<TRelatedModel>  $related
     * @param  string  $name
     * @param  string|null  $table
     * @param  string|null  $foreignPivotKey
     * @param  string|null  $relatedPivotKey
     * @param  string|null  $parentKey
     * @param  string|null  $relatedKey
     * @param  string|null  $relation
     * @param  bool  $inverse
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany<TRelatedModel, $this>
     */
    public function morphToManyX($related, $name, $table = null, $foreignPivotKey = null,
<<<<<<< HEAD
<<<<<<< HEAD
        $relatedPivotKey = null, $parentKey = null,
        $relatedKey = null, $relation = null, $inverse = false)
    {

=======
                                $relatedPivotKey = null, $parentKey = null,
                                $relatedKey = null, $relation = null, $inverse = false)
    {
       
>>>>>>> e697a77b (.)
=======
                                $relatedPivotKey = null, $parentKey = null,
                                $relatedKey = null, $relation = null, $inverse = false)
    {
       
>>>>>>> 89d0c8f4 (.)
        $pivot = $this->guessMorphPivot($related);
        $table = $pivot->getTable();
        $pivotFields = $pivot->getFillable();

        $pivotDbName = $pivot->getConnection()->getDatabaseName();
        $dbName = $this->getConnection()->getDatabaseName();
<<<<<<< HEAD
<<<<<<< HEAD
        // $relatedDbName = $related_model->getConnection()->getDatabaseName();
        if ($table == null) {
            $table = $pivot->getTable();
        }

=======
        //$relatedDbName = $related_model->getConnection()->getDatabaseName();
        if($table==null){
            $table = $pivot->getTable();
        }
>>>>>>> e697a77b (.)
=======
        //$relatedDbName = $related_model->getConnection()->getDatabaseName();
        if($table==null){
            $table = $pivot->getTable();
        }
>>>>>>> 89d0c8f4 (.)
        return $this->morphToMany(
            related: $related,
            name: $name,
            table: $table,
            foreignPivotKey: $foreignPivotKey,
            relatedPivotKey: $relatedPivotKey,
            parentKey: $parentKey,
            relatedKey: $relatedKey,
            relation: $relation,
            inverse: $inverse,
        )
<<<<<<< HEAD
<<<<<<< HEAD
            ->using($pivot::class)
            ->withPivot($pivotFields)
            ->withTimestamps();
=======
        ->using($pivot::class)
        ->withPivot($pivotFields)
        ->withTimestamps();
>>>>>>> e697a77b (.)
=======
        ->using($pivot::class)
        ->withPivot($pivotFields)
        ->withTimestamps();
>>>>>>> 89d0c8f4 (.)
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphPivot
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function guessMorphPivot(string $related, ?string $class = null)
=======
    public function guessMorphPivot(string $related,?string $class = null)
>>>>>>> 89d0c8f4 (.)
    {
        $class = $this::class;
        $pivot_name = class_basename($related).'Morph';
        
        $pivot_class = $this->guessPivotFullClass($pivot_name, $related, $class);
        $pivot = app($pivot_class);
<<<<<<< HEAD
        Assert::isInstanceOf($pivot, \Illuminate\Database\Eloquent\Relations\MorphPivot::class);

=======
    public function guessMorphPivot(string $related,?string $class = null)
    {
        $class = $this::class;
        $pivot_name = class_basename($related).'Morph';
        
        $pivot_class = $this->guessPivotFullClass($pivot_name, $related, $class);
        $pivot = app($pivot_class);
        Assert::isInstanceOf($pivot,\Illuminate\Database\Eloquent\Relations\MorphPivot::class);
>>>>>>> e697a77b (.)
=======
        Assert::isInstanceOf($pivot,\Illuminate\Database\Eloquent\Relations\MorphPivot::class);
>>>>>>> 89d0c8f4 (.)
        return $pivot;
    }

    /**
     * Guess the pivot class for a many-to-many relationship.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $related  The related model class name
     * @param  string|class-string|null  $class  The class to use for parent class lookup (used internally)
=======
     * @param string $related The related model class name
     * @param string|class-string|null $class The class to use for parent class lookup (used internally)
>>>>>>> e697a77b (.)
=======
     * @param string $related The related model class name
     * @param string|class-string|null $class The class to use for parent class lookup (used internally)
>>>>>>> 89d0c8f4 (.)
     * @return \Illuminate\Database\Eloquent\Relations\Pivot
     */
    public function guessPivot(string $related, ?string $class = null)
    {
        $class = $class ?? $this::class;
        $model_names = [
            class_basename($class),
            class_basename($related),
        ];
        sort($model_names);
<<<<<<< HEAD
<<<<<<< HEAD
        $msg = '';
=======
        $msg='';
>>>>>>> 89d0c8f4 (.)
        $pivot_name = implode('', $model_names);
        
        $pivot_class = $this->guessPivotFullClass($pivot_name, $related, $class);
<<<<<<< HEAD

=======
        $msg='';
        $pivot_name = implode('', $model_names);
        
        $pivot_class = $this->guessPivotFullClass($pivot_name, $related, $class);
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        $pivot = app($pivot_class);
        Assert::isInstanceOf($pivot, \Illuminate\Database\Eloquent\Relations\Pivot::class);

        return $pivot;
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function guessPivotFullClass(string $pivot_name, string $related, ?string $class = null): string
    {
=======
    public function guessPivotFullClass(string $pivot_name, string $related, ?string $class = null):string{
>>>>>>> e697a77b (.)
=======
    public function guessPivotFullClass(string $pivot_name, string $related, ?string $class = null):string{
>>>>>>> 89d0c8f4 (.)
        $class = $class ?? $this::class;
        $pivot_class = Str::of($class)
            ->beforeLast('\\')
            ->append('\\'.$pivot_name)
            ->toString();
        if (! class_exists($pivot_class)) {
            $pivot_class = Str::of($related)
<<<<<<< HEAD
<<<<<<< HEAD
                ->beforeLast('\\')
                ->append('\\'.$pivot_name)
                ->toString();
        }
        if (! class_exists($pivot_class)) {

            if (get_parent_class($class) !== false) {
                if (! Str::endsWith(get_parent_class($class), 'Morph')) {
=======
            ->beforeLast('\\')
            ->append('\\'.$pivot_name)
            ->toString();
        }
        if (! class_exists($pivot_class)) {
            
            if(get_parent_class($class)!==false){
                if(!Str::endsWith(get_parent_class($class),'Morph')){
>>>>>>> e697a77b (.)
=======
            ->beforeLast('\\')
            ->append('\\'.$pivot_name)
            ->toString();
        }
        if (! class_exists($pivot_class)) {
            
            if(get_parent_class($class)!==false){
                if(!Str::endsWith(get_parent_class($class),'Morph')){
>>>>>>> 89d0c8f4 (.)
                    $model_names = [
                        class_basename(get_parent_class($class)),
                        class_basename($related),
                    ];
                    sort($model_names);
                    $pivot_name = implode('', $model_names);
<<<<<<< HEAD
<<<<<<< HEAD

=======
                    
>>>>>>> 89d0c8f4 (.)
                }
                return $this->guessPivotFullClass($pivot_name, $related, get_parent_class($class));
            }
        }
<<<<<<< HEAD

=======
                    
                }
                return $this->guessPivotFullClass($pivot_name, $related, get_parent_class($class));
            }
        }
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
        return $pivot_class;
    }
}
