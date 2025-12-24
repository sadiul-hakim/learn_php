| Function             | What it does                  | Common Use Case                              |
| -------------------- | ----------------------------- | -------------------------------------------- |
| `count()`            | Counts number of elements     | Check how many records were returned from DB |
| `array_push()`       | Adds element(s) to the end    | Append new items to a list                   |
| `array_pop()`        | Removes last element          | Stack-like behavior                          |
| `array_shift()`      | Removes first element         | Queue processing                             |
| `array_unshift()`    | Adds element to beginning     | Prepend default values                       |
| `in_array()`         | Checks if value exists        | Validate input against allowed values        |
| `array_key_exists()` | Checks if key exists          | Prevent “undefined index” errors             |
| `array_keys()`       | Returns all keys              | Extract column names                         |
| `array_values()`     | Returns all values            | Re-index array after unset                   |
| `array_merge()`      | Merges arrays                 | Combine config or request data               |
| `array_unique()`     | Removes duplicates            | Clean user-submitted data                    |
| `array_filter()`     | Filters elements by condition | Remove empty / invalid values                |
| `array_map()`        | Transforms each element       | Format data before output                    |
| `array_reduce()`     | Reduces array to single value | Calculate totals, sums                       |
| `array_search()`     | Finds key of a value          | Locate record index                          |
| `sort()`             | Sorts values (re-indexed)     | Simple ascending sort                        |
| `asort()`            | Sorts values, keeps keys      | Sort associative arrays                      |
| `ksort()`            | Sorts by keys                 | Sort config arrays                           |
| `array_slice()`      | Extracts portion of array     | Pagination                                   |
| `array_splice()`     | Remove/replace portion        | Modify array in place                        |
