<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (softwarekashyap@gmail.com)
 * @package Kashyap_DeleteOrder
*/

namespace Kashyap\DeleteOrder\Block\Adminhtml\Order;

class View
{
    private $urlInterface;

    public function __construct(\Magento\Framework\UrlInterface $urlInterface)
    {
        $this->urlInterface = $urlInterface;
    }

    public function beforeGetOrder(\Magento\Sales\Block\Adminhtml\Order\View $subject)
    {

        $subject->addButton(
            'void_delete',
            [
            'label' => __('Delete'),
            'onclick' => 'setLocation(\'' . $this->urlInterface->getUrl('deleteorder/deleteorder/delete', ['selected' => $subject->getRequest()->getParam('order_id')]) . '\')'
            ]
        );
    }
}
