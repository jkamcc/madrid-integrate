<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\RequestException;

class Student extends Model
{
    protected static $valoresSexo = ['M', 'F'];

    protected static $valoresEstadoCivil = ['soltero','casado','separado','divorciado','viudo'];

    protected static $tipoDocumentacion = ['DNI', 'NIE'];

    protected $fillable = ['id', 'nombre', 'apellido1', 'apellido2', 'fecha_nacimiento', 'lugar_nacimiento',
        'nacionalidad', 'sexo', 'nivel_instruccion', 'ocupacion', 'tipo_documentacion', 'prestacion', 'tipo_prestacion', 'tiempo_parado', 'empadronamiento'];

    protected $guarded = [];

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

    #$incrementing = false;
}
