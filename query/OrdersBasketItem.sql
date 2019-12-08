CREATE TABLE IF NOT EXISTS OrdersBasketItem (
    OrdersId    INT,
    FOREIGN KEY (OrdersId)  REFERENCES Orders (Id),
    BasketId   INT,
    FOREIGN KEY (BasketId)  REFERENCES BasketItem (Id)
);
