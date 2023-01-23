<?php
namespace Dsw\AmigoInvisible\Controllers;

require_once '../src/connection.php';

use Dsw\AmigoInvisible\models\User;

class userController
{

    // Display a listing of the resource.
    public function index()
    {
        $users = User::all();
        echo '<h1>Listado de usuarios</h1>';
        foreach($users as $user){
            echo "<p>$user->name</p>";
        }
    }

    // Show the form for creating a new resource.
    public function create()
    {
    }

    // Store a newly created resource in storage.
    public function store()
    {
    }

    // Display the specified resource.
    public function show($param)
    {
        $id = $param['id'];
        $user = User::find($id);

        if($user){
            echo "<p>$user->name</p>";
        } else {
            echo "<h2>Usuario no Encontrado</h2>";
        }
    }

    //Show the form for editing the specified resource.
    public function edit($id)
    {
    }

    //Update the specified resource in storage.
    public function update($id)
    {
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
    }
}
