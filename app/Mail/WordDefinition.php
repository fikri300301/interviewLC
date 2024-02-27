<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WordDefinition extends Mailable
{
    use Queueable, SerializesModels;

    public $word;
    public $definitions;

    /**
     * Create a new message instance.
     */
    public function __construct($word,$definitions)
    {
        $this->word = $word;
        $this->definitions = $definitions;
    }

     /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Word Definition')
                    ->view('emails.new_word_definition')
                    ->with([
                        'word' => $this->word,
                        'definitions' => $this->definitions
                    ]);
    }



    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}