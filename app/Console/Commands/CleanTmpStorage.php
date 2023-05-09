<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CleanTmpStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tmpStorage:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Limpiar tmpStorage';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $files = Storage::files('public/tmpStorage');
        
        foreach ($files as $file) {
            $createdAt = Carbon::createFromTimestamp(Storage::lastModified($file));
            if ($createdAt->addMinutes(1)->isPast()) {
                Storage::delete($file);
            }
        }

        return Command::SUCCESS;

    }
}
