<?php

namespace App\Livewire\Attendances;

use App\Models\Attendance;
use Carbon\Carbon;
use Livewire\Component;

class AttendancesCreate extends Component
{
    public $lastAttendance;
    public $lastDailyAttendance;
    public $isChecked;
    public $spinner = false;

    public function checkIn()
    {
        $this->spinner = true;

        try {
            $this->lastAttendance = Attendance::create([
                'user_id' => auth()->user()->id,
                'date' => Carbon::today(),
                'check_in' => Carbon::now(),
            ]);

            $this->lastDailyAttendance = $this->lastAttendance;
            $this->isChecked = true;
        } finally {
            $this->spinner = false;
        }
    }

    public function checkOut()
    {
        $this->spinner = true;

        try {
            $attendance = Attendance::lastDailyAttendance(auth()->user()->id)->first();
            $attendance->update(['check_out' => Carbon::now()]);

            $this->lastDailyAttendance = $attendance;
            $this->lastAttendance = $attendance;

            $this->isChecked = false;
        } finally {
            $this->spinner = false;
        }
    }

    public function mount()
    {
        $this->lastAttendance = Attendance::lastAttendance(auth()->user()->id)->first();
        $this->lastDailyAttendance = Attendance::lastDailyAttendance(auth()->user()->id)->first();
        $this->isChecked = $this->lastDailyAttendance && ! $this->lastDailyAttendance->check_out;
    }

    public function render()
    {
        return view('livewire.attendances.attendances-create')->layout('layouts.app');
    }
}
