<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition()
    {
        $productos = [
            [
                'name'        => 'Laptop Gamer X15',
                'description' => 'Procesador Intel Core i7-12700H, 16 GB RAM DDR5, GPU NVIDIA RTX 3060 6 GB. Pantalla 15.6" FHD 144 Hz. Ideal para gaming intensivo y diseño gráfico.',
                'price'       => 4590000,
            ],
            [
                'name'        => 'Teclado Mecánico RGB Pro',
                'description' => 'Switches mecánicos Red lineales, retroiluminación RGB por tecla, estructura de aluminio anodizado. Compatible con Windows y Mac.',
                'price'       => 189000,
            ],
            [
                'name'        => 'Monitor UltraWide 34"',
                'description' => 'Panel IPS 3440×1440, 75 Hz, tiempo de respuesta 5 ms. Perfecto para multitarea y edición de video. Incluye soporte VESA.',
                'price'       => 1250000,
            ],
            [
                'name'        => 'Mouse Inalámbrico Ergo',
                'description' => 'Diseño ergonómico vertical, sensor óptico 4000 DPI, conexión USB-A o Bluetooth 5.0. Batería hasta 60 días de uso.',
                'price'       => 95000,
            ],
            [
                'name'        => 'SSD NVMe 1 TB',
                'description' => 'Velocidad de lectura hasta 3500 MB/s. Interfaz M.2 PCIe Gen 3. Compatible con laptops y PCs de escritorio modernos.',
                'price'       => 220000,
            ],
            [
                'name'        => 'Audífonos Bluetooth Max',
                'description' => 'Cancelación activa de ruido ANC, 30 h de batería, drivers de 40 mm. Conectividad Bluetooth 5.2 y entrada jack 3.5 mm incluida.',
                'price'       => 380000,
            ],
            [
                'name'        => 'Webcam Full HD 1080p',
                'description' => 'Resolución 1080p a 30 fps, micrófono estéreo integrado con reducción de ruido, autofoco automático. Compatible con Zoom, Teams y Meet.',
                'price'       => 145000,
            ],
            [
                'name'        => 'Router WiFi 6 AX3000',
                'description' => 'Velocidad combinada hasta 3000 Mbps, cobertura hasta 200 m², 4 antenas externas de alta ganancia. Retrocompatible con WiFi 5 y anteriores.',
                'price'       => 310000,
            ],
            [
                'name'        => 'Tablet Pro 11"',
                'description' => 'Pantalla AMOLED 2K, procesador octa-core, 8 GB RAM, 256 GB almacenamiento interno. Compatible con stylus y teclado Bluetooth.',
                'price'       => 1890000,
            ],
            [
                'name'        => 'Smartwatch Active 2',
                'description' => 'Monitor de frecuencia cardíaca y SpO2, GPS integrado, resistencia al agua 5 ATM. Batería hasta 14 días en modo ahorro.',
                'price'       => 490000,
            ],
            [
                'name'        => 'Fuente de Poder 750W 80+ Gold',
                'description' => 'Certificación 80 Plus Gold, diseño modular completo, ventilador silencioso de 135 mm. Compatible con GPUs de última generación.',
                'price'       => 340000,
            ],
            [
                'name'        => 'Hub USB-C 7 en 1',
                'description' => 'Puertos: HDMI 4K 60 Hz, USB-A ×3, USB-C Power Delivery 100 W, lector SD y microSD. Compatible con MacBook, iPad Pro y laptops Windows.',
                'price'       => 89000,
            ],
            [
                'name'        => 'Memoria RAM DDR5 32 GB',
                'description' => 'Kit 2×16 GB DDR5 5200 MHz, latencia CL40. Compatible con plataformas Intel Alder Lake y Raptor Lake. Disipador de aluminio incluido.',
                'price'       => 410000,
            ],
            [
                'name'        => 'Disco Duro Externo 2 TB',
                'description' => 'Interfaz USB 3.0, velocidad de transferencia hasta 130 MB/s. Compatible con Windows, macOS y consolas de juego PS4/PS5.',
                'price'       => 175000,
            ],
            [
                'name'        => 'Parlante Portátil BT 360',
                'description' => 'Sonido omnidireccional 360°, resistencia al agua IPX7, autonomía de 20 horas. Bluetooth 5.0 con conexión multipoint a dos dispositivos.',
                'price'       => 210000,
            ],
            [
                'name'        => 'Cámara de Seguridad IP 2K',
                'description' => 'Resolución 2K 3 MP, visión nocturna a color, detección de movimiento por IA. Almacenamiento local en microSD hasta 128 GB o nube.',
                'price'       => 130000,
            ],
        ];

        $producto = fake()->randomElement($productos);

        return [
            'name'        => $producto['name'],
            'description' => $producto['description'],
            'price'       => $producto['price'],
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
