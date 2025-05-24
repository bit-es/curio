namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class QualificationTestResult extends Model
{
    protected $fillable = [
        'user_id',
        'qualification_test_specification_id',
        'result',
        'test_date',
        'expiry_date',
    ];

    protected $dates = ['test_date', 'expiry_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specification()
    {
        return $this->belongsTo(QualificationTestSpecification::class);
    }
}
