<?php

namespace App\Support;

use App\Models\Rose;
use Illuminate\Support\Collection;

class RoseCatalogue
{
    /**
     * @var list<array<string, mixed>>|null
     */
    private static ?array $fake = null;

    /**
     * @return Collection<int, Rose>
     */
    public static function all(): Collection
    {
        return collect(self::rows())
            ->map(fn (array $row): Rose => self::hydrate($row))
            ->sortBy(fn (Rose $rose): string => (string) $rose->name, SORT_NATURAL | SORT_FLAG_CASE)
            ->values();
    }

    /**
     * Replace the catalogue for the current request/process (tests).
     *
     * @param  list<array<string, mixed>>  $roses
     */
    public static function fake(array $roses): void
    {
        self::$fake = [];

        foreach (array_values($roses) as $index => $rose) {
            self::$fake[] = ['id' => $rose['id'] ?? ($index + 1)] + $rose;
        }
    }

    public static function clearFake(): void
    {
        self::$fake = null;
    }

    /**
     * Raw catalogue rows (from the data file or an active fake).
     *
     * @return list<array<string, mixed>>
     */
    public static function rows(): array
    {
        if (self::$fake !== null) {
            return self::$fake;
        }

        /** @var list<array<string, mixed>> $rows */
        $rows = require database_path('data/roses.php');

        return $rows;
    }

    /**
     * @param  array<string, mixed>  $row
     */
    private static function hydrate(array $row): Rose
    {
        $id = (int) $row['id'];
        unset($row['id']);

        $rose = Rose::make($row);
        $rose->id = $id;

        return $rose;
    }
}
