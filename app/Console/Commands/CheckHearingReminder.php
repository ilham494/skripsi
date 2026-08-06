<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Hearing;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;


class CheckHearingReminder extends Command
{

    protected $signature = 'hearing:reminder';


    protected $description = 'Membuat reminder sidang H-1';



    public function handle()
    {

        $besok = Carbon::tomorrow();


        $hearings = Hearing::with('case')
            ->whereDate(
                'tanggal_sidang',
                $besok
            )
            ->get();



        if($hearings->count() == 0)
        {

            $this->info('Tidak ada sidang besok');

            return;

        }



        $admins = User::where('role','admin')
            ->get();




        foreach($hearings as $hearing)
        {


            foreach($admins as $admin)
            {


                Notification::create([

                    'user_id' => $admin->id,


                    'judul' => 'Reminder Sidang Besok',


                    'pesan' =>
                    'Perkara ' .
                    ($hearing->case->judul_perkara ?? '-') .
                    ' akan sidang besok. Tempat: ' .
                    $hearing->tempat,


                    'dibaca' => false

                ]);


            }


        }



        $this->info(
            'Reminder sidang berhasil dibuat'
        );

    }

}