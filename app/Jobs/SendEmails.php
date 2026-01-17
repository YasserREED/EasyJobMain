<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Company;
use App\Mail\SendCompanyEmails;

use Mail;

class SendEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

     protected $fileLink; 
     protected $plan; 
     protected $region; 
     protected $domain; 
     protected $subject; 
     protected $userEmail; 
     protected $userPhone; 
     protected $userName; 
     protected $fullname; 
     protected $linkedin; 

    public function __construct($fileLink,$plan, $region,$domain,$subject,$userEmail,$userPhone,$userName,$fullname,$linkedin = null)
    {
        $this->fileLink = $fileLink;
        $this->plan = $plan;
        $this->region = $region;
        $this->domain = $domain;
        $this->subject = $subject;
        $this->userEmail = $userEmail;
        $this->userPhone = $userPhone;
        $this->userName = $userName;
        $this->fullname = $fullname;
        $this->linkedin = $linkedin;

    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $emailLimit = $this->getEmailLimit($this->plan);
    
        // Fetch emails from the company database based on $this->region
        $emails = Company::where('region', $this->region)
            ->where('domain',$this->domain)
            ->inRandomOrder()
            ->limit($emailLimit)
            ->pluck('email')
            ->all();
    
            $data = [
                'CV' => $this->fileLink,
                'subject' => $this->subject, 
                'name' => $this->userName, 
                'email' => $this->userEmail, 
                'phone' => $this->userPhone, 
                'fullname' => $this->fullname,
                'linkedin' => $this->linkedin,

            ];
        //Send emails to the fetched email addresses
        foreach ($emails as $email) {
            Mail::to($email)->send(new SendCompanyEmails($data));
        }
    }
    
    private function getEmailLimit($plan)
    {
        switch ($plan) {
            case 1:
                return 100;
            case 2:
                return 300;
            case 3:
                return 500;
            case 4: // free plan
                return 10;    
            default:
                return 0; // Handle unsupported plans or errors as needed
        }
    }
    
}
