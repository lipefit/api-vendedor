<?php

namespace App\Console\Commands;

use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ReportCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send report of sales';

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
        $sales = Sale::join("sellers", "sales.seller_id", "=", "sellers.id")
            ->select("sales.id", "sellers.name", "sellers.email", "sales.commission", "sales.sale_value", "sales.created_at")
            ->where("sales.created_at", Carbon::today())
            ->get();

        $name = "Rafael";
        $email = "rafael@tray.com.br";

        $data = array("name" => $name, "sales" => $sales, "body" => "Confira abaixo o relatório diario de vendas");
        Mail::send('mail', $data, function ($message) use ($name, $email) {
            $message->to($email, $name)
                ->subject('Relatório diario de vendas');
            $message->from('api@tray.com.br', 'Tray');
        });
    }
}
