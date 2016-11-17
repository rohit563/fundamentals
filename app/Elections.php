<?php

class BaseModel extends Eloquent 
{

    public static $validationMessages = null;

    public static function validate($input = null) {
        if (is_null($input)) {
            $input = Input::all();
        }

        $v = Validator::make($input, static::$rules);

        if ($v->passes()) {
            return true;
        } else {
            // save the input to the current session
            Input::flash();
            self::$validationMessages = $v->getMessages();
            return false;
        }
    }

}

class Gallery extends BaseModel {

    public static $rules = array(
        'Name' => 'Required|Min:3|Max:80|Alpha',
        'Election_Info'     => 'Required',
        'Date'       => 'Required|Date',
        'Election_Type'  =>'Required'
);

}