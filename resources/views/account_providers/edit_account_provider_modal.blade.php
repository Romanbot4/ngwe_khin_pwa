@extends('components.modal', [
    'id' => 'editAccountProviderFormModal',
    'title' => 'Edit Account Provider',
    'is_destructive' => false,
    'primary_button_label' => 'Update Changes',
    'body' => 'account_providers.edit_account_provider_modal_body',
])
