<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Member;
use App\Mail\SubscriptionExpiryReminderMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendExpiryReminder extends Command
{
    protected $signature = 'subscription:send-reminder';
    protected $description = 'Send email reminder 10 days before subscription expires';

    public function handle()
    {
        $targetDate = Carbon::now()->addDays(10)->toDateString();

        $members = Member::whereDate('expirydate', $targetDate)->with('user', 'plan')->get();

        foreach ($members as $member) {
            if ($member->user && $member->user->email) {
                Mail::to($member->user->email)->send(new SubscriptionExpiryReminderMail($member));
                $this->info('Reminder sent to ' . $member->user->email);
            }
        }

        return Command::SUCCESS;
    }
}

