<?php

namespace Bolt\Extension\kaozente\ImageRescaler;

use Bolt\Application;
use Bolt\BaseExtension;

class Extension extends BaseExtension
{
  

    public function initialize() {
        $this->addTwigFilter('limitImageWidth', 'rescaleImagesToWidth');
    }

    public function getName()
    {
        return "ImageRescaler";
    }

    /**
     * Twig filter {{ html|limitImageWidth("width") }} in Namespace extension.
     */
    function rescaleImagesToWidth($html, $width)
    {

        $pattern = '/(<img.*src=")(.*?)(\/files\/)(.*?)(".*>)/i';
        //$replace = '$1http://localhost/bolt/thumbs/54x40c/analog-camera-photography-vintage-1844.jpg$3';
        $replace = '$1$2/thumbs/' . $width . 'x0/$4$5';
        $output = preg_replace($pattern, $replace, $html);

        return new \Twig_Markup($output, 'UTF-8');

    }
}






