<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildNoteForDuplicateCertificate extends Model
{
    use HasFactory;

    protected $table = "child_note_for_duplicate_certificates";

    protected $fillable = [
        'pnote_dupid',
        'serial_number',
        'description',
        'admin_id',
        'receiver_id',
        'sent_status',
        'sender_id',
        'view_status',
        'back_sign_status',
        'amPmValue',
        'amPmValueUpdate'
    ];
}
