import firebase_admin
from firebase_admin import credentials
from firebase_admin import firestore
import glob
import json

def read_jsons(path):
    """Read files from a directory"""
    return glob.glob(path)


def get_content(filepath):
    """Read json from a file"""
    f = open(filepath, "r")
    content = json.load(f)
    f.close()
    return content



cred = credentials.Certificate("firebase-sdk.json")
firebase_admin.initialize_app(cred)
db = firestore.client()

json_products = read_jsons("../scrapper/json/*.json")

for json_product in json_products:
    content = get_content(json_product)

    doc_ref = db.collection('devices').document(content["id"])
    doc_ref.set(content)
