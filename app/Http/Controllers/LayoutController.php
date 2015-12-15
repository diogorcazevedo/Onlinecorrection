<?php

namespace Onlinecorrection\Http\Controllers;


use Onlinecorrection\Models\Project;
use Onlinecorrection\Http\Requests;
use Onlinecorrection\Models\Document;
use Onlinecorrection\Models\Client;


class LayoutController extends Controller
{


    /**
     * @var Project
     */
    private $project;
    /**
     * @var Document
     */
    private $document;
    /**
     * @var Client
     */
    private $client;

    public function __construct(Project $project, Document $document, Client $client)
    {


        $this->project = $project;
        $this->document = $document;
        $this->client = $client;
    }
    public function index()
    {

        $documents =$this->document->all();
        $projects = $this->project->all();
        $clients = $this->client->all();


        return view('layout.index',compact('documents','projects','clients'));
   }
}
