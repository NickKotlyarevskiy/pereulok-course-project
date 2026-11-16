<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('about:project', function () {
    $this->line('Переулок — городской журнал коротких прогулок по Москве.');
})->purpose('Краткая информация об учебном проекте');
