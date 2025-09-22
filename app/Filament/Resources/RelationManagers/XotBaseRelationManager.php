<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager as FilamentRelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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
<<<<<<< HEAD
        return $form->schema($this->getFormSchema());
=======
        return $form->schema(
            $this->getFormSchema()
        );
>>>>>>> c4ec0fb6 (.)
    }

    public function getFormSchema(): array
    {
        return $this->getResource()::getFormSchema();
    }
<<<<<<< HEAD

    //*
    #[\Override]
    public function getTableColumns(): array
    {
        $index = Arr::get($this->getResource()::getPages(), 'index');
        if (!$index) {
=======
//*
    public function getTableColumns(): array
    {
        $index=Arr::get($this->getResource()::getPages(),'index');
        if(!$index){
>>>>>>> c4ec0fb6 (.)
            //throw new \Exception('Index page not found');
            return [];
        }
        /** @phpstan-ignore method.nonObject */
<<<<<<< HEAD
        $index_page = $index->getPage();

        if (!method_exists($index_page, 'getTableColumns')) {
=======
        $index_page=$index->getPage();
        
        if(!method_exists($index_page,'getTableColumns')){
>>>>>>> c4ec0fb6 (.)
            //throw new \Exception('method  getTableColumns on '.print_r($index_page,true).' not found');
            return [];
        }
        /** @phpstan-ignore argument.type */
<<<<<<< HEAD
        $res = app($index_page)->getTableColumns();

        return $res;
    }

    //*/
=======
        $res= app($index_page)->getTableColumns();

        return $res;
    }
//*/
>>>>>>> c4ec0fb6 (.)
    public function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make(),
            //Tables\Actions\DeleteAction::make(),
            Tables\Actions\DetachAction::make(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            //Tables\Actions\DeleteBulkAction::make(),
            Tables\Actions\DetachBulkAction::make(),
        ];
    }

    public function getTableHeaderActions(): array
    {
<<<<<<< HEAD
        $actions = [];
        $resource = static::class;
        // @phpstan-ignore function.alreadyNarrowedType
        if (method_exists($resource, 'canAttach')) {
            $actions['attach'] = Tables\Actions\AttachAction::make()
                ->icon('heroicon-o-link')
                ->iconButton()
                ->tooltip(__('user::actions.attach.label'))
                ->visible(fn(null|Model $_record): bool => $resource::canAttach());
        }
        // @phpstan-ignore function.alreadyNarrowedType
        if (method_exists($resource, 'canCreate')) {
            $actions['create'] = Tables\Actions\CreateAction::make()
                ->icon('heroicon-o-plus')
                ->iconButton()
                ->tooltip(static::trans('actions.create.tooltip'))
                ->visible(fn(null|Model $_record): bool => $resource::canCreate());
        }
        return $actions;
=======
        return [
            Tables\Actions\AttachAction::make(),
        ];
>>>>>>> c4ec0fb6 (.)
    }

    public function getTableFilters(): array
    {
        return [];
    }

    public function getResource(): string
    {
<<<<<<< HEAD
        // @phpstan-ignore property.staticAccess
        $resource = static::$resource;
=======
        $resource = static::$resourceClass;
>>>>>>> c4ec0fb6 (.)
        Assert::classExists($resource);
        Assert::isAOf($resource, XotBaseResource::class);

        return $resource;
    }

<<<<<<< HEAD
    //public function getRelationship(): \Illuminate\Database\Eloquent\Relations\Relation|\Illuminate\Database\Eloquent\Builder
    //{
    //    return parent::getRelationship();
    //}
=======
    public function getRelationship(): \Illuminate\Database\Eloquent\Relations\Relation|\Illuminate\Database\Eloquent\Builder
    {
        return parent::getRelationship();
    }
>>>>>>> c4ec0fb6 (.)
}
