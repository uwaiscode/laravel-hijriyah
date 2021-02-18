<?php

namespace Uwaiscode\Laravelhijriyah;

use Carbon\Carbon;

class Hijriyah
{
    public static function getDate($defatulDate)
    {
        $y = Carbon::parse($defatulDate)->format('Y');
        $m = Carbon::parse($defatulDate)->format('m');
        $d = Carbon::parse($defatulDate)->format('d');

        $jd = GregoriantoJD($m, $d, $y);
        $l = $jd - 1948440 + 10632;
        $n = (int) (($l - 1) / 10631);
        $l = $l - 10631 * $n + 354;
        $j = ((int)((10985 - $l) / 5316)) * ((int)((50 * $l) / 17719)) + ((int)($l / 5670)) * ((int)((43 * $l) / 15238));
        $l = $l - ((int)((30 - $j) / 15)) * ((int)((17719 * $j) / 50)) - ((int) ($j / 16)) * ((int) ((15238 * $j) / 43)) + 29;
        $m = (int) ((24 * $l) / 709);
        $d = $l - (int) ((709 * $m) / 24);
        $y = 30 * $n + $j - 30;
        $Hijriah['year'] = $y;
        $Hijriah['month'] = $m;
        $Hijriah['day'] = $d;
        $mHijr = array(1 => "Muharram", "Shofar", "Rabi’ul Awal", "Rabi’u Tsani", "Jumadil ‘Ula", "Jumadi Tsani", "Rajab", "Sya’ban", "Ramadhan", "Syawal", "Dzulqo’dah", "Dzulhijjah");
        return $Hijriah['day'] . " " . $mHijr[$Hijriah['month']] . " " . $Hijriah['year'];
    }
}
