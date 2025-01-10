<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function setPhonePartsAttribute($value) {
        $this->attributes['tel'] = implode($value);
    }
    public const gender_options = [
        0 => '男性',
        1 => '女性',
        2 => 'その他'
    ];
    public function getGenderTextAttribute() {
        if($this->gender === 0) {
            return '男性';
        } elseif($this->gender === 1) {
            return '女性';
        } else {
            return 'その他';
        }
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function scopeKeywordSearch($query, $keyword) {
        if(!empty($keyword)) {
            $query->where('first_name', 'like', '%' . $keyword . '%')
                  ->orwhere('last_name', 'like', '%' . $keyword . '%')
                  ->orwhere('email', 'like', '%' . $keyword . '%');
        }
    }
    public function scopeGenderSearch(Builder $query, $gender) {
        if(is_numeric($gender)) {
            $query->where('gender', (int) $gender);
        }
        return $query;
    }
    public function scopeCategorySearch($query, $category_id) {
        if(!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }
    public function scopeDateSearch($query, $date) {
        if(!empty($date)) {
            $query->where('created_at', 'like', '%' . $date . '%');
        }
    }
}
