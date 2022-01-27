<?php

namespace App\Console\Commands;

use App\Mail\BeforeTwentyFourHoursMail;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class BeforeTwentyFourHoursCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:before';

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
        $date = Carbon::now()->addHour();
        $date = $date->isoFormat('Y-MM-DD H:mm:00');
        $appointments = Appointment::with('doctor', 'patient')->whereBetween('start', [$date, Carbon::now()->addHour('23')])->get();
        foreach ($appointments as $appointment) {
            Mail::to($appointment->patient->email)->send(new BeforeTwentyFourHoursMail($appointment));
        }
    }
}
