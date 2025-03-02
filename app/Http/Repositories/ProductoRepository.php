<?php

namespace App\Http\Repositories;

use App\Models\Core\Configuration;
use App\Models\Producto;
use App\Models\Subastalo\ValuationPercentageState;

class ProductoRepository
{
    protected $product;
    public function __construct(Producto $product)
    {
        $this->product = $product;
    }

    public function countTotalOfProducts()
    {
        return $this->product::count();
    }
}
