<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    /**
     * Определяет, может ли владелец обновлять данные о машине.
     */
    public function update(Owner $owner, Car $car)
    {
        return $owner->id === $car->owner_id;
    }

    /**
     * Определяет, может ли владелец удалить машину.
     */
    public function delete(Owner $owner, Car $car)
    {
        return $owner->id === $car->owner_id;
    }

    /**
     * Определяет, может ли владелец создать новую машину.
     */
    public function create(Owner $owner)
    {
        return $owner->role === 'admin'; // Или другая логика проверки прав
    }

    /**
     * Определяет, может ли владелец просматривать машину.
     */
    public function view(Owner $owner, Car $car)
    {
        return $owner->id === $car->owner_id || $owner->role === 'admin';
    }
}
