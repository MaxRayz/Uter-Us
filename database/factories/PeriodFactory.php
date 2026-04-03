<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Period>
 */
class PeriodFactory extends Factory
{
    /**
     * Common period symptoms for realistic fake data.
     */
    private array $symptomOptions = [
        'cramps', 'bloating', 'headache', 'fatigue', 'mood swings',
        'back pain', 'nausea', 'breast tenderness', 'acne', 'insomnia',
    ];

    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-2 years', 'now');
        // Periods typically last 3–7 days
        $endDate = (clone $startDate)->modify('+' . fake()->numberBetween(3, 7) . ' days');

        // Pick 0–3 random symptoms
        $symptoms = fake()->boolean(80)
            ? implode(', ', fake()->randomElements($this->symptomOptions, fake()->numberBetween(1, 3)))
            : null;

        return [
            'user_id'    => User::factory(),
            'start_date' => $startDate->format('Y-m-d'),
            'end_date'   => fake()->boolean(90) ? $endDate->format('Y-m-d') : null,
            'symptoms'   => $symptoms,
            'notes'      => fake()->boolean(40) ? fake()->sentence() : null,
        ];
    }
}
