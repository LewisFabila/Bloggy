<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Posts extends Seeder
{
    public function run()
    {
        $posts = [
            [
                'id_user' => 3,
                'title' => 'Mi plan para conquistar el mundo (o al menos la escuela)',
                'content' => 'Paso 1: Convencer a Darwin de que es un genio del mal (ya casi lo logro, solo tuvo que ponerse un bigote de papel).
                                Paso 2: Usar papel de aluminio para crear una armadura impenetrable que refleje los insultos de Tobias.
                                Paso 3: Almorzar. Los genios no trabajan con el estómago vacío.
                                ¿Alguien tiene sugerencias para el Paso 4? Abstenerse de decir "madurar", eso no está en el presupuesto.',
                'image' => '3/gumball01.webp',
                'created_at' => '2026-05-03 15:12:10',
            ],
            [
                'id_user' => 2,
                'title' => '¿Alguien más siente que el café no es suficiente hoy?',
                'content' => 'Rigby y yo acabamos de pasar toda la noche intentando vencer el nivel final de “El Maestro del Hueso” y ahora Benson nos quiere cortando el césped de todo el sector sur. Si no sobrevive para la hora del almuerzo, díganle a Margaret que... bueno, solo salúdenla de mi parte. ¿Algún consejo para mantenerse despierto cuando tu jefe tiene cara de máquina de chicles enojada?',
                'image' => '2/coffe01.webp',
                'created_at' => '2026-05-03 10:47:25',
            ],
            [
                'id_user' => 2,
                'title' => 'Atardeceres que valen la pena.',
                'content' => 'A veces este lugar puede ser un caos total (usualmente porque Rigby rompió el tejido de la realidad o algo así), pero hay momentos en los que simplemente te sientas en el carrito de golf y aprecias la vista. Por cierto, si ven un portal dimensional cerca de la fuente de los deseos, no entren. Es un problema de mantenimiento... otra vez.',
                'image' => '',
                'created_at' => '2026-04-30 18:14:04',
            ],
            [
                'id_user' => 4,
                'title' => '¡El Rey ha llegado a la ciudad!',
                'content' => '¡Hola, nena! He estado pasando 4 horas en el gimnasio hoy, y eso fue solo para calentar mis antebrazos. Si estás buscando un hombre que sepa apreciar un buen espejo tanto como tú, y que tenga el cabello más alto que tus expectativas para el futuro, no busques más.
                                ¡Hoo-ha! Marca mi número, pero ten cuidado, podrías desmayarte con tanta guapura.',
                'image' => '4/johnny01.jpg',
                'created_at' => '2026-04-27 11:52:36',
            ],
        ];

        $this->db->table('posts')->insertBatch($posts);
    }
}
