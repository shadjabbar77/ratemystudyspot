<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

class ReviewPolicy
{
    // logged-in users can create reviews
    public function create(User $user): bool
    {
        return true;
    }

    // only owner can update
    public function update(User $user, Review $review): bool
    {
        return (int) $review->user_id === (int) $user->id;
    }

    // only owner can delete
    public function delete(User $user, Review $review): bool
    {
        return (int) $review->user_id === (int) $user->id;
    }
}