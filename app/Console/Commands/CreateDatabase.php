<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class CreateDatabase extends Command
{
    protected $signature = 'db:create';
    protected $description = 'Crea una nueva base de datos usando el nombre del archivo .env';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Obtén el nombre de la base de datos del archivo .env
        $database = Config::get('database.connections.mysql.database');

        // Temporalmente usa una conexión sin base de datos especificada
        Config::set('database.connections.mysql.database', null);
        DB::purge('mysql');

        try {
            // Crea la base de datos
            DB::statement("CREATE DATABASE IF NOT EXISTS `$database`");
            $this->info("Base de datos '$database' creada exitosamente.");
        } catch (\Exception $e) {
            $this->error("Error al crear la base de datos: " . $e->getMessage());
        }

        // Restaura la configuración de la base de datos original
        Config::set('database.connections.mysql.database', $database);
        DB::purge('mysql');
    }
}
