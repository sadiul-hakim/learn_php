In PHP, **Traits** are a way to **reuse code** in multiple classes. They are like “partial classes” that you can include inside real classes to share methods without using inheritance. Traits were introduced in **PHP 5.4**.

Let’s break down **Trait vs Class vs Interface** carefully:

---

### **1. Traits**

- **Purpose:** Code reuse across classes without inheritance.
- **Can contain:** Methods, properties, even abstract methods.
- **Cannot:** Be instantiated directly.
- **Usage:** `use` keyword inside a class.

**Example:**

```php
<?php
trait Logger {
    public function log($msg) {
        echo "[LOG]: $msg";
    }
}

class User {
    use Logger;
}

$user = new User();
$user->log("User created."); // Outputs: [LOG]: User created.
```

**Key points about traits:**

- A class can `use` multiple traits.
- Traits help avoid **multiple inheritance issues**.
- Traits can have conflicts if two traits define the same method; conflicts can be resolved with `insteadof` and `as`.

---

### **2. Classes**

- **Purpose:** Blueprint for objects.
- **Can contain:** Properties, methods, constants, constructor, destructor.
- **Can be instantiated.**
- **Inheritance:** A class can extend only **one parent class** (single inheritance).

**Example:**

```php
<?php
class Person {
    public $name;
    public function sayHello() {
        echo "Hello, I'm $this->name";
    }
}

class Employee extends Person {
    public function work() {
        echo "$this->name is working.";
    }
}
```

---

### **3. Interfaces**

- **Purpose:** Define a contract that classes must follow.
- **Can contain:** Only method signatures (no body), PHP 8.0+ allows constants and static methods.
- **Cannot:** Have properties (except constants).
- **Implementation:** A class `implements` an interface and must define all its methods.

**Example:**

```php
<?php
interface Payable {
    public function pay($amount);
}

class Employee implements Payable {
    public function pay($amount) {
        echo "Paid $amount to employee";
    }
}
```

**Key points:**

- Interfaces define **what** a class should do, not **how**.
- A class can implement **multiple interfaces**.

---

### **Comparison Table**

| Feature              | Class                 | Trait                      | Interface                 |
| -------------------- | --------------------- | -------------------------- | ------------------------- |
| Instantiable         | ✅ Yes                | ❌ No                      | ❌ No                     |
| Methods              | ✅ Yes                | ✅ Yes                     | ❌ Only signatures        |
| Properties           | ✅ Yes                | ✅ Yes                     | ❌ No (except constants)  |
| Multiple inheritance | ❌ No (only single)   | ✅ Can use multiple traits | ✅ Can implement multiple |
| Purpose              | Blueprint for objects | Reuse code across classes  | Define a contract         |

---

✅ **Summary:**

- **Class:** Defines objects, can extend one class.
- **Trait:** Reusable code for multiple classes, avoids multiple inheritance.
- **Interface:** Contract that a class must follow, ensures consistent API.
