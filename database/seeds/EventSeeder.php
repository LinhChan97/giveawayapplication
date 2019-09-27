<?php

use Illuminate\Database\Seeder;
use App\Models\V1\Event;
use App\Models\V1\User;
use App\Models\V1\Cause;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = array(
            'name' => 'Hurricane Dorian Bahamas Relief Drive',
            'description' => '76,000 people are left homeless and in need of assistance in the Abaco Islands and the Grand Bahama Island, per the U.N. Help is needed today!',
            'text' => 'The Salvation Army in The Bahamas is actively setting up relief efforts and planning for the immediate response, as well as long-term plans for this catastrophic event. Their immediate needs are non-perishable food, cleaning supplies and diapers. For the latest updates on our disaster relief efforts, visit www.disaster.salvationarmyusa.org. You can help in several ways!',
        );
        $users = User::all()->pluck('id')->toArray();
        $causes = Cause::all()->pluck('id')->toArray();
        factory(App\Models\V1\Event::class, 10)->create([
            'name' => $events['name'],
            'description' => $events['description'],
            'text' => $events['text'],
            'user_id' => $users[rand(1,10)],
            'cause_id' => $causes[rand(1,10)],
        ]);
    }
}
