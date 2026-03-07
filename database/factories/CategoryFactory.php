<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public function definition()
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

        $cat = fake()->randomElement($categorias);

        return [
            'name'        => $cat['name'],
            'description' => $cat['description'],
        ];
    }
}
