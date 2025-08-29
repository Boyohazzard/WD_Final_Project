<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
  
    public function viewAny(User $user): bool
    {
        return false;
    }

  
    public function view(User $user, Order $order): bool
    {
        return $user->id === $order->user_id;
    }

   
    public function create(User $user): bool
    {
        return false;
    }

 
    public function update(User $user, Order $order): bool
    {
        return false;
    }

  
    public function delete(User $user, Order $order): bool
    {
        return false;
    }

  
    public function restore(User $user, Order $order): bool
    {
        return false;
    }

   
    public function forceDelete(User $user, Order $order): bool
    {
        return false;
    }
}
