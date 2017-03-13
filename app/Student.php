<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected static $valoresSexo = ['M', 'F'];

    protected static $valoresEstadoCivil = ['soltero','casado','separado','divorciado','viudo'];

    protected $fillable = ['id', 'nombre', 'apellido1', 'apellido2', 'fecha_nacimiento', 'lugar_nacimiento', 'sexo'];

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


    #$incrementing = false;
}
