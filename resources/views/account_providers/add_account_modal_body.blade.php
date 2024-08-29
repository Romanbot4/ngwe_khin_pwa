@once
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {

                let spinner = document.querySelector("#addAccountProviderFormModalPrimaryBtnSpinner");
                let nameController = document.querySelector('#createAccountProviderName');

                let accountCreatePrimaryBtn = document.querySelector("#addAccountProviderFormModalPrimaryBtn");
                let accountCreateSecondaryBtn = document.querySelector("#addAccountProviderFormModalSecondaryBtn");

                accountCreatePrimaryBtn.addEventListener('click', (e) => {
                    onCreateAccountProvider(modalValue);
                });

                async function onCreateAccountProvider() {
                    spinner.classList.remove('d-none');

                    try {
                        let imagePicker = document.querySelector('#createAccountProviderImage');
                        let image = imagePicker.files.length === 0 ? null : imagePicker.files[0];
                        let name = document.querySelector('#createAccountProviderName').value;
                        let form = new FormData();
                        form.set("name", name);
                        form.set("image", image);

                        let res = await fetch(`{{ url('/account-provider-create') }}`, {
                            "method": "POST",
                            "headers": {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            "body": form
                        })

                        let value = await res.json();

                        updateRowFromUI(value.data.id)
                    } catch (error) {
                        console.error(error);
                    }

                    spinner.classList.add('d-none');
                    accountCreateSecondaryBtn.click();
                }
            });
        </script>
    @endpush
@endonce

<form action="" method="POST" class="needs-validation">
    @include('components.landscape_image_picker', [
        'fieldName' => 'image',
        'id' => 'createAccountProviderImage',
        'title' => 'Account provider image',
    ])

    <div class="pt-2">
        <label for="createAccountProviderName">Name</label>
        <input type="text" name="name" id="createAccountProviderName" placeholder="Enter name..." required
            minlength="3" class="form-control">
        <span class="invalid-feedback d-block" id="createAccountProviderNameFeedback"></span>
    </div>
</form>
