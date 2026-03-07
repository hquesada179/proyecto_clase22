<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            ['name' => 'Laptops',        'description' => 'Computadoras portátiles para trabajo, estudio y gaming.'],
            ['name' => 'Periféricos',    'description' => 'Teclados, mouses, webcams y accesorios de entrada.'],
            ['name' => 'Monitores',      'description' => 'Pantallas para escritorio, gaming y diseño profesional.'],
            ['name' => 'Audio',          'description' => 'Audífonos, parlantes y equipos de sonido.'],
            ['name' => 'Almacenamiento', 'description' => 'SSD, discos duros y memorias USB.'],
            ['name' => 'Redes',          'description' => 'Routers, switches y accesorios de conectividad.'],
            ['name' => 'Tablets',        'description' => 'Tablets y accesorios para productividad móvil.'],
            ['name' => 'Componentes',    'description' => 'RAM, fuentes de poder y partes para armar PC.'],
        ];

        foreach ($categorias as $cat) {
            Category::create($cat);
        }
    }
}
