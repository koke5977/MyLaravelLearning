<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use \App\Models\Student;

class StudentControllerTest extends TestCase
{
    use RefreshDatabase;

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

    public function test_authenticated_user_can_post_students_data()
    {
        $user = User::factory()->create();
        $postData = [
            'name' => 'Test Student',
        ];
        // リクエストの送信
        $response = $this->actingAs($user)->post(route('students.store'), $postData);

        // レスポンスの検証
        $response->assertRedirect(route('students.index'));

        // データベースの検証
        $this->assertDatabaseHas('students', [
            'name' => 'Test Student',
        ]);
    }
}
