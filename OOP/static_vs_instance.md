# `->` vs `::` in PHP (Static vs Instance)

Think in **one simple rule** first 👇

> **`->` = object (instance)** > **`::` = class (static)**

---

## 1️⃣ `->` (Object / Instance Access)

### When to use `->`

Use `->` when you are working with a **created object**.

✔ Instance properties
✔ Instance methods

### Example

```php
class User
{
    public string $name;

    public function sayHello(): string
    {
        return "Hello " . $this->name;
    }
}

$user = new User();
$user->name = "Hakim";

echo $user->sayHello();
```

### What `->` really means

> “Call this **on this object**”

📌 Requires `new ClassName()`

---

## 2️⃣ `::` (Class / Static Access)

### When to use `::`

Use `::` when accessing **class-level members**.

✔ Static properties
✔ Static methods
✔ Constants

### Example

```php
class Math
{
    public const PI = 3.1416;
    public static int $count = 0;

    public static function square(int $x): int
    {
        return $x * $x;
    }
}

echo Math::PI;
echo Math::$count;
echo Math::square(5);
```

📌 No object required
📌 Memory efficient for utilities

---

## 3️⃣ Yes — PHP Has Static Methods & Properties

### Static Method

```php
class Math
{
    public static function add(int $a, int $b): int
    {
        return $a + $b;
    }
}

echo Math::add(10, 20);
```

### Static Property

```php
class Counter
{
    public static int $count = 0;

    public function __construct()
    {
        self::$count++;
    }
}
```

```php
new Counter();
new Counter();

echo Counter::$count; // 2
```

---

## 4️⃣ Inside the Class: `$this` vs `self::`

| Use case          | Syntax          |
| ----------------- | --------------- |
| Instance property | `$this->name`   |
| Instance method   | `$this->save()` |
| Static property   | `self::$count`  |
| Static method     | `self::add()`   |
| Constant          | `self::PI`      |

---

## 5️⃣ ❌ Invalid Combinations (Common Mistakes)

```php
$this::PI        // ❌ wrong
$this->PI        // ❌ wrong
self->method()   // ❌ wrong
Math->square()   // ❌ wrong
```

---

## 6️⃣ `static::` (Late Static Binding)

Used when **subclasses should override static behavior**.

```php
class Model
{
    public static function table(): string
    {
        return static::class;
    }
}

class User extends Model {}

echo User::table(); // User
```

If you used `self::` → output would be `Model`.

---

## 7️⃣ When to Use Static vs Instance (Design Rules)

### ✅ Use INSTANCE (`->`) when:

✔ Method depends on object state
✔ Uses `$this`
✔ Represents behavior of a real object

```php
$user->activate();
$order->calculateTotal();
```

---

### ✅ Use STATIC (`::`) when:

✔ Utility/helper logic
✔ No object state
✔ Global-like behavior

```php
Math::roundUp();
StringUtil::slugify();
DateHelper::now();
```

---

## 8️⃣ Java Comparison (Important for You)

| Concept         | PHP               | Java             |
| --------------- | ----------------- | ---------------- |
| Instance method | `$obj->method()`  | `obj.method()`   |
| Static method   | `Class::method()` | `Class.method()` |
| Static property | `Class::$x`       | `Class.x`        |
| Constant        | `Class::CONST`    | `static final`   |

---

## 🧠 One-Line Rule to Memorize

> **If you need `new` → use `->`** > **If you don’t need `new` → use `::`**

---

## 🔥 Final Takeaway

- `->` = object behavior
- `::` = class behavior
- PHP fully supports static methods & properties
- Abuse of static = bad design
- Utility classes = perfect use case
