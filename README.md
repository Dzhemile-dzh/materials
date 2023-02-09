Specifications:
    * Allowed data types for successful insert:
        -'price' and 'quantity' are of type FLOAT.
        -'description', 'name', 'unit', and 'document' are of type VARCHAR.
        -The 'document' field represents an uploaded file and can be in the formats .txt, .pdf, .doc, etc.
    * Whenever a new record is added, it will be appended to the end of the 'data.json' file and inserted into the 'materials' table in the database.
    * If a new material with the same name as an existing material is added, the 'quantity' field will be the sum of all materials with that name.
    * The 'display materials' page will show a list of all materials and their total quantity.