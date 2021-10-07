<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ShippingService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ShippingRequest;
use Facade\FlareClient\Http\Exceptions\NotFound;

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
        // try {

            $shippings = $this->service->getAll();

            return $this->response('Todos os fretes', 200, $shippings);
        // } catch (\Exception $e) {
        //     return $this->responseError($e->getCode());
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ShippingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingRequest $request)
    {
        try {
            $inputs = $request->validated();

            $shipping = $this->service->create($inputs);

            if ($shipping) {
                return $this->response('Registro criado com sucesso', 201);
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
     * @param  App\Http\Requests\ShippingRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShippingRequest $request, $id)
    {
        try {
            $inputs = $request->validated();

            $shipping = $this->service->update($inputs, $id);

            if ($shipping) {
                return $this->response('Registro atualizado com sucesso', 200);
            }

            return $this->responseError(500, 'Ocorreu um erro ao tentar criar o frete.');
        } catch (NotFound $e) {
            return $this->response(['message' => $e->getMessage()], $e->getCode());
        } catch (\Exception $e) {
            return $this->responseError($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $shipping = $this->service->delete($id);

            if ($shipping) {
                return $this->response('Registro excluído com sucesso', 200);
            }

            return $this->responseError(500, 'Ocorreu um erro ao tentar excluir o frete.');
        } catch (NotFound $e) {
            return $this->response(['message' => $e->getMessage()], $e->getCode());
        } catch (\Exception $e) {
            return $this->responseError($e->getCode());
        }
    }

    public function search(Request $request)
    {
        try {

            $term = $request->get('term');
            if (!$term) {
                return $this->response('É necessário enviar um termo para pesquisa', 422);
            }

            $shippings = $this->service->search($term);

            if ($shippings->count() === 0) {
                return $this->response('Não foram encontrados registros', 404);
            }

            return $this->response('Registros encontrados', 200, $shippings);

        } catch (\Exception $e) {
            return $this->responseError($e->getCode());
        }
    }
}
