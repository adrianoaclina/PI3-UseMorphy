<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExampleCron extends Command
{

    protected $signature = 'example:cron';
    protected $description = 'Command E-mail';

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
        \DB::table('users')->get(); // pega os e-mails
        // siga o código de sua preferencia
        // executando as funções de envio de e-mail
        $this->info('Example Cron comando rodando com êxito');
    }
}
