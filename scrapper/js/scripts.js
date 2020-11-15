/*
Sends ajax request for updated price information for associated laptop
Updates local div elements
@author Alex Austin
 */
$(document).ready(function () {
    loadProductData(0, 500);
});

function addCard(brand, name, price, description, image, url, height) {
    $("#main-grid").append("<div class=\"col\"><div class=\"card\" style=\"width: 18rem; height: " + height + "px\">\n" +
        "    <p class=\"card-brand\">" + brand.toUpperCase() + "</p>\n" +
        "  <img src=" + image + " class=\"card-img-top\" alt=\"\">\n" +
        "  <div class=\"card-body d-flex flex-column\">\n" +
        "    <h5 class=\"card-title\">" + name + "</h5>\n" +
        "    <h3 class=\"card-title\">" + price + "</h3>\n" +
        "    <p class=\"card-text\">" + description + "</p>\n" +
        "    <a href=" + url + " class=\"btn btn-primary mt-auto\">Product Details</a>\n" +
        "  </div>\n" +
        "</div>" +
        "</div>");
}

function loadProductData(offset, length) {
    $.ajax({
        type: "post",
        url: "php/scrape.php",
        data: {
            offset: offset,
            length: length
        },
        dataType: "json",
        success: function (result) {
            $("#spinner").hide();
            $("#product-count").text(result.length + " Results");
            let i;
            let height = 400;
            for (i = 0; i < result.length; i++) {
                let product;

                if (i % 5 === 0) {
                    let j;
                    for (j = i; j < i + 5; j++) {
                        product = result[j];
                        height = Math.max(height, product["description"].length * 2.2);
                    }
                }

                product = result[i];
                addCard(product["brand"], product["name"], product["price"], product["description"], product["meta"]["image_address"], product["meta"]["address"], height);
            }
        }
    });
}

