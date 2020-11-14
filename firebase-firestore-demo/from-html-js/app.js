const deviceList = document.querySelector('#device-list')

function renderDevice(doc) {
    let li = document.createElement('li');
    let type = document.createElement('span');
    let model = document.createElement('span');

    li.setAttribute('data-id', doc.id);
    type.textContent = doc.data().type;
    model.textContent = doc.data().model;

    li.appendChild(type);
    li.appendChild(model);

    deviceList.appendChild(li);
}

db.collection('devices').get().then((snapshot) => {
    snapshot.docs.forEach(doc => {
        renderDevice(doc);
    })
});