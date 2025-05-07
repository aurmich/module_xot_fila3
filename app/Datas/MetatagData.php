<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

<<<<<<< HEAD
=======
<<<<<<< HEAD
use Filament\Support\Colors\Color;
use Illuminate\Support\Arr;
use Livewire\Wireable;
use Modules\Tenant\Services\TenantService;
use Modules\Xot\Actions\File\AssetAction;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;
use Webmozart\Assert\Assert;

/**
 * Class MetatagData
 * 
 * Gestisce i meta tag per SEO e social media.
 * Implementa l'interfaccia Wireable per la serializzazione Livewire.
=======
>>>>>>> 3268b83 (.)
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
 *
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
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
 */
class MetatagData extends Data implements Wireable
{
    use WireableData;

<<<<<<< HEAD
=======
<<<<<<< HEAD
    /** @var string Titolo della pagina */
    public string $title = '';

    /** @var string Nome del sito */
    public string $sitename = '';

    /** @var string Sottotitolo della pagina */
    public string $subtitle = '';

    /** @var string|null Generatore del contenuto */
    public ?string $generator = 'xot';

    /** @var string Charset della pagina */
    public string $charset = 'UTF-8';

    /** @var string|null Autore del contenuto */
    public ?string $author = 'xot';

    /** @var string|null Descrizione della pagina */
    public ?string $description = null;

    /** @var string|null Keywords della pagina */
    public ?string $keywords = null;

    /** @var string Nome della regione */
    public string $nome_regione = '';

    /** @var string Nome del comune */
    public string $nome_comune = '';

    /** @var string Titolo del sito */
    public string $site_title = '';

    /** @var string Percorso del logo principale */
    public string $logo = '';

    /** @var string Percorso del logo quadrato */
    public string $logo_square = '';

    /** @var string Percorso del logo dell'header */
    public string $logo_header = '';

    /** @var string Percorso del logo dell'header per modalità scura */
    public string $logo_header_dark = '';

    /** @var string Altezza del logo */
    public string $logo_height = '2em';

    /** @var string Percorso del logo del footer */
    public string $logo_footer = '';

    /** @var string Testo alternativo del logo */
    public string $logo_alt = '';

    /** @var string Flag per nascondere il megamenu */
    public string $hide_megamenu = '';

    /** @var string Tipo di hero section */
    public string $hero_type = '';

    /** @var string URL Facebook */
    public string $facebook_href = '';

    /** @var string URL Twitter */
    public string $twitter_href = '';

    /** @var string URL YouTube */
    public string $youtube_href = '';

    /** @var string Link rapido */
    public string $fastlink = '';

    /** @var string Colore primario */
    public string $color_primary = '';

    /** @var string Colore del titolo */
    public string $color_title = '';

    /** @var string Colore del megamenu */
    public string $color_megamenu = '';

    /** @var string Colore dell'hamburger menu */
    public string $color_hamburger = '';

    /** @var string Colore del banner */
    public string $color_banner = '';

    /** @var string Percorso del favicon */
=======
>>>>>>> 3268b83 (.)
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
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    public string $favicon = '/favicon.ico';

    /**
     * @var array<string, array{key?: string, color: string, hex?: string}>
     */
    public array $colors = [];

    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
     * Crea una nuova istanza di MetatagData.
=======
>>>>>>> 3268b83 (.)
     * Singleton instance.
     */
    private static ?self $instance = null;

    /**
     * Creates or returns the singleton instance.
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
     *
     * @return self
     */
    public static function make(): self
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
        return self::from([]);
    }

    /**
     * Restituisce il percorso del logo dell'header.
     * Se non specificato, utilizza il logo principale.
=======
>>>>>>> 3268b83 (.)
        if (! self::$instance) {
            /** @var array<string, mixed> $data */
            $data = TenantService::getConfig('metatag');
            self::$instance = self::from($data);
        }

        return self::$instance;
    }

    /**
<<<<<<< HEAD
     * Get the brand name.
     * This method reflects the semantic purpose of getting the brand name,
     * which is the title of the page.
     *
     * @return string
     */
    public function getBrandName(): string
    {
        return $this->title;
    }

    /**
     * Get the brand logo.
     * This method reflects the semantic purpose of getting the brand logo,
     * rather than exposing implementation details about where the logo is used.
     *
     * @return string
     */
    public function getBrandLogo(): string
    {
=======
     * Get the header logo URL.
>>>>>>> origin/dev
     *
     * @return string
     */
    public function getLogoHeader(): string
    {
<<<<<<< HEAD
        if ('' === $this->logo_header) {
            return $this->logo;
        }

        return app(AssetAction::class)->execute($this->logo_header);
    }

    /**
     * Restituisce il percorso del logo dell'header per modalità scura.
     * Se non specificato, utilizza il logo principale.
=======
>>>>>>> 3268b83 (.)
        try {
            /** @var string $path */
            $path = app(AssetAction::class)->execute($this->logo_header);
            return asset($path);
        } catch (\Throwable $e) {
            return asset($this->logo_header);
        }
    }

    /**
<<<<<<< HEAD
     * Get the dark mode brand logo.
     * This method reflects the semantic purpose of getting the dark mode brand logo.
     *
     * @return string
     */
    public function getDarkModeBrandLogo(): string
    {
=======
     * Get the dark header logo URL.
>>>>>>> origin/dev
     *
     * @return string
     */
    public function getLogoHeaderDark(): string
    {
<<<<<<< HEAD
        if ('' === $this->logo_header_dark) {
            return $this->logo;
        }

        return app(AssetAction::class)->execute($this->logo_header_dark);
    }

    /**
     * Restituisce il percorso del favicon.
     * Se non specificato, utilizza il favicon di default.
     *
     * @return string
     */
    public function getFavicon(): string
    {
        if ('' === $this->favicon) {
            return '/favicon.ico';
        }

        return app(AssetAction::class)->execute($this->favicon);
    }

    /**
     * Restituisce i colori formattati per Filament.
     *
     * @return array<string, array{50: string, 100: string, 200: string, 300: string, 400: string, 500: string, 600: string, 700: string, 800: string, 900: string, 950: string}>
     */
    public function getFilamentColors(): array
    {
        $colors = [];
        foreach ($this->colors as $name => $data) {
            $key = $data['key'] ?? $name;
            $hex = $data['hex'] ?? $data['color'];
            
            Assert::string($key);
            Assert::string($hex);
            
            $colors[$key] = Color::hex($hex);
        }

        return $colors;
    }

    /**
     * Restituisce tutti i colori in formato chiave-valore.
     *
     * @return array<string, string>
     */
    public function getAllColors(): array
    {
        $colors = [];
        foreach ($this->colors as $name => $data) {
            $colors[$name] = $data['color'];
        }

        return $colors;
    }

    /**
     * Restituisce l'altezza del logo.
=======
>>>>>>> 3268b83 (.)
        try {
            /** @var string $path */
            $path = app(AssetAction::class)->execute($this->logo_header_dark);
            return asset($path);
        } catch (\Throwable $e) {
            return asset($this->logo_header_dark);
        }
    }

    /**
<<<<<<< HEAD
     * Get the brand logo height.
     * This method reflects the semantic purpose of getting the brand logo height.
     *
     * @return string
     */
    public function getBrandLogoHeight(): string
=======
     * Get the logo height.
>>>>>>> origin/dev
     *
     * @return string
     */
    public function getLogoHeight(): string
>>>>>>> 3268b83 (.)
    {
        return $this->logo_height;
    }

    /**
<<<<<<< HEAD
     * Get the theme colors.
     * This method reflects the semantic purpose of getting theme colors,
     * rather than exposing the raw color data structure.
     *
     * @return array<string, string>
     */
    public function getThemeColors(): array
    {
        $defaults = $this->getFilamentColors();
        $custom = [];
        foreach ($this->colors as $key => $value) {
            if (Arr::has($value, 'color')) {
                $custom[$key] = (string) $value['color'];
            }
        }
        return array_merge($defaults, $custom);
    }

    /**
     * Get the theme settings.
     * This method reflects the semantic purpose of getting theme settings.
     *
     * @return array<string, string>
     */
    public function getThemeSettings(): array
    {
        return [
            'color_primary' => $this->color_primary,
            'color_title' => $this->color_title,
            'color_megamenu' => $this->color_megamenu,
            'color_hamburger' => $this->color_hamburger,
            'color_banner' => $this->color_banner,
        ];
    }

    /**
     * Get the brand description.
     * This method reflects the semantic purpose of getting the brand description.
     *
     * @return string|null
     */
    public function getBrandDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Get the brand social links.
     * This method reflects the semantic purpose of getting social media links.
     *
     * @return array<string, string>
     */
    public function getBrandSocialLinks(): array
    {
        return [
            'facebook' => $this->facebook_href,
            'twitter' => $this->twitter_href,
            'youtube' => $this->youtube_href,
        ];
    }

    /**
     * Get the brand dimensions.
     * This method reflects the semantic purpose of getting brand-related dimensions.
     *
     * @return array<string, string>
     */
    public function getBrandDimensions(): array
    {
        return [
            'logo_height' => $this->logo_height,
        ];
    }

    /**
     * Get the brand settings.
     * This method reflects the semantic purpose of getting brand-related settings.
     *
     * @return array<string, string>
     */
    public function getBrandSettings(): array
    {
        return [
            'fastlink' => $this->fastlink,
            'hide_megamenu' => $this->hide_megamenu,
            'hero_type' => $this->hero_type,
        ];
    }

    /**
=======
<<<<<<< HEAD
     * Restituisce l'array raw dei colori.
     *
     * @return array<string, array{key?: string, color: string, hex?: string}>
     */
    public function getColors(): array
    {
        return $this->colors;
    }

    /**
     * Restituisce il nome del brand (titolo della pagina).
     *
     * @return string
     */
    public function getBrandName(): string
    {
        return $this->title;
=======
>>>>>>> 3268b83 (.)
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
            return asset($this->favicon);
        }
    }

    /**
<<<<<<< HEAD
     * @deprecated Use getThemeColors() instead as it better reflects the semantic purpose
     */
    public function getColors(): array
    {
        return $this->getThemeColors();
    }

    /**
=======
>>>>>>> 3268b83 (.)
     * Get the default Filament colors configuration.
     *
     * @return array<string, array<int, string>>
     */
    public function getFilamentColors(): array
    {
        return [
            'danger' => Color::Red,
            'gray' => Color::Zinc,
            'info' => Color::Blue,
            'primary' => Color::Amber,
            'success' => Color::Green,
            'warning' => Color::Amber,
        ];
    }

    /**
     * Get the colors array with proper type handling.
     *
     * @return array<string, array<int, string>>
     */
<<<<<<< HEAD
    public function getAllColors(): array
    {
        return array_merge($this->getFilamentColors(), $this->colors);
    }

    /**
     * Get the icons array.
=======
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
     * @return array<string, string>
     */
    public function getAllColors(): array
    {
        $colors = array_keys(Color::all());
        return array_combine($colors, $colors);
    }

    /**
     * Get the icons configuration.
>>>>>>> 3268b83 (.)
     *
     * @return array<string, string>
     */
    public function getIcons(): array
    {
<<<<<<< HEAD
        return [
            'logo' => $this->logo,
            'logo_square' => $this->logo_square,
            'logo_header' => $this->logo_header,
            'logo_header_dark' => $this->logo_header_dark,
            'logo_footer' => $this->logo_footer,
            'favicon' => $this->favicon,
        ];
    }

    /**
     * Get the alignment array.
=======
        $config = TenantService::getConfig('metatag');
        /** @var array<string, string> $icons */
        $icons = Arr::get($config, 'icons', []);
        return $icons;
    }

    /**
     * Get the dimensions configuration.
     *
     * @return array<string, int|string>
     */
    public function getDimensions(): array
    {
        $config = TenantService::getConfig('metatag');
        /** @var array<string, int|string> $dimensions */
        $dimensions = Arr::get($config, 'dimensions', []);
        return $dimensions;
    }

    /**
     * Get the alignment configuration.
>>>>>>> 3268b83 (.)
     *
     * @return array<string, string>
     */
    public function getAlignment(): array
    {
<<<<<<< HEAD
        return [
            'hide_megamenu' => $this->hide_megamenu,
            'hero_type' => $this->hero_type,
        ];
    }

    /**
     * Get the settings array.
     *
     * @return array<string, string>
     */
    public function getSettings(): array
    {
        return $this->getBrandSettings();
    }

    /**
     * Get the meta values array.
     *
     * @return array<string, string|null>
     */
    public function getMetaValues(): array
    {
        return [
            'title' => $this->title,
            'sitename' => $this->sitename,
            'subtitle' => $this->subtitle,
            'generator' => $this->generator,
            'charset' => $this->charset,
            'author' => $this->author,
            'description' => $this->description,
            'keywords' => $this->keywords,
            'nome_regione' => $this->nome_regione,
            'nome_comune' => $this->nome_comune,
            'site_title' => $this->site_title,
        ];
    }

    /**
     * Get the social cards array.
     *
     * @return array<string, string>
     */
    public function getSocialCards(): array
    {
        return $this->getBrandSocialLinks();
    }

    /**
     * Get the OpenGraph array.
     *
     * @return array<string, string|null>
=======
        $config = TenantService::getConfig('metatag');
        /** @var array<string, string> $alignment */
        $alignment = Arr::get($config, 'alignment', []);
        return $alignment;
    }

    /**
     * Get the settings configuration.
     *
     * @return array<string, mixed>
     */
    public function getSettings(): array
    {
        $config = TenantService::getConfig('metatag');
        /** @var array<string, mixed> $settings */
        $settings = Arr::get($config, 'settings', []);
        return $settings;
    }

    /**
     * Get the meta values configuration.
     *
     * @return array<string, string>
     */
    public function getMetaValues(): array
    {
        $result = [
            'title' => $this->title,
            'description' => $this->description ?? '',
            'keywords' => $this->keywords ?? '',
            'author' => $this->author ?? '',
            'generator' => $this->generator ?? '',
        ];

        return array_filter($result);
    }

    /**
     * Get the social cards configuration.
     *
     * @return array<string, mixed>
     */
    public function getSocialCards(): array
    {
        $config = TenantService::getConfig('metatag');
        /** @var array<string, mixed> $socialCards */
        $socialCards = Arr::get($config, 'social_cards', []);
        return $socialCards;
    }

    /**
     * Get the OpenGraph data.
     *
     * @return array<string, string>
>>>>>>> 3268b83 (.)
     */
    public function getOpenGraph(): array
    {
        return [
            'title' => $this->title,
<<<<<<< HEAD
            'description' => $this->description,
            'type' => 'website',
            'url' => url()->current(),
=======
            'description' => $this->description ?? '',
>>>>>>> 3268b83 (.)
            'site_name' => $this->sitename,
        ];
    }

    /**
<<<<<<< HEAD
     * Get the Twitter Cards array.
     *
     * @return array<string, string|null>
=======
     * Get the Twitter Card data.
     *
     * @return array<string, string>
>>>>>>> 3268b83 (.)
     */
    public function getTwitterCards(): array
    {
        return [
<<<<<<< HEAD
            'card' => 'summary_large_image',
            'title' => $this->title,
            'description' => $this->description,
            'site' => $this->twitter_href,
        ];
    }

    /**
     * @deprecated Use getBrandName() instead as it better reflects the semantic purpose
     */
    public function getTitle(): string
    {
        return $this->getBrandName();
    }

    /**
     * @deprecated Use getBrandLogo() instead as it better reflects the semantic purpose
     */
    public function getLogoHeader(): string
    {
        return $this->getBrandLogo();
    }

    /**
     * @deprecated Use getDarkModeBrandLogo() instead as it better reflects the semantic purpose
     */
    public function getLogoHeaderDark(): string
    {
        return $this->getDarkModeBrandLogo();
    }

    /**
     * @deprecated Use getBrandLogoHeight() instead as it better reflects the semantic purpose
     */
    public function getLogoHeight(): string
    {
        return $this->getBrandLogoHeight();
=======
            'title' => $this->title,
            'description' => $this->description ?? '',
            'site' => $this->twitter_href,
        ];
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    }
}
