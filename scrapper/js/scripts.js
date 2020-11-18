/*
Sends ajax request for updated price information for associated laptop
Updates local div elements
@author Alex Austin
 */
$(document).ready(function () {
    db.collection('devices').get().then((snapshot) => {
        // If you want to do anything with firestore-data, do it inside this block
        // Otherwise, you won't have access to the data. Beince loading is asynchonous
        result = []
        snapshot.docs.forEach(doc => {
            result.push(doc.data())
        });
        loadProductData(result);
    });

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

function loadProductData(result) {
    $("#spinner").hide();
    $("#product-count").text(result.length + " Results");
    let i;
    let height = 0;
    for (i = 0; i < result.length; i++) {
        let product;

        if (i % 6 === 0) {
            height = 0;
            let j;
            for (j = i; j < i + 6; j++) {
                product = result[j];
                if(product["description"].length > 1000) {
                    product["description"] = product["description"].substring(0, 997);
                    product["description"] += "...";
                }
                height = Math.max(height, 300 + (8 * (product["description"].length ** 0.7)));
            }
        }

        product = result[i];
        addCard(product["brand"], product["name"], product["price"], product["description"], product["meta"]["image_address"], product["meta"]["address"], height);
    }
}

