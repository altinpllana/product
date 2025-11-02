<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('products.index'));

Route::get('/products', function () {
    $products = [
        ['id' => 1, 'title' => 'Aurora Peak Camera', 'price' => 1299.00, 'image' => 'https://picsum.photos/seed/cam1/800/600', 'description' => 'Mirrorless body with fast autofocus.', 'details' => '24MP full-frame, 4K60, weather sealed, dual slots.'],
        ['id' => 2, 'title' => 'Zephyr Drone Mini', 'price' => 699.00, 'image' => 'https://picsum.photos/seed/drone2/800/600', 'description' => 'Compact aerial footage with stabilized 4K.', 'details' => '34-min flight, 10km range, 3-axis gimbal.'],
        ['id' => 3, 'title' => 'Everlite LED Panel', 'price' => 249.00, 'image' => 'https://picsum.photos/seed/light3/800/600', 'description' => 'Bi-color lighting for golden hour.', 'details' => '3200–5600K, CRI 95+, USB-C PD.'],
        ['id' => 4, 'title' => 'Trailblazer Tripod', 'price' => 189.00, 'image' => 'https://picsum.photos/seed/tripod4/800/600', 'description' => 'Carbon-fiber travel tripod.', 'details' => '1.1kg, 155cm max height, Arca head.'],
        ['id' => 5, 'title' => 'Summit Pro Lens 35mm', 'price' => 899.00, 'image' => 'https://picsum.photos/seed/lens5/800/600', 'description' => 'Dreamy bokeh and sharpness.', 'details' => 'f/1.4, weather sealed.'],
        ['id' => 6, 'title' => 'Cascade Mic Duo', 'price' => 349.00, 'image' => 'https://picsum.photos/seed/mic6/800/600', 'description' => 'Dual wireless lav kit.', 'details' => '48kHz/24-bit, noise suppression.'],
        ['id' => 7, 'title' => 'Nomad Camera Strap', 'price' => 59.00, 'image' => 'https://picsum.photos/seed/strap7/800/600', 'description' => 'Quick-adjust sling.', 'details' => 'Recycled webbing, quick-release anchors.'],
        ['id' => 8, 'title' => 'Glacier Rugged Case', 'price' => 79.00, 'image' => 'https://picsum.photos/seed/case8/800/600', 'description' => 'Protective carry case.', 'details' => 'IP67, crush-proof shell.'],
    ];
    return view('products.index', compact('products'));
})->name('products.index');
