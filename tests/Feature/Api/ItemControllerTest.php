<?php

namespace Tests\Feature\Api;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_ifCanGetAllItems()
    {
        $response = $this->getJson('/api/items');
        $response->assertStatus(200);
    }
    public function test_ifCanGetOneItem()
    {
        $item = Item::factory()->create();
        $response = $this->get(route('items.show' ,['id' => $item->id]));
        $response->assertStatus(200);
    }
    public function test_ifCanCreateItem()
    {
        $item = Item::factory()->make();
        $response = $this->postJson('/api/items', $item->toArray());
        $response->assertStatus(201);
    }
    public function test_ifCanUpdateItem()
    {
        $item = Item::factory()->create();
        $response = $this->putJson(route('items.update', ['id' => $item->id]), [
            'name' => 'Updated Item',
            'quantity' => 10,
            'price' => 100
        ]);
        $response->assertStatus(200);
    }
    public function test_ifCanDeleteItem()
    {
        $item = Item::factory()->create();
        $response = $this->delete(route('items.destroy', ['id' => $item->id]));
        $response->assertStatus(200);
    }
    public function test_ifCanDeleteAllItems()
    {
        $response = $this->delete(route('items.destroyAll'));
        $response->assertStatus(200);
    }

}
