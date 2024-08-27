@extends('components.modal', [
    'id' => 'editCategoryFormModal',
    'title' => 'Edit Category',
    'body' => 'category.edit_category_modal_body',
    "primary_button_label" => "Update Changes",
    'is_destructive' => false,
])
