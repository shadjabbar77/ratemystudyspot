<?php

namespace App\Policies;

use App\Models\StudySpot;
use App\Models\User;

class StudySpotPolicy
{
    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, StudySpot $studySpot): bool
    {
        return $user->id === $studySpot->user_id;
    }

    public function delete(User $user, StudySpot $studySpot): bool
    {
        return $user->id === $studySpot->user_id;
    }
}
