# Premium Care – Backend Dashboard

![License](https://img.shields.io/badge/license-MIT-blue.svg)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=flat&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=flat&logo=php&logoColor=white)

**Premium Care** is a backend system designed to help companies offer medical and care services to their employees through a network of contracted providers such as clinics, hospitals, nurses, doctors, labs, and specialized care centers.

> This system allows organizations to allocate medical credits, manage employee access, track service utilization, and maintain strong relationships with providers through a secure and efficient dashboard.

---

## 🚀 Overview

Premium Care provides companies with an elegant and centralized way to:

* **Manage contracted medical providers** (hospitals, clinics, labs, pharmacies, etc.)
* **Register companies** and their employees
* **Allocate health credits** to employees
* **Allow employees to use credits** at contracted providers
* **Track service usage** and spending
* **Handle invoices**, approvals, and visit records
* **Provide full administrative control** through a backend dashboard

The system is built for **B2B medical partnerships**, simplifying the process of offering medical benefits.

---

## 🩺 Key Features

### 🏥 Provider Management
* Add/Manage contracted medical providers.
* Store provider details: name, type, address, services.
* Activate/Deactivate providers.
* Manage pricing agreements.

### 👥 Company & Employee Management
* Register companies.
* Add employees under each company.
* Track employee eligibility.
* Assign monthly/yearly medical credit packages.

### 💳 Credit Management
* Set credit limits.
* Auto-deduct service costs from available credit.
* Prevent over-spending.
* Generate credit usage reports.

### 📝 Service & Visit Tracking
* Log employee visits to providers.
* Record the type of service, date, and price.
* Auto-calculate credit deduction.
* Admin approval workflow.

### 🧾 Invoicing & Reporting
* Provider invoices.
* Company billing.
* Monthly/quarterly reports.
* Analytics dashboard.

---

## 🏗️ Tech Stack

| Layer | Technology |
| :--- | :--- |
| **Framework** | Laravel |
| **Database** | MySQL / PostgreSQL |
| **Auth** | Laravel Sanctum |
| **Dashboard** | Blade / AdminLTE (or similar) |
| **Server** | Apache / Nginx |

---

## 📦 Project Structure

```text
premium-care/
├── app/
│   ├── Models/
│   ├── Http/Controllers/
│   ├── Services/
│   ├── Policies/
│   └── ...
├── database/
│   ├── migrations/
│   └── seeders/
├── routes/
│   ├── web.php
│   └── api.php
└── README.md

🛠️ Installation & Setup

1️⃣ Clone the Repository

git clone [https://github.com/hamada-emam-tech/premium-care.git](https://github.com/hamada-emam-tech/premium-care.git)
cd premium-care


2️⃣ Install Dependencies

composer install
npm install && npm run build


3️⃣ Configure Environment

cp .env.example .env
php artisan key:generate


Make sure to set your database, mail, APP_URL, and storage credentials in the .env file.

4️⃣ Run Migrations

php artisan migrate --seed


5️⃣ Start the Server

php artisan serve


🔐 Authentication

Premium Care uses Laravel Sanctum to secure:

Admin dashboard

Company login

API access for mobile or external systems

Token-based authentication ensures flexibility and security.

📘 Example API Endpoints

Companies

GET    /api/companies
POST   /api/companies
GET    /api/companies/{id}
PUT    /api/companies/{id}
DELETE /api/companies/{id}


Employees

POST   /api/employees
GET    /api/employees/{company_id}
PUT    /api/employees/{id}/credit


Providers

POST   /api/providers
GET    /api/providers
GET    /api/providers/{id}


📊 Dashboard Overview

The admin dashboard provides real-time insights:

Total companies & employees

Contracted providers count

Monthly credit usage

Top performing providers

Pending invoices

Service analytics

🎯 Purpose & Vision

Premium Care aims to make medical benefits accessible through direct partnerships, not insurance.

The vision includes:

Lower company costs.

Better employee wellbeing.

Transparent spending records.

Stronger provider relationships.

Future roadmap:

📱 Employee mobile app.

📲 QR-based visit authorization.

🔄 Automated invoicing.

⚡ Real-time credit updates.

🤝 Contributing

Contributions are welcome!

Fork the repo.

Create a new branch.

Commit changes.

Push and submit a PR.

📄 License

This project is open-source and available under the MIT License.
