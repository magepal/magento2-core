<?php
/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.magepal.com | support@magepal.com
 */

namespace MagePal\Core\Block\Adminhtml;

use Magento\Backend\Block\Template;
use MagePal\Core\Controller\Adminhtml\Version\Index;
use MagePal\Core\Helper\Data;

class Badge extends Template
{
    const SEARCH_URL = 'https://www.magepal.com/catalogsearch/result/';
    /**
     * @var Data
     */
    private $dataHelper;

    /**
     * Badge constructor.
     * @param Template\Context $context
     * @param Data $dataHelper
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Data $dataHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->dataHelper = $dataHelper;
    }

    /**
     * @return bool
     */
    public function getNotificationOption()
    {
        return $this->dataHelper->getBadgeNotificationValue();
    }

    /**
     * @return string
     */
    public function getNotificationUrl()
    {
        return $this->getUrl('magepal/version/index');
    }

    /**
     * @return bool
     */
    public function isAuthorized()
    {
        return $this->_authorization->isAllowed(Index::ADMIN_RESOURCE);
    }

    /**
     * @return string
     */
    public function getSearchUrl()
    {
        return self::SEARCH_URL . '?utm_source=search&utm_medium=admin&utm_campaign=core';
    }
}
