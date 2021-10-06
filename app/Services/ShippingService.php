<?php

namespace App\Services;

use App\Models\Shipping;
use App\Repository\ShippingRepositoryInterface;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Support\Collection;

class ShippingService
{

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

    public function update(array $attributes, $id): bool
    {
        if (!$this->shippingRepository->find($id)) {
            throw new NotFound("Registro não encontrado", 404);
        }

        return $this->shippingRepository->update($attributes, $id);
    }

    public function delete($id)
    {
        $shipping = $this->shippingRepository->find($id);
        if (!$shipping) {
            throw new NotFound("Registro não encontrado", 404);
        }

        return $shipping->delete($id);
    }
}
