<?php
namespace wcf\system\event\listener;

/**
 * Sorts the box by the priority by the user, if enabled
 *
 * @author     jens1o
 * @copyright  Jens Hausdorf 2017
 * @license    MIT License
 * @package    wcf\system\event
 * @subpackage listener
 */
class UserOnlineListSortByPriorityListener implements IParameterizedEventListener {

    /**
     * @inheritDoc
     */
    public function execute($eventObj, $className, $eventName, array &$parameters) {
        if(USERS_ONLINE_DEFAULT_SORT_FIELD !== 'priority') return;

        $orderBy = 'user_group.priority ' . USERS_ONLINE_DEFAULT_SORT_ORDER . ', user_table.username ASC';

        $eventObj->objectList->sqlOrderBy = $orderBy;
    }

}