<?php

namespace core;

/**
 * Core View:
 *
 * @author
 */
class View
{

    /**
     * Add Data: Loops through an array of data, setting the key and value as
     * class properties so that it can be accessed in the views HTML.
     * @access public
     * @param array $data
     * @return void
     * @since 1.0
     */
    public function addData(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }


    /**
     * Make URL: Creates and returns a clean internal URL.
     * @param mixed $path [optional]
     * @return string
     */
    public function makeURL($path = "")
    {
        if (is_array($path)) {
            return (APP_URL . implode("/", $path));
        }
        return (APP_URL . $path);
    }
}
