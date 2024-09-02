<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use \App\Models\Student;

class StudentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_access_students_index()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('students.index'));

        $response->assertStatus(200);
    }

    public function test_unauthenticated_user_cannot_access_students_index()
    {
        $response = $this->get(route('students.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_access_students_index_and_search()
    {
        $user = User::factory()->create();
        $student1 = Student::factory()->create(['name' => 'John Doe']);
        $student2 = Student::factory()->create(['name' => 'Jane Smith']);

        // インデックスページにアクセスできることを確認
        $response = $this->actingAs($user)->get(route('students.index'));
        $response->assertStatus(200);
        $response->assertSeeText('John Doe');
        $response->assertSeeText('Jane Smith');
        // 検索機能のテスト
        $searchResponse = $this->actingAs($user)->get(route('students.index', ['search' => 'John']));
        $searchResponse->assertStatus(200);
        $searchResponse->assertSeeText('John Doe');
        $searchResponse->assertDontSeeText('Jane Smith');
    }
}
