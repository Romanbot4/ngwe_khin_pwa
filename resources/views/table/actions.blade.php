<td>
    <div class="dropdown">
        <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <svg class="icon">
                <use xlink:href="assets/sprites/free.svg#cil-options"></use>
            </svg>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <button type='button' id="rowActionInfo" onclick="onInfoClick({{ $value }})" class="dropdown-item">Info</button>
            <button type='button' id="rowActionEdit" onclick="onUpdateClick({{ $value }})" class="dropdown-item" data-bs-toggle="modal" data-bs-target={{ $editModalId }}>Edit</button>
            <button type='button' id="rowActionDelete" onclick="onDeleteClick({{ $value }})" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target={{ $deleteModalId }}>Delete</button>
        </div>
    </div>
</td>
