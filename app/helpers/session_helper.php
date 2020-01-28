<?php

    //session will start on the pages this file is loaded
    session_start();

    //flash message helper
    //EXAMPLE - flash('register_success', 'You are now registered', 'optional css class')
    //DISPLAY IN VIEW <?php echo flash('register_success');
    function flash($name = '', $message = '', $class = 'alert alert-success'){
        if(!empty($name)){
            if(!empty($message) && empty($_SESSION[$name])){
                //if they already exist unset before setting
                if(!empty($_SESSION[$name])){
                    unset($_SESSION[$name]);
                }
                if(!empty($_SESSION[$name . '_class'])){
                    unset($_SESSION[$name . '_class']);
                }

            //set session
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
            }
            elseif(empty($message) && !empty($_SESSION[$name])){
                $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
                echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name . '_class']);
            }
        }
    }