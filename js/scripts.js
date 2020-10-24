/*
Sends ajax request for updated price information for associated laptop
Updates local div elements
@author Alex Austin
 */
$( document ).ready(function() {
	$("#spinner").hide();
});

function getProductSearch() {
	$("#spinner").show();
	$("#device_search_btn").prop("disabled", true);
	var value = $("#device_search").val();
	if(!value) {
		alert("Please enter a product name.");
		return;
	}
	loadProductData(value);
}

function loadProductData(device) {
	$.ajax({
		type: "post",
		url: "php/scrape.php",
		data: {
			value: device
		},
		dataType: "json",
		success: function(result){
			$("#spinner").hide();
			if(result == null) {
				$("#" + div).html("Could not scrape any data for " + device + ".");
				return;
			}
			$("#product_name").text(result[0]);
			$("#product_image").attr("src", result[2]);
			$("#product_price").text(result[1]);
			$("#device_search_btn").prop("disabled", false);
		}});
}

