Копировать код
# 📖 **README: Product and Seller API For Somplo Company**

## 🛠️ **Project Setup and Usage**

This is a **Laravel API** project that allows you to manage products and sellers. It provides endpoints for creating, retrieving, and updating products, sellers, and parsing promotional images from external sources.

---

## 🚀 **Getting Started**

### 1. **Clone the Repository**
```bash
git clone https://github.com/igorshinal/somplo.git
cd somplo

alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
sail build --no-cache
sail up -d

cp .env.example .env

Open .env and make sure the following variables are correctly set:
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=sail
DB_PASSWORD=password
APP_PORT=80
FORWARD_DB_PORT=3306


Run Migrations:
sail artisan migrate

Seed the Database:
sail artisan db:seed

The API will be accessible at:
http://localhost

Testing API:

1. Method: POST
URL: http://localhost/api/seller/set_data
Body (JSON):
{
  "seller_name": "BestSeller"
}

2. Method: GET
URL: http://localhost/api/seller/get_all

3. Method: POST
URL: http://localhost/api/product/set_data
Body (JSON):
{
  "phone_name": "iPhone 14",
  "seller_id": 1,
  "display_size": 6.1,
  "quantity": 10,
  "cost": 999.99
}

4. Method: GET
URL: http://localhost/api/product/get_data/1

5. Method: POST
URL: http://localhost/api/product/update_data_bulk
Body (JSON):
{
  "ids": [1, 2],
  "cost": 899.99
}

6. Method: POST
URL: http://localhost/api/bulk_insert
Body (JSON):
{
  "products": [
    {
      "phone_name": "Galaxy S21",
      "seller_id": 1,
      "display_size": 6.2,
      "quantity": 15,
      "cost": 799.99
    },
    {
      "phone_name": "Pixel 6",
      "seller_id": 1,
      "display_size": 6.4,
      "quantity": 20,
      "cost": 699.99
    }
  ]
}


7. Method: GET
URL: http://localhost/api/utilities/parser


