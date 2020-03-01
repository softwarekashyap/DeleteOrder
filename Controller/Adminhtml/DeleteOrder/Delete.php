<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (softwarekashyap@gmail.com)
 * @package Kashyap_DeleteOrder
*/

namespace Kashyap\DeleteOrder\Controller\Adminhtml\DeleteOrder;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Kashyap\DeleteOrder\Model\ResourceModel\Orders\CollectionFactory;

class Delete extends Action
{
    public $ordersCollectionFactory = null;

    public function __construct(Context $context, CollectionFactory $ordersCollectionFactory)
    {
        $this->ordersCollectionFactory = $ordersCollectionFactory;
        parent::__construct($context);
    }
    
    public function execute()
    {
        $path = "sales/order/index";

        $params = $this->getRequest()->getParams();

        $ids = [];

        if (isset($params['excluded']) && $params['excluded'] == "false") {
            $ids[] = '*';
        } else {
            if (isset($params['selected'])) {
                if (is_array($params['selected'])) {
                    $ids = $params['selected'];
                } else {
                    $ids = [$params['selected']];
                }
            }
        }

        $countDeleteOrder = 0;
        if (count($ids) > 0) {
            $collection = $this->ordersCollectionFactory->create();
            if ($ids[0] == '*') {
                $countDeleteOrder = $collection->deleteAll();
                $this->messageManager->addSuccess($countDeleteOrder . __('All orders have been successfully deleted'));
            } else {
                foreach ($ids as $id) {
                    $collection->deleteOrder($id);
                    $countDeleteOrder++;
                }
                $this->messageManager->addSuccess($countDeleteOrder . __(' order(s) successfully deleted'));
            }
        } else {
            $this->messageManager->addError(__('Unable to delete orders.'));
        }
        return $this->resultRedirectFactory->create()->setPath($path, []);
    }
}
