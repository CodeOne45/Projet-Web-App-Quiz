<?php

namespace core;

use utility;

/**
 * Core Controller:
 *
 * @author 
 */
class Controller
{
    /** @var View An instance of the core view class. */
    protected $View = null;

    /**
     * Construct: Creates and stores a new instance of the core view class,
     * which can be accessed by any controller which extends this class.
     * @access public
     * @since 1.0
     */
    public function __construct()
    {

        // Initialize a session.
        utility\Session::init();

        $this->View = new View;
    }
}
