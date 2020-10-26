<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Category ID',
            'Nama Laptop',
            'Slug Laptop',
            'Gambar',
            'Harga',
            'Created_at',
            'uploaded_at',
            'uploaded_at',
        ];
    }

}
