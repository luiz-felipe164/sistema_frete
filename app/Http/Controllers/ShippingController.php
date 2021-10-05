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
            $data = [
                'message' => 'An error occurred, please contact our support', 
                'code' => $e->getCode() 
            ];
            return $this->response($data, 500);
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
        $inputs = $request->validated();
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
