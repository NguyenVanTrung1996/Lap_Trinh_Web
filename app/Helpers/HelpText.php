<?php
/**
 * Created by PhpStorm.
 * User: HoangDuy
 * Date: 11/22/2017
 * Time: 12:46 PM
 */

namespace App\Helpers;

use Auth;
use Session;

class HelpText
{
    public static function deleteFile($path) {
        if (is_file($path)) {
            unlink($path);
        }
    }
}
