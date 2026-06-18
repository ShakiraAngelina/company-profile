<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Models\Notification;

class ModelActivityObserver
{
    protected function base(Model $model): array
    {
        $type = strtolower(class_basename($model));
        $id = method_exists($model, 'getKey') ? $model->getKey() : null;
        return [$type, $id];
    }

    public function created(Model $model): void
    {
        [$type, $id] = $this->base($model);
        $title = 'Item baru: '.ucfirst($type);
        $body = '';
        if (isset($model->title)) { $body = '"'.$model->title.'" telah dibuat.'; }
        if (isset($model->job_title)) { $body = '"'.$model->job_title.'" telah diposting.'; }
        if ($type === 'message') {
            $title = 'Pesan baru dari '.$model->name;
            $body = ($model->subject ?? 'Tanpa subjek');
        }
        Notification::create([
            'title' => $title,
            'body' => $body,
            'type' => $type,
            'model_type' => get_class($model),
            'model_id' => $id,
            'action' => 'created',
        ]);
    }

    public function updated(Model $model): void
    {
        [$type, $id] = $this->base($model);
        $title = 'Item diubah: '.ucfirst($type);
        $body = '';
        if (isset($model->title)) { $body = '"'.$model->title.'" telah diubah.'; }
        if (isset($model->job_title)) { $body = '"'.$model->job_title.'" telah diperbarui.'; }
        Notification::create([
            'title' => $title,
            'body' => $body,
            'type' => $type,
            'model_type' => get_class($model),
            'model_id' => $id,
            'action' => 'updated',
        ]);
    }

    public function deleted(Model $model): void
    {
        [$type, $id] = $this->base($model);
        $title = 'Item dihapus: '.ucfirst($type);
        $body = '';
        if (isset($model->title)) { $body = '"'.$model->title.'" telah dihapus.'; }
        if (isset($model->job_title)) { $body = '"'.$model->job_title.'" telah dihapus.'; }
        Notification::create([
            'title' => $title,
            'body' => $body,
            'type' => $type,
            'model_type' => get_class($model),
            'model_id' => $id,
            'action' => 'deleted',
        ]);
    }
}