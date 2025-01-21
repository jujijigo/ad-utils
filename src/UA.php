<?php
declare(strict_types=1);

namespace Jujijigo\AdUtils;

class UA
{
    /**
     * 获取手机系统
     * @param string $ua
     * @return string|null
     */
    public static function getOs(string $ua): string|null
    {
        $oses = ['iPhone', 'Android'];
        foreach ($oses as $os) {
            if(str_contains($ua, $os)) {
                return $os;
            }
        }

        return null;
    }

    /**
     * 获取手机型号。iPhone获取的是系统版本。
     * @param string $ua
     * @return string|null
     */
    public static function getModel(string $ua): string|null
    {
        // Standard model
        if(preg_match('/(?<=;\s)[^;]+(?=Build)/U', $ua, $matches)) {
            return trim($matches[0]);
        }

        // iPhone model
        if(preg_match('/iPhone OS.*(?=like)/U', $ua, $matches)) {
            return trim($matches[0]);
        }

        // MIUI model
        if(preg_match('/(?<=;\s)[^;]+(?=MIUI)/U', $ua, $matches)) {
            return trim($matches[0]);
        }

        return null;
    }
}