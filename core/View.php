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
}
