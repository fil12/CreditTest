<?php


namespace App\Http\Domain\Product;


use App\Http\Domain\Common\Model;

class Product extends Model
{
    protected $id;
    protected $title;
    protected $percent;
    protected $minSum;
    protected $maxSum;

    /**
     * Product constructor.
     * @param $id
     * @param $title
     * @param $percent
     * @param $minSum
     * @param $maxSum
     */
    public function __construct(int $id, string $title, int $percent, int $minSum, int $maxSum)
    {
        $this->id = $id;
        $this->title = $title;
        $this->percent = $percent;
        $this->minSum = $minSum;
        $this->maxSum = $maxSum;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getPercent(): int
    {
        return $this->percent;
    }

    /**
     * @return int
     */
    public function getMinSum(): int
    {
        return $this->minSum;
    }

    /**
     * @return int
     */
    public function getMaxSum(): int
    {
        return $this->maxSum;
    }
}
