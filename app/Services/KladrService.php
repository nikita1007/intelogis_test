<?php

namespace App\Services;

use App\Models\Kladr;
use Illuminate\Database\QueryException;

class KladrService
{
    public function create() {
        $new_kladr = Kladr::create([
            'kladr' => 'Оренбург'
        ]);

        $new_kladr->save();
    }

    public function getById(int $id) {
        return Kladr::first()->where('id', '=', $id)->get()[0];
    }

    public function getSourceAndTargetKladrsName(int $sourceKladrID, int $targetKladrID): array {
        return [$this->getById($sourceKladrID)['kladr'], $this->getById($targetKladrID)['kladr']];
    }
}