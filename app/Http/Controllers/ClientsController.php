<?php

namespace Onlinecorrection\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Onlinecorrection\Http\Requests;
use Onlinecorrection\Repositories\ClientRepository;
use Onlinecorrection\Http\Requests\AdminClientRequest;

use Onlinecorrection\Services\ClientService;

class ClientsController extends Controller
{

    /**
     * @var ClientRepository
     */
    private $repository;
    /**
     * @var ClientService
     */
    private $clientService;

    public function __construct(ClientRepository $repository, ClientService $clientService)

    {

        $this->repository = $repository;
        $this->clientService = $clientService;
    }


    public function index()
    {
        $clients= $this->repository->paginate(5);

        $clients->setPath('clients');

          return view('admin.clients.index',compact('clients'));

    }

    public function create()
    {


        return view('admin.clients.create');

    }

    public function store(AdminClientRequest $request)
    {
        $data = $request->all();
        $this->clientService->create($data);
        Session::put('success', 'Registro alterado com sucesso');
        return redirect('auth/login');
    }

    public function edit($id)
    {
        $client = $this->repository->find($id);

        return view('admin.clients.edit',compact('client'));

    }

    public function admedit($id)
    {
        $client = $this->repository->find($id);

        return view('admin.clients.admedit',compact('client'));

    }

    public function editfunction($id)
    {
        $client = $this->repository->find($id);

        return view('admin.clients.editfunction',compact('client'));

    }



    public function update(AdminClientRequest $request, $id)
    {
        $data = $request->all();
        $this->clientService->update($data,$id);
        Session::put('success', 'Registro alterado com sucesso');
        return redirect('auth/login');
    }
}
