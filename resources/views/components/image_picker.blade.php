<div id="{{$id}}Picker" class="position-relative {{$className ?? ""}}">
    @yield("body")
    <input type="file" class="d-none" onchange="loadImage()" name="{{ $fieldName ?? 'image' }}" id="{{ $id ?? 'image' }}" placeholder="photo">
    <span class="invalid-feedback"></span>
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
