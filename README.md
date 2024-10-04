# Magento 2 Rest API

# Get product by id 

# Endpint : 
  http://magento247.loc/rest/V1/custom/getProduct/<product_id>
# Method : 
  GET

# Example : 
  http://magento247.loc/rest/V1/rest_dev/getProduct/1

# Security :
  Admin Token

# Response : 
  {
      "id": 1,
      "sku": "24-MB01",
      "name": "Joust Duffle Bag",
      "description": "<p>The sporty Joust Duffle Bag can't be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare, it's ideal for athletes with places to go.<p>\n<ul>\n<li>Dual top handles.</li>\n<li>Adjustable shoulder strap.</li>\n<li>Full-length zipper.</li>\n<li>L 29\" x W 13\" x H 11\".</li>\n</ul>"
  }

# Screenhot

![image](https://github.com/user-attachments/assets/52db6912-537a-41e8-a23e-83452f836aa0)


# Update description by product id

# Endpint : 
  http://magento247.loc/rest/V1/custom/setDescription
# Method : 
  PUT

# Request Param : 

{
   "products":[
      {
         "id":178,
         "description":"Test description"
      }
   ]
}

# Security :
  Admin Token

# Response : 
 [] 

# Screenhot : 
![image](https://github.com/user-attachments/assets/1da6b27a-1425-4799-9f7a-8c2067ef2fd9)



