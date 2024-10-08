@once
    @push('scripts')
        <script>
            function onDeleteActionClick(value) {
                document.querySelector("#deleteModalBodyText").innerText = value.name;
            }

            let deleteBtn = document.querySelector('#deleteCategoryFormModalPrimaryBtn');
            let deleteSecondaryBtn = document.querySelector('#deleteCategoryFormModalSecondaryBtn');

            deleteBtn.addEventListener('click', (e) => {
                onDeleteCategory(modalValue);
            });

            async function onDeleteCategory() {
                const spinner = document.querySelector('#deleteCategoryFormModalPrimaryBtnSpinner')
                spinner.classList.remove('d-none');

                try {
                    const res = await fetch(
                        `{{ url('/category-delete') }}/${modalValue.id}`, {
                            method: 'DELETE',
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                        }
                    )
                    removeRowFromUI(modalValue.id);
                } catch (error) {
                    console.error(error);
                }

                element.classList.add('d-none');
                deleteSecondaryBtn.click();
            }
        </script>
    @endpush
@endonce

<p>This will delete category named <b id="deleteModalBodyText"></b>. Are you sure? </p>
