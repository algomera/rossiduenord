<?php

use App\SubjectRole;
use Illuminate\Database\Seeder;

class SubjectRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubjectRole::create([
            'name' => 'Richiedente',
            'color' => '#f1a754'
        ]);
        SubjectRole::create([
            'name' => 'Proprietario/Amministratore',
            'color' => '#487624'
        ]);
        SubjectRole::create([
            'name' => 'Agente/Consulente',
            'color' => '#80d2cb'
        ]);
        SubjectRole::create([
            'name' => 'Banca finanziatrice',
            'color' => '#6e6e6e'
        ]);
        SubjectRole::create([
            'name' => 'General Contractor',
            'color' => '#ee5c47'
        ]);
        SubjectRole::create([
            'name' => 'Azienda edile',
            'color' => '#711f1b'
        ]);
        SubjectRole::create([
            'name' => 'Azienda impianti idrotermosanitari',
            'color' => '#d096bf'
        ]);
        SubjectRole::create([
            'name' => 'Azienda impianti elettrici/fotovoltaici',
            'color' => '#9d6fcc'
        ]);
        SubjectRole::create([
            'name' => 'Termotecnico APE Ante',
            'color' => '#fde761'
        ]);
        SubjectRole::create([
            'name' => 'Strutturista',
            'color' => '#97fa52'
        ]);
        SubjectRole::create([
            'name' => 'Direttore lavori',
            'color' => '#597ecf'
        ]);
        SubjectRole::create([
            'name' => 'Asseveratore tecnico',
            'color' => '#89745c'
        ]);
        SubjectRole::create([
            'name' => 'Asseveratore fiscale',
            'color' => '#c2b26f'
        ]);
        SubjectRole::create([
            'name' => 'Contribuente',
            'color' => '#ec55eb'
        ]);
        SubjectRole::create([
            'name' => 'Cessionario credito fiscale',
            'color' => '#d0ec60'
        ]);
        SubjectRole::create([
            'name' => 'Assicuratore',
            'color' => '#232323'
        ]);
        SubjectRole::create([
            'name' => 'Area Manager',
            'color' => '#c6c6c6'
        ]);
        SubjectRole::create([
            'name' => 'Termotecnico progetto efficientamento energetico',
            'color' => '#fbf4be'
        ]);
        SubjectRole::create([
            'name' => 'Termotecnico APE Post',
            'color' => '#a15f20'
        ]);
        SubjectRole::create([
            'name' => 'Tecnico addetto al Computo Metrico',
            'color' => '#45a170'
        ]);
        SubjectRole::create([
            'name' => 'Generico',
            'color' => ''
        ]);
    }
}
