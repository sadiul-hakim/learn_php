<?php

class Service{
    public function doSomething(){
        return "Service is doing something.";
    }
}

// This Facade is only for the Service class
// PHP allows strings to be used as class names and method names.
class FacadeForService{
    protected static $serviceInstance;
    public static function __callStatic($name, $arguments)
    {
        $servicename = get_called_class();
        $servicename = str_replace('FacadeFor','',$servicename);
        $instance = self::getServiceInstance($servicename);
        /**
         * PHP allows dynamic method calls using variable method names.
         * $name = "hello";
         * $instance->$name();
         */
        return $instance -> $name(...$arguments);
    }

    public static function getServiceInstance($serviceName){
        if(!self::$serviceInstance){
            /**
             * If a variable contains a valid class name string, PHP can instantiate it.
             * $serviceName = "UserService";
             * $instance = new $serviceName();
             */
            self::$serviceInstance = new $serviceName();
        }

        return self::$serviceInstance;
    }
}

echo FacadeForService::doSomething();