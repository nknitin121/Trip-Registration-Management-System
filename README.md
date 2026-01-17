# Trip Registration Management System

A PHP & MySQL based web application that allows users to submit trip registration details through a form and stores the data securely in a database. The project includes session handling to prevent duplicate submissions and displays a success popup for better user experience.

---

## 🚀 Features

- User-friendly registration form  
- PHP backend with MySQL database integration  
- Session-based success message popup  
- Prevents form resubmission on page reload  
- Clean and responsive UI  
- Secure data storage  

---

## 🛠️ Tech Stack

- **Frontend:** HTML5, CSS3  
- **Backend:** PHP  
- **Database:** MySQL  
- **Server:** Apache (XAMPP / WAMP)  

---

## 📂 Project Structure

/trip-registration-system
│── index.php
│── README.md
│── /database
│ └── us_trip.sql


---

## ⚙️ Setup Instructions

1. Install **XAMPP / WAMP**  
2. Start **Apache** and **MySQL**  
3. Create a database named `us_trip`  
4. Create a table named `trip` using the following query:

```sql
CREATE TABLE trip (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  age INT,
  phone VARCHAR(15),
  email VARCHAR(100),
  gender VARCHAR(10),
  other TEXT,
  date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

htdocs (XAMPP) OR www (WAMP)

http://localhost/your-folder-name/index.php
