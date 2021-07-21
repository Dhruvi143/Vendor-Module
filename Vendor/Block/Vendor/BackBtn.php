<?php


namespace Dhruvi\Vendor\Block\Vendor;

use Magento\Cms\Block\Adminhtml\Block\Edit\BackButton;

/**
 * Class BackBtn
 * @package Dhruvi\Vendor\Block\Vendor
 *
 * Provides method to go back from the current page
 */
class BackBtn extends BackButton
{
    /**
     * Get URL for back (reset) button
     *
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('*/*/index');
    }
}
