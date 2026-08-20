<?php

namespace Database\Seeders;

use App\Models\Rose;
use App\Support\RoseCatalogue;
use Illuminate\Database\Seeder;

class RoseSeeder extends Seeder
{
    public function run(): void
    {
        Rose::query()->delete();

        foreach (RoseCatalogue::rows() as $rose) {
            unset($rose['id']);

            Rose::query()->create($rose);
        }
    }
}
