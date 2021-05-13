<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    /**
     * 状態定義
     */
    const STATUS = [
        1 => [ 'label' => '未着手', 'class' => 'label-danger' ],
        2 => [ 'label' => '着手中', 'class' => 'label-info' ],
        3 => [ 'label' => '完了', 'class' => '' ],
    ];
    
    /**
     * 状態ラベル
     * @return string
     */
    public function getStatusLabelAttribute(){
        $status = $this->attributes['status'];

        if(!isset(self::STATUS[$status])){
            return '';
        }

        return self::STATUS[$status]['class'];
    }

    /**
     * 整形した期日
     * @return string
     */
    public function getFormattedDueDateAttribute(){
        return Carbon::createFromFormat('Y-n-j', $this->attributes['due_date'])->format('Y/n/j');
    }
}
