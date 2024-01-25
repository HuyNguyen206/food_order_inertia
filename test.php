<?php
function test($a) {
    switch ($a) {
        case 'sdsd':
            echo 'hello';
            break;
        case 2:
            echo 'good bye';
            break;
        case [1,2,3]:
            echo 'nice';
            break;
//        default:
//            echo $a;
    }

    echo 'this is the end';
}

test([1,2,3]);
