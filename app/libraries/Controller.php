<?php
/*will allow us to load models and views from other controllers
* every other class we create will extend this class
*/

class Controller{
    //load model
    public function model($model){
        //require model file
        require_once '../app/models/' . $model . '.php';

        /* instantiate model
         * whatever model it is will be returned
         */
        return new $model();
    }

    /* load view 
     * data is an array
     */
    public function view($view, $data = []){
        //check for view file
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        } else{
          //view does not exist
          die('View does not exist');
        }
    }
}
