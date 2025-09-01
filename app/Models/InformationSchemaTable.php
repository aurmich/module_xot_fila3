<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use InvalidArgumentException;
=======
>>>>>>> 89d0c8f4 (.)
use Sushi\Sushi;
use Webmozart\Assert\Assert;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a table in the INFORMATION_SCHEMA.TABLES.
<<<<<<< HEAD
 *
=======
use Sushi\Sushi;
use Webmozart\Assert\Assert;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a table in the INFORMATION_SCHEMA.TABLES.
 * 
>>>>>>> e697a77b (.)
=======
 * 
>>>>>>> 89d0c8f4 (.)
 * Provides metadata and statistics about database tables.
 *
 * @property string|null $TABLE_CATALOG
 * @property string|null $TABLE_SCHEMA
 * @property string|null $TABLE_NAME
 * @property string|null $TABLE_TYPE
 * @property string|null $ENGINE
 * @property int|null $VERSION
 * @property string|null $ROW_FORMAT
 * @property int|null $TABLE_ROWS
 * @property int|null $AVG_ROW_LENGTH
 * @property int|null $DATA_LENGTH
 * @property int|null $MAX_DATA_LENGTH
 * @property int|null $INDEX_LENGTH
 * @property int|null $DATA_FREE
 * @property int|null $AUTO_INCREMENT
 * @property \Illuminate\Support\Carbon|null $CREATE_TIME
 * @property \Illuminate\Support\Carbon|null $UPDATE_TIME
 * @property \Illuminate\Support\Carbon|null $CHECK_TIME
 * @property string|null $TABLE_COLLATION
 * @property int|null $CHECKSUM
 * @property string|null $CREATE_OPTIONS
 * @property string|null $TABLE_COMMENT
 * @property int $id
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereAUTOINCREMENT($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereAVGROWLENGTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereCHECKSUM($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereCHECKTIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereCREATEOPTIONS($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereCREATETIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereDATAFREE($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereDATALENGTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereENGINE($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereINDEXLENGTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereMAXDATALENGTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereROWFORMAT($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereTABLECATALOG($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereTABLECOLLATION($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereTABLECOMMENT($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereTABLENAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereTABLEROWS($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereTABLESCHEMA($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereTABLETYPE($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereUPDATETIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereVERSION($value)
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
 * @mixin \Eloquent
 */
class InformationSchemaTable extends Model
{
    use Sushi;

    /**
     * The connection name for the model.
     */
    protected $connection = 'information_schema';

    /**
     * The table associated with the model.
     */
    protected $table = 'tables';

    /**
     * Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'table_schema',
        'table_name',
        'engine',
        'version',
        'row_format',
        'table_rows',
        'avg_row_length',
        'data_length',
        'max_data_length',
        'index_length',
        'data_free',
        'create_time',
        'update_time',
        'check_time',
        'table_collation',
        'checksum',
        'create_options',
        'table_comment',
    ];

    /**
     * The schema for the Sushi model.
     *
     * @var array<string, string>
     */
    protected $schema = [
        'id' => 'integer',
        'TABLE_CATALOG' => 'string',
        'TABLE_SCHEMA' => 'string',
        'TABLE_NAME' => 'string',
        'TABLE_TYPE' => 'string',
        'ENGINE' => 'string',
        'VERSION' => 'integer',
        'ROW_FORMAT' => 'string',
        'TABLE_ROWS' => 'integer',
        'AVG_ROW_LENGTH' => 'integer',
        'DATA_LENGTH' => 'integer',
        'MAX_DATA_LENGTH' => 'integer',
        'INDEX_LENGTH' => 'integer',
        'DATA_FREE' => 'integer',
        'AUTO_INCREMENT' => 'integer',
        'CREATE_TIME' => 'datetime',
        'UPDATE_TIME' => 'datetime',
        'CHECK_TIME' => 'datetime',
        'TABLE_COLLATION' => 'string',
        'CHECKSUM' => 'integer',
        'CREATE_OPTIONS' => 'string',
        'TABLE_COMMENT' => 'string',
    ];

<<<<<<< HEAD
<<<<<<< HEAD
=======
    
>>>>>>> e697a77b (.)
=======
    
>>>>>>> 89d0c8f4 (.)
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'TABLE_ROWS' => 'integer',
            'AVG_ROW_LENGTH' => 'integer',
            'DATA_LENGTH' => 'integer',
            'MAX_DATA_LENGTH' => 'integer',
            'INDEX_LENGTH' => 'integer',
            'DATA_FREE' => 'integer',
            'AUTO_INCREMENT' => 'integer',
            'CHECKSUM' => 'integer',
            'CREATE_TIME' => 'datetime',
            'UPDATE_TIME' => 'datetime',
            'CHECK_TIME' => 'datetime',
            'VERSION' => 'integer',
        ]);
    }

    /**
     * Get the rows array for the Sushi model.
     * This method is required by Sushi to provide the data.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getRows(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $query = 'SELECT 
=======
        $query = "SELECT 
>>>>>>> e697a77b (.)
=======
        $query = "SELECT 
>>>>>>> 89d0c8f4 (.)
            TABLE_CATALOG,
            TABLE_SCHEMA,
            TABLE_NAME,
            TABLE_TYPE,
            ENGINE,
            VERSION,
            ROW_FORMAT,
            TABLE_ROWS,
            AVG_ROW_LENGTH,
            DATA_LENGTH,
            MAX_DATA_LENGTH,
            INDEX_LENGTH,
            DATA_FREE,
            AUTO_INCREMENT,
            CREATE_TIME,
            UPDATE_TIME,
            CHECK_TIME,
            TABLE_COLLATION,
            CHECKSUM,
            CREATE_OPTIONS,
            TABLE_COMMENT
        FROM information_schema.TABLES
<<<<<<< HEAD
<<<<<<< HEAD
        WHERE TABLE_SCHEMA = ?';
=======
        WHERE TABLE_SCHEMA = ?";
>>>>>>> e697a77b (.)
=======
        WHERE TABLE_SCHEMA = ?";
>>>>>>> 89d0c8f4 (.)

        $results = collect(DB::select($query, [DB::connection()->getDatabaseName()]))
            ->map(function ($row, $index) {
                $data = (array) $row;
                $data['id'] = $index + 1; // Aggiungi un ID incrementale
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
                return $data;
            })
            ->toArray();

        /** @var array<int, array<string, mixed>> */
        return $results;
    }

    /**
     * Get table statistics from Sushi or information_schema as fallback.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $schema  The schema name
     * @param  string  $table  The table name
=======
     * @param string $schema The schema name
     * @param string $table The table name
>>>>>>> e697a77b (.)
=======
     * @param string $schema The schema name
     * @param string $table The table name
>>>>>>> 89d0c8f4 (.)
     */
    public static function getTableStats(string $schema, string $table): ?self
    {
        $result = DB::connection('mysql')
            ->table('information_schema.TABLES')
            ->select([
                'TABLE_CATALOG',
                'TABLE_SCHEMA',
                'TABLE_NAME',
                'TABLE_TYPE',
                'ENGINE',
                'VERSION',
                'ROW_FORMAT',
                'TABLE_ROWS',
                'AVG_ROW_LENGTH',
                'DATA_LENGTH',
                'MAX_DATA_LENGTH',
                'INDEX_LENGTH',
                'DATA_FREE',
                'AUTO_INCREMENT',
                'CREATE_TIME',
                'UPDATE_TIME',
                'CHECK_TIME',
                'TABLE_COLLATION',
                'CHECKSUM',
                'CREATE_OPTIONS',
<<<<<<< HEAD
<<<<<<< HEAD
                'TABLE_COMMENT',
=======
                'TABLE_COMMENT'
>>>>>>> e697a77b (.)
=======
                'TABLE_COMMENT'
>>>>>>> 89d0c8f4 (.)
            ])
            ->where('TABLE_SCHEMA', '=', $schema)
            ->where('TABLE_NAME', '=', $table)
            ->first();

<<<<<<< HEAD
<<<<<<< HEAD
        if (! $result) {
=======
        if (!$result) {
>>>>>>> e697a77b (.)
=======
        if (!$result) {
>>>>>>> 89d0c8f4 (.)
            return null;
        }

        // Creiamo una nuova istanza e popoliamola manualmente
<<<<<<< HEAD
<<<<<<< HEAD
        $instance = new self;
        foreach ((array) $result as $key => $value) {
            $instance->setAttribute($key, $value);
        }

=======
        $instance = new self();
        foreach ((array) $result as $key => $value) {
            $instance->setAttribute($key, $value);
        }
>>>>>>> e697a77b (.)
=======
        $instance = new self();
        foreach ((array) $result as $key => $value) {
            $instance->setAttribute($key, $value);
        }
>>>>>>> 89d0c8f4 (.)
        return $instance;
    }

    /**
     * Get the row count for a model class.
     * This method incorporates the logic from CountAction.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string<Model>  $modelClass  The fully qualified model class name
=======
     * @param class-string<Model> $modelClass The fully qualified model class name
>>>>>>> e697a77b (.)
=======
     * @param class-string<Model> $modelClass The fully qualified model class name
>>>>>>> 89d0c8f4 (.)
     *
     * @throws InvalidArgumentException If model class is invalid or not found
     */
    public static function getModelCount(string $modelClass): int
    {
        if (! class_exists($modelClass)) {
            throw new InvalidArgumentException("Model class [$modelClass] does not exist");
        }

        /** @var Model $model */
        $model = app($modelClass);

        if (! $model instanceof Model) {
            throw new InvalidArgumentException("Class [$modelClass] must be an instance of ".Model::class);
        }

        $connection = $model->getConnection();
        $database = $connection->getDatabaseName();
        $driver = $connection->getDriverName();
        $table = $model->getTable();

        // Handle in-memory database
<<<<<<< HEAD
<<<<<<< HEAD
        if ($database === ':memory:') {
=======
        if (':memory:' === $database) {
>>>>>>> e697a77b (.)
=======
        if (':memory:' === $database) {
>>>>>>> 89d0c8f4 (.)
            return (int) $model->count();
        }

        // Handle SQLite specifically
<<<<<<< HEAD
<<<<<<< HEAD
        if ($driver === 'sqlite') {
=======
        if ('sqlite' === $driver) {
>>>>>>> e697a77b (.)
=======
        if ('sqlite' === $driver) {
>>>>>>> 89d0c8f4 (.)
            return (int) $model->count();
        }

        return static::getAccurateRowCount($table, $database);
    }

    /**
     * Get accurate row count for a table.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $tableName  The name of the table
     * @param  string  $database  The database name
=======
     * @param string $tableName The name of the table
     * @param string $database The database name
>>>>>>> e697a77b (.)
=======
     * @param string $tableName The name of the table
     * @param string $database The database name
>>>>>>> 89d0c8f4 (.)
     */
    public static function getAccurateRowCount(string $tableName, string $database): int
    {
        $stats = static::getTableStats($database, $tableName);
        if ($stats === null) {
            return 0;
        }

        $rows = $stats->getAttribute('TABLE_ROWS');
        if ($rows === null) {
            return 0;
        }
        Assert::numeric($rows);
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
        return (int) $rows;
    }

    /**
     * Get table size in bytes.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $tableName  The name of the table
     * @param  string  $database  The database name
=======
     * @param string $tableName The name of the table
     * @param string $database The database name
>>>>>>> e697a77b (.)
=======
     * @param string $tableName The name of the table
     * @param string $database The database name
>>>>>>> 89d0c8f4 (.)
     */
    public static function getTableSize(string $tableName, string $database): int
    {
        $stats = static::getTableStats($database, $tableName);
        if ($stats === null) {
            return 0;
        }

        $dataLength = $stats->getAttribute('DATA_LENGTH');
        $indexLength = $stats->getAttribute('INDEX_LENGTH');

        if ($dataLength === null || $indexLength === null) {
            return 0;
        }

        // Assicuriamo che i valori siano convertiti correttamente in intero
        $dataLengthInt = is_numeric($dataLength) ? (int) $dataLength : 0;
        $indexLengthInt = is_numeric($indexLength) ? (int) $indexLength : 0;
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        return $dataLengthInt + $indexLengthInt;
    }

    /**
     * Refresh the cache for a specific table.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $tableName  The name of the table
     * @param  string  $database  The database name
=======
     * @param string $tableName The name of the table
     * @param string $database The database name
>>>>>>> e697a77b (.)
=======
     * @param string $tableName The name of the table
     * @param string $database The database name
>>>>>>> 89d0c8f4 (.)
     */
    public static function refreshCache(string $tableName, string $database): void
    {
        DB::connection('mysql')
            ->statement("ANALYZE TABLE `{$database}`.`{$tableName}`");
    }
}
