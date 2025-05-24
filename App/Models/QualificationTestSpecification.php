namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QualificationTestSpecification extends Model
{
    protected $fillable = ['name', 'description', 'criteria'];
    protected $casts = ['criteria' => 'array'];
}
