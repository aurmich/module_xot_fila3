<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Actions\Mail\SendMailByRecordAction;
use Illuminate\Database\Eloquent\Model;

it('throws if record has no email', function (): void {
    $record = new class extends Model {
        // no email attribute
        public function option(string $key): ?string { return null; }
        public function myLogs() { return new class {
            public function create(array $data): void {}
        };}
=======
namespace Modules\Xot\Tests\Unit\SendMailByRecordActionTest;
=======
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Mail\SendMailByRecordAction;
>>>>>>> edc8a701 (.)

it('throws if record has no email', function (): void {
    $record = new class extends Model
    {
        // no email attribute
        public function option(string $key): ?string
        {
            return null;
        }

<<<<<<< HEAD
>>>>>>> c4ec0fb6 (.)
=======
        public function myLogs()
        {
            return new class
            {
                public function create(array $data): void {}
            };
        }
>>>>>>> edc8a701 (.)
    };

    expect(fn () => app(SendMailByRecordAction::class)->execute($record, \Illuminate\Mail\Mailable::class))
        ->toThrow(InvalidArgumentException::class);
});
