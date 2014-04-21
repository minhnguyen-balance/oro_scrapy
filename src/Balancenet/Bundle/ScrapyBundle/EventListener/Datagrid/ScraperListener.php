<?php

namespace Nearest\Bundle\FranchiseBundle\EventListener\Datagrid;

use Doctrine\ORM\QueryBuilder;

use Oro\Bundle\DataGridBundle\Datasource\Orm\OrmDatasource;
use Oro\Bundle\DataGridBundle\Event\BuildBefore;
use Oro\Bundle\DataGridBundle\Event\BuildAfter;
use Oro\Bundle\DataGridBundle\Datagrid\Common\DatagridConfiguration;

class FranchiseePeopleListener
{
    /**
     * Remove useless fields in case of filtering
     *
     * @param BuildBefore $event
     */
    public function onBuildBefore(BuildBefore $event)
    {
        $config = $event->getConfig();

        //$this->removeColumn($config, 'enabled');
        //$this->removeActions($config);
    }

    /**
     * @param DatagridConfiguration $config
     * @param string $fieldName
     */
    protected function removeColumn(DatagridConfiguration $config, $fieldName)
    {
        $config->offsetUnsetByPath(sprintf('[columns][%s]', $fieldName));
        $config->offsetUnsetByPath(sprintf('[filters][columns][%s]', $fieldName));
        $config->offsetUnsetByPath(sprintf('[sorters][columns][%s]', $fieldName));
    }

    /**
     * @param DatagridConfiguration $config
     */
    protected function removeActions(DatagridConfiguration $config)
    {
        $config->offsetUnsetByPath('[actions]');
    }

    /**
     * Add required filters
     *
     * @param BuildAfter $event
     */
    public function onBuildAfter(BuildAfter $event)
    {

        /** @var OrmDatasource $ormDataSource */
        $ormDataSource = $event->getDatagrid()->getDatasource();
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $ormDataSource->getQueryBuilder();

        $parameters = $event->getParameters();
        if (isset($parameters['franchiseeId'])) {
            $queryBuilder->setParameter('franchiseeId', $parameters['franchiseeId']);
        }
    }
}