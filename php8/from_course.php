<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// goto MatchExpression;
// goto NamedArguments;
// goto NullsafeOperator;
// goto ConstructorPropertyPromotion;
// goto UnionTypes;
// goto IntersectionTypes;
// goto WeakMaps;
// goto php8functions;
// goto AttributesAnnotations;
// goto ConstantsInTraits;
// goto Enums;
// goto ReadonlyPropertiesAndClasses;
// goto Fibers;
// goto Closures;
// goto ClosuresInLaravel;
// goto MethodsChaining;
// goto Facade;
// goto DependencyInjection;
// goto Interfaces;
// goto MagicMethods;
// goto FunctionComposition;


return;
FunctionComposition:
//  Function composition
class Pipeline {
    private array $functions;

    public function __construct(...$functions) {
        $this->functions = $functions;
    }

    public function process(/*$input*/) {
        return array_reduce(
            // array_reverse($this->functions),
            // fn($acc, $func) => $func($acc),
            // $input
            $this->functions,
            fn($acc, $func) => fn($x) => $func($acc($x)),
            fn($x) => $x
        );
    }
}
$double = fn($x) => $x*2;
$increment = fn($x) => $x+1;
$square = fn($x) => $x*$x;
$pipeline = new Pipeline($double, $increment, $square);

// echo $pipeline->process(5);
echo $pipeline->process()(5);

// $pipeline = fn($x) =>
//     (fn($x) => $x*$x)(
//         (fn($x) => $x+1)(
//             (fn($x) => $x*2)($x)
//         )
//     );
// echo $pipeline(5);

return;
MagicMethods:
// Magic methods
class Greeter {
    public function __invoke($name) {
        echo "Hello, $name!";
    }
}
$greet = new Greeter();
$greet('John'); 

class Math {
    public function __call($name, $arguments) {
        if ($name === 'sum') {
            return array_sum($arguments);
        }
        throw new Exception("Method $name doesn't exist");
    }

    public static function __callStatic($name, $arguments) {
        if ($name === 'product') {
            return array_product($arguments);
        }
        throw new Exception("Static method $name doesn't exist");
    }
}

$math = new Math();
echo $math->sum(1, 2, 3);
echo Math::product(2, 3, 4);

class DynamicProperties {
    private $data = [];
    public function __get($name) {
        return $this->data[$name] ?? null;
    }
    public function __set($name, $value) {
        echo "<br>$name,$value";
        $this->data[$name] = $value;
    }
}
$obj = new DynamicProperties();
$obj->email = 'test@example.com'; // Calls __set()
echo "<br>$obj->email"; // Calls __get(), outputs: test@example.com

return;
Interfaces:
// Interfaces
interface NotificationService {
    public function send($to, $message);
}

class EmailNotification implements NotificationService {
    public function send($to, $message) {
        echo "Sending email to $to: $message";
    }
}

class SMSNotification implements NotificationService {
    public function send($to, $message) {
        echo "Sending SMS to $to: $message";
    }
}

class OrderProcessor {
    private $notifier;

    public function __construct(NotificationService $notifier) {
        $this->notifier = $notifier;
    }

    public function processOrder($order) {
        // Process order...
        $this->notifier->send($order['email'], "Your order #{$order['id']} was processed");
    }
}

$order = ['id' => 123, 'email' => 'user@example.com'];
$emailProcessor = new OrderProcessor(new EmailNotification());
$emailProcessor->processOrder($order);

$smsProcessor = new OrderProcessor(new SMSNotification());
$smsProcessor->processOrder($order);

return;
DependencyInjection:
// Dependency Injection
// 1. A class with some functionality
class Logger {
    public function log($message) {
        echo "Logging: $message";
    }
}
// 2. A class that needs the Logger (the dependent class)
class UserService {
    private $logger;

    // Logger is injected through the constructor
    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    public function createUser($name) {
        $this->logger->log("Creating user: $name");
        return "User $name created!";
    }
}
// 3. Usage
$logger = new Logger(); // Create the dependency
$userService = new UserService($logger); // Inject it
echo $userService->createUser("John");


return;
Facade:
// Facade
class Service {
    public function doSomething() {
        return "Service is doing something.";
    }
}
class FacadeForService {
    protected static $serviceInstance;

    public static function __callStatic($method, $arguments) {
        // echo $method;print_r($arguments);
        $serviceName = get_called_class();
        $serviceName = str_replace('FacadeFor', '', $serviceName);
        $instance = self::getServiceInstance($serviceName);
        // echo $serviceName;
        return $instance->$method(...$arguments);
    }

    public static function getServiceInstance($serviceName) {
        if (!self::$serviceInstance) {
            self::$serviceInstance = new $serviceName();
            // real code: locate service in service container
        }
        return self::$serviceInstance;
    }
}
echo FacadeForService::doSomething();

return;
MethodsChaining:
//  Methods Chaining
response()->json(['name' => 'John', 'age' => 30]);
function response() {
    return new class {
        public function json($data) {
            header('Content-Type: application/json');
            echo json_encode($data);
            // exit;
        }
    };
}
function response2() {
    return new class {
        public $data;
        public function json($data) {
            $this->data = $data;
            return $this;
        }
        public function send() {
            header('Content-Type: application/json');
            echo json_encode($this->data);
            // exit;
        }
    };
}
response2()->json(['name' => 'John', 'age' => 30])->send();

return;
ClosuresInLaravel:
// Closures in Laravel
class Router
{
    protected $routes = [];
    protected $middleware;

    public function get($path, Closure $action)
    {
        $this->routes[$path] = $action;
        return $this; // So we can chain middleware()
    }

    public function simulateRequest($path)
    {
        if (isset($this->routes[$path])) {
            $action = $this->routes[$path];
            // echo $action();
            $request = ['smth' => '<h1>a</h1>']; 
            if ($this->middleware) {
                echo $this->middleware->handle($request,$action);
            } else {
                echo call_user_func($action, $request);
            }
        } else {
            echo "404 Not Found";
        }
    }
    
    public function middleware($middleware)
    {
        $this->middleware = $middleware;
    }
}

class Middleware
{
    public function handle($request, Closure $next)
    {
        // Perform some operation before the request
        $request = ['smth' => strip_tags($request['smth'])];
        $response = "request phase<br>";
        $response .= $next($request);
        $response .= "resposne phase<br>";
        return $response;
    }
}

$router = new Router();

$router->get('/hello', function ($request) {
    return "Hello, World!" . $request['smth'];
});
$router->get('/middleware', function ($request) {
    return "This route has middleware." . $request['smth'];
})->middleware(new Middleware());
// $router->simulateRequest('/hello');
$router->simulateRequest('/middleware');

return;
Closures:
// Closures
$fn = function () {
    return 'result';
};
$fn2 = fn() => 'result <br>';
echo $fn2();

function operate($item, $callback = null)
{
    if ($callback) return $callback($item);
    $item = $item * 2;
    return $item;
}
echo operate(10, fn($item) => $item * 3);

return;
Fibers:
// Fibers
$fiber = new Fiber(function () {
    echo "Fiber started<br>";
    $value = Fiber::suspend("Suspending...");
    echo "Fiber resumed with value: $value<br>";
});
echo "Starting fiber...<br>";
$value = $fiber->start(); // Starts the fiber, execution pauses at suspend()
echo "Fiber suspended, returned value: $value<br>";
$fiber->resume("Hello from resume!");
echo "Fiber has completed<br>";

function asyncTask(): Fiber {
    return new Fiber(function () {
        echo "Doing async work...<br>";
        Fiber::suspend(); // Pause here
        echo "Resuming work...<br>";
    });
}
$fiber = asyncTask();
$fiber->start();
echo 'doing another async task <br>';
$fiber->resume();

// Make API calls with rate limiting
$apiCaller = new Fiber(function() {
    $queries = ['products', 'users', 'orders'];
    foreach ($queries as $query) {
        echo "Fetched $query data<br>";
        Fiber::suspend(); // Pause to respect rate limit
    }
    return "All API calls done!";
});
$apiCaller->start();
while (!$apiCaller->isTerminated()) {
    echo 'other operation <br>';
    sleep(1); // Enforce 1-second delay between calls
    $apiCaller->resume();
}
echo $apiCaller->getReturn();

return;
ReadonlyPropertiesAndClasses:
// Readonly Properties and classes
readonly class User2 {
    public function __construct(
        public readonly string $name,
        public readonly string $email,
    ) {}
}
$user = new User2("Alice", "alice@example.com");
$user->name = "Bob"; 

return;
Enums:
// Enums
enum Status: string {
    case Draft = 'draft';
    case Published = 'published';
    case Archived = 'archived';
}
function getStatusMessage(Status $status): string {
    return match ($status) {
        Status::Draft => 'The status is draft.',
        Status::Published => 'The status is published.',
        Status::Archived => 'The status is archived.',
    };
}
$status = Status::Published;
echo getStatusMessage($status); 

return;
ConstantsInTraits:
// Constants in Traits
trait ExampleTrait {
    public const EXAMPLE = 'example';
}
class MyClass2 {
    use ExampleTrait;
}
echo MyClass2::EXAMPLE;
return;
// Attributes (Annotations)
AttributesAnnotations:
#[Attribute]
class Example 
{
    public function __construct(public string $description) {}
}

#[Example("This is an example class")]
class MyClass
{
    #[Example("This is an example method")]
    public function myMethod() {}
}

// $attr = (new ReflectionClass(MyClass::class))
//     ->getAttributes(Example::class)[0]
//     ->newInstance();
$attr = (new ReflectionMethod(MyClass::class, 'myMethod'))
    ->getAttributes(Example::class)[0]
    ->newInstance();
var_dump($attr->description);
return;
// php 8 functions and classes
php8functions:
echo str_contains('some huge sentence bla bla', 'bla');
echo str_starts_with('haystack', 'hay');
echo str_ends_with('haystack', 'stack');
$a = array_fill(-5, 4, 'aaa');
var_dump($a);

// Weak Maps
WeakMaps:
// 1. Create a WeakMap
$metadata = new WeakMap();
// 2. Create an object
$user = new class ('John') {
    public function __construct(public $name) {}
};
// 3. Store metadata about the object
$metadata[$user] = ['created_at' => date('Y-m-d'), 'access_count' => 0];
// 4. Access the metadata
echo "User created at: " . $metadata[$user]['created_at'] . "<br>";
// 5. Increment access count
$metadata[$user]['access_count']++;
echo "Access count: " . $metadata[$user]['access_count'] . "<br>";
echo "Metadata entries: " . count($metadata) . "<br>";
// 6. When the object is destroyed...
unset($user); // Remove the only reference to the object
// 7. The metadata is automatically cleaned up
echo "Metadata entries: " . count($metadata) . "<br>"; // Output: 0
return;
// Intersection Types
IntersectionTypes:
function process((Countable & Iterator)|string $input)
{
    if (is_string($input)) {
        echo "String: $input";
    } else {
        echo "Count: " . $input->count();
    }
}
process(2);
return;
// Union Types
UnionTypes:
class Example
{
    public function foo(string|int|array|float $arg): string|int|array|float
    {
        return $arg * 2;
        return $arg;
    }
}
// print_r((new Example)->foo([1,2,3]));
print_r((new Example)->foo(2.52));
return;
// Constructor Property Promotion
ConstructorPropertyPromotion:
class User
{
    public function __construct(public $name, public  int $age)
    {
        
    }
}
// class User
// {
//     public $name;
//     public $age;

//     public function __construct($name, $age)
//     {
//         $this->name = $name;
//         $this->age = $age;
//     }
// }
$user = new User('John', 35);
echo $user->name. ' '. $user->age;
return;
// Nullsafe Operator
NullsafeOperator:
class User
{
    public function address()
    {
        // return new Address();
        return null;
    }
}
class Address
{
    public function country()
    {
        return 'USA';
    }
}
$user = new User();
echo $user?->address()?->country() ?? 'homeless';
return;
// Named Arguments
NamedArguments:
function person($name, $lastName, $age, $address = null, $bio = null)
{
    echo 'Hello ' . $name . ' ' . $lastName . '. You are ' . $age . ' years old.';
    if ($address) echo 'You live in ' . $address;
    if ($bio) echo 'This is your bio: ' . $bio;
}
// person('Robert', 'Apollo', 14, null, 'My bio');
person(name: 'Robert', lastName: 'Apollo', age: 14, bio: 'My bio' );

class A
{
    public function __construct($name, $age)
    {
        echo "<br>Hello $name. You are $age years old";
    }
}
new A(age: 3, name: 'Adam');
return;
MatchExpression:
// Match Expression
$name = 'Adam';
$message = match ($name) {
    'Robert' => "Hello Robert",
    'John' => "Hello John",
    'Jane' => "Hello Jane",
    'Adam', 'Eva' => "Hello there. You are the first on the Earth!",
    default => 'Hello unkown'
};
echo $message;
return;
$name = 'Robert';
switch ($name) {
    case 'Robert':
       $message = 'Hello Robert'; 
       break;
    case 'John':
        $message = 'Hello John';
        break;
    case 'Jane':
        $message = 'Hello Jane';
        break;
    case 'Adam':
    case 'Eva':
        $message = 'Hello there. You are the first on the Earth!';
        break;
    default:
        $message = "Hello unkown";
}
echo $message;
echo 'Hello world! ' . PHP_VERSION;