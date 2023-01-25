<?php

namespace Dsw\AmigoInvisible\Controllers;

require_once '../src/connection.php';

use Dsw\AmigoInvisible\models\Party;
use Dsw\AmigoInvisible\models\User;
use Dsw\AmigoInvisible\models\Assignment;

class partyController
{

    // Display a listing of the resource.
    public function index()
    {
        global $blade;
        $parties = Party::where('admin_id', $_SESSION['id'])->get();
        echo $blade->view()->make('party.list', compact('parties'))->render();
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $users = User::all();

        global $blade;
        echo $blade->view()->make('party.create', compact('users'))->render();
    }

    // Store a newly created resource in storage.
    public function store()
    {
        $name = $_POST['name'];

        $party = new Party;
        $party->admin_id = $_SESSION['id'];
        $party->name = $name;
        $party->save();

        $participants = $_POST['participants'];
        shuffle($participants);
        for($i=0;$i<count($participants);$i++){
            $assignment = new Assignment;
            $assignment->party_id = $party->id;
            $assignment->user_from = $participants[$i];
            $assignment->user_to = $participants[($i + 1) % count($participants)];
            $assignment->save();
        }
        header('Location: /party');
    }

    // Display the specified resource.
    public function show($param)
    {
        $id = $param['id'];
        $party = Party::find($id);
        global $blade;
        echo $blade->view()->make('party.show', compact('party'))->render();
    }

    //Show the form for editing the specified resource.
    public function edit($param)
    {
        $id = $param['id'];
        $party = Party::find($id);
        global $blade;
        echo $blade->view()->make('party.edit', compact('party'))->render();
    }

    //Update the specified resource in storage.
    public function update($param)
    {
        $id = $param['id'];
        $party = Party::find($id);

        $name = $_POST['name'];
        $party->name = $name;
        $party->save();
        header('Location: /party');
    }

    //Remove the specified resource from storage.
    public function destroy($param)
    {
        $id = $param['id'];
        $user = Party::find($id);

        $user->delete();
        header('Location: /party');
    }
}
