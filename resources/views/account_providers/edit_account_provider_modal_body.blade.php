@once
    @push('scripts')
        <script>
            let spinner = document.querySelector("#editAccountProviderFormModalPrimaryBtnSpinner");
            let nameController = document.querySelector('#accountProviderName');

            function onEditActionClick(value) {
                spinner.classList.add('d-none');
                nameController.value = value.name;
                document.querySelector("#accountProviderImagePicker").querySelector('img').src = value.image;
            }

            let accountEditPrimaryBtn = document.querySelector("#editAccountProviderFormModalPrimaryBtn");
            let accountEditSecondaryBtn = document.querySelector("#editAccountProviderFormModalSecondaryBtn");

            accountEditPrimaryBtn.addEventListener('click', (e) => {
                onEditAccountProvider(modalValue);
            });

            async function onEditAccountProvider(value) {
                spinner.classList.remove('d-none');

                try {
                    let imagePicker = document.querySelector('#accountProviderImage');
                    let image = imagePicker.files.length === 0 ? null : imagePicker.files[0];
                    let name = document.querySelector('#accountProviderName').value;
                    let form = new FormData();
                    form.set("name", name);
                    form.set("image", image);

                    let res = await fetch(`{{ url('/account-provider-update') }}/${value.id}`, {
                        "method": "POST",
                        "headers": {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        "body": form
                    })

                    updateRowFromUI(value.id)
                } catch (error) {
                    console.error(error);
                }

                spinner.classList.add('d-none');
                accountEditSecondaryBtn.click();
            }
        </script>
    @endpush
@endonce

<form action="" method="POST" class="needs-validation">
    @include('components.landscape_image_picker', [
        'fieldName' => 'image',
        'id' => 'accountProviderImage',
        'title' => 'Account provider image',
    ])

    <div class="pt-2">
        <label for="accountProviderName">Name</label>
        <input type="text" name="name" id="accountProviderName" placeholder="Enter name..." required minlength="3"
            class="form-control">
        <span class="invalid-feedback d-block" id="accountProviderNameFeedback"></span>
    </div>
</form>
