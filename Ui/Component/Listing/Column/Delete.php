<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (softwarekashyap@gmail.com)
 * @package Kashyap_DeleteOrder
*/

namespace Kashyap\DeleteOrder\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column as UiColumn;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\UrlInterface;

class Delete extends UiColumn
{
    private $urlInterface = null;

    public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, UrlInterface $urlInterface, array $components = [], array $data = [])
    {
        $this->urlInterface = $urlInterface;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $html = "<a href='#' onclick='javascript:jQuery(this).parents(\"TD\").eq(0).off(\"click\");";
                $html .= "DeleteOrder.delete(\"";
                $html .= $this->urlInterface->getUrl('deleteorder/deleteorder/delete', ['selected' => $item['entity_id']]);
                $html .= "\");";
                $html .= "'>Delete</a></span>";
                $item[$this->getData('name')] = $html;
            }
        }
        return $dataSource;
    }
}
