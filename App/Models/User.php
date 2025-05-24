public function staffAttributes(): MorphMany
{
    return $this->morphMany(StaffAttribute::class, 'attributable');
}

public function qualificationResults(): HasMany
{
    return $this->hasMany(QualificationTestResult::class);
}
