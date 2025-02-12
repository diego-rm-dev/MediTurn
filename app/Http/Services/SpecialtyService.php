<?php

namespace App\Http\Services;

use App\Models\Specialty;
use Illuminate\Database\Eloquent\Collection;

class SpecialtyService
{
    public function getAll(): Collection
    {
        return Specialty::orderBy('name')->get();
    }

    public function create(array $data): Specialty
    {
        return Specialty::create($data);
    }

    public function update(Specialty $specialty, array $data): Specialty
    {
        $specialty->update($data);
        return $specialty;
    }

    public function delete(Specialty $specialty): bool
    {
        return $specialty->delete();
    }
}
