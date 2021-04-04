// Converts json data to bootstrap card objects
if ($('#content3cards').length>0) {
    fetch("./scripts/laptop.json").then(function(data) {return data.json()}).then(function(data){
        $('#content3cards').append('<div class="row row-cols-4 row-cols-md-2 g-4 content3 align-items-center justify-content-center"></div>');
        for (let i = 0; i < data.laptop.length; i++) {
            var insert = '<div class="col-md-3"><div class="card rounded"><img src="';
            insert = insert.concat(data.laptop[i].img);
            insert = insert.concat('" class="card-img-top img-fluid rounded mx-auto" style="height: 250px;width:100%;"/><div class="card-body"><h3 class="card-title text-white">');
            insert = insert.concat(data.laptop[i].name);
            insert =  insert.concat('</h3><ul class="list-group list-goup-flush"><li class="list-group-item">');
            insert = insert.concat(data.laptop[i].specs);
            insert = insert.concat('</li><li class="list-group-item">');
            insert = insert.concat(data.laptop[i].gpu);
            insert = insert.concat('</li><li class="list-group-item">');
            insert = insert.concat(data.laptop[i].display);
            insert = insert.concat('</li><li class="list-group-item">');
            insert = insert.concat(data.laptop[i].weight);
            insert = insert.concat('</li><li class="list-group-item">');
            insert = insert.concat(data.laptop[i].ports);
            insert = insert.concat('</li></ul></div></div></div>');
            $('.content3').append(insert);
        }
    
})
};

function prettify (num) {
	var n = num.toString().split(".");
    if (!n[1]) {
    	n[1] = "00";
    }
    if (n[1].length === 1) {
    	n[1] = n[1] + "0";
    }
    
    return n[0] + "." + n[1];
}
