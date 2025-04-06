<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Producto;

class ProductosSeeder extends Seeder
{
    public function run()
    {
        $path = public_path('images/catalogoNatier');
        $files = File::files($path);

        foreach ($files as $file) {
            $nombreArchivo = $file->getFilename();
            $nombreSinExtension = pathinfo($nombreArchivo, PATHINFO_FILENAME);

            Producto::create([
                'nombre' => Str::title(str_replace('-', ' ', $nombreSinExtension)),
                'descripcion' => 'Descripción de ejemplo para ' . $nombreSinExtension,
                'precio' => rand(500, 5000), // precio aleatorio
                'imagen' => 'images/catalogoNatier/' . $nombreArchivo
            ]);
        }
    }
}
