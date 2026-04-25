<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Configuracion;
use App\Models\Gestion;
use App\Models\Periodo;
use App\Models\Nivel;
use App\Models\Grado;
use App\Models\Paralelo;
use App\Models\Turno;
use App\Models\Materia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Jhunior Ortega',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);
Configuracion::create([
    'nombre' => 'Unidad Educativa Hilar Web',
    'descripcion' => 'Unidad Educativa para todos',
    'direccion' => 'ZONA MIRAFLORES AV 5 CALLE MEJILLOS NRO 200',
    'telefono' => '75657807 - 54646787',
    'divisa' => 'Bs.',
    'correo_electronico' => 'hilarweb@gmail.com',
    'web' => 'https://hilarweb.com',
    'logo' => '1775663811_Captura de pantalla 2026-03-23 1819909.jpg'
]);

Gestion::create(['nombre' => '2023']);
Gestion::create(['nombre' => '2024']);
Gestion::create(['nombre' => '2025']);

Periodo::create(['nombre' => '1er Trimestre','gestion_id' => 1]);
Periodo::create(['nombre' => '2do Trimestre','gestion_id' => 1]);
Periodo::create(['nombre' => '3er Trimestre','gestion_id' => 1]);
Periodo::create(['nombre' => '1er Trimestre','gestion_id' => 2]);
Periodo::create(['nombre' => '2do Trimestre','gestion_id' => 2]);
Periodo::create(['nombre' => '3er Trimestre','gestion_id' => 2]);
Periodo::create(['nombre' => '1er Trimestre','gestion_id' => 3]);
Periodo::create(['nombre' => '2do Trimestre','gestion_id' => 3]);
Periodo::create(['nombre' => '3er Trimestre','gestion_id' => 3]);

Nivel::create(['nombre' => 'INICIAL']);
Nivel::create(['nombre' => 'PRIMARIA']);
Nivel::create(['nombre' => 'SECUNDARIA']);

Grado::create(['nombre' => '1ro Inicial','nivel_id' => 1]);
Grado::create(['nombre' => '2do Inicial','nivel_id' => 1]);
Grado::create(['nombre' => '1ro Primaria','nivel_id' => 2]);
Grado::create(['nombre' => '2do Primaria','nivel_id' => 2]);
Grado::create(['nombre' => '3ro Primaria','nivel_id' => 2]);
Grado::create(['nombre' => '4to Primaria','nivel_id' => 2]);
Grado::create(['nombre' => '5to Primaria','nivel_id' => 2]);
Grado::create(['nombre' => '6to Primaria','nivel_id' => 2]);
Grado::create(['nombre' => '1ro Secundaria','nivel_id' => 3]);
Grado::create(['nombre' => '2do Secundaria','nivel_id' => 3]);
Grado::create(['nombre' => '3ro Secundaria','nivel_id' => 3]);
Grado::create(['nombre' => '4to Secundaria','nivel_id' => 3]);
Grado::create(['nombre' => '5to Secundaria','nivel_id' => 3]);
Grado::create(['nombre' => '6to Secundaria','nivel_id' => 3]);

Paralelo::create(['nombre' => 'A','grado_id' => 1]);
Paralelo::create(['nombre' => 'A','grado_id' => 2]);
Paralelo::create(['nombre' => 'A','grado_id' => 3]);
Paralelo::create(['nombre' => 'A','grado_id' => 4]);
Paralelo::create(['nombre' => 'A','grado_id' => 5]);
Paralelo::create(['nombre' => 'A','grado_id' => 6]);
Paralelo::create(['nombre' => 'A','grado_id' => 7]);
Paralelo::create(['nombre' => 'A','grado_id' => 8]);
Paralelo::create(['nombre' => 'A','grado_id' => 9]);
Paralelo::create(['nombre' => 'A','grado_id' => 10]);
Paralelo::create(['nombre' => 'A','grado_id' => 11]);
Paralelo::create(['nombre' => 'A','grado_id' => 12]);
Paralelo::create(['nombre' => 'A','grado_id' => 13]);
Paralelo::create(['nombre' => 'A','grado_id' => 14]);

Turno::create(['nombre' => 'Mañana']);
Turno::create(['nombre' => 'Tarde']);
Turno::create(['nombre' => 'Noche']);

Materia::create(['nombre' => 'ARTES PLÁSTICAS Y VISUALES']);
Materia::create(['nombre' => 'BIOLOGÍA - GEOGRAFÍA']);
Materia::create(['nombre' => 'CIENCIAS SOCIALES']);
Materia::create(['nombre' => 'COMPUTACIÓN']);
Materia::create(['nombre' => 'COSMOVISIONES, FILOSOFÍA Y PSICOLOGÍA']);
Materia::create(['nombre' => 'EDUCACIÓN FÍSICA Y DEPORTES']);
Materia::create(['nombre' => 'EDUCACIÓN MUSICAL']);
Materia::create(['nombre' => 'FÍSICA']);
Materia::create(['nombre' => 'LENGUA CASTELLANA Y ORIGINARIA']);
Materia::create(['nombre' => 'LENGUA EXTRANJERA']);
Materia::create(['nombre' => 'MATEMÁTICA']);
Materia::create(['nombre' => 'QUÍMICA']);
Materia::create(['nombre' => 'VALORES, ESPIRITUALIDADES Y RELIGIONES']);
Materia::create(['nombre' => 'TÉCNICA TECNOLÓGICA GENERAL']);
    }
}
