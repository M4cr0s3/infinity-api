<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class thor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'thor {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создает готового пользователя.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::query()->find($this->arguments())->first();

        $user->image_path = Storage::url('images/thor.jpg');

        $user->save();
        dd($user->image_path);
    }
}
