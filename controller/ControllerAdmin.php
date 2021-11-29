<?php

class ControllerAdmin
{
    public function __construct()
    {
        try
        {
            if (!isset($_REQUEST['action']))
                $action = NULL;
            else
                $action = $_REQUEST['action'];
            switch ($action)
            {

            }
        }
        catch (Exception $e)
        {

        }
    }
}