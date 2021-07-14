<?php


namespace App\Http\Domain\Common;


class Model
{
    public function __toString(): string
    {
        $arr = [];
        foreach ($this as $key=>$value) {
            $arr[$key] = $value;
        }
        return \json_encode($arr);
    }
}
