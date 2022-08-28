<?php
// Params
$phpword->addFontStyle( 'f_bold', [
    'bold' => true
] );

$phpword->addFontStyle( 'f_italic', [
    'italic' => true
] );

$phpword->addFontStyle( 'f_footer', [
    'name'  => 'tahoma',
    'size'  => 9,
    'color' => '31849B'
] );

$phpword->addParagraphStyle( 'p_left', [
    'align'      => 'left',
    'lineHeight' => 1.0,
    'spaceAfter' => 0
] );

$phpword->addParagraphStyle( 'p_center', [
    'align'      => 'center',
    'lineHeight' => 1.0,
    'spaceAfter' => 0
] );

$phpword->addParagraphStyle( 'p_justify', [
    'align'      => 'both',
    'lineHeight' => 1.0,
    'spaceAfter' => 0
] );

$phpword->addParagraphStyle( 'p_margin', [
    'spaceAfter' => 500
] );

$phpword->addParagraphStyle( 'p_center_margin', [
    'align'      => 'center',
    'spaceAfter' => 150
] );

$phpword->addParagraphStyle( 'p_justify_margin', [
    'align'      => 'both',
    'spaceAfter' => 300
] );

$phpword->addNumberingStyle(
    'multilevel',
    [
        'type'   => 'multilevel',
        'levels' => [
            [
                'format'  => 'decimal',
                'text'    => '%1.',
                'left'    => 0,
                'hanging' => 360,
                'tabPos'  => 360,
                'bold'    => true
            ],
            [
                'format'  => 'decimal',
                'text'    => '%1.%2.',
                'left'    => 780,
                'hanging' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.75 ),
                'tabPos'  => 780
            ]
        ]
    ]
);

$phpword->addNumberingStyle(
    'multilevel-2',
    [
        'type'   => 'multilevel',
        'levels' => [
            [
                'format'  => 'decimal',
                'text'    => '%1.',
                'left'    => 360,
                'hanging' => 360,
                'tabPos'  => 360
            ],
            [
                'format'  => 'decimal',
                'text'    => '%1.%2.',
                'left'    => 780,
                'hanging' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.75 ),
                'tabPos'  => 780
            ]
        ]
    ]
);

$phpword->addNumberingStyle(
    'multilevel-3',
    [
        'type'   => 'multilevel',
        'levels' => [
            [
                'format'  => 'decimal',
                'text'    => '%1.',
                'left'    => 360,
                'hanging' => 360,
                'tabPos'  => 360
            ],
            [
                'format'  => 'decimal',
                'text'    => '%1.%2.',
                'left'    => 780,
                'hanging' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.75 ),
                'tabPos'  => 780
            ]
        ]
    ]
);

$phpword->setDefaultFontSize( 10 );
$phpword->setDefaultFontName( 'cambria' );

$phpword->getSettings()->setThemeFontLang( new \PhpOffice\PhpWord\Style\Language( 'ET_ET' ) );

$doc_margin = \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 2.5 );

// Main section.
$section = $phpword->addSection( [
    'headerHeight' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 2.5 ),
    'footerHeight' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip( 0.91 ),
    'marginTop'    => $doc_margin,
    'marginRight'  => $doc_margin,
    'marginBottom' => $doc_margin,
    'marginLeft'   => $doc_margin
] );

// Header
$header = $section->addHeader();
$textrun = $header->addTextRun( [
    'spaceAfter' => 0
] );
$img = $textrun->addImage(
    get_stylesheet_directory() . '/word/logo.png',
    [
        'width' => 96,
        'align' => 'left',
        'spaceAfter' => 0
    ]
);
$header->addText( ' ', '', [
    'spaceAfter' => 0
] );
// /Header

// Footer
$footer = $section->addFooter();
$footer->addText( '', 'f_footer', [
    'spaceAfter' => 0
] );
$footer->addText( 'OÜ СSC TELECOM ESTONIA', 'f_footer', [
    'spaceAfter'  => 0,
    'indentation' => [
        'left' => -1200
    ]
] );
$footer->addText( 'Registrikood: 14422354', 'f_footer', [
    'spaceAfter'  => 0,
    'indentation' => [
        'left' => -860
    ]
] );
$footer->addText( 'KMKR: EE102050660', 'f_footer', [
    'spaceAfter'  => 0,
    'indentation' => [
        'left' => -650
    ]
] );
$footer->addText( 'Väike-Paala 1, Tallinn', 'f_footer', [
    'spaceAfter'  => 0,
    'indentation' => [
        'left' => -680
    ]
] );
$footer->addText( 'Harjumaa 11415', 'f_footer', [
    'spaceAfter'  => 0,
    'indentation' => [
        'left' => -300
    ]
] );
$footer->addText( '', 'f_footer', [
    'spaceAfter' => 0
] );
// /Footer