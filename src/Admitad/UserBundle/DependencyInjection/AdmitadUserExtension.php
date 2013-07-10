<?php

namespace Admitad\UserBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class AdmitadUserExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {

        $config = $this->processConfiguration(new Configuration(), $configs);

        foreach(['client_id', 'client_secret', 'scope'] as $param) {
            $container->setParameter('admitad_user.' . $param, $config[$param]);
        }

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}