<?php
/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.magepal.com | support@magepal.com
 */

namespace MagePal\Core\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
use MagePal\Core\Helper\Data;

class BadgeNotification implements ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => Data::NOTIFICATION_ENABLED, 'label' => 'Yes'],
            ['value' => Data::NOTIFICATION_WITHIN_TAB, 'label' => 'When Tab Open'],
            ['value' => Data::NOTIFICATION_DISABLED, 'label' => __('No')]
        ];
    }
}
