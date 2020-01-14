<?php 

return [
    'debug'  => true,
    'home' => 'my-documenation-hfg',
    'columnify.default' => [
        'element_class' => 'col offset-md-1 offset-lg-2  offset-xl-2',
        'placeholder_classes' => [
            'd-none d-lg-block col-lg-1 col-xl-3',
            'w-100'
        ]
    ],
    'columnify.elements' => [
        'p.important'          => [
            'element_class'     => 'col-11 col-md-10 col-lg-8 offset-lg-1 col-xl-6 offset-xl-1 lead font-weight-semibold',
            'placeholder_classes' => 'd-none d-md-block col-md-1 col-lg-2 col-xl-4'
        ],
        'p',
        'hr',
        'ul',
        'ol',
        'figure',
        'blockquote',
        'code-accordion',
        'div.embed-gist',
        'audio',

        'div.image.default',
        'div.image.big'        => [
            'element_class'     => 'col-11 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-8 offset-xl-1',
            'placeholder_classes' => 'd-none d-xl-block col-xl-2'
        ],
        'div.image.first' => [
            'element_class'     => 'col-11 col-md-5 col-lg offset-md-1 offset-xl-1',
            'placeholder_classes' => false
        ],
        'div.image.between.even' => [
            'element_class'     => 'col-11 col-md-5 col-lg offset-md-1 offset-lg-0',
            'placeholder_classes' => false
        ],
        'div.image.between' => [
            'element_class'     => 'col-11 col-md-5 col-lg',
            'placeholder_classes' => false
        ],
        'div.image.last.even' => [
            'element_class'     => 'col-11 col-md-5 col-lg offset-md-1 offset-lg-0',
            'placeholder_classes' => [
                'd-none d-xl-block col-xl-2',
                'w-100'
            ]
        ],
        'div.image.last' => [
            'element_class'     => 'col-11 col-md-5 col-lg',
            'placeholder_classes' => [
                'd-none d-xl-block col-xl-2',
                'w-100'
            ]
        ]
    ]
];