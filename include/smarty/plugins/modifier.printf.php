<?php
/**
 * Smarty plugin "printf"
 * -------------------------------------------------------------
 * File:    modifier.printf.php
 * Type:    modifier
 * Name:    printf
 * Version: 1.0
 * Author:  Simon Tuck <stu@rtp.ch>, Rueegg Tuck Partner GmbH
 * Purpose: Applies sprintf to a string and retruns the result
 * Example: {$var|printf:"text1":"text2"}
 * -------------------------------------------------------------
 *
 * @param $string
 * @param null $charlist
 * @return string
 */
//@codingStandardsIgnoreStart
function smarty_modifier_printf($string)
{
    //@codingStandardsIgnoreEnd
    return call_user_func_array('sprintf', func_get_args());
}