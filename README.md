# Magento 2 Delete Order
![Alt text](do_SalesOrder.png?raw=true "Magento2 Delete Order")

Kashyap Delete Order extension allows you to delete unnecessary orders from your store. Using this extension allows you to delete multiple orders.

Magento 2 store owners come to a stage when their store is backed-up with canceled, closed and many types of unwanted orders which need to be deleted. The default Magento 2 provides the facility to mark them as canceled, but you cannot permanently delete them from the store. These unwanted orders can lead to inconvenience while managing back-end.  Delete Order Extension allows you to delete the unnecessary canceled and closed orders. Apart from order deletion, all the related data like invoices, shipments, and credit memos are deleted automatically along with the orders. This extension helps store owners to make their Magento 2 stores cleaner and easy to manage.

Once the extension is installed, admins are now able to delete any order easily from the backend. Under Order Management, 'Delete' will be added into the Action box. Admins just need to select orders, choose 'Delete' and click 'Submit'.

## Installation without composer
* Download zip file of this extension
* Place all the files of the extension in your Magento 2 installation in the folder `app/code/Kashyap/DeleteOrder`
* Enable the extension: `php bin/magento --clear-static-content module:enable Kashyap_DeleteOrder`
* Upgrade db scheme: `php bin/magento setup:upgrade`
* Deply Static Content: `php bin/magento setup:static-content:deploy -f` Developer Mode
* Deply Static Content: `php bin/magento setup:static-content:deploy` Production Mode

---

## Features
* Easy installation, setup, and up-gradation.
* Allows deleting any single order from the order page.
* Mass delete orders.
* Delete bulk orders from orders list page in backend.
* Manually delete single order from order view page in admin.
* Automatically delete invoice, shipment, credit memo comments.


---

![Alt text](do_SalesOrderDetails.png?raw=true "Magento2 Delete Order")

---

![Alt text](do_SalesOrderDropdown.png?raw=true "Magento2 Delete Order")

---

![Alt text](do_SalseOrderDeleteMessage.png?raw=true "Magento2 Delete Order")

---

![Alt text](do_SalesOrderDetails.png?raw=true "Magento2 Delete Order")

---

[![Alt text](https://www.kashyapsoftware.com/pub/media/logo/stores/1/ks_logo.png "kashyapsoftware.com")](https://www.kashyapsoftware.com/)