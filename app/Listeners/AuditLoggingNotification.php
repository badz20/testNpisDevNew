<?php

namespace App\Listeners;

use App\Events\UserLoggingAudit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\UserAuditLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class AuditLoggingNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserLoggingAudit  $event
     * @return void
     */
    public function handle(UserLoggingAudit $event)
    {
        //
        $event_value = '';
        if($event->type) {
            $event_value = 'Logging In';
        }else {
            $event_value = 'Logging Out';
        }

        $user_jawatan = DB::table('ref_jawatan')->select('nama_jawatan')->where('id',auth()->user()->jawatan_id)->first();

        $data = [
            'auditable_type' => $event->type,
            'event'      => $event_value,
            'url'        => request()->fullUrl(),
            'ip_address' => request()->getClientIp(),
            'user_agent' => request()->userAgent(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'user_id'          => $event->user->id,
            'user_ic_no' => $event->user->no_ic,
            'user_jawatan' => $user_jawatan->nama_jawatan,
            'jenis_pengguna_id' => $event->user->jenis_pengguna_id,
            'user_name' => $event->user->name,
        ];

        //create audit trail data
        $details = DB::connection(env('DB_CONNECTION_AUDIT'))->table('user_logging_audit')->insert($data);
        //apply_registration_transition($event->submission->uuid, $event->workflow, $event->status, $event->revision_id, $event->content);
    }
}
