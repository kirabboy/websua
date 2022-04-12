<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use App\Models\DoanhSoThang;

class DoanhThuThang extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DoanhThuThang:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $user = User::with('getPoint')->get();
        foreach ($user as $value) {
            $doanhso_tuan_truoc = DoanhSoThang::where('user_id', $value->id)->orderBy('id', 'desc')->first();
            $doanhso = new DoanhSoThang;
            $doanhso->doanhso = $value->getPoint->doanhso - $doanhso_tuan_truoc->doanhso;
            $doanhso->point = $value->getPoint->point - $doanhso_tuan_truoc->point;
            $doanhso->doanhso_canhan = $value->getPoint->doanhso_canhan - $doanhso_tuan_truoc->doanhso_canhan;
            $doanhso->user_id = $value->id;
            $doanhso->save();
        }
    }
}
