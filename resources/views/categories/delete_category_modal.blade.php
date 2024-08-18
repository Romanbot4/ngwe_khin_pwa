@extends('components.modal', [
    'id' => 'deleteCategoryFormModal',
    'title' => 'Delete Category',
    'body' => 'categories.delete_category_modal_body',
    'primary_button_label' => 'Delete',
    'is_destructive' => true,
])
