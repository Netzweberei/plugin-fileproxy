<?php

use Herbie\DI;
use Herbie\Hook;

class FileproxyPlugin
{
    /**
     * @return array
     */
    public function install()
    {
        if(strpos($_SERVER['REQUEST_URI'], '@')!==false) {
                // deliver file at the earliest time:
            Hook::attach('pluginsInitialized', [$this, 'deliverFile']);
        }
    }

    public function deliverFile()
    {
        $alias = ltrim($_SERVER['REQUEST_URI'],'/');
        $file = DI::get('Alias')->get($alias);
        $fileatoms = explode('.', $file);
        $allowexts = DI::get('Config')->get('plugins.config.fileproxy.publish');
        if (
            file_exists($file)
            // prevent access to the whole filesystem
            && (
                stripos($file, DI::get('Alias')->get('@site/pages'))!==false
                || stripos($file, DI::get('Alias')->get('@site/posts'))!==false
            )
            // allow only configured file-extensions
            && in_array(end($fileatoms), $allowexts)
        ) {
            header('Content-Type: '.mime_content_type ( $file ));
            readfile($file);
            exit;
        } else {
            return;
        }
    }
}
(new FileproxyPlugin())->install();