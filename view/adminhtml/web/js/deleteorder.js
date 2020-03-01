require(["jquery", "Magento_Ui/js/modal/confirm"], function ($, confirm) {
    $(function () {
        DeleteOrder = {
            delete: function (url) {
                confirm({
                    title: "Delete order",
                    content: "Delete this order ?",
                    actions: {
                        confirm: function () {
                            document.location.href = url;
                        }
                    }
                });
            }
        }

    });
});
    
