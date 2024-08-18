@once
    @push('deps')
        <script>
            var modalValue;

            function updateModalValue(value) {
                modalValue = value;
                console.log(value);
            }

            function onDeleteClick(value) {
                updateModalValue(value);
                handleDeleteModalView(value);
            }
        </script>
    @endpush
@endonce


<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Title"
    style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $id }}Title">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include($body)
            </div>
            <div class="modal-footer">
                <button id="modalSecondaryBtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="modalPrimaryBtn" type="button" class="btn btn-primary {{($is_destructive ?? false)  ? 'bg-danger border-danger' : ''}}">
                    {{$primary_button_label ?? "Save changes"}}
                    <span class="ml-1 d-none" id="modalPrimaryBtnSpinner">
                        <div class="spinner-sm | spinner-border text-light" role="status"></div>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
