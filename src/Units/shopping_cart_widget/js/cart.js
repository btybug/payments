$(function () {
    var SoppingCart = {
        urls: {
            add: "/shopping-cart-api/add-to-cart",
            count: "/shopping-cart-api/get-cart-count",
            content: "/shopping-cart-api/get-cart-content"
        },

        request: function sendAjax(url, data, callback) {
            $.ajax({
                type: "POST",
                datatype: "json",
                url: url,
                data: data,
                async: false,
                headers: {
                    'X-CSRF-TOKEN': $("input[name='_token']").val()
                },
                success: function (data) {
                    if (callback && typeof callback === "function") {
                        return callback(data);
                    }

                }
            });
        },
        filter: {
            count: function (data) {
                return  $('body').find('.shopping-cart-count').text(data.count);
            }
        },
        count: function () {
            return this.request(this.urls.count, {}, this.filter.count);
        },
        add: function () {
            return this.request(this.urls.add, {}, null);
        }
    };
    $('body').on('click', 'add-to-cart', function () {
        SoppingCart.add();
    })
});