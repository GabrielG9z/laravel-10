<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class StatusSupport extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected string $status,
    ) {

    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        
        $color = 'blue';
        //Condicionais de Status do tópico
        $color = $this->status === 'C' ? 'green' : $color;
        $color = $this->status === 'P' ? 'red' : $color;
        $textStatus = getStatusSupport($this->status);
        return view('components.status-support', compact('textStatus', 'color'));
    }
}
