<?php
/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.magepal.com | support@magepal.com
 */

namespace MagePal\Core\Block\Adminhtml;

use Magento\Backend\Block\Template;
use MagePal\Core\Controller\Adminhtml\Version\Index;

class Badge extends Template
{
    const SEARCH_URL = 'https://www.magepal.com/catalogsearch/result/?utm_source=search&utm_medium=admin&utm_campaign=core';

    public function getNotificationUrl()
    {
        return $this->getUrl('magepal/version/index');
    }

    public function isAuthorized()
    {
        return $this->_authorization->isAllowed(Index::ADMIN_RESOURCE);
    }

    public function getSearchUrl()
    {
        return self::SEARCH_URL;
    }
}
