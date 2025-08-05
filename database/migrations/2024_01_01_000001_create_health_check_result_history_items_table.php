<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Models\HealthCheckResultHistoryItem;

return new class extends XotBaseMigration {
    protected ?string $model_class = HealthCheckResultHistoryItem::class;

    /**
<<<<<<< HEAD
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
=======
     * Undocumented function.
     *
     * @return void
     */
    public function up()
>>>>>>> aea6513 (.)
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table): void {
                $table->id();

                $table->string('check_name');
                $table->string('check_label');
                $table->string('status');
                $table->text('notification_message')->nullable();
                $table->string('short_summary')->nullable();
                $table->json('meta');
                $table->timestamp('ended_at');
                $table->uuid('batch')->index();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
<<<<<<< HEAD
                $this->updateTimestamps($table, false);
=======
                $this->updateTimestamps(table: $table, hasSoftDeletes: false);
>>>>>>> aea6513 (.)
            }
        );
    }
};
