<?php
namespace Database\Factories;

use App\Models\Customer; // Import the Customer model
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->firstName, // Use firstName
            'lname' => $this->faker->lastName,  // Use lastName
            'nickname' => $this->faker->userName, // Use userName for nickname
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber, // Use phoneNumber
            'gender' => $this->faker->randomElement(['male', 'female']), // Random gender
        ];
    }
}
