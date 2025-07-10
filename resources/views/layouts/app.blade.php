<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Contacto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-green-700">Contáctanos</h1>

        @if (session()->has('success'))
            <div class="mb-4 text-green-700 bg-green-100 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mb-4 text-red-700 bg-red-100 p-3 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form wire:submit.prevent="submit" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" wire:model="name" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input type="email" wire:model="email" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Mensaje</label>
                <textarea wire:model="message" rows="4" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition">
                Enviar mensaje
            </button>
        </form>
    </div>

    @livewireScripts
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
