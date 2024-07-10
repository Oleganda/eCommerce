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

    public static function set_value($key, $value)
    {
        $_SESSION['values'][$key] = $value;
    }

    public static function get_value($key)
    {
        if (isset($_SESSION['values'][$key])) {
            $value = $_SESSION['values'][$key];
            unset($_SESSION['values'][$key]);
            return $value;
        }

        return ''; // Return an empty string if the key is not found
    }
}
