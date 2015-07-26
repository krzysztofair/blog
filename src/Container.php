<?php namespace Blog;

use ReflectionClass;

class Container
{
    protected $singletons = [];

    public function resolve($class, $args = [])
    {
        $reflection = new ReflectionClass($class);
        $constructor = $reflection->getConstructor();

        if( ! $constructor)
        {
            return new $class;
        }

        $singleton = $this->isSingleton($constructor);

        $parameters = $constructor->getParameters();

        if(count($parameters) === 0)
        {
            return $this->createObjectWithoutParameters($class, $singleton);
        }

        if($singleton)
        {
            if(isset($this->singletons[$class]))
            {
                return $this->singletons[$class];
            }
        }

        $dependecies = $this->resolveDependencies($parameters, $args);

        $object = $reflection->newInstanceArgs($dependecies);

        if($singleton) $this->singletons[$class] = $object;

        return $object;
    }

    /**
     * @param $constructor
     * @return bool
     */
    private function isSingleton($constructor)
    {
        $doc = $constructor->getDocComment();

        return strpos($doc, "@singleton") !== false;
    }

    /**
     * @param $class
     * @param $singleton
     * @return mixed
     */
    private function createObjectWithoutParameters($class, $singleton)
    {
        if ($singleton) {
            $object = (isset($this->singletons[$class])) ? $this->singletons[$class] : new $class;
            $this->singletons[$class] = $object;

            return $object;
        }

        return new $class;
    }

    /**
     * @param $parameters
     * @return array
     */
    private function resolveDependencies($parameters, $args = [])
    {
        $dependecies = [];
        $i = 0;

        foreach ($parameters as $parameter) {

            if (is_null($parameter->getClass())) {

                if(isset($args[$i])) $dependecies[] = $args[$i];
                else $dependecies[] = null;

                $i++;
                continue;
            }

            $dependecy = $this->resolve(
                $parameter->getClass()->getName()
            );

            $dependecies[] = $dependecy;
        }
        return $dependecies;
    }
}
