<?php

include(get_template_directory() . "/libs/languages.lib.php");
include(get_template_directory() . "/libs/js.lib.php");
include(get_template_directory() . "/libs/post-type.lib.php");
include(get_template_directory() . "/libs/menu.lib.php");
//include (get_template_directory() . "/libs/widget.lib.php");
//include (get_template_directory() . "/libs/editor.lib.php");
//include (get_template_directory() . "/libs/shortcode.lib.php");
//include (get_template_directory() . "/libs/breadcrumb.lib.php");
//include (get_template_directory() . "/libs/tags.lib.php");
include(get_template_directory() . "/libs/img.lib.php");
//include (get_template_directory() . "/libs/acf.lib.php");

//load function defined in folder /hades/functions
$files = new \FilesystemIterator(__DIR__ . '/hades/functions', \FilesystemIterator::SKIP_DOTS);
foreach ($files as $file) {
    !$files->isDir() and include $files->getRealPath();
}
