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
        // Truncar la tabla para evitar duplicados (solo para desarrollo)
        Producto::truncate();

        $path = public_path('images/productosNatier');
        $files = File::files($path);

        // Extensiones permitidas
        $extensionesValidas = ['jpg', 'jpeg', 'png', 'webp'];

        foreach ($files as $file) {
            $extension = strtolower($file->getExtension());

            // Verifica que sea una imagen válida
            if (!in_array($extension, $extensionesValidas)) {
                continue;
            }

            $nombreArchivo = $file->getFilename();
            $nombreSinExtension = pathinfo($nombreArchivo, PATHINFO_FILENAME);

            // Verifica si ya existe un producto con esa imagen
            $rutaImagen = 'images/productosNatier/' . $nombreArchivo;
            if (Producto::where('imagen', $rutaImagen)->exists()) {
                continue;
            }

            Producto::create([
                'nombre' => Str::title(str_replace(['-', '_'], ' ', $nombreSinExtension)),
                'descripcion' => 'Descripción de ejemplo para ' . $nombreSinExtension,
                'precio' => rand(500, 5000),
                'imagen' => $rutaImagen
            ]);
        }
    }
}
