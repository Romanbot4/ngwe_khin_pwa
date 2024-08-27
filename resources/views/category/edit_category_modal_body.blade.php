@once
    @push('scripts')
        <script>
            function onEditActionClick(value) {
                document.querySelector("#categoryName").value = value.name;
            }

            let editBtn = document.querySelector('#editCategoryFormModalPrimaryBtn');
            let editSecondaryBtn = document.querySelector('#editCategoryFormModalSecondaryBtn');

            editBtn.addEventListener('click', (e) => {
                onUpdateCategory(modalValue);
            });

            async function onUpdateCategory() {
                const spinner = document.querySelector('#editCategoryFormModalPrimaryBtnSpinner')
                spinner.classList.remove('d-none');

                const nameController = document.querySelector("#categoryName");
                const name = nameController.value;

                try {
                    const res = await fetch(
                        `{{ url('/category-update') }}/${modalValue.id}`, {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                name: name
                            })
                        }
                    )

                    if(res.status === 200) {
                        updateRowFromUI(modalValue.id);
                    }
                } catch (error) {
                    console.error(error);
                }

                spinner.classList.add('d-none');
                editSecondaryBtn.click();
            }
        </script>
    @endpush
@endonce

<form action="" method="post" class="needs-validation">
    <div>
        <label for="categoryName" class="pb-1 text-small">Category name</label>
        <input type="text" name="name" id="categoryName" class="form-control" placeholder="Enter category name..."
            minlength="3" required>
        <span id="categoryNameFeedback" class="invalid-feedback">This should be at least 3 characters</span>
    </div>
</form>
