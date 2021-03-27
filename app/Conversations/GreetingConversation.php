<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class GreetingConversation extends Conversation
{
    public ?string $age;
    public ?string $purpose;
    public ?string $deadline;

    public function askAge()
    {
        $this->ask('So, how old are you?', function (Answer $answer) {
            $this->age = $answer->getText() ?? 'None';

            $this->say('Pretty good!');
            $this->askPurpose();
        });
    }

    public function askPurpose()
    {
        $this->ask("What is your purpose to learn English?", function (Answer $answer) {
            $this->purpose = $answer->getText() ?? 'None';

            $this->say('Oh, very nice!');
            $this->askDeadline();
        });
    }

    public function askDeadline()
    {
        $this->ask("What is your deadline for it?", function (Answer $answer) {
            $this->deadline = $answer->getText() ?? 'None';

//            $this->say('Got it!');
            $age = $this->age;
            $purpose = $this->purpose;
            $deadline = $this->deadline;
            $this->say("
            There is your data:\n
            Age: {$age}\n
            Purpose: {$purpose}\n
            Deadline: {$deadline}
            ");
        });
    }

    public function run()
    {
        $this->askAge();
    }
}
