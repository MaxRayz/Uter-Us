<?php

namespace App\Policies;

use App\Models\Period;
use App\Models\User;

class PeriodPolicy
{
    public function view(User $user, Period $period): bool
    {
        return $period->user_id === $user->id;
    }
    public function update(User $user, Period $period): bool
    {
        return $period->user_id === $user->id;
    }
    public function delete(User $user, Period $period): bool
    {
        return $period->user_id === $user->id;
    }
}
