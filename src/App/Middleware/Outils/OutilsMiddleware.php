<?php
namespace App\Middleware\Outils;

use App\Middleware\Commun\AbstractMiddleware;
use App\Middleware\Commun\AbstractModuleMiddleware;

class OutilsMiddleware extends AbstractModuleMiddleware
{

    /**
     * {@inheritDoc}
     * @see \App\Middleware\Commun\AbstractMiddleware::getConfig()
     */
    protected function getConfig(): string
    {
        return 'config/outils.routes.php';
    }
}

