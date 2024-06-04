<?php

namespace App\Livewire\SocialPrep\Modal;

use App\Models\SocialPrepDay;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use LivewireUI\Modal\ModalComponent;

class PrepDay extends ModalComponent
{
    use WithPagination;

    public $prep_day;

    #[On('social-prep-date-created')]
    public function render()
    {
        $prep_days = SocialPrepDay::paginate(5);
        return view('livewire.social-prep.modal.prep-day', compact('prep_days'));
    }

    public function createSocialPrepDate()
    {
        SocialPrepDay::create([
            'prep_day' => Carbon::parse($this->prep_day)->format('Y-m-d'),
        ]);

        $this->reset('prep_day');
        $this->dispatch('social-prep-date-created')->self();
        $this->dispatch('showToast', ['type' => "success", 'message' => "Social Prep date created successfully", 'title' => "Success"]);
    }

    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
