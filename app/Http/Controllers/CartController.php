<?php

namespace Onlinecorrection\Http\Controllers;

use Illuminate\Http\Request;

use Onlinecorrection\Http\Requests;
use Onlinecorrection\Http\Controllers\Controller;
use Onlinecorrection\Repositories\ProjectRepository;
use Onlinecorrection\Http\Requests\AdminProjectRequest;

class CartController extends Controller
{


    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {

        $this->projectRepository = $projectRepository;
    }



    public function store(Request $request)
    {
        $data = $request->all();


        $result = $data['normaculta'] + $data['compreensao'] + $data['pontodevista'] +$data['mecanismoslinguisticos'] + $data['solucaoproblema'];

        return view('store.nota',compact('result'));

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $project = $this->projectRepository->find($id);

        return view('admin.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminProjectRequest $request, $id)
    {
        $data = $request->all();
        $this->projectRepository->update($data,$id);

        return redirect()->route('admin.projects.index');
    }

}
