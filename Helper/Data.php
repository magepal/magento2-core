<?php
/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 * https://www.magepal.com | support@magepal.com
 */

namespace MagePal\Core\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_ACTIVE = 'magepal_core/general/badge_notification';
    const NOTIFICATION_DISABLED = 0;
    const NOTIFICATION_ENABLED = 1;
    const NOTIFICATION_WITHIN_TAB = 2;

    /**
     * If enabled
     *
     * @param null $scopeCode
     * @return bool
     */
    public function getBadgeNotificationValue($scopeCode = null)
    {
        return (int) $this->scopeConfig->getValue(
            self::XML_PATH_ACTIVE,
            ScopeInterface::SCOPE_STORE,
            $scopeCode
        );
    }
}
