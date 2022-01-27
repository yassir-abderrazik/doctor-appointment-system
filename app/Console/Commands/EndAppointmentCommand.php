<?php

namespace App\Console\Commands;

use App\Mail\EndappointmentMail;
use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;

class EndAppointmentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'end:appointment';

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
        $appointments = Appointment::with('doctor', 'patient')->get();
        foreach ($appointments as $appointment) {
            $date = Carbon::now()->addHour();
            $date = $date->isoFormat('Y-MM-DD H:mm:00');
            if ($appointment->end == $date) {
                Mail::to($appointment->doctor->email)->send(new EndappointmentMail($appointment));
            }
        }
    }
}

