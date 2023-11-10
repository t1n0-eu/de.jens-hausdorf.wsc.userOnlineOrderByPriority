<?php
namespace wcf\system\event\listener;

use wcf\data\option\Option;

/**
 * Injects an option into the user online default sort field
 *
 * @author     jens1o
 * @copyright  Jens Hausdorf 2017
 * @license    MIT License
 * @package    wcf\system\event
 * @subpackage listener
 */
class UserOnlineListInjectOptionListener implements IParameterizedEventListener {

    /**
     * @inheritDoc
     */
    public function execute($eventObj, $className, $eventName, array &$parameters) {
        $originalOption = $eventObj->cachedOptions['users_online_default_sort_field'];

        /** @var Option $originalOption */

        $modifiedSelectOptions = $originalOption->selectOptions . "\n" . 'priority:wcf.user.usersOnline.priority';

        $originalOption->modifySelectOptions($modifiedSelectOptions);
    }

}