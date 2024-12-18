<?php

namespace TomatoPHP\FilamentCms\Filament\Resources\PostResource\Pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use TomatoPHP\FilamentCms\Events\PostCreated;
use TomatoPHP\FilamentCms\Events\PostUpdated;
use TomatoPHP\FilamentCms\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use TomatoPHP\FilamentCms\Jobs\GitHubMetaGetterJob;
use TomatoPHP\FilamentCms\Jobs\YoutubeMetaGetterJob;

class EditPost extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('editor-button')
                ->label('Editor')
                ->icon('heroicon-o-pencil')
                ->action(fn() => redirect()->to('/admin/editor/' . $this->getRecord()->slug)),
            Actions\Action::make('preview-button')
                ->label('Preview')
                ->icon('heroicon-o-eye')
                ->color('primary')
                ->action(fn() => redirect()->to('/admin/editor/' . $this->getRecord()->slug)),
            Actions\DeleteAction::make()
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $data;
    }


    public function afterSave()
    {
        Event::dispatch(new PostUpdated($this->getRecord()->toArray()));
    }
}
