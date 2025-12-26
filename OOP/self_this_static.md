# `$this` vs `self::` vs `static::` (PHP 8+)

Think in **three dimensions**:

1. **Object vs Class**
2. **Instance vs Static**
3. **Early vs Late Binding**

---

## 1️⃣ `$this` — _Current Object Instance_

### What it means

`$this` refers to the **current object** (runtime instance).

### Used for

- Instance properties
- Instance methods

### Rules

✔ Only inside **non-static methods**
❌ Cannot access constants or static members

### Example

```php
class User
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
```

### Java equivalent

```java
this.name
```

---

## 2️⃣ `self::` — _Current Class (Compile-time binding)_

### What it means

`self::` refers to the **class where the method is defined**, NOT the subclass.

📌 This is **early binding**

### Used for

- Class constants
- Static properties
- Static methods

### Example

```php
class Math
{
    public const PI = 3.14;

    public function area(float $r): float
    {
        return self::PI * ($r ** 2);
    }
}
```

Even if you extend the class, `self::` **does NOT change**.

---

## 3️⃣ `static::` — _Called Class (Late Static Binding)_

### What it means

`static::` refers to the **class that was actually called at runtime**.

📌 This is **late binding**
📌 Similar to **polymorphism for static members**

---

## ⚔ `self::` vs `static::` (The Key Difference)

### Example that shows the difference clearly

```php
class Shape
{
    public const TYPE = 'shape';

    public static function getType(): string
    {
        return self::TYPE;
    }
}

class Circle extends Shape
{
    public const TYPE = 'circle';
}

echo Circle::getType();
```

### Output

```
shape
```

Because `self::` is bound to `Shape`.

---

### Now change `self::` → `static::`

```php
class Shape
{
    public const TYPE = 'shape';

    public static function getType(): string
    {
        return static::TYPE;
    }
}
```

### Output

```
circle
```

✅ Runtime class (`Circle`) is used.

---

## 🧠 Summary Table (Memorize This)

| Keyword    | Refers to      | Binding      | Java analogy |
| ---------- | -------------- | ------------ | ------------ |
| `$this`    | Current object | Runtime      | `this`       |
| `self::`   | Current class  | Compile-time | `ClassName.` |
| `static::` | Called class   | Runtime      | Polymorphism |

---

## 🧩 When to Use What (Practical Rules)

### Use `$this` when:

✔ Accessing object state
✔ Non-static methods

```php
$this->email
$this->save()
```

---

### Use `self::` when:

✔ Constants
✔ Utility methods
✔ Behavior should NOT change in subclasses

```php
self::PI
self::validate()
```

---

### Use `static::` when:

✔ You expect subclasses to override behavior
✔ Factory methods
✔ Fluent interfaces

```php
static::create()
static::TABLE
```

---

## 🔥 Real-World Example (Factory Pattern)

```php
class Model
{
    public static function create(): static
    {
        return new static();
    }
}

class User extends Model {}

$user = User::create(); // returns User, not Model
```

If you used `self` → ❌ would return `Model`.

---

## ⚠ Common Mistakes

❌ `$this::PI`
❌ `self->property`
❌ `static->method()`

✔ `$this->property`
✔ `self::CONST`
✔ `static::method()`

---

## 🎯 Mental Model (One Line)

> `$this` = **object**

> `self::` = **where method is written**

> `static::` = **who called the method**
