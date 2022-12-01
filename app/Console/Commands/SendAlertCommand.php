<?php

namespace App\Console\Commands;
use App\Models\Alerts;
use App\Notifications\AlertNotif;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Mail\AlertMail;

class SendAlertCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alert_reminders:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $alerts = Alerts::with('user')->where('end_date','<=',now()->toDateTimeString())->where('isMail',false)->get();
        
        foreach($alerts as $alert){
            Mail::send(new AlertMail($alert));
               $alert->isMail = true;
               $alert->save();
           
        }
        return 0;
    }
}
