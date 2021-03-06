<?php


namespace Dhruvi\Vendor\Controller\Adminhtml\Details;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Add
 * @package Dhruvi\Vendor\Controller\Adminhtml\Details
 */
class Add extends Action
{
    /**
     * @var bool
     */
    protected $pageFactory = false;
    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        /**
         *  Returning a page generated by page factory
         */
        $result = $this->pageFactory->create();
        $result->getConfig()->getTitle()->prepend((__('Add a New Vendor')));
        return $result;
    }
}
