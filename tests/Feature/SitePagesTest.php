<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Suggestion;
use App\Models\Walk;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SitePagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_displays_featured_walks(): void
    {
        Walk::query()->create([
            'title' => 'Тестовая прогулка',
            'slug' => 'test-walk',
            'district' => 'Басманный',
            'teaser' => 'Короткий тестовый маршрут.',
            'description' => 'Описание для проверки главной страницы.',
            'duration_minutes' => 45,
            'distance_km' => 2.5,
            'difficulty' => 'лёгкий',
            'start_point' => 'Начало',
            'finish_point' => 'Финиш',
            'accent' => 'clay',
            'stops' => [['name' => 'Остановка', 'note' => 'Описание остановки']],
            'is_featured' => true,
        ]);

        $this->get('/')->assertOk()->assertSee('Тестовая прогулка');
    }

    public function test_walk_can_be_opened_by_slug(): void
    {
        $walk = Walk::query()->create([
            'title' => 'Маршрут по тесту',
            'slug' => 'route-test',
            'district' => 'Пресненский',
            'teaser' => 'Проверка карточки.',
            'description' => 'Описание маршрута.',
            'duration_minutes' => 60,
            'distance_km' => 3.0,
            'difficulty' => 'лёгкий',
            'start_point' => 'Метро A',
            'finish_point' => 'Метро B',
            'accent' => 'sage',
            'stops' => [['name' => 'Старт', 'note' => 'Осмотреться.']],
            'is_featured' => false,
        ]);

        $this->get('/walks/'.$walk->slug)->assertOk()->assertSee($walk->title);
    }

    public function test_estimate_uses_query_parameters(): void
    {
        $this->get('/estimate?distance=4.5&pace=4.5&pause=15')
            ->assertOk()
            ->assertSee('75')
            ->assertSee('60 мин');
    }

    public function test_journal_article_is_displayed(): void
    {
        $article = Article::query()->create([
            'title' => 'Тестовая заметка',
            'slug' => 'test-note',
            'excerpt' => 'Короткий анонс.',
            'body' => 'Текст заметки.',
            'category' => 'Проверка',
            'read_minutes' => 2,
            'published_at' => now()->subDay(),
        ]);

        $this->get('/journal/'.$article->slug)->assertOk()->assertSee($article->title);
    }

    public function test_suggestion_form_saves_valid_data(): void
    {
        $response = $this->post('/idea', [
            'name' => 'Никита',
            'email' => 'nikita@example.com',
            'message' => 'Хочу предложить небольшой маршрут по тихим переулкам.',
        ]);

        $response->assertRedirect('/idea');
        $this->assertDatabaseHas('suggestions', ['email' => 'nikita@example.com', 'status' => 'new']);
    }
}
