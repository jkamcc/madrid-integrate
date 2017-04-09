<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected static $valoresSexo = ['M', 'F'];

    protected static $valoresEstadoCivil = ['soltero','casado','separado','divorciado','viudo'];

    protected static $tipoDocumentacion = ['DNI', 'NIE'];

    protected $fillable = ['id', 'nombre', 'apellido1', 'apellido2', 'fecha_nacimiento', 'lugar_nacimiento', 'sexo', 'nivel_instruccion', 'ocupacion', 'tipo_documentacion'];

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


    #$incrementing = false;
}
