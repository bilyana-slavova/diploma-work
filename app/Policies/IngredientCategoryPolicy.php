<?php

namespace App\Policies;

use App\User;
use App\IngredientCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class IngredientCategoryPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the ingredientCategory.
     *
     * @param  \App\User  $user
     * @param  \App\IngredientCategory  $ingredientCategory
     * @return mixed
     */
    public function view(User $user, IngredientCategory $ingredientCategory)
    {
        return true;
    }

    /**
     * Determine whether the user can create ingredientCategories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the ingredientCategory.
     *
     * @param  \App\User  $user
     * @param  \App\IngredientCategory  $ingredientCategory
     * @return mixed
     */
    public function update(User $user, IngredientCategory $ingredientCategory)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the ingredientCategory.
     *
     * @param  \App\User  $user
     * @param  \App\IngredientCategory  $ingredientCategory
     * @return mixed
     */
    public function delete(User $user, IngredientCategory $ingredientCategory)
    {
        return false;
    }
}
