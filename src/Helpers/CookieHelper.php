<?php

namespace Application\Helpers;

class CookieHelper
{
    public static function clearCookies($cookies){
        foreach ($cookies as $cookie)
            if(isset($_COOKIE[$cookie]))
                setcookie($cookie,null);
    }
}