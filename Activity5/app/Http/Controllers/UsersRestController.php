<?php

namespace App\Http\Controllers;

use App\Services\Business\SecurityService;
use App\Models\DTO;

class UsersRestController extends Controller
{
    
    private $service;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->service = new SecurityService();
        $data = $this->service->getAllUsers();
        $dto = new DTO(200, 'Getting all users UsersRestController@index()', $data);
        return json_encode($dto);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->service = new SecurityService();
        $data = $this->service->getUser($id);
        $dto = new DTO(200, 'Getting user by user id=' . $id . ' UsersRestController@show()', $data);
        return json_encode($dto);
    }

}
