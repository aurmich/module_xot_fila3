<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager as FilamentRelationManager;
use Filament\Tables;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
=======
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
>>>>>>> ad700fc8 (.)
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Traits\HasXotTable;
use Webmozart\Assert\Assert;

/**
 * @property class-string<Model> $resource
 */
abstract class XotBaseRelationManager extends FilamentRelationManager
{
    use HasXotTable;

    protected static string $relationship = '';

    /** @var class-string<XotBaseResource> */
    protected static string $resourceClass;

    public static function getModuleName(): string
    {
        $class = static::class;
        $arr = explode('\\', $class);
        $module_name = $arr[1];

        return $module_name;
    }

    final public function form(Form $form): Form
    {
        return $form->schema(
            $this->getFormSchema()
        );
    }

    public function getFormSchema(): array
    {
        return $this->getResource()::getFormSchema();
    }
<<<<<<< HEAD

    // *
    public function getTableColumns(): array
    {
        $index = Arr::get($this->getResource()::getPages(), 'index');
        if (! $index) {
            // throw new \Exception('Index page not found');
            return [];
        }
        /** @phpstan-ignore method.nonObject */
        $index_page = $index->getPage();

        if (! method_exists($index_page, 'getTableColumns')) {
            // throw new \Exception('method  getTableColumns on '.print_r($index_page,true).' not found');
            return [];
        }
        /** @phpstan-ignore argument.type */
        $res = app($index_page)->getTableColumns();

        return $res;
    }

    // */
=======
//*
    public function getTableColumns(): array
    {
        $index=Arr::get($this->getResource()::getPages(),'index');
        if(!$index){
            //throw new \Exception('Index page not found');
            return [];
        }
        /** @phpstan-ignore method.nonObject */
        $index_page=$index->getPage();
        
        if(!method_exists($index_page,'getTableColumns')){
            //throw new \Exception('method  getTableColumns on '.print_r($index_page,true).' not found');
            return [];
        }
        /** @phpstan-ignore argument.type */
        $res= app($index_page)->getTableColumns();

        return $res;
    }
//*/
>>>>>>> ad700fc8 (.)
    public function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make(),
<<<<<<< HEAD
            // Tables\Actions\DeleteAction::make(),
=======
            //Tables\Actions\DeleteAction::make(),
>>>>>>> ad700fc8 (.)
            Tables\Actions\DetachAction::make(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
<<<<<<< HEAD
            // Tables\Actions\DeleteBulkAction::make(),
=======
            //Tables\Actions\DeleteBulkAction::make(),
>>>>>>> ad700fc8 (.)
            Tables\Actions\DetachBulkAction::make(),
        ];
    }

    public function getTableHeaderActions(): array
    {
        return [
            Tables\Actions\AttachAction::make(),
        ];
    }

    public function getTableFilters(): array
    {
        return [];
    }

    public function getResource(): string
    {
        $resource = static::$resourceClass;
        Assert::classExists($resource);
        Assert::isAOf($resource, XotBaseResource::class);

        return $resource;
    }

    public function getRelationship(): \Illuminate\Database\Eloquent\Relations\Relation|\Illuminate\Database\Eloquent\Builder
    {
        return parent::getRelationship();
    }
}
