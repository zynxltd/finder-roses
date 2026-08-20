<?php

namespace App\Support;

class RoseFinderCatalog
{
    /**
     * @return array<string, string>
     */
    public static function locations(): array
    {
        return [
            'mixed_borders' => 'Mixed Border',
            'rose_border' => 'Rose Border',
            'hedge' => 'Rose Hedge',
            'pots' => 'Pots & Containers',
            'doorway' => 'Doorway',
            'front_of_property' => 'Front of Property',
            'wall_fence' => 'Wall or Fence',
            'large_arch' => 'Arches',
            'pergola' => 'Pergola',
            'obelisk' => 'Obelisk or Pillar',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function locationIcons(): array
    {
        return [
            'mixed_borders' => 'mixed_border.png',
            'rose_border' => 'rose_border.png',
            'hedge' => 'rose_hedge.png',
            'pots' => 'pots_and_containers.png',
            'doorway' => 'doorway.png',
            'front_of_property' => 'front_of_property.png',
            'wall_fence' => 'wall_fence.png',
            'large_arch' => 'arches.png',
            'pergola' => 'pergola.png',
            'obelisk' => 'obelisk_pillar.png',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function lights(): array
    {
        return [
            'full_sun' => 'Full Sun',
            'partial_sun' => 'Partial Sun',
            'shade_areas' => 'Shade',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function aspects(): array
    {
        return [
            'north_facing' => 'North Facing',
            'east_south_west_facing' => 'East, South or West',
            'north_east_south_west_facing' => 'Any Aspect',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function soils(): array
    {
        return [
            'all_soil' => 'Most Soils',
            'poor_soil' => 'Poor Soil',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function fragrances(): array
    {
        return [
            'delicate' => 'Delicate Fragrance',
            'medium' => 'Medium Fragrance',
            'strong' => 'Strong Fragrance',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function flowerings(): array
    {
        return [
            'repeat_flowering' => 'Repeat Flowering',
            'once_flowering' => 'Once Flowering',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function features(): array
    {
        return [
            'windy_or_exposed' => 'Windy or Exposed',
            'cuttings' => 'Good for Cutting',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function sizes(): array
    {
        return [
            'short' => 'Short',
            'small' => 'Small',
            'medium' => 'Medium',
            'large' => 'Large',
            'tall' => 'Tall',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function colours(): array
    {
        return [
            'pink' => 'Pink',
            'yellow' => 'Yellow',
            'red' => 'Red',
            'white_cream' => 'White & Cream',
            'apricot_orange' => 'Apricot & Orange',
            'purple' => 'Purple',
            'bi_colour' => 'Bi-colour',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function colourIcons(): array
    {
        return [
            'pink' => 'PINK.png',
            'yellow' => 'YELLOW.png',
            'red' => 'RED.png',
            'white_cream' => 'WHITE_AND_CREAM.png',
            'apricot_orange' => 'APRICOT_AND_ORANGE.png',
            'purple' => 'BLUE_AND_PURPLE.png',
            'bi_colour' => 'MULTICOLOUR.png',
        ];
    }

    /**
     * @return list<array{key: string, title: string, options: list<array{value: string, label: string, icon: string}>}>
     */
    public static function characteristicGroups(): array
    {
        return [
            [
                'key' => 'locations',
                'title' => 'Where will it grow?',
                'options' => self::options(self::locations(), self::locationIcons()),
            ],
            [
                'key' => 'lights',
                'title' => 'Sun & shade',
                'options' => self::options(self::lights(), [
                    'full_sun' => 'full_sun.png',
                    'partial_sun' => 'partial_sun.png',
                    'shade_areas' => 'shade_areas.png',
                ]),
            ],
            [
                'key' => 'aspects',
                'title' => 'Garden aspect',
                'options' => self::options(self::aspects(), [
                    'north_facing' => 'north_facing.png',
                    'east_south_west_facing' => 'east_south_west_facing.png',
                    'north_east_south_west_facing' => 'north_east_south_west_facing.png',
                ]),
            ],
            [
                'key' => 'soils',
                'title' => 'Soil',
                'options' => self::options(self::soils(), [
                    'all_soil' => 'all_soil.png',
                    'poor_soil' => 'poor_soil.png',
                ]),
            ],
            [
                'key' => 'fragrances',
                'title' => 'Fragrance',
                'options' => self::options(self::fragrances(), [
                    'delicate' => 'delicate_fragrance.png',
                    'medium' => 'medium_fragrance.png',
                    'strong' => 'strong_fragrance.png',
                ]),
            ],
            [
                'key' => 'flowerings',
                'title' => 'Flowering',
                'options' => self::options(self::flowerings(), [
                    'repeat_flowering' => 'repeat_flowering.png',
                    'once_flowering' => 'once_flowering.png',
                ]),
            ],
            [
                'key' => 'features',
                'title' => 'Also good for',
                'options' => self::options(self::features(), [
                    'windy_or_exposed' => 'windy_or_exposed.png',
                    'cuttings' => 'cuttings.png',
                ]),
            ],
        ];
    }

    public static function optionLabel(string $group, string $value): string
    {
        $labels = match ($group) {
            'locations' => self::locations(),
            'lights' => self::lights(),
            'aspects' => self::aspects(),
            'soils' => self::soils(),
            'fragrances' => self::fragrances(),
            'flowerings' => self::flowerings(),
            'features' => self::features(),
            'size' => self::sizes(),
            'colour' => self::colours(),
            default => [],
        };

        return $labels[$value] ?? $value;
    }

    /**
     * @param  array<string, string>  $labels
     * @param  array<string, string>  $icons
     * @return list<array{value: string, label: string, icon: string}>
     */
    private static function options(array $labels, array $icons): array
    {
        $options = [];

        foreach ($labels as $value => $label) {
            $options[] = [
                'value' => $value,
                'label' => $label,
                'icon' => $icons[$value],
            ];
        }

        return $options;
    }
}
