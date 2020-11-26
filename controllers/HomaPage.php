<?php



use model;

/**
 * Index Controller :
 * 
 * @author Aman,Flavio,Xiumin,Loqman & Steven
 */
// User controler : processlogin/logour/profile/Update / Home Page Controller  (fonction about &home) / Quiz Controler --> Loby + Quiz spécifique 


class Index extends core\Controller
{

    /**
     * Index: Renders the index view. NOTE: This controller can only be accessed
     * by authenticated users!
     * @access public
     * @example index/index
     * @return void
     * @since 1.0
     */
    public function index()
    {

        // Check that the user is authenticated.
        Utility\Auth::checkAuthenticated();

        // Get an instance of the user model using the ID stored in the session. 
        $userID = Utility\Session::get(Utility\Config::get("SESSION_USER"));
        if (!$User = Model\User::getInstance($userID)) {
            Utility\Redirect::to(APP_URL);
        }

        // Set any dependencies, data and render the view.
        $this->View->addCSS("css/index.css");
        $this->View->addJS("js/index.jquery.js");
        $this->View->render("index/index", [
            "title" => "Index",
            "user" => $User->data()
        ]);
    }
}
