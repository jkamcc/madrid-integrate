<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

use GuzzleHttp\Exception\RequestException;

use App\Student;

class StudentsController extends Controller
{
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
        $countries = [];

        try {
            $countries = $this->getCountriesFromAPI();
        } catch (RequestException $e) {
            Log::error($e->getMessage());        
        }
        
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
            'sexo' => ['required', Rule::in(Student::getValoresSexo())],
            'estado_civil' => ['required', Rule::in(Student::getValoresEstadoCivil())],
            'nivel_instruccion' => 'required|max:255',
            'ocupacion' => 'required|alpha_spaces|max:35',
            'tipo_documentacion' => ['required', Rule::in(Student::getTipoDocumentacion())]
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

    private function getCountriesFromAPI()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://restcountries.eu/rest/v1/all');                

        $countries = array();

        if ($res->getStatusCode() == 200) {
            $jsonArray = json_decode($res->getBody(), true);

            foreach ($jsonArray as $jsonObject) {
                
                $country = new \stdClass();
                
                if (!empty($jsonObject['translations']['es'])) {
                    $country->name = $jsonObject['translations']['es'];
                } else {
                    $country->name = $jsonObject['name'];
                }

                //obteniendo nombre del país en el locale de la aplicación
                $locale = \Lang::locale();
                if (!empty($jsonObject['translations'][$locale])) {
                    $country ->value = $jsonObject['translations'][$locale];        
                } else {
                    $country->value = $jsonObject['name'];
                }

                array_push($countries, $country); 
            }
        } else {
            throw new Exception('Unreachable REST API');
        }

        return $countries;
    }
}
