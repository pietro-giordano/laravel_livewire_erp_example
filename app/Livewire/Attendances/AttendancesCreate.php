<?php

namespace App\Livewire\Attendances;

use App\Models\Attendance;
use Carbon\Carbon;
use Livewire\Component;

class AttendancesCreate extends Component
{
    public $attendance;
    public $isChecked;

    public function mount()
    {
        $this->attendance = Attendance::where('date', Carbon::today())->first();
        $this->isChecked = $this->attendance ? true : false;
    }

    public function render()
    {
        return view('livewire.attendances.attendances-create')->layout('layouts.app');
    }
}
