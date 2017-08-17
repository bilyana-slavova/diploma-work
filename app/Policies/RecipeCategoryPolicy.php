<?php

namespace App\Policies;

use App\User;
use App\RecipeCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecipeCategoryPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the recipeCategory.
     *
     * @param  \App\User  $user
     * @param  \App\RecipeCategory  $recipeCategory
     * @return mixed
     */
    public function view(User $user, RecipeCategory $recipeCategory)
    {
        return true;
    }

    /**
     * Determine whether the user can create recipeCategories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the recipeCategory.
     *
     * @param  \App\User  $user
     * @param  \App\RecipeCategory  $recipeCategory
     * @return mixed
     */
    public function update(User $user, RecipeCategory $recipeCategory)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the recipeCategory.
     *
     * @param  \App\User  $user
     * @param  \App\RecipeCategory  $recipeCategory
     * @return mixed
     */
    public function delete(User $user, RecipeCategory $recipeCategory)
    {
        return false;
    }
}
