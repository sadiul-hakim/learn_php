| Format            | Description                           | Example                |
| ----------------- | ------------------------------------- | ---------------------- |
| `d`               | Day of month (2 digits, leading zero) | `01–31`                |
| `j`               | Day of month (no leading zero)        | `1–31`                 |
| `D`               | Day name (short)                      | `Mon`                  |
| `l` (lowercase L) | Day name (full)                       | `Monday`               |
| `N`               | ISO day of week (1=Mon, 7=Sun)        | `1–7`                  |
| `w`               | Day of week (0=Sun, 6=Sat)            | `0–6`                  |
| `z`               | Day of year (starting from 0)         | `0–365`                |
| `S`               | English ordinal suffix                | `st`, `nd`, `rd`, `th` |

| Format | Description             |
| ------ | ----------------------- |
| `W`    | ISO week number of year |

| Format | Description             | Example   |
| ------ | ----------------------- | --------- |
| `F`    | Month name (full)       | `January` |
| `M`    | Month name (short)      | `Jan`     |
| `m`    | Month (2 digits)        | `01–12`   |
| `n`    | Month (no leading zero) | `1–12`    |
| `t`    | Number of days in month | `28–31`   |

| Format | Description                                |
| ------ | ------------------------------------------ |
| `Y`    | Full year (4 digits)                       |
| `y`    | Short year (2 digits)                      |
| `L`    | Leap year (`1` = yes, `0` = no)            |
| `o`    | ISO year (can differ near year boundaries) |

| Format | Description                     | Example         |
| ------ | ------------------------------- | --------------- |
| `H`    | Hour (24-hour, 2 digits)        | `00–23`         |
| `G`    | Hour (24-hour, no leading zero) | `0–23`          |
| `h`    | Hour (12-hour, 2 digits)        | `01–12`         |
| `g`    | Hour (12-hour, no leading zero) | `1–12`          |
| `i`    | Minutes                         | `00–59`         |
| `s`    | Seconds                         | `00–59`         |
| `u`    | Microseconds                    | `000000–999999` |
| `v`    | Milliseconds                    | `000–999`       |
| `a`    | am / pm                         | `am`, `pm`      |
| `A`    | AM / PM                         | `AM`, `PM`      |

| Format | Description                       |          |
| ------ | --------------------------------- | -------- |
| `e`    | Timezone identifier               |          |
| `I`    | Daylight Saving Time (`1` or `0`) |          |
| `O`    | GMT offset                        | `+0200`  |
| `P`    | GMT offset with colon             | `+02:00` |
| `T`    | Timezone abbreviation             |          |
| `Z`    | Timezone offset in seconds        |          |

| Format | Description    |                                   |
| ------ | -------------- | --------------------------------- |
| `c`    | ISO 8601 date  | `2025-12-23T09:30:00+06:00`       |
| `r`    | RFC 2822 date  | `Tue, 23 Dec 2025 09:30:00 +0600` |
| `U`    | Unix timestamp | `1766106000`                      |
