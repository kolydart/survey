<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ContentPage
 *
 * @property string $title
 * @property text $page_text
 * @property text $excerpt
 * @property string $featured_image
 */
class ContentPage extends Model
{
    /** activity log */
    use \Spatie\Activitylog\Traits\LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    protected $fillable = ['title', 'page_text', 'excerpt', 'featured_image'];
    protected $hidden = [];

    public function category_id()
    {
        return $this->belongsToMany(ContentCategory::class, 'content_category_content_page');
    }

    public function tag_id()
    {
        return $this->belongsToMany(ContentTag::class, 'content_page_content_tag');
    }
}
