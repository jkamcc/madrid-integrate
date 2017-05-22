<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

use App\Student;

class StudentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Student::getNacionalidades();

        return view('students.student', compact('countries'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Log::info(request()->all());

        $this->validate($request, [
            'id'            => 'required|alpha_num|size:9|unique:students',
            'nombre'        => 'required|alpha_spaces|max:35',
            'apellido1'     => 'required|alpha_spaces|max:18',
            'apellido2'     => 'required|alpha_spaces|max:18',
            'fecha_nacimiento' => 'required|date',
            'lugar_nacimiento' => 'required|max:35',
            'telefono'      => 'required|digits:9',
            'sexo' => ['required', Rule::in(Student::getValoresSexo())],
            'nacionalidad'  => 'required',
            'estado_civil'  => ['required', Rule::in(Student::getValoresEstadoCivil())],
            'nivel_instruccion' => 'required|max:255',
            'ocupacion' => 'required|alpha_spaces|max:35',
            'tipo_documentacion' => ['required', Rule::in(Student::getTipoDocumentacion())],
            'prestacion'    => 'required|boolean',
            'tipo_prestacion' => ['sometimes', 'required', Rule::in(Student::getTipoPrestacionValores())],
            'empadronamiento' => 'required|boolean',
            'lugar_empadronamiento' => 'sometimes|required|max:255',
            'tiempo_empadronamiento' => 'sometimes|required|max:18',
            'tiempo_empadronamiento_anos' => 'sometimes|required|min:0',
            'tiempo_empadronamiento_meses' => 'sometimes|required|between:0,12',
            'tiempo_parado_anos' => 'required|min:0',
            'tiempo_parado_meses' => 'required|between:0,12',
            'interes_emprendimiento' => 'required|boolean',
            'tipo_cuenta' => ['required', Rule::in(Student::getTiposCuenta())],
            'trabajo_desempenado' => 'required|max:35',
            'trabajo_deseado' => 'required|max:35',
            'tiempo_parado' => 'required|max:18',
            'tiempo_parado_anos' => 'required|min:0',
            'tiempo_parado_meses' => 'required|between:0,12',
            'conocimiento_tics' => ['required', Rule::in(Student::getConocimientos())],
            'interes_aprender_tics' => 'required|boolean',
            'cv_digital' => 'required|boolean',
            'sabe_disenar_cv' => 'required|boolean',
        ]);

        $fecha_nacimiento_formatted = date('Y-m-d', strtotime(request('fecha_nacimiento')));
        $inputs = request()->all();
        $inputs['fecha_nacimiento'] = $fecha_nacimiento_formatted;

        /* Store in database */
        Student::create($inputs);

        return redirect()->action('StudentsController@index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
