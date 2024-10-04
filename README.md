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
    "sku": "sample-product",
    "name": "sample product",
    "description": "Test description"
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



