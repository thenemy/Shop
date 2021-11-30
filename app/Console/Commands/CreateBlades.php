<?php

namespace App\Console\Commands;

use App\Domain\Category\Front\Admin\File\CategoryCreator;
use App\Domain\Category\Front\Admin\File\CategoryOpenCreator;
use Illuminate\Console\Command;

class CreateBlades extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:front';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates all necessary blades';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        CategoryCreator::createFiles();
        CategoryOpenCreator::createFiles();
        return 0;
    }
}
