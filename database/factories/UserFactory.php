<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'  => fake()->firstName(),
            'last_name'   => fake()->lastName(),
            'email'       => fake()->unique()->safeEmail(),
            'user_status' => true,
        ];
    }

    /**
     * `password` is not mass-assignable on the User model.
     */
    public function configure(): static
    {
        return $this->afterMaking(function (User $user) {
            $user->password ??= static::$password ??= Hash::make('password');
        });
    }

    /**
     * An account that still awaits admin activation.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'user_status' => false,
        ]);
    }
}
