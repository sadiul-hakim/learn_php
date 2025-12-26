Below is a **clean, modern PHP 8.2+ tutorial** focused on **OOP + type system**, written in a **Java/Spring-friendly style** (since you already think strongly in typed, imperative terms). No frameworks, no magic.

---

# PHP OOP + Type System (Modern PHP 8.2+)

---

## 1️⃣ Object-Oriented Programming (OOP) in PHP

PHP supports **class-based OOP**, very similar to Java but more lightweight.

### Core OOP Concepts

| Concept          | PHP                |
| ---------------- | ------------------ |
| Class            | `class User {}`    |
| Object           | `$u = new User();` |
| Constructor      | `__construct()`    |
| Encapsulation    | access modifiers   |
| Inheritance      | `extends`          |
| Polymorphism     | method overriding  |
| Interfaces       | `interface`        |
| Abstract classes | `abstract class`   |

---

### Basic Class Example

```php
class Math
{
    const PI = 3.1416;

    public function sum(int $a, int $b): int
    {
        return $a + $b;
    }
}

$math = new Math();
echo $math->sum(10, 20);
```

✔ Strong typing
✔ OOP
✔ No boilerplate

---

## 2️⃣ Access Modifiers

PHP has **three access modifiers**:

| Modifier    | Scope                 |
| ----------- | --------------------- |
| `public`    | Accessible everywhere |
| `protected` | Class + subclasses    |
| `private`   | Only inside the class |

### Example

```php
class User
{
    public string $name;
    protected string $email;
    private string $password;

    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
```

❌ `$user->password` → **fatal error**
✔ Encapsulation enforced

---

## 3️⃣ PHP Variable Types (Modern PHP 8.2)

PHP is **dynamically typed**, but **strong typing** is available and recommended.

### 🔹 Scalar Types

| Type     | Description     |
| -------- | --------------- |
| `int`    | Integer numbers |
| `float`  | Decimal numbers |
| `string` | Text            |
| `bool`   | true / false    |

```php
int $age = 25;
float $price = 99.99;
string $name = "Hakim";
bool $active = true;
```

---

### 🔹 Compound Types

| Type       | Description          |
| ---------- | -------------------- |
| `array`    | List or map          |
| `object`   | Any object           |
| `callable` | Function reference   |
| `iterable` | array or Traversable |

```php
array $numbers = [1, 2, 3];
iterable $items = $numbers;
```

---

### 🔹 Special Types (IMPORTANT)

| Type    | Description                   |
| ------- | ----------------------------- |
| `mixed` | Any type (default in old PHP) |
| `void`  | No return value               |
| `null`  | No value                      |
| `never` | Function never returns        |
| `false` | Only false                    |
| `true`  | Only true                     |

```php
function debug(mixed $data): void
{
    var_dump($data);
}

function fail(): never
{
    throw new Exception("Fatal error");
}
```

---

### 🔹 Nullable Types

```php
?string $name = null;
// same as
string|null $name = null;
```

---

### 🔹 Union Types (PHP 8+)

```php
function parse(int|string $value): int
{
    return (int)$value;
}
```

---

### 🔹 Intersection Types (PHP 8.1+)

```php
function process(Countable&Iterator $data): void
{
}
```

---

### 🔹 Enum Types (PHP 8.1+)

```php
enum Status: string
{
    case ACTIVE = 'active';
    case BLOCKED = 'blocked';
}
```

---

## 4️⃣ A Complete Class Using ALL Concepts

This is **production-quality PHP OOP**.

```php
<?php
declare(strict_types=1);

enum UserStatus: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
}

class User
{
    public const ROLE_ADMIN = 'admin';

    private int $id;
    protected string $email;
    private string $password;
    private UserStatus $status;

    public function __construct(
        int $id,
        string $email,
        string $password,
        UserStatus $status = UserStatus::ACTIVE
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->status = $status;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function isActive(): bool
    {
        return $this->status === UserStatus::ACTIVE;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function toArray(): array
    {
        return [
            'id'     => $this->id,
            'email'  => $this->email,
            'status' => $this->status->value,
        ];
    }
}
```

### Usage

```php
$user = new User(1, 'test@example.com', 'secret');
echo $user->getEmail();
```

---

## 🔥 Best Practices (Very Important)

1. **Always enable strict typing**

```php
declare(strict_types=1);
```

2. **Avoid `mixed` unless unavoidable**

3. **Use enums instead of constants**

4. **Prefer constructor property promotion**

```php
class Product {
    public function __construct(
        public int $id,
        public string $name,
        public float $price
    ) {}
}
```

5. **Think like Java, write like PHP**

- Small classes
- Typed methods
- Clear visibility

---

## 🎯 Recommended Learning Path (For You)

Since you're already strong in backend concepts:

1. PHP OOP fundamentals (you’re here)
2. PHP type system deeply
3. Exceptions & error handling
4. Namespaces & autoloading (PSR-4)
5. PDO + prepared statements
6. MVC without framework
7. Then Laravel (optional)
