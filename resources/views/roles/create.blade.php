<form action="{{ route('roles.store') }}" method="POST">
    @csrf
    <input type="hidden" name="created_by" class="form-control" value="{{ $userId }}" required>
    <input type="hidden" name="modified_by" class="form-control" value="{{ $userId }}" required>

    <div class="row">
        <div class="col-md-4">
            <div class="input-style-1">
                <label for="name">Name <span class="mandatory"> *</span></label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
        </div>

        <div class="col-sm-2">
            <label>Full View <span class="mandatory"> *</span></label><br>
            <label class="radio-inline">
                <input type="radio" id="full_view_yes" name="full_view" class="radio-inline" value="1" checked> Yes
            </label>
            <label class="radio-inline">
                <input type="radio" id="full_view_no" name="full_view" class="radio-inline" value="0"> No
            </label>
        </div>
        <div class="col-sm-2">
            <label>Full Add <span class="mandatory"> *</span></label><br>
            <label class="radio-inline">
                <input type="radio" id="full_add_yes" name="full_add" class="radio-inline" value="1" checked> Yes
            </label>
            <label class="radio-inline">
                <input type="radio" id="full_add_no" name="full_add" class="radio-inline" value="0"> No
            </label>
        </div>
        <div class="col-sm-2">
            <label>Full Edit <span class="mandatory"> *</span></label><br>
            <label class="radio-inline">
                <input type="radio" id="full_edit_yes" name="full_edit" class="radio-inline" value="1" checked> Yes
            </label>
            <label class="radio-inline">
                <input type="radio" id="full_edit_no" name="full_edit" class="radio-inline" value="0"> No
            </label>
        </div>
        <div class="col-sm-2">
            <label>Full Delete <span class="mandatory"> *</span></label><br>
            <label class="radio-inline">
                <input type="radio" id="full_delete_yes" name="full_delete" class="radio-inline" value="1" checked> Yes
            </label>
            <label class="radio-inline">
                <input type="radio" id="full_delete_no" name="full_delete" class="radio-inline" value="0"> No
            </label>
        </div>
    </div>
    <hr>

    <div class="col-sm-12">
        <div class="row">
            <div class="input-style-1">
                <label for="description">Description <span class="mandatory">*</span></label>
                <textarea name="description" id="description" class="rich-editor" placeholder="description" rows="3"></textarea>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-sm-2">
            <label>Super Config <span class="mandatory"> *</span></label><br>
            <label class="radio-inline">
                <input type="radio" id="super_config_yes" name="super_config" class="radio-inline" value="1" checked> Yes
            </label>
            <label class="radio-inline">
                <input type="radio" id="super_config_no" name="super_config" class="radio-inline" value="0"> No
            </label>
        </div>

        <div class="col-sm-2">
            <label>Config <span class="mandatory"> *</span></label><br>
            <label class="radio-inline">
                <input type="radio" id="config_yes" name="config" class="radio-inline" value="1" checked> Yes
            </label>
            <label class="radio-inline">
                <input type="radio" id="config_no" name="config" class="radio-inline" value="0"> No
            </label>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="main-btn primary-btn btn-hover btn-sm mt-3">Save</button>
            <button type="reset" class="main-btn warning-btn btn-hover btn-sm mt-3">Reset</button>
        </div>
    </div>
</form>
