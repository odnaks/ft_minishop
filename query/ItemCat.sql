CREATE TABLE IF NOT EXISTS ItemCat (
    ItemId    INT,
    FOREIGN KEY (ItemId)  REFERENCES Item (Id),
    CatId   INT,
    FOREIGN KEY (CatId)  REFERENCES Category (Id)
);
