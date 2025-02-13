<?php

namespace App\Console\Commands;

use App\Models\Book;
use Illuminate\Console\Command;

class BookExistsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:checkIfBookExists';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking if the book with given title exists';

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
     * @return mixed
     */
    public function handle()
    {
        $title = $this->ask('Podaj tytul ksiazki?');
        $result = Book::where('name',$title)->first();
        if($result) {
            $this-> info('Ksiazka znajduje sie w bazie!');
        } else {
            $this-> info('Brak ksiazki o podanym tytule!');
        }

    }
}
