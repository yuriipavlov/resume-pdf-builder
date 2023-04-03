<?php

namespace ResumePDFBuilder;

class Config
{
    
    static function resumeTypes(): array
    {
        return [
            [
                'type'      => 'dev',
                'title'     => 'Senior Full-Stack WordPress Developer',
                'fileName'  => 'Yurii_Pavlov_Senior_WP_Dev.pdf',
                'fileTitle' => 'Yurii Pavlov - WordPress Developer',
                'author'    => 'Yurii Pavlov'
            ],
            [
                'type'      => 'devops',
                'title'     => 'DevOps Engineer',
                'fileName'  => 'Yurii_Pavlov_DevOps.pdf',
                'fileTitle' => 'Yurii Pavlov - DevOps Engineer',
                'author'    => 'Yurii Pavlov'
            ]
        ];
        
    }
    
    static function getMpdfConfig(): array
    {
        return [
            'mode'          => 'utf-8',
            'format'        => 'A4',
            'margin_top'    => 0,
            'margin_right'  => 0,
            'margin_bottom' => 0,
            'margin_left'   => 0,
            'fontDir'       => APP_DIR . '/src/fonts',
            'fontdata'      => [
                'xxx'           => [
                    'R' => 'xxx-Regular.ttf',
                    'B' => 'xxx-Bold.ttf',
                ],
                'xxx_condensed' => [
                    'R' => 'xxxCondensed-Regular.ttf',
                    'B' => 'xxxCondensed-Bold.ttf',
                ]
            ],
            'default_font'  => 'xxx'
        ];
    }
    
}