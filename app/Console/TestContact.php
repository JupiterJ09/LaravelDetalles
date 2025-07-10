<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Contact;

class TestContact extends Command
{
    /**      nombre con el que lo invocas  */
    protected $signature = 'test:contact';

    /**      descripción que aparece en “php artisan list”  */
    protected $description = 'Crea un contacto de prueba en la base de datos';

    /**      aquí va la lógica principal  */
    public function handle(): int
    {
        try {
            // 1) crear el registro
            $contact = Contact::create([
                'name'    => 'Test Command',
                'email'   => 'test-command@example.com',
                'message' => 'Mensaje de prueba desde Artisan Command',
            ]);

            // 2) confirmar que se guardó
            if ($contact->exists) {
                $this->info('✅ Contacto creado exitosamente!');
                $this->line('ID: '.$contact->id);
                $this->line('Nombre: '.$contact->name);
                $this->line('Email: '.$contact->email);
                return self::SUCCESS;   // = 0
            }

            // 3) si por alguna razón existe == false
            $this->error('❌ El contacto no se pudo crear');
            return self::FAILURE;       // = 1

        } catch (\Throwable $e) {
            // 4) captura de excepciones inesperadas
            $this->error('🚨 Error al crear contacto: '.$e->getMessage());
            $this->line('Detalles: '.$e->getFile().':'.$e->getLine());
            return self::FAILURE;       // = 1 (o tu propio código 2)
        }
    }
}
