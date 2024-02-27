<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\WordDefinition;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $userId;
    protected $word;
    protected $definitions;
    public function __construct($userId,$word,$definitions)
    {
        //
        $this->userId = $userId;
        $this->word = $word;
        $this->definitions = $definitions;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $user = User::find($this->userId);
        if($user){
            Mail::to($user->email)->send(new WordDefinition($this->word,$this->definitions));
        }
     

        // Send email to user
        
       
    }
}