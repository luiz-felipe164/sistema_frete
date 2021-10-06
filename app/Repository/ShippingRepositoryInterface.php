<?php

namespace App\Repository;

use Illuminate\Support\Collection;

interface ShippingRepositoryInterface extends EloquentRepositoryInterface
{
   public function all(): Collection;
}
