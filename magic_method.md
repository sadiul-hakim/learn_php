These are **PHP Magic Methods**. They are special methods that PHP automatically calls in specific situations.
Think of them like **hooks into the PHP engine** — similar to Java’s constructors, `toString()`, `clone()`, serialization hooks, etc.

Below is a **clear use-case oriented explanation**, with short examples where it matters.

---

## 1️⃣ Object Lifecycle

### `__construct()`

**When:** Object is created
**Use case:** Initialize state, inject dependencies

```php
class User {
    public function __construct(public string $name) {}
}

$u = new User("Hakim");
```

👉 Like Java’s constructor.

---

### `__destruct()`

**When:** Object is destroyed (script ends or unset)
**Use case:** Cleanup resources (file handles, DB connections)

```php
class Logger {
    public function __destruct() {
        echo "Cleaning up...";
    }
}
```

⚠️ Avoid heavy logic here.

---

## 2️⃣ Method Overloading (Dynamic Calls)

### `__call($name, $arguments)`

**When:** Calling **non-existing instance method**
**Use case:** Proxies, dynamic APIs, ORMs

```php
class Repo {
    public function __call($name, $args) {
        echo "Method $name called";
    }
}

$r = new Repo();
$r->findByEmail("a@b.com");
```

---

### `__callStatic($name, $arguments)`

**When:** Calling **non-existing static method**

```php
class Util {
    public static function __callStatic($name, $args) {
        echo "Static call: $name";
    }
}

Util::doSomething();
```

👉 Used heavily in **Laravel facades**.

---

## 3️⃣ Property Overloading

### `__get($name)`

**When:** Reading inaccessible or missing property
**Use case:** Lazy loading, virtual properties

```php
class User {
    private array $data = ['email' => 'a@b.com'];

    public function __get($name) {
        return $this->data[$name] ?? null;
    }
}

echo $user->email;
```

---

### `__set($name, $value)`

**When:** Writing inaccessible property
**Use case:** Validation, DTOs

```php
public function __set($name, $value) {
    if ($name === 'age' && $value < 0) {
        throw new Exception("Invalid age");
    }
}
```

---

### `__isset($name)`

**When:** `isset($obj->prop)`
**Use case:** Control property existence

---

### `__unset($name)`

**When:** `unset($obj->prop)`
**Use case:** Remove dynamic properties

---

## 4️⃣ Serialization (Caching / Session / Queue)

### `__sleep()`

**When:** `serialize()`
**Use case:** Select properties to serialize

```php
public function __sleep() {
    return ['id', 'name'];
}
```

---

### `__wakeup()`

**When:** `unserialize()`
**Use case:** Reinitialize resources (DB, Redis)

---

### `__serialize()` (PHP 7.4+)

**Modern replacement for `__sleep()`**

```php
public function __serialize(): array {
    return ['id' => $this->id];
}
```

---

### `__unserialize(array $data)`

**Restore object state**

```php
public function __unserialize(array $data) {
    $this->id = $data['id'];
}
```

👉 Preferred in **new PHP versions**

---

## 5️⃣ Object Representation

### `__toString()`

**When:** Object used as string
**Use case:** Logging, debugging

```php
public function __toString() {
    return $this->name;
}
```

👉 Like Java’s `toString()`.

---

### `__debugInfo()`

**When:** `var_dump()`
**Use case:** Hide sensitive info

```php
public function __debugInfo() {
    return ['id' => $this->id];
}
```

---

## 6️⃣ Callable Objects

### `__invoke()`

**When:** Object used like a function
**Use case:** Middleware, handlers

```php
class Handler {
    public function __invoke($req) {
        return "Handled";
    }
}

$h = new Handler();
echo $h($request);
```

👉 Very common in frameworks.

---

## 7️⃣ Cloning

### `__clone()`

**When:** Object is cloned
**Use case:** Deep copy

```php
public function __clone() {
    $this->obj = clone $this->obj;
}
```

👉 Like Java’s `clone()` (but safer).

---

## 8️⃣ Static Export

### `__set_state(array $props)`

**When:** `var_export()`
**Use case:** Recreate object from array

```php
class Config {
    public static function __set_state($data) {
        return new self($data['value']);
    }
}
```

---

## 🔑 Summary Table

| Method                          | Purpose                 |
| ------------------------------- | ----------------------- |
| `__construct`                   | Initialize object       |
| `__destruct`                    | Cleanup                 |
| `__call` / `__callStatic`       | Dynamic method handling |
| `__get` / `__set`               | Property overloading    |
| `__sleep` / `__wakeup`          | Old serialization       |
| `__serialize` / `__unserialize` | Modern serialization    |
| `__toString`                    | String representation   |
| `__invoke`                      | Callable object         |
| `__clone`                       | Customize cloning       |
| `__set_state`                   | Rebuild from export     |
| `__debugInfo`                   | Debug output            |
