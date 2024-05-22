<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Contact::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        $validated = Contact::create($request->all());
        return response()->json([
            'message' => 'Contato salvo com sucesso!',
            'data' => $validated,
       ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Contact::where('id', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, string $id)
    {
        $data = $request->validated();

        Contact::where('id', $id)->update($data);

       
        return ['success' => 'Contato editado com sucesso!'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::where('id', $id)->delete();

        return ['success' => 'Contato deletado com sucesso!'];
    }
}
