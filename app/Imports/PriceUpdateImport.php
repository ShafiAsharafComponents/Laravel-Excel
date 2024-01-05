<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class PriceUpdateImport implements ToModel
{
    public function model(array $row)
    {
                    $product = Product::where('code', $row[2])->first();

                    if ($product) {
                        $product->update([
                            // 'name' => $row['Name'],
                            'price' => $row['4'],
                            // You can update other fields as needed
                        ]);
                        return $product;
                    } else {
                        // Code doesn't exist, create a new product
                        return Product::create([
                            'name' => $row[1],
                            'price' => $row[4],
                            'code' => $row[2],
                            // Set other fields accordingly
                        ]);
                    }

    }
}
