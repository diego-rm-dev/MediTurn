<?php

namespace App\Http\Services;

use App\Models\Turn;
use Illuminate\Database\Eloquent\Collection;

class TurnService
{
    public function getAll(): Collection
    {
        return Turn::with('specialty')->orderBy('created_at', 'desc')->get();
    }

    public function create(array $data): Turn
    {
        return Turn::create($data);
    }

    public function update(Turn $turn, array $data): Turn
    {
        $turn->update($data);
        return $turn;
    }

    public function delete(Turn $turn): bool
    {
        return $turn->delete();
    }
}
