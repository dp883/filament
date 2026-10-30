<?php

namespace App\Filament\Resources\Customers\Pages;

use App\Filament\Resources\Customers\CustomerResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('Back')
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->url(CustomerResource::getUrl('index')),
            ViewAction::make()
                ->label('View')
                ->icon('heroicon-o-eye'),
            DeleteAction::make()
                ->label('Delete')
                ->icon('heroicon-o-trash')
                ->color('danger'),
            Action::make('show_email')
                ->label('Show Email')
                ->icon('heroicon-o-envelope')
                ->color('info')
                ->action(function () {
                    Notification::make()
                        ->title('Customer Email')
                        ->body($this->record->email)
                        ->info()
                        ->send();
                }),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['name'] = trim($data['name']);

        // $data['email'] = strtolower(trim($data['email']));

        // // Never save an empty password.
        // if (blank($data['password'] ?? null)) {
        //     unset($data['password']);
        // }

        return $data;
    }
     protected function beforeSave(): void
    {
        Log::info('Customer update started', [
            'customer_id' => $this->record->id,
        ]);
    }
    protected function afterSave(): void
    {
        Log::info('Customer updated successfully', [
            'customer_id' => $this->record->id,
        ]);
    }
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Customer updated successfully!';
    }
    protected function getRedirectUrl(): string
    {
        return CustomerResource::getUrl('edit', ['record' => $this->record]);
    }
    protected function getSaveFormAction(): Action
    {
        return Action::make('save')
            ->label('Update Customer')
            ->icon('heroicon-o-check')
            ->color('success')
            ->action(fn () => $this->save())
            ->requiresConfirmation()
            ->modalHeading('Update Customer')
            ->modalDescription('Are you sure you want to update this customer?')
            ->modalSubmitActionLabel('Yes, Update')
            ->keyBindings(['mod+s']);
    }
    protected function getCancelFormAction(): Action
    {
        return parent::getCancelFormAction()
            ->label('Cancel')
            ->icon('heroicon-o-x-mark')
            ->color('gray');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction(),
            $this->getCancelFormAction(),
            // $this->getDeleteFormAction(),
        ];
    }
    protected function handleRecordUpdate(Model $record,array $data): Model 
    {
        $record->update($data);
        return $record;
    }
}
