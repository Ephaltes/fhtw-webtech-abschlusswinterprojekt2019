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

}