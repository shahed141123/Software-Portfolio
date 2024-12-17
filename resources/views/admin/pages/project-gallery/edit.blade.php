<x-admin-app-layout :title="'Project Gallery Edit'">


    <div class="card card-flash">
        <div class="card-header">
            <div class="card-title">
            </div>

            <div class="card-toolbar">
                <a href="{{ route('admin.project-gallery.index') }}" class="btn btn-light-primary rounded-2">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                fill="currentColor" />
                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                fill="currentColor" />
                        </svg>
                    </span> Back to list
                </a>

            </div>
        </div>
        <div class="card-body">

            <form id="myForm" method="post" action="{{ route('admin.project-gallery.update', $item->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card bg-secondary rounded-0 p-5">
                    <div class="row p-4">

                        <!-- Status Field -->
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="status" class="mb-2">Choose Status</label>
                                <select name="status" id="status" class="form-select form-select-sm"
                                    data-control="select2" data-placeholder="Select an option">
                                    <option value="">Select an option</option>
                                    <option value="active"
                                        {{ old('status', $item->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive"
                                        {{ old('status', $item->status) == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                <div id="statusError" class="invalid-feedback" style="display: none;">Please select a
                                    status</div>
                            </div>
                        </div>

                        <!-- Name Field (for page selection) -->
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="page_name" class="mb-2">Choose Name</label>
                                <select name="name" id="page_name" class="form-select form-select-sm"
                                    data-control="select2" data-placeholder="Select an option">
                                    <option disabled selected>Select an option</option>
                                    <option value="all_pages"
                                        {{ old('name', $item->name) == 'all_pages' ? 'selected' : '' }}>All Pages
                                    </option>
                                    <option value="home_page"
                                        {{ old('name', $item->name) == 'home_page' ? 'selected' : '' }}>Home Page
                                    </option>
                                    <option value="authentication"
                                        {{ old('name', $item->name) == 'authentication' ? 'selected' : '' }}>
                                        Authentication</option>
                                    <option value="back_admin"
                                        {{ old('name', $item->name) == 'back_admin' ? 'selected' : '' }}>Back Admin
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Choose Project -->
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="project_id" class="mb-2">Choose Project</label>
                                <select name="project_id" id="project_id" class="form-select form-select-sm"
                                    data-control="select2" data-placeholder="Select a project">
                                    <option value="">Select a project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}"
                                            {{ old('project_id', $item->project_id) == $project->id ? 'selected' : '' }}>
                                            {{ $project->name }}</option>
                                    @endforeach
                                </select>
                                <div id="project_idError" class="invalid-feedback" style="display: none;">Please select
                                    a project</div>
                            </div>
                        </div>

                        <!-- Title Field -->
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="title" class="mb-2">Title</label>
                                <input type="text" name="title" id="title" placeholder="Enter Title"
                                    class="form-control form-control-sm" value="{{ old('title', $item->title) }}">
                            </div>
                        </div>

                        <!-- Date Field -->
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="date" class="mb-2">Date</label>
                                <input type="date" name="date" id="date" class="form-control form-control-sm"
                                    value="{{ old('date', $item->date) }}">
                            </div>
                        </div>

                        <!-- Image Field -->
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="image" class="mb-2">Image</label>
                                <input type="file" name="image" class="form-control form-control-sm"
                                    id="image" onchange="previewImage(event)">
                            </div>
                            <div id="imagePreviewContainer" class="mt-2">
                                <img id="imagePreview" src="{{ old('image', $item->image_url) }}"
                                    alt="Image preview"
                                    style="width:100px;height: 100px; display: {{ $item->image_url ? 'block' : 'none' }}">
                            </div>
                        </div>

                        <!-- Image Field -->
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="image" class="mb-2">Current Image</label>
                                <div>
                                    <img src="{{ !empty($item->image) ? url('storage/' . $item->image) : '' }}"
                                        style="width: 100px;height: 100px;" alt="">
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 mb-3 mt-4">
                            <button type="submit" class="btn btn-dark rounded-0 px-5 btn-sm float-end">Submit
                                Data</button>
                        </div>

                    </div>
                </div>
            </form>

        </div>

    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('imagePreview');
                preview.src = reader.result;
                preview.style.display = 'block'; // Show the image
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>


</x-admin-app-layout>