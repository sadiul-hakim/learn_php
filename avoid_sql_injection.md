In **raw PHP (without frameworks)**, the **correct and safe way** to avoid SQL Injection is to **use prepared statements with bound parameters**.
**Never** insert user input directly into SQL strings.

Below are **clean, production-ready examples** using **MySQLi** and **PDO**.

---

## ✅ Recommended: PDO (cleaner & more flexible)

### 1️⃣ Database connection

```php
<?php
$dsn = "mysql:host=localhost;dbname=test_db;charset=utf8mb4";
$user = "db_user";
$pass = "db_pass";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $e) {
    die("DB Connection Failed");
}
```

---

### 2️⃣ Safe INSERT (SQL injection protected)

```php
<?php
$name  = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':name'  => $name,
    ':email' => $email
]);

echo "User inserted successfully";
```

✅ **Why safe?**

- SQL and data are sent **separately**
- MySQL never executes injected SQL

---

## ✅ MySQLi (also safe)

### 1️⃣ Connection

```php
$conn = new mysqli("localhost", "db_user", "db_pass", "test_db");

if ($conn->connect_error) {
    die("Connection failed");
}
```

---

### 2️⃣ Prepared INSERT

```php
$name  = $_POST['name'];
$email = $_POST['email'];

$stmt = $conn->prepare(
    "INSERT INTO users (name, email) VALUES (?, ?)"
);
$stmt->bind_param("ss", $name, $email);
$stmt->execute();

echo "User inserted successfully";
```

---

## ❌ What NOT to do (vulnerable)

```php
$sql = "INSERT INTO users VALUES ('$name', '$email')";
mysqli_query($conn, $sql);
```

❗ This allows:

```sql
' OR 1=1 --
```

---

## 🔒 Extra Security Best Practices

✔ Always use **prepared statements**
✔ Validate input length & format
✔ Use **least-privilege DB user**
✔ Escape output (XSS protection)
✔ Use `utf8mb4` charset

---

## 📌 Quick Rule

> **Prepared statements = SQL Injection solved**
