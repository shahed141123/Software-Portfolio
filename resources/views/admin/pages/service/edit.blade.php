<x-admin-app-layout :title="'Service Edit'">
    <div class="card card-flash">
        <div class="card-header">
            <div class="card-toolbar">
                <a href="{{ route('admin.service.index') }}" class="btn btn-light-primary rounded-2">
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
            <form method="POST" action="{{ route('admin.service.update', $item->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card bg-secondary rounded-0 p-5">
                    <div class="row p-4">

                        <!-- Status Select -->
                        <div class="col-4 mb-3">
                            <label for="status" class="mb-2">Choose Status</label>
                            <select name="status" id="status" required
                                class="form-select form-select-sm @error('status') is-invalid @enderror">
                                <option value="">Select an option</option>
                                <option value="active" {{ old('status', $item->status) == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ old('status', $item->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Service Name Input -->
                        <div class="col-4 mb-3">
                            <label for="name" class="mb-2">Service Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $item->name) }}"
                                class="form-control form-control-sm @error('name') is-invalid @enderror"
                                placeholder="Enter service name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Short Description -->
                        <div class="col-6 mb-3">
                            <label for="short_description" class="mb-2">Short Description</label>
                            <textarea name="short_description" id="short_description"
                                class="form-control form-control-sm @error('short_description') is-invalid @enderror" rows="3"
                                placeholder="Enter short description">{{ old('short_description', $item->short_description) }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Footer -->
                        <div class="col-6 mb-3">
                            <label for="footer" class="mb-2">Footer Text</label>
                            <textarea name="footer" id="footer" class="form-control form-control-sm @error('footer') is-invalid @enderror"
                                rows="3" placeholder="Enter footer text">{{ old('footer', $item->footer) }}</textarea>
                            @error('footer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="col-12 mb-3">
                            <label for="description" class="mb-2">Description</label>
                            <textarea name="description" id="description"
                                class="form-control form-control-sm editor @error('description') is-invalid @enderror" rows="5"
                                placeholder="Enter detailed description">{!! old('description', $item->description) !!}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Uploads -->
                        <!-- Logo Input with Preview -->
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="logo" class="mb-2">Upload Logo</label>
                                <input type="file" name="logo" id="logo"
                                    class="form-control form-control-sm @error('logo') is-invalid @enderror"
                                    accept="image/*" onchange="previewImage(event, 'logoPreview')">
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <img id="logoPreview" src="#" alt="Logo Preview"
                                    style="width: 80px; height: 80px; display: none; margin-top: 10px;">


                            </div>
                        </div>

                        <div class="col-1 mb-3">
                            <label for="logo" class="mb-2">Current Logo</label>
                            <div>
                                <img src="{{ !empty($item->logo) ? url('storage/' . $item->logo) : 'https://ui-avatars.com/api/?name=' . urlencode($item->name) }}"
                                style="width: 60px;height: 40px;" alt="">
                            </div>
                        </div>

                        <!-- Image Input with Preview -->
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="image" class="mb-2">Upload Image</label>
                                <input type="file" name="image" id="image"
                                    class="form-control form-control-sm @error('image') is-invalid @enderror"
                                    accept="image/*" onchange="previewImage(event, 'imagePreview')">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <img id="imagePreview" src="#" alt="Image Preview"
                                    style="width: 80px; height: 80px; display: none; margin-top: 10px;">
                            </div>
                        </div>

                        <div class="col-1 mb-3">
                            <label for="logo" class="mb-2">Current Image</label>
                            <div>
                                <img src="{{ !empty($item->image) ? url('storage/' . $item->image) : 'https://ui-avatars.com/api/?name=' . urlencode($item->name) }}"
                                style="width: 60px;height: 40px;" alt="">
                            </div>
                        </div>

                        <!-- Banner Image Input with Preview -->
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="banner_image" class="mb-2">Banner Image</label>
                                <input type="file" name="banner_image" id="banner_image"
                                    class="form-control form-control-sm @error('banner_image') is-invalid @enderror"
                                    accept="image/*" onchange="previewImage(event, 'bannerImagePreview')">
                                @error('banner_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <img id="bannerImagePreview" src="#" alt="Banner Image Preview"
                                    style="width: 80px; height: 80px; display: none; margin-top: 10px;">
                            </div>
                        </div>

                        <div class="col-1 mb-3">
                            <label for="logo" class="mb-2">Current Image</label>
                            <div>
                                <img src="{{ !empty($item->banner_image) ? url('storage/' . $item->banner_image) : 'https://ui-avatars.com/api/?name=' . urlencode($item->name) }}"
                                style="width: 60px;height: 40px;" alt="">
                            </div>
                        </div>

                        <!-- Middle Image One Input with Preview -->
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="middle_image_one" class="mb-2">Upload Middle Image One</label>
                                <input type="file" name="middle_image_one" id="middle_image_one"
                                    class="form-control form-control-sm @error('middle_image_one') is-invalid @enderror"
                                    accept="image/*" onchange="previewImage(event, 'middleImageOnePreview')">
                                @error('middle_image_one')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <img id="middleImageOnePreview" src="#" alt="Middle Image One Preview"
                                    style="width: 80px; height: 80px; display: none; margin-top: 10px;">
                            </div>
                        </div>

                        <div class="col-1 mb-3">
                            <label for="logo" class="mb-2">Current Image</label>
                            <div>
                                <img src="{{ !empty($item->middle_image_one) ? url('storage/' . $item->middle_image_one) : 'https://ui-avatars.com/api/?name=' . urlencode($item->name) }}"
                                style="width: 60px;height: 40px;" alt="">
                            </div>
                        </div>

                        <!-- Middle Image Two Input with Preview -->
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="middle_image_two" class="mb-2">Upload Middle Image Two</label>
                                <input type="file" name="middle_image_two" id="middle_image_two"
                                    class="form-control form-control-sm @error('middle_image_two') is-invalid @enderror"
                                    accept="image/*" onchange="previewImage(event, 'middleImageTwoPreview')">
                                @error('middle_image_two')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <img id="middleImageTwoPreview" src="#" alt="Middle Image Two Preview"
                                    style="width: 80px; height: 80px; display: none; margin-top: 10px;">
                            </div>
                        </div>

                        <div class="col-1 mb-3">
                            <label for="logo" class="mb-2">Current Image</label>
                            <div>
                                <img src="{{ !empty($item->middle_image_two) ? url('storage/' . $item->middle_image_two) : 'https://ui-avatars.com/api/?name=' . urlencode($item->name) }}"
                                style="width: 60px;height: 40px;" alt="">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 mb-3 mt-4">
                            <button type="submit" class="btn btn-dark rounded-0 px-5 btn-sm float-end">Update
                                Data</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event, previewId) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById(previewId);
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-admin-app-layout>