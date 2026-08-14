# 🛒 DukaPro — Retail Management & Point of Sale System

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4-orange?logo=codeigniter)
![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?logo=php\&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?logo=mysql\&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?logo=bootstrap\&logoColor=white)
![Status](https://img.shields.io/badge/Status-Live-success)
![License](https://img.shields.io/badge/License-MIT-blue)

## 🌐 Live Demo

**[Launch DukaPro →]([https://dukapro.rf.gd/index.php/login])**

DukaPro is a web-based **Retail Management and Point of Sale (POS) system** built to help small and medium-sized businesses manage their daily retail operations from a centralized platform.

The system combines **sales, inventory, products, suppliers, purchases, customers, users and POS operations** into a single application.

---

## 📖 About DukaPro

DukaPro is designed around the day-to-day workflow of a retail business.

From adding products and receiving stock to processing customer purchases at the POS, the system provides a centralized environment for managing retail operations.

The application supports different user roles, allowing administrators to manage the business while cashiers focus on processing sales through a dedicated POS interface.

### Key objectives

* Simplify retail sales operations
* Improve inventory visibility
* Reduce manual record keeping
* Provide role-based access
* Centralize product and supplier management
* Track purchases and sales
* Provide a fast cashier-focused POS experience

---

## ✨ Features

| Module             | Functionality                                 |
| ------------------ | --------------------------------------------- |
| 🔐 Authentication  | Secure login and session-based authentication |
| 👥 User Management | Manage system users and roles                 |
| 📊 Dashboard       | Overview of business operations               |
| 🛒 Point of Sale   | Product selection, cart and checkout          |
| 💰 Payments        | Cash, M-Pesa and card payment support         |
| 📦 Products        | Product management, SKU and barcode support   |
| 🏷️ Categories     | Organize products into categories             |
| 🚚 Suppliers       | Manage suppliers and supplier information     |
| 📥 Purchases       | Record purchases and receive stock            |
| 📦 Inventory       | Monitor stock and stock movements             |
| 🧾 Sales           | Record and manage completed transactions      |
| 👤 Customers       | Manage customer information                   |
| 📈 Reports         | Monitor business and sales information        |
| 🔑 Roles           | Separate administrator and cashier access     |

---

## 🛒 Point of Sale

DukaPro includes a dedicated POS interface designed for efficient cashier operations.

Cashiers can:

* Browse products
* Filter products by category
* Add products to the cart
* Adjust quantities
* View cart totals
* Apply discounts
* Calculate tax
* Select payment methods
* Process cash payments
* Process M-Pesa payments
* Process card payments
* Calculate customer change
* Complete sales
* Save transactions as drafts

The POS interface is designed to keep the cashier workflow simple and focused on completing transactions quickly.

---

## 💳 Payment Processing

DukaPro supports multiple payment methods.

### 💵 Cash

Cashiers enter the amount received from the customer.

The system automatically calculates:

```text
Change = Amount Received - Total
```

Transactions cannot be completed when the amount received is less than the amount payable.

### 📱 M-Pesa

M-Pesa transactions support:

* Payment amount
* Transaction/reference number
* Required-field validation

### 💳 Card

Card payments support:

* Payment amount
* Transaction/reference number
* Required-field validation

---

## 📦 Inventory Management

DukaPro provides inventory functionality for monitoring products throughout the purchasing and sales lifecycle.

Inventory features include:

* Stock quantity tracking
* Minimum stock levels
* Product status
* Stock movement tracking
* Purchase receiving
* Stock updates after sales
* Low-stock monitoring
* Product identification using SKU and barcode

This allows businesses to maintain better visibility of available stock and identify products that require replenishment.

---

## 🧾 Sales Management

Completed POS transactions are recorded as sales.

Sales records contain information such as:

* Invoice number
* Customer
* Cashier
* Sale date
* Subtotal
* Discount
* Tax
* Total
* Payment method
* Amount paid
* Change
* Transaction status

Each sale can also contain multiple sale items with their respective quantities, prices and totals.

---

## 📥 Purchase Management

DukaPro supports the purchasing side of the retail workflow.

Businesses can:

* Manage suppliers
* Create purchase records
* Add purchase items
* Track purchase quantities
* Receive purchases
* Update inventory through received stock

This connects purchasing activity directly with inventory management.

---

## 🔐 Role-Based Access

DukaPro provides different experiences depending on the user's role.

### 👨‍💼 Administrator

Administrators have access to the broader management system.

Administrator functionality includes:

* Dashboard
* Products
* Categories
* Suppliers
* Purchases
* Inventory
* Sales
* Customers
* Reports
* User management
* POS

### 🧑‍💼 Cashier

Cashiers are provided with a dedicated POS experience.

They can:

* Access the POS
* Browse products
* Manage the shopping cart
* Process payments
* Complete sales
* Save drafts
* Log out of the system

The cashier interface is intentionally separated from administrative functionality.

---

## 🖥️ Screenshots

### Dashboard

![DukaPro Dashboard](screenshots/dashboard.png)

### Point of Sale

![DukaPro Point of Sale](screenshots/pos.png)

### Products

![DukaPro Products](screenshots/products.png)

### Inventory

![DukaPro Inventory](screenshots/inventory.png)

### Checkout

![DukaPro Checkout](screenshots/checkout.png)

> Screenshots show the actual DukaPro application interface.

---

## 🧱 Technology Stack

### Backend

* **PHP 8.4**
* **CodeIgniter 4**
* **MySQL**

### Frontend

* **HTML5**
* **CSS3**
* **Bootstrap 5**
* **Bootstrap Icons**
* **JavaScript**

### Development Tools

* Git
* GitHub
* Composer
* MySQL
* CodeIgniter Migrations
* CodeIgniter Seeders

---

## 🏗️ Architecture

DukaPro follows the **Model-View-Controller (MVC)** architecture provided by CodeIgniter 4.

```text
DukaPro
│
├── Authentication
│
├── Dashboard
│
├── POS
│   ├── Product Search
│   ├── Product Grid
│   ├── Shopping Cart
│   ├── Checkout
│   └── Payments
│
├── Products
│
├── Categories
│
├── Suppliers
│
├── Purchases
│
├── Inventory
│
├── Sales
│
├── Customers
│
└── Reports
```

---

## 📁 Project Structure

```text
app/
├── Controllers/
│
├── Models/
│
├── Views/
│   ├── layouts/
│   ├── dashboard/
│   ├── pos/
│   ├── products/
│   ├── categories/
│   ├── suppliers/
│   ├── purchases/
│   ├── inventory/
│   └── sales/
│
├── Database/
│   ├── Migrations/
│   └── Seeds/
│
public/
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
│
writable/
│
.env
composer.json
spark
```

---

## ⚙️ Installation

### 1. Clone the repository

```bash
git clone YOUR_GITHUB_REPOSITORY_URL
cd DukaPro
```

### 2. Install dependencies

```bash
composer install
```

### 3. Configure environment

Create your environment configuration:

```bash
cp env .env
```

Configure your database inside `.env`:

```env
database.default.hostname = localhost
database.default.database = dukapro
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### 4. Create the database

Create a MySQL database:

```text
dukapro
```

### 5. Run migrations

```bash
php spark migrate
```

### 6. Run seeders

```bash
php spark db:seed DatabaseSeeder
```

### 7. Start the development server

```bash
php spark serve
```

Open:

```text
http://localhost:8080
```

---

## 🧪 Development

DukaPro is being developed using an incremental modular approach.

The system is structured so that individual business modules can be developed and maintained independently while sharing the same authentication, database and application architecture.

Core areas include:

* Authentication
* Role management
* Product management
* POS
* Checkout
* Inventory
* Purchases
* Sales
* Customers
* Reporting

---

## 🗺️ Roadmap

* [x] CodeIgniter 4 application foundation
* [x] Authentication
* [x] Administrator role
* [x] Cashier role
* [x] Dashboard
* [x] Product management
* [x] Category management
* [x] Supplier management
* [x] POS interface
* [x] Product filtering
* [x] Shopping cart
* [x] Checkout
* [x] Cash payment support
* [x] M-Pesa payment support
* [x] Card payment support
* [x] Purchase management
* [x] Inventory management
* [x] Sales management
* [x] Live deployment
* [ ] Advanced reporting
* [ ] Receipt printing improvements
* [ ] Additional business analytics

---

## 🌐 Deployment

DukaPro is deployed online and can be accessed through:

**https://dukapro.rf.gd/**

The application is currently hosted on InfinityFree for demonstration and portfolio purposes.

---

## 👨‍💻 Developer

### Yunus Abdi

**Computer Science Graduate | Software Developer**

DukaPro was developed as a practical full-stack application focused on solving real-world retail management problems.

My interests include:

* Full-Stack Development
* Backend Development
* Database Systems
* Enterprise Applications
* Business Intelligence
* Data Analytics
* Software Architecture

### GitHub

**GitHub Repository:** `YOUR_GITHUB_REPOSITORY_URL`

---

## ⭐ Why DukaPro?

DukaPro demonstrates the ability to build a complete business application rather than an isolated CRUD project.

The system brings together:

**Authentication → Products → Purchases → Inventory → POS → Checkout → Sales**

This creates a connected retail workflow where business operations are represented throughout the application.

---

## 📄 License

This project is licensed under the MIT License.

---

## ⭐ Support

If you find DukaPro useful or interesting, consider giving the repository a ⭐ on GitHub.
