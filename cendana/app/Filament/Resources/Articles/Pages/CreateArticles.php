<?php

namespace App\Filament\Resources\Articles\Pages;

use App\Filament\Resources\Articles\ArticlesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateArticles extends CreateRecord
{
    protected static string $resource = ArticlesResource::class;
}
