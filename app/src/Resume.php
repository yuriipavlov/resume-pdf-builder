<?php

namespace ResumePDFBuilder;

use Mpdf;

class Resume
{
    
    /**
     * @var array
     */
    public array $type;
    
    /**
     * @param $resumeType
     */
    public function __construct( $resumeType )
    {
        $this->type = $resumeType;
    }
    
    /**
     * @throws Mpdf\MpdfException
     */
    public function generatePDF(): void
    {
    
        $html = $this->loadTemplate( 'index', true );
        
        
        // put $index into an index.html file
        file_put_contents( './dist/' . $this->type['type'] . '.html', $html );
        
        $css = file_get_contents( './dist/css/style.css' );
        
        $html = str_replace( '<link rel="stylesheet" href="css/fonts.css">', "", $html );
        $html = str_replace( '<link rel="stylesheet" href="css/style.css">', "<style>" . $css . "</style>", $html );
        
        $mpdf = new Mpdf\Mpdf( Config::getMpdfConfig() );
        
        $mpdf->SetTitle( $this->type['title'] );
        $mpdf->SetAuthor( $this->type['author'] );
        
        $mpdf->WriteHTML( $html );
        
        //save the file put which location you need folder/filename
        $mpdf->Output( OUTPUT_DIR . '/' . $this->type['fileName'], 'F' );
    }
    
    /**
     * @param string $template
     * @param bool $return
     *
     * @return string|bool
     */
    public function loadTemplate( string $template, bool $return = false ): string|bool
    {
        
        $viewPath = TEMPLATE_DIR . '/' . $template . '_' . $this->type['type'] . '.php';
        
        if ( ! file_exists( $viewPath ) ) {
            $viewPath = TEMPLATE_DIR . '/' . $template . '.php';
        }
        
        if ( $return ) {
            ob_start();
        }
        
        try {
            if ( file_exists( $viewPath ) ) {
                
                require $viewPath;
                
            } else {
                throw new \RuntimeException( 'The view path ' . $viewPath . ' can not be found.' );
            }
        } catch ( \Exception $e ) {
            trigger_error( $e->getMessage(), E_USER_ERROR );
        }
        
        
        if ( $return ) {
            return ob_get_clean();
        }
        
        return true;
        
    }
    
}