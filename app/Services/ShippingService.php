<?php

namespace App\Services;

use App\Models\Shipping;
use App\Repository\ShippingRepositoryInterface;
use Illuminate\Support\Collection;

class ShippingService {

    protected $shippingRepository;

    public function __construct(ShippingRepositoryInterface $shippingRepository)
    {
        $this->shippingRepository = $shippingRepository;
    }

    public function getAll(): Collection
    {
        return $this->shippingRepository->all();
    }

    public function create(array $attributes): Shipping
    {
        return $this->shippingRepository->create($attributes);
    }
}