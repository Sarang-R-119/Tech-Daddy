import firebase_admin
from firebase_admin import credentials
from firebase_admin import firestore

cred = credentials.Certificate('firebase-sdk.json')

firebase_admin.initialize_app(cred)

db = firestore.client()

# doc_ref = db.collection('devices').document('dell_laptop')
# doc_ref.set({
#     'name': 'dell',
#     'type': 'laptop'
# })

# doc_ref = db.collection('devices').document('hp_tab')
# doc_ref.set({
#     'name': 'hp',
#     'type': 'tab',
#     'price': '120$'
# })

# doc_ref = db.collection('devices').document('xiaomi_mobile')
# doc_ref.set({
#     'name': 'redmi',
#     'type': 'mobile',
#     'price': '3000$',
#     'color': 'green',
#     'weight': '2kilos'
# })

doc_ref = db.collection('devices').document('asus_zenbook')
doc_ref.set({
    'name': 'zenbook',
    'type': 'laptop',
    'price': '30000$',
    'color': 'golden',
    'weight': '500KG'
})

doc_ref = db.collection('devices')
docs = doc_ref.stream()

for doc in docs:
    print('{} => {}'.format(doc.id, doc.to_dict()))
