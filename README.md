# 🩸 Blood Donation API – Laravel Project

An application aimed at connecting individuals who wish to donate blood with those in need of donors in the Gaza Strip. This app facilitates quick and easy access for people in need of blood donations to reach potential donors.

This repository provides the backend API for a mobile blood donation app built with **Laravel**. It includes features for both regular users (via mobile app) and administrators (via web dashboard).

---

## 📁 Clone the Project

```bash
https://github.com/osid-alkourd/blood_donation_app.git
cd blood-donation-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve

---

## 🗃️ Database Schema

![Database Schema](https://raw.githubusercontent.com/osid-alkourd/blood_donation_app/refs/heads/master/screenshots/database-schema.png)

---

## 📱 Mobile App Features (API)
Users can perform the following actions via the mobile application:

- ✅ **Register and create a new account**
  Secure user authentication with email and password.

- 🔍 **Browse all donation offers**
  View a list of available blood donation offers.

- 🔽 **Filter donation offers by Region or Blood Type**
  Narrow down offers or appeals using advanced filtering.

- 📢 **View all donation appeals**
  Access all blood donation requests posted by users.

- 🔽 **Filter donation appeals by Region or Blood Type**
  Easily find relevant donation appeals with filter options.

- 📇 **View contact information of donors or applicants**

- ➕ **Create new donation offers**

- 🆘 **Submit donation appeals**

- ✏️ **Edit or ❌ Delete their own:**
    - Donation offers
    - Donation appeals

- 📅 **View donation campaigns published by the admin**

- 📚 Read articles published by the admin

- 🔒 Reset forgotten password

- 🔐 Update account password

---

## 🛠️ Admin Dashboard Features

Admins have access to the following tools:

- ❌ **Delete any donation offer or appeal**

- ✅ **Confirm a donation offer**

   - After confirmation, the donor cannot post new    offers for 60 days

- 📊 **View system statistics:**

     - Total users, offers, appeals, and campaigns

- 📣 **Add announcements about blood donation campaigns**

- 📅 **Manage campaigns:**

   - Add, Update, Delete, View

- ✍️ **Manage articles:**

    - Add, Update, Delete, View


---

## 🧪 Postman Collection

![Postman Collection 1](https://raw.githubusercontent.com/osid-alkourd/blood_donation_app/refs/heads/master/screenshots/Screenshot%20(759).png)

![Postman Collection 2](https://raw.githubusercontent.com/osid-alkourd/blood_donation_app/refs/heads/master/screenshots/Screenshot%20(760).png)


![Postman Collection 3](https://raw.githubusercontent.com/osid-alkourd/blood_donation_app/refs/heads/master/screenshots/Screenshot%20(761).png)




