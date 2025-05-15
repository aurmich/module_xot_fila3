<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Livewire\Wireable;
use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;
use Webmozart\Assert\Assert;
use Filament\Support\Colors\Color;
use Modules\Xot\Actions\File\AssetAction;
use Modules\Tenant\Services\TenantService;
use Spatie\LaravelData\Concerns\WireableData;
<<<<<<< Updated upstream
<<<<<<< HEAD
use Spatie\LaravelData\Attributes\WithTransformer;
use Modules\Xot\Datas\Transformers\AssetTransformer;
=======
>>>>>>> 4241492 (.)
=======
use Spatie\LaravelData\Attributes\WithTransformer;
use Modules\Xot\Datas\Transformers\AssetTransformer;
>>>>>>> Stashed changes

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
 */
class MetatagData extends Data implements Wireable
{
    use WireableData;

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
<<<<<<< Updated upstream
<<<<<<< HEAD
    #[WithTransformer(AssetTransformer::class)]
=======
>>>>>>> 4241492 (.)
=======
    #[WithTransformer(AssetTransformer::class)]
>>>>>>> Stashed changes
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

    /**
     * @var array<string, array{key?: string, color: string, hex?: string}>
     */
    public array $colors = [];

    /**
     * Singleton instance.
     */
    private static ?self $instance = null;

    /**
     * Creates or returns the singleton instance.
     *
     * @return self
     */
    public static function make(): self
    {
        if (! self::$instance) {
            /** @var array<string, mixed> $data */
            $data = TenantService::getConfig('metatag');
            self::$instance = self::from($data);
        }

        return self::$instance;
    }

    /**
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
        return $this->logo;
    }

    /**
     * Get the dark mode brand logo.
     *
     * @return string
     */
    public function getDarkModeBrandLogo(): string
    {
        return $this->logo_header_dark;
    }

    /**
     * Get the brand logo height.
     *
     * @return string
     */
    public function getBrandLogoHeight(): string
    {
        return $this->logo_height;
    }

    /**
     * Get the theme colors.
     *
     * @return array<string, string>
     */
    public function getThemeColors(): array
    {
        return [
            'primary' => $this->color_primary,
            'title' => $this->color_title,
            'megamenu' => $this->color_megamenu,
            'hamburger' => $this->color_hamburger,
            'banner' => $this->color_banner,
        ];
    }

    /**
     * Get the theme settings.
     *
     * @return array<string, mixed>
     */
    public function getThemeSettings(): array
    {
        return [
            'colors' => $this->getThemeColors(),
            'logo' => [
                'height' => $this->logo_height,
                'alt' => $this->logo_alt,
            ],
            'hide_megamenu' => $this->hide_megamenu,
            'hero_type' => $this->hero_type,
        ];
    }

    /**
     * Get the brand description.
     *
     * @return string|null
     */
    public function getBrandDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Get the brand social links.
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
     *
     * @return array<string, mixed>
     */
    public function getBrandSettings(): array
    {
        return [
            'logo' => [
                'height' => $this->logo_height,
                'alt' => $this->logo_alt,
            ],
            'hide_megamenu' => $this->hide_megamenu,
            'hero_type' => $this->hero_type,
        ];
    }

    /**
     * Get the favicon.
     *
     * @return string
     */
    public function getFavicon(): string
    {
        return $this->favicon;
    }

    /**
     * Get the colors.
     *
     * @return array<string, array{key?: string, color: string, hex?: string}>
     */
    public function getColors(): array
    {
        return $this->colors;
    }

    /**
     * Get the Filament colors.
     *
     * @return array<string, string>
     */
    public function getFilamentColors(): array
    {
        $colors = [];
        foreach ($this->colors as $key => $color) {
            if (isset($color['hex'])) {
                $colors[$key] = $color['hex'];
            }
        }

        return $colors;
    }

    /**
     * Get all colors.
     *
     * @return array<string, mixed>
     */
    public function getAllColors(): array
    {
        return array_merge(
            $this->getThemeColors(),
            $this->getFilamentColors()
        );
    }

    /**
     * Get the icons.
     *
     * @return array<string, string>
     */
    public function getIcons(): array
    {
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
     * Get the alignment.
     *
     * @return array<string, string>
     */
    public function getAlignment(): array
    {
        return [
            'logo_height' => $this->logo_height,
        ];
    }

    /**
     * Get the settings.
     *
     * @return array<string, mixed>
     */
    public function getSettings(): array
    {
        return [
            'colors' => $this->getThemeColors(),
            'logo' => [
                'height' => $this->logo_height,
                'alt' => $this->logo_alt,
            ],
            'hide_megamenu' => $this->hide_megamenu,
            'hero_type' => $this->hero_type,
        ];
    }

    /**
     * Get the meta values.
     *
     * @return array<string, mixed>
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
     * Get the social cards.
     *
     * @return array<string, mixed>
     */
    public function getSocialCards(): array
    {
        return [
            'facebook' => $this->facebook_href,
            'twitter' => $this->twitter_href,
            'youtube' => $this->youtube_href,
        ];
    }

    /**
     * Get the Open Graph data.
     *
     * @return array<string, mixed>
     */
    public function getOpenGraph(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'type' => 'website',
            'url' => url()->current(),
            'site_name' => $this->sitename,
            'locale' => app()->getLocale(),
        ];
    }

    /**
     * Get the Twitter Cards data.
     *
     * @return array<string, mixed>
     */
    public function getTwitterCards(): array
    {
        return [
            'card' => 'summary_large_image',
            'title' => $this->title,
            'description' => $this->description,
            'site' => $this->twitter_href,
        ];
    }

    /**
     * Get the title.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Get the logo header.
     *
     * @return string
     */
    public function getLogoHeader(): string
    {
        return $this->logo_header;
    }

    /**
     * Get the logo header dark.
     *
     * @return string
     */
    public function getLogoHeaderDark(): string
    {
        return $this->logo_header_dark;
    }

    /**
     * Get the logo height.
     *
     * @return string
     */
    public function getLogoHeight(): string
    {
        return $this->logo_height;
    }
}
