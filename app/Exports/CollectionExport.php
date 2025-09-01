<?php

declare(strict_types=1);

namespace Modules\Xot\Exports;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> 89d0c8f4 (.)
use Illuminate\Support\Arr;
use Webmozart\Assert\Assert;
<<<<<<< HEAD
=======
use Illuminate\Support\Arr;
use Webmozart\Assert\Assert;
=======
>>>>>>> 89d0c8f4 (.)
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\Exportable;
use Modules\Lang\Actions\TransArrayAction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Modules\Lang\Actions\TransCollectionAction;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Actions\Cast\SafeArrayByModelCastAction;
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)

class CollectionExport implements FromCollection, ShouldQueue, WithHeadings, WithMapping
{
    use Exportable;

    public Collection $collection;
<<<<<<< HEAD
<<<<<<< HEAD

    public array $headings;

=======
    public array $headings;
>>>>>>> e697a77b (.)
=======
    public array $headings;
>>>>>>> 89d0c8f4 (.)
    public ?string $transKey;

    /** @var array<int, string> */
    public ?array $fields = null;

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<int, string>  $fields
=======
     * @param Collection $collection
     * @param string|null $transKey  
     * @param array<int, string> $fields
>>>>>>> e697a77b (.)
=======
     * @param Collection $collection
     * @param string|null $transKey  
     * @param array<int, string> $fields
>>>>>>> 89d0c8f4 (.)
     */
    public function __construct(
        Collection $collection,
        ?string $transKey = null,
        array $fields = []
    ) {
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        $this->collection = $collection;
        $this->transKey = $transKey;
        $this->fields = $fields;
    }

    public function getHead(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
        if (\is_array($this->fields) && ! empty($this->fields)) {

=======
        if (\is_array($this->fields) && !empty($this->fields)) {
            
>>>>>>> 89d0c8f4 (.)
            return $this->fields;
        }
        

        
        $head = $this->collection->first();
        Assert::isInstanceOf($head,Model::class);
        $head= array_keys($head->getAttributes());
        return $head;

<<<<<<< HEAD
=======
        if (\is_array($this->fields) && !empty($this->fields)) {
            
            return $this->fields;
        }
        

        
        $head = $this->collection->first();
        Assert::isInstanceOf($head,Model::class);
        $head= array_keys($head->getAttributes());
        return $head;

        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
    }

    public function headings(): array
    {
        $headings = $this->getHead();
        $transKey = $this->transKey;
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        $headings = app(TransArrayAction::class)->execute($headings, $transKey);

        return $headings;
    }

    public function collection(): Collection
    {
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        return $this->collection;
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  \Illuminate\Contracts\Support\Arrayable<(int|string), mixed>|iterable<(int|string), mixed>|null  $item
=======
     * @param \Illuminate\Contracts\Support\Arrayable<(int|string), mixed>|iterable<(int|string), mixed>|null $item
>>>>>>> 89d0c8f4 (.)
     */
    public function map($item): array
    {
        if (null === $this->fields || empty($this->fields)) {
            
            Assert::isInstanceOf($item,Model::class);
            $res= app(SafeArrayByModelCastAction::class)->execute($item);
            $res= Arr::map($res,function($value,$key){
                
                if ($value instanceof \BackedEnum) {
                    if(method_exists($value,'getLabel')){
                        return $value->getLabel();
                    }
                    return $value->value;
                }
            
                return SafeStringCastAction::cast($value);
            });
            
            return $res;
        }
       
        // return collect($item)->only($this->fields)->toArray();
        $data = [];
<<<<<<< HEAD

=======
     * @param \Illuminate\Contracts\Support\Arrayable<(int|string), mixed>|iterable<(int|string), mixed>|null $item
     */
    public function map($item): array
    {
        if (null === $this->fields || empty($this->fields)) {
            
            Assert::isInstanceOf($item,Model::class);
            $res= app(SafeArrayByModelCastAction::class)->execute($item);
            $res= Arr::map($res,function($value,$key){
                
                if ($value instanceof \BackedEnum) {
                    if(method_exists($value,'getLabel')){
                        return $value->getLabel();
                    }
                    return $value->value;
                }
            
                return SafeStringCastAction::cast($value);
            });
            
            return $res;
        }
       
        // return collect($item)->only($this->fields)->toArray();
        $data = [];
       
>>>>>>> e697a77b (.)
=======
       
>>>>>>> 89d0c8f4 (.)
        foreach ($this->fields as $field) {
            $value = data_get($item, $field);
            if (\is_object($value)) {
                if (enum_exists($value::class) && method_exists($value, 'getLabel')) {
                    $value = $value->getLabel();
                }
            }
            $data[$field] = $value;
        }

<<<<<<< HEAD
<<<<<<< HEAD
=======
        

>>>>>>> e697a77b (.)
=======
        

>>>>>>> 89d0c8f4 (.)
        return $data;
    }
}
