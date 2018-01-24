$(function () {
    var SoppingCart = {
        slug:$('#shopping-cart-widget').attr('data-slug'),
        urls: {
            add: "/shopping-cart-api/add-to-cart",
            count: "/shopping-cart-api/get-cart-count",
            content: "/shopping-cart-api/get-cart-content"
        },

        request: function sendAjax(url, data, callback) {
            data.slug=this.slug;
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
        add: function (id) {
            return this.request(this.urls.add, {id:id}, null);
        }
    };
    SoppingCart.count();
    $('body').on('click', '.add-to-cart', function () {
        SoppingCart.add($(this).attr('data-id'));
        SoppingCart.count();
    })
});