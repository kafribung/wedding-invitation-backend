<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response([
        'author:' => 'Kafri',
        'untuk:' => 'Bela',
        'puisi:' => '
        Di keheningan malam, bintang-bintang bersinar,
        Dalam hati ini, terukir rasa yang tiada terpadam.
        Kau adalah kilauan cahaya di kegelapan,
        Yang menghadirkan arti dalam setiap hembusan nafas.

        Cinta, seperti lautan yang luas dan dalam,
        Mengalir dalam arus yang tak terkendali.
        Di setiap ombaknya, kita menemukan keajaiban,
        Dalam pelukanmu, aku menemukan rumah yang abadi.

        Kau adalah melodi dalam harmoni alam,
        Yang menggetarkan jiwa dan menyentuh hati.
        Dalam setiap irama, kita menari bersama,
        Menyatu dalam cinta yang tak terbatas.

        Biarlah waktu menjadi saksi atas cinta ini,
        Yang tumbuh subur dalam setiap sudut hati.
        Kita berdua, bersama-sama, membentuk cerita,
        Yang takkan pernah pudar, selamanya abadi.

        Dalam pelukanmu, aku menemukan kebahagiaan,
        Dalam senyummu, aku menemukan makna hidup.
        Cinta ini, tak terkira dan tak terhingga,
        Seperti bintang-bintang yang bersinar, kekal bersinar dalam gelap.'
    ]);
});
