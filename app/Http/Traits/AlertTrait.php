<?php

namespace App\Http\Traits;

use Carbon\Carbon;

trait AlertTrait {
    public function alert_success($messsage, $text = '')
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => $messsage, 
            'text' => $text,
        ]);
    }

    public function alert_error($messsage, $text = '')
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'error',
            'message' => $messsage, 
            'text' => $text,
        ]);
    }

    public function alert_info($messsage, $text = '')
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'info',
            'message' => $messsage, 
            'text' => $text,
        ]);
    }

    public function redirect_to_blank($url)
    {
        $this->dispatchBrowserEvent('redirect-blank', ['url' => $url]);
    }
}
