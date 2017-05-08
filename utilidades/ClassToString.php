<?php
/**
 * Created by PhpStorm.
 * User: matiasvenegas
 * Date: 05-05-2017
 * Time: 14:32
 *  *
 */
function ClassToString($class){
    $joinedProperties = array();
    do {
        $reflection = new ReflectionClass($class);
        $staticProperties = $reflection->getDefaultProperties();
        foreach ($staticProperties as $name => $value) {
            $value = $reflection->getProperty($name);
            $value->setAccessible(true);
            $value = $value->getValue($class);
            if($value != null) {
                if (is_array($value)) {
                    for($i = 0; $i < sizeof($value); $i++) {
                        $joinedProperties[$name][] = ClassToString($value[$i]);
                    }
                } else {
                        $joinedProperties[$name] = $value;
                }
            }
        }
    } while ($class = get_parent_class($class));
    return $joinedProperties;
}
?>