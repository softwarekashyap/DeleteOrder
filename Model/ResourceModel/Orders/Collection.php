<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (softwarekashyap@gmail.com)
 * @package Kashyap_DeleteOrder
*/

namespace Kashyap\DeleteOrder\Model\ResourceModel\Orders;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Collection extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('Magento\Sales\Model\Order', 'Magento\Sales\Model\ResourceModel\Order');
    }

    public function deleteOrder($orderId)
    {
        $connection = $this->getConnection('write');
        
        //Sales Order Tables
        $tableSalesOrder = $this->getTable('sales_order');
        $tableSalesOrderGrid = $this->getTable('sales_order_grid');
        $tableSalesOrderItem = $this->getTable('sales_order_item');
        $tableSalesOrderPayment = $this->getTable('sales_order_payment');
        $tableSalesOrderTax = $this->getTable('sales_order_tax');
        $tableSalesOrderTaxItem = $this->getTable('sales_order_tax_item');
        
        //Sales Order Invoice Tables
        $tableSalesInvoice = $this->getTable('sales_invoice');
        $tableSalesInvoiceComment = $this->getTable('sales_invoice_comment');
        $tableSalesInvoiceGrid = $this->getTable('sales_invoice_grid');
        $tableSalesInvoiceItem = $this->getTable('sales_invoice_item');
        
        //Sales Order Shipment Tables
        $tableSalesShipment = $this->getTable('sales_shipment');
        $tableSalesShipmrnyComment = $this->getTable('sales_shipment_comment');
        $tableSalesShipmentGrid = $this->getTable('sales_shipment_grid');
        $tableSalesShipmentItem = $this->getTable('sales_shipment_item');
        
        //Sales Order Credit Memo Tables
        $tableSalesCreditmemo = $this->getTable('sales_creditmemo');
        $tableSalesCreditmemoComment = $this->getTable('sales_creditmemo_comment');
        $tableSalesCreditmemoGrid = $this->getTable('sales_creditmemo_grid');
        $tableSalesCreditmemoItem = $this->getTable('sales_creditmemo_item');

        // Delete Order Credits Memos
        $connection->delete($tableSalesCreditmemoComment, "parent_id in (SELECT entity_id FROM " . $tableSalesCreditmemo . " WHERE order_id = " . $orderId. ")");
        $connection->delete($tableSalesCreditmemoItem, "parent_id in (SELECT entity_id FROM " . $tableSalesCreditmemo . " WHERE order_id = " . $orderId. ")");
        $connection->delete($tableSalesCreditmemo, "order_id = " . $orderId);
        $connection->delete($tableSalesCreditmemoGrid, "order_id = " . $orderId);
        
        // Delete Order Invoices
        $connection->delete($tableSalesInvoiceComment, "parent_id in (SELECT entity_id FROM " . $tableSalesInvoice . " WHERE order_id = " . $orderId. ")");
        $connection->delete($tableSalesInvoiceItem, "parent_id in (SELECT entity_id FROM " . $tableSalesInvoice . " WHERE order_id = " . $orderId. ")");
        $connection->delete($tableSalesInvoice, "order_id = " . $orderId);
        $connection->delete($tableSalesInvoiceGrid, "order_id = " . $orderId);
        
        // Delete Order Items
        $connection->delete($tableSalesOrderItem, "order_id = " . $orderId);
        
        // Delete Order Payments
        $connection->delete($tableSalesOrderPayment, "parent_id = " . $orderId);
        // Delete Order Tax
        $connection->delete($tableSalesOrderTaxItem, "tax_id in (SELECT tax_id FROM " . $tableSalesOrderTax . " WHERE order_id = " . $orderId. ")");
        $connection->delete($tableSalesOrderTax, "order_id = " . $orderId);
        
        // Delete Order Shipments
        $connection->delete($tableSalesShipmrnyComment, "parent_id in (SELECT order_id FROM " . $tableSalesShipment . " WHERE order_id = " . $orderId. ")");
        $connection->delete($tableSalesShipmentItem, "parent_id in (SELECT order_id FROM " . $tableSalesShipment . " WHERE order_id = " . $orderId. ")");
        $connection->delete($tableSalesShipment, "order_id = " . $orderId);
        $connection->delete($tableSalesShipmentGrid, "order_id = " . $orderId);
        
        // Delete Orders
        $connection->delete($tableSalesOrder, "entity_id = " . $orderId);
        $connection->delete($tableSalesOrderGrid, "entity_id = " . $orderId);
    }

    public function deleteAll()
    {
        $connection = $this->_resource;
        
        //Sales Order Tables
        $tableSalesOrder = $this->getTable('sales_order');
        $tableSalesOrderGrid = $this->getTable('sales_order_grid');
        $tableSalesOrderItem = $this->getTable('sales_order_item');
        $tableSalesOrderPayment = $this->getTable('sales_order_payment');
        $tableSalesOrderTax = $this->getTable('sales_order_tax');
        $tableSalesOrderTaxItem = $this->getTable('sales_order_tax_item');
        
        //Sales Order Invoice Tables
        $tableSalesInvoice = $this->getTable('sales_invoice');
        $tableSalesInvoiceComment = $this->getTable('sales_invoice_comment');
        $tableSalesInvoiceGrid = $this->getTable('sales_invoice_grid');
        $tableSalesInvoiceItem = $this->getTable('sales_invoice_item');
                
        //Sales Order Shipment Tables
        $tableSalesShipment = $this->getTable('sales_shipment');
        $tableSalesShipmrnyComment = $this->getTable('sales_shipment_comment');
        $tableSalesShipmentGrid = $this->getTable('sales_shipment_grid');
        $tableSalesShipmentItem = $this->getTable('sales_shipment_item');
        
        //Sales Order Credit Memo Tables
        $tableSalesCreditmemo = $this->getTable('sales_creditmemo');
        $tableSalesCreditmemoComment = $this->getTable('sales_creditmemo_comment');
        $tableSalesCreditmemoGrid = $this->getTable('sales_creditmemo_grid');
        $tableSalesCreditmemoItem = $this->getTable('sales_creditmemo_item');
        
        // Delete Credits Memos
        $connection->delete($tableSalesCreditmemoComment, "");
        $connection->delete($tableSalesCreditmemoItem, "");
        $connection->delete($tableSalesCreditmemo, "");
        $connection->delete($tableSalesCreditmemoGrid, "");
        
        // Delete Order Invoices
        $connection->delete($tableSalesInvoiceComment, "");
        $connection->delete($tableSalesInvoiceItem, "");
        $connection->delete($tableSalesInvoice, "");
        $connection->delete($tableSalesInvoiceGrid, "");
        
        // Delete Order Items
        $connection->delete($tableSalesOrderItem, "");
        
        // Delete Order Payments
        $connection->delete($tableSalesOrderPayment, "");
        // tax
        $connection->delete($tableSalesOrderTaxItem, "");
        $connection->delete($tableSalesOrderTax, "");
        
        // Delete Order Shipments
        $connection->delete($tableSalesShipmrnyComment, "");
        $connection->delete($tableSalesShipmentItem, "");
        $connection->delete($tableSalesShipment, "");
        $connection->delete($tableSalesShipmentGrid, "");
        
        // Delete Orders
        $connection->delete($tableSalesOrder, "");
        $connection->delete($tableSalesOrderGrid, "");
    }
}
