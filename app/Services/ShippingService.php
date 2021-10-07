<?php

namespace App\Services;

use App\Enums\StatusEnum;
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
        $shippings = $this->shippingRepository->all();
        
        return $shippings->map(function($shipping) {
            $aux = [];
            $aux['id']            = $shipping->id;
            $aux['board']         = $shipping->board;
            $aux['vehicle_owner'] = $shipping->vehicle_owner;
            $aux['amount']        = 'R$ ' . number_format($shipping->amount, 2, ",", ".");
            $aux['start_date']    = $shipping->start_date->format('d/m/Y H:s');
            $aux['end_date']      = $shipping->end_date->format('d/m/Y H:s');
            $aux['status']        = StatusEnum::getPtBr()[$shipping->status];

            return $aux;
        });
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

    public function search($term): Collection
    {
        return $this->shippingRepository->search($term);
    }
}
