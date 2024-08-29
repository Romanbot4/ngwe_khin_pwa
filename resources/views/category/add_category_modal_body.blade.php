@once
    @push('scripts')
        <script>
            let addBtn = document.querySelector('#addCategoryFormModalPrimaryBtn');
            let addSecondaryBtn = document.querySelector('#addCategoryFormModalSecondaryBtn');

            addBtn.addEventListener('click', (e) => {
                onCreateCategory(modalValue);
            });

            async function onCreateCategory() {
                const spinner = document.querySelector('#addCategoryFormModalPrimaryBtnSpinner')
                spinner.classList.remove('d-none');

                const nameController = document.querySelector("#addCategoryName");
                const name = nameController.value;

                try {
                    const res = await fetch(
                        `{{ url('/category-create') }}`, {
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

                    let value = await res.json();
                    if (res.status === 200) {
                        updateRowFromUI(value.data.id);
                    }
                } catch (error) {
                    console.error(error);
                }


                spinner.classList.add('d-none');
                addSecondaryBtn.click();
            }
        </script>
    @endpush
@endonce

<form action="" method="post" class="needs-validation">
    <div>
        <label for="categoryName" class="pb-1 text-small">Category name</label>
        <input type="text" name="name" id="addCategoryName" class="form-control" placeholder="Enter category name..."
            minlength="3" required>
        <span id="categoryNameFeedback" class="invalid-feedback">This should be at least 3 characters</span>
    </div>
</form>
