<?php

namespace App\Services;

class EbphtbServices
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function format_nop($nop)
    {
        $nop= substr($nop,0,2).".".substr($nop,2,2).".".substr($nop,4,3).".".substr($nop,7,3).".".substr($nop,10,3)."-".substr($nop,13,4).".".substr($nop,17,1);
		return $nop;
    }
}
