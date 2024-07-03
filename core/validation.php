<?php

class Validation
{
    public static function set_errors($errors)
    {

        if (!is_array($errors)) {
            $errors = [$errors];
        }
        $_SESSION['errors'] = $errors;
    }

    public static function get_errors()
    {

        if (!isset($_SESSION['errors']) || !is_array($_SESSION['errors'])) {
            $_SESSION['errors'] = [];
        }

        $errors = $_SESSION['errors'];


        $_SESSION['errors'] = [];
        return $errors;
    }

    public static function is_errors()
    {

        if (!isset($_SESSION['errors']) || !is_array($_SESSION['errors'])) {
            $_SESSION['errors'] = [];
        }

        return count($_SESSION['errors']) > 0;
    }



    public static function set_value($values)
    {
        $_SESSION['values'] = $values;
    }

    // public static function get_values()
    // {
    //     $values = $_SESSION['values'];

    //     $_SESSION['values'] = [];
    //     return $values;
    // }

    public static function get_value()
    {
        // if (isset($_SESSION['values'][$key])) {
        //     $value = $_SESSION['values'][$key];
        //     $_SESSION['values'][$key] = '';
        //     return $value;
        // }



        $value = $_SESSION['values'];
        $_SESSION['values'] = [];
        return $value;
    }
}
