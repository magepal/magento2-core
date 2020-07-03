<?php
/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 * https://www.magepal.com | support@magepal.com
 */

namespace MagePal\Core\Block\Adminhtml\System\Config\Field;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use MagePal\Core\Model\Module;

class Extensions extends Field
{
    /**
     * @var string
     */
    protected $_template = 'MagePal_Core::system/config/field/extensions.phtml';
    /**
     * @var Module
     */
    private $module;

    public function __construct(
        Context $context,
        Module $module,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->module = $module;
    }

    /**
     * @param AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element)
    {
        return $this->toHtml();
    }

    /**
     * @return int
     */
    public function getUpdateCount()
    {
        return $this->module->getUpdateCount();
    }

    /**
     * @return array
     */
    public function getExtensionList()
    {
        return $this->module->getOutDatedExtension();
    }
}
