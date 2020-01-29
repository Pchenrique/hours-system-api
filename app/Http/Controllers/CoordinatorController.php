<?php

namespace App\Http\Controllers;

use App\Coordinator;
use App\User;
use App\Institution;
use http\Env\Response;
use Illuminate\Http\Request;
use Validator;

class CoordinatorController extends Controller
{
    private $rules = [
        'fk_user_id' => 'required',
        'fk_institution_id' => 'required',

    ];

    private $messages = [
        'fk_user_id' => 'Need an associated user',
        'institution.required' => 'I need institution for the coordinate',
    ];

    public function __construct(){
        $this->middleware('jwt.auth');
    }

    public function index()
    {
        $coordinator = Coordinator::all();
        return response()->json($coordinator, 200);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),$this->rules, $this->messages);

        if($validation->fails()){
            return $validation->errors()->toJson();
        }

        if(!$this->verifyUserType($request->fk_user_id)){
            $erros = array('errors' => array(
                'message' => 'User not found or not of the coordinator type'
            ));
            $json_str = json_encode($erros);
            return response($json_str, 404);
        }

        if(!$this->verifyInstitution($request->fk_institution_id)){
            $erros = array('errors' => array(
                'message' => 'institution not found'
            ));
            $json_str = json_encode($erros);
            return response($json_str, 404);
        }

        $coordinator = new Coordinator();
        $coordinator->fk_user_id = $request->fk_user_id;
        $coordinator->fk_institution_id = $request->fk_institution_id;
        $coordinator->save();

        return response()->json($coordinator, 201);
    }

    public function show(int $id)
    {
        $coordinator = Coordinator::find($id);
        
        if(!$coordinator){
            return response()->json([
                'message' => 'Coordinator not found'
            ], 404);
        }

        return response()->json($coordinator, 200);
    }

    public function update(Request $request, Coordinator $coordinator)
    {
        
    }

    public function destroy(int $id)
    {
        $coordinator = Coordinator::find($id);

        if(!$coordinator){
            return response()->json([
                'message' => 'Coordinator not found'
            ], 404);
        }

        $coordinator->delete();
        return response()->json([
            'message' => 'Coordinator excluded'
             ], 202);
    }

    private function verifyUserType($idUser){
        $user = User::find($idUser);

        if($user->fk_user_group_id === 2){
            return true;
        }
        return false;
    }

    private function verifyInstitution($idInstitution){
        $institution = Institution::find($idInstitution);

        if(!$institution){
            return false;
        }
        return true;
    }
}
