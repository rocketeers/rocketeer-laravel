<?php
namespace Rocketeer\Plugins\Laravel;

use Rocketeer\Abstracts\AbstractPlugin;

class LaravelPlugin extends AbstractPlugin
{
    /**
     * Additional lookups to
     * add to Rocketeer
     *
     * @type array
     */
    protected $lookups = array(
        'binaries'   => array(
            'Rocketeer\Plugins\Laravel\Binaries\%s',
        ),
        'strategies' => array(
            'Rocketeer\Plugins\Laravel\Strategies\%sStrategy',
        ),
    );
}