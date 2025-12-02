<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('changePassword')
                ->label('Change Password')
                ->icon('heroicon-m-key')
                ->color('warning')
                ->form([
                    TextInput::make('password')
                        ->label('New Password')
                        ->password()
                        ->required()
                        ->minLength(8)
                        ->revealable(),
                    TextInput::make('password_confirmation')
                        ->label('Confirm Password')
                        ->password()
                        ->same('password')
                        ->required()
                        ->revealable(),
                ])
                ->action(function (array $data): void {
                    $this->record->update([
                        'password' => Hash::make($data['password']),
                    ]);
                }),
            Actions\DeleteAction::make(),
        ];
    }
}
