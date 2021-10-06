<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ShippingService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ShippingRequest;

class ShippingController extends Controller
{
    protected $service;

    public function __construct(ShippingService $service)
    {
        $this->service = $service;   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        try {

            $shippings = $this->service->getAll();
    
            return $this->response($shippings);

        } catch (\Exception $e) {
            return $this->responseError($e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingRequest $request)
    {
        try {
            $inputs = $request->validated();

            $shipping = $this->service->create($inputs);

            if ($shipping) {
                return $this->response($shipping, 201);
            }

            return $this->responseError(500, 'Ocorreu um erro ao tentar criar o frete.');

        } catch (\Exception $e) {
            
            return $this->responseError($e->getCode(), $e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
