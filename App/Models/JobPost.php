namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class JobPost extends Model
{
    protected $fillable = ['name', 'description'];

    public function attributes(): MorphMany
    {
        return $this->morphMany(JobPostAttribute::class, 'attributable');
    }
}
