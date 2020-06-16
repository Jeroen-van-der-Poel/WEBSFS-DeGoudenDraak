START TRANSACTION;

-- ADD TEMPORARY COLUMN    
ALTER TABLE dishes
ADD COLUMN dishtype_name VARCHAR(45) AFTER dish_category;

-- INSERT MENU ITEMS TO DISHES (CHANGE THE FROM VALUE TO CORRECT DB NAME)
INSERT INTO dgd_live.dishes (menu_number, menu_addition, name, price, description, dishtype_name)
SELECT menunummer, menu_toevoeging, naam, price, beschrijving, soortgerecht
FROM gouden_draak.menu;

-- INSERT DISH CATEGORIES
INSERT INTO dgd_live.categories (name)
SELECT DISTINCT soortgerecht
FROM gouden_draak.menu;

-- INSERT CORRECT CATEGORY ID IN DISH TABLE
UPDATE dgd_live.dishes as dishes
SET dish_category =
(
    SELECT dishtype.id 
    FROM dgd_live.categories as dishtype
    WHERE dishtype.name = dishes.dishtype_name
)
WHERE dishes.id IS NOT NULL;

ALTER TABLE dgd_live.dishes DROP dishtype_name;

COMMIT;