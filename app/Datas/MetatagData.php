<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

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
use Livewire\Wireable;
use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;
use Webmozart\Assert\Assert;
use Filament\Support\Colors\Color;
use Modules\Xot\Actions\File\AssetAction;
use Modules\Tenant\Services\TenantService;
use Spatie\LaravelData\Concerns\WireableData;

/**
 * Class MetatagData
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
 * 
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> c2dac53 (.)
 * 
 *
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
 * @property string $title
 * @property string $sitename
 * @property string $subtitle
 * @property string|null $generator
 * @property string $charset
 * @property string|null $author
 * @property string|null $description
 * @property string|null $keywords
 * @property string $nome_regione
 * @property string $nome_comune
 * @property string $site_title
 * @property string $logo
 * @property string $logo_square
 * @property string $logo_header
 * @property string $logo_header_dark
 * @property string $logo_height
 * @property string $logo_footer
 * @property string $logo_alt
 * @property string $hide_megamenu
 * @property string $hero_type
 * @property string $facebook_href
 * @property string $twitter_href
 * @property string $youtube_href
 * @property string $fastlink
 * @property string $color_primary
 * @property string $color_title
 * @property string $color_megamenu
 * @property string $color_hamburger
 * @property string $color_banner
 * @property string $favicon
 * @property array<string, array{key?: string, color: string, hex?: string}> $colors
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
=======
>>>>>>> c2dac53 (.)
use Filament\Support\Colors\Color;
use Illuminate\Support\Arr;
use Livewire\Wireable;
use Modules\Tenant\Services\TenantService;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;
use Modules\Xot\Actions\File\AssetAction;

/**
 * Class MetatagData
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======

/**
 * Undocumented class.
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======

/**
 * Undocumented class.
>>>>>>> c2dac53 (.)
 */
class MetatagData extends Data implements Wireable
{
    use WireableData;

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
    /** @var string */
    public string $title = '';

    /** @var string */
    public string $sitename = '';

    /** @var string */
    public string $subtitle = '';

    /** @var string|null */
    public ?string $generator = 'xot';

    /** @var string */
    public string $charset = 'UTF-8';

    /** @var string|null */
    public ?string $author = 'xot';

    /** @var string|null */
    public ?string $description = null;

    /** @var string|null */
    public ?string $keywords = null;

    /** @var string */
    public string $nome_regione = '';

    /** @var string */
    public string $nome_comune = '';

    /** @var string */
    public string $site_title = '';

    /** @var string */
    public string $logo = '';

    /** @var string */
    public string $logo_square = '';

    /** @var string */
    public string $logo_header = '';

    /** @var string */
    public string $logo_header_dark = '';

    /** @var string */
    public string $logo_height = '2em';

    /** @var string */
    public string $logo_footer = '';

    /** @var string */
    public string $logo_alt = '';

    /** @var string */
    public string $hide_megamenu = '';

    /** @var string */
    public string $hero_type = '';

    /** @var string */
    public string $facebook_href = '';

    /** @var string */
    public string $twitter_href = '';

    /** @var string */
    public string $youtube_href = '';

    /** @var string */
    public string $fastlink = '';

    /** @var string */
    public string $color_primary = '';

    /** @var string */
    public string $color_title = '';

    /** @var string */
    public string $color_megamenu = '';

    /** @var string */
    public string $color_hamburger = '';

    /** @var string */
    public string $color_banner = '';

    /** @var string */
    public string $favicon = '/favicon.ico';
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

    /**
     * @var array<string, array{key?: string, color: string, hex?: string}>
     */
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
    
    /**
     * @var array<string, array{key?: string, color: string, hex?: string}>
     */
    public string $title = '';
    public string $sitename = '';
    public string $subtitle = '';
    public ?string $generator = 'xot';
    public string $charset = 'UTF-8';
    public ?string $author = 'xot';
    public ?string $description = null;
    public ?string $keywords = null;
    public string $nome_regione = '';
    public string $nome_comune = '';
    public string $site_title = '';
    public string $logo = '';
    public string $logo_square = '';
    public string $logo_header = '';
    public string $logo_header_dark = '';
    public string $logo_height = '2em';
    public string $logo_footer = '';
    public string $logo_alt = '';
    public string $hide_megamenu = '';
    public string $hero_type = '';
    public string $facebook_href = '';
    public string $twitter_href = '';
    public string $youtube_href = '';
    public string $fastlink = '';
    public string $color_primary = '';
    public string $color_title = '';
    public string $color_megamenu = '';
    public string $color_hamburger = '';
    public string $color_banner = '';
    public string $favicon = '/favicon.ico';
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
=======
>>>>>>> c2dac53 (.)

    /**
     * @var array<string, array{key?: string, color: string, hex?: string}>
     */
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
    public array $colors = [];

    /**
     * Singleton instance.
     */
    private static ?self $instance = null;

    /**
     * Creates or returns the singleton instance.
     *
     * @return self
     *
     * @return self
<<<<<<< HEAD
=======
<<<<<<< HEAD
     *
     * @return self
=======
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
     *
     * @return self
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
     *
     * @return self
>>>>>>> c2dac53 (.)
     */
    public static function make(): self
    {
        if (! self::$instance) {
            /** @var array<string, mixed> $data */
    public string $title;

    public string $sitename;

    public string $subtitle;

    public ?string $generator = 'xot';

    public string $charset = 'UTF-8';

    public ?string $author = 'xot';

    public ?string $description;

    public ?string $keywords;

    public string $nome_regione;

    public string $nome_comune;

    public string $site_title;

    public string $logo;

    public string $logo_square;

    public string $logo_header;

    public string $logo_header_dark;

    public string $logo_height = '2em';

    public string $logo_footer;

    public string $logo_alt;

    public string $hide_megamenu;

    public string $hero_type;

    public string $facebook_href;

    public string $twitter_href;

    public string $youtube_href;

    public string $fastlink;

    public string $color_primary;

    public string $color_title;

    public string $color_megamenu;

    public string $color_hamburger;

    public string $color_banner;

    public string $favicon = '/favicon.ico';

    public array $colors = [];

    private static ?self $instance = null;

    public static function make(): self
    {
        if (! self::$instance) {
            $data = TenantService::getConfig('metatag');
            self::$instance = self::from($data);
        }

        return self::$instance;
    }

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
    /**
     * Get the header logo URL.
     *
     * @return string
     */
    public function getLogoHeader(): string
    {
        try {
            /** @var string $path */
            $path = app(AssetAction::class)->execute($this->logo_header);
            return asset($path);
        } catch (\Throwable $e) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
=======
>>>>>>> c2dac53 (.)
    public function getLogoHeader(): string
    {
        try {
            return asset(app(AssetAction::class)->execute($this->logo_header));
        } catch (\Exception $e) {
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
            return asset($this->logo_header);
        }
    }

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
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
    /**
     * Get the dark header logo URL.
     *
     * @return string
     */
    public function getLogoHeaderDark(): string
    {
        try {
            /** @var string $path */
            $path = app(AssetAction::class)->execute($this->logo_header_dark);
            return asset($path);
        } catch (\Throwable $e) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
=======
>>>>>>> c2dac53 (.)
    public function getLogoHeaderDark(): string
    {
        try {
            return asset(app(AssetAction::class)->execute($this->logo_header_dark));
        } catch (\Exception $e) {
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
            return asset($this->logo_header_dark);
        }
    }

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
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
    /**
     * Get the logo height.
     *
     * @return string
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
=======
=======
>>>>>>> c2dac53 (.)
    public function getLogoHeader(): string
    {
        return asset(app(\Modules\Xot\Actions\File\AssetAction::class)->execute($this->logo_header));
    }

    public function getLogoHeaderDark(): string
    {
        return asset(app(\Modules\Xot\Actions\File\AssetAction::class)->execute($this->logo_header_dark));
    }

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
    public function getLogoHeight(): string
    {
        return $this->logo_height;
    }

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
    /**
     * Get the favicon URL.
     *
     * @return string
     */
    public function getFavicon(): string
    {
        try {
            /** @var string $path */
            $path = app(AssetAction::class)->execute($this->favicon);
            return $path;
        } catch (\Throwable $e) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
=======
>>>>>>> c2dac53 (.)
    public function getFavicon(): string
    {
        try {
            return app(AssetAction::class)->execute($this->favicon);
        } catch (\Exception $e) {
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
            return asset($this->favicon);
        }
    }

    /**
     * Get the default Filament colors configuration.
     *
     * @return array<string, array<int, string>>
     * Get the default Filament colors configuration.
     *
     * @return array<string, array<int, string>>
<<<<<<< HEAD
=======
<<<<<<< HEAD
     * Get the default Filament colors configuration.
     *
     * @return array<string, array<int, string>>
=======
     * @return array<string, string>
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
=======
     * @return array<string, string>
>>>>>>> c2dac53 (.)
    public function getFavicon(): string
    {
        return app(\Modules\Xot\Actions\File\AssetAction::class)->execute($this->favicon);
    }

    /**
     * @return array<array<string>|string>
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
     */
    public function getFilamentColors(): array
    {
        return [
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
            'danger' => Color::Red,
            'gray' => Color::Zinc,
            'info' => Color::Blue,
            'primary' => Color::Amber,
            'success' => Color::Green,
            'warning' => Color::Amber,
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
=======
>>>>>>> c2dac53 (.)
            'danger' => 'danger',
            'gray' => 'gray',
            'info' => 'info',
            'primary' => 'primary',
            'success' => 'success',
            'warning' => 'warning',
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
        ];
    }

    /**
     * Get the colors array with proper type handling.
     *
     * @return array<string, array<int, string>>
<<<<<<< HEAD
<<<<<<< HEAD
     */
    public function getColors(): array
    {
        if (empty($this->colors)) {
            return $this->getFilamentColors();
        }

        /** @var array<string, array<int, string>> $mapped */
        $mapped = Arr::mapWithKeys(
            $this->colors,
            function (array $item, string|int $key): array {
                $keyStr = isset($item['key'])
                    ? $item['key']
                    : (string) $key;

                /** @var array<int, string> $value */
                $value = match (true) {
                    $item['color'] === 'custom' && isset($item['hex'])
                        => Color::hex($item['hex']),
                    isset(Color::all()[$item['color']])
                        => Color::all()[$item['color']],
                    default => Color::Gray,
                };

                return [$keyStr => $value];
            }
        );

        return $mapped;
    }

    /**
=======
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
<<<<<<< HEAD
     * Get the colors array with proper type handling.
     *
     * @return array<string, array<int, string>>
=======
<<<<<<< HEAD
<<<<<<< HEAD
     * Get the colors array with proper type handling.
     *
     * @return array<string, array<int, string>>
=======
>>>>>>> e5c56c3 (.)
=======
=======
=======
     * Get the colors array with proper type handling.
     *
     * @return array<string, array<int, string>>
>>>>>>> c2dac53 (.)
     */
    public function getColors(): array
    {
        if (empty($this->colors)) {
            return $this->getFilamentColors();
        }

        /** @var array<string, array<int, string>> $mapped */
        $mapped = Arr::mapWithKeys(
            $this->colors,
            function (array $item, string|int $key): array {
                $keyStr = isset($item['key'])
                    ? $item['key']
                    : (string) $key;

                /** @var array<int, string> $value */
                $value = match (true) {
                    $item['color'] === 'custom' && isset($item['hex'])
                        => Color::hex($item['hex']),
                    isset(Color::all()[$item['color']])
                        => Color::all()[$item['color']],
                    default => Color::Gray,
                };

                return [$keyStr => $value];
            }
        );

        return $mapped;
    }

    /**
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
     * @return array<string, string>
     */
    public function getAllColors(): array
    {
        $colors = array_keys(Color::all());
        return array_combine($colors, $colors);
    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)

    /**
     * @return array<string, string>
     */
    public function getColors(): array
    {
        if (empty($this->colors)) {
            return $this->getFilamentColors();    
        }

        /** @var array<string, array<int, string>> $mapped */
        $mapped = Arr::mapWithKeys(
            $this->colors,
            function (array $item, string|int $key): array {
                $keyStr = isset($item['key']) 
                    ? $item['key'] 
                    : (string) $key;

                /** @var array<int, string> $value */
                $value = match (true) {
                    $item['color'] === 'custom' && isset($item['hex']) 
                        => Color::hex($item['hex']),
                    isset(Color::all()[$item['color']]) 
                        => Color::all()[$item['color']],
                    default => Color::Gray,
            return $this->getFilamentColors();
        }

        /** @var array<string, string> $mapped */
        $mapped = Arr::mapWithKeys(
            $this->colors,
            function (mixed $item, mixed $key): array {
                if (! is_array($item)) {
                    return [is_string($key) ? $key : (string) $key => ''];
                }

                $keyStr = is_string($item['key'] ?? null) 
                    ? $item['key'] 
                    : (is_string($key) ? $key : (string) $key);
                $colorValue = is_string($item['color'] ?? null) ? $item['color'] : '';

                $value = match (true) {
                    'custom' === $colorValue && is_string($item['hex'] ?? null) => Color::hex($item['hex']),
                    'custom' !== $colorValue => Arr::get(Color::all(), $colorValue, ''),
                    default => '',
                };

                return [$keyStr => $value];
            }
        );
        
        

        return $mapped;
    }
<<<<<<< HEAD
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
}
