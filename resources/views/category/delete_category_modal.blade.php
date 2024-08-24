@extends('components.modal', [
    'id' => 'deleteCategoryFormModal',
    'title' => 'Delete Category',
    'body' => 'category.delete_category_modal_body',
    'primary_button_label' => 'Delete',
    'is_destructive' => true,
])
