<?php

namespace MeilleursBiens\Calendly;

use Illuminate\Support\Facades\Facade;

/**
 * Class Calendly
 *
 * @mixin CalendlyServiceProvider
 *
 * @package MeilleursBiens\Calendly
 * @see \MeilleursBiens\Calendly\CalendlyAPI
 */
class Calendly extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'calendly';
    }
}
