<?php

namespace App\Repository\Eloquent;

use App\Models\Shipping;
use App\Repository\ShippingRepositoryInterface;
use Illuminate\Support\Collection;

class ShippingRepository extends BaseRepository implements ShippingRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(Shipping $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();    
   }

   public function delete(): void
   {

   }
}