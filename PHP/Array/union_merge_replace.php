<?php

union: {
    /*
        https://www.php.net/manual/en/language.operators.array.php
        
        appends the right array to the left array
        for keys that exist in both arrays
            the values from the left array will be used
            the values from the right array will be ignored
    */
    $left = [
        "a" => "apple",
        "b" => "banana",
        "d" => "durian",
        "melon",
    ];
    $right = [
        "peach",
        "a" => "pear",
        "b" => "strawberry",
        "c" => "cherry",
        "grape",
    ];
    $union = $left + $right;
    print_r($union);
    /* 
        Array
        (
            [a] => apple
            [b] => banana
            [d] => durian
            [0] => melon
            [c] => cherry
            [1] => grape
        )
     */
}

merge: {
    /*
        https://www.php.net/manual/en/function.array-merge
        
        the values of the right array are appended to the end of the left array
        for (non-numeric) keys that exist in both arrays
            the right value for the key will overwrite the left one
        if the arrays contain numeric keys
            the right value will not overwrite the left value, but will be appended
    */
    $left = [
        "number" => 5,
        "color" => "red",
        1,
        2,
        3,
    ];
    $right = [
        "a",
        2,
        "color" => "green",
        "shape" => "trapezoid",
    ];
    $merged = array_merge($left, $right);
    print_r($merged);
    /* 
        Array
        (
            [number] => 5
            [color] => green
            [0] => 1
            [1] => 2
            [2] => 3
            [3] => a
            [4] => 2
            [shape] => trapezoid
        )
     */
}

merge_recursive: {
    /*
        https://www.php.net/manual/en/function.array-merge-recursive
        
        the values of the right array are appended to the end of the left array
        for keys that exist in both arrays
            the values for these keys are merged together into an array
        if the arrays have the same numeric key
            the right value will not overwrite the left value, but will be appended
    */
    $left = [
        "color" => [
            "favorite" => ["red", "pink"],
        ],
        "shape" => "trapezoid",
        "letter" => "c",
        5,
    ];
    $right = [
        2,
        10,
        "color" => [
            "favorite" => "green",
            "blue",
        ],
        "shape" => "square",
        "number" => 4,
    ];
    $merged = array_merge_recursive($left, $right);
    print_r($merged);
    /* 
        Array
        (
            [color] => Array
                (
                    [favorite] => Array
                        (
                            [0] => red
                            [1] => green
                        )
                    [0] => blue
                )
            [shape] => Array
                (
                    [0] => trapezoid
                    [1] => square
                )
            [letter] => c
            [0] => 5
            [1] => 2
            [2] => 10
            [number] => 4
        )
     */
}

replace: {
    /*
        https://www.php.net/manual/en/function.array-replace
        
        replaces the values of the left array with the values from the right array
        if a key from the left array exists in the right array
            its value will be replaced by the value from the right array
        if a key from the right array does not exist in the left array
            it will be created in the left array
        if a key only exists in the left array
            it will be left as is
    */
    $left = [
        "orange",
        "banana",
        "apple",
        "raspberry",
    ];
    $right = [
        1 => "pineapple",
        4 => "cherry",
        "foo" => "bar",
    ];
    $replaced = array_replace($left, $right);
    print_r($replaced);
    /*
        Array
        (
            [0] => pineapple
            [1] => banana
            [2] => apple
            [3] => raspberry
            [4] => cherry
            [foo] => bar
        )
    */
}

replace_recursive: {
    /*
        https://www.php.net/manual/en/function.array-replace-recursive
        
        replaces the values of the left array with the values from the right array
        if a key from the left array exists in the right array
            its value will be replaced by the value from the right array
        if a key from the right array does not exist in the left array
            it will be created in the left array
        if a key only exists in the left array
            it will be left as is
        
        if the value in the left array is scalar
            it will be replaced by the value in the right array, may it be scalar or array
        if the value in the left array and the right array are both arrays
            recursion happens
    */
    $left = [
        "citrus" => [
            "orange",
        ],
        "berries" => [
            "blackberry",
            "raspberry",
        ],
        "apple",
        "foo" => "bar",
        "a" => "b",
    ];
    $right = [
        "citrus" => [
            "pineapple",
        ],
        "berries" => [
            "blueberry",
        ],
        "a" => "c",
        "qq" => "ww",
        "pear",
        "melon",
    ];
    $replaced = array_replace_recursive($left, $right);
    print_r($replaced);
    /*
        Array
        (
            [citrus] => Array
                (
                    [0] => pineapple
                )
            [berries] => Array
                (
                    [0] => blueberry
                    [1] => raspberry
                )
            [0] => pear
            [foo] => bar
            [a] => c
            [qq] => ww
            [1] => melon
        )
    */
    
}
