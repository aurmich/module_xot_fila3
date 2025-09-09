<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Xot\Tests\Feature\Filament;

use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Tests\TestCase;
use Filament\Resources\Resource;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->resource = new class extends XotBaseResource {
        protected static ?string $model = null;
        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
        protected static ?string $navigationGroup = 'Test Group';
=======
namespace Modules\Xot\Tests\Feature\Filament\XotBaseResourceTest;

=======
>>>>>>> edc8a701 (.)
namespace Modules\Xot\Tests\Feature\Filament;

use Filament\Resources\Resource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->resource = new class extends XotBaseResource
    {
        protected static ?string $model = null;

        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        protected static ?string $navigationGroup = 'Test Group';

>>>>>>> c4ec0fb6 (.)
        protected static ?int $navigationSort = 1;
    };
});

test('xot base resource extends filament resource', function () {
    expect($this->resource)->toBeInstanceOf(Resource::class);
});

test('xot base resource has navigation icon', function () {
    expect($this->resource::getNavigationIcon())->toBe('heroicon-o-rectangle-stack');
});

test('xot base resource has navigation group', function () {
    expect($this->resource::getNavigationGroup())->toBe('Test Group');
});

test('xot base resource has navigation sort', function () {
    expect($this->resource::getNavigationSort())->toBe(1);
});

test('xot base resource can be instantiated', function () {
    expect($this->resource)->toBeInstanceOf(XotBaseResource::class);
});
