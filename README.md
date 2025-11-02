Author: Asgard
| Instagram: @3.9.9.6
| Telegram: @asgard_0


# 🖼️ Files Preview: PHP/MySQL Product Catalog and File Manager

**Files Preview** is a simple, lightweight web application built with **PHP** and **MySQL** that functions as a product or digital item catalog and manager. It provides a simple administration interface for uploading product details and associated media, and a public-facing site for users to browse and download file packages.

This project is ideal for showcasing digital assets where multiple files need to be neatly organized, previewed, and then downloaded as a package.

<img width="1920" height="911" alt="image" src="https://github.com/user-attachments/assets/502d32bf-7edf-4b99-9b3f-fbc64a611d36" />

## ✨ Features

* **Product Management:** Add new products with a name, description, and status (e.g., free/paid) via the simple admin panel (`admin.html` and `add.php`).

<img width="1920" height="911" alt="image" src="https://github.com/user-attachments/assets/b306cbc0-4561-461c-97fd-008f1b44e6c3" />


* **Multi-File Upload:** Supports uploading a main image, multiple **preview images** (for a gallery/slider), and multiple **post images** (the full set of files).
* **Dynamic Catalog:** Products are fetched from a MySQL database and displayed on the main page (`index.php`).
* **Product Detail Page:** A dedicated page (`product.php`) displays all media, including an image gallery/slider for the preview images.

<img width="1920" height="911" alt="image" src="https://github.com/user-attachments/assets/51b0c50a-8fd4-4ba1-aab7-345c68d1b22f" />

* **ZIP Download Utility:** Users can download all associated "post" images for a product as a single **ZIP file** using the `download_posts_zip.php` utility.

## 🛠️ Technology Stack

* **Backend:** PHP
* **Database:** MySQL
* **Frontend:** HTML, CSS, JavaScript

## ⚙️ How to Run the Project Locally

To run this project, you need a local development environment that supports **PHP** and **MySQL**. **XAMPP**, **WAMP**, or **MAMP** are the recommended solutions.

### Prerequisites

1.  **A Local Server Stack:** Install a server package like [XAMPP](https://www.apachefriends.org/index.html).
2.  **Web Browser:** Any modern web browser.

### Setup Steps

#### Step 1: Prepare the Server and Files

1.  **Start Services:** Start the **Apache** and **MySQL** services in your local server control panel (e.g., XAMPP).
2.  **Create Project Folder:** Navigate to your web server's root directory (e.g., `C:\xampp\htdocs\`) and create a new folder, for example, `files-preview`.
3.  **Copy Files:** Place all your project files (`index.php`, `config.php`, `admin.html`, etc.) into this `files-preview` folder.
4.  **Create Image Directories:** Inside your `files-preview` folder, create the following empty subdirectories, as these are used for file uploads:
    * `imgs` (for the main product image)
    * `preview` (for the preview images)
    * `posts` (for the full set of post images)

#### Step 2: Configure the Database

1.  **Access phpMyAdmin:** Open your web browser and go to `http://localhost/phpmyadmin/`.
2.  **Create Database:** Click the **Databases** tab and create a new database named **`bot`**.
    * *Note: This name is specified in your `config.php` file.*
3.  **Import SQL:** Select the newly created `bot` database. Click the **Import** tab.
4.  **Upload `files_preview.sql`:** Click **Choose file** and select the `files_preview.sql` file from your project folder. Click **Go** to import the database table structure (`products`) and initial data.

#### Step 3: Access the Application

1.  **Public Site (Catalog):**
    ```
    http://localhost/files-preview/index.php
    ```
2.  **Admin Panel (To add new images):**
    ```
    http://localhost/files-preview/admin.html
    ```
