<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->lastName.$this->faker->firstName, //文字列
            'gender' => $this->faker->randomElement($array=[1,2]), 
            'email' => $this->faker->safeEmail(), //文字列
            'postcode' => $this->faker->regexify('[1-9]{3}-[0-9]{4}'), //文字列
            'address' => $this->faker->address(), //文字列
            'building_name' => $this->faker->word(), //文字列
            //'opinion' => $this->faker->text(40), //文字列
            'opinion' => $this->faker->realText(120), //文字列
            'created_at' => $this->faker->dateTime('now'), //現在までYmdHis
            'updated_at' => $this->faker->dateTime('now'), //現在までYmdHis
        ];
    }
}
