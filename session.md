## 1️⃣ How PHP Sessions Work

When you use `$_SESSION` in PHP:

```php
session_start(); // must be called before any output
$_SESSION['user'] = ['username' => $user['name'], 'email' => $user['email']];
```

- PHP **doesn’t store sessions in memory for all users** at once.
- Instead, each user/browser gets a **unique session ID** (`PHPSESSID`) stored in a **cookie**.

### Flow:

1. User logs in. PHP generates a **session ID** if none exists.
2. PHP stores `$_SESSION` data **on the server**, usually in `C:\xampp\tmp` on Windows (or `/tmp` on Linux).
3. PHP sends the session ID to the browser via cookie:

```
Set-Cookie: PHPSESSID=abc123; path=/
```

4. On the next request, the browser sends back the cookie:

```
Cookie: PHPSESSID=abc123
```

5. PHP reads the session ID and loads the corresponding `$_SESSION` data from the server.

---

## 2️⃣ Important points

- **Each user has their own `$_SESSION`**. One user’s `$_SESSION['user']` will **not overwrite another user’s session**.
- The key is the **session ID in the cookie**. PHP uses that to isolate users.
- Sessions are **per browser**. If the same user opens another browser, it’s a separate session.

---

## 3️⃣ Where session data is stored

- By default in PHP (XAMPP) sessions are stored as **files** on disk:

```
C:\xampp\tmp\sess_<sessionid>
```

- You can configure this in `php.ini`:

```ini
session.save_path = "C:\xampp\tmp"
session.save_handler = files
```

- Each file contains serialized PHP array for that user.

---

## 4️⃣ Example

```php
// login.php
session_start();
$_SESSION['user'] = ['username' => 'Hakim', 'email' => 'hakim@example.com'];

// Another user logs in from a different browser
// PHP generates a new session ID and creates a separate session file
```

- Both users have `$_SESSION['user']` independently.
- Only when the **same session ID** is reused (same browser or cookie) does PHP overwrite `$_SESSION`.

---

## 5️⃣ Things to remember

1. Always call `session_start()` **before any output**.
2. For logout:

```php
session_start();
session_unset();
session_destroy();
```

- Clears the session for that user only.

3. Don’t store sensitive info directly in session without proper security.

---

✅ **Summary**

- Sessions are **per-user**, isolated by session ID.
- Stored on the **server** (default: files).
- Browser sends **cookie with session ID**.
- One user logging in will **not overwrite another user’s session**.
