<div id="{{ $id }}Picker" class="size-8 | bg-muted position-relative shadow-sm rounded-circle" role="button">
    <img class="w-100 h-100 object-fit-cover rounded-circle"
        src="{{ $image ?? asset('assets/sprites/profile_default.svg') }}" alt="">
    <div class="position-absolute bottom-0 end-0">
        @include('components.circular_icon', ['icon' => url('assets/sprites/free.svg#cil-camera')])
    </div>
    <input type="file" class="d-none" onchange="loadImage()" name="{{ $fieldName ?? 'image' }}" id="{{ $id ?? 'image' }}" placeholder="photo" capture>
</div>

@push('scripts')
    <script>
        let picker = document.querySelector("#{{ $id }}");
        let content = document.querySelector("#{{ $id }}Picker");

        content.addEventListener('click', (event) => {
            picker.click();
        });

        function loadImage() {
            if (picker.files.length > 0) {
                let file = window.URL.createObjectURL(picker.files[0])
                content.querySelector('img').src = file;
            }
        }
    </script>
@endpush
