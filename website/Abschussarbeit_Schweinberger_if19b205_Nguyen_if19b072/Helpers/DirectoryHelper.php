<?php

namespace Helpers;

class DirectoryHelper
{
    static function scan_dir($dir)
    {
        $ignored = array('.', '..', '.svn', '.htaccess', 'ids');

        $files = array();
        foreach (scandir($dir) as $file) {
            if (in_array($file, $ignored)) continue;
            $files[$file] = filemtime($dir . '/' . $file);
        }

        arsort($files);
        $files = array_keys($files);

        return ($files) ? $files : false;
    }

    static function scan_dir_for_news($dir)
    {
        $ignored = array('.', '..', '.svn', '.htaccess', 'ids');
        $files = array();
        foreach (scandir($dir) as $file) {
            if (in_array($file, $ignored)) continue;

            $xml = simplexml_load_file("data/news/" . $file);
            $format = "d_m_y_G_i_s";
            $dateobject = \DateTime::createFromFormat($format,$xml->date);
            $diff = date_diff(new \DateTime("now"),$dateobject);

            $diffins = ((($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h) * 60 + $diff->i)*60 + $diff->s;

            $files[$file] = $diffins;//filemtime($dir . '/' . $file);
        }

        asort($files);
        $files = array_keys($files);

        return ($files) ? $files : false;
    }

}