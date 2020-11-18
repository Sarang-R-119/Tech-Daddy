## Description
A tool that can upload scraped device info to cloud-firestore

## How to Use?
- Modify `firebase-sdk.json` with actual config values
- Run `main.py` to upload all scraped device info to cloud-firestore

## TODO:
- Either use scheduled task or continuously look for new scraped file
- Delete the scraped json file after processing it
- Check if a certain device is already in the database (probably by matching name) [Won't be necessary if the scrapper only scrapes new data]