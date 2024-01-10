<?php

namespace App\Models;

trait AttachmentTrait
{
    public function attachments()
    {
        return $this->morphMany(Attachment::Class, 'attachmentable');
    }
}

