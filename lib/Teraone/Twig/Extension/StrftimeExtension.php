<?php

namespace Teraone\Twig\Extension;

use DateTime;
use Twig_Environment;
use Twig_Filter_Method;

/**
 * Cloudinary twig extension.
 *
 * @author Stefan Gotre <gotre@teraone.de>
 */
class StrftimeExtension extends \Twig_Extension
{

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'strftime';
    }

    public function getFilters()
    {
        return array(
            'datetime' => new Twig_Filter_Method($this, 'strftime',
                array('needs_environment' => true)),
        );
    }

    /**
     * @param Twig_Environment $env
     * @param DateTime $date
     * @param string $format
     * @param mixed $timezone
     * @return string
     */
    public function strftime(Twig_Environment $env, DateTime $date,
                             $format = "%B %e, %Y %H:%M", $timezone = null)
    {
        $date = twig_date_converter($env, $date, $timezone);
        return strftime($format, $date->getTimestamp());
    }
}