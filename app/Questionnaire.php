<?php
namespace App;

use App\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Questionnaire
 *
 * @package App
 * @property string $survey
 * @property string $name
*/
class Questionnaire extends Model
{
    /** activity log */
    use \Spatie\Activitylog\Traits\LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    use SoftDeletes;

    protected $fillable = ['name', 'survey_id'];
    protected $hidden = [];
    protected $appends = ['filled_percent'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSurveyIdAttribute($input)
    {
        $this->attributes['survey_id'] = $input ? $input : null;
    }
    
    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id')->withTrashed();
    }
    

    /**  --- ✄ ----------------------- */

    public function responses()
    {
        return $this->hasMany(Response::class, 'questionnaire_id')->withTrashed();
    }
    
    /**
     * calculate filled_percent
     * @return decimal  (0.xx)
     */
    public function getFilledPercentAttribute(){
        $answered = collect($this->responses->pluck('question_id'))->unique();
        $template = collect($this->survey->items->pluck('question_id'));
        $percent  = $answered->intersect($template)->count() / $template->count();
        return number_format((float)$percent, 2, '.', '');
    }
    

}
