<?php

namespace App\Console\Commands;
use App\Models\Alerts;
use App\Notifications\AlertNotif;

use Illuminate\Console\Command;

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
               $alert->user->notify(new AlertNotif($alert));
                $alert->isMail = true;
                $alert->save();
              // $alert->update(['reminder_at'=>NULL]);
        }
        return 0;
    }
}
