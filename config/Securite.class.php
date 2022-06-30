<?php

class Securite {   
    public static function secureHTML($string) {
        return htmlentities($string);
    }

    public static function genereCookiePassword(){
        $ticket = session_id().microtime().rand(0,9999999); //generer un token
        $ticket = hash("sha512", $ticket); //coder le token
        setcookie(COOKIE_PROTECT, $ticket, time() + (60 * 20));
        $_SESSION[COOKIE_PROTECT] = $ticket;
    }

    public static function verificationCookie(){
        if($_COOKIE[COOKIE_PROTECT] === $_SESSION[COOKIE_PROTECT]){
            Securite::genereCookiePassword();
            return true;
        } else {
            session_destroy();
            throw new Exception ("Vous n'avez pas le droit d'être ici !");
        }

    }

    public static function verificationAccess(){
        return isset($_SESSION['access']) && !empty($_SESSION['access'])
        && $_SESSION['access'] === "admin" && self::verificationCookie();
    }

}