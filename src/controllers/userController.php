<?php
namespace Dsw\AmigoInvisible\Controllers;

require_once '../src/connection.php';

use Dsw\AmigoInvisible\models\User;

class userController
{

    // Display a listing of the resource.
    public function index()
    {
        global $blade;
        $users = User::all();
        echo $blade->view()->make('user.list', compact('users'))->render();
    }

    // Show the form for creating a new resource.
    public function create()
    {
        global $blade;
        echo $blade->view()->make('user.create')->render();
    }

    // Store a newly created resource in storage.
    public function store()
    {
        $name = $_POST['name'];
        $passw = $_POST['password'];

        $user = new User;
        $user->name = $name;
        $user->password = $passw;
        $user->save();

        header('Location: /user');
    }

    // Display the specified resource.
    public function show($param)
    {
        $id = $param['id'];
        $user = User::find($id);
        global $blade;
        echo $blade->view()->make('user.show', compact('user'))->render();
    }

    //Show the form for editing the specified resource.
    public function edit($param)
    {
        $id = $param['id'];
        $user = User::find($id);
        global $blade;
        echo $blade->view()->make('user.edit', compact('user'))->render();
    }

    //Update the specified resource in storage.
    public function update($param)
    {
        $id = $param['id'];
        $user = User::find($id);

        $name = $_POST['name'];
        $passw = $_POST['password'];

        $user->name = $name;
        $user->password = $passw;
        $user->save();
        header('Location: /user');
    }

    //Remove the specified resource from storage.
    public function destroy($param)
    {
        $id = $param['id'];
        $user = User::find($id);

        $user->delete();
        header('Location: /user');
    }
}
