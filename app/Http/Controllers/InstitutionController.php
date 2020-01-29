<?php

namespace App\Http\Controllers;

use App\Institution;
use http\Env\Response;
use Illuminate\Http\Request;
use Validator;

class InstitutionController extends Controller
{
    private $rules = [
        'name' => 'required|max:50|min:3',
        'cnpj' => 'required|max:18|min:14',
    ];

    private $messages = [
        'name.required' => 'Campus NAME is required.',
        'name.max' => 'The maximum number of characters acceptable for the Campus NAME is 50.',
        'name.min' => 'The minimum number of characters acceptable for the Campus NAME is 3.',
        'cnpj.required' => 'CNPJ number is mandatory',
        'cnpj.max' => 'the maximum number of characters in the CNPJ field is 18',
        'cnpj.min' => 'the minimum number of characters in the CNPJ field is 14'
    ];

    public function __construct(){
        $this->middleware('jwt.auth');
    }

    public function index()
    {
        $institutions = Institution::all();
        return response()->json($institutions, 200);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),$this->rules, $this->messages);

        if($validation->fails()){
            return $validation->errors()->toJson();
        }

        $institution = new Institution();
        $institution->name = $request->name;
        $institution->cnpj = $request->cnpj;
        $institution->save();

        return response()->json($institution, 201);
    }

    public function show(int $id)
    {
        $institution = Institution::find($id);
        
        if(!$institution){
            return response()->json([
                'message' => 'Institution not found'
            ], 404);
        }

        return response()->json($institution, 200);

    }

    public function update(Request $request, int $id)
    {
        $institution = Institution::find($id);
        
        if(!$institution){
            return response()->json([
                'message' => 'Institution not found'
            ], 404);
        }

        $validation = Validator::make($request->all(),$this->rules, $this->messages);

        if($validation->fails()){
            return $validation->errors()->toJson();
        }

        $institution->name = $request->name;
        $institution->cnpj = $request->cnpj;
        $institution->save();

        return response()->json($institution, 201);
    }

    public function destroy(int $id)
    {
        $institution = Institution::find($id);

        if(!$institution){
            return response()->json([
                'message' => 'Institution not found'
            ], 404);
        }

        $institution->delete();
        return response()->json([
            'message' => 'excluded '.$institution->name.' institution'
             ], 202);
    }

    public function search(Request $request)
    {

        $institution = Institution::where('name', 'like', '%'.$request->name.'%')->get();

        if ($institution == '[]') {
            return response()->json([
                'message' => 'Institution not found'
            ], 404);
        }

        return response()->json($institution, 200);
    }
}
