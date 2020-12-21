<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::doctors()->latest()->paginate(8);
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
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
                'role' => 'doctor',
                'password' => bcrypt($request->input('password'))
            ]
        );
        

        $notification = 'El profecional se a registrado correctamente.';
        return redirect('/doctors')->with(compact('notification'));
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
        $doctor = User::doctors()->findOrFail($id);
        return view('doctors.edit', compact('doctor'));
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

        $doctor = User::doctors()->findOrFail($id);
        $data =  $request->only('name', 'email', 'dni', 'address', 'phone');
        $password = $request->input('password');
        if($password)   
            $data['password'] = bcrypt($password);
            
        $doctor->fill($data);
        $doctor->save();
       
        $notification = 'La informacion del profecional se a actualizado correctamente.';
        return redirect('/doctors')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $doctor)
    {
        $doctorName = $doctor->name;
        $doctor->delete();
        
        $notification = "El doctor $doctorName se a eliminado correctamente.";
        return redirect('/doctors')->with(compact('notification'));
    }
}
