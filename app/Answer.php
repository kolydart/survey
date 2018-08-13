<?php
namespace App;

use App\Answerlist;
use App\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Answer
 *
 * @package App
 * @property string $title
 * @property tinyInteger $open
*/
class Answer extends Model
{
	/** activity log */
	use \Spatie\Activitylog\Traits\LogsActivity;
	protected static $logFillable = true;
	protected static $logOnlyDirty = true;

    use SoftDeletes;

    protected $fillable = ['title', 'open'];
    protected $hidden = [];


    
    /**  --- ✄ ----------------------- */

    public function answerlists()
    {
        return $this->belongsToMany(Answerlist::class, 'answer_answerlist')->withTrashed();
    }
    
    public function responses()
    {
        return $this->hasMany(Response::class, 'answer_id')->withTrashed();
    }
    
    
    
}
