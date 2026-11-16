<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SuggestionController extends Controller
{
    public function create(): View
    {
        return view('suggestions.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:80'],
            'email' => ['required', 'email:rfc', 'max:160'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ], [
            'name.required' => 'Напиши, как к тебе обращаться.',
            'email.required' => 'Оставь адрес электронной почты для ответа.',
            'email.email' => 'Проверь формат электронной почты.',
            'message.min' => 'Добавь немного подробностей — хотя бы 10 символов.',
        ]);

        Suggestion::query()->create($data + ['status' => 'new']);

        return to_route('suggestions.create')->with('success', 'Идея записана. Спасибо, что помог сделать карту внимательнее.');
    }
}
