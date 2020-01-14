<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

Config::set("license", "put your license key here");
/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/


//------------ Max Page Depth ------------
// e.g when set to 3:
//   - documentations
//     - chapters
//       - subchapters
Config::set("max_page_depth", 3);


//------------ Enable Cache ------------
Config::set("cache", true);


//------------ Smartypants ------------
Config::set("smartypants", true);


//------------ File Upload and Images ------------
// NOTE: if you change one of these settings clear your thumbs folder
Config::set("image.resize_on_upload", true);
Config::set("image.max_file_size", 1048576); // in Byte
Config::set("image.widths", [480, 1280, 2560, 3840]); // NOTE: images wider than biggest defined image size and bigger than maximum defined image file size get resized when resize_on_upload is set
Config::set("image.images_per_row", [
    "half"    => 2,
    "quarter" => 4
]);


//------------ Video ------------
Config::set("kirbytext.video.class", "embed-responsive-item");


//------------ Sourcecode Tag ------------
Config::set("sourcecode.max_file_size", 10000); // in Byte


//------------ Columnify Plugin ------------
Config::set("columnify.default", [
    "element_class"     => "col offset-md-1 offset-lg-2  offset-xl-2",
    "placeholder_classes" => [
        "d-none d-lg-block col-lg-1 col-xl-3",
        "w-100"
    ]
]);

// define elements that should be columnified and define their element and placeholder class, if only element name is defined default classes are chosen
Config::set("columnify.elements", [
    "p.important"          => [
        "element_class"     => "col-11 col-md-10 col-lg-8 offset-lg-1 col-xl-6 offset-xl-1 lead font-weight-semibold",
        "placeholder_classes" => "d-none d-md-block col-md-1 col-lg-2 col-xl-4"
    ],
    "p",
    "hr",
    "ul",
    "ol",
    "figure",
    "blockquote",
    "code-accordion",
    "div.embed-gist",
    "audio",

    "div.image.default",
    "div.image.big"        => [
        "element_class"     => "col-11 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-8 offset-xl-1",
        "placeholder_classes" => "d-none d-xl-block col-xl-2"
    ],
    "div.image.first" => [
        "element_class"     => "col-11 col-md-5 col-lg offset-md-1 offset-xl-1",
        "placeholder_classes" => false
    ],
    "div.image.between.even" => [
        "element_class"     => "col-11 col-md-5 col-lg offset-md-1 offset-lg-0",
        "placeholder_classes" => false
    ],
    "div.image.between" => [
        "element_class"     => "col-11 col-md-5 col-lg",
        "placeholder_classes" => false
    ],
    "div.image.last.even" => [
        "element_class"     => "col-11 col-md-5 col-lg offset-md-1 offset-lg-0",
        "placeholder_classes" => [
            "d-none d-xl-block col-xl-2",
            "w-100"
        ]
    ],
    "div.image.last" => [
        "element_class"     => "col-11 col-md-5 col-lg",
        "placeholder_classes" => [
            "d-none d-xl-block col-xl-2",
            "w-100"
        ]
    ]
]);