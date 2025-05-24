namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Attribute extends Model
{
    protected $fillable = ['key', 'value'];

    public function attributable(): MorphTo
    {
        return $this->morphTo();
    }
}
