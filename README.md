# Selenium-with-php-login-test

A simple PHP login portal with automated Selenium test cases.  
This project demonstrates how to automate browser-based login testing using PHP, Selenium, and ChromeDriver.

---

## 🚀 Features

- Responsive Bootstrap login form
- Secure password validation (hashing)
- Automated Selenium test suite for login scenarios
- Protection against common attacks (XSS, SQL Injection)
- Easy setup and clear instructions

---

## 📂 Project Structure

```
Selenium-with-php-login-test/
│
├── index.php              # Main login page
├── instruction.txt        # Step-by-step setup and usage guide
├── test/
│   └── testLogin.php      # Selenium PHP test script
├── vendor/                # Composer dependencies
└── README.md              # Project documentation
```

---

## 🛠️ Requirements

- PHP (7.4+ recommended)
- Composer
- XAMPP (or any Apache server)
- Google Chrome browser
- ChromeDriver (matching your Chrome version)

---

## ⚡ Quick Start

### 1. Clone the Repository

```bash
git clone https://github.com/viveksurti-dev/Selenium-with-php-login-test.git
cd Selenium-with-php-login-test
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Download & Start ChromeDriver

- Download [ChromeDriver](https://sites.google.com/chromium.org/driver/) matching your Chrome version.
- Extract and run:
  ```bash
  chromedriver --port=9515
  ```

### 4. Start Apache Server

- Use XAMPP Control Panel to start Apache.

### 5. Access the Application

- Place the project folder in `C:\xampp\htdocs\`
- Open [http://localhost/selenium_with_php/](http://localhost/selenium_with_php/) in your browser.

### 6. Run Selenium Tests

```bash
cd test
php testLogin.php
```

---

## 🧪 Test Cases

The automated test suite covers:

- Wrong password
- Invalid email
- Empty fields
- Invalid email format
- XSS attempt in email
- SQL Injection attempt
- Empty password
- Valid login

Results are displayed in color (green for pass, red for fail) in your terminal.

---

## 📋 Notes

- Ensure ChromeDriver and Chrome browser versions match.
- If you change login credentials in `index.php`, update them in `test/testLogin.php`.
- For detailed setup, see `instruction.txt`.

---

## 🤝 Contributing

Pull requests are welcome! For major changes, please open an issue first.

---

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

---
