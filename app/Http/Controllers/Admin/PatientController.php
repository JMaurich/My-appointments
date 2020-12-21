<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = User::patients()->latest()->paginate(8);
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function performValidation(Request $request)
    {
        $rules  = [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'dni'   => 'nullable|digits:8',
            'address'   => 'nullable|min:5',
            'phone' => 'nullable|min:6'
        ];
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre.',
            'name.min' => 'El nombre debe tener más de 5 caracteres .',
            
        ];
        
        $this->validate($request, $rules, $messages);
    }


    public function store(Request $request)
    {
        $this->performValidation($request);

        User::create(
            $request->only('name', 'email', 'dni', 'address', 'phone') 
            + [
                'role' => 'patient',
                'password' => bcrypt($request->input('password'))
            ]
        );
        

        $notification = 'El paciente se a registrado correctamente.';
        return redirect('/patients')->with(compact('notification'));
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
        $patient = User::patients()->findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->performValidation($request);

        $patient = User::patients()->findOrFail($id);
        $data =  $request->only('name', 'email', 'dni', 'address', 'phone');
        $password = $request->input('password');
        if($password)   
            $data['password'] = bcrypt($password);
            
        $patient->fill($data);
        $patient->save();
       
        $notification = 'La informacion del paciente se a actualizado correctamente.';
        return redirect('/patients')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $patient)
    {
        $patientName = $patient->name;
        $patient->delete();
        
        $notification = "El patient $patientName se a eliminado correctamente.";
        return redirect('/patients')->with(compact('notification'));
    }
}
