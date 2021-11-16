<?php

/**
 * Valide les saisies
 */
class Validation {
    public static function validerMail($email){
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }
}