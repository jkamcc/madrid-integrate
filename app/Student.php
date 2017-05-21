<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class Student extends Model
{
    protected static $valoresSexo = ['M', 'F'];

    protected static $valoresEstadoCivil = ['soltero','casado','separado','divorciado','viudo'];

    protected static $tipoDocumentacion = ['DNI', 'NIE'];

    protected static $tipoPrestacion = [
        'pension_no_contributiva'   => 'Pensión no contributiva',
        'subsidio_desempleo'        => 'Subsidio por desempleo',
        'pension'                   => 'Pensión',
        'RMI'                       => 'RMI',
        'RAI'                       => 'RAI',
        'prestacion_desempleo'      => 'Prestación por desempleo'
    ];

    protected static $tipoCuenta = ['ajena', 'propia'];

    /* Laravel Configuration */

    protected $fillable = [
        'id', 
        'nombre', 
        'apellido1', 
        'apellido2', 
        'fecha_nacimiento', 
        'lugar_nacimiento', 
        'telefono', 
        'nacionalidad', 
        'sexo', 
        'nivel_instruccion', 
        'ocupacion', 
        'tipo_documentacion', 
        'prestacion', 
        'tipo_prestacion', 
        'tiempo_parado', 
        'empadronamiento',
        'lugar_empadronamiento',
        'tiempo_empadronamiento',
        'tiempo_empadronamiento_anos',
        'tiempo_empadronamiento_meses',
        'interes_emprendimiento',
        'tipo_cuenta',
        'trabajo_desempenado',
        'trabajo_deseado',
        'tiempo_parado',
        'tiempo_parado_anos',
        'tiempo_parado_meses'
    ];

    protected $guarded = [];

    #$incrementing = false;
    
    /* Getters */

    /**
     * @return array
     */
    public static function getValoresSexo()
    {
        return self::$valoresSexo;
    }

    /**
     * @return array
     */
    public static function getValoresEstadoCivil()
    {
        return self::$valoresEstadoCivil;
    }

    /**
     * @return array
     */
    public static function getTipoDocumentacion()
    {
        return self::$tipoDocumentacion;
    }

    /**
     * @return map
     */
    public static function getTipoPrestacion() 
    {
        return self::$tipoPrestacion;
    }

    /**
     * @return array
     */
    public static function getTipoPrestacionValores() 
    {
        return array_values(self::$tipoPrestacion);
    }

    /**
     * @return array
     */
    public static function getTiposCuenta()
    {
        return self::$tipoCuenta;
    }

    /**
     * Llama a una API externa para mostrar las nacionalidades existentes
     * @return array
     */
    public static function getNacionalidades()
    {
        $countries = array();

        try {
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', 'https://restcountries.eu/rest/v1/all');

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
            }
        } catch (RequestException $e) {
            Log::error($e->getMessage());
        }

        return $countries;
    }

}
