<?php
namespace wcf\system\event\listener;

/**
 * Sorts the staff box by the priority by the user, if the option is enabled
 *
 * @author     jens1o
 * @copyright  Jens Hausdorf 2017
 * @license    MIT License
 * @package    wcf\system\event
 * @subpackage listener
 */
class StaffOnlineListSortByPriorityListener implements IParameterizedEventListener {

    /**
     * @inheritDoc
     */
    public function execute($eventObj, $className, $eventName, array &$parameters) {
        $orderBy = 'user_group.priority ' . STAFF_ONLINE_SORT_ORDER . ', user_table.username ASC';

        $eventObj->objectList->sqlOrderBy = $orderBy;
    }

}