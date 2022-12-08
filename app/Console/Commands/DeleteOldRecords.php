<?php

namespace App\Console\Commands;

use App\Services\CarServiceInterface;
use Illuminate\Console\Command;

class DeleteOldRecords extends Command
{
    protected $signature = 'delete:records {days}';

    protected $description = 'Delete old records by given days';

    public function handle(CarServiceInterface $carService)
    {
        try {
            $carService->deleteRecords($this->argument('days'));
            $this->info('Operation executed successfully!');
            return Command::SUCCESS;
        }catch (\Exception $exception){
            $this->error('Operation was not executed!');
            return Command::FAILURE;
        }
    }
}
