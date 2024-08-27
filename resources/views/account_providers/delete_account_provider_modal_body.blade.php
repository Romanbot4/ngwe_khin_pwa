@once
    @push('scripts')
        <script>
            function onDeleteActionClick(value) {
                document.querySelector("#deleteModalBodyText").innerText = value.name;
            }

            let deleteBtn = document.querySelector('#deleteAccountProviderFormModalPrimaryBtn');
            let deleteSecondaryBtn = document.querySelector('#deleteAccountProviderFormModalSecondaryBtn');

            deleteBtn.addEventListener('click', (e) => {
                onDeleteAccountProvider(modalValue);
            });

            async function onDeleteAccountProvider() {
                const spinner = document.querySelector('#deleteAccountProviderFormModalPrimaryBtnSpinner')
                spinner.classList.remove('d-none');

                try {
                    const res = await fetch(
                        `{{ url('/account-provider-delete') }}/${modalValue.id}`, {
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

                spinner.classList.add('d-none');
                deleteSecondaryBtn.click();
            }
        </script>
    @endpush
@endonce

<p>This will Delete account provider named <b id="deleteModalBodyText"></b>. Are you sure? </p>
