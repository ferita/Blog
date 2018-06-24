<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the customer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Customer  $customer
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->can_manage_users == 1 or $user->can_manage_sales == 1;
    }

    /**
     * Determine whether the user can create customers.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can_manage_users == 1 or $user->can_manage_sales == 1;
    }

    /**
     * Determine whether the user can update the customer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Customer  $customer
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->can_manage_users == 1 or $user->can_manage_sales == 1;
    }

    /**
     * Determine whether the user can delete the customer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Customer  $customer
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->can_manage_users == 1 or $user->can_manage_sales == 1;
    }
}
