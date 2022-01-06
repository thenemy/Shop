<?php

namespace App\Console\Commands;

use App\Domain\Category\Front\Admin\File\CategoryAllCreator;
use App\Domain\Category\Front\Admin\File\CategoryCreator;
use App\Domain\Category\Front\Admin\File\CategoryOpenCreator;
use App\Domain\Common\Banners\Front\Admin\File\BannerCreator;
use App\Domain\Common\Brands\Front\Admin\File\BrandCreator;
use App\Domain\Common\Colors\Front\Admin\File\ColorCreator;
use App\Domain\CreditProduct\Front\Admin\File\MainCreditCreator;
use App\Domain\Installment\Front\Admin\Files\TakenCreditCreator;
use App\Domain\Product\Product\Front\Admin\File\ProductCreator;
use App\Domain\Shop\Front\Admin\File\ShopFileCreator;
use App\Domain\Shop\Front\Main\ShopCreate;
use App\Domain\User\Front\Admin\File\SuretyFileCreator;
use App\Domain\User\Front\Admin\File\UserFileCreator;
use Illuminate\Console\Command;

class   CreateBlades extends Command
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
        CategoryAllCreator::createFiles();
        UserFileCreator::createFiles();
        ProductCreator::createFiles();
        ShopFileCreator::createFiles();
        MainCreditCreator::createFiles();
        TakenCreditCreator::createFiles();
        SuretyFileCreator::createFiles();
        BannerCreator::createFiles();
        BrandCreator::createFiles();
        ColorCreator::createFiles();
        return 0;
    }
}
