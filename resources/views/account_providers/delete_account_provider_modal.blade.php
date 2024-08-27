@extends('components.modal', [
    'id' => 'deleteAccountProviderFormModal',
    'title' => 'Delete Account Provider',
    'is_destructive' => true,
    'primary_button_label' => 'Delete',
    'body' => 'account_providers.delete_account_provider_modal_body',
])
