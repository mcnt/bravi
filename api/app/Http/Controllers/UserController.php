<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Contact;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::with('contacts:id,type,value,user_id')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated = User::create($request->validated());
        return response()->json([
             'message' => 'Usuário salvo com sucesso!',
             'data' => $validated,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::where('id', $id)->first();
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $data = $request->validated();

        User::where('id', $id)->update($data);

        return ['success' => 'Usuário editado com sucesso!'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::where('user_id', $id)->delete();
        User::where('id', $id)->delete();


        return ['success' => 'Usuário deletado com sucesso!'];
    }
}
