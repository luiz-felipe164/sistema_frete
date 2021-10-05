<?php
namespace App\Repository;

use Illuminate\Support\Collection;

interface ShippingRepositoryInterface
{
   public function all(): Collection;

   public function delete(): void;
}