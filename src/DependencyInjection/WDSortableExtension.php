<?php
/*
 * This file is part of the pixSortableBehaviorBundle.
 *
 * (c) Nicolas Ricci <nicolas.ricci@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WebEtDesign\SortableBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Alias;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class WDSortableExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('wd.sortable.behavior.position.field', $config['position_field']);
        $container->setParameter('wd.sortable.behavior.sortable_groups', $config['sortable_groups']);

        $positionHandler = sprintf(
            'wd_sortable_behavior.position.%s',
            $config['db_driver']
        );

        $container->setAlias('wd_sortable_behavior.position', new Alias($positionHandler));
        $container->getAlias('wd_sortable_behavior.position')->setPublic(true);
    }
}
